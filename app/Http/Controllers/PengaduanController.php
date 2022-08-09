<?php

namespace App\Http\Controllers;

use App\DataTables\PengaduanDataTable;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Traits\WablasTrait;

class PengaduanController extends Controller
{
    public function index(PengaduanDataTable $dataTable)
    {
        return $dataTable->render('backend.pengaduan.index');
    }

    public function create()
    {
        return view('frontend.pengaduan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'no_hp' => 'required',
            'lampiran_path' => 'mimes:png,jpg|max:2048',
        ]);

        $pengaduan = new Pengaduan();

        $lampiran_path = $request->file('lampiran_path');
        if ($lampiran_path) {
            $lampiran_path_path     = $lampiran_path->store('images/pengaduan', 'public');
            $pengaduan->lampiran_path    = $lampiran_path_path;
        }

        $pengaduan->nama = $request->nama;
        $pengaduan->judul = $request->judul;
        $pengaduan->isi = $request->isi;
        $pengaduan->no_hp = $request->no_hp;
        $pengaduan->save();

        // wa
        // $key = 'test-arifapp-1234567890';
        // $phone = $request->no_hp;
        // $name = $request->nama;

        // $message =
        //     "Halo " . $name . "\n\nPengaduan anda telah masuk kedalam sistem kami. Segera akan kami tanggapi.\n\n\nSIGAM TEAM";

        // $response = Http::post('https://api.arif.app/api/send', ['key' => $key, 'no' => $phone, 'pesan' => $message]);
        // return $response->json(['success' => 'Pengaduan Berhasil Diajukan']);

        return redirect()->back()->with('success', 'Pengaduan Berhasil Diajukan');
    }

    public function show($id)
    {
        $model = Pengaduan::findOrFail($id);
        return view('backend.pengaduan.show', compact('model'));
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        if ($pengaduan->lampiran_path && file_exists(storage_path('app/public/' . $pengaduan->lampiran_path))) {
            Storage::delete('public/' . $pengaduan->lampiran_path);
        }
        $pengaduan->delete();
        return response()->json(['status' => 'success', 'message' => 'Pengaduan berhasil dihapus',]);
    }


    public function tanggapi($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->status = 'ditanggapi';
        $pengaduan->save();

        return response()->json(['status' => 'success', 'message' => 'Pengaduan berhasil ditanggapi',]);
    }

    public function beritahukan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->status = 'selesai';
        $pengaduan->save();

        $key = 'test-arifapp-1234567890';
        $phone = $pengaduan->no_hp;
        $judul = $pengaduan->judul;
        $isi = $pengaduan->isi;
        $name = $pengaduan->nama;

        $message =
            "Halo " . $name . "\nPengaduan anda : " . $judul . " \nIsi Pengaduan : " . $isi . "
            \n\nTelah kami proses. Terimakasih sudah melapor kepada kami.\n\n\nSIGAM TEAM";

        $response = Http::post('https://api.arif.app/api/send', ['key' => $key, 'no' => $phone, 'pesan' => $message]);
        return $response->successful();
    }
}
