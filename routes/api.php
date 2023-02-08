<?php

use App\Http\Controllers\AddToCart\CartController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Shipment\ShipmentController;
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
    Route::controller(CustomerController::class)->group(function(){
    Route::post('/customer/logout','logout')->name('logout');
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

    Route::controller(CartController::class)->group(function(){
        Route::get('/cart/list','cartList')->name('cartList');
        Route::post('/addtoCart','cart')->name('cart');
        Route::post('/update/quantity','productQuantity')->name('quantity');
        Route::post('/single/delete','singleDelete')->name('singleDelete');
        Route::post('/bulk/delete','bulkDelete')->name('bulkDelete');
    });

    Route::controller(ShipmentController::class)->group(function(){
        Route::post('/create/shipment','createAddress')->name('createShipment');
        Route::get('/address/list','addressList')->name('list');
        Route::post('/update/shipment/address','updateAddress')->name('createShipment');
        Route::post('/delete/address','deleteAddress')->name('deleteAddress');

    });

    Route::post('/pay', [PaymentController::class, 'pay'])->name('payment');
    Route::get('/success', [PaymentController::class, 'success'])->name('success');
    Route::get('error', [PaymentController::class, 'error'])->name('error');
});

Route::controller(ApiController::class)->group(function(){
    Route::post('/register/account','register')->name('register');
    Route::post('/verify/account','verifyOtp')->name('verifyOtp');
    Route::post('/login','login')->name('login');
    Route::post('/update/password','updatePasswordRequest')->name('update');
    Route::post('/update','updatePassword')->name('updated');
});

Route::controller(CustomerController::class)->group(function(){
    Route::post('/customer/register','register')->name('register');
    Route::post('/verify/customer/account','verifyOtp')->name('verifyOtp');
    Route::post('/customer/login','login')->name('login');
    Route::post('/customer/update/password','updatePasswordRequest')->name('update');
    Route::post('/customer/update','updatePassword')->name('updated');
});
