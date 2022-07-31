<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatGampong extends Model
{
    use HasFactory;

    protected $table = "tb_perangkat_gampong";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
