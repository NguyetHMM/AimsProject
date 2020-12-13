<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

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

    public function showCart(){
        $list_product_cart = DB::table('cart_details')
        ->join('products','cart_details.productID','=','products.id')
        ->select('productID','title','price')
        ->get();
        return view('order::showCart')->with('listProducts', $list_product_cart);
    }
    public function addToCart(Request $request){
        
        $cart_detail =[
            'userID' => 1,
            'productID' =>($request->product_id),
            'quantity' =>$request->qtybutton
        ];
        DB::table('cart_details')->insert($cart_detail);
        return redirect()->action([OrderController::class, 'showCart']);
    }

    
}
