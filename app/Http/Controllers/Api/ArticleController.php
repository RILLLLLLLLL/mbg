<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Http\Resources\ArticleResource;

use App\Http\Requests\Api\StoreArticleApiRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with([
            'category',
            'user'
        ])
        ->where('status', 'published')
        ->latest()
        ->paginate(10);

    return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleApiRequest $request)
    {
        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request
                ->file('thumbnail')
                ->store('articles', 'public');
        }

        $article = Article::create([

            'category_id' => $request->category_id,

            // 'user_id' => Auth::id(),

            'user_id' => 1,

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'excerpt' => $request->excerpt,

            'content' => $request->content,

            'thumbnail' => $thumbnail,

            'status' => $request->status,

        ]);

        return response()->json([

            'message' => 'Artikel berhasil dibuat.',

            'data' => new \App\Http\Resources\ArticleResource($article),

        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load([
            'category',
            'user'
        ]);

        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArticleApiRequest $request, Article $article)
    {
        $thumbnail = $article->thumbnail;

        if ($request->hasFile('thumbnail')) {

            if ($thumbnail) {
                Storage::disk('public')->delete($thumbnail);
            }

            $thumbnail = $request
                ->file('thumbnail')
                ->store('articles', 'public');
        }

        $article->update([

            'category_id' => $request->category_id,

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'excerpt' => $request->excerpt,

            'content' => $request->content,

            'thumbnail' => $thumbnail,

            'status' => $request->status,

        ]);

        return response()->json([

            'message' => 'Artikel berhasil diupdate.',

            'data' => new ArticleResource($article->fresh()),

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();

        return response()->json([
            'message' => 'Artikel berhasil dihapus.'
        ]);
    }
}
