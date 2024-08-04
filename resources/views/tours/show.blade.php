@extends('layouts.guest')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Header Back Button -->
        <div class="mb-4">
            <a href="{{ route('tour.index') }}" class="text-yellow-500 hover:text-yellow-600">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

        <!-- Image and Details Section -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Main Image -->
                <div class="col-span-2 flex justify-center items-center">
                    <img src="{{ asset('img/' . $tour->image) }}" alt="{{ $tour->name }}"
                        class="rounded-lg w-full h-96 object-cover">
                </div>

                <!-- Thumbnail Images -->
                <div class="flex flex-col space-y-4">
                    @foreach (array_slice($tour->gallery, 0, 2) as $item)
                        <img src="{{ asset('img/' . $item['image']) }}" alt="Thumbnail"
                            class="rounded-lg object-cover h-28 w-full">
                    @endforeach
                    <div class="relative" x-data="{ open: false }">
                        <img src="{{ asset('img/' . $tour->image) }}" alt="Thumbnail 3"
                            class="rounded-lg object-cover h-32 w-full cursor-pointer" @click="open = true">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-lg cursor-pointer"
                            @click="open = true">
                            <span class="text-white font-bold">Lihat semua foto</span>
                        </div>

                        <!-- Modal -->
                        <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-40"
                            x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90">
                            <div class="relative w-full h-full">
                                <div class="absolute top-2 right-2 z-50">
                                    <button @click="open = false" class="text-white text-3xl">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="swiper-container w-full h-full flex justify-center items-center">
                                    <div class="swiper-wrapper">
                                        @foreach ($tour->gallery as $item)
                                            <div class="swiper-slide flex justify-center items-center">
                                                <img src="{{ asset('img/' . $item['image']) }}" alt="Slide"
                                                    class="w-auto h-auto object-contain max-h-full max-w-full mx-auto">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                    <!-- Add Navigation -->
                                    <div class="swiper-button-next z-50"></div>
                                    <div class="swiper-button-prev z-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Title and Description -->
            <div class="mt-6">
                <h1 class="text-2xl font-bold">{{ $tour->name }}</h1>
                <p class="mt-4 text-gray-700">
                    {{ $tour->description }}
                </p>
            </div>

            <!-- Info and Action Buttons -->
            <div class="mt-6 flex flex-col md:flex-row justify-between items-center">
                <!-- Location, Hours, Price -->
                <div class="flex flex-col space-y-2 text-center md:text-left">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-yellow-500 mr-2"></i>
                        <span>{{ $tour->location }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock text-yellow-500 mr-2"></i>
                        <span>Buka
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $tour->opening_hours)->format('H:i') }} -
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $tour->closing_hours)->format('H:i') }}
                            WIB</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-ticket-alt text-yellow-500 mr-2"></i>
                        <span>{{ 'Rp ' . number_format($tour->ticket_price, 0, ',', '.') }}/tiket</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-2 mt-4 md:mt-0">
                    @if (!empty($tour->action_buttons))
                        <div class="mt-6 flex space-x-2">
                            @foreach ($tour->action_buttons as $button)
                                <a href="{{ $button['url'] }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 flex items-center space-x-2">
                                    <i class="{{ $button['icon'] }}"></i>
                                    <span>{{ $button['label'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
            });
        });
    </script>
@endsection
