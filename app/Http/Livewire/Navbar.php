<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class Navbar extends Component
{
    public $menus = [];

    public $selectedMenu = 'Home';

    public function selectMenu($menu)
    {
        $this->selectedMenu = $menu;
    }


    public $selectedSubmenu = '';

    public function selectSubmenu($submenu)
    {
        $this->selectedSubmenu = $submenu;
    }

    public function mount()
    {
        $this->menus = Menu::with('submenus')->get();
        // dd($this->menus);
    }

    public function render()
    {

        return view('livewire.navbar');
    }
}
