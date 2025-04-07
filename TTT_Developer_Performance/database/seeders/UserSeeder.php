<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'usr_email'            => 'Pizza@gmail.com',
                //'usr_google_id'        => 'google_123',
                'usr_is_use'           => 1,
                'usr_name'             => 'Pizza',
                'usr_password'         => Hash::make('pizza123'),
                'usr_role'             => 'Tester',
                'usr_trello_fullname'  => 'PizzaTrello',
                'usr_username'         => 'Developer_pizza'
            ],

        ]);
    }
}
