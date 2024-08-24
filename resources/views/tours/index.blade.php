@extends('layouts.guest')

@section('content')
    <div class="mt-10">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold mb-6">Tours</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($tours as $tour)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full h-auto sm:w-60 md:w-64">
                        <div class="w-full h-48 overflow-hidden">
                            <img class="object-cover w-full h-full" src="{{ Storage::url('img/' . $tour->image) }}"
                                alt="{{ $tour->name }}">
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-2 truncate">{{ $tour->name }}</h2>
                            <p class="text-gray-700 mb-4 truncate">{{ $tour->duration }}</p>
                            <p class="text-gray-600 line-clamp-2">{{ $tour->description }}</p>
                            <p class="text-gray-900 font-bold mt-4">Ticket Price: Rp{{ $tour->price }}
                            </p>
                            <a href="{{ route('tours.show', $tour) }}" class="text-blue-500 mt-4 inline-block">View
                                Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
