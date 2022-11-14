<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/do-login',[UserController::class,'doLogin'])->name('do.login');


Route::group(['middleware'=>'auth'],function (){

    Route::get('/logout',[UserController::class,'logout'])->name('logout');

    Route::get('/',[HomeController::class,'home'])->name('dashboard');
    Route::get('/orders',[OrderController::class,'list']);
    Route::get('/users',[UserController::class,'list']);
    Route::get('/create/user',[UserController::class,'create'])->name('user.create');
    Route::get('/categories',[CategoryController::class,'list'])->name('category.list');
    Route::get('/category/create',[CategoryController::class,'createForm']);
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/brand/list',[BrandController::class,'list'])->name('brand.list');
    Route::get('/brand/create',[BrandController::class,'showForm'])->name('brand.show.form');
    Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');

});
