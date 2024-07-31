@extends('layouts.landing')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-screen w-full overflow-hidden">
        <img src="{{ asset($landingPage->hero_image_path) }}" alt="Background Image"
            class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center px-4 md:px-8">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-white font-bold text-center">
                {{ $landingPage->title }}</h1>
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-white mt-4 text-center">{{ $landingPage->content }}
            </p>
        </div>
        <!-- Supported By Section -->
        <div class="absolute bottom-0 w-full flex flex-col items-center mb-6 px-4 md:px-8">
            <p class="text-white text-center mb-2 text-sm sm:text-base">Didukung oleh:</p>
            <div
                class="flex flex-wrap justify-center items-center space-x-0 space-y-2 sm:space-x-8 sm:space-y-4 md:space-y-0">
                <div class="flex flex-col md:flex-row items-center space-x-2 lg:">
                    <img src="{{ asset('img/logo-disbudpar-trans.png') }}" alt="Instansi 1" class="h-10 sm:h-12 pt-2">
                    <div class="flex flex-col items-center md:items-start">
                        <p class="text-white font-bold text-xl sm:text-2xl">DISBUDPAR</p>
                        <p class="text-white text-xs sm:text-sm">pariwisata.semarangkota.go.id</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center space-x-2">
                    <img src="{{ asset('img/logo-perhutani.png') }}" alt="Instansi 2" class="h-14 sm:h-16">
                    <div class="flex flex-col items-center md:items-start">
                        <p class="text-white font-bold text-xl sm:text-2xl">Perhutani</p>
                        <p class="text-white text-xs sm:text-sm">semarang</p>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center space-x-2">
                    <img src="{{ asset('img/logo-poldajateng.png') }}" alt="Instansi 3" class="h-10 sm:h-12">
                    <div class="flex flex-col items-center md:items-start">
                        <p class="text-white font-bold text-xl sm:text-2xl">POKDARWIS</p>
                        <p class="text-white text-xs sm:text-sm">gunung sari</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section -->
    <div class="relative bg-gray-100 p-6 md:p-12 lg:p-20 text-center z-10 overflow-hidden">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold">Tentang Kami</h2>
        <p class="mt-4 text-base md:text-lg">
            Selamat datang di Sailong atau Wisata Indah Ngesrepbalong, portal resmi untuk informasi dan pemesanan
            pariwisata, kuliner, dan penginapan di desa Ngesrepbalong, Kecamatan Limbangan, Kabupaten Kendal, Jawa Tengah.

            Ngesrepbalong menawarkan destinasi wisata menarik, kuliner khas, dan akomodasi nyaman. Kami hadir untuk
            memudahkan perjalanan Anda dengan informasi akurat dan akses pemesanan yang mudah.
            Bergabunglah dengan kami dan temukan pesona tersembunyi Ngesrepbalong untuk pengalaman liburan
            yang tak terlupakan.
        </p>
    </div>
    <!-- Content Section -->
    <div class="relative bg-white p-6 md:p-12 lg:p-20 text-center z-10 overflow-hidden">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold">Maksimalkan rencana healing kamu!</h2>
        <p class="mt-4 text-base md:text-lg">Explore the various experiences we offer in our village.</p>
        <div class="container mx-auto py-6">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @if (is_array($landingPage->cards))
                        @foreach ($landingPage->cards as $card)
                            <div class="swiper-slide w-full md:w-1/3 px-2 mb-6">
                                <a href="{{ route($card['url']) }}">
                                    <div class="bg-blue-500 rounded-lg overflow-hidden shadow-md h-full">
                                        <div class="flex justify-center items-center px-6 pt-4">
                                            <img class="w-2/3 h-2/3 object-cover" src="{{ asset($card['image_path']) }}"
                                                alt="Image">
                                        </div>
                                        <div class="px-6 pt-2 pb-6">
                                            <h2 class="text-xl text-white font-bold mb-2">{{ $card['title'] }}</h2>
                                            <p class="text-gray-200">{{ $card['description'] }}</p>
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
