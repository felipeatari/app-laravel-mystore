<?php

use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;

// Default
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/product/{product:slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product');

// Admin
Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
Route::get('/admin/products/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
