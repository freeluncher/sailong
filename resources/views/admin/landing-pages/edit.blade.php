@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="flex flex-col md:flex-row md:space-x-8">
            <!-- Sidebar (optional) -->
            <aside class="hidden md:block w-1/4 bg-blue-50 rounded-lg shadow p-6 h-fit border border-blue-200">
                <h2 class="text-lg font-bold mb-4 text-blue-700">Landing Page Tools</h2>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.landing-pages.index') }}" class="flex items-center gap-2 px-3 py-2 rounded transition text-blue-700 font-semibold bg-blue-100 hover:bg-blue-200 hover:text-blue-900 shadow-sm">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back to List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.landing-pages.create') }}" class="flex items-center gap-2 px-3 py-2 rounded transition text-blue-600 font-semibold bg-blue-50 hover:bg-blue-200 hover:text-blue-900 shadow-sm">
                            <i class="fa fa-plus"></i>
                            <span>Create New</span>
                        </a>
                    </li>
                </ul>
                <div class="mt-8">
                    <span class="text-xs text-blue-400">Last updated: {{ $landingPage->updated_at->format('d M Y H:i') }}</span>
                </div>
            </aside>
            <!-- Main Form -->
            <main class="flex-1 bg-white rounded-lg shadow p-8 border border-blue-100">
                <h1 class="text-3xl font-bold mb-6 text-blue-800 flex items-center gap-2">
                    <i class="fa-solid fa-scroll text-blue-500"></i> Edit Landing Page
                </h1>
                <form action="{{ route('admin.landing-pages.update', $landingPage) }}" method="POST" id="landing-page-form" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-blue-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-blue-50 text-blue-900" value="{{ old('title', $landingPage->title) }}" required>
                        </div>
                        <div>
                            <label for="hero_image_path" class="block text-sm font-medium text-blue-700">Hero Image Path</label>
                            <input type="text" name="hero_image_path" id="hero_image_path" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-blue-50 text-blue-900" value="{{ old('hero_image_path', $landingPage->hero_image_path) }}">
                        </div>
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-medium text-blue-700">Content</label>
                        <textarea name="content" id="content" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-blue-50 text-blue-900" rows="5" required>{{ old('content', $landingPage->content) }}</textarea>
                    </div>
                    <div>
                        <label for="cards" class="block text-sm font-medium text-blue-700">Cards</label>
                        <div id="cards" class="space-y-4">
                            @foreach ($landingPage->cards as $index => $card)
                                <div class="card p-4 bg-blue-50 rounded-md shadow-sm border border-blue-200 relative">
                                    <button type="button" class="absolute top-2 right-2 text-blue-400 hover:text-blue-700" onclick="this.closest('.card').remove()"><i class="fa fa-times"></i></button>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="cards[{{ $index }}][title]" class="block text-xs font-semibold text-blue-600">Card Title</label>
                                            <input type="text" name="cards[{{ $index }}][title]" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-blue-900" value="{{ old('cards.' . $index . '.title', $card['title']) }}">
                                        </div>
                                        <div>
                                            <label for="cards[{{ $index }}][image_path]" class="block text-xs font-semibold text-blue-600">Card Image Path</label>
                                            <input type="text" name="cards[{{ $index }}][image_path]" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-blue-900" value="{{ old('cards.' . $index . '.image_path', $card['image_path']) }}">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="cards[{{ $index }}][description]" class="block text-xs font-semibold text-blue-600">Card Description</label>
                                        <textarea name="cards[{{ $index }}][description]" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-blue-900" rows="2">{{ old('cards.' . $index . '.description', $card['description']) }}</textarea>
                                    </div>
                                    <div class="mt-2">
                                        <label for="cards[{{ $index }}][url]" class="block text-xs font-semibold text-blue-600">Card URL (route name)</label>
                                        <input type="text" name="cards[{{ $index }}][url]" class="mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-blue-900" value="{{ old('cards.' . $index . '.url', $card['url']) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-card" class="mt-2 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">Add Card</button>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold shadow">Update</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add card functionality
            const addCardButton = document.getElementById('add-card');
            const cardsContainer = document.getElementById('cards');
            addCardButton.addEventListener('click', function() {
                const newCardIndex = cardsContainer.children.length;
                const cardTemplate = `
                <div class=\"card p-4 bg-blue-50 rounded-md shadow-sm border border-blue-200 relative\">
                    <button type=\"button\" class=\"absolute top-2 right-2 text-blue-400 hover:text-blue-700\" onclick=\"this.closest('.card').remove()\"><i class=\"fa fa-times\"></i></button>
                    <div class=\"grid grid-cols-1 md:grid-cols-2 gap-4\">
                        <div>
                            <label for=\"cards[${newCardIndex}][title]\" class=\"block text-xs font-semibold text-blue-600\">Card Title</label>
                            <input type=\"text\" name=\"cards[${newCardIndex}][title]\" class=\"mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-blue-900\">
                        </div>
                        <div>
                            <label for=\"cards[${newCardIndex}][image_path]\" class=\"block text-xs font-semibold text-blue-600\">Card Image Path</label>
                            <input type=\"text\" name=\"cards[${newCardIndex}][image_path]\" class=\"mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-blue-900\">
                        </div>
                    </div>
                    <div class=\"mt-2\">
                        <label for=\"cards[${newCardIndex}][description]\" class=\"block text-xs font-semibold text-blue-600\">Card Description</label>
                        <textarea name=\"cards[${newCardIndex}][description]\" class=\"mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-blue-900\" rows=\"2\"></textarea>
                    </div>
                    <div class=\"mt-2\">
                        <label for=\"cards[${newCardIndex}][url]\" class=\"block text-xs font-semibold text-blue-600\">Card URL (route name)</label>
                        <input type=\"text\" name=\"cards[${newCardIndex}][url]\" class=\"mt-1 block w-full border-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white text-blue-900\">
                    </div>
                </div>
                `;
                cardsContainer.insertAdjacentHTML('beforeend', cardTemplate);
            });
        });
    </script>
@endsection
