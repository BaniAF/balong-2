<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keperluan extends Model
{
    use HasFactory;
    protected $table = 'tb_keperluan';
    protected $primaryKey = 'kdKeperluan';
    protected $fillable = ['kdKeperluan', 'namaKeperluan', 'bidangKeperluan', 'keteranganKeperluan'];
}
