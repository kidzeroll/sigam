<?php

namespace Database\Seeders;

use App\Models\Kelahiran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelahiranSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            Kelahiran::create([
                'nama_bayi' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tanggal_lahir' => $faker->date(),
                'tempat_lahir' => 'Puskesmas Kota Jantho',
                'nama_ayah' => $faker->name(),
                'nama_ibu' => $faker->name(),
                'keterangan' => '-',
            ]);
        }
    }
}
