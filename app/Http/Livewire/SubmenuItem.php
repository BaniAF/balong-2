<?php

namespace App\Http\Livewire;

use App\Models\Submenu;
use Livewire\Component;

class SubmenuItem extends Component
{
    public function render()
    {
        $submenu = Submenu::all();
        return view('livewire.submenu-item', compact('submenu'));
    }
}
