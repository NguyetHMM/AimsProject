<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UserRole
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
        if(Auth::check()){
            return $next($request);
        } else {
            // abort(403);
            return \redirect()->route('welcome')->with('message',"Bạn phải đăng nhập để thực hiện chức năng này");
        }
    }
}
