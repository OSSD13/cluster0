<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTrelloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Placeholder variables or constants
        DB::table('setting_trello')->insert([
            'stl_bug' => 'stl_bug',
            'stl_cancel' => 'stl_cancel',
            'stl_done' => 'stl_done',
            'stl_inprogress' => 'stl_inprogress',
            'stl_minor_case' => 'stl_minor_case',
            'stl_name' => 'stl_name',
            'stl_todo' => 'stl_todo',
            'stl_trc_id' => 1,
        ]);
    }
}
