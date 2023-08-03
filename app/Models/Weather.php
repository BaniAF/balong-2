<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Weather extends Model
{
    use HasFactory;

    protected function getApiKey()
    {
        return env('OPEN_WEATHER_MAP_API_KEY');
    }

    public function getWeather($city)
    {
        $apiKey = $this->getApiKey();
        $endpoint = 'https://api.openweathermap.org/data/2.5/weather';
        $url = "{$endpoint}?q={$city}&appid={$apiKey}&units=metric";
        $response = Http::get($url);
        return $response->json();
    }
}
