<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = ['name', 'menu_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
