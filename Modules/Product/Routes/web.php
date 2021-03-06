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

Route::prefix('product')->group(function() {
    Route::get('/a', 'ProductController@index')->middleware('AdminRole')->name('admin-index');
    Route::get('/ab', 'AdminController@delete_product')->name('delete-p');
    Route::get('/error','AdminController@error')->name('error');

    // show book route
    Route::get('show-book-physical/{productKind_id}','ProductController@showBookPhysical')->name('showBookPhysical');
    Route::get('show-book-online/{productKind_id}','ProductController@showBookOnline')->name('showBookOnline');
    Route::get('/book','ProductController@showBook')->name('showBook');

    // detail for each product
    Route::get('/product-detail/{product_id}','ProductController@productDetail')->name('productDetail');
    Route::get('/home','ProductController@home')->name('home');

    // show CD route
    Route::get('/cds','ProductController@showCDs')->name('showCDs');
    // Route::get('cds/online/{productKind_id}','ProductController@showCDOnline')->name('showCDOnline');
    // Route::get('cds/physical/{productKind_id}','ProductController@showCDPhysical')->name('showCDPhysical');

    // show DVDS route
    Route::get('/dvds','ProductController@showDVDs')->name('showDVDs');

    // show LPs Route
    Route::get('/lps','ProductController@showLPs')->name('showLPs');

    // search route
    Route::post('/search','ProductController@search')->name('search');
    Route::post('/search-product','ProductController@searchInShowProduct')->name('searchInShowProduct');
    Route::post('/serach-product-2','ProductController@searchInShowProduct2')->name('searchInShowProduct2');
    // filter product
    Route::get('/filter','ProductController@filterFollowPrice')->name('filterPrice');

    //Admin route
    Route::get('/addbook','AdminController@add_book')->middleware('AdminRole')->name('addbook');
    //Add route
    Route::get('/addbook-phy','AdminController@add_book_phy')->middleware('AdminRole')->name('addbook-phy');
    Route::post('/savebook-phy','AdminController@save_book_phy')->name('savebook-phy');
    
    Route::get('/addbook-on','AdminController@add_book_on')->middleware('AdminRole')->name('addbook-on');
    Route::post('/savebook-on','AdminController@save_book_on')->name('savebook-on');
    
    Route::get('/adddvd-phy','AdminController@add_dvd_phy')->middleware('AdminRole')->name('adddvd-phy');
    Route::post('/savedvd-phy','AdminController@save_dvd_phy')->name('savedvd-phy');

    Route::get('/adddvd-on','AdminController@add_dvd_on')->middleware('AdminRole')->name('adddvd-on');
    Route::post('/savedvd-on','AdminController@save_dvd_on')->name('savedvd-on');

    Route::get('/addcd-phy','AdminController@add_cd_phy')->middleware('AdminRole')->name('addcd-phy');
    Route::post('/savecd-phy','AdminController@save_cd_phy')->name('savecd-phy');

    Route::get('/addcd-on','AdminController@add_cd_on')->middleware('AdminRole')->name('addcd-on');
    Route::post('/savecd-on','AdminController@save_cd_on')->name('savecd-on');


    Route::get('/addlp-phy','AdminController@add_lp_phy')->middleware('AdminRole')->name('addlp-phy');
    Route::post('/savelp-phy','AdminController@save_lp_phy')->name('savelp-phy');

    Route::get('/addlp-on','AdminController@add_lp_on')->middleware('AdminRole')->name('addlp-on');
    Route::post('/savelp-on','AdminController@save_lp_on')->name('savelp-on');

    //Show route
    Route::get('/all-product','AdminController@all_product')->middleware('AdminRole')->name('allproduct');
    Route::get('/all-book','AdminController@all_book')->middleware('AdminRole')->name('allbook');
    Route::get('/all-dvd','AdminController@all_dvd')->middleware('AdminRole')->name('alldvd');
    Route::get('/all-cd-lp','AdminController@all_cd_lp')->middleware('AdminRole')->name('allcdlp');

    //Edit - Delete Product

    Route::get('/detail-pro/{product_id}','AdminController@show_product')->middleware('AdminRole');

    Route::post('/update-pro/{product_id}','AdminController@update_product')->name('update-product');


    //Promotion
    Route::get('/add-promotion','AdminController@add_promotion')->name('add-promotion');
    Route::post('/save-promotion','AdminController@save_promotion')->name('save-promotion');
    Route::get('/show-promotion','AdminController@show_promotion')->name('show-promotion');
});
