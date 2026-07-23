<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use App\Http\Requests\StoreCommentRequest;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $comments = Comment::with('article')
        ->latest()
        ->paginate(10);

    return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Article $article)
    {
        $article->comments()->create([

            'name' => $request->name,

            'email' => $request->email,

            'content' => $request->content,

            'status' => 'pending',

        ]);

        return back()->with(
            'success',
            'Komentar berhasil dikirim dan menunggu persetujuan admin.'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function approve(Comment $comment)
    {
        $comment->update([
            'status' => 'approved'
        ]);

        return back()->with(
            'success',
            'Komentar berhasil disetujui.'
        );
    }

    public function reject(Comment $comment)
    {
        $comment->update([
            'status' => 'pending'
        ]);

        return back()->with(
            'success',
            'Komentar dikembalikan menjadi pending.'
        );
    }
}
