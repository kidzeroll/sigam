<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = "tb_surat_keluar";
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['tanggal_surat'];
}
