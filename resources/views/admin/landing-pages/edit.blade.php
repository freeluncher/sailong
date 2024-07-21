@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Landing Page</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Form Section -->
        <form action="{{ route('landing-pages.update', $landingPage) }}" method="POST" id="landing-page-form"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        value="{{ $landingPage->title }}" required>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        rows="5" required>{{ $landingPage->content }}</textarea>
                </div>

                <div>
                    <label for="hero_image_path" class="block text-sm font-medium text-gray-700">Hero Image Path</label>
                    <input type="text" name="hero_image_path" id="hero_image_path"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        value="{{ $landingPage->hero_image_path }}">
                </div>

                <div>
                    <label for="cards" class="block text-sm font-medium text-gray-700">Cards</label>
                    <div id="cards" class="space-y-4">
                        @foreach ($landingPage->cards as $index => $card)
                            <div class="card p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200">
                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label for="cards[{{ $index }}][title]"
                                            class="block text-sm font-medium text-gray-700">Card Title</label>
                                        <input type="text" name="cards[{{ $index }}][title]"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            value="{{ $card['title'] }}">
                                    </div>

                                    <div>
                                        <label for="cards[{{ $index }}][description]"
                                            class="block text-sm font-medium text-gray-700">Card Description</label>
                                        <textarea name="cards[{{ $index }}][description]"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            rows="3">{{ $card['description'] }}</textarea>
                                    </div>

                                    <div>
                                        <label for="cards[{{ $index }}][image_path]"
                                            class="block text-sm font-medium text-gray-700">Card Image Path</label>
                                        <input type="text" name="cards[{{ $index }}][image_path]"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            value="{{ $card['image_path'] }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-card"
                        class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-md shadow-sm hover:bg-blue-600 transition duration-200">Add
                        Card</button>
                </div>
            </div>

            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 transition duration-200">Update</button>
        </form>

        <!-- Preview Section -->
        <div>
            <h2 class="text-xl font-bold mb-4">Preview</h2>
            <div id="preview" class="relative h-96 w-full overflow-hidden rounded-md shadow-lg mb-6">
                <img id="preview-hero-image" src="{{ asset('' . $landingPage->hero_image_path) }}" alt="Background Image"
                    class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <h1 id="preview-title" class="text-4xl md:text-5xl lg:text-6xl text-white font-bold text-center">
                        {{ $landingPage->title }}</h1>
                    <p id="preview-content" class="text-lg md:text-xl lg:text-2xl text-white mt-4 text-center">
                        {{ $landingPage->content }}</p>
                </div>
            </div>

            <div class="relative bg-white p-6 md:p-12 lg:p-20 text-center z-10 overflow-hidden">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold">Maksimalkan rencana healing kamu!</h2>
                <p class="mt-4 text-base md:text-lg">Explore the various experiences we offer in our village.</p>
                <div class="container mx-auto py-6">
                    <div id="preview-cards" class="flex flex-wrap -mx-4">
                        @foreach ($landingPage->cards as $card)
                            <div class="w-full md:w-1/3 px-4 mb-6">
                                <div class="bg-blue-500 rounded-lg overflow-hidden shadow-md h-full">
                                    <div class="flex justify-center items-center px-6 pt-4">
                                        <img class="w-2/3 h-2/3 object-cover" src="{{ asset('' . $card['image_path']) }}"
                                            alt="Image">
                                    </div>
                                    <div class="px-6 pt-2 pb-6">
                                        <h2 class="text-xl text-white font-bold mb-2">{{ $card['title'] }}</h2>
                                        <p class="text-gray-200">{{ $card['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updatePreview() {
                document.getElementById('preview-title').innerText = document.getElementById('title').value;
                document.getElementById('preview-content').innerText = document.getElementById('content').value;
                document.getElementById('preview-hero-image').src = '{{ asset('') }}/' + document
                    .getElementById('hero_image_path').value;

                const cardsContainer = document.getElementById('preview-cards');
                cardsContainer.innerHTML = '';

                const cardElements = document.querySelectorAll('#cards .card');
                cardElements.forEach((card, index) => {
                    const title = card.querySelector(`[name="cards[${index}][title]"]`).value;
                    const description = card.querySelector(`[name="cards[${index}][description]"]`).value;
                    const imagePath = card.querySelector(`[name="cards[${index}][image_path]"]`).value;

                    const cardTemplate = `
                        <div class="w-full md:w-1/3 px-4 mb-6">
                            <div class="bg-blue-500 rounded-lg overflow-hidden shadow-md h-full">
                                <div class="flex justify-center items-center px-6 pt-4">
                                    <img class="w-2/3 h-2/3 object-cover" src="{{ asset('') }}/${imagePath}" alt="Image">
                                </div>
                                <div class="px-6 pt-2 pb-6">
                                    <h2 class="text-xl text-white font-bold mb-2">${title}</h2>
                                    <p class="text-gray-200">${description}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    cardsContainer.insertAdjacentHTML('beforeend', cardTemplate);
                });
            }

            document.getElementById('landing-page-form').addEventListener('input', updatePreview);
            document.getElementById('add-card').addEventListener('click', function() {
                updatePreview();
                const cardsContainer = document.getElementById('cards');
                const cardCount = cardsContainer.getElementsByClassName('card').length;

                const cardTemplate = `
                    <div class="card p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200 mb-2">
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="cards[${cardCount}][title]" class="block text-sm font-medium text-gray-700">Card Title</label>
                                <input type="text" name="cards[${cardCount}][title]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="cards[${cardCount}][description]" class="block text-sm font-medium text-gray-700">Card Description</label>
                                <textarea name="cards[${cardCount}][description]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3"></textarea>
                            </div>

                            <div>
                                <label for="cards[${cardCount}][image_path]" class="block text-sm font-medium text-gray-700">Card Image Path</label>
                                <input type="text" name="cards[${cardCount}][image_path]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>
                    </div>
                `;
                cardsContainer.insertAdjacentHTML('beforeend', cardTemplate);
                updatePreview();
            });

            updatePreview();
        });
    </script>
@endsection




@php
    $menu = [
        [
            'name' => 'Users',
            'url' => '#',
            'submenu' => [
                ['name' => 'All Users', 'url' => route('users.index')],
                ['name' => 'Roles', 'url' => route('roles.index')],
                ['name' => 'Permissions', 'url' => route('permissions.index')],
            ],
        ],
        ['name' => 'Settings', 'url' => route('admin.settings')],
        ['name' => 'Landing Pages', 'url' => route('landing-pages.index')],
    ];
@endphp
