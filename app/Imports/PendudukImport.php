<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendudukImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Penduduk([
            'no_kk' => $row['kk'],
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jk'],
            'alamat' => $row['alamat'],
            'tanggal_lahir' => $row['tgl_lahir'],
            'tempat_lahir' => $row['tmp_lahir'],
            'no_hp' => $row['no_hp'],
            'agama_id' => $row['agama_id'],
            'pendidikan_id' => $row['pendidikan_id'],
            'pekerjaan_id' => $row['pekerjaan_id'],
            'dusun_id' => $row['dusun_id'],
            'perkawinan_id' => $row['perkawinan_id'],
            'hubungan_id' => $row['hubungan_id'],
        ]);
    }
}
