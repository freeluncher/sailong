@extends('layouts.guest')

@section('content')
    <div class="mt-10">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold mb-6">Cuisines</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($cuisines as $cuisine)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full h-auto sm:w-60 md:w-64">
                        <div class="h-48 w-full overflow-hidden">
                            <img class="object-cover w-full h-full" src="{{ Storage::url($cuisine->image) }}"
                                alt="{{ $cuisine->name }}">
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-2 truncate">{{ $cuisine->name }}</h2>
                            <p class="text-gray-700 mb-4 truncate">{{ $cuisine->location }}</p>
                            <p class="text-gray-600 line-clamp-2">{{ $cuisine->description }}</p>
                            </p>
                            <a href="{{ route('cuisines.show', $cuisine) }}" class="text-blue-500 mt-4 inline-block">View
                                Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
