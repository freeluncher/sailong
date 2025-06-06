@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-blue-50">
        <div class="container mx-auto py-8 px-4">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-blue-800">Edit Destination</h1>
                <a href="{{ route('admin.destinations.index') }}" class="inline-flex items-center gap-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold px-4 py-2 rounded-lg shadow transition">
                    <i class="fa fa-arrow-left"></i>
                    Back to List
                </a>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-8">
                <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data" x-data="{ open: false }">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label for="name" class="block text-blue-700 font-semibold mb-1">Name</label>
                            <input type="text" name="name" id="name" class="w-full border-blue-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('name', $destination->name) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-blue-700 font-semibold mb-1">Location</label>
                            <input type="text" name="location" id="location" class="w-full border-blue-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('location', $destination->location) }}" required>
                        </div>
                        <div class="mb-4 md:col-span-2">
                            <label for="description" class="block text-blue-700 font-semibold mb-1">Description</label>
                            <textarea name="description" id="description" class="w-full border-blue-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" required>{{ old('description', $destination->description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="opening_hours" class="block text-blue-700 font-semibold mb-1">Opening Hours</label>
                            <input type="time" name="opening_hours" id="opening_hours" class="w-full border-blue-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('opening_hours', $destination->opening_hours) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="closing_hours" class="block text-blue-700 font-semibold mb-1">Closing Hours</label>
                            <input type="time" name="closing_hours" id="closing_hours" class="w-full border-blue-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('closing_hours', $destination->closing_hours) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="ticket_price" class="block text-blue-700 font-semibold mb-1">Ticket Price</label>
                            <input type="number" name="ticket_price" id="ticket_price" class="w-full border-blue-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('ticket_price', $destination->ticket_price) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-blue-700 font-semibold mb-1">Main Image</label>
                            <input type="file" name="image" id="image" class="w-full border-blue-300 rounded-lg p-2">
                            @if ($destination->image)
                                <img src="{{ Storage::url($destination->image) }}" alt="{{ $destination->name }}" class="mt-4 h-32 rounded-lg border border-blue-200">
                            @endif
                        </div>
                        <div class="mb-4 md:col-span-2">
                            <label for="gallery" class="block text-blue-700 font-semibold mb-1">Gallery</label>
                            <input type="file" name="gallery[]" id="gallery_input" class="w-full border-blue-300 rounded-lg p-2" multiple>
                            <div id="gallery_preview" class="flex flex-wrap mt-2 space-x-2">
                                @foreach ($destination->gallery as $item)
                                    <img src="{{ Storage::url($item['image']) }}" alt="Gallery Image" class="h-32 rounded-lg mx-1 my-2 border border-blue-200">
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-4 md:col-span-2">
                            <label class="block text-blue-700 font-semibold mb-1">Action Buttons</label>
                            <div id="action_buttons_container">
                                @foreach ($destination->action_buttons as $index => $button)
                                    <div class="flex space-x-4 mb-2">
                                        <input type="text" name="action_buttons[{{ $index }}][label]" placeholder="Button Label" class="w-full border-blue-300 rounded-lg p-2" value="{{ old('action_buttons.' . $index . '.label', $button['label']) }}">
                                        <input type="text" name="action_buttons[{{ $index }}][icon]" placeholder="Button Icon" class="w-full border-blue-300 rounded-lg p-2" value="{{ old('action_buttons.' . $index . '.icon', $button['icon']) }}">
                                        <input type="text" name="action_buttons[{{ $index }}][url]" placeholder="Button URL" class="w-full border-blue-300 rounded-lg p-2" value="{{ old('action_buttons.' . $index . '.url', $button['url']) }}">
                                        <button type="button" class="text-red-500 hover:text-red-700" onclick="this.parentElement.remove()">Remove</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add_button" class="mt-2 bg-green-500 text-white px-2 py-1 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out">Add Button</button>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-blue-700 transition">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryInput = document.getElementById('gallery_input');
            const galleryPreview = document.getElementById('gallery_preview');

            galleryInput.addEventListener('change', function(event) {
                galleryPreview.innerHTML = '';
                Array.from(event.target.files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imgDiv = document.createElement('div');
                        imgDiv.classList.add('relative');
                        imgDiv.innerHTML = `
                            <img src="${e.target.result}" alt="Gallery Image" class="h-32 rounded-lg mx-1 my-2 border border-blue-200">
                            <button type="button" data-index="${index}" class="absolute top-0 right-0 text-red-500 hover:text-red-700 remove-gallery-image">&times;</button>
                        `;
                        galleryPreview.appendChild(imgDiv);
                    };
                    reader.readAsDataURL(file);
                });
            });

            galleryPreview.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-gallery-image')) {
                    const index = event.target.getAttribute('data-index');
                    const files = Array.from(galleryInput.files);
                    files.splice(index, 1);
                    const dataTransfer = new DataTransfer();
                    files.forEach(file => dataTransfer.items.add(file));
                    galleryInput.files = dataTransfer.files;
                    event.target.closest('div').remove();
                }
            });

            const addButton = document.getElementById('add_button');
            const actionButtonsContainer = document.getElementById('action_buttons_container');
            addButton.addEventListener('click', function() {
                const newIndex = actionButtonsContainer.children.length;
                const actionButtonDiv = document.createElement('div');
                actionButtonDiv.classList.add('flex', 'space-x-4', 'mb-2');
                actionButtonDiv.innerHTML = `
                    <input type="text" name="action_buttons[${newIndex}][label]" placeholder="Button Label" class="w-full border-blue-300 rounded-lg p-2">
                    <input type="text" name="action_buttons[${newIndex}][icon]" placeholder="Button Icon" class="w-full border-blue-300 rounded-lg p-2">
                    <input type="text" name="action_buttons[${newIndex}][url]" placeholder="Button URL" class="w-full border-blue-300 rounded-lg p-2">
                    <button type="button" class="text-red-500 hover:text-red-700" onclick="this.parentElement.remove()">Remove</button>
                `;
                actionButtonsContainer.appendChild(actionButtonDiv);
            });
        });
    </script>
@endsection

@php
    $menu = [
        [
            'name' => 'Users',
            'url' => '#',
            'icon' => 'fa-solid fa-user',
            'submenu' => [
                ['name' => 'All Users', 'url' => route('admin.users.index'), 'icon' => 'fa-solid fa-users'],
                ['name' => 'Roles', 'url' => route('admin.roles.index'), 'icon' => 'fa-solid fa-masks-theater'],
                ['name' => 'Permissions', 'url' => route('admin.permissions.index'), 'icon' => 'fa-solid fa-key'],
            ],
        ],
        ['name' => 'Settings', 'url' => route('admin.settings'), 'icon' => 'fa-solid fa-gear'],
        ['name' => 'Landing Pages', 'url' => route('admin.landing-pages.index'), 'icon' => 'fa-solid fa-pager'],
        ['name' => 'Destinations', 'url' => route('admin.destinations.index'), 'icon' => 'fa-solid fa-location-dot'],
        ['name' => 'Accommodations', 'url' => route('admin.accommodations.index'), 'icon' => 'fa-solid fa-hotel'],
        ['name' => 'Cuisines', 'url' => route('admin.cuisines.index'), 'icon' => 'fa-solid fa-utensils'],
    ];
@endphp
