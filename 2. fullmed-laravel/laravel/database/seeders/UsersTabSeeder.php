<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        DB::table('users')->insert([
            'name'=>'Marek Trocha',
            'email'=>'marek@trocha.net.pl',
            'password'=>bcrypt('password'),
            'phone'=>48693877101,
            'addres'=>'Wodniaków 8',
            'status'=>'Active',
            'pesel'=>'00022703036',
            'type'=>'admin'
        ]);

        //patient_1
        DB::table('users')->insert([
            'name'=>'John Snow',
            'email'=>'jon@snow.net.pl',
            'password'=>bcrypt('password'),
            'phone'=>12265878412,
            'addres'=>'Olipijska 8',
            'status'=>'Active',
            'pesel'=>'79101412122',
            'type'=>'patient'
        ]);

        //patient_2
        DB::table('users')->insert([
            'name'=>'Mark Twein',
            'email'=>'mark@twein.net.pl',
            'password'=>bcrypt('password'),
            'phone'=>85654785122,
            'addres'=>'Pomoska 8',
            'status'=>'Active',
            'pesel'=>'64022512125',
            'type'=>'patient'
        ]);

        //doctor_1
        DB::table('users')->insert([
            'name'=>'Waldemar Budziński',
            'email'=>'w@budzinski.com',
            'password'=>bcrypt('password'),
            'phone'=>58658782125,
            'addres'=>'Jasień 8',
            'status'=>'Active',
            'pesel'=>'47024525236',
            'type'=>'doctor'
        ]);

        //doctor_2
        DB::table('users')->insert([
            'name'=>'Monika Trocha',
            'email'=>'kontakt@monikatrocha.pl',
            'password'=>bcrypt('password'),
            'phone'=>48510099583,
            'addres'=>'Wodniaków 8',
            'status'=>'Active',
            'pesel'=>'86101421211',
            'type'=>'doctor'
        ]);

        //specialisation_1
        DB::table('specialisations')->insert([
            'name'=>'psychology'
        ]);

        //specialisation_2
        DB::table('specialisations')->insert([
            'name'=>'surgeon'
        ]);

        //specialisation_3
        DB::table('specialisations')->insert([
            'name'=>'internist'
        ]);


    }
}
