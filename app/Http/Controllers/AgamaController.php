<?php

namespace App\Http\Controllers;

use App\DataTables\AgamaDataTable;
use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{

    public function index(AgamaDataTable $dataTable)
    {
        return $dataTable->render('backend.agama.index');
    }

    public function create()
    {
        $model = new Agama();
        return view('backend.agama.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $agama = new Agama();
        $agama->nama = $request->nama;
        $agama->save();

        return response()->json(['status' => 'success', 'message' => 'Agama berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Agama::findOrFail($id);
        return view('backend.agama.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Agama::findOrFail($id);
        return view('backend.agama.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $agama = Agama::findOrFail($id);
        $agama->nama = $request->nama;
        $agama->save();

        return response()->json(['status' => 'success', 'message' => 'Agama berhasil diupdate']);
    }

    public function destroy($id)
    {
        Agama::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Agama berhasil dihapus']);
    }
}
