<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Pengumuman;
use App\Models\Post;
use App\Models\Weather;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data artikel dan pengumuman dari masing-masing controller
        // $articles = Article::all();
        $artikel = Post::all();
        $pengumuman = Pengumuman::all();

        $weatherModel = new Weather();
        $city = $request->query('city', 'Ponorogo'); // Default city is Jakarta
        $weather = $weatherModel->getWeather($city);

        // Kirim data artikel, pengumuman, dan cuaca ke view 'landing'
        return view('frontend.landing', compact('artikel', 'pengumuman', 'weather'));
    }
}
