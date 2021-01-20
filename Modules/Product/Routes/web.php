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
    Route::get('/a', 'ProductController@index')->middleware(['UserRole','AdminRole'])->name('admin-index');
    Route::get('/ab', 'AdminController@delete_product')->middleware(['UserRole','AdminRole'])->name('delete-p');
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
    Route::get('/search','ProductController@search')->name('search');
    Route::get('/search-product','ProductController@searchInShowProduct')->name('searchInShowProduct');
    Route::get('/serach-product-2','ProductController@searchInShowProduct2')->name('searchInShowProduct2');
    // filter product
    Route::get('/filter','ProductController@filterFollowPrice')->name('filterPrice');

    //Admin route
    Route::get('/addbook','AdminController@add_book')->middleware(['UserRole','AdminRole'])->name('addbook');
    //Add route
    Route::get('/addbook-phy','AdminController@add_book_phy')->middleware(['UserRole','AdminRole'])->name('addbook-phy');
    Route::post('/savebook-phy','AdminController@save_book_phy')->name('savebook-phy');
    
    Route::get('/addbook-on','AdminController@add_book_on')->middleware(['UserRole','AdminRole'])->name('addbook-on');
    Route::post('/savebook-on','AdminController@save_book_on')->name('savebook-on');
    
    Route::get('/adddvd-phy','AdminController@add_dvd_phy')->middleware(['UserRole','AdminRole'])->name('adddvd-phy');
    Route::post('/savedvd-phy','AdminController@save_dvd_phy')->name('savedvd-phy');

    Route::get('/adddvd-on','AdminController@add_dvd_on')->middleware(['UserRole','AdminRole'])->name('adddvd-on');
    Route::post('/savedvd-on','AdminController@save_dvd_on')->name('savedvd-on');

    Route::get('/addcd-phy','AdminController@add_cd_phy')->middleware(['UserRole','AdminRole'])->name('addcd-phy');
    Route::post('/savecd-phy','AdminController@save_cd_phy')->name('savecd-phy');

    Route::get('/addcd-on','AdminController@add_cd_on')->middleware(['UserRole','AdminRole'])->name('addcd-on');
    Route::post('/savecd-on','AdminController@save_cd_on')->name('savecd-on');


    Route::get('/addlp-phy','AdminController@add_lp_phy')->middleware(['UserRole','AdminRole'])->name('addlp-phy');
    Route::post('/savelp-phy','AdminController@save_lp_phy')->name('savelp-phy');

    Route::get('/addlp-on','AdminController@add_lp_on')->middleware(['UserRole','AdminRole'])->name('addlp-on');
    Route::post('/savelp-on','AdminController@save_lp_on')->name('savelp-on');

    //Show route
    Route::get('/all-product','AdminController@all_product')->middleware(['UserRole','AdminRole'])->name('allproduct');
    Route::get('/all-book','AdminController@all_book')->middleware(['UserRole','AdminRole'])->name('allbook');
    Route::get('/all-dvd','AdminController@all_dvd')->middleware(['UserRole','AdminRole'])->name('alldvd');
    Route::get('/all-cd-lp','AdminController@all_cd_lp')->middleware(['UserRole','AdminRole'])->name('allcdlp');

    //Edit - Delete Product

    Route::get('/detail-pro/{product_id}','AdminController@show_product')->middleware(['UserRole','AdminRole']);

    Route::post('/update-pro/{product_id}','AdminController@update_product')->name('update-product');


    //Promotion
    Route::get('/add-promotion','AdminController@add_promotion')->middleware(['UserRole','AdminRole'])->name('add-promotion');
    Route::post('/save-promotion','AdminController@save_promotion')->name('save-promotion');
    
    Route::get('/show-promotion','AdminController@show_promotion')->middleware(['UserRole','AdminRole'])->name('show-promotion');
    Route::get('/add-promo-to-prod','AdminController@add_promo_to_prod')->middleware(['UserRole','AdminRole'])->name('add-promo-to-prod');
    
    //
    Route::post('/save-promotion-product','AdminController@save_promo_prod')->name('save-promotion-product');
    Route::get('/order-management','AdminController@order_management')->middleware(['UserRole','AdminRole'])->name('order-management');
    Route::get('/orderDetails/{orderID}', 'AdminController@orderDetails')->middleware(['UserRole','AdminRole'])->name('orderDetail');
    Route::get('/cancelOrder', 'AdminController@cancel')->middleware(['UserRole','AdminRole'])->name('cancelOrder');
    Route::get('/completeOrder', 'AdminController@complete')->middleware(['UserRole','AdminRole'])->name('completeOrder');

    Route::get('/adminActive','AdminController@admin_active')->middleware(['UserRole','AdminRole'])->name('admin-active');

});
