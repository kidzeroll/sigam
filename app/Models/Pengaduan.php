<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = "tb_pengaduan";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
