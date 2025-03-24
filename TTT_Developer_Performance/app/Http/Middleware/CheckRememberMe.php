<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class CheckRememberMe
{
    public function handle(Request $request, Closure $next)
    {
        // ถ้า session remember_token มีค่า
        if (session()->has('remember_token')) {
            // ดึงข้อมูลผู้ใช้ที่มี user_id จาก remember_token
            $user = Users::find(session('remember_token'));
            if ($user) {
                // ถ้าพบผู้ใช้ให้ล็อกอินอัตโนมัติ
                Auth::login($user);
            }
        }

        return $next($request);
    }
}
