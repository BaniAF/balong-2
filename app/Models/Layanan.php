<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'namaLayanan',
        'descLayanan',
        'lokasi',
        'kontak',
        'jam_operasional',
        'kategoriLayanan',
        'persyaratan',
        'biaya',
        'keterangan'
    ];
}
