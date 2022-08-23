<?php

namespace Database\Seeders;

use App\Models\PerangkatGampong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerangkatGampongSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();

        // $jabatan = [
        //     'keuchik', 'skretaris gampong', 'bendahara gampong', 'operator gampong', 'ketua pemuda', 'ketua keamanan', 'tuha peut', 'kaur umum', 'kaur pembangunan', 'kaur pemerintahan'
        // ];

        // for ($i = 0; $i < 10; $i++) {
        //     PerangkatGampong::create([
        //         'nik' => $faker->numerify('################'),
        //         'nama' => $faker->name(),
        //         'jenis_kelamin' => $faker->randomElement(['L', 'P']),
        //         'jabatan' => $jabatan[$i],
        //         'no_hp' => $faker->phoneNumber(),
        //         'alamat' => $faker->address(),
        //         'photo_path' => 'images/user/perangkat' . $i + 1 . '.jpg',
        //     ]);
        // }

        PerangkatGampong::create([
            'nik' => '1106152105990002',
            'nama' => 'H. Sabri',
            'jenis_kelamin' => 'L',
            'jabatan' => 'Keuchik',
            'no_hp' => '082362568088',
            'alamat' => 'Kota Jantho',
            'photo_path' => 'images/user/1.jpg',
        ]);

        PerangkatGampong::create([
            'nik' => '1106152105990002',
            'nama' => 'Imran',
            'jenis_kelamin' => 'L',
            'jabatan' => 'Ketua Pemuda',
            'no_hp' => '082362568088',
            'alamat' => 'Kota Jantho',
            'photo_path' => 'images/user/2.jpg',
        ]);
    }
}
