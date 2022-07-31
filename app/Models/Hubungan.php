<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubungan extends Model
{
    use HasFactory;

    protected $table = "tb_hubungan";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
