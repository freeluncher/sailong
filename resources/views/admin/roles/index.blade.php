@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Roles Management</h1>
    <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Role</a>
    <table class="mt-4 w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td class="border px-4 py-2">{{ $role->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('roles.edit', $role->id) }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <a href="{{ route('roles.permissions.edit', $role->id) }}"
                            class="bg-green-500 text-white px-4 py-2 rounded">Edit Permissions</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
