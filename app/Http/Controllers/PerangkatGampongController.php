<?php

namespace App\Http\Controllers;

use App\DataTables\PerangkatGampongDataTable;
use App\Models\PerangkatGampong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatGampongController extends Controller
{

    public function index(PerangkatGampongDataTable $dataTable)
    {
        return $dataTable->render('backend.perangkat-gampong.index');
    }

    public function create()
    {
        $model = new PerangkatGampong();
        return view('backend.perangkat-gampong.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required|min:3|max:255',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'nullable',
            'alamat' => 'nullable',
            'photo_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $perangkat = new PerangkatGampong();

        $photo_path = $request->file('photo_path');
        if ($photo_path) {
            $photo_path_store     = $photo_path->store('images/user', 'public');
            $perangkat->photo_path    = $photo_path_store;
        }

        $perangkat->nik = $request->nik;
        $perangkat->nama = $request->nama;
        $perangkat->jenis_kelamin = $request->jenis_kelamin;
        $perangkat->jabatan = $request->jabatan;
        $perangkat->no_hp = $request->no_hp;
        $perangkat->alamat = $request->alamat;

        $perangkat->save();

        return response()->json(['status' => 'success', 'message' => 'Perangkat gampong berhasil ditambah']);
    }

    public function show($id)
    {
        $model = PerangkatGampong::findOrFail($id);
        return view('backend.perangkat-gampong.show', compact('model'));
    }

    public function edit($id)
    {
        $model = PerangkatGampong::findOrFail($id);
        return view('backend.perangkat-gampong.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required|min:3|max:255',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'nullable',
            'alamat' => 'nullable',
            'photo_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $perangkat = PerangkatGampong::findOrFail($id);

        $photo_path = $request->file('photo_path');
        if ($photo_path) {
            if (
                $perangkat->photo_path && file_exists(storage_path('app/public/' . $perangkat->photo_path))
            ) {
                Storage::delete('public/' . $perangkat->photo_path);
            }

            $photo_path_store = $photo_path->store('images/user', 'public');

            $perangkat->photo_path = $photo_path_store;
        }

        $perangkat->nik = $request->nik;
        $perangkat->nama = $request->nama;
        $perangkat->jenis_kelamin = $request->jenis_kelamin;
        $perangkat->jabatan = $request->jabatan;
        $perangkat->no_hp = $request->no_hp;
        $perangkat->alamat = $request->alamat;

        $perangkat->save();

        return response()->json(['status' => 'success', 'message' => 'Perangkat gampong berhasil diupdate']);
    }

    public function destroy($id)
    {
        $perangkat = PerangkatGampong::findOrFail($id);

        if ($perangkat->photo_path && file_exists(storage_path('app/public/' . $perangkat->photo_path))) {
            Storage::delete('public/' . $perangkat->photo_path);
        }

        PerangkatGampong::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Perangkat gampong berhasil dihapus']);
    }
}
