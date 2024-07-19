@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit User</h1>
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
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
            <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full border border-gray-300 rounded px-4 py-2">
        </div>
        <div class="mb-4">
            <label for="roles" class="block text-gray-700">Roles</label>
            <select name="roles[]" id="roles" multiple class="w-full border border-gray-300 rounded px-4 py-2">
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="permissions" class="block text-gray-700">Permissions</label>
            <div class="mb-2">
                <input type="checkbox" id="select-all-permissions">
                <label for="select-all-permissions">Select All</label>
            </div>
            <select name="permissions[]" id="permissions" multiple class="w-full border border-gray-300 rounded px-4 py-2">
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}"
                        {{ $user->permissions->contains('name', $permission->name) ? 'selected' : '' }}>
                        {{ $permission->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
    </form>

    <script>
        document.getElementById('select-all-permissions').addEventListener('change', function() {
            let permissions = document.getElementById('permissions').options;
            for (let i = 0; i < permissions.length; i++) {
                permissions[i].selected = this.checked;
            }
        });
    </script>
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
