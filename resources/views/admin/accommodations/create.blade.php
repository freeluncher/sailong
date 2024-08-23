@extends('layouts.admin')

@section('content')
    <div class="h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold mb-4">{{ isset($accommodation) ? 'Edit' : 'Add New' }} Accommodation</h1>
            <form
                action="{{ isset($accommodation) ? route('accommodations.update', $accommodation->id) : route('accommodations.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($accommodation))
                    @method('PUT')
                @endif
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $accommodation->name ?? '') }}"
                        class="w-full border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-gray-700">Location:</label>
                    <input type="text" name="location" id="location"
                        value="{{ old('location', $accommodation->location ?? '') }}"
                        class="w-full border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description:</label>
                    <textarea name="description" id="description" class="w-full border-gray-300 rounded">{{ old('description', $accommodation->description ?? '') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="price_per_night" class="block text-gray-700">Price Per Night:</label>
                    <input type="number" name="price_per_night" id="price_per_night"
                        value="{{ old('price_per_night', $accommodation->price_per_night ?? '') }}"
                        class="w-full border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Image:</label>
                    <input type="file" name="image" id="image" class="w-full border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="gallery" class="block text-gray-700">Gallery:</label>
                    <input type="file" name="gallery[]" id="gallery" multiple class="w-full border-gray-300 rounded">
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded">{{ isset($accommodation) ? 'Update' : 'Add' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
