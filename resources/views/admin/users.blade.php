@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Users Management</h1>
    <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create New User</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 mt-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full mt-6">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                            class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
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
        ['name' => 'Users', 'url' => route('admin.users')],
        ['name' => 'Settings', 'url' => route('admin.settings')],
        ['name' => 'Landing Pages', 'url' => route('landing-pages.index')],
    ];
@endphp
