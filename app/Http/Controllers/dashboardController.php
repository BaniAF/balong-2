<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Proker;
use App\Models\Layanan;
use App\Models\BukuTamu;
use App\Models\Pegawai;

class dashboardController extends Controller
{
    public function index()
    {
        $totalPost = Post::count();
        $totalProker = Proker::count();
        $totalLayanan = Layanan::count();
        $totalTamu = BukuTamu::count();
        $totalPegawai = Pegawai::count();
        return view('backend.home', compact('totalPost', 'totalProker', 'totalLayanan', 'totalTamu', 'totalPegawai'));
    }
}
