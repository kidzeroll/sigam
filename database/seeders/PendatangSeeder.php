<?php

namespace Database\Seeders;

use App\Models\Pendatang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendatangSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            Pendatang::create([
                'no_kk' => $faker->numerify('################'),
                'nik' => $faker->numerify('################'),
                'nama' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'alamat_asal' => 'Blang Bintang',
                'tanggal_datang' => $faker->date('Y-m-d'),
                'tujuan_kedatangan' => 'Untuk bekerja',
                'lama_kedatangan' => '1 Minggu',
                'no_hp' => '082362568088',
            ]);
        }
    }
}
