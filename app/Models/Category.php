<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Nama tabel untuk model Category
    protected $table = 'categories';

    // Kolom-kolom yang dapat diisi
    protected $fillable = ['namaKategori'];

    // Relasi one-to-many dengan model Article
    public function articles()
    {
        return $this->hasMany(Article::class, 'idKategori');
    }
}
