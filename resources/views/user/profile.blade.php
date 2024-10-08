@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-lg mx-auto bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-semibold mb-6">Edit Profile</h2>

            <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                        class="w-full px-3 py-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                        class="w-full px-3 py-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Profile Photo</label>
                    <input type="file" name="profile_photo_url" class="w-full px-3 py-2 border rounded">
                    @if (Auth::user()->profile_photo_url)
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                            class="mt-2 h-20 w-20 rounded-full">
                    @endif
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@php
    $user = Auth::user();
    $menu = [
        ['name' => 'Bookings', 'url' => route('user.bookings', ['name' => $user->name])],
        ['name' => 'Settings', 'url' => route('user.profile', ['name' => $user->name])],
    ];
@endphp
