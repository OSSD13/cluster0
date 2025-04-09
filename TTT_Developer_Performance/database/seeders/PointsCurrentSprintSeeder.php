<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PointsCurrentSprintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('points_current_sprint')->insert([
            'pcs_id' => 1,
            'pcs_tester_id' => 2,
            'pcs_pass_point' => 6.5,
            'pcs_bug_point' => 0.5,
            'pcs_cancel' => 0.0,
            'pcs_day_off' => 0,
            'pcs_is_use' => 1,
            'pcs_uth_id' => 1,
            'pcs_spr_id' => 1,
        ]);
    }
}
