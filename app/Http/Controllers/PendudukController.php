<?php

namespace App\Http\Controllers;

use App\DataTables\PendudukDataTable;
use App\Imports\PendudukImport;
use App\Models\Agama;
use App\Models\Dusun;
use App\Models\Hubungan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Penduduk;
use App\Models\Perkawinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PendudukController extends Controller
{

    public function index(PendudukDataTable $dataTable)
    {
        return $dataTable->render('backend.penduduk.index');
    }

    public function create()
    {
        $model = new Penduduk();
        $agamas = Agama::all('id', 'nama');
        $pendidikans = Pendidikan::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        $dusuns = Dusun::all('id', 'nama');
        $hubungans = Hubungan::all('id', 'nama');
        $perkawinans = Perkawinan::all('id', 'nama');
        return view('backend.penduduk.form', compact('model', 'agamas', 'pendidikans', 'pekerjaans', 'dusuns', 'hubungans', 'perkawinans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agama_id' => 'required',
            'pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'dusun_id' => 'required',
            'hubungan_id' => 'required',
            'perkawinan_id' => 'required',

            'no_kk' => 'required|min:1|max:16',
            'nik' => 'required|min:1|max:16|unique:tb_penduduk,nik',
            'nama' => 'required|string|min:3|max:255',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'golongan_darah' => 'nullable',
            'penghasilan' => 'nullable',
            'nama_ayah' => 'nullable|string|min:1|max:255',
            'nama_ibu' => 'nullable|string|min:1|max:255',
            'no_hp' => 'nullable|min:10|max:15',
            'status' => 'nullable',
            'ktp_path' => 'nullable|mimes:pdf,jpg,png,jpeg|max:2048',
        ]);

        $penduduk = new Penduduk();

        $ktp_path = $request->file('ktp_path');
        if ($ktp_path) {
            $ktp_path_store     = $ktp_path->store('images/ktp', 'public');
            $penduduk->ktp_path    = $ktp_path_store;
        }


        $penduduk->agama_id = $request->agama_id;
        $penduduk->pendidikan_id = $request->pendidikan_id;
        $penduduk->pekerjaan_id = $request->pekerjaan_id;
        $penduduk->dusun_id = $request->dusun_id;
        $penduduk->hubungan_id = $request->hubungan_id;
        $penduduk->perkawinan_id = $request->perkawinan_id;

        $penduduk->no_kk = $request->no_kk;
        $penduduk->nik = $request->nik;
        $penduduk->nama = $request->nama;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->alamat = $request->alamat;
        $penduduk->tanggal_lahir = $request->tanggal_lahir;
        $penduduk->tempat_lahir = $request->tempat_lahir;
        $penduduk->kewarganegaraan = $request->kewarganegaraan;
        $penduduk->golongan_darah = $request->golongan_darah;
        $penduduk->penghasilan = $request->penghasilan;
        $penduduk->nama_ayah = $request->nama_ayah;
        $penduduk->nama_ibu = $request->nama_ibu;
        $penduduk->no_hp = $request->no_hp;
        $penduduk->status = $request->status;
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data penduduk berhasil ditambah']);
    }

    public function show($id)
    {
        $model = Penduduk::findOrFail($id);
        return view('backend.penduduk.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Penduduk::findOrFail($id);
        $agamas = Agama::all('id', 'nama');
        $pendidikans = Pendidikan::all('id', 'nama');
        $pekerjaans = Pekerjaan::all('id', 'nama');
        $dusuns = Dusun::all('id', 'nama');
        $hubungans = Hubungan::all('id', 'nama');
        $perkawinans = Perkawinan::all('id', 'nama');
        return view('backend.penduduk.form', compact('model', 'agamas', 'pendidikans', 'pekerjaans', 'dusuns', 'hubungans', 'perkawinans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'agama_id' => 'required',
            'pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'dusun_id' => 'required',
            'hubungan_id' => 'required',
            'perkawinan_id' => 'required',

            'no_kk' => 'required|min:1|max:16',
            'nik' => 'required|min:1|max:16|unique:tb_penduduk,nik,' . $id,
            'nama' => 'required|string|min:3|max:255',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'golongan_darah' => 'nullable',
            'penghasilan' => 'nullable',
            'nama_ayah' => 'nullable|string|min:1|max:255',
            'nama_ibu' => 'nullable|string|min:1|max:255',
            'no_hp' => 'nullable|min:10|max:15',
            'status' => 'nullable',
            'ktp_path' => 'nullable|mimes:pdf,jpg,png,jpeg|max:2048',
        ]);

        $penduduk = Penduduk::findOrFail($id);

        $ktp_path = $request->file('ktp_path');

        if ($ktp_path) {
            if (
                $penduduk->ktp_path && file_exists(storage_path('app/public/' . $penduduk->ktp_path))
            ) {
                Storage::delete('public/' . $penduduk->ktp_path);
            }

            $ktp_path_store = $ktp_path->store('images/ktp', 'public');

            $penduduk->ktp_path = $ktp_path_store;
        }

        $penduduk->agama_id = $request->agama_id;
        $penduduk->pendidikan_id = $request->pendidikan_id;
        $penduduk->pekerjaan_id = $request->pekerjaan_id;
        $penduduk->dusun_id = $request->dusun_id;
        $penduduk->hubungan_id = $request->hubungan_id;
        $penduduk->perkawinan_id = $request->perkawinan_id;

        $penduduk->no_kk = $request->no_kk;
        $penduduk->nik = $request->nik;
        $penduduk->nama = $request->nama;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->alamat = $request->alamat;
        $penduduk->tanggal_lahir = $request->tanggal_lahir;
        $penduduk->tempat_lahir = $request->tempat_lahir;
        $penduduk->kewarganegaraan = $request->kewarganegaraan;
        $penduduk->golongan_darah = $request->golongan_darah;
        $penduduk->penghasilan = $request->penghasilan;
        $penduduk->nama_ayah = $request->nama_ayah;
        $penduduk->nama_ibu = $request->nama_ibu;
        $penduduk->no_hp = $request->no_hp;
        $penduduk->status = $request->status;
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data penduduk berhasil diupdate']);
    }

    public function destroy($id)
    {
        Penduduk::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Data penduduk berhasil dihapus']);
    }

    // public function import(Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx'
    //     ]);

    //     $file = $request->file('file');
    //     $nama_file = rand() . $file->getClientOriginalName();
    //     $file->move('excel', $nama_file);
    //     // import data
    //     Excel::import(new PendudukImport, public_path('/excel/' . $nama_file));

    //     return redirect()->back()->with('success', 'Data penduduk berhasil di import');
    // }
}
