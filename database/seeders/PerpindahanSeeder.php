<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use App\Models\Perpindahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerpindahanSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {

            Perpindahan::create([
                'penduduk_id' => $i,
                'tujuan_pindah' => $faker->address(),
                'tanggal_pindah' => $faker->date('Y-m-d'),
                'keterangan' => 'Sudah bekeluarga disana',
            ]);
            $penduduk = Penduduk::findOrFail($i);
            $penduduk->status = 'pindah';
            $penduduk->save();
        }
    }
}
