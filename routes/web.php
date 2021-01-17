<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    $bookKinds = DB::table('product_kinds')
    ->where('productCategoryID',3)
    ->get();
    $dvdKinds = DB::table('product_kinds')
    ->where('productCategoryID',2)->get();
    $cdKinds = DB::table('product_kinds')
    ->where('productCategoryID',1)->get();
    $lpKinds = DB::table('product_kinds')
    ->where('productCategoryID',1)->get();
    // dd($bookKinds);
    return view('welcome',compact('bookKinds','dvdKinds','cdKinds','lpKinds'));
})->name('welcome');


Route::get('/all-product',function(){
    $allProduct = DB::table('products')->paginate(12);

    return view('showAllProduct',compact('allProduct'));
})->name('showAllProduct');

