<?php

namespace App\Http\Controllers;

use App\Models\MenuItems;
use App\Models\SubmenuItem;
use Illuminate\Http\Request;

class SubmenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuItems = MenuItems::where('status', 'enable')->get();
        return view('admin.sub-menu-item.create', compact('menuItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'menu_item_id' => 'required|exists:menu_items,id',
            'status' => 'required|in:enable,disable',
            'link' => 'nullable',
        ]);

        SubmenuItem::create([
            'name' => $request->name,
            'menu_item_id' => $request->menu_item_id,
            'status' => $request->status,
            'link' => $request->link,
        ]);

        return redirect()->route('submenu.create')
            ->with('success', 'SubMenu item has been created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
