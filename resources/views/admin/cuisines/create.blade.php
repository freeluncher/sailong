@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create New Cuisine</h1>
        <form action="{{ route('admin.cuisines.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Name:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-bold">Location:</label>
                <input type="text" name="location" id="location" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold">Description:</label>
                <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold">Image:</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="gallery" class="block text-gray-700 font-bold">Gallery Images:</label>
                <input type="file" name="gallery[]" id="gallery" multiple class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label for="opening_hours" class="block text-gray-700 font-bold">Opening Hours:</label>
                <input type="time" name="opening_hours" id="opening_hours" class="w-full px-4 py-2 border rounded-lg"
                    required>
            </div>
            <div class="mb-4">
                <label for="closing_hours" class="block text-gray-700 font-bold">Closing Hours:</label>
                <input type="time" name="closing_hours" id="closing_hours" class="w-full px-4 py-2 border rounded-lg"
                    required>
            </div>
            <div class="mb-4">
                <label for="ticket_price" class="block text-gray-700 font-bold">Ticket Price:</label>
                <input type="number" name="ticket_price" id="ticket_price" class="w-full px-4 py-2 border rounded-lg"
                    required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Create
                    Cuisine</button>
            </div>
        </form>
    </div>
@endsection
