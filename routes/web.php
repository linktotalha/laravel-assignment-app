<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryCon;
use App\Http\Controllers\ProductCon;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['role:admin'])->group(function () {
    // Category resource routes
    Route::resource('categories',CategoryCon::class);
    Route::get('category-list',[CategoryCon::class,'getAllCategories']);

    // Products resource routes
    Route::resource('products',ProductCon::class);
    Route::get('product-list',[ProductCon::class,'getAllProducts']);


    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // product routes
    // Route::get('products/create',[ProductController::class,'create']);
    // Route::post('products/create',[ProductController::class,'postCreate']);
    // Route::get('product-list',[ProductController::class,'list']);
    // Route::get('delete-product',[ProductController::class,'delete']);
    // Route::get('edit-product',[ProductController::class,'edit']);
    // Route::post('edit-product',[ProductController::class,'postEdit']);
    // Route::get('product-hello',[ProductController::class,'delete']);
});

require __DIR__.'/auth.php';
