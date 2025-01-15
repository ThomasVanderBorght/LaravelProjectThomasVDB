<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheeseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;

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

Route::get('/newsUser', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {
    Route::get('admin/news', [NewsController::class, 'AdminIndex'])->name('news.index');
    Route::get('admin/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('admin/news/store-news', [NewsController::class, 'store'])->name('news.store');
    Route::get('admin/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('admin/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('admin/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

Route::middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {
    Route::get('admin/categories', [CategoryController::class, 'adminIndex'])->name('categories.index');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {
    Route::get('admin/faqs', [FaqController::class, 'adminIndex'])->name('faqs.index');
    Route::get('admin/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('admin/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('admin/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('admin/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('admin/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{categorie}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/kazen', [CheeseController::class, 'index'])->name('cheeses.index');

Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');

Route::middleware('auth')->group(function () {
    Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact.index');
});

require __DIR__.'/auth.php';
