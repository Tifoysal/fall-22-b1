<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'home']);
Route::get('/orders',[OrderController::class,'list']);

Route::get('/users',[UserController::class,'list']);
Route::get('/create/user',[UserController::class,'create'])->name('user.create');


Route::get('/categories',[CategoryController::class,'list'])->name('category.list');
Route::get('/category/create',[CategoryController::class,'createForm']);

Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');



