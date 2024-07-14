@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Homestay Dashboard</h1>
    <p>Welcome to the homestay dashboard.</p>
@endsection

@php
    $menu = [
        ['name' => 'Reservations', 'url' => route('homestay.reservations')],
        ['name' => 'Settings', 'url' => route('homestay.settings')],
    ];
@endphp
