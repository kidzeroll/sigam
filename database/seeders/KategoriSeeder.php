<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            $nama = $faker->sentence;
            $slug = Str::slug($nama);
            Kategori::create([
                'nama' => $nama,
                'slug' => $slug,
            ]);
        }
    }
}
