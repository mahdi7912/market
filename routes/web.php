<?php


use App\Http\Controllers\admin\ProductController;

use App\Http\Controllers\admin\BasementController;

use App\Http\Controllers\User\OrderController;

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


Route::prefix('order')->group(function() {

Route::post('/store',[OrderController::class , 'store'])->name('order_store');

Route::get('/create',[OrderController::class , 'create'])->name('order_create');
});


Route::prefix('users')->group(function() {


    Route::get('/create',[ProductListController::class , 'create'])->name('list_create');

    Route::get('/',[ ProductListController::class , 'index' ])->name('list_index');

    Route::post('/store',[ ProductListController::class , 'store' ])->name('list_store');

    Route::get('/edit/{Product_list}',[ ProductListController::class , 'edit' ])->name('list_edit');

    Route::get('/show/{Product_list}',[ ProductListController::class , 'show' ])->name('list_show');

    Route::post('/update/{Product_list}',[ ProductListController::class , 'update' ])->name('list_update');

    Route::get('/destroy/{Product_list}',[ ProductListController::class , 'destroy' ])->name('list_destroy');

});

Route::prefix('admin/basement')->group(function() {

    Route::get('/',[ BasementController::class , 'index' ])->name('admin_base_index');

    Route::get('/create',[BasementController::class , 'create'])->name('admin_base_create');

    Route::post('/store',[BasementController::class , 'store'])->name('admin_base_store');

    Route::get('/edit/{Basement}',[BasementController::class , 'edit'])->name('admin_base_edit');

    Route::post('/update/{Basement}',[BasementController::class , 'update'])->name('admin_base_update');

    Route::get('/destroy/{Basement}',[BasementController::class , 'destroy'])->name('admin_base_destroy');

});

Route::prefix('admin/product')->group(function() {

    Route::get('/create',[ProductController::class , 'create'])->name('admin_pro_create');

    Route::post('/store',[ProductController::class , 'store'])->name('admin_pro_store');

    Route::get('/edit/{Product}',[ProductController::class , 'edit'])->name('admin_pro_edit');

    Route::post('/update/{Product}',[ProductController::class , 'update'])->name('admin_pro_upload');

    Route::get('/destroy/{Product}',[ProductController::class , 'destroy'])->name('admin_pro_destroy');

});





Auth::routes();
