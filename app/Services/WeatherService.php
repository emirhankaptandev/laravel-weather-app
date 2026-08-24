<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getWeather($city)
    {
        $apiKey = env('OPENWEATHER_API_KEY');
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city},TR&appid={$apiKey}&units=metric&lang=tr";
        
$response = Http::withoutVerifying()->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}