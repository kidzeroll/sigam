<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ArtikelSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 100; $i++) {
            $judul = $faker->sentence;
            $slug = Str::slug($judul);
            Artikel::create([
                'user_id' => $faker->randomElement(['1', '2']),
                'kategori_id' => $faker->randomElement(['1', '2', '3', '4', '5']),
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $faker->paragraph(10),
            ]);
        }
    }
}
