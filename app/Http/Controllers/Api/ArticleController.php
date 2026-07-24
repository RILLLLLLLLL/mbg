<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreArticleApiRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * GET /api/articles
     *
     * Query params:
     *   search    — cari by judul (partial match)
     *   category  — filter by category id
     *   status    — filter by status (draft|published), default: published
     *   per_page  — jumlah per halaman, default: 10 (max: 50)
     */
    public function index(Request $request)
    {
        $request->validate([
            'category' => 'nullable|integer|exists:categories,id',
            'status'   => 'nullable|in:draft,published',
            'per_page' => 'nullable|integer|min:1|max:50',
        ]);

        $query = Article::with(['category', 'user'])
            ->where('status', $request->get('status', 'published'));

        // Search by judul
        $query->when($request->filled('search'), function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%');
        });

        // Filter by kategori
        $query->when($request->filled('category'), function ($q) use ($request) {
            $q->where('category_id', $request->category);
        });

        $perPage  = (int) $request->get('per_page', 10);
        $articles = $query->latest()->paginate($perPage)->withQueryString();

        return ArticleResource::collection($articles)
            ->additional([
                'meta' => [
                    'total'    => $articles->total(),
                    'page'     => $articles->currentPage(),
                    'per_page' => $articles->perPage(),
                    'last_page'=> $articles->lastPage(),
                ],
            ]);
    }

    /**
     * GET /api/articles/{article}
     */
    public function show(Article $article)
    {
        $article->load(['category', 'user']);
        return new ArticleResource($article);
    }

    /**
     * POST /api/articles
     */
    public function store(StoreArticleApiRequest $request)
    {
        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('articles', 'public');
        }

        $status = $request->status ?? 'draft';

        $article = Article::create([
            'category_id'  => $request->category_id,
            'user_id'      => $request->user()?->id ?? 1,
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'excerpt'      => $request->excerpt ?? Str::limit(strip_tags($request->content), 160),
            'content'      => $request->content,
            'thumbnail'    => $thumbnail,
            'status'       => $status,
            'published_at' => $status === 'published' ? now() : null,
        ]);

        return response()->json([
            'message' => 'Artikel berhasil dibuat.',
            'data'    => new ArticleResource($article->load(['category', 'user'])),
        ], 201);
    }

    /**
     * PUT/PATCH /api/articles/{article}
     */
    public function update(StoreArticleApiRequest $request, Article $article)
    {
        $thumbnail = $article->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($thumbnail) {
                Storage::disk('public')->delete($thumbnail);
            }
            $thumbnail = $request->file('thumbnail')->store('articles', 'public');
        }

        $publishedAt = $article->published_at;
        if ($request->status === 'published' && ! $publishedAt) {
            $publishedAt = now();
        } elseif ($request->status === 'draft') {
            $publishedAt = null;
        }

        $article->update([
            'category_id'  => $request->category_id,
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'excerpt'      => $request->excerpt ?? Str::limit(strip_tags($request->content), 160),
            'content'      => $request->content,
            'thumbnail'    => $thumbnail,
            'status'       => $request->status,
            'published_at' => $publishedAt,
        ]);

        return response()->json([
            'message' => 'Artikel berhasil diupdate.',
            'data'    => new ArticleResource($article->fresh(['category', 'user'])),
        ]);
    }

    /**
     * DELETE /api/articles/{article}
     */
    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();

        return response()->json(['message' => 'Artikel berhasil dihapus.']);
    }
}
