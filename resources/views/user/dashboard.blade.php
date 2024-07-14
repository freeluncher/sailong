@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">User Dashboard</h1>
    <p>Welcome to the user dashboard.</p>
@endsection

@php
    $user = Auth::user();
    $menu = [
        ['name' => 'Profile', 'url' => route('user.profile', ['name' => $user->name])],
        ['name' => 'Bookings', 'url' => route('user.bookings', ['name' => $user->name])],
    ];
@endphp
