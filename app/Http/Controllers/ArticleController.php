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
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Daftar artikel dengan search, filter kategori, filter status, dan pagination.
     */
    public function index(Request $request)
    {
        $query = Article::with(['category', 'user']);

        // Penulis hanya melihat artikel milik sendiri
        if (auth()->user()->hasRole('Penulis')) {
            $query->where('user_id', auth()->id());
        }

        // Search by judul
        $query->when($request->filled('search'), function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%');
        });

        // Filter by kategori
        $query->when($request->filled('category'), function ($q) use ($request) {
            $q->where('category_id', $request->category);
        });

        // Filter by status
        $query->when($request->filled('status'), function ($q) use ($request) {
            $q->where('status', $request->status);
        });

        $articles   = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('articles.index', compact('articles', 'categories'));
    }

    /**
     * Form tambah artikel.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('articles.create', compact('categories'));
    }

    /**
     * Simpan artikel baru.
     */
    public function store(StoreArticleRequest $request)
    {
        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('articles', 'public');
        }

        Article::create([
            'category_id'  => $request->category_id,
            'user_id'      => Auth::id(),
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'excerpt'      => $request->excerpt ?? Str::limit(strip_tags($request->content), 160),
            'content'      => $request->content,
            'thumbnail'    => $thumbnail,
            'status'       => $request->status,
            'published_at' => $request->status === 'published' ? Carbon::now() : null,
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil dibuat.');
    }

    /**
     * Form edit artikel.
     */
    public function edit(Article $article)
    {
        if (auth()->user()->hasRole('Penulis') && $article->user_id !== auth()->id()) {
            abort(403, 'Anda tidak berhak mengedit artikel ini.');
        }

        $categories = Category::orderBy('name')->get();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update artikel.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        if (auth()->user()->hasRole('Penulis') && $article->user_id !== auth()->id()) {
            abort(403, 'Anda tidak berhak mengubah artikel ini.');
        }

        $thumbnail = $article->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $thumbnail = $request->file('thumbnail')->store('articles', 'public');
        }

        // Tentukan published_at: set saat pertama kali publish
        $publishedAt = $article->published_at;
        if ($request->status === 'published' && ! $publishedAt) {
            $publishedAt = Carbon::now();
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

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Hapus artikel beserta thumbnail-nya.
     */
    public function destroy(Article $article)
    {
        if (auth()->user()->hasRole('Penulis') && $article->user_id !== auth()->id()) {
            abort(403, 'Anda tidak berhak menghapus artikel ini.');
        }

        if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
