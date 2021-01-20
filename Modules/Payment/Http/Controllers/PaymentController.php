<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Contracts\Session\Session as SessionSession;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;
use Illuminate\Support\Facades\Session;
use Modules\Order\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $citys=DB::table('tbl_tinhthanhpho')->orderBy('matp','ASC')->get();
        $product_details = DB::table('products')
        ->join('cart_details','products.id','=','cart_details.productID')
        ->where('userID', Auth::user()->id)
        ->get();
        return view('payment::checkout')->with('citys',$citys)->with('product_details',$product_details);
    }
    public function select_delivery_done(Request $request){
        $data=$request->all();
        //$output = 0;
        if($data['matp']){
            $fee_ship=DB::table('feeship')->where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_maxp',$data['maxp'])->get();
            foreach($fee_ship as $key => $fee){
                Session::put('fee',$fee->fee_feeship);
                Session::save();
            // //     $output.=$;

             }

        }

    }
    public function select_delivery(Request $request){
        $data=$request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province=DB::table('tbl_quanhuyen')->where('matp',$data['ma_id'])->orderBy('maqh','ASC')->get();
                $output.='<option>--Provenced--</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';

                }
            }else{
                $select_wards=DB::table('tbl_xaphuongthitran')->where('maqh',$data['ma_id'])->orderBy('xaid','ASC')->get();
                $output.='<option>--Wards--</option>';
                foreach($select_wards as $key => $wards){
                    $output.='<option value="'.$wards->xaid.'">'.$wards->name_xa.'</option>';

                }
            }
        }
        echo $output;
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
        return back()->with('info','Bạn vừa reset giỏ hàng thành công!');
    }
    public function deniedAddToCart(){
        return back()->with('error','You added new items, follow next step!');
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
                return redirect()->action([OrderController::class, 'deniedAddToCart']);
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

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('payment::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
       // $data = DB::table('order_detail')->where('order_id',1)->get();
        return view('payment::checkout');//->with('products', $data);//->with('products', $data_product);
        /*return view('payment::show');*/
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('payment::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

}
