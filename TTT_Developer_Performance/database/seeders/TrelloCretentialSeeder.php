<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrelloCretentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('trello_credentials')->insert([
            'trc_api_key' => 'your_api_key_here',
            'trc_api_token' => 'your_api_token_here',
            'trc_usr_id' => '9',
        ]);
    }
}
