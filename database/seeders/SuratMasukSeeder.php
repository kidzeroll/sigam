<?php

namespace Database\Seeders;

use App\Models\SuratMasuk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratMasukSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            SuratMasuk::create([
                'no_surat' => '00' . $i . '/GJM/IV/2022',
                'no_agenda' => '00' . $i,
                'tanggal_surat' => $faker->date(),
                'tanggal_masuk' => $faker->date(),
                'perihal_surat' => 'tentang rapat',
                'tembusan' => 'keuchik',
                'pengirim' => 'sekda aceh',
                'keterangan' => 'sangat penting!',
            ]);
        }
    }
}
