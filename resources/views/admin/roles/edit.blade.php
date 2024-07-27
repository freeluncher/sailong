@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Role</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Role Name</label>
            <input type="text" name="name" value="{{ $role->name }}" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Permissions</label>
            @foreach ($permissions as $permission)
                <div>
                    <label>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                            {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
    </form>
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
