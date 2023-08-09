<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'proker_image';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'kodeProker',
        'image'
    ];
    public function proker(){
        return $this->belongsTo(Proker::class, 'kodeProker', 'id');
    }
}
