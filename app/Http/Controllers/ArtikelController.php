<?php

namespace App\Http\Controllers;

use App\DataTables\ArtikelDataTable;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{

    public function index(ArtikelDataTable $dataTable)
    {
        return $dataTable->render('backend.artikel.index');
    }

    public function create()
    {
        $model = new Artikel();
        $kategoris = Kategori::all(['id', 'nama']);
        return view('backend.artikel.form', compact('model', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required|string|min:3|max:255|unique:tb_artikel,judul',
            'isi' => 'required',
            'photo_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $artikel = new Artikel();

        $photo_path = $request->file('photo_path');
        if ($photo_path) {
            $photo_path_store     = $photo_path->store('images/artikel', 'public');
            $artikel->photo_path    = $photo_path_store;
        }

        $artikel->user_id = auth()->user()->id;
        $artikel->kategori_id = $request->kategori_id;
        $artikel->judul = $request->judul;
        $artikel->slug = Str::slug($request->judul);
        $artikel->isi = $request->isi;

        $artikel->save();

        return response()->json(['status' => 'success', 'message' => 'Artikel berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Artikel::findOrFail($id);
        return view('backend.artikel.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Artikel::findOrFail($id);
        $kategoris = Kategori::all(['id', 'nama']);
        return view('backend.artikel.form', compact('model', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required|string|min:3|max:255|unique:tb_artikel,judul,' . $id,
            'isi' => 'required',
            'photo_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $artikel = Artikel::findOrFail($id);

        $photo_path = $request->file('photo_path');
        if ($photo_path) {
            if (
                $artikel->photo_path && file_exists(storage_path('app/public/' . $artikel->photo_path))
            ) {
                Storage::delete('public/' . $artikel->photo_path);
            }

            $photo_path_store = $photo_path->store('images/artikel', 'public');

            $artikel->photo_path = $photo_path_store;
        }

        $artikel->user_id = auth()->user()->id;
        $artikel->kategori_id = $request->kategori_id;
        $artikel->judul = $request->judul;
        $artikel->slug = Str::slug($request->judul);
        $artikel->isi = $request->isi;

        $artikel->save();

        return response()->json(['status' => 'success', 'message' => 'Artikel berhasil diupdate']);
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->photo_path && file_exists(storage_path('app/public/' . $artikel->photo_path))) {
            Storage::delete('public/' . $artikel->photo_path);
        }

        Artikel::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Artikel berhasil dihapus']);
    }
}
