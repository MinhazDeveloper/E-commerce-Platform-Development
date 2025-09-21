<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubcategoryController::class);

