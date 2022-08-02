<?php

namespace App\Http\Controllers;

use App\DataTables\SuratDataTable;
use App\Models\Agama;
use App\Models\Pekerjaan;
use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits\WablasTrait;

class SuratController extends Controller
{

    public function index(SuratDataTable $dataTable)
    {
        return $dataTable->render('backend.surat.index');
    }

    public function create()
    {
        $model = new Surat();
        $agamas = Agama::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        return view('backend.surat.form', compact('model', 'agamas', 'pekerjaans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pekerjaan_id' => 'required',
            'agama_id' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'no_hp' => 'required',
            'status' => 'nullable',

            'tanggal_meninggal' => 'nullable',
            'tanggal_dikebumikan' => 'nullable',
            'tempat_dikebumikan' => 'nullable',
            'pukul_meninggal' => 'nullable',
            'pukul_dikebumikan' => 'nullable',
            'penyebab' => 'nullable',

            'tujuan_pindah' => 'nullable',
            'tanggal_pindah' => 'nullable',

            'bidang_usaha' => 'nullable',
            'alamat_usaha' => 'nullable',
        ]);

        $noSurat = Surat::where('jenis_surat', '=', $request->jenis_surat)->count();

        $surat = new Surat();
        $namePDF = Str::random(20);

        if (auth()->user()->role == 'admin') {
            $surat->status = 'ditandatangani';
        }

        $surat->no_surat = $noSurat;
        $surat->pekerjaan_id = $request->pekerjaan_id;
        $surat->agama_id = $request->agama_id;
        $surat->jenis_surat = $request->jenis_surat;
        $surat->nik = $request->nik;
        $surat->nama = $request->nama;
        $surat->jenis_kelamin = $request->jenis_kelamin;
        $surat->tanggal_lahir = $request->tanggal_lahir;
        $surat->tempat_lahir = $request->tempat_lahir;
        $surat->alamat = $request->alamat;
        $surat->keperluan = $request->keperluan;
        $surat->no_hp = $request->no_hp;

        $surat->tanggal_meninggal = $request->tanggal_meninggal;
        $surat->tanggal_dikebumikan = $request->tanggal_dikebumikan;
        $surat->tempat_dikebumikan = $request->tempat_dikebumikan;
        $surat->pukul_meninggal = $request->pukul_meninggal;
        $surat->pukul_dikebumikan = $request->pukul_dikebumikan;
        $surat->penyebab = $request->penyebab;

        $surat->tujuan_pindah = $request->tujuan_pindah;
        $surat->tanggal_pindah = $request->tanggal_pindah;

        $surat->bidang_usaha = $request->bidang_usaha;
        $surat->alamat_usaha = $request->alamat_usaha;

        $surat->surat_path = 'pdf/surat/' . $namePDF . '.pdf';
        $surat->save();


        $data = Surat::where('id', '=', $surat->id)->first();
        $no = sprintf('%03s', abs($data->no_surat + 1));

        $array_bln    = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $bln      = $array_bln[date('n')];

        $pdf = Pdf::loadView('backend.surat.jenis-surat.' . Str::lower($data->jenis_surat), compact('data', 'no', 'bln'));
        Storage::put('public/' . $data->surat_path, $pdf->output());

        return response()->json(['status' => 'success', 'message' => 'Surat berhasil dibuat']);
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);

        if ($surat->surat_path && file_exists(storage_path('app/public/' . $surat->surat_path))) {
            Storage::delete('public/' . $surat->surat_path);
        }

