<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 1000; $i++) {
            Penduduk::create([
                'agama_id' => '1',
                'pendidikan_id' => '1',
                'pekerjaan_id' => '1',
                'perkawinan_id' => '1',
                'hubungan_id' => '1',
                'dusun_id' => '1',

                'no_kk' => $faker->numerify('################'),
                'nik' => $faker->numerify('################'),
                'nama' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'alamat' => $faker->address(),
                'tanggal_lahir' => $faker->date('Y-m-d'),
                'tempat_lahir' => 'Kota Jantho',
                'kewarganegaraan' => $faker->randomElement(['WNI', 'WNA', 'GANDA']),
                'golongan_darah' => $faker->randomElement(['-', 'O+', 'O-', 'AB', 'A+', 'A-']),
                'penghasilan' => '-',
                'nama_ayah' => $faker->name(),
                'nama_ibu' => $faker->name(),
                'no_hp' => '082362568088',
            ]);
        }
    }
}
