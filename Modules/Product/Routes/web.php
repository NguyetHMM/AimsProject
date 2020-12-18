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

    Route::get('/book','ProductController@showBook')->name('showBook');
    Route::get('/cds','ProductController@showCDs')->name('showCDs');
    Route::get('/dvds','ProductController@showDVDs')->name('showDVDs');
    Route::get('/book/picture-books','ProductController@showPictureBook')->name('showPictureBook');
    Route::get('/book/comic','ProductController@showComic')->name('showComic');
    Route::get('/book/technology-books','ProductController@showTechnologyBook')->name('showTechnologyBook');
    Route::get('/addbook','AdminController@add_book')->name('addbook');
    Route::post('/search','ProductController@search')->name('search');
    //Admin route
    
    //Add route
    Route::get('/addbook-phy','AdminController@add_book_phy')->name('addbook-phy');
    Route::post('/savebook-phy','AdminController@save_book_phy')->name('savebook-phy');
    
    Route::get('/addbook-on','AdminController@add_book_on')->name('addbook-on');
    Route::post('/savebook-on','AdminController@save_book_on')->name('savebook-on');
    
    Route::get('/adddvd-phy','AdminController@add_dvd_phy')->name('adddvd-phy');
    Route::post('/savedvd-phy','AdminController@save_dvd_phy')->name('savedvd-phy');

    Route::get('/adddvd-on','AdminController@add_dvd_on')->name('adddvd-on');
    Route::post('/savedvd-on','AdminController@save_dvd_on')->name('savedvd-on');

    //Show route
    Route::get('/all-product','AdminController@all_product')->name('allproduct');
    Route::get('/all-book','AdminController@all_book')->name('allbook');
    Route::get('/all-dvd','AdminController@all_dvd')->name('alldvd');
    Route::get('/all-cd-lp','AdminController@all_cd_lp')->name('allcdlp');

});
