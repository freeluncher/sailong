@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Reservations Management</h1>
    <p>Manage your reservations here.</p>
@endsection
@php
    $menu = [
        ['name' => 'Reservations', 'url' => route('homestay.reservations')],
        ['name' => 'Settings', 'url' => route('homestay.settings')],
    ];
@endphp
