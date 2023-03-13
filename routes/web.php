<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCon;
use App\Http\Controllers\CategoryCon;
use App\Http\Controllers\frontendController;

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

// routes only accessable by admin using package spatie
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware(['role:admin'])->group(function () {
    Route::resource('categories',CategoryCon::class);
    Route::get('category-list',[CategoryCon::class,'getAllCategories']);

    Route::resource('products',ProductCon::class);
    Route::get('product-list',[ProductCon::class,'getAllProducts']);
});

Route::get('category-list',[frontendController::class,'categoryList']);
Route::get('category_products/{id}',[frontendController::class,'categoryproducts']);
Route::get('product-detail-page/{id}',[frontendController::class,'productdetails']);
Route::post('add_comment',[frontendController::class,'addcomment']);
Route::get('comments/{id}',[frontendController::class,'showComments']);

require __DIR__.'/auth.php';
