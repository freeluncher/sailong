<!-- Halaman Index (cuisines/index.blade.php) -->
@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-blue-50">
        <div class="container mx-auto py-8 px-4">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-blue-800">Cuisines</h1>
                <a href="{{ route('admin.cuisines.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                    Add New Cuisine
                </a>
            </div>
            <div class="bg-white rounded-xl shadow-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-blue-100">
                    <thead class="bg-blue-100">
                        <tr>
                            <th class="py-3 px-6 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">Name</th>
                            <th class="py-3 px-6 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">Location</th>
                            <th class="py-3 px-6 text-center text-xs font-bold text-blue-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-blue-50">
                        @forelse ($cuisines as $cuisine)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="py-3 px-6">{{ $cuisine->name }}</td>
                                <td class="py-3 px-6">{{ $cuisine->location }}</td>
                                <td class="py-3 px-6 text-center">
                                    <a href="{{ route('admin.cuisines.edit', $cuisine->id) }}" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium px-3 py-1 rounded transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h3l8-8a2.828 2.828 0 00-4-4l-8 8v3z" /></svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.cuisines.destroy', $cuisine->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 font-medium px-3 py-1 rounded transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-6 px-6 text-center text-blue-400">No cuisines found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
