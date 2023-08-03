<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $weatherModel = new Weather();
        $city = $request->query('city', 'Jakarta'); // Default city is Jakarta
        $weather = $weatherModel->getWeather($city);

        return view('weather', compact('weather'));
    }
}
