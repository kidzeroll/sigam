<?php

namespace App\Http\Controllers;

use App\DataTables\SuratKeluarDataTable;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{

    public function index(SuratKeluarDataTable $dataTable)
    {
        return $dataTable->render('backend.surat-keluar.index');
    }

    public function create()
    {
        $model = new SuratKeluar();
        return view('backend.surat-keluar.form', compact('model'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required|string|min:3|max:255',
            'no_agenda' => 'required|string|min:3|max:255',
            'tanggal_surat' => 'required',
            'perihal_surat' => 'required',
            'tembusan' => 'required',
            'penerima' => 'required',
            'keterangan' => 'nullable',
            'lampiran_path' => 'nullable|mimes:pdf|max:2048',
        ]);

        $surat = new SuratKeluar();

        $lampiran_path = $request->file('lampiran_path');
        if ($lampiran_path) {
            $lampiran_path_store     = $lampiran_path->store('pdf/surat-keluar', 'public');
            $surat->lampiran_path    = $lampiran_path_store;
        }

        $surat->no_surat = $request->no_surat;
        $surat->no_agenda = $request->no_agenda;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->perihal_surat = $request->perihal_surat;
        $surat->tembusan = $request->tembusan;
        $surat->penerima = $request->penerima;
        $surat->keterangan = $request->keterangan;

        $surat->save();

        return response()->json(['status' => 'success', 'message' => 'Surat keluar berhasil ditambah']);
    }

    public function show($id)
    {
        $model = SuratKeluar::findOrFail($id);
        return view('backend.surat-keluar.show', compact('model'));
    }

    public function edit($id)
    {
        $model = SuratKeluar::findOrFail($id);
        return view('backend.surat-keluar.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_surat' => 'required|string|min:3|max:255',
            'no_agenda' => 'required|string|min:3|max:255',
            'tanggal_surat' => 'required',
            'perihal_surat' => 'required',
            'tembusan' => 'required',
            'penerima' => 'required',
            'keterangan' => 'nullable',
            'lampiran_path' => 'nullable|mimes:pdf|max:2048',
        ]);

        $surat = SuratKeluar::findOrFail($id);

        $lampiran_path = $request->file('lampiran_path');

        if ($lampiran_path) {
            if (
                $surat->lampiran_path && file_exists(storage_path('app/public/' . $surat->lampiran_path))
            ) {
                Storage::delete('public/' . $surat->lampiran_path);
            }

            $lampiran_path_store = $lampiran_path->store('pdf/surat-keluar', 'public');

            $surat->lampiran_path = $lampiran_path_store;
        }

        if (request('password')) {
            $surat->password = bcrypt($request->password);
        }

        $surat->no_surat = $request->no_surat;
        $surat->no_agenda = $request->no_agenda;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->perihal_surat = $request->perihal_surat;
        $surat->tembusan = $request->tembusan;
        $surat->penerima = $request->penerima;
        $surat->keterangan = $request->keterangan;

        $surat->save();
        return response()->json(['status' => 'success', 'message' => 'Surat keluar berhasil diupdate']);
    }


    public function destroy($id)
    {
        $surat = SuratKeluar::findOrFail($id);

        if ($surat->lampiran_path && file_exists(storage_path('app/public/' . $surat->lampiran_path))) {
            Storage::delete('public/' . $surat->lampiran_path);
        }

        SuratKeluar::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Surat keluar berhasil dihapus']);
    }
}
