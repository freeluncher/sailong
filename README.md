<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sailong - Reservasi Wisata, Kuliner, dan Akomodasi Desa Ngesrepbalong

![Sailong Landing Page](Sailong-Landing-Page.png)

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red?logo=laravel)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)](https://www.php.net/)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38bdf8?logo=tailwindcss)](https://tailwindcss.com/)
[![AOS](https://img.shields.io/badge/AOS-2.3.4-29b6f6?logo=aos)](https://michalsnik.github.io/aos/)
[![SwiperJS](https://img.shields.io/badge/SwiperJS-9.x-009688?logo=swiper)](https://swiperjs.com/)
[![License](https://img.shields.io/github/license/yourusername/sailong)](LICENSE)

---

## Tentang Sailong

Sailong adalah portal reservasi dan informasi wisata, kuliner, serta akomodasi di Desa Ngesrepbalong, Kecamatan Limbangan, Kabupaten Kendal, Jawa Tengah. Platform ini memudahkan wisatawan untuk menemukan destinasi menarik, kuliner khas, dan penginapan nyaman dengan tampilan modern, responsif, dan profesional.

## Fitur Utama
- Reservasi wisata, kuliner, dan akomodasi secara online
- Landing page dinamis, modern, dan responsif (tema biru-kuning)
- Admin panel dengan manajemen destinasi, kuliner, akomodasi, user, dan landing page
- Galeri, testimoni, video profil desa, dan highlight fitur
- Navigasi sidebar/topnav dinamis, konsisten, dan mobile friendly
- Validasi, security, dan best practice Laravel

## Teknologi
- Laravel 10.x
- PHP 8.2+
- TailwindCSS 3.x
- SwiperJS (carousel/slider)
- AOS (Animate On Scroll)
- Storage public (untuk gambar)

## Instalasi
1. Clone repo ini
2. Jalankan `composer install`
3. Copy `.env.example` ke `.env` dan sesuaikan konfigurasi database
4. Jalankan `php artisan key:generate`
5. Jalankan migrasi dan seeder: `php artisan migrate --seed`
6. Jalankan server: `php artisan serve`
7. Untuk development assets: `npm install && npm run dev`

## Struktur Utama
- `app/Http/Controllers` - Controller utama (admin & public)
- `app/Models` - Model utama (Accommodation, Destination, Cuisine, User, Booking, Tour, LandingPage)
- `resources/views` - Blade views (admin, public, landing page)
- `routes/web.php` - Route utama (resource & public)

## Preview
![Preview Landing Page](Sailong-Landing-Page.png)

## Lisensi
MIT

---

> Sailong dikembangkan untuk mendukung pariwisata dan ekonomi kreatif Desa Ngesrepbalong, Kendal.
