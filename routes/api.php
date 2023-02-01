<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Product\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){

    Route::controller(ApiController::class)->group(function(){
    Route::post('/logout','logout')->name('logout');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::post('/create/category','createCategory')->name('createcategory');
        Route::get('/edit/category/{id}', 'editCategory')->name('editCategory');
        Route::post('/update/category/{id}', 'updateCategory')->name('updateCategory');
        Route::post('/delete/category', 'deleteCategory')->name('deleteCategory');
        Route::get('/categoy/list','categoryList')->name('list');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::post('/create/product','createProduct')->name('createProduct');
        Route::post('/delete/product','deleteProduct')->name('deleteProduct');
        Route::get('/product/list','productListing')->name('productListing');
        Route::post('/edit/product','editProduct')->name('editProduct');
        Route::post('/update/product','updateProduct')->name('updateProduct');
    });
});

Route::controller(ApiController::class)->group(function(){
    Route::post('/register/account','register')->name('register');
    Route::post('/verify/account','verifyOtp')->name('verifyOtp');
    Route::post('/login','login')->name('login');
    Route::post('/update/password','updatePasswordRequest')->name('update');
    Route::post('/update','updatePassword')->name('updated');
});
