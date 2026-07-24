<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Halaman depan — daftar artikel published dengan search & filter kategori.
     */
    public function index(Request $request)
    {
        $query = Article::with('category', 'user')
            ->where('status', 'published');

        // Search by judul
        $query->when($request->filled('search'), function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%');
        });

        // Filter by kategori
        $query->when($request->filled('category'), function ($q) use ($request) {
            $q->where('category_id', $request->category);
        });

        $articles   = $query->latest()->paginate(9)->withQueryString();
        $categories = Category::orderBy('name')->get();
        
        // Hitung total pembaca dari sum views_count semua artikel published
        $totalReaders = Article::where('status', 'published')->sum('views_count');

        return view('frontend.index', compact('articles', 'categories', 'totalReaders'));
    }

    /**
     * Halaman detail artikel.
     */
    public function show(Article $article)
    {
        // Hanya artikel published yang bisa dilihat publik
        if ($article->status !== 'published') {
            abort(404);
        }

        // Increment views counter
        $article->increment('views_count');

        $article->load([
            'category',
            'user',
            'comments' => function ($query) {
                $query->where('status', 'approved')->latest();
            },
        ]);

        // Artikel terkait (same kategori, exclude current)
        $related = Article::with('category', 'user')
            ->where('status', 'published')
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.show', compact('article', 'related'));
    }
}
