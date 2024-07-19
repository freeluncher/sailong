@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Roles</h1>
    <a href="{{ route('admin.roles.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Create
        Role</a>
    <table class="w-full table-auto bg-white rounded shadow">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Permissions</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td class="border px-4 py-2">{{ $role->name }}</td>
                    <td class="border px-4 py-2">{{ implode(', ', $role->permissions->pluck('name')->toArray()) }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                            class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="inline-block">
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
        ['name' => 'Users', 'url' => route('admin.users.index')],
        ['name' => 'Settings', 'url' => route('admin.settings')],
        ['name' => 'Landing Pages', 'url' => route('landing-pages.index')],
    ];
@endphp
