<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = "tb_penduduk";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_lahir'];


    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }

    public function hubungan()
    {
        return $this->belongsTo(Hubungan::class);
    }

    public function perkawinan()
    {
        return $this->belongsTo(Perkawinan::class);
    }

    public function kematian()
    {
        return $this->hasMany(Kematian::class);
    }

    public function perpindahan()
    {
        return $this->hasMany(Perpindahan::class);
    }
}
