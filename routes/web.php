<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('/add', [ProductController::class, 'add'])->name('products.add');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/save', [ProductController::class, 'save'])->name('products.save');
    Route::put('/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
    //Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});

