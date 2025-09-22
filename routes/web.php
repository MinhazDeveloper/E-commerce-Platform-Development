<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubcategoryController::class);
Route::resource('products', ProductController::class);

// নতুন grouped product view
Route::get('/all-products', [ProductController::class, 'groupedProducts'])->name('products.grouped');

// Subcategory অনুযায়ী products
Route::get('/subcategory/{subcategory:slug}', [ProductController::class, 'bySubcategory'])->name('products.bySubcategory');

