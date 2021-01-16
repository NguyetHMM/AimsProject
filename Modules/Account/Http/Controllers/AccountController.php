<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
//sửa
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
//use Auth;
//use Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('account::index');
    }

    public function register()
    {
        return view('account::register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'roleID' => 2
        ]);
        return redirect()->route('login')->with('success', 'Create Account Successfully! Login to Continue! ');
    }

    public function login()
    {
        return view('account::login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->roleID == 1) {
                return redirect()->route('welcome');
            } else {
                return redirect()->route('welcome');
            }
        }
        return redirect()->route('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function userProfile()
    {
        return view('account::userProfile');
    }

    public function storeUserProfile(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'phonenumber' => 'required|numeric',
        ]);
        User::where('email', Auth::user()->email)
            ->update([
                'name' => $request->name,
                'phonenumber' => $request->phonenumber,
            ]);
        Auth::user()->phonenumber = $request->phonenumber;
        return redirect(route('userProfile'))->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function orderHistory()
    {
        $orders = DB::table('orders')
                    ->join('order_states', 'orders.stateID', '=', 'order_states.id')
                    ->select('orders.*', 'order_states.name')
                    ->where("userID", 1)->get();
        // dd($orders);
        return view('account::orderHistory', \compact('orders'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function cancel(Request $request)
    {   
        $id = $request->id;
        // Get state --> validate change state
        $order = DB::table('orders')
                    ->join('order_states', 'orders.stateID', '=', 'order_states.id')
                    ->select('orders.*', 'order_states.name')
                    ->where("orders.id", $id)->get();
        if($order[0]->name === "Đang giao dịch"){
            $state = DB::table('order_states')
                ->where('name', 'Đã hủy')
                ->get();
            DB::table('orders')
                    ->where("orders.id", $id)
                    ->update([
                        'stateID' => $state[0]->id
                    ]);
            // Success
            return \response()->json([
                'data' => "Đã Huỷ",
            ], 200);
        }else{
            return \response()->json([
            ], 403);
        }
    }

    public function orderDetails(Request $request)
    {
        $products = DB::table('order_details')
            ->where('orderID', $request->orderID)
            ->get();
        $ship_fee = DB::table('orders')
                    ->where('id', $request->orderID)
                    ->select('shipfee')
                    ->get();
        return view('account::orderDetails', [
            'products' => $products,
            'ship_fee' => $ship_fee[0]->shipfee,
        ]);
    }
}
