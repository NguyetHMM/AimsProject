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
        $orders = DB::table('orders')->where("userID", Auth::user()->id)->get();
        // dd(Auth::user()->id);
        return view('account::orderHistory');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }
}
