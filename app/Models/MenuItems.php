<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'link',
        'status',
    ];

    public function submenus()
    {
        return $this->hasMany(SubmenuItem::class, 'id')->where('status', 'enable');
    }
}
