<?php

namespace Database\Seeders;

use App\Models\ProfilGampong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilGampongSeeder extends Seeder
{
    public function run()
    {
        $gampong = new ProfilGampong();

        $gampong->nama_gampong = "Jantho Makmur";
        $gampong->nama_kecamatan = "Kota Jantho";
        $gampong->nama_kabupaten = "Aceh Besar";
        $gampong->nama_provinsi = "Aceh";
        $gampong->kode_gampong = "GJM";
        $gampong->kode_pos = "23911";
        $gampong->alamat_gampong = "alamat";
        $gampong->nama_keuchik = "H. Sabri";
        $gampong->alamat_keuchik = "alamat_keuchik";
        $gampong->twitter = "twitter";
        $gampong->facebook = "facebook";
        $gampong->whatsapp = "https://api.whatsapp.com/send?phone=6282362568088";
        $gampong->instagram = "https://www.instagram.com/kidz.eroll/";
        $gampong->logo_path = 'images/logo/logo.png';
        $gampong->ttd_path = 'images/logo/ttd.png';
        $gampong->map = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15890.913240823515!2d95.58563776610595!3d5.305024254314423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30406667ec8a1e27%3A0xde2afcc579ebf797!2sJantho%20Makmur%2C%20Kota%20Jantho%2C%20Aceh%20Besar%20Regency%2C%20Aceh!5e0!3m2!1sen!2sid!4v1655910587392!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

        $gampong->save();
    }
}
