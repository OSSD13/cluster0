<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtraPointsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('extra_points')->insert([
            'ext_id' => 2,
            'ext_value' => 2,
            'ext_is_use' => 1,
            'ext_uth_id' => 1,
            'ext_spr_id' => 1,
        ]);
    }
}
