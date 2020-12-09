<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

    public function register(){
        return view('account::register');
      }
  
public function storeUser(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required',
    ]);
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => 1
    ]);
       return redirect()->route('welcome');
    }

public function login(){
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
        // if(Auth::user()->role_id == 0){
        //     return redirect()->route('welcome');
        // }
        // else{
            return redirect()->route('welcome');
        // }
    }

    return redirect()->route('login')->with('error', 'Oppes! You have entered invalid credentials');
}
}
