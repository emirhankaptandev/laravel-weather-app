# Laravel Hava Durumu Uygulaması

Laravel ve OpenWeatherMap API kullanılarak yapılmış basit bir hava durumu uygulaması.

## Özellikler

- Şehir arama
- Hava durumu bilgilerini gösterme
- Sıcaklık ve nem bilgisi
- Rüzgar yönü
- Gün doğumu ve gün batımı
- Gündüz / gece durumu
- Sıcaklığa göre tavsiye
- Hatalı arama kontrolü

## Kullanılan Teknolojiler

- PHP
- Laravel
- Blade
- CSS
- OpenWeatherMap API

## Proje Yapısı

- `routes/web.php` → Sayfa yönlendirmeleri
- `WeatherController.php` → Gelen isteği işler
- `WeatherService.php` → API isteğini yapar
- `weather.blade.php` → Sayfanın görünümü
- `style.css` → Sayfa stilleri

## Kurulum

### 1. Projeyi klonlayın
Terminale girdikten sonra
```bash
git clone https://github.com/emirhankaptandev/laravel-weather-app.git
cd laravel-weather-app
