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
        ->where('userID', Auth::user()->id)
        ->get();
        return view('order::cart', compact('product_details'));
    }
    public function storeCart(Request $request)
    {
        $data=array();
        $product_count = $request->product_count;
        for($i = 0; $i < $product_count; $i++){
            $data['userID']= Auth::user()->id;
            $data['productID']=$request['hidden_product'.$i];
            $data['quantity']=$request['number_select'.$i];
            DB::table('cart_details')->where(['productID' => $data['productID'],'userID' => $data['userID']])->update($data);
        }
        return redirect()->action([OrderController::class, 'cart']);

    }

    public function addToCart(Request $request){

        $cart_detail =[
            'userID' => 1,
            'productID' =>($request->product_id),
            'quantity' =>$request->qtybutton
        ];
        DB::table('cart_details')->insert($cart_detail);
        return redirect()->action([OrderController::class, 'cart']);
    }

    public function deleteFromCart($productID){
        DB::table('cart_details')->where('productID', $productID)->delete();
        return \redirect()->action([OrderController::class, 'cart']);
    }

}

