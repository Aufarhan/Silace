<?php

use App\Models\Post;
use App\Models\Region;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Silace",
        "posts" => Post::whereIn('status_id', [1, 3, 4])->latest()->filter(request(['search', 'category', 'author']))->paginate()->withQueryString(),
        'categories' => Category::all(),
        'regions' => Region::all(),
        // "aktivitas" => Post::latest()->where('category_id',1)->get(),
        // "informasi" => Post::latest()->where('category_id',5)->get()
    ]);
});

// Route::get('/about', function () {
//     return view('about', [
//         "title" => "About",
//         "name" => "Farhan Aufar",
//         "email" => "farhanaufarr@gmail.com",
//     ]);
// });


// Route::get('/posts', [PostController::class, 'index']);

Route::get('/aktivitas', [PostController::class, 'aktivitas']);

Route::get('/informasi', [PostController::class, 'informasi']);

Route::get('/laporan', [PostController::class, 'laporan']);

// Register Mati
// Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');

// Route::post('/register',[RegisterController::class, 'store']);
// Register Mati Ends


// Route::get('/dashboard',function(){
//     return view('dashboard.index');
// })->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');


Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

// Halaman Single Posts
route::get('posts/{post:slug}', [PostController::class,'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';