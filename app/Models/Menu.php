<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = [
        'label', 'url', 'status',
    ];

    // Menu.php
    public function submenus()
    {
        return $this->hasMany(Submenu::class, 'menu_id');
    }
}
