<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 5; $i++) {
            Pengaduan::create([
                'nama' => $faker->name(),
                'judul' => 'Judul Pengaduan' . $i,
                'isi' => $faker->paragraph(10),
                'no_hp' => '082362568088',
            ]);
        }
    }
}
