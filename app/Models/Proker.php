<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;
    protected $table = 'proker';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'namaProker',
        'descProker',
        'fileProgram'
    ];
    public function prokerImages(){
        return $this->hasMany(Image_Kegiatan::class, 'kodeProker', 'id');
    }
}
