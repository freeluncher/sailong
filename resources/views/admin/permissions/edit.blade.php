@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Permission</h1>
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Permission Name</label>
            <input type="text" name="name" id="name" value="{{ $permission->name }}"
                class="w-full border border-gray-300 p-2 rounded" required>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
