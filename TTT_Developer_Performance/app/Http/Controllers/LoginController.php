<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Http\Controllers\DashboardController;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $req)
    {
        // ตรวจสอบค่าที่รับเข้ามา
        $validated = $req->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'remember' => 'nullable|boolean', // เช็คว่ามี remember หรือไม่
        ]);

        // ค้นหาผู้ใช้จาก username หรือ email
        $user = Users::where('usr_username', $validated['username'])
                    ->first();

        // ตรวจสอบรหัสผ่าน
        if ($user && Hash::check($validated['password'], $user->usr_password)) {
            //return view('pages.dashboard.testerDashboard', compact('user'));
            Auth::login($user, $req->filled('remember'));
            $req->session()->regenerate();
            if ($user) {
                // ตรวจสอบ role
                if ($user->usr_role === 'Tester') {
                    return $this->dashPoint();
                } elseif ($user->usr_role === 'Developer') {
                    return view('pages.dashboard.dashboard', compact('user'));
                } else {
                    // ถ้า role ไม่ตรงที่คาดไว้
                    return view('auth.pending');
                }
            }
        } else {
            return view('auth.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->forget(['remember_token']);
        return redirect()->route('login');
    }

    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = Users::where('usr_google_id', $googleUser->id)->first();

            if ($user) {
                // ตรวจสอบ role
                if ($user->usr_role === 'Tester') {
                    return $this->dashPoint();
                    //return view('pages.dashboard.testerDashboard', compact('user'));
                } elseif ($user->usr_role === 'Developer') {
                    return $this->developer();
                    //return view('pages.dashboard.dashboard', compact('user'));
                } else {
                    // ถ้า role ไม่ตรงที่คาดไว้
                    return view('auth.pending');
                }
            } else {
                // ยังไม่เคยลงทะเบียน
                session([
                    'usr_google_id' => $googleUser->id
                ]);
                return view('auth.registerWithGoogle_step2', compact('googleUser'));
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function dashPoint(){
        $allPoints = DB::table('points_current_sprint')
                    ->join('user_team_history', 'points_current_sprint.pcs_uth_id', '=', 'user_team_history.uth_id')
                    ->join('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
                    ->select(
                        'usr_username',
                        'pcs_pass',
                        'pcs_bug',
                        'pcs_cancel',
                        DB::raw('(pcs_pass + pcs_bug - pcs_cancel) AS point_all')
                    )
                    ->get();

                // คำนวณ total values
                $totalPointAll = $allPoints->sum('pcs_pass') + $allPoints->sum('pcs_bug') + $allPoints->sum('pcs_cancel');
                $totalPass = $allPoints->sum('pcs_pass');
                $totalBug = $allPoints->sum('pcs_bug');
                $totalCancel = $allPoints->sum('pcs_cancel');
                $teamAmount = Team::all()->count();  // จำนวนทีม

                // สร้าง array สำหรับ chart
                $chartData = [
                    'Point_All' => $allPoints->pluck('point_all'),
                    'Pass' => $allPoints->pluck('pcs_pass'),
                    'Bug' => $allPoints->pluck('pcs_bug'),
                    'categories' => $allPoints->pluck('usr_username'),
                ];

                $personal = DB::table('points_current_sprint')
                ->join('user_team_history', 'points_current_sprint.pcs_uth_id', '=', 'user_team_history.uth_id')
                ->join('users', 'user_team_history.uth_usr_id', '=', 'users.usr_id')
                ->join('teams', 'user_team_history.uth_tm_id', '=', 'teams.tm_id') // เข้าร่วมตาราง teams เพื่อดึงชื่อทีม
                ->select(
                    'users.usr_username',
                    DB::raw('(pcs_pass + pcs_bug - pcs_cancel) AS point_all'),
                    'pcs_pass',
                    'pcs_bug',
                    'teams.tm_name AS team'
                )
                ->get();

                // ส่งข้อมูลไปยัง view
                return view('pages.dashboard.testerDashboard', compact('chartData', 'totalPointAll', 'totalPass', 'totalBug', 'totalCancel', 'teamAmount', 'personal'));
    }

    public function developer(){
        return view('pages.dashboard.dashboard');
    }
}
