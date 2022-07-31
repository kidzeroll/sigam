<?php

namespace App\Http\Controllers;

use App\DataTables\PendidikanDataTable;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{

    public function index(PendidikanDataTable $dataTable)
    {
        return $dataTable->render('backend.pendidikan.index');
    }

    public function create()
    {
        $model = new Pendidikan();
        return view('backend.pendidikan.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $pendidikan = new Pendidikan();
        $pendidikan->nama = $request->nama;
        $pendidikan->save();

        return response()->json(['status' => 'success', 'message' => 'Pendidikan berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Pendidikan::findOrFail($id);
        return view('backend.pendidikan.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Pendidikan::findOrFail($id);
        return view('backend.pendidikan.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->nama = $request->nama;
        $pendidikan->save();

        return response()->json(['status' => 'success', 'message' => 'Pendidikan berhasil diupdate']);
    }

    public function destroy($id)
    {
        Pendidikan::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Pendidikan berhasil dihapus']);
    }
}
