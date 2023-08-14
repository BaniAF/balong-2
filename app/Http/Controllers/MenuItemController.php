<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItems;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuItemController extends Controller
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
        return view('admin.menu-items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'status' => 'required|in:enable,disable',
            'url' => 'nullable',
        ]);

        MenuItems::create($request->all());

        return redirect()->route('menu.create')
            ->with('success', 'Menu item has been created successfully.');
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

    public function aktifkanMenu($id)
    {
        $menuItems = Menu::find($id);

        if ($menuItems) {
            // Ubah status aktif dari gambar
            $menuItems->status = !$menuItems->status;
            $menuItems->save();

            toast('Status berhasil diubah', 'success');
        } else {
            toast('Status Gagal diubah', 'error');
        }

        return redirect('menu');
    }
}
