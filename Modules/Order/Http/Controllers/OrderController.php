<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;

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
        // dd($product_details);
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

    public function resetCart(){
        DB::table('cart_details')->delete();
        return back()->with('info','Bạn vừa reset lại giỏ hàng thành công!');
    }
    public function deniedAddToCart(){
        // dd("vaof day");
        return back()->with('info','You added new items, follow next step!');
        // return \redirect()->route('productDetail',97)->with('message',"Loi gio hang");
    }
    public function addToCart(Request $request){

        $product_details = DB::table('products')
        ->join('cart_details','products.id','=','cart_details.productID')
        ->where('userID', Auth::user()->id)
        ->get();
        $add = DB::table('products')->where('id','=',$request->product_id)->get();
        foreach($product_details as $value){
            if($value->productTypeID != $add[0]->productTypeID){
                return \redirect()->action([OrderController::class, 'deniedAddToCart']);
            }
        }
        
        $cart_detail =[
            'userID' => Auth::user()->id,
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

