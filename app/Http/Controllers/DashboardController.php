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
        $chart = $this->chart();

        return view('backend.dashboard.dashboard', compact('penduduk', 'cowo', 'cewe', 'artikel', 'chart'));
    }

    private function chart()
    {
        $data = Surat::select(DB::raw('count(jenis_surat) as total'), 'jenis_surat', DB::raw('month(created_at) as bulan'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('jenis_surat', 'bulan')
            ->get();

        $chart['SKP'] = ['01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0];
        $chart['SKBM'] = ['01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0];
        $chart['SKKM'] = ['01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0];
        $chart['SKBB'] = ['01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0];
        $chart['SKU'] = ['01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0];
        $chart['SKK'] = ['01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0];
        $chart['SKD'] = ['01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0];

        foreach ($data as $v) {
            $chart[$v->jenis_surat][sprintf('%02d', $v->bulan)] = $v->total;
        }

        //sort by month ASC
        $c['SKP'] = [$chart['SKP']['01'], $chart['SKP']['02'], $chart['SKP']['03'], $chart['SKP']['04'], $chart['SKP']['05'], $chart['SKP']['06'], $chart['SKP']['07'], $chart['SKP']['08'], $chart['SKP']['09'], $chart['SKP']['10'], $chart['SKP']['11'], $chart['SKP']['12']];
        $c['SKBM'] = [$chart['SKBM']['01'], $chart['SKBM']['02'], $chart['SKBM']['03'], $chart['SKBM']['04'], $chart['SKBM']['05'], $chart['SKBM']['06'], $chart['SKBM']['07'], $chart['SKBM']['08'], $chart['SKBM']['09'], $chart['SKBM']['10'], $chart['SKBM']['11'], $chart['SKBM']['12']];
        $c['SKKM'] = [$chart['SKKM']['01'], $chart['SKKM']['02'], $chart['SKKM']['03'], $chart['SKKM']['04'], $chart['SKKM']['05'], $chart['SKKM']['06'], $chart['SKKM']['07'], $chart['SKKM']['08'], $chart['SKKM']['09'], $chart['SKKM']['10'], $chart['SKKM']['11'], $chart['SKKM']['12']];
        $c['SKBB'] = [$chart['SKBB']['01'], $chart['SKBB']['02'], $chart['SKBB']['03'], $chart['SKBB']['04'], $chart['SKBB']['05'], $chart['SKBB']['06'], $chart['SKBB']['07'], $chart['SKBB']['08'], $chart['SKBB']['09'], $chart['SKBB']['10'], $chart['SKBB']['11'], $chart['SKBB']['12']];
        $c['SKU'] = [$chart['SKU']['01'], $chart['SKU']['02'], $chart['SKU']['03'], $chart['SKU']['04'], $chart['SKU']['05'], $chart['SKU']['06'], $chart['SKU']['07'], $chart['SKU']['08'], $chart['SKU']['09'], $chart['SKU']['10'], $chart['SKU']['11'], $chart['SKU']['12']];
        $c['SKK'] = [$chart['SKK']['01'], $chart['SKK']['02'], $chart['SKK']['03'], $chart['SKK']['04'], $chart['SKK']['05'], $chart['SKK']['06'], $chart['SKK']['07'], $chart['SKK']['08'], $chart['SKK']['09'], $chart['SKK']['10'], $chart['SKK']['11'], $chart['SKK']['12']];
        $c['SKD'] = [$chart['SKD']['01'], $chart['SKD']['02'], $chart['SKD']['03'], $chart['SKD']['04'], $chart['SKD']['05'], $chart['SKD']['06'], $chart['SKD']['07'], $chart['SKD']['08'], $chart['SKD']['09'], $chart['SKD']['10'], $chart['SKD']['11'], $chart['SKD']['12']];

        return $c;
    }
}
