@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-blue-50">
        <div class="container mx-auto py-8 px-4">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-blue-800">Manage Landing Pages</h1>
                <a href="{{ route('admin.landing-pages.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                    Create New Page
                </a>
            </div>
            <div class="bg-white rounded-xl shadow-lg overflow-x-auto">
                @if ($pages->count())
                    <table class="min-w-full divide-y divide-blue-100">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="py-3 px-6 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">Title</th>
                                <th class="py-3 px-6 text-center text-xs font-bold text-blue-700 uppercase tracking-wider">Actions</th>
                                <th class="py-3 px-6 text-center text-xs font-bold text-blue-700 uppercase tracking-wider">View</th>
                                <th class="py-3 px-6 text-center text-xs font-bold text-blue-700 uppercase tracking-wider">Activate</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-50">
                            @foreach ($pages as $page)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="py-3 px-6">{{ $page->title }}</td>
                                    <td class="py-3 px-6 text-center">
                                        <a href="{{ route('admin.landing-pages.edit', $page) }}" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium px-3 py-1 rounded transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h3l8-8a2.828 2.828 0 00-4-4l-8 8v3z" /></svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.landing-pages.destroy', $page) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this page?');" class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 font-medium px-3 py-1 rounded transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <a href="{{ route('landing-page.show', $page) }}" class="inline-flex items-center gap-1 text-green-600 hover:text-green-800 font-medium px-3 py-1 rounded transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M12 12h.01M9 12h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z" /></svg>
                                            View
                                        </a>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @if (!$page->is_active)
                                            <form action="{{ route('landing-pages.activate', $page) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium px-3 py-1 rounded transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                                    Activate
                                                </button>
                                            </form>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-green-600 font-medium px-3 py-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                                Active
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="py-8 text-center text-blue-400">
                        <p>No landing pages found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
