@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Manage Landing Pages</h1>
    <a href="{{ route('landing-pages.create') }}" class="bg-blue-500 text-white px-4 py-2">Create New Page</a>

    @if ($pages->count())
        <table class="mt-6 w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Actions</th>
                    <th class="border px-4 py-2">View</th>
                    <th class="border px-4 py-2">Activate</th> <!-- Add Activate Column -->
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td class="border px-4 py-2">{{ $page->title }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('landing-pages.edit', $page) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('landing-pages.destroy', $page) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this page?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('landing-pages.show', $page) }}" class="text-green-500">View</a>
                        </td>
                        <td class="border px-4 py-2">
                            @if (!$page->is_active)
                                <form action="{{ route('landing-pages.activate', $page) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Activate</button>
                                </form>
                            @else
                                <span class="text-green-500">Active</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="mt-6">
            <p>No landing pages found.</p>
        </div>
    @endif
@endsection

@php
    $menu = [
        [
            'name' => 'Users',
            'url' => '#',
            'submenu' => [
                ['name' => 'All Users', 'url' => route('users.index')],
                ['name' => 'Roles', 'url' => route('roles.index')],
                ['name' => 'Permissions', 'url' => route('permissions.index')],
            ],
        ],
        ['name' => 'Settings', 'url' => route('admin.settings')],
        ['name' => 'Landing Pages', 'url' => route('landing-pages.index')],
    ];
@endphp
