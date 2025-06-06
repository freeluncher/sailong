@extends('layouts.landing')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-screen w-full overflow-hidden bg-blue-900">
        <img src="{{ Storage::url($landingPage->hero_image_path) }}" alt="Background Image"
            class="absolute inset-0 w-full h-full object-cover opacity-70">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/80 via-blue-800/60 to-yellow-400/30"></div>
        <div class="absolute top-16 z-20 w-full flex flex-col items-center mb-6 px-4 md:px-8 md:mt-4">
            <div class="flex flex-wrap justify-center items-center gap-6 md:gap-12">
                <img src="{{ Storage::url('img/logo-udinus.png') }}" alt="Instansi 3" class="h-10 sm:h-16 bg-white rounded shadow p-1">
                <img src="{{ Storage::url('img/logo-unggul.png') }}" alt="Instansi 1" class="h-10 sm:h-16 bg-white rounded shadow p-1">
                <img src="{{ Storage::url('img/logo-bem.png') }}" alt="Instansi 2" class="h-10 sm:h-16 bg-white rounded shadow p-1">
            </div>
        </div>
        <div class="absolute inset-0 flex flex-col items-center justify-center px-4 md:px-8">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-yellow-300 drop-shadow-lg text-center">
                {{ $landingPage->title }}
            </h1>
            <p class="text-lg sm:text-xl md:text-2xl text-yellow-100 mt-6 text-center max-w-2xl drop-shadow">
                {{ $landingPage->content }}
            </p>
        </div>
        <!-- Supported By Section -->
        <div class="absolute bottom-0 w-full flex flex-col items-center mb-6 px-4 md:px-8">
            <p class="text-yellow-100 text-center mb-2 text-sm sm:text-base font-semibold">Didukung oleh:</p>
            <div class="flex flex-wrap justify-center items-center gap-6 md:gap-12">
                <img src="{{ Storage::url('img/pemkab-kendal.png') }}" alt="Instansi 3" class="h-16 sm:h-20 bg-white rounded shadow p-1">
                <img src="{{ Storage::url('img/logo-disporapar.png') }}" alt="Instansi 1" class="h-16 sm:h-20 bg-white rounded shadow p-1">
            </div>
        </div>
    </div>
    <!-- About Us Section -->
    <div class="relative bg-blue-800 p-8 md:p-16 lg:p-24 text-center z-10 overflow-hidden mt-20">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-yellow-300 mb-6">Tentang Kami</h2>
        <p class="mt-4 text-lg md:text-xl text-yellow-100 max-w-3xl mx-auto">
            Selamat datang di <span class="font-bold text-yellow-400">Sailong</span> atau Wisata Indah Ngesrepbalong, portal resmi untuk informasi dan pemesanan pariwisata, kuliner, dan penginapan di desa Ngesrepbalong, Kecamatan Limbangan, Kabupaten Kendal, Jawa Tengah.<br><br>
            Ngesrepbalong menawarkan destinasi wisata menarik, kuliner khas, dan akomodasi nyaman. Kami hadir untuk memudahkan perjalanan Anda dengan informasi akurat dan akses pemesanan yang mudah.<br>
            <span class="font-semibold text-yellow-200">Bergabunglah dengan kami dan temukan pesona tersembunyi Ngesrepbalong untuk pengalaman liburan yang tak terlupakan.</span>
        </p>
    </div>
    <!-- Content Section -->
    <div class="relative bg-white p-8 md:p-16 lg:p-24 text-center z-10 overflow-hidden">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-blue-900 mb-6">Maksimalkan rencana healing kamu!</h2>
        <p class="mt-2 text-lg md:text-xl text-blue-700">Explore the various experiences we offer in our village.</p>
        <div class="container mx-auto py-6">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @if (is_array($landingPage->cards))
                        @foreach ($landingPage->cards as $card)
                            <div class="swiper-slide w-full md:w-1/3 px-2 mb-6">
                                <a href="{{ route(str_replace('-', '.', $card['url'])) }}">
                                    <div class="bg-blue-800 hover:bg-blue-900 rounded-lg overflow-hidden shadow-md h-full transition">
                                        <div class="flex justify-center items-center px-6 pt-4">
                                            <img class="w-2/3 h-32 object-cover rounded shadow bg-white" src="{{ Storage::url($card['image_path']) }}" alt="Image">
                                        </div>
                                        <div class="px-6 pt-2 pb-6">
                                            <h2 class="text-xl text-yellow-300 font-bold mb-2">{{ $card['title'] }}</h2>
                                            <p class="text-yellow-100">{{ $card['description'] }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                },
            });
        });
    </script>
@endsection
