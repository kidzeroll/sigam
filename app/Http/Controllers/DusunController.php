<?php

namespace App\Http\Controllers;

use App\DataTables\DusunDataTable;
use App\Models\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{

    public function index(DusunDataTable $dataTable)
    {
        return $dataTable->render('backend.dusun.index');
    }

    public function create()
    {
        $model = new Dusun();
        return view('backend.dusun.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
        ]);

        $dusun = new Dusun();
        $dusun->nama = $request->nama;
        $dusun->rt = $request->rt;
        $dusun->rw = $request->rw;
        $dusun->save();

        return response()->json(['status' => 'success', 'message' => 'Dusun berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Dusun::findOrFail($id);
        return view('backend.dusun.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Dusun::findOrFail($id);
        return view('backend.dusun.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
        ]);

        $dusun = Dusun::findOrFail($id);
        $dusun->nama = $request->nama;
        $dusun->rt = $request->rt;
        $dusun->rw = $request->rw;
        $dusun->save();

        return response()->json(['status' => 'success', 'message' => 'Dusun berhasil diupdate']);
    }

    public function destroy($id)
    {
        Dusun::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Dusun berhasil dihapus']);
    }
}
