<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('payment::checkout');
    }
    public function show()
    {
        $cities = DB::table('cities')->get();
        $districts = DB::table('districts')->get();
        $products = DB::table('cart_details')
            ->join('products', 'cart_details.productID', '=', 'products.id')
            ->join('users', 'cart_details.userID', '=', 'users.id')
            ->join('physical_products', 'physical_products.productID', '=', 'cart_details.productID')
            ->where('cart_details.userID', Auth::id())
            ->select('products.*', 'users.*', 'physical_products.*', 'cart_details.quantity as cart_quantity')
            ->get();
        $ship_fee = 0;
        // dd($products);
        return view('payment::checkout', [
            'cities' => $cities,
            'districts' => $districts,
            'products' => $products,
            'ship_fee' => $ship_fee
        ]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'phone' => 'required | numeric',
            'cities' => 'required',
            'district' => 'required',
            'description' => 'required'
        ]);
        // dd($request->all());
        DB::table('address')
            ->insert([
                'userID' => Auth::id(),
                'cityID' => $request->cities,
                'districtID' => $request->district,
                'description' => $request->description,
            ]);
        $address = DB::table('address')->get()->max();
        DB::table('orders')
            ->insert([
                'userID' => Auth::id(),
                'stateID' => 1,
                'addressID' => $address->id,
                'orderDate' => now(),
                'shipfee' => $request->ship_fee
            ]);
        $order = DB::table('orders')->get()->max();
        $products = DB::table('cart_details')->where('userID', Auth::id())->get();
        foreach ($products as $key => $value) {
            $p = DB::table('products')->where('id', $value->productID)->first();
            DB::table('order_details')->insert([
                'orderID' => $order->id,
                'productID' => $value->productID,
                'quantity' => $value->quantity,
                'price' => $p->price,
                'productName' => $p->title
            ]);
            $quantity = DB::table('physical_products')->where('productID', $value->productID)->first();
            DB::table('physical_products')->where('productID', $value->productID)->update(['quantity' => $quantity->quantity - $value->quantity]);
        }
        DB::table('cart_details')
            ->where('userID', Auth::id())
            ->delete();
        
        return \redirect()->route('orderHistory');
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
