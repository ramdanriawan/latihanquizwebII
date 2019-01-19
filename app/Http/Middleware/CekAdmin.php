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
        if (!auth()->guard('admin'))
            return redirect('/'); //user bukan admin
        
        return $next($request);
    }
}
