<?php

namespace App\Http\Controllers;

use App\DataTables\PerpindahanDataTable;
use App\Models\Penduduk;
use App\Models\Perpindahan;
use Illuminate\Http\Request;

class PerpindahanController extends Controller
{

    public function index(PerpindahanDataTable $dataTable)
    {
        return $dataTable->render('backend.perpindahan.index');
    }

    public function create()
    {
        $model = new Perpindahan();
        $penduduks = Penduduk::all('id', 'nik', 'nama');
        return view('backend.perpindahan.form', compact('model', 'penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'tanggal_pindah' => 'required',
            'tujuan_pindah' => 'required',
            'keterangan' => 'nullable',
        ]);

        $perpindahan = new Perpindahan();
        $perpindahan->penduduk_id = $request->penduduk_id;
        $perpindahan->tanggal_pindah = $request->tanggal_pindah;
        $perpindahan->tujuan_pindah = $request->tujuan_pindah;
        $perpindahan->keterangan = $request->keterangan;
        $perpindahan->save();

        $penduduk = Penduduk::where('id', $perpindahan->penduduk_id)->first();
        $penduduk->status = 'pindah';
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data perpindahan berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Perpindahan::findOrFail($id);
        return view('backend.perpindahan.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Perpindahan::findOrFail($id);
        $penduduks = Penduduk::all('id', 'nik', 'nama');
        return view('backend.perpindahan.form', compact('model', 'penduduks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pindah' => 'required',
            'tujuan_pindah' => 'required',
            'keterangan' => 'nullable',
        ]);

        $perpindahan = Perpindahan::findOrFail($id);
        $perpindahan->tanggal_pindah = $request->tanggal_pindah;
        $perpindahan->tujuan_pindah = $request->tujuan_pindah;
        $perpindahan->keterangan = $request->keterangan;
        $perpindahan->save();

        $penduduk = Penduduk::where('id', $perpindahan->penduduk_id)->first();
        $penduduk->status = 'pindah';
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data perpindahan berhasil diupdate']);
    }

    public function destroy($id)
    {
        Perpindahan::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Data perpindahan berhasil dihapus']);
    }
}
