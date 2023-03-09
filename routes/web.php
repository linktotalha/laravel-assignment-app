<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Category routes
    Route::get('categories/create',[CategoryController::class,'create']);
    Route::post('categories/create',[CategoryController::class,'postCreate']);
    Route::get('category-list',[CategoryController::class,'list']);
    Route::get('delete-category',[CategoryController::class,'delete']);
    Route::get('edit-category',[CategoryController::class,'edit']);
    Route::post('edit-category',[CategoryController::class,'postEdit']);

    // product routes
    Route::get('products/create',[ProductController::class,'create']);
    Route::post('products/create',[ProductController::class,'postCreate']);
});

require __DIR__.'/auth.php';
