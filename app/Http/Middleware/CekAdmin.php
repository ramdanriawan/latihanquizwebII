<?php

namespace App\Http\Middleware;

use Closure;

class CekAdmin
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
        if(\Auth::guard('admin')->check() == false)
        {
            return redirect('/login')->with('error','anda belum login'); //user belum login
        }  

        return $next($request);
    }
}
