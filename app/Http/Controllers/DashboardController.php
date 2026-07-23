<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

    $totalArticles = Article::count();

    $totalCategories = Category::count();

    $totalPenulis = User::role('Penulis')->count();

    $published = Article::where('status','published')->count();

    $draft = Article::where('status','draft')->count();

    $latestArticles = Article::latest()
                        ->take(5)
                        ->get();

    $artikelPerKategori = Article::select(
            'categories.name',
            DB::raw('COUNT(articles.id) as total')
        )
        ->join('categories', 'articles.category_id', '=', 'categories.id')
        ->groupBy('categories.name')
        ->get();

    return view('dashboard.index', compact(
        'totalArticles',
        'totalCategories',
        'totalPenulis',
        'published',
        'draft',
        'latestArticles',
        'artikelPerKategori'
        
        ));
    }
}