        Surat::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Surat berhasil dihapus',]);
    }

    public function tandatangan($id)
    {
        $surat = Surat::findOrFail($id);

        $surat->status = 'ditandatangani';
        $surat->save();

        $data = Surat::where('id', '=', $id)->first();
        $array_bln    = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $bln      = $array_bln[date('n')];

        $no = sprintf('%03s', abs($data->no_surat + 1));

        if ($surat->surat_path && file_exists(storage_path('app/public/' . $surat->surat_path))) {
            Storage::delete('public/' . $surat->surat_path);

            $pdf = PDF::loadView('backend.surat.jenis-surat.' . Str::lower($data->jenis_surat), compact('data', 'bln', 'no'));
            Storage::put('public/' . $data->surat_path, $pdf->output());
        }

        return response()->json(['status' => 'success', 'message' => 'Surat berhasil ditandatangan']);
    }

    public function whatsapp($id)
    {
        $surat = Surat::findOrFail($id);

        $surat->status = 'selesai';
        $surat->save();

        $key = 'test-arifapp-1234567890';
        $phone = $surat->no_hp;
        $link = asset('storage/' . $surat->surat_path);

        $message = 'SIGAM TEAM';

        $response = Http::post('https://api.arif.app/api/send', ['key' => $key, 'no' => $phone, 'pesan' => $message, 'link' => $link]);
        return $response->successful();
    }


    public function FrontendStore(Request $request)
    {
        $request->validate([
            'pekerjaan_id' => 'required',
            'agama_id' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'no_hp' => 'required',
        ]);

        if ($request->jenis_surat == 'SKP') {
            $request->validate([
                'tujuan_pindah' => 'required',
                'tanggal_pindah' => 'required',
            ]);
        }

        if ($request->jenis_surat == 'SKU') {
            $request->validate([
                'bidang_usaha' => 'required',
                'alamat_usaha' => 'required',
            ]);
        }

        if ($request->jenis_surat == 'SKK') {
            $request->validate([
                'tanggal_meninggal' => 'required',
                'tanggal_dikebumikan' => 'required',
                'tempat_dikebumikan' => 'required',
                'pukul_meninggal' => 'required',
                'pukul_dikebumikan' => 'required',
                'penyebab' => 'required',
            ]);
        }

        $noSurat = Surat::where('jenis_surat', '=', $request->jenis_surat)->count();

        $surat = new Surat();
        $namePDF = Str::random(20);

        $surat->no_surat = $noSurat;
        $surat->pekerjaan_id = $request->pekerjaan_id;
        $surat->agama_id = $request->agama_id;
        $surat->jenis_surat = $request->jenis_surat;
        $surat->nik = $request->nik;
        $surat->nama = $request->nama;
        $surat->jenis_kelamin = $request->jenis_kelamin;
        $surat->tanggal_lahir = $request->tanggal_lahir;
        $surat->tempat_lahir = $request->tempat_lahir;
        $surat->alamat = $request->alamat;
        $surat->keperluan = $request->keperluan;
        $surat->no_hp = $request->no_hp;

        $surat->tanggal_meninggal = $request->tanggal_meninggal;
        $surat->tanggal_dikebumikan = $request->tanggal_dikebumikan;
        $surat->tempat_dikebumikan = $request->tempat_dikebumikan;
        $surat->pukul_meninggal = $request->pukul_meninggal;
        $surat->pukul_dikebumikan = $request->pukul_dikebumikan;
        $surat->penyebab = $request->penyebab;

        $surat->tujuan_pindah = $request->tujuan_pindah;
        $surat->tanggal_pindah = $request->tanggal_pindah;

        $surat->bidang_usaha = $request->bidang_usaha;
        $surat->alamat_usaha = $request->alamat_usaha;

        $surat->surat_path = 'pdf/surat/' . $namePDF . '.pdf';
        $surat->save();


        $data = Surat::where('id', '=', $surat->id)->first();
        $no = sprintf('%03s', abs($data->no_surat + 1));

        $array_bln    = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $bln      = $array_bln[date('n')];

        $pdf = Pdf::loadView('backend.surat.jenis-surat.' . Str::lower($data->jenis_surat), compact('data', 'no', 'bln'));
        Storage::put('public/' . $data->surat_path, $pdf->output());

        return redirect()->back()->with('success', 'Terimakasih, permintaan anda akan segera kami proses');
    }
}
