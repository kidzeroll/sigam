<?php

namespace App\Http\Controllers;

use App\DataTables\GaleriDataTable;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(GaleriDataTable $dataTable)
    {
        return $dataTable->render('backend.galeri.index');
    }

    public function create()
    {
        $model = new Galeri();
        return view('backend.galeri.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|min:3',
            'photo_path' => 'required',
            'photo_path.*' => 'image|mimes:jpg,png,jpeg|max:2048',

        ]);

        if ($request->hasFile('photo_path')) {
            $files = $request->file('photo_path');
            foreach ($files as $file) {
                $photo_path_store     = $file->store('images/galeri', 'public');

                Galeri::create([
                    'deskripsi' => $request->deskripsi,
                    'photo_path' => $photo_path_store,
                ]);
            }

            return response()->json(['status' => 'success', 'message' => 'Foto berhasil ditambah']);
        }
    }

    public function show($id)
    {
        $model = Galeri::findOrFail($id);
        return view('backend.galeri.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Galeri::findOrFail($id);
        return view('backend.galeri.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required|min:3',
        ]);

        $galeri = Galeri::findOrFail($id);



        if ($request->hasFile('photo_path')) {
            if (
                $galeri->photo_path && file_exists(storage_path('app/public/' . $galeri->photo_path))
            ) {
                Storage::delete('public/' . $galeri->photo_path);
            }
            $files = $request->file('photo_path');
            foreach ($files as $file) {
                $photo_path_store     = $file->store('images/galeri', 'public');

                $galeri->update([
                    'deskripsi' => $request->deskripsi,
                    'photo_path' => $photo_path_store,
                ]);
            }

            return response()->json(['status' => 'success', 'message' => 'Foto berhasil ditambah']);
        }
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->photo_path && file_exists(storage_path('app/public/' . $galeri->photo_path))) {
            Storage::delete('public/' . $galeri->photo_path);
        }

        Galeri::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Foto berhasil dihapus']);
    }
}
