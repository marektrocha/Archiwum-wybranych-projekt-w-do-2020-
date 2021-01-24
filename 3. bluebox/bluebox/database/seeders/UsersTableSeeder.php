<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ADMIN
        DB::table('users')->insert([
            'name'=>'Marek',
            'surname'=>'Trocha',
            'email'=>'marek@trocha.net.pl',
            'password'=>bcrypt('123'),
            'statusUser'=>'admin',
        ]);

        // CLIENT
        DB::table('users')->insert([
            'name'=>'Adam',
            'surname'=>'Nowak',
            'email'=>'adam@nowak.pl',
            'password'=>bcrypt('asc'),
            'statusUser'=>'client',
        ]);
    }
}
