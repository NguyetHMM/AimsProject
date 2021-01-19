<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(!Auth::check()){
            return \redirect()->route('welcome')->with('message',"Vui lòng đăng nhập để thực hiện chức năng này!");
        }
        // dd(Auth::user()->roleID);
        else if(Auth::user()->roleID == 1){
            return $next($request);
        } else {
            // abort(403);
            return \redirect()->route('welcome')->with('message',"Bạn không có quyền truy cập trang Admin!");
        }
        
        
    }
}
