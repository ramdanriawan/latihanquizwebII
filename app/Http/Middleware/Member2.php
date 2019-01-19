<?php

namespace App\Http\Middleware;

use Closure;

class Member2
{
    
    public function handle($request, Closure $next)
    { 
        if ( auth()->guard('member2')->check() ) {
 dd(Auth()->guard('member2')->user()->email);
            if ( $request->path() == 'member/daftar' )
                return redirect('member/beranda');
            else 
                return $next($request);
        }
        
        return redirect('member/login')->with('error', 'Credentials are Invalid!');
    }
}
