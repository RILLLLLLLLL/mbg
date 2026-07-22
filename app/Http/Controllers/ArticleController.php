<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::with([
                'category',
                'user'
            ])
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        // $categories = Category::orderBy('name')->paginate(5);
        $categories = Category::orderBy('name')->get();

        return view('articles.index', compact(
            'articles',
            'categories'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

    return view('articles.create', compact('categories'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        
    $thumbnail = null;

    if ($request->hasFile('thumbnail')) {

        $thumbnail = $request->file('thumbnail')
                            ->store('articles', 'public');

    }

        Article::create([

            'category_id' => $request->category_id,

            'user_id' => Auth::id(),

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'content' => $request->content,

            'thumbnail' => $thumbnail,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::orderBy('name')->get();

        return view('articles.edit', compact(
            'article',
            'categories'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

    $thumbnail = $article->thumbnail;

    if ($request->hasFile('thumbnail')) {

         if ($article->thumbnail) {

        Storage::disk('public')->delete($article->thumbnail);

    }

        $thumbnail = $request->file('thumbnail')
                            ->store('articles', 'public');

    }

        $article->update([

            'category_id' => $request->category_id,

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'content' => $request->content,

            'thumbnail' => $thumbnail,

            'status' => $request->status,

        ]);

        return redirect()
                ->route('articles.index')
                ->with('success','Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {

        if ($article->thumbnail &&
            Storage::disk('public')->exists($article->thumbnail)) {

            Storage::disk('public')->delete($article->thumbnail);

        }

        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
