<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ProfilGampongSeeder::class,
            UserSeeder::class,
            AgamaSeeder::class,
            PendidikanSeeder::class,
            DusunSeeder::class,
            PekerjaanSeeder::class,
            PerkawinanSeeder::class,
            HubunganSeeder::class,
            // KategoriSeeder::class,
            // ArtikelSeeder::class,
            // PerangkatGampongSeeder::class,
            // SuratMasukSeeder::class,
            // SuratKeluarSeeder::class,
            // GaleriSeeder::class,
            // PendatangSeeder::class,
            // KelahiranSeeder::class,
            // PendudukSeeder::class,
            // KematianSeeder::class,
            // PerpindahanSeeder::class,
            // PengaduanSeeder::class,
            // SuratSeeder::class,
        ]);
    }
}
