<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    public function run()
    {
        Pendidikan::create(['nama' => 'Tidak/Belum Sekolah',]);
        Pendidikan::create(['nama' => 'Belum Tamat SD/Sederajat',]);
        Pendidikan::create(['nama' => 'Tamat SD/Sederajat',]);
        Pendidikan::create(['nama' => 'SLTP/Sederajat',]);
        Pendidikan::create(['nama' => 'SLTA/Sederajat',]);
        Pendidikan::create(['nama' => 'Diploma I / II',]);
        Pendidikan::create(['nama' => 'Akademi/ Diploma III/S. Muda',]);
        Pendidikan::create(['nama' => 'Diploma IV/ Strata I',]);
        Pendidikan::create(['nama' => 'Strata II',]);
        Pendidikan::create(['nama' => 'Strata III']);
        Pendidikan::create(['nama' => 'Lainnya']);
    }
}
