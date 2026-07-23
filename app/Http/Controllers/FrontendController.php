<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $articles = Article::with('category','user')
            ->where('status','published')
            ->latest()
            ->paginate(6);

        return view('fronted.index', compact('articles'));
    }

    public function show(Article $article)
    {
        abort_if($article->status != 'published',404);

        return view('fronted.show', compact('article'));
    }
}
