@extends('layouts.guest')

@section('content')
    <div class="mt-10 bg-blue-50 min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-8 text-blue-900 text-center">Kuliner Pilihan</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse ($cuisines as $cuisine)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col h-full border-2 border-blue-100 hover:border-yellow-400 transition">
                        <div class="w-full h-48 overflow-hidden relative">
                            <img class="object-cover w-full h-full transition-transform duration-300 hover:scale-105"
                                src="{{ Storage::url($cuisine->image) }}" alt="{{ $cuisine->name }}">
                            <span
                                class="absolute top-2 left-2 bg-yellow-400 text-blue-900 text-xs font-bold px-3 py-1 rounded-full shadow">
                                {{ $cuisine->location }}</span>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h2 class="text-xl font-bold mb-2 text-blue-900 truncate">{{ $cuisine->name }}</h2>
                            <p class="text-blue-700 mb-2 line-clamp-2">{{ $cuisine->description }}</p>
                            <div class="mt-auto flex flex-col gap-2">
                                <a href="{{ route('cuisines.show', $cuisine) }}"
                                    class="bg-blue-900 text-yellow-300 px-4 py-2 rounded-lg hover:bg-yellow-400 hover:text-blue-900 font-semibold text-center transition">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-blue-900 font-semibold">Belum ada kuliner tersedia.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
