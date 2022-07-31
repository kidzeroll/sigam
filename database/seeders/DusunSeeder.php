<?php

namespace Database\Seeders;

use App\Models\Dusun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DusunSeeder extends Seeder
{
    public function run()
    {
        Dusun::create(['nama' => 'Bahagia', 'rt' => '001', 'rw' => '001']);
        Dusun::create(['nama' => 'Sentosa', 'rt' => '002', 'rw' => '002']);
        Dusun::create(['nama' => 'Seroja', 'rt' => '003', 'rw' => '003']);
        Dusun::create(['nama' => 'Kemuning', 'rt' => '004', 'rw' => '004']);
        Dusun::create(['nama' => 'Seulanga', 'rt' => '005', 'rw' => '005']);
    }
}
