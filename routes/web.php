<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

// ── Halaman Publik ────────────────────────────────────────────────────────────

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/artikel/{article:slug}', [FrontendController::class, 'show'])->name('artikel.show');
Route::post('/artikel/{article}/komentar', [CommentController::class, 'store'])->name('comments.store');

// ── Area Admin / Penulis (harus login) ───────────────────────────────────────

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Kategori (Admin only)
    Route::resource('categories', CategoryController::class)
        ->middleware('role:Admin');

    // Artikel (Admin + Penulis)
    Route::resource('articles', ArticleController::class);

    // Moderasi Komentar (Admin only)
    Route::middleware('role:Admin')->group(function () {
        Route::resource('comments', CommentController::class)->only('index', 'destroy');
        Route::patch('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
        Route::patch('/comments/{comment}/reject', [CommentController::class, 'reject'])->name('comments.reject');
    });

    // Manajemen User / Penulis (Admin only)
    Route::resource('users', UserController::class)
        ->middleware('role:Admin')
        ->only(['index', 'create', 'store', 'destroy']);

});

require __DIR__.'/auth.php';
