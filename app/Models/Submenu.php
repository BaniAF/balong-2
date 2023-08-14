<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $table = 'submenu';
    protected $fillable = [
        'label', 'url', 'menu_id', 'status',
    ];

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function proker()
    {
        return $this->belongsTo(Proker::class, 'label', 'namaProker');
    }

    // Definisi relasi ke model Profil
    public function profil()
    {
        return $this->belongsTo(Profil::class, 'label', 'namaProfil');
    }

    // Definisi relasi ke model Bidang
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'label', 'namaBidang');
    }

    // Definisi relasi ke model Bidang
    public function regulasi()
    {
        return $this->belongsTo(Regulasi::class, 'label', 'namaRegulasi');
    }
}
