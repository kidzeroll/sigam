<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{

    public function run()
    {
        Agama::create(['nama' => 'Islam']);
        Agama::create(['nama' => 'Kristen Protestan']);
        Agama::create(['nama' => 'Kristen Katolik']);
        Agama::create(['nama' => 'Hindu']);
        Agama::create(['nama' => 'Budha']);
        Agama::create(['nama' => 'Konghucu']);
        Agama::create(['nama' => 'Lainnya']);
    }
}
