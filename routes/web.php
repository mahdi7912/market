<?php


use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\BasementController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\User\ProductListController;

use Illuminate\Support\Facades\Auth;
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


Route::post('/users/login',[OrderController::class , 'login']);

Route::post('/list/{user}',[OrderController::class , 'store']);

Route::get('/list/{user}',[OrderController::class , 'create']);


Route::middleware('auth')->prefix('users')->group(function() {

    Route::get('/create',[ProductListController::class , 'create'])->name('list_create');

    Route::get('/',[ ProductListController::class , 'index' ])->name('list_index');

    Route::post('/store',[ ProductListController::class , 'store' ])->name('list_store');

    Route::get('/edit/{productList}',[ ProductListController::class , 'edit' ])->name('list_edit');

    Route::get('/show/{productList}',[ ProductListController::class , 'show' ])->name('list_show');

    Route::put('/update/{productList}',[ ProductListController::class , 'update' ])->name('list_update');

    Route::delete('/destroy/{productList}',[ ProductListController::class , 'destroy' ])->name('list_destroy');

});

Route::middleware('auth')->prefix('user/order')->group(function() {

    Route::get('/',[ \App\Http\Controllers\User\OrderController::class , 'index' ]);

    Route::get('/{order}',[ \App\Http\Controllers\User\OrderController::class , 'show' ]);

});

Route::middleware('auth')->prefix('admin/basement')->group(function() {

    Route::get('/',[ BasementController::class , 'index' ])->name('admin_base_index');

    Route::get('/create',[BasementController::class , 'create'])->name('admin_base_create');

    Route::post('/store',[BasementController::class , 'store'])->name('admin_base_store');

    Route::get('/edit/{Basement}',[BasementController::class , 'edit'])->name('admin_base_edit');

    Route::post('/update/{Basement}',[BasementController::class , 'update'])->name('admin_base_update');

    Route::get('/destroy/{Basement}',[BasementController::class , 'destroy'])->name('admin_base_destroy');

});

Route::middleware('auth')->prefix('admin/product')->group(function() {

    Route::get('/',[ProductController::class , 'index']);

    Route::get('/create',[ProductController::class , 'create']);

    Route::post('/store',[ProductController::class , 'store'])->name('admin_pro_store');

    Route::get('/edit/{product}',[ProductController::class , 'edit'])->name('admin_pro_edit');

    Route::put('/update/{product}',[ProductController::class , 'update'])->name('admin_pro_upload');

    Route::delete('/destroy/{product}',[ProductController::class , 'destroy'])->name('admin_pro_destroy');

});

Route::middleware('auth')->prefix('admin/user')->group(function() {

    Route::get('/',[UserController::class , 'index']);

    Route::get('/create',[UserController::class , 'create']);

    Route::post('/store',[UserController::class , 'store']);

    Route::get('/edit/{user}',[UserController::class , 'edit']);

    Route::put('/update/{user}',[UserController::class , 'update']);

    Route::delete('/destroy/{user}',[UserController::class , 'destroy']);

});

Auth::routes();
