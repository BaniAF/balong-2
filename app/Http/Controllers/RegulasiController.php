<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;

class RegulasiController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Regulasi $regulasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regulasi $regulasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regulasi $regulasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regulasi $regulasi)
    {
        //
    }

    public function tampilRegulasi($id)
    {
        $Regulasi = Regulasi::findOrFail($id);
        return view('frontend.articles.regulasi', compact('Regulasi'));
    }
}
