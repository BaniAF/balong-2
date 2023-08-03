<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoripost';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'namaKategori'
    ];
    public function getNamaKategoriAttribute()
    {
        return $this->attributes['namaKategori'];
    }

    public function artikel()
    {
        return $this->hasMany(Article::class, 'kategoriPost', 'id');
    }
}
