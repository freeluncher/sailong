@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Users</h1>
    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Create
        User</a>
    <table class="w-full table-auto bg-white rounded shadow">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Roles</th>
                <th class="px-4 py-2">Permissions</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                    <td class="border px-4 py-2">{{ implode(', ', $user->permissions->pluck('name')->toArray()) }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('users.edit', $user->id) }}"
                            class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
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
