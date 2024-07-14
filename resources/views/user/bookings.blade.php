@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">User Bookings</h1>
    <p>Manage your bookings here.</p>
@endsection
@php
    $user = Auth::user();
    $menu = [
        ['name' => 'Bookings', 'url' => route('user.bookings', ['name' => $user->name])],
        ['name' => 'Settings', 'url' => route('user.profile', ['name' => $user->name])],
    ];
@endphp
