<?php

namespace App\Http\Controllers;

use App\DataTables\HubunganDataTable;
use App\Models\Hubungan;
use Illuminate\Http\Request;

class HubunganController extends Controller
{

    public function index(HubunganDataTable $dataTable)
    {
        return $dataTable->render('backend.hubungan.index');
    }

    public function create()
    {
        $model = new Hubungan();
        return view('backend.hubungan.form', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $hubungan = new Hubungan();
        $hubungan->nama = $request->nama;
        $hubungan->save();

        return response()->json(['status' => 'success', 'message' => 'Hubungan dalam keluarga berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Hubungan::findOrFail($id);
        return view('backend.hubungan.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Hubungan::findOrFail($id);
        return view('backend.hubungan.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $hubungan = Hubungan::findOrFail($id);
        $hubungan->nama = $request->nama;
        $hubungan->save();

        return response()->json(['status' => 'success', 'message' => 'Hubungan dalam keluarga berhasil diupdate']);
    }

    public function destroy($id)
    {
        Hubungan::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Hubungan dalam keluarga berhasil dihapus']);
    }
}
