<?php

namespace App\Http\Controllers;

use App\DataTables\PendatangDataTable;
use App\Models\Pendatang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendatangController extends Controller
{

    public function index(PendatangDataTable $dataTable)
    {
        return $dataTable->render('backend.pendatang.index');
    }

    public function create()
    {
        $model = new Pendatang();
        return view('backend.pendatang.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'nullable|string',
            'nik' => 'required|unique:tb_pendatang,nik',
            'nama' => 'required|string|min:3|max:255',
            'jenis_kelamin' => 'required',
            'alamat_asal' => 'required',
            'lama_kedatangan' => 'required',
            'tujuan_kedatangan' => 'required',
            'tanggal_datang' => 'required',
            'no_hp' => 'nullable',
            'photo_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $pendatang = new Pendatang();
        $photo_path = $request->file('photo_path');

        if ($photo_path) {
            $photo_path_store     = $photo_path->store('images/pendatang', 'public');
            $pendatang->photo_path    = $photo_path_store;
        }

        $pendatang->no_kk = $request->no_kk;
        $pendatang->nik = $request->nik;
        $pendatang->nama = $request->nama;
        $pendatang->jenis_kelamin = $request->jenis_kelamin;
        $pendatang->alamat_asal = $request->alamat_asal;
        $pendatang->lama_kedatangan = $request->lama_kedatangan;
        $pendatang->tujuan_kedatangan = $request->tujuan_kedatangan;
        $pendatang->tanggal_datang = $request->tanggal_datang;
        $pendatang->no_hp = $request->no_hp;
        $pendatang->status = $request->status;
        $pendatang->save();

        return response()->json(['status' => 'success', 'message' => 'Pendatang berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Pendatang::findOrFail($id);
        return view('backend.pendatang.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Pendatang::findOrFail($id);
        return view('backend.pendatang.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_kk' => 'nullable|string',
            'nik' => 'required|unique:tb_pendatang,nik,' . $id,
            'nama' => 'required|string|min:3|max:255',
            'jenis_kelamin' => 'required',
            'alamat_asal' => 'required',
            'lama_kedatangan' => 'required',
            'tujuan_kedatangan' => 'required',
            'tanggal_datang' => 'required',
            'no_hp' => 'nullable',
            'photo_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $pendatang = Pendatang::findOrFail($id);

        $photo_path = $request->file('photo_path');

        if ($photo_path) {
            if (
                $pendatang->photo_path && file_exists(storage_path('app/public/' . $pendatang->photo_path))
            ) {
                Storage::delete('public/' . $pendatang->photo_path);
            }

            $photo_path_store = $photo_path->store('images/pendatang', 'public');

            $pendatang->photo_path = $photo_path_store;
        }
        $pendatang->no_kk = $request->no_kk;
        $pendatang->nik = $request->nik;
        $pendatang->nama = $request->nama;
        $pendatang->jenis_kelamin = $request->jenis_kelamin;
        $pendatang->alamat_asal = $request->alamat_asal;
        $pendatang->lama_kedatangan = $request->lama_kedatangan;
        $pendatang->tujuan_kedatangan = $request->tujuan_kedatangan;
        $pendatang->tanggal_datang = $request->tanggal_datang;
        $pendatang->no_hp = $request->no_hp;
        $pendatang->status = $request->status;
        $pendatang->save();

        return response()->json(['status' => 'success', 'message' => 'Pendatang berhasil diupdate']);
    }

    public function destroy($id)
    {
        $pendatang = Pendatang::findOrFail($id);

        if ($pendatang->photo_path && file_exists(storage_path('app/public/' . $pendatang->photo_path))) {
            Storage::delete('public/' . $pendatang->photo_path);
        }
        Pendatang::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Pendatang berhasil dihapus']);
    }
}
