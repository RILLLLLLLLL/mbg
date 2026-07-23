<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view ('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('comments', CommentController::class)
    ->only('index');
});

// Route::middleware(['auth'])->group(function () {



//     // Route::resource('categories', CategoryController::class);

//     // Route::resource('articles', ArticleController::class);

    

// });

Route::get('/', [FrontendController::class, 'index'])
    ->name('home');

Route::get('/artikel/{article:slug}', [FrontendController::class, 'show'])
    ->name('artikel.show');

Route::post('/artikel/{article}/komentar', [CommentController::class, 'store'])
    ->name('comments.store');

Route::patch('/comments/{comment}/approve',
    [CommentController::class, 'approve'])
    ->name('comments.approve');

Route::patch('/comments/{comment}/reject',
    [CommentController::class, 'reject'])
    ->name('comments.reject');
    
require __DIR__.'/auth.php';
