@extends('layouts.app')

@section('content')
    <div class="h-screen">
        <div class="container mx-auto p-4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Edit Accommodation</h1>
                <a href="{{ route('accommodations.index') }}" class="text-blue-500 hover:underline">Back to List</a>
            </div>

            <form action="{{ route('accommodations.update', $accommodation->id) }}" method="POST"
                enctype="multipart/form-data" x-data="{ open: false }">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg p-2"
                            value="{{ $accommodation->name }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description" class="w-full border-gray-300 rounded-lg p-2" required>{{ $accommodation->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-gray-700">Location</label>
                        <input type="text" name="location" id="location" class="w-full border-gray-300 rounded-lg p-2"
                            value="{{ $accommodation->location }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="opening_hours" class="block text-gray-700">Opening Hours</label>
                        <input type="time" name="opening_hours" id="opening_hours"
                            class="w-full border-gray-300 rounded-lg p-2" value="{{ $accommodation->opening_hours }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="closing_hours" class="block text-gray-700">Closing Hours</label>
                        <input type="time" name="closing_hours" id="closing_hours"
                            class="w-full border-gray-300 rounded-lg p-2" value="{{ $accommodation->closing_hours }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="price_per_night" class="block text-gray-700">Price/Night</label>
                        <input type="number" name="price_per_night" id="price_per_night"
                            class="w-full border-gray-300 rounded-lg p-2" value="{{ $accommodation->price_per_night }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700">Main Image</label>
                        <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-lg p-2">
                        @if ($accommodation->image)
                            <img src="{{ Storage::url('img/' . $accommodation->image) }}" alt="{{ $accommodation->name }}"
                                class="mt-4 h-32 rounded-lg">
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="gallery" class="block text-gray-700">Gallery</label>
                        <input type="file" name="gallery[]" id="gallery_input"
                            class="w-full border-gray-300 rounded-lg p-2" multiple>
                        <div id="gallery_preview" class="flex flex-wrap mt-2 space-x-2">
                            @foreach ($accommodation->gallery as $item)
                                <img src="{{ Storage::url($item['image']) }}" alt="Gallery Image"
                                    class="h-32 rounded-lg mx-1 my-2">
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Action Buttons</label>
                        <div id="action_buttons_container">
                            @foreach ($accommodation->action_buttons as $index => $button)
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
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryInput = document.getElementById('gallery_input');
            const galleryPreview = document.getElementById('gallery_preview');

            galleryInput.addEventListener('change', function(event) {
                galleryPreview.innerHTML = ''; // Kosongkan pratinjau saat gambar baru dipilih

                Array.from(event.target.files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imgDiv = document.createElement('div');
                        imgDiv.classList.add('relative');

                        imgDiv.innerHTML = `
                            <img src="${e.target.result}" alt="Gallery Image" class="h-32 rounded-lg mx-1 my-2">
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

                    files.splice(index, 1); // Hapus file dari array

                    // Buat ulang FileList dari array files yang sudah dimodifikasi
                    const dataTransfer = new DataTransfer();
                    files.forEach(file => dataTransfer.items.add(file));
                    galleryInput.files = dataTransfer.files;

                    event.target.closest('div').remove(); // Hapus pratinjau gambar
                }
            });

            const addButton = document.getElementById('add_button');
            const actionButtonsContainer = document.getElementById('action_buttons_container');

            addButton.addEventListener('click', function() {
                const newIndex = actionButtonsContainer.children.length;

                const actionButtonDiv = document.createElement('div');
                actionButtonDiv.classList.add('flex', 'space-x-4', 'mb-2');

                actionButtonDiv.innerHTML = `
                    <input type="text" name="action_buttons[${newIndex}][label]" placeholder="Button Label" class="w-full border-gray-300 rounded-lg p-2">
                    <input type="text" name="action_buttons[${newIndex}][icon]" placeholder="Button Icon" class="w-full border-gray-300 rounded-lg p-2">
                    <input type="text" name="action_buttons[${newIndex}][url]" placeholder="Button URL" class="w-full border-gray-300 rounded-lg p-2">
                    <button type="button" class="text-red-500 hover:text-red-700" onclick="this.parentElement.remove()">Remove</button>
                `;

                actionButtonsContainer.appendChild(actionButtonDiv);
            });
        });
    </script>
@endsection
