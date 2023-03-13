<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("register",[ApiController::class,'register']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('single-category/{id}',[ApiController::class,'getSingleCategory']);
    Route::get('all-categories',[ApiController::class,'getAllCategories']);
    Route::get('single-product/{id}',[ApiController::class,'getSingleProduct']);
    Route::get('all-products',[ApiController::class,'getAllProducts']);
});
