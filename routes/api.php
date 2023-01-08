<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/get-products',[ProductController::class,'getProducts']);
Route::post('/product-create',[ProductController::class,'storeProduct']);
//get a single product
Route::get('/product/view/{id}',[ProductController::class,'viewProduct']);

//delete a product
Route::get('/product/delete/{id}',[ProductController::class,'deleteProduct']);

//update product
Route::put('/update-product/{id}',[ProductController::class,'update']);
