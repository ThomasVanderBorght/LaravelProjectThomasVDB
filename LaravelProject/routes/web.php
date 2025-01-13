<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheeseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['user' => Auth::user()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {
    Route::get('users', [AdminController::class, 'index'])->name('users.index');
    Route::post('users/make-admin/{id}', [AdminController::class, 'makeAdmin'])->name('users.makeAdmin');
    Route::post('users/remove-admin/{id}', [AdminController::class, 'removeAdmin'])->name('users.removeAdmin');
    Route::get('users/create-user', [AdminController::class, 'createUser'])->name('users.createUser');
    Route::post('users/store-user', [AdminController::class, 'storeUser'])->name('users.storeUser');
});

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {
    Route::get('admin/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('admin/news/store-news', [NewsController::class, 'store'])->name('news.store');
    Route::get('admin/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('admin/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('admin/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{categorie}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/kazen', [CheeseController::class, 'index'])->name('cheeses.index');

require __DIR__.'/auth.php';
