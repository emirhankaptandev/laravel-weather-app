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

```bash
git clone https://github.com/emirhankaptandev/laravel-weather-app.git
cd laravel-weather-app
2. Bağımlılıkları yükleyin
composer install
3. .env dosyasını oluşturun
cp .env.example .env
4. API anahtarını ekleyin

.env dosyasına aşağıdaki satırı ekleyin:

OPENWEATHER_API_KEY=api_anahtariniz_buraya
5. Laravel anahtarını oluşturun
php artisan key:generate
6. Projeyi çalıştırın
php artisan serve

Uygulama çalıştıktan sonra terminalde verilen adresi tarayıcıda açabilirsiniz.
