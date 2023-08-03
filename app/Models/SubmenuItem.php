<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'menu_item_id',
        'status',
    ];

    public function menuItem()
    {
        return $this->belongsTo(MenuItems::class, 'menu_item_id');
    }
}
