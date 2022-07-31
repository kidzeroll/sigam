<?php

namespace App\Http\Controllers;

use App\Models\ProfilGampong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilGampongController extends Controller
{
    public function index()
    {

        $gampong = ProfilGampong::find(1);

        return view('backend.profilgampong.profil-gampong', compact('gampong'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_gampong' => 'required',
            'nama_kecamatan' => 'required',
            'nama_kabupaten' => 'required',
            'nama_provinsi' => 'required',
            'kode_pos' => 'required',
            'alamat_gampong' => 'required',
        ]);

        $gampong = ProfilGampong::find($id);

        $logo_path = $request->file('logo_path');
        $ttd_path = $request->file('ttd_path');


        if ($logo_path) {
            if (
                $gampong->logo_path && file_exists(storage_path('app/public/' . $gampong->logo_path))
            ) {
                Storage::delete('public/' . $gampong->logo_path);
            }

            $logo_path_store = $logo_path->store('images/logo', 'public');

            $gampong->logo_path = $logo_path_store;
        }


        if ($ttd_path) {
            if (
                $gampong->ttd_path && file_exists(storage_path('app/public/' . $gampong->ttd_path))
            ) {
                Storage::delete('public/' . $gampong->ttd_path);
            }

            $ttd_path_store = $ttd_path->store('images/logo', 'public');

            $gampong->ttd_path = $ttd_path_store;
        }

        $gampong->nama_gampong = $request->nama_gampong;
        $gampong->nama_kecamatan = $request->nama_kecamatan;
        $gampong->nama_kabupaten = $request->nama_kabupaten;
        $gampong->nama_provinsi = $request->nama_provinsi;
        $gampong->kode_pos = $request->kode_pos;
        $gampong->kode_gampong = $request->kode_gampong;
        $gampong->alamat_gampong = $request->alamat_gampong;
        $gampong->nama_keuchik = $request->nama_keuchik;
        $gampong->alamat_keuchik = $request->alamat_keuchik;
        $gampong->twitter = $request->twitter;
        $gampong->facebook = $request->facebook;
        $gampong->whatsapp = $request->whatsapp;
        $gampong->instagram = $request->instagram;
        $gampong->map = $request->map;
        $gampong->save();

        return redirect()->back()->with('success', 'Profil gampong berhasil diupdate');
    }
}
