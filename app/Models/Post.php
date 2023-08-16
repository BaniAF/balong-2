<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'tanggalPost',
        'judulPost',
        'isiPost',
        'kategoriPost',
        'statusPost',
        'userPost',
        'fotoPost'
    ];
    protected $attributes = [
        'statusPost' => 'Belum Diposting',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoriPost', 'id')->withTrashed();
    }

    public function situsmirip()
    {
        if ($this->kategori) {
            return $this->kategori->artikel()
                ->where('id', '!=', $this->id)
                ->get();
        } else {
            return collect(); // Menggunakan collection kosong jika tidak ada kategori
        }
    }
}
