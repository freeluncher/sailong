@extends('layouts.app')
@section('custom-css')
    <style>
        .toggle-switch {
            appearance: none;
            width: 40px;
            height: 20px;
            background: #ccc;
            position: relative;
            border-radius: 10px;
            outline: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .toggle-switch:checked {
            background: #4caf50;
        }

        .toggle-switch::before {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            background: #fff;
            border-radius: 50%;
            top: 1px;
            left: 1px;
            transition: transform 0.3s;
        }

        .toggle-switch:checked::before {
            transform: translateX(20px);
        }
    </style>
@endsection

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Permissions for {{ $role->name }}</h1>
    <form action="{{ route('roles.permissions.update', $role->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Permissions</label>
            @foreach ($permissions as $permission)
                <div class="flex items-center">
                    <label class="mr-2">{{ $permission->name }}</label>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                        {{ $role->permissions->contains($permission) ? 'checked' : '' }} class="toggle-switch">
                </div>
            @endforeach
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
