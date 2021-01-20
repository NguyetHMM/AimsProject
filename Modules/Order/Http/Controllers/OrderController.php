<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use App\Models\CartDetails;

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
        $max_quantity = array();
        if($product_details[0]->productTypeID == 2){
            foreach ($product_details as $key => $value) {
                $a = DB::table('physical_products')->where('productID', $value->id)->get();
                array_push($max_quantity, $a[0]->quantity);
                
            }
            // dd($max_quantity);
        }
        return view('order::cart', compact('product_details','max_quantity'));
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
        return back()->with('success','Bạn vừa reset giỏ hàng thành công!');
    }
    public function deniedAddToCart(){
        return back()->with('warning','You added new items, follow next step!');
        // return \redirect()->route('productDetail',97)->with('message',"Loi gio hang");
    }
    public function addToCart(Request $request){
        // dd($request->all());
        $product_details = DB::table('products')
        ->join('cart_details','products.id','=','cart_details.productID')
        ->where('userID', Auth::user()->id)
        ->get();
        
        $add = DB::table('products')->where('id',$request->product_id)->get();
        // dd($add);

        // check kiểu sản phẩm ở trong giỏ hàng
        foreach($product_details as $value){
            if($value->productTypeID != $add[0]->productTypeID){
                return \redirect()->action([OrderController::class, 'deniedAddToCart']);
            }
        }
        // check so luong trong kho
        $qtyInWareHouse = DB::table('physical_products')
        ->where('productID',$request->product_id)
        ->select('quantity')->get();
        // dd($qtyInWareHouse[0]->quantity);

        if($qtyInWareHouse[0]->quantity < $request->qtybutton){
            return back()->with('error','Số lượng vượt quá số lượng hàng còn lại trong kho');
        } else {
            foreach($product_details as $value){
                if($value->id == $request->product_id){
                    $select = DB::table('cart_Details')
                    ->where('productID',$value->id)->select('quantity')->get();
                    $toUpdate = $select[0]->quantity+$request->qtybutton;
                    DB::table('cart_Details')
                    ->where('productID',$value->id)
                    ->update(['quantity' => $toUpdate]);

                    return redirect()->action([OrderController::class, 'cart']);
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
    }

    public function addToCartOnline(Request $request){
        // dd($request->all());
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
        foreach($product_details as $value){
            if($value->id == $request->product_id){
                return back()->with('info','Sản phẩm Online này đã có trong giỏ hàng của bạn');
            }
        }
        $cart_detail =[
            'userID' => Auth::user()->id,
            'productID' =>($request->product_id),
            'quantity' => 1
        ];
        DB::table('cart_details')->insert($cart_detail);
        return redirect()->action([OrderController::class, 'cart']);
    }

    public function deleteFromCart($productID){
        DB::table('cart_details')->where('productID', $productID)->delete();
        return \redirect()->action([OrderController::class, 'cart']);
    }

}

