@extends('layouts.app')

@section('content')
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
                        <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50"
                            x-show="open">
                            <div class="relative w-full h-full">
                                <div class="absolute top-2 right-2">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.4.2/cdn.min.js"
        integrity="sha512-A9cD6OglWOSkscXjib3QsW9UJ/zZVOoGHiH19BmMkNOhAl8ApY7t7JgFmAqZqzPFPbgUJmytDeiMLttH+xMDGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
            });
        });
    </script>
@endsection
