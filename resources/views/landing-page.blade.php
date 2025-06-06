@extends('layouts.landing')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-[90vh] w-full overflow-hidden bg-blue-900 flex flex-col justify-center items-center">
        <img src="{{ Storage::url($landingPage->hero_image_path) }}" alt="Background Image"
            class="absolute inset-0 w-full h-full object-cover opacity-70">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/90 via-blue-800/70 to-yellow-400/20"></div>
        <div class="relative z-20 flex flex-col items-center justify-center h-full w-full px-4 md:px-8">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-yellow-300 drop-shadow-lg text-center mb-6">
                {{ $landingPage->title }}
            </h1>
            <p class="text-lg sm:text-xl md:text-2xl text-yellow-100 mt-2 text-center max-w-2xl drop-shadow mb-8">
                {{ $landingPage->content }}
            </p>
            <a href="#explore" class="bg-yellow-400 text-blue-900 font-bold px-8 py-3 rounded-full shadow-lg hover:bg-yellow-300 transition text-lg mt-2">Jelajahi Sekarang</a>
        </div>
        <div class="absolute bottom-0 w-full flex flex-col items-center mb-6 px-4 md:px-8">
            <p class="text-yellow-100 text-center mb-2 text-sm sm:text-base font-semibold">Didukung oleh:</p>
            <div class="flex flex-wrap justify-center items-center gap-6 md:gap-12">
                <img src="{{ Storage::url('img/pemkab-kendal.png') }}" alt="Instansi 3" class="h-12 sm:h-16 bg-white rounded shadow p-1">
                <img src="{{ Storage::url('img/logo-disporapar.png') }}" alt="Instansi 1" class="h-12 sm:h-16 bg-white rounded shadow p-1">
                <img src="{{ Storage::url('img/logo-udinus.png') }}" alt="Instansi 2" class="h-12 sm:h-16 bg-white rounded shadow p-1">
            </div>
        </div>
    </div>
    <!-- About Us Section -->
    <div class="relative bg-blue-800 py-16 px-4 md:px-16 text-center z-10 overflow-hidden">
        <h2 class="text-3xl md:text-4xl font-bold text-yellow-300 mb-6">Tentang Sailong</h2>
        <p class="mt-4 text-lg md:text-xl text-yellow-100 max-w-3xl mx-auto">
            Selamat datang di <span class="font-bold text-yellow-400">Sailong</span>, portal resmi untuk informasi dan pemesanan pariwisata, kuliner, dan penginapan di desa Ngesrepbalong, Kecamatan Limbangan, Kabupaten Kendal, Jawa Tengah.<br><br>
            Temukan destinasi wisata menarik, kuliner khas, dan akomodasi nyaman. Kami hadir untuk memudahkan perjalanan Anda dengan informasi akurat dan akses pemesanan yang mudah.<br>
            <span class="font-semibold text-yellow-200">Bergabunglah dan temukan pesona tersembunyi Ngesrepbalong untuk pengalaman liburan yang tak terlupakan.</span>
        </p>
    </div>
    <!-- Highlight Fitur Section (Dinamis) -->
    <div class="relative bg-white py-16 px-4 md:px-16 text-center z-10 overflow-hidden" id="explore">
        <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-8">Kenapa Pilih Sailong?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 max-w-6xl mx-auto justify-center items-center">
            <div class="col-span-full flex flex-wrap justify-center items-stretch gap-8">
                @if (!empty($landingPage->features) && is_array($landingPage->features))
                    @foreach ($landingPage->features as $feature)
                        <div class="flex flex-col items-center flex-1 min-w-[180px] max-w-[220px]">
                            <img src="{{ $feature['icon'] ?? 'https://cdn-icons-png.flaticon.com/512/190/190411.png' }}" class="h-16 mb-3" alt="{{ $feature['title'] ?? '' }}">
                            <span class="font-bold text-yellow-400 mb-2 text-lg">{{ $feature['title'] ?? '' }}</span>
                            <span class="text-blue-900">{{ $feature['desc'] ?? '' }}</span>
                        </div>
                    @endforeach
                    <!-- Tambahan 2 fitur statis -->
                    <div class="flex flex-col items-center flex-1 min-w-[180px] max-w-[220px]">
                        <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" class="h-16 mb-3" alt="Dukungan 24 Jam">
                        <span class="font-bold text-yellow-400 mb-2 text-lg">Dukungan 24 Jam</span>
                        <span class="text-blue-900">Tim kami siap membantu Anda kapan saja selama 24 jam.</span>
                    </div>
                    <div class="flex flex-col items-center flex-1 min-w-[180px] max-w-[220px]">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="h-16 mb-3" alt="Transaksi Aman">
                        <span class="font-bold text-yellow-400 mb-2 text-lg">Transaksi Aman</span>
                        <span class="text-blue-900">Pembayaran dan data Anda dijamin aman dengan sistem terenkripsi.</span>
                    </div>
                @else
                    <div class="flex flex-col items-center flex-1 min-w-[180px] max-w-[220px]">
                        <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="h-16 mb-3" alt="Booking Mudah">
                        <span class="font-bold text-yellow-400 mb-2 text-lg">Booking Mudah</span>
                        <span class="text-blue-900">Proses reservasi cepat, aman, dan praktis langsung dari website.</span>
                    </div>
                    <div class="flex flex-col items-center flex-1 min-w-[180px] max-w-[220px]">
                        <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" class="h-16 mb-3" alt="Dukungan 24 Jam">
                        <span class="font-bold text-yellow-400 mb-2 text-lg">Dukungan 24 Jam</span>
                        <span class="text-blue-900">Tim kami siap membantu Anda kapan saja selama 24 jam.</span>
                    </div>
                    <div class="flex flex-col items-center flex-1 min-w-[180px] max-w-[220px]">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="h-16 mb-3" alt="Transaksi Aman">
                        <span class="font-bold text-yellow-400 mb-2 text-lg">Transaksi Aman</span>
                        <span class="text-blue-900">Pembayaran dan data Anda dijamin aman dengan sistem terenkripsi.</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Content Section (Cards) -->
    <div class="relative bg-blue-50 py-16 px-4 md:px-16 text-center z-10 overflow-hidden">
        <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-8">Maksimalkan Healingmu!</h2>
        <p class="mt-2 text-lg md:text-xl text-blue-700 mb-8">Jelajahi pengalaman terbaik di desa kami.</p>
        <div class="container mx-auto py-6">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @if (is_array($landingPage->cards))
                        @foreach ($landingPage->cards as $card)
                            <div class="swiper-slide w-full md:w-1/3 px-2 mb-6">
                                <a href="{{ route(str_replace('-', '.', $card['url'])) }}">
                                    <div class="bg-blue-800 hover:bg-blue-900 rounded-lg overflow-hidden shadow-md h-full transition flex flex-col">
                                        <div class="flex justify-center items-center px-6 pt-4">
                                            <img class="w-2/3 h-32 object-cover rounded shadow bg-white" src="{{ Storage::url($card['image_path']) }}" alt="Image">
                                        </div>
                                        <div class="px-6 pt-2 pb-6 flex-1 flex flex-col justify-between">
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
    <!-- Galeri Section (Dinamis) -->
    <div class="relative bg-white py-16 px-4 md:px-16 text-center z-10 overflow-hidden">
        <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-8">Galeri Wisata</h2>
        <div class="swiper-container-galeri max-w-5xl mx-auto">
            <div class="swiper-wrapper">
                @if (!empty($landingPage->gallery) && is_array($landingPage->gallery))
                    @foreach ($landingPage->gallery as $img)
                        <div class="swiper-slide">
                            <img src="{{ $img }}" class="rounded-xl shadow-lg w-full h-64 object-cover" alt="Galeri">
                        </div>
                    @endforeach
                @else
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80" class="rounded-xl shadow-lg w-full h-64 object-cover" alt="Galeri 1">
                    </div>
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Testimoni Section (Dinamis) -->
    <div class="relative bg-yellow-50 py-16 px-4 md:px-16 text-center z-10 overflow-hidden">
        <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-8">Apa Kata Mereka?</h2>
        <div class="swiper-container-testimoni max-w-4xl mx-auto">
            <div class="swiper-wrapper">
                @if (!empty($landingPage->testimonials) && is_array($landingPage->testimonials))
                    @foreach ($landingPage->testimonials as $testimonial)
                        <div class="swiper-slide flex flex-col items-center justify-start h-full">
                            <div class="flex flex-col items-center w-full">
                                <img src="{{ $testimonial['photo'] ?? 'https://randomuser.me/api/portraits/men/32.jpg' }}" class="h-20 w-20 rounded-full border-4 border-yellow-400 shadow mb-4 mx-auto" alt="Testimoni">
                            </div>
                            <blockquote class="text-blue-900 italic mb-2 w-full">“{{ $testimonial['quote'] ?? '' }}”</blockquote>
                            <span class="font-bold text-yellow-500 w-full">{{ $testimonial['name'] ?? '' }}</span>
                        </div>
                    @endforeach
                @else
                    <div class="swiper-slide flex flex-col items-center justify-start h-full">
                        <div class="flex flex-col items-center w-full">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="h-20 w-20 rounded-full border-4 border-yellow-400 shadow mb-4 mx-auto" alt="Testimoni 1">
                        </div>
                        <blockquote class="text-blue-900 italic mb-2 w-full">“Pelayanan sangat ramah, destinasi indah, dan booking sangat mudah!”</blockquote>
                        <span class="font-bold text-yellow-500 w-full">Budi Santoso</span>
                    </div>
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Video Section (Dinamis) -->
    <div class="relative bg-blue-900 py-16 px-4 md:px-16 text-center z-10 overflow-hidden">
        <h2 class="text-3xl md:text-4xl font-bold text-yellow-300 mb-8">Video Profil Desa</h2>
        <div class="flex justify-center">
            <div class="aspect-w-16 aspect-h-9 w-full max-w-3xl rounded-xl overflow-hidden shadow-lg border-4 border-yellow-400">
                <iframe src="{{ $landingPage->video_url ?? 'https://www.youtube.com/embed/2OEL4P1Rz04' }}" title="Profil Desa" frameborder="0" allowfullscreen class="w-full h-80"></iframe>
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
