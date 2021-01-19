<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\Session\Session as SessionSession;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;
use Illuminate\Support\Facades\Session;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $citys=DB::table('tbl_tinhthanhpho')->orderBy('matp','ASC')->get();
        $money=DB::table('');
        return view('payment::checkout')->with(compact('citys'));
    }
    public function select_delivery_done(Request $request){
        $data=$request->all();
        if($data['matp']){
            $fee_ship=DB::table('feeship')->where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_maxp',$data['maxp'])->get();
            foreach($fee_ship as $key => $fee){
                Session::put('fee',$fee->fee_feeship);
                Session::save();
            }
        }

    }
    public function select_delivery(Request $request){
        $data=$request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province=DB::table('tbl_quanhuyen')->where('matp',$data['ma_id'])->orderBy('maqh','ASC')->get();
                $output.='<option>--Provence--</option>';
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
    public function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('address_payment')
        ->where('city_address', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '<li><a href="#">'.$row->city_address.'</a></li>';
      }
      $output .= '</ul>';
      echo $output;
     }
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
