@extends('layouts.guest')

@section('content')
    <div class="mt-10">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold mb-6">Destinations</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($destinations as $destination)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full h-auto sm:w-60 md:w-64">
                        <div class="w-full h-64 md:h-64 overflow-hidden">
                            <img class="object-cover w-full h-full" src="{{ Storage::url($destination->image) }}"
                                alt="{{ $destination->name }}">
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-2">{{ $destination->name }}</h2>
                            <p class="text-gray-700 mb-4">{{ $destination->location }}</p>
                            <p class="text-gray-600">{{ $destination->description }}</p>
                            <p class="text-gray-900 font-bold mt-4">Ticket Price: Rp{{ $destination->ticket_price }}</p>
                            <a href="{{ route('destinations.show', $destination) }}"
                                class="text-blue-500 mt-4 inline-block">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
