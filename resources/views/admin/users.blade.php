@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Users Management</h1>
    <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Create New
        User</a>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Roles</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b">
                        @foreach ($user->roles as $role)
                            <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                            class="bg-yellow-500 text-white py-1 px-3 rounded">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@php
    $menu = [
        ['name' => 'Users', 'url' => route('admin.users')],
        ['name' => 'Settings', 'url' => route('admin.settings')],
        ['name' => 'Landing Pages', 'url' => route('landing-pages.index')],
    ];
@endphp
