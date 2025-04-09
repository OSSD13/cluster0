<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinorCasesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('minor_cases')->insert([
            'mnc_personal_point' => 5.0,
            'mnc_card_detail' => 'แก้ไข UI หน้ารายงาน',
            'mnc_defect_detail' => 'ปุ่ม Submit ไม่ทำงาน',
            'mnc_point' => 2.0,
            'mnc__is_use' => 1,
            'mnc_uth_id' => 1,
            'mnc_spr_id' => 1,
        ]);
    }
}
