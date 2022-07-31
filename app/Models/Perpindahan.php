<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpindahan extends Model
{
    use HasFactory;

    protected $table = "tb_perpindahan";
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['tanggal_pindah'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
