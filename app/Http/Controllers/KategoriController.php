<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{

    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('backend.kategori.index');
    }

    public function create()
    {
        $model = new Kategori();
        return view('backend.kategori.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255|unique:tb_kategori,nama',
        ]);

        $kategori = new Kategori();

        $kategori->nama = $request->nama;
        $kategori->slug = Str::slug($request->nama);

        $kategori->save();

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Kategori::findOrFail($id);
        return view('backend.kategori.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Kategori::findOrFail($id);
        return view('backend.kategori.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255|unique:tb_kategori,nama,' . $id,
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->nama = $request->nama;
        $kategori->slug = Str::slug($request->nama);

        $kategori->save();

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil diupdate']);
    }

    public function destroy($id)
    {
        Kategori::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil dihapus']);
    }
}
