<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('order::index');
    }
    public function cart()
    {
        $product_details = DB::table('products')
        ->join('cart_details','products.id','=','cart_details.productID')
        ->where('userID', 1)    // fake data
        ->get();
        return view('order::cart', compact('product_details'));
    }
    public function storeCart()
    {
        return view('order::cart');
    }
}

