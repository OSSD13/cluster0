<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTeamHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_team_history')->insert([
            'uth_end_date' => null,
            'uth_is_current' => 1,
            'uth_start_date' => now()->today(),
            'uth_tm_id' => 1,
            'uth_usr_id' => 2,
        ]);
    }
}
