<?php

namespace App\Http\Controllers;

use App\DataTables\SuratMasukDataTable;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{

    public function index(SuratMasukDataTable $dataTable)
    {
        return $dataTable->render('backend.surat-masuk.index');
    }

    public function create()
    {
        $model = new SuratMasuk();
        return view('backend.surat-masuk.form', compact('model'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required|string|min:3|max:255',
            'no_agenda' => 'required|string|min:3|max:255',
            'tanggal_surat' => 'required',
            'tanggal_masuk' => 'required',
            'perihal_surat' => 'required',
            'tembusan' => 'required',
            'pengirim' => 'required',
            'keterangan' => 'nullable',
            'lampiran_path' => 'nullable|mimes:pdf|max:2048',
        ]);

        $surat = new SuratMasuk();

        $lampiran_path = $request->file('lampiran_path');
        if ($lampiran_path) {
            $lampiran_path_store     = $lampiran_path->store('pdf/surat-masuk', 'public');
            $surat->lampiran_path    = $lampiran_path_store;
        }

        $surat->no_surat = $request->no_surat;
        $surat->no_agenda = $request->no_agenda;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->tanggal_masuk = $request->tanggal_masuk;
        $surat->perihal_surat = $request->perihal_surat;
        $surat->tembusan = $request->tembusan;
        $surat->pengirim = $request->pengirim;
        $surat->keterangan = $request->keterangan;

        $surat->save();

        return response()->json(['status' => 'success', 'message' => 'Surat masuk berhasil ditambah']);
    }

    public function show($id)
    {
        $model = SuratMasuk::findOrFail($id);
        return view('backend.surat-masuk.show', compact('model'));
    }

    public function edit($id)
    {
        $model = SuratMasuk::findOrFail($id);
        return view('backend.surat-masuk.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_surat' => 'required|string|min:3|max:255',
            'no_agenda' => 'required|string|min:3|max:255',
            'tanggal_surat' => 'required',
            'tanggal_masuk' => 'required',
            'perihal_surat' => 'required',
            'tembusan' => 'required',
            'pengirim' => 'required',
            'keterangan' => 'nullable',
            'lampiran_path' => 'nullable|mimes:pdf|max:2048',
        ]);

        $surat = SuratMasuk::findOrFail($id);

        $lampiran_path = $request->file('lampiran_path');

        if ($lampiran_path) {
            if (
                $surat->lampiran_path && file_exists(storage_path('app/public/' . $surat->lampiran_path))
            ) {
                Storage::delete('public/' . $surat->lampiran_path);
            }

            $lampiran_path_store = $lampiran_path->store('pdf/surat-masuk', 'public');

            $surat->lampiran_path = $lampiran_path_store;
        }

        if (request('password')) {
            $surat->password = bcrypt($request->password);
        }

        $surat->no_surat = $request->no_surat;
        $surat->no_agenda = $request->no_agenda;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->tanggal_masuk = $request->tanggal_masuk;
        $surat->perihal_surat = $request->perihal_surat;
        $surat->tembusan = $request->tembusan;
        $surat->pengirim = $request->pengirim;
        $surat->keterangan = $request->keterangan;

        $surat->save();

        return response()->json(['status' => 'success', 'message' => 'Surat masuk berhasil diupdate']);
    }


    public function destroy($id)
    {
        $surat = SuratMasuk::findOrFail($id);

        if ($surat->lampiran_path && file_exists(storage_path('app/public/' . $surat->lampiran_path))) {
            Storage::delete('public/' . $surat->lampiran_path);
        }

        SuratMasuk::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Surat masuk berhasil dihapus']);
    }
}
