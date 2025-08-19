<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
        [
            'name' => 'Hamid',
            'email' => 'hami@gmail.com',
            'password' => Hash::make('123456'),
            'adresse' => '', 
            'phone' => '',   
            'date_de_naissance' => '2000-01-01',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Peter',
            'email' => 'peter@gmail.com',
            'password' => Hash::make('123456'),
            'adresse' => '',
            'phone' => '',
            'date_de_naissance' => '1995-05-15',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name'  => 'Marcos',
            'email' => 'Marcos@good4college.com',
            'password' => Hash::make('123456'),
            'adresse' => '',
            'phone' => '',
            'date_de_naissance' => '1995-05-15',
            'created_at' => now(),
            'updated_at' => now(),
        ],
]);

    }
}

