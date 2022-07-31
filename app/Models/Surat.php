<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = "tb_surat";
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $dates = ['tanggal_lahir', 'tanggal_meninggal', 'tanggal_dikebumikan', 'tanggal_pindah'];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
}
