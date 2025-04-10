<?php

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class CheckLogin
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
        // ตรวจสอบว่าผู้ใช้ login แล้ว
        if (!Auth::check()) {
            return redirect('/login');
        }

        // ดึง user ที่ login
        $user = Auth::user();

        // ตรวจสอบว่า role ไม่ใช่ Tester หรือ Developer
        if (!in_array($user->usr_role, ['Tester', 'Developer'])) {
            return redirect('login');
        }

        return $next($request);
    }
}
