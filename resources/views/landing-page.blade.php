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


    <div class="container mx-auto p-4">
        <!-- Header Back Button -->
        <div class="mb-4">
            <button class="text-yellow-500 hover:text-yellow-600">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>

        <!-- Image and Details Section -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Main Image -->
                <div class="col-span-2">
                    <img src="https://via.placeholder.com/600x400" alt="Curug Lawe Secepit"
                        class="rounded-lg w-full h-full object-cover">
                </div>

                <!-- Thumbnail Images -->
                <div class="flex flex-col space-y-4">
                    <img src="https://via.placeholder.com/200x150" alt="Thumbnail 1" class="rounded-lg object-cover">
                    <img src="https://via.placeholder.com/200x150" alt="Thumbnail 2" class="rounded-lg object-cover">
                    <div class="relative" x-data="{ open: false }">
                        <img src="https://via.placeholder.com/200x150" alt="Thumbnail 3"
                            class="rounded-lg object-cover cursor-pointer" @click="open = true">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-lg cursor-pointer"
                            @click="open = true">
                            <span class="text-white font-bold">Lihat semua foto</span>
                        </div>

                        <!-- Modal -->
                        <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-10"
                            x-show="open">
                            <div class="relative w-full h-full">
                                <div class="absolute top-2 right-2 z-50">
                                    <button @click="open = false" class="text-white text-3xl">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="swiper-container w-full h-full">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide flex justify-center items-center">
                                            <img src="https://via.placeholder.com/1200x800" alt="Slide 1"
                                                class="w-auto h-full object-contain">
                                        </div>
                                        <div class="swiper-slide flex justify-center items-center">
                                            <img src="https://via.placeholder.com/1200x800" alt="Slide 2"
                                                class="w-auto h-full object-contain">
                                        </div>
                                        <div class="swiper-slide flex justify-center items-center">
                                            <img src="https://via.placeholder.com/1200x800" alt="Slide 3"
                                                class="w-auto h-full object-contain">
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                    <!-- Add Navigation -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Title and Description -->
            <div class="mt-6">
                <h1 class="text-2xl font-bold">Curug Lawe Secepit</h1>
                <p class="mt-4 text-gray-700">
                    Di Curug Lawe Sicepit, grojogan atau air terjun yang ada, terbilang besar dan setinggi 20 meter. Dengan
                    udara yang dingin dan air yang segar, kadang muncul kabut yang menjadi nilai tambah dari lokasi wisata
                    ini. Tebing-tebing di sekitar air terjun banyak diselimuti tanaman peredu, hutan pinus yang menjulang
                    tinggi dan membuat mata menjadi segar. Belum lagi, aliran air di sungai terlihat jernih dan banyak batu
                    besar berwarna putih di tengahnya.
                </p>
            </div>

            <!-- Info and Action Buttons -->
            <div class="mt-6 flex flex-col md:flex-row justify-between items-center">
                <!-- Location, Hours, Price -->
                <div class="flex flex-col space-y-2 text-center md:text-left">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-yellow-500 mr-2"></i>
                        <span>Gunungsari, Ngesrepbalong, Kec. Limbangan, Kab. Kendal</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock text-yellow-500 mr-2"></i>
                        <span>BUKA 09.00 - 17.00</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-ticket-alt text-yellow-500 mr-2"></i>
                        <span>Rp5.000/tiket</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-2 mt-4 md:mt-0">
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 flex items-center space-x-2">
                        <i class="fas fa-map"></i>
                        <span>Rute</span>
                    </button>
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 flex items-center space-x-2">
                        <i class="fas fa-phone"></i>
                        <span>Kontak</span>
                    </button>
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 flex items-center space-x-2">
                        <i class="fas fa-bookmark"></i>
                        <span>Simpan</span>
                    </button>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        PESAN
                    </button>
                </div>
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
