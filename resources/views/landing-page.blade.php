@extends('layouts.landing')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-screen w-full overflow-hidden">
        <img src="{{ asset($landingPage->hero_image_path) }}" alt="Background Image"
            class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-bold text-center">{{ $landingPage->title }}</h1>
            <p class="text-lg md:text-xl lg:text-2xl text-white mt-4 text-center">{{ $landingPage->content }}</p>
        </div>
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
                            <a href="{{ route('accommodations.index') }}">
                                <div class="swiper-slide w-full md:w-1/3 px-2 mb-6">
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
                                </div>
                            </a>
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
