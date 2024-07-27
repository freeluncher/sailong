@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Edit Destination</h1>
        <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg"
                    value="{{ $destination->name }}">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full border-gray-300 rounded-lg">{{ $destination->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700">Location</label>
                <input type="text" name="location" id="location" class="w-full border-gray-300 rounded-lg"
                    value="{{ $destination->location }}">
            </div>
            <div class="mb-4">
                <label for="opening_hours" class="block text-gray-700">Opening Hours</label>
                <input type="time" name="opening_hours" id="opening_hours" class="w-full border-gray-300 rounded-lg"
                    value="{{ $destination->opening_hours }}">
            </div>
            <div class="mb-4">
                <label for="closing_hours" class="block text-gray-700">Closing Hours</label>
                <input type="time" name="closing_hours" id="closing_hours" class="w-full border-gray-300 rounded-lg"
                    value="{{ $destination->closing_hours }}">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Main Image</label>
                <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-lg">
                <img src="{{ asset('img/' . $destination->image) }}" alt="{{ $destination->name }}" class="mt-4 h-32">
            </div>
            <div class="mb-4">
                <label for="ticket_price" class="block text-gray-700">Ticket Price</label>
                <input type="number" name="ticket_price" id="ticket_price" class="w-full border-gray-300 rounded-lg"
                    value="{{ $destination->ticket_price }}">
            </div>
            <div class="mb-4">
                <label for="gallery" class="block text-gray-700">Gallery</label>
                <input type="file" name="gallery[]" id="gallery" class="w-full border-gray-300 rounded-lg" multiple>
                @foreach ($destination->gallery as $item)
                    <img src="{{ asset('img/' . $item['image']) }}" alt="Gallery Image" class="mt-4 h-32 inline">
                @endforeach
            </div>
            <div class="mb-4">
                <label for="action_buttons" class="block text-gray-700">Action Buttons</label>
                <div id="action_buttons_container">
                    @if (isset($destination->action_buttons))
                        @foreach ($destination->action_buttons as $index => $button)
                            <div class="flex space-x-4 mb-2">
                                <input type="text" name="action_buttons[{{ $index }}][label]"
                                    placeholder="Button Label" class="w-full border-gray-300 rounded-lg"
                                    value="{{ $button['label'] }}">
                                <input type="text" name="action_buttons[{{ $index }}][icon]"
                                    placeholder="Button Icon" class="w-full border-gray-300 rounded-lg"
                                    value="{{ $button['icon'] }}">
                                <input type="text" name="action_buttons[{{ $index }}][url]"
                                    placeholder="Button URL" class="w-full border-gray-300 rounded-lg"
                                    value="{{ $button['url'] }}">
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" id="add_button"
                    class="mt-2 bg-green-500 text-white px-2 py-1 rounded-lg hover:bg-green-600">
                    Add Button
                </button>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add_button').addEventListener('click', function() {
                const container = document.getElementById('action_buttons_container');
                const index = container.children.length;
                const div = document.createElement('div');
                div.classList.add('flex', 'space-x-4', 'mb-2');
                div.innerHTML = `
                    <input type="text" name="action_buttons[${index}][label]" placeholder="Button Label" class="w-full border-gray-300 rounded-lg">
                    <input type="text" name="action_buttons[${index}][icon]" placeholder="Button Icon" class="w-full border-gray-300 rounded-lg">
                    <input type="text" name="action_buttons[${index}][url]" placeholder="Button URL" class="w-full border-gray-300 rounded-lg">
                `;
                container.appendChild(div);
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
                ['name' => 'All Users', 'url' => route('users.index'), 'icon' => 'fa-solid fa-users'],
                ['name' => 'Roles', 'url' => route('roles.index'), 'icon' => 'fa-solid fa-masks-theater'],
                ['name' => 'Permissions', 'url' => route('permissions.index'), 'icon' => 'fa-solid fa-key'],
            ],
        ],
        ['name' => 'Settings', 'url' => route('admin.settings'), 'icon' => 'fa-solid fa-gear'],
        ['name' => 'Landing Pages', 'url' => route('landing-pages.index'), 'icon' => 'fa-solid fa-pager'],
    ];
@endphp
