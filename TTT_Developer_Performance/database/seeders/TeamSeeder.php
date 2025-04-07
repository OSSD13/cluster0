<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teams')->insert([
            [
                'tm_is_use' => 1,
                'tm_name' => 'LilTeam',
                'tm_stl_id' => 3,
                'tm_trello_boardname' => 'LilTrello Board Name'
            ],
            [
                'tm_is_use' => 1,
                'tm_name' => 'KhaimookTeam',
                'tm_stl_id' => 3,
                'tm_trello_boardname' => 'KhaimookTrello Board Name'
            ]
        ]);
    }
}
