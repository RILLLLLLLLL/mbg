<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

use App\Models\User;
use Illuminate\Http\Request;

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

    return view('dashboard.index', compact(
        'totalArticles',
        'totalCategories',
        'totalPenulis',
        'published',
        'draft',
        'latestArticles'

        
            
        ));
    }
}
