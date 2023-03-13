<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::middleware(['role:admin'])->group(function () {
    Route::get('categories/create',[CategoryController::class,'create']);
    Route::post('categories/create',[CategoryController::class,'postCreate']);
    Route::get('category-list',[CategoryController::class,'list']);
    Route::get('delete-category',[CategoryController::class,'delete']);
    Route::get('edit-category',[CategoryController::class,'edit']);
    Route::post('edit-category',[CategoryController::class,'postEdit']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

});

Route::get('category-list',[frontendController::class,'categoryList']);
Route::get('category_products/{id}',[frontendController::class,'categoryproducts']);
Route::get('product-detail-page/{id}',[frontendController::class,'productdetails']);
Route::post('add_comment',[frontendController::class,'addcomment']);
Route::get('comments/{id}',[frontendController::class,'showComments']);


Route::get('regform',function(){
    return view('regform');
});

Route::post('regform',[ApiController::class,'register']);


require __DIR__.'/auth.php';
