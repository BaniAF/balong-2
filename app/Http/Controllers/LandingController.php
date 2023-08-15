<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Kategori;
use App\Models\Pengumuman;
use App\Models\Post;
use App\Models\Bidang;
use App\Models\Weather;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data artikel dan pengumuman dari masing-masing controller
        $articles = Post::paginate(5);
        $artikel = Post::all();
        $pengumuman = Pengumuman::all();
        $kategori = Kategori::all();
        $bidang = Bidang::all();

        $weatherModel = new Weather();
        $city = $request->query('city', 'Ponorogo'); // Default city is Jakarta
        $weather = $weatherModel->getWeather($city);

        // Kirim data artikel, pengumuman, dan cuaca ke view 'landing'
        return view('frontend.landing', compact('articles', 'artikel', 'pengumuman', 'weather', 'kategori', 'bidang'));
    }
}
