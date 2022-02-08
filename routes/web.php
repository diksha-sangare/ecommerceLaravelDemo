<?php

use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// BLOGS
Route::get('blog', [BlogController::class, 'index'])->name('blog')->middleware('auth');
Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('blog', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');

// CATEGORIES
Route::get('category', [CategoryController::class, 'index'])->name('category')->middleware('auth');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');
Route::post('category', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');


// BLOGCATEGORIES
Route::get('blogCategory', [BlogCategoryController::class, 'index'])->name('blogCategory')->middleware('auth');
Route::get('blogCategory/create', [BlogCategoryController::class, 'create'])->name('blogCategory.create')->middleware('auth');
Route::post('blogCategory', [BlogCategoryController::class, 'store'])->name('blogCategory.store')->middleware('auth');


require __DIR__.'/auth.php';
