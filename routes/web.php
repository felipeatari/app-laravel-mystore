<?php

use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;

// Default
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'show']);

// Admin
Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::get('/admin/products/edit', [AdminProductController::class, 'edit']);
