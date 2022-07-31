<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilGampong extends Model
{
    use HasFactory;

    protected $table = "tb_profil_gampong";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
