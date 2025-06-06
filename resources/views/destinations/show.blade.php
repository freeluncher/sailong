@extends('layouts.guest')

@section('content')
    <div class="container mx-auto p-4 max-w-5xl">
        <!-- Header Back Button -->
        <div class="mb-4">
            <a href="{{ route('destinations.index') }}" class="inline-flex items-center text-blue-700 hover:text-yellow-400 font-semibold">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <!-- Image and Details Section -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Main Image -->
                <div class="col-span-2 flex flex-col items-center justify-center">
                    <img src="{{ Storage::url('img/' . $destination->image) }}" alt="{{ $destination->name }}"
                        class="rounded-xl w-full h-80 object-cover border-4 border-blue-100 shadow-md">
                </div>

                <!-- Thumbnail Images & Gallery Modal -->
                <div class="flex flex-col space-y-4">
                    @foreach (array_slice($destination->gallery ?? [], 0, 2) as $item)
                        @if (isset($item['image']))
                            <img src="{{ Storage::url($item['image']) }}" alt="Thumbnail"
                                class="rounded-lg object-cover h-24 w-full border border-yellow-300">
                        @else
                            <img src="{{ Storage::url('img/default-thumbnail.jpg') }}" alt="Default Thumbnail"
                                class="rounded-lg object-cover h-24 w-full border border-yellow-300">
                        @endif
                    @endforeach
                    <div class="relative" x-data="{ open: false }">
                        <img src="{{ Storage::url('img/' . $destination->image) }}" alt="Thumbnail 3"
                            class="rounded-lg object-cover h-24 w-full cursor-pointer border border-yellow-300" @click="open = true">
                        <div class="absolute inset-0 bg-blue-900 bg-opacity-40 flex items-center justify-center rounded-lg cursor-pointer"
                            @click="open = true">
                            <span class="text-yellow-300 font-bold">Lihat semua foto</span>
                        </div>

                        <!-- Modal Gallery -->
                        <div class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-40 pt-24 md:pt-12"
                            x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90">
                            <div class="relative w-full h-full max-w-3xl mx-auto flex items-center justify-center">
                                <div class="absolute top-4 right-4 z-50">
                                    <button @click="open = false" class="text-yellow-300 text-3xl hover:text-yellow-500 bg-blue-900 bg-opacity-80 rounded-full p-2 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="swiper-container w-full h-full flex justify-center items-center">
                                    <div class="swiper-wrapper">
                                        @foreach ($destination->gallery ?? [] as $item)
                                            @if (isset($item['image']))
                                                <div class="swiper-slide flex justify-center items-center h-[70vh]">
                                                    <div class="flex w-full h-full items-center justify-center">
                                                        <img src="{{ Storage::url($item['image']) }}" alt="Slide"
                                                            class="object-contain max-h-full max-w-full mx-auto rounded-xl border-2 border-yellow-300 shadow-lg" style="display: block; margin-left: auto; margin-right: auto;">
                                                    </div>
                                                </div>
                                            @endif
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
            <div class="mt-8">
                <h1 class="text-3xl font-bold text-blue-900 mb-2">{{ $destination->name }}</h1>
                <p class="mt-2 text-lg text-blue-700">{{ $destination->description }}</p>
            </div>

            <!-- Info and Action Buttons -->
            <div class="mt-8 flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- Location, Hours, Price -->
                <div class="flex flex-col space-y-2 text-center md:text-left">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-yellow-400 mr-2"></i>
                        <span class="text-blue-900 font-semibold">{{ $destination->location }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock text-yellow-400 mr-2"></i>
                        <span class="text-blue-900">Buka {{ $destination->opening_hours ?? '-' }} - {{ $destination->closing_hours ?? '-' }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-ticket-alt text-yellow-400 mr-2"></i>
                        <span class="text-blue-900 font-bold text-lg">Rp{{ number_format($destination->ticket_price, 0, ',', '.') }} <span class="text-xs font-normal">/ tiket</span></span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-2 mt-4 md:mt-0">
                    @if (!empty($destination->action_buttons))
                        @foreach ($destination->action_buttons as $button)
                            <a href="{{ $button['url'] }}"
                                class="bg-yellow-400 text-blue-900 px-4 py-2 rounded-lg hover:bg-blue-700 hover:text-yellow-200 flex items-center space-x-2 font-semibold shadow transition">
                                <i class="{{ $button['icon'] }}"></i>
                                <span>{{ $button['label'] }}</span>
                            </a>
                        @endforeach
                    @else
                        <a href="#" class="bg-blue-900 text-yellow-300 px-4 py-2 rounded-lg hover:bg-yellow-400 hover:text-blue-900 font-bold shadow transition">PESAN</a>
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
