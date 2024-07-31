@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Create Permission</h1>
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Permission Name</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
    </form>
@endsection
