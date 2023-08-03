<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;
    protected $table = 'bukutamu';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'namaPengunjung',
        'keperluan',
        'keterangan',
        'noTelp'
    ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'namaPegawai', 'id');
    }
}
