<?php

namespace App\Http\Controllers;

use App\DataTables\PerkawinanDataTable;
use App\Models\Perkawinan;
use Illuminate\Http\Request;

class PerkawinanController extends Controller
{

    public function index(PerkawinanDataTable $dataTable)
    {
        return $dataTable->render('backend.perkawinan.index');
    }

    public function create()
    {
        $model = new Perkawinan();
        return view('backend.perkawinan.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $perkawinan = new Perkawinan();
        $perkawinan->nama = $request->nama;
        $perkawinan->save();

        return response()->json(['status' => 'success', 'message' => 'Status Perkawinan berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Perkawinan::findOrFail($id);
        return view('backend.perkawinan.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Perkawinan::findOrFail($id);
        return view('backend.perkawinan.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $perkawinan = Perkawinan::findOrFail($id);
        $perkawinan->nama = $request->nama;
        $perkawinan->save();

        return response()->json(['status' => 'success', 'message' => 'Status Perkawinan berhasil diupdate']);
    }

    public function destroy($id)
    {
        Perkawinan::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Status Perkawinan berhasil dihapus']);
    }
}
