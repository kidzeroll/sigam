<?php

namespace App\Http\Controllers;

use App\DataTables\PekerjaanDataTable;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{

    public function index(PekerjaanDataTable $dataTable)
    {
        return $dataTable->render('backend.pekerjaan.index');
    }

    public function create()
    {
        $model = new Pekerjaan();
        return view('backend.pekerjaan.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $pekerjaan = new Pekerjaan();
        $pekerjaan->nama = $request->nama;
        $pekerjaan->save();

        return response()->json(['status' => 'success', 'message' => 'Pekerjaan berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Pekerjaan::findOrFail($id);
        return view('backend.pekerjaan.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Pekerjaan::findOrFail($id);
        return view('backend.pekerjaan.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->nama = $request->nama;
        $pekerjaan->save();

        return response()->json(['status' => 'success', 'message' => 'Pekerjaan berhasil diupdate']);
    }

    public function destroy($id)
    {
        Pekerjaan::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Pekerjaan berhasil dihapus']);
    }
}
