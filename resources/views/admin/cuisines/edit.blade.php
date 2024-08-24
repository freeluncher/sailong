@extends('layouts.app')

@section('content')
    <div class="h-screen">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Edit Cuisine</h1>

            <form action="{{ route('admin.cuisines.update', $cuisine->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $cuisine->name) }}"
                        class="w-full p-2 border rounded-lg">
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" class="w-full p-2 border rounded-lg">{{ old('description', $cuisine->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="w-full p-2 border rounded-lg">
                    @if ($cuisine->image)
                        <img src="{{ Storage::url('img/' . $cuisine->image) }}" alt="{{ $cuisine->name }}"
                            class="mt-2 w-32 h-32 object-cover">
                    @endif
                    @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $cuisine->location) }}"
                        class="w-full p-2 border rounded-lg">
                    @error('location')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="opening_hours" class="block text-gray-700">Opening Hours</label>
                    <input type="time" name="opening_hours" id="opening_hours"
                        value="{{ old('opening_hours', $cuisine->opening_hours) }}" class="w-full p-2 border rounded-lg">
                    @error('opening_hours')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="closing_hours" class="block text-gray-700">Closing Hours</label>
                    <input type="time" name="closing_hours" id="closing_hours"
                        value="{{ old('closing_hours', $cuisine->closing_hours) }}" class="w-full p-2 border rounded-lg">
                    @error('closing_hours')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="mb-4">
                    <label for="ticket_price" class="block text-gray-700">Ticket Price</label>
                    <input type="number" name="ticket_price" id="ticket_price"
                        value="{{ old('ticket_price', $cuisine->ticket_price) }}" class="w-full p-2 border rounded-lg">
                    @error('ticket_price')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div> --}}

                <div class="mb-4">
                    <label for="gallery" class="block text-gray-700">Gallery Images</label>
                    <input type="file" name="gallery[]" id="gallery" multiple class="w-full p-2 border rounded-lg">
                    @if ($cuisine->gallery)
                        <div class="mt-2 flex flex-wrap">
                            @foreach ($cuisine->gallery as $item)
                                <img src="{{ Storage::url('img/' . $item['image']) }}" alt="Gallery Image"
                                    class="w-32 h-32 object-cover m-2">
                            @endforeach
                        </div>
                    @endif
                    @error('gallery')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="action_buttons" class="block text-gray-700">Action Buttons</label>
                    <textarea name="action_buttons" id="action_buttons" rows="3" class="w-full p-2 border rounded-lg">{{ old('action_buttons', json_encode($cuisine->action_buttons)) }}</textarea>
                    <small class="text-gray-500">Format: [{"label": "Button 1", "url": "/path", "icon": "fas
                        fa-icon"}]</small>
                    @error('action_buttons')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update
                    Cuisine</button>
            </form>
        </div>
    </div>
@endsection
