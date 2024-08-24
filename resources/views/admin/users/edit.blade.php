@extends('layouts.app')

@section('content')
    <div class="h-screen">
        <h1 class="text-2xl font-bold mb-6">Edit User</h1>
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-4 py-2"
                    value="{{ $user->name }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded px-4 py-2"
                    value="{{ $user->email }}" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full border border-gray-300 rounded px-4 py-2">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border border-gray-300 rounded px-4 py-2">
            </div>
            <div class="mb-4">
                <label for="roles" class="block text-gray-700">Roles</label>
                <div class="flex flex-wrap">
                    @foreach ($roles as $role)
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="roles[]" value="{{ $role->name }}"
                                {{ $user->roles->contains('name', $role->name) ? 'checked' : '' }}
                                class="form-radio h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">{{ $role->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
        </form>
    </div>
@endsection




@php
    $menu = [
        [
            'name' => 'Users',
            'url' => '#',
            'icon' => 'fa-solid fa-user',
            'submenu' => [
                ['name' => 'All Users', 'url' => route('users.index'), 'icon' => 'fa-solid fa-users'],
                ['name' => 'Roles', 'url' => route('roles.index'), 'icon' => 'fa-solid fa-masks-theater'],
                ['name' => 'Permissions', 'url' => route('permissions.index'), 'icon' => 'fa-solid fa-key'],
            ],
        ],
        ['name' => 'Settings', 'url' => route('admin.settings'), 'icon' => 'fa-solid fa-gear'],
        ['name' => 'Landing Pages', 'url' => route('landing-pages.index'), 'icon' => 'fa-solid fa-pager'],
    ];
@endphp
