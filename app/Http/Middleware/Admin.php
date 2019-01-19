<?php

namespace App\Http\Middleware;

use Closure;

class Member
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
        // cek jika sessi telah habis
        if (Cookie::get('membersession') === null && Cookie::get('membersession') === null && $request->username === null && $request->password === null)
        return redirect('/member/login');

        $auth = auth()->guard('member');
            
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        
        if ($auth->attempt($credentials)) {
            Cookie::queue(Cookie::make('membersession', 1, 120, '/'));
            Cookie::queue(Cookie::make('memberid', $auth->user()->id, 120, '/'));
            
            return $next($request);
        } else {
            return back()->with('error', "invalid credentials")->withCookie(Cookie::forget('membersession'))->withCookie(Cookie::forget('memberid'));
        }
    }
}
