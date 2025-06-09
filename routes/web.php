<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('posts', [PostController::class, 'index'])->name('post.index');
Route::post('posts', [PostController::class, 'store'])->name('post.store');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('posts/{post}/update', [PostController::class, 'update'])->name('post.update');
Route::delete('posts/{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('posts/{post}', [PostController::class, 'show'])->name('post.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
