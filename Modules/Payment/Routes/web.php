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

Route::prefix('payment')->group(function() {
    Route::get('/', 'PaymentController@index');

    //Route::get('/checkout','PaymenController@show')->name('show');
    //Route::post('/checkout','PaymentController@authenticate');
    //Route::get('/autocomplete', 'AutocompleteController@index');
    Route::post('/select_delivery', 'PaymentController@select_delivery')->name('payment.select_delivery');

//    Route::post('/fetch', 'PaymentController@fetch')->name('payment.fetch');
});
// Route::get('/', function () {
//     return view('payment:in');
// });

// Route::get('/checkout', 'AutocompleteController@index');
// Route::post('/checkout/fetch', 'PaymentModuleController@fetch')->name('payment.fetch');
