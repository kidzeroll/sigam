<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            Surat::create([
                'agama_id' => '1',
                'pekerjaan_id' => '1',

                'jenis_surat' => $faker->randomElement(['SKKM', 'SKBB', 'SKBM', 'SKP', 'SKU', 'SKD', 'SKK']),
                'nik' => $faker->numerify('################'),
                'nama' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'alamat' => $faker->address(),
                'tanggal_lahir' => $faker->date('Y-m-d'),
                'tempat_lahir' => 'Kota Jantho',
                'no_hp' => '082362568088',
                'keperluan' => 'membuat SKCK',
            ]);
        }
    }
}
