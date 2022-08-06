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

        for ($i = 1; $i <= 20; $i++) {
            $judul = $faker->sentence;
            $slug = Str::slug($judul);

            Artikel::create([
                'user_id' => $faker->randomElement(['1', '2', '3']),
                'kategori_id' => $faker->randomElement(['1', '2', '3', '4', '5']),
                'judul' => $judul,
                'slug' => $slug,
                'photo_path' => 'images/artikel/artikel' . $i . '.png',
                'isi' => '<p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;"><b>Kota Jantho</b>, CNN Indonesia -- Penelitian data awal oleh Organisasi Kesehatan Dunia (WHO) menunjukkan Covid-19 varian Omicron lebih cepat menular ketimbang Delta dan dapat melemahkan vaksin yang ada saat ini.</p><p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;">"Berdasarkan data yang ada saat ini, Omicron kemungkinan bakal mengalahkan varian Delta di tempat di mana terjadi penularan antar-masyarakat," demikian pernyataan WHO yang dikutip AFP, Minggu (12/12).</p><p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;">Merujuk pada data yang dihimpun WHO, saat ini Omicron sudah menyebar di 63 negara. Mereka melihat Omicron cepat menyebar di Afrika Selatan, di mana varian Delta tak mendominasi.</p><p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;">Namun, mereka juga mencatat penyebaran cepat Covid-19 varian Omicron di Inggris, yang kasusnya secara keseluruhan sebenarnya masih didominasi Delta.</p><p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;">Meski demikian, WHO menegaskan bahwa data yang ada saat ini masih kurang. Mereka pun belum dapat memastikan tingkat penularan Omicron tinggi karena lebih mudah menembus respons imun atau memang lebih cepat menular.</p><p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;">Selain itu, WHO juga menyatakan bahwa data awal menunjukkan Omicron menyebabkan "pengurangan efikasi vaksin terjadi infeksi dan penularan [Covid-19]."</p><p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;">Terlepas dari temuan tersebut, WHO menekankan bahwa infeksi virus corona varian Omicron sejauh ini hanya menyebabkan gejala ringan. Mereka masih mengumpulkan data untuk menentukan tingkat keparahan klinis Omicron.</p><p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;">Penelitian ini masih terus dilakukan setelah Afrika Selatan melaporkan temuan varian baru tersebut ke WHO pada 24 November lalu.</p><p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;">Sejak saat itu, banyak pakar memang menyebut Omicron lebih cepat menular dan kemungkinan dapat melemahkan vaksin yang sudah ada saat ini.</p><p style="font-family: &quot;Source Sans Pro&quot;; font-size: medium; line-height: 24px; padding: 0.55rem 0px 0.25rem; color: rgb(67, 72, 86); text-align: justify; margin-bottom: 0px !important; margin-block: 0px !important;">Kendati demikian, sejumlah produsen vaksin menyatakan bahwa suntikan mereka masih efektif melawan Omicron. Pfizer/BioNTech bahkan menyebut tiga dosis vaksin mereka efektif menangkal varian baru itu.</p>',
            ]);
        }
    }
}
