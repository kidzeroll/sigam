<?php

namespace Database\Seeders;

use App\Models\Kematian;
use App\Models\Penduduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KematianSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 21; $i <= 30; $i++) {

            Kematian::create([
                'penduduk_id' => $i,
                'tanggal_meninggal' => $faker->date('Y-m-d'),
                'keterangan' => 'Dikarenakan sakit hati yang bekepanjangan tak kunjung cintanya dibalas',
            ]);
            $penduduk = Penduduk::findOrFail($i);
            $penduduk->status = 'meninggal';
            $penduduk->save();
        }
    }
}
