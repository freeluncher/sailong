@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Permissions</h1>
    <a href="{{ route('admin.permissions.create') }}"
        class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Create Permission</a>
    <table class="w-full table-auto bg-white rounded shadow">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td class="border px-4 py-2">{{ $permission->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                            class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                        <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST"
                            class="inline-block">
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
