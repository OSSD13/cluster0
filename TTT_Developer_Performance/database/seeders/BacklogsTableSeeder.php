<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BacklogsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('backlogs')->insert([
            'blg_pass_point' => 8.0,
            'blg_personal_point' => 10.0,
            'blg_bug' => 1.5,
            'blg_cancel' => 0.5,
            'blg__is_use' => 1,
            'blg_uth_id' => 1,
            'blg_spr_id' => 1,
        ]);
    }
}
