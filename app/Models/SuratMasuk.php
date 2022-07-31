<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = "tb_surat_masuk";
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['tanggal_surat', 'tanggal_masuk'];
}
