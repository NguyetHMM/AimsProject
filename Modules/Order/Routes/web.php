<?php

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
    Route::GET('/show-cart', 'OrderController@showCart')->name('showCart');
    Route::POST('/show-cart', 'OrderController@addToCart')->name('addToCart');
});
