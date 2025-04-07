<?php

namespace App\Http\Controllers;

//use App\Models\Card;
//use App\Models\Team;
//use App\Models\SettingTrello;
use Illuminate\Http\Request;

class RevisionHistoryController extends Controller
{
    public function index(Request $request)
    {
       /*
        // รับค่า Filter ที่ส่งมาจาก Dropdown
        $year = $request->input('year');
        $sprint = $request->input('sprint');
        $version = $request->input('version');

        // สร้าง query เพื่อดึงข้อมูลตามฟิลเตอร์
        $query = Card::query();

        // ฟิลเตอร์ตามปี
        if ($year) {
            $query->whereYear('updated_at', $year);
        }

        // ฟิลเตอร์ตาม Sprint
        if ($sprint) {
            $query->where('sprint', $sprint);
        }

        // ฟิลเตอร์ตาม Version
        if ($version) {
            $query->where('version', $version);
        }

        // ดึงข้อมูลทั้งหมด
        $revisionHistory = $query->get();
        */

        // ส่งข้อมูลไปยัง View
        return view('pages.setting.revisionHistory');
    }
}
