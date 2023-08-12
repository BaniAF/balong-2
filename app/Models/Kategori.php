<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kategoripost';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'namaKategori'
    ];
    protected $dates = ['deleted_at'];
    public function getNamaKategoriAttribute()
    {
        return $this->attributes['namaKategori'];
    }

    public function artikel()
    {
        return $this->hasMany(Article::class, 'kategoriPost', 'id');
    }
}
