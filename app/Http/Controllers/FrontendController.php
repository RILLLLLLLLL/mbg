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

        return view('frontend.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $article->load([

            'category',

            'user',

            'comments' => function ($query) {

                $query->where('status', 'approved')
                    ->latest();

            }

        ]);

        return view(
            'frontend.show',
            compact('article')
        );
    }
}
