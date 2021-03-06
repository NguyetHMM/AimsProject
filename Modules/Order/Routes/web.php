<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

    Route::get('/', 'OrderController@index');

    Route::get('/cart','OrderController@cart')->name('cart');
    Route::post('/cart','OrderController@storeCart');
    Route::get('/cart-reset','OrderController@resetCart')->name('resetCart');

    Route::post('/show-cart','OrderController@addToCart')->name('addToCart');
    Route::get('/deleteFromCart/{productID}','OrderController@deleteFromCart')->name('deleteFromCart');
    Route::get('/deniedAddToCart','OrderController@deniedAddToCart')->name('deniedAddToCart');

});
