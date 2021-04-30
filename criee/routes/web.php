<?php

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

Route::get('post/', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('post/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::get('post/show/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('post/edit/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::post('post/', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::patch('post/show/{id}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('post/{id}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

// authentication
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// cart
Route::get('cart/{id}', [App\Http\Controllers\cartController::class, 'show'])->name('cart.show');
//enchere
Route::post('enchere/', [App\Http\Controllers\EnchereController::class, 'store'])->name('enchere.store');
