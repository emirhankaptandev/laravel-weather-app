<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index(Request $request)
    {
        $city = $request->input('city', 'Istanbul');
        $weather = $this->weatherService->getWeather($city);

        if (!$weather) {
            return view('weather.index', [
                'error' => 'Geçerli bir şehir adı giriniz!',
                'city' => $city
            ]);
        }

        // 1. Rüzgar Yönü Hesaplama
        $deg = $weather['wind']['deg'] ?? 0;
        if ($deg >= 315 || $deg < 45) {
            $windDirection = 'Kuzey';
        } elseif ($deg >= 45 && $deg < 135) {
            $windDirection = 'Doğu';
        } elseif ($deg >= 135 && $deg < 225) {
            $windDirection = 'Güney';
        } else {
            $windDirection = 'Batı';
        }

        // 2. Gün Doğumu ve Gün Batımı Saatleri
        $sunrise = date('H:i', $weather['sys']['sunrise']);
        $sunset = date('H:i', $weather['sys']['sunset']);

        // 3. Gece mi Gündüz mü Tespiti
        $now = time();
        $isDay = ($now >= $weather['sys']['sunrise'] && $now <= $weather['sys']['sunset']) ? 'Gündüz ☀️' : 'Gece 🌙';

        // 4. Sıcaklık Tavsiye Mesajı
        $temp = round($weather['main']['temp']);
        if ($temp < 5) {
            $advice = 'Hava çok soğuk, kalın giyinmeyi unutmayın!';
        } elseif ($temp >= 5 && $temp < 20) {
            $advice = 'Hava serin, yanınıza bir ceket alın.';
        } elseif ($temp >= 20 && $temp < 30) {
            $advice = 'Hava gayet güzel, dışarı çıkmak için harika bir gün!';
        } else {
            $advice = 'Hava bayağı sıcak, bol su içmeyi ihmal etmeyin.';
        }

        // 5. Nem Durumu
        $humidity = $weather['main']['humidity'];
        if ($humidity > 70) {
            $humidityStatus = 'Yüksek';
        } elseif ($humidity < 30) {
            $humidityStatus = 'Düşük';
        } else {
            $humidityStatus = 'Normal';
        }

        return view('weather.index', compact(
            'weather', 
            'city', 
            'windDirection', 
            'sunrise', 
            'sunset', 
            'isDay', 
            'advice', 
            'humidityStatus'
        ));
    }
}