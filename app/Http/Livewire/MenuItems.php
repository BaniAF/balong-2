<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class MenuItems extends Component
{
    public function render()
    {
        $menus = Menu::all();
        return view('livewire.menu-items', compact('menus'));
    }
}
