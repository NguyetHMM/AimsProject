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

Route::prefix('product')->group(function() {
    Route::get('/a', 'ProductController@index')->name('index');
    Route::get('/product-detail/{product_id}','ProductController@productDetail')->name('productDetail');
    // Route::get('/product-detail/{}','ProductController@processRequestDetail')->name('processRequestDetail');
    Route::get('/home','ProductController@home')->name('home');
    Route::get('show-book','ProductController@showBook')->name('showBook');


    //Admin route
    Route::get('/addbook','AdminController@add_book')->name('addbook');
});
