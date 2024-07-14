@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Create Landing Page</h1>

    <form action="{{ route('admin.landing-pages.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" class="mt-1 block w-full" rows="10" required></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Create</button>
    </form>
@endsection
@php
    $menu = [
        ['name' => 'Users', 'url' => route('admin.users')],
        ['name' => 'Settings', 'url' => route('admin.settings')],
        ['name' => 'Landing Pages', 'url' => route('admin.landing-pages.index')],
    ];
@endphp
