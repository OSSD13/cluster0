<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RememberMeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // ถ้า Remember Me เปิดอยู่ และ session user ไม่มี ให้ใช้ session จำไว้
        if (session('remember_user') && !session()->has('user')) {
            session(['user' => session('remember_user')]);
        }

        return $next($request);
    }
}
