<?php

namespace Database\Seeders;

use App\Models\Hubungan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HubunganSeeder extends Seeder
{
    public function run()
    {
        Hubungan::create(['nama' => 'Kepala Keluarga']);
        Hubungan::create(['nama' => 'Suami']);
        Hubungan::create(['nama' => 'Istri']);
        Hubungan::create(['nama' => 'Anak Kandung']);
        Hubungan::create(['nama' => 'Anak Tiri']);
        Hubungan::create(['nama' => 'Menantu']);
        Hubungan::create(['nama' => 'Mertua']);
        Hubungan::create(['nama' => 'Cucu']);
        Hubungan::create(['nama' => 'Orangtua']);
        Hubungan::create(['nama' => 'Famili']);
        Hubungan::create(['nama' => 'Pembantu']);
        Hubungan::create(['nama' => 'Saudara']);
        Hubungan::create(['nama' => 'Lainnya']);
    }
}
