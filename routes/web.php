<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\WebHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
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


Route::group(['middleware'=>'localization'],function (){

//for website
Route::get('/', [WebHomeController::class, 'webHome'])->name('home');
Route::get('/switch-lang/{lang}', [WebHomeController::class, 'changeLanguage'])->name('switch.lang');

Route::post('/register', [WebHomeController::class, 'registration'])->name('registration');
Route::post('/login', [WebHomeController::class, 'login'])->name('user.login');

Route::get('/search',[WebHomeController::class,'search'])->name('user.search');
Route::get('/category-wise-product/{category_id}',[WebHomeController::class,'categoryWiseProducts'])->name('category.wise.products');
Route::get('/product/view/{product_id}',[WebHomeController::class,'productView'])->name('product.view');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/buy-form/{product_id}',[WebHomeController::class,'viewBuyForm'])->name('buy.form');
    Route::post('/order/create/{product_id}',[WebHomeController::class,'orderCreate'])->name('order.create');

    Route::get('/logout', [WebHomeController::class, 'logout'])->name('user.logout');
    Route::get('/profile',[WebHomeController::class,'profile'])->name('user.profile');
    Route::put('/profile/update',[WebHomeController::class,'updateProfile'])->name('profile.update');

});

});

//for admin panel
Route::get('/admin/login', [UserController::class, 'login'])->name('login');
Route::post('/admin/do-login', [UserController::class, 'doLogin'])->name('do.login');


// loging korte hobe and admin o hoite hobe
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

//    Route::group(['middleware' => 'checkAdmin'], function () {

        Route::get('/', [HomeController::class, 'home'])->name('dashboard');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/orders', [OrderController::class, 'list'])->name('admin.orders');
        Route::get('/users', [UserController::class, 'list'])->name('admin.users');
//        Route::get('/users/list', [UserController::class, 'listLoad'])->name('admin.users.list');
        Route::get('/create/user', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

        Route::get('/categories', [CategoryController::class, 'list'])->name('category.list');
        Route::get('/category/create', [CategoryController::class, 'createForm'])->name('category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/brand/list', [BrandController::class, 'list'])->name('brand.list');
        Route::get('/brand/create', [BrandController::class, 'showForm'])->name('brand.show.form');
        Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

        Route::get('/product/delete/{product_id}', [ProductController::class, 'deleteProduct'])->name('admin.product.delete');
        Route::get('/product/view/{product_id}', [ProductController::class, 'viewProduct'])->name('admin.product.view');
        Route::get('/product/edit/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/update/{product_id}', [ProductController::class, 'update'])->name('product.update');

        Route::get('/report',[OrderController::class,'report'])->name('order.report');
        Route::get('/report/search',[OrderController::class,'reportSearch'])->name('order.report.search');


        Route::resource('/roles',RoleController::class);
        Route::get('/role/assign/{id}',[RoleController::class,'showPermissions'])->name('role.assign');
        Route::get('/permissions',[PermissionController::class,'list'])->name('permission.list');
        Route::post('/permissions-assign/{role_id}',[RoleController::class,'assignPermissions'])->name('permissions.assign');
});

