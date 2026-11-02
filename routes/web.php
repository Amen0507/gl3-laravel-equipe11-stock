<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Le tableau de bord
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Gestion des produits
Route::resource('products', ProductController::class);

// Gestion des catégories
Route::resource('categories', CategoryController::class)->except(['show']);
