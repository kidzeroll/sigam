<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 19; $i++) {
            Galeri::create([
                'deskripsi' => '17 Agustus 2022',
                'photo_path' => 'images/galeri/' . $i . '.jpg',
            ]);
        }
    }
}
