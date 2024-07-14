@extends('layouts.landing')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-screen w-full">
        <img src="{{ asset($landingPage->hero_image_path) }}" alt="Background Image"
            class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h1 class="text-4xl text-white font-bold">{{ $landingPage->title }}</h1>
            <p class="text-xl text-white mt-4">{{ $landingPage->content }}</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="relative bg-white p-20 text-center z-10">
        <h2 class="text-3xl font-bold">Maksimalkan rencana healing kamu!</h2>
        <p class="mt-4">Explore the various experiences we offer in our village.</p>
        <div class="container mx-auto py-6">
            <div class="flex flex-wrap -mx-4">
                @if (is_array($landingPage->cards))
                    @foreach ($landingPage->cards as $card)
                        <div class="w-full md:w-1/3 px-4 mb-6">
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
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
