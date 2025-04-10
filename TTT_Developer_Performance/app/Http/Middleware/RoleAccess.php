<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class RoleAccess
{
    protected $role;

    public function __construct()
    {
        // ไม่ต้องกำหนด role ตรงนี้ เพราะเราจะส่งจาก route
    }

    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = session('user');

        // ถ้า role ของผู้ใช้ ไม่อยู่ในรายการที่กำหนด
        if (!in_array(strtolower($user->user_type), array_map('strtolower', $roles))) {
            return view('auth.pending');
        }

        return $next($request);
    }
}
