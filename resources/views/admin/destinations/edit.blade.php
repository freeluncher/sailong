@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Edit Destination</h1>
            <a href="{{ route('admin.destinations.manage') }}" class="text-blue-500 hover:underline">Back to List</a>
        </div>

        <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data"
            x-data="{ open: false }">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg p-2"
                        value="{{ $destination->name }}" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea name="description" id="description" class="w-full border-gray-300 rounded-lg p-2" required>{{ $destination->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700">Location</label>
                    <input type="text" name="location" id="location" class="w-full border-gray-300 rounded-lg p-2"
                        value="{{ $destination->location }}" required>
                </div>

                <div class="mb-4">
                    <label for="opening_hours" class="block text-gray-700">Opening Hours</label>
                    <input type="time" name="opening_hours" id="opening_hours"
                        class="w-full border-gray-300 rounded-lg p-2" value="{{ $destination->opening_hours }}" required>
                </div>

                <div class="mb-4">
                    <label for="closing_hours" class="block text-gray-700">Closing Hours</label>
                    <input type="time" name="closing_hours" id="closing_hours"
                        class="w-full border-gray-300 rounded-lg p-2" value="{{ $destination->closing_hours }}" required>
                </div>

                <div class="mb-4">
                    <label for="ticket_price" class="block text-gray-700">Ticket Price</label>
                    <input type="number" name="ticket_price" id="ticket_price"
                        class="w-full border-gray-300 rounded-lg p-2" value="{{ $destination->ticket_price }}" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Main Image</label>
                    <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-lg p-2">
                    <img src="{{ asset('img/' . $destination->image) }}" alt="{{ $destination->name }}"
                        class="mt-4 h-32 rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="gallery" class="block text-gray-700">Gallery</label>
                    <input type="file" name="gallery[]" id="gallery" class="w-full border-gray-300 rounded-lg p-2"
                        multiple>
                    <div class="flex flex-wrap mt-2 space-x-2">
                        @foreach ($destination->gallery as $item)
                            <img src="{{ asset('img/' . $item['image']) }}" alt="Gallery Image"
                                class="h-32 rounded-lg mx-1 my-2">
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Action Buttons</label>
                    <div id="action_buttons_container">
                        @foreach ($destination->action_buttons as $index => $button)
                            <div class="flex space-x-4 mb-2">
                                <input type="text" name="action_buttons[{{ $index }}][label]"
                                    placeholder="Button Label" class="w-full border-gray-300 rounded-lg p-2"
                                    value="{{ $button['label'] }}">
                                <input type="text" name="action_buttons[{{ $index }}][icon]"
                                    placeholder="Button Icon" class="w-full border-gray-300 rounded-lg p-2"
                                    value="{{ $button['icon'] }}">
                                <input type="text" name="action_buttons[{{ $index }}][url]"
                                    placeholder="Button URL" class="w-full border-gray-300 rounded-lg p-2"
                                    value="{{ $button['url'] }}">
                                <button type="button" class="text-red-500 hover:text-red-700"
                                    onclick="this.parentElement.remove()">Remove</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add_button"
                        class="mt-2 bg-green-500 text-white px-2 py-1 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out">Add
                        Button</button>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">Save</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add_button').addEventListener('click', function() {
                const container = document.getElementById('action_buttons_container');
                const index = container.children.length; // Ensure the index is always an integer
                const div = document.createElement('div');
                div.classList.add('flex', 'space-x-4', 'mb-2');
                div.innerHTML = `
                    <input type="text" name="action_buttons[${index}][label]" placeholder="Button Label" class="w-full border-gray-300 rounded-lg p-2">
                    <input type="text" name="action_buttons[${index}][icon]" placeholder="Button Icon" class="w-full border-gray-300 rounded-lg p-2">
                    <input type="text" name="action_buttons[${index}][url]" placeholder="Button URL" class="w-full border-gray-300 rounded-lg p-2">
                    <button type="button" class="text-red-500 hover:text-red-700" onclick="this.parentElement.remove()">Remove</button>
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
