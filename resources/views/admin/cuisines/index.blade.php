<!-- Halaman Index (cuisines/index.blade.php) -->
@extends('layouts.app')

@section('content')
    <div class="h-screen">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Cuisines</h1>
            <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Location</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuisines as $cuisine)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $cuisine->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $cuisine->location }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('admin.cuisines.edit', $cuisine->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
