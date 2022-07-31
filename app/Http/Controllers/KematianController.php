<?php

namespace App\Http\Controllers;

use App\DataTables\KematianDataTable;
use App\Models\Kematian;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class KematianController extends Controller
{

    public function index(KematianDataTable $dataTable)
    {
        return $dataTable->render('backend.kematian.index');
    }

    public function create()
    {
        $model = new Kematian();
        $penduduks = Penduduk::all('id', 'nik', 'nama');
        return view('backend.kematian.form', compact('model', 'penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'tanggal_meninggal' => 'required',
        ]);

        $kematian = new Kematian();
        $kematian->penduduk_id = $request->penduduk_id;
        $kematian->tanggal_meninggal = $request->tanggal_meninggal;
        $kematian->keterangan = $request->keterangan;
        $kematian->save();

        $penduduk = Penduduk::where('id', $kematian->penduduk_id)->first();
        $penduduk->status = 'meninggal';
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data kematian berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Kematian::findOrFail($id);
        return view('backend.kematian.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Kematian::findOrFail($id);
        $penduduks = Penduduk::all('id', 'nik', 'nama');
        return view('backend.kematian.form', compact('model', 'penduduks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_meninggal' => 'required',
        ]);

        $kematian = Kematian::findOrFail($id);
        $kematian->tanggal_meninggal = $request->tanggal_meninggal;
        $kematian->keterangan = $request->keterangan;
        $kematian->save();

        $penduduk = Penduduk::where('id', $id)->first();
        $penduduk->status = 'meninggal';
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data kematian berhasil diupdate']);
    }

    public function destroy($id)
    {
        Kematian::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Data kematian berhasil dihapus']);
    }
}
