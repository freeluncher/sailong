@extends('layouts.app')

@section('content')
    <div class="h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold mb-4">Accommodations</h1>
            <a href="{{ route('accommodations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New
                Accommodation</a>
            <table class="min-w-full bg-white mt-4">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200">Name</th>
                        <th class="py-2 px-4 border-b border-gray-200">Location</th>
                        <th class="py-2 px-4 border-b border-gray-200">Price Per Night</th>
                        <th class="py-2 px-4 border-b border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accommodations as $accommodation)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $accommodation->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $accommodation->location }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                Rp{{ number_format($accommodation->price_per_night, 2) }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <a href="{{ route('accommodations.show', $accommodation->id) }}"
                                    class="text-blue-500">View</a>
                                <a href="{{ route('accommodations.edit', $accommodation->id) }}"
                                    class="text-green-500 ml-4">Edit</a>
                                <form action="{{ route('accommodations.destroy', $accommodation->id) }}" method="POST"
                                    class="inline-block ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
