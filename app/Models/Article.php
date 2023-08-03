<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Nama tabel untuk model Article
    protected $table = 'articles';

    // Kolom-kolom yang dapat diisi
    protected $fillable = ['judulArtikel', 'isiArtikel', 'image', 'idKategori'];

    // Relasi many-to-one dengan model Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'idKategori');
    }

    public function related()
    {
        if ($this->category) {
            return $this->category->articles()
                ->where('id', '!=', $this->id)
                ->get();
        } else {
            return collect(); // Menggunakan collection kosong jika tidak ada kategori
        }
    }
}
