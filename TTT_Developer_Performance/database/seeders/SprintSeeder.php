<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SprintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sprints')->insert([
            'spr_created_time' => now(),
            'spr_date_finish'=> now()->addDays(),
            'spr_date_start' => now(),
            'spr_number' => 1,
            'spr_year' => now()->year,
        ]);
    }
}
