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

            PerangkatGampongSeeder::class,
            GaleriSeeder::class,
            PendudukSeeder::class,
            KategoriSeeder::class,
            ArtikelSeeder::class,

            // SuratMasukSeeder::class,
            // SuratKeluarSeeder::class,
            // PendatangSeeder::class,
            // KelahiranSeeder::class,
            // KematianSeeder::class,
            // PerpindahanSeeder::class,
            // PengaduanSeeder::class,
            // SuratSeeder::class,
        ]);
    }
}
