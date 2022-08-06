<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Muhammad Haykal',
            'email' => 'muhammadhaykall99@gmail.com',
            'password' => bcrypt('password'),
            'gender' => 'L',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'gender' => 'L',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('password'),
            'gender' => 'P',
            'role' => 'petugas'
        ]);
    }
}
