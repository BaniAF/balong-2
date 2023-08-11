<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    public function getSubmenus(Request $request, $menuId)
    {
        $submenus = Menu::findOrFail($menuId)->submenus;
        return response()->json($submenus);
    }
}
