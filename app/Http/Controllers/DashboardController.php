<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Penduduk;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $penduduk = Penduduk::count();
        $cowo = Penduduk::where('jenis_kelamin', '=', 'L')->count();
        $cewe = Penduduk::where('jenis_kelamin', '=', 'P')->count();
        $artikel = Artikel::count();

        // chart
        $tahun = date('Y');
        $data = DB::select("SELECT jenis_surat AS JS, month(created_at) AS BULAN, COUNT(jenis_surat) AS TOTAL FROM `tb_surat`
        WHERE year(created_at) = '$tahun' GROUP BY JS, BULAN");

        return view('backend.dashboard.dashboard', compact('penduduk', 'cowo', 'cewe', 'artikel'));
    }
}
