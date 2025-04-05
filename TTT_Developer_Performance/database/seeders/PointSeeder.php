<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('points')->insert([
            //'pts_id' => 1,
            'pts_category' => 'pass',
            'pts_created_time' => now(),
            'pts_is_use' => 1,
            'pts_spr_id' => 1,
            'pts_status' => 'success',
            'pts_type' => 'extra',
            'pts_updated_time' => now(),
            'pts_uth_id' => 1,
            'pts_value' => 10,
            'pts_version_id' => 1
        ]);
    }
}
