<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('versions')->insert([
            'ver_created_time' => now(),
            'ver_editor_id' => 2,
            'ver_spr_id' => 1,
            'ver_version' => 1,
        ]);
    }
}
