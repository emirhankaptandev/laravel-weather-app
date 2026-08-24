<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hava Durumu Uygulaması</title>
    <!-- Harici CSS Dosyası Bağlantısı -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="container">
        <h2>Hava Durumu Uygulaması</h2>

        <!-- Arama Formu -->
        <form action="{{ route('weather.index') }}" method="GET">
            <input type="text" name="city" value="{{ $city }}" placeholder="Şehir giriniz...">
            <button type="submit">Ara</button>
        </form>

        <!-- Hızlı Şehir Linkleri -->
        <div class="quick-links">
            <b>Hızlı Seçim:</b><br>
            <a href="{{ route('weather.index', ['city' => 'Istanbul']) }}">İstanbul</a> |
            <a href="{{ route('weather.index', ['city' => 'Ankara']) }}">Ankara</a> |
            <a href="{{ route('weather.index', ['city' => 'Izmir']) }}">İzmir</a> |
            <a href="{{ route('weather.index', ['city' => 'Bursa']) }}">Bursa</a>|
            <a href="{{ route('weather.index', ['city' => 'Erzincan']) }}">Erzincan</a>|
            <a href="{{ route('weather.index', ['city' => 'Ordu ']) }}">Ordu</a>
        </div>

        @if(isset($error))
            <p class="error">{{ $error }}</p>
        @elseif(isset($weather))

            <!-- Ana Hava Durumu Bilgisi -->
            <div class="weather-box">
                <h3>{{ $weather['name'] }}, {{ $weather['sys']['country'] }} ({{ $isDay }})</h3>
                <p>{{ $weather['weather'][0]['description'] }}</p>
                <img src="https://openweathermap.org/img/wn/{{ $weather['weather'][0]['icon'] }}@2x.png" alt="icon">
                <h1>{{ round($weather['main']['temp']) }}°C</h1>
            </div>

            <!-- Günün Tavsiyesi -->
            <div class="advice">
                <b>Günün Tavsiyesi:</b> {{ $advice }}
            </div>

            <!-- Detay Listesi -->
            <div class="details">
                <p><b>Hissedilen:</b> {{ round($weather['main']['feels_like']) }}°C</p>
                <p><b>Min / Maks Sıcaklık:</b> {{ round($weather['main']['temp_min']) }}°C / {{ round($weather['main']['temp_max']) }}°C</p>
                <p><b>Nem Oranı:</b> %{{ $weather['main']['humidity'] }} ({{ $humidityStatus }})</p>
                <p><b>Rüzgar Hızı:</b> {{ $weather['wind']['speed'] }} m/s</p>
                <p><b>Rüzgar Yönü:</b> {{ $windDirection }}</p>
                <p><b>Hava Basıncı:</b> {{ $weather['main']['pressure'] }} hPa</p>
                <p><b>Gün Doğumu:</b> {{ $sunrise }}</p>
                <p><b>Gün Batımı:</b> {{ $sunset }}</p>
            </div>

        @endif
    </div>

</body>
</html>