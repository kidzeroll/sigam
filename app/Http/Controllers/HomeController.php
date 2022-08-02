<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Artikel;
use App\Models\Dusun;
use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\Pekerjaan;
use App\Models\Penduduk;
use App\Models\PerangkatGampong;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $artikel = Artikel::latest()->take(3)->get();
        $galeris = Galeri::latest()->take(8)->get();
        return view('frontend.home', compact('artikel', 'galeris'));
    }

    public function berita(Request $request)
    {
        $kategoris = Kategori::all();
        $perangkats = PerangkatGampong::all('nama', 'jabatan', 'photo_path');

        if (request('search')) {
            $artikels = Artikel::where('judul', 'like', '%' . request('search') . '%')
                ->orWhere('isi', 'like', '%' . request('search') . '%')
                ->paginate(10);
        } else {
            $artikels = Artikel::latest()->paginate(10);
        }
        return view('frontend.berita', compact('kategoris', 'artikels', 'perangkats'));
    }

    public function showBerita(Request $request, $slug)
    {
        $kategoris = Kategori::all();
        $perangkats = PerangkatGampong::all('nama', 'jabatan', 'photo_path');
        $artikel = Artikel::where('slug', $slug)->first();
        return view('frontend.berita-show', compact('artikel', 'kategoris', 'perangkats'));
    }

    public function foto(Request $request)
    {
        $archives = Galeri::selectRaw('year(created_at) tahun, count(*) total')
            ->groupBy('tahun')
            ->get()
            ->toArray();

        $perangkats = PerangkatGampong::all('nama', 'jabatan', 'photo_path');
        $query = Galeri::latest();

        if ($tahun = request('tahun')) {
            $query->whereYear('created_at', $tahun);
        }

        $galeris = $query->paginate(16);

        return view('frontend.foto', compact('galeris', 'perangkats', 'archives'));
    }

    public function kategori($slug)
    {
        $perangkats = PerangkatGampong::all('nama', 'jabatan', 'photo_path');
        $kategoris = Kategori::all();
        $kategori = Kategori::where('slug', $slug)->first();
        $artikels = $kategori->artikel()->latest()->paginate(10);
        // dd($artikels);
        return view('frontend.berita-kategori', compact('kategori', 'kategoris', 'perangkats', 'artikels'));
    }

    public function profil()
    {
        $perangkats = PerangkatGampong::all('nama', 'photo_path', 'jabatan', 'alamat');
        $total = Penduduk::count();
        $dusuns = Dusun::all('nama');
        return view('frontend.profil', compact('perangkats', 'total', 'dusuns'));
    }

    public function skkm()
    {
        $agamas = Agama::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        return view('frontend.skkm', compact('agamas', 'pekerjaans'));
    }

    public function skbb()
    {
        $agamas = Agama::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        return view('frontend.skbb', compact('agamas', 'pekerjaans'));
    }

    public function skbm()
    {
        $agamas = Agama::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        return view('frontend.skbm', compact('agamas', 'pekerjaans'));
    }

    public function skp()
    {
        $agamas = Agama::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        return view('frontend.skp', compact('agamas', 'pekerjaans'));
    }

    public function sku()
    {
        $agamas = Agama::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        return view('frontend.sku', compact('agamas', 'pekerjaans'));
    }

    public function skd()
    {
        $agamas = Agama::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        return view('frontend.skd', compact('agamas', 'pekerjaans'));
    }

    public function skk()
    {
        $agamas = Agama::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        return view('frontend.skk', compact('agamas', 'pekerjaans'));
    }
}
