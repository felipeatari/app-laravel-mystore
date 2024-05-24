<?php

use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;

// Default
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/product/{product:slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product');

// Admin
Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/products', [AdminProductController::class, 'create_req'])->name('admin.product.create_req');

Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
Route::put('/admin/products/product', [AdminProductController::class, 'edit_req'])->name('admin.product.edit_req');
