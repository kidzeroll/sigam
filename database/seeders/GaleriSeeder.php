<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Galeri::create([
                'deskripsi' => 'Jantho Makmur turnamen bola cup tahun 2022',
                'photo_path' => 'images/galeri/bola' . $i . '.png',
            ]);
        }
    }
}
