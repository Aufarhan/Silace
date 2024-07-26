<?php

use App\Models\Post;
use App\Models\Region;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

// Main Routes (Publicly Accessible)
Route::get('/', function () {
    return view('home', [
        "title" => "Silace",
        "posts" => Post::whereIn('status_id', [1, 3, 4])->latest()->filter(request(['search', 'category', 'author']))->paginate()->withQueryString(),
        'categories' => Category::all(),
        'regions' => Region::all(),
    ]);
})->name('home');

// Post Routes (Publicly Accessible)
Route::get('/laporan', [PostController::class, 'laporan'])->name('laporan');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post');
Route::get('posts/{post:slug}/show', function(Post $post){
    return view('dashboard.posts.show', [
        "title" => "Show Post",
        'post' => $post,
        'categories' => Category::all(),
        'regions' => Region::all(),
        'statuses' => Status::all(),
    ]);
});

// Dashboard Routes (Protected by Auth and Verified Middleware)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardPostController::class, 'lobby'])->name('dashboard');
    Route::resource('/dashboard/posts', DashboardPostController::class)->except(['create', 'store', 'destroy']);
    Route::get('/dashboard/posts', [DashboardPostController::class, 'index'])->name('dashboard.posts.index');
    Route::post('/dashboard/posts', [DashboardPostController::class, 'store'])->name('posts.store');
    Route::delete('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    // Admin-only routes
    Route::middleware('isAdmin')->group(function () {
        Route::get('/dashboard/verifikasi', [DashboardPostController::class, 'verifikasi'])->name('dashboard.verifikasi');
        Route::put('/dashboard/verifikasi/{post}', [DashboardPostController::class, 'updateStatus'])->name('dashboard.verifikasi.updateStatus');
        Route::get('/dashboard/proses', [DashboardPostController::class, 'proses'])->name('dashboard.proses');
    Route::put('/dashboard/proses/{post:slug}', [DashboardPostController::class, 'updateProses'])->name('dashboard.proses.updateProses');
    });
});

// Admin Category Routes (Protected by isAdmin Middleware)
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware(['auth', 'isAdmin']);
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

// Profile Routes (Protected by Auth Middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';
