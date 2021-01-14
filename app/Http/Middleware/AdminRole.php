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
        // dd(Auth::user()->roleID);
        if(Auth::user()->roleID == 1){
            return $next($request);
        } else {
            // abort(403);
            return \redirect()->route('welcome')->with('message',"Bạn đéo được truy cập trang Admin đâu!!!");
        }
        
    }
}
