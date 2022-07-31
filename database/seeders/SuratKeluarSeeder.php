<?php

namespace Database\Seeders;

use App\Models\SuratKeluar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratKeluarSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            SuratKeluar::create([
                'no_surat' => '00' . $i . '/GJM/IV/2022',
                'no_agenda' => '00' . $i,
                'tanggal_surat' => $faker->date(),
                'perihal_surat' => 'tentang rapat',
                'tembusan' => 'keuchik',
                'penerima' => 'sekda aceh',
                'keterangan' => 'sangat penting!',
            ]);
        }
    }
}
