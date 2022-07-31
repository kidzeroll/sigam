<?php

namespace Database\Seeders;

use App\Models\Perkawinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerkawinanSeeder extends Seeder
{
    public function run()
    {
        Perkawinan::create(['nama' => 'Belum Kawin']);
        Perkawinan::create(['nama' => 'Kawin']);
        Perkawinan::create(['nama' => 'Cerai Hidup']);
        Perkawinan::create(['nama' => 'Cerai Mati']);
        Perkawinan::create(['nama' => 'Lainnya']);
    }
}
