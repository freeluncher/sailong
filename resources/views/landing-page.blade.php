@extends('layouts.landing')

@section('content')
    <! -- Hero Section -->
        <div class="fixed h-screen w-full">
            <img src="{{ asset('img/bg-hero.png') }}" alt="Background Image"
                class="absolute object-center inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                <h1 class="text-4xl text-white font-bold">Selamat datang di Wisata Indah Ngesrepbalong</h1>
                <p class="text-xl text-white mt-4">Temukan destinasi menakjubkan, rencanakan perjalanan Anda, dan mulailah
                    menjelajahi dunia bersama kami</p>
            </div>
        </div>
        </div>
        <!-- Content Section -->
        <div class="relative bg-white p-20 text-center z-10">
            <h2 class="text-3xl font-bold">Maksimalkan rencana healing kamu!</h2>
            <p class="mt-4">Explore the various experiences we offer in our village.</p>
            <div class="container mx-auto py-6">
                <div class="flex flex-wrap -mx-4">
                    <!-- Card 1 -->
                    <div class="w-full md:w-1/3 px-4 mb-6">
                        <div class="bg-blue-500 rounded-lg overflow-hidden shadow-md h-full">
                            <div class="flex justify-center items-center px-6 pt-4">
                                <img class="w-2/3 h-2/3 object-cover" src="{{ asset('img/pariwisata.png') }}"
                                    alt="Image 1">
                            </div>
                            <div class="px-6 pt-2 pb-6">
                                <h2 class="text-xl text-white font-bold mb-2">Pariwisata</h2>
                                <p class="text-gray-200">Ketahui tempat-tempat Pariwisata di desa Ngesrepbalong yang menarik
                                    untuk dikunjungi</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="w-full md:w-1/3 px-4 mb-6">
                        <div class="bg-blue-500 rounded-lg overflow-hidden shadow-md h-full">
                            <div class="flex justify-center items-center px-6 pt-4">
                                <img class="w-2/3 h-2/3 object-cover" src="{{ asset('img/tour.png') }}" alt="Image 1">
                            </div>
                            <div class="px-6 pt-2 pb-6">
                                <h2 class="text-xl text-white font-bold mb-2">Paket Tour</h2>
                                <p class="text-gray-200">Pilih paket tur untuk memaksimalkan
                                    liburan kamu di desa wisata Ngesrepbalong</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="w-full md:w-1/3 px-4 mb-6">
                        <div class="bg-blue-500 rounded-lg overflow-hidden shadow-md h-full">
                            <div class="flex justify-center items-center px-6 pt-4">
                                <img class="w-2/3 h-2/3 object-cover" src="{{ asset('img/penginapan.png') }}"
                                    alt="Image 1">
                            </div>
                            <div class="px-6 pt-2 pb-6">
                                <h2 class="text-xl text-white font-bold mb-2">Penginapan</h2>
                                <p class="text-gray-200">Dapatkan pelayanan terbaik untuk tempat menginap kamu.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
    @endsection
