<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $table = "tb_dusun";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
