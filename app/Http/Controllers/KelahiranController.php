<?php

namespace App\Http\Controllers;

use App\DataTables\KelahiranDataTable;
use App\Models\Kelahiran;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{

    public function index(KelahiranDataTable $dataTable)
    {
        return $dataTable->render('backend.kelahiran.index');
    }

    public function create()
    {
        $model = new Kelahiran();
        return view('backend.kelahiran.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bayi' => 'required|string|min:3|max:255',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'nama_ayah' => 'nullable|string|min:3|max:255',
            'nama_ibu' => 'nullable|string|min:3|max:255',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $kelahiran = new Kelahiran();

        $kelahiran->nama_bayi = $request->nama_bayi;
        $kelahiran->jenis_kelamin = $request->jenis_kelamin;
        $kelahiran->tanggal_lahir = $request->tanggal_lahir;
        $kelahiran->tempat_lahir = $request->tempat_lahir;
        $kelahiran->nama_ayah = $request->nama_ayah;
        $kelahiran->nama_ibu = $request->nama_ibu;
        $kelahiran->status = $request->status;
        $kelahiran->keterangan = $request->keterangan;
        $kelahiran->save();

        return response()->json(['status' => 'success', 'message' => 'Data Kelahiran berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Kelahiran::findOrFail($id);
        return view('backend.kelahiran.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Kelahiran::findOrFail($id);
        return view('backend.kelahiran.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bayi' => 'required|string|min:3|max:255',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'nama_ayah' => 'nullable|string|min:3|max:255',
            'nama_ibu' => 'nullable|string|min:3|max:255',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $kelahiran = Kelahiran::findOrFail($id);

        $kelahiran->nama_bayi = $request->nama_bayi;
        $kelahiran->jenis_kelamin = $request->jenis_kelamin;
        $kelahiran->tanggal_lahir = $request->tanggal_lahir;
        $kelahiran->tempat_lahir = $request->tempat_lahir;
        $kelahiran->nama_ayah = $request->nama_ayah;
        $kelahiran->nama_ibu = $request->nama_ibu;
        $kelahiran->status = $request->status;
        $kelahiran->keterangan = $request->keterangan;
        $kelahiran->save();

        return response()->json(['status' => 'success', 'message' => 'Data kelahiran berhasil diupdate']);
    }

    public function destroy($id)
    {
        Kelahiran::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Data kelahiran berhasil dihapus']);
    }
}
