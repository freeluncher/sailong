@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Create Landing Page</h1>

    <form action="{{ route('landing-pages.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" class="mt-1 block w-full" rows="10" required></textarea>
        </div>

        <div class="mb-4">
            <label for="hero_image_path" class="block text-sm font-medium text-gray-700">Hero Image Path</label>
            <input type="text" name="hero_image_path" id="hero_image_path" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="cards" class="block text-sm font-medium text-gray-700">Cards</label>
            <div id="cards">
                <div class="card mb-2">
                    <label for="cards[0][title]" class="block text-sm font-medium text-gray-700">Card Title</label>
                    <input type="text" name="cards[0][title]" class="mt-1 block w-full">

                    <label for="cards[0][description]" class="block text-sm font-medium text-gray-700">Card
                        Description</label>
                    <textarea name="cards[0][description]" class="mt-1 block w-full" rows="3"></textarea>

                    <label for="cards[0][image_path]" class="block text-sm font-medium text-gray-700">Card Image
                        Path</label>
                    <input type="text" name="cards[0][image_path]" class="mt-1 block w-full">
                </div>
            </div>
            <button type="button" id="add-card" class="bg-blue-500 text-white px-4 py-2 mt-2">Add Card</button>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Create</button>
    </form>

    <script>
        document.getElementById('add-card').addEventListener('click', function() {
            const cardsContainer = document.getElementById('cards');
            const cardCount = cardsContainer.getElementsByClassName('card').length;

            const cardTemplate = `
                <div class="card mb-2">
                    <label for="cards[${cardCount}][title]" class="block text-sm font-medium text-gray-700">Card Title</label>
                    <input type="text" name="cards[${cardCount}][title]" class="mt-1 block w-full">

                    <label for="cards[${cardCount}][description]" class="block text-sm font-medium text-gray-700">Card Description</label>
                    <textarea name="cards[${cardCount}][description]" class="mt-1 block w-full" rows="3"></textarea>

                    <label for="cards[${cardCount}][image_path]" class="block text-sm font-medium text-gray-700">Card Image Path</label>
                    <input type="text" name="cards[${cardCount}][image_path]" class="mt-1 block w-full">
                </div>
            `;

            cardsContainer.insertAdjacentHTML('beforeend', cardTemplate);
        });
    </script>
@endsection

@php
    $menu = [
        ['name' => 'Users', 'url' => route('admin.users')],
        ['name' => 'Settings', 'url' => route('admin.settings')],
        ['name' => 'Landing Pages', 'url' => route('landing-pages.index')],
    ];
@endphp
