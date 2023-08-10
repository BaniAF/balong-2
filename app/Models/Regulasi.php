<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    use HasFactory;
    protected $table = 'regulasi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'namaRegulasi',
        'descRegulasi',
        'fileRegulasi'
    ];
}
