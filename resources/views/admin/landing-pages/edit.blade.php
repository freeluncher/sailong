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

                                    <div>
                                        <label for="cards[{{ $index }}][url]"
                                            class="block text-sm font-medium text-gray-700">Card URL</label>
                                        <input type="text" name="cards[{{ $index }}][url]"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                            value="{{ $card['url'] }}">
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
    @endsection

    @section('scripts')
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
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 30,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 40,
                        },
                    },
                });

                // Add card functionality
                const addCardButton = document.getElementById('add-card');
                const cardsContainer = document.getElementById('cards');

                addCardButton.addEventListener('click', function() {
                    const newCardIndex = cardsContainer.children.length;

                    const cardTemplate = `
                    <div class="card p-4 bg-gray-50 rounded-md shadow-sm border border-gray-200">
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="cards[${newCardIndex}][title]" class="block text-sm font-medium text-gray-700">Card Title</label>
                                <input type="text" name="cards[${newCardIndex}][title]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="cards[${newCardIndex}][description]" class="block text-sm font-medium text-gray-700">Card Description</label>
                                <textarea name="cards[${newCardIndex}][description]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3"></textarea>
                            </div>

                            <div>
                                <label for="cards[${newCardIndex}][image_path]" class="block text-sm font-medium text-gray-700">Card Image Path</label>
                                <input type="text" name="cards[${newCardIndex}][image_path]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="cards[${newCardIndex}][url]" class="block text-sm font-medium text-gray-700">Card URL</label>
                                <input type="text" name="cards[${newCardIndex}][url]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>
                    </div>
                `;

                    cardsContainer.insertAdjacentHTML('beforeend', cardTemplate);
                });
            });
        </script>
    @endsection
