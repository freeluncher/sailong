@extends('layouts.guest')

@section('content')
    <div class="mt-10 bg-blue-50 min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-8 text-blue-900 text-center">Akomodasi Pilihan</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($accommodations as $accommodation)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col h-full border-2 border-blue-100 hover:border-yellow-400 transition">
                        <div class="w-full h-48 overflow-hidden relative">
                            <img class="object-cover w-full h-full transition-transform duration-300 hover:scale-105"
                                src="{{ Storage::url('img/' . $accommodation->image) }}"
                                alt="{{ $accommodation->name }}">
                            <span
                                class="absolute top-2 right-2 bg-yellow-400 text-blue-900 text-xs font-bold px-3 py-1 rounded-full shadow">
                                {{ $accommodation->location }}</span>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <h2 class="text-xl font-bold mb-1 text-blue-800 truncate">{{ $accommodation->name }}</h2>
                            <p class="text-blue-700 mb-2 text-sm line-clamp-2">{{ $accommodation->description }}</p>
                            <div class="mt-auto">
                                <p class="text-lg font-bold text-yellow-500 mb-2">Rp{{ number_format($accommodation->price_per_night, 0, ',', '.') }}
                                    <span class="text-xs text-blue-700 font-normal">/ malam</span></p>
                                <a href="{{ route('public.accommodations.show', $accommodation) }}"
                                    class="inline-block w-full text-center bg-blue-600 hover:bg-yellow-400 hover:text-blue-900 text-white font-semibold px-4 py-2 rounded-lg shadow transition">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
