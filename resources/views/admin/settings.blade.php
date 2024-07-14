@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Admin Settings</h1>
    <p>Manage your settings here.</p>
@endsection
@php
    $menu = [
        ['name' => 'Users', 'url' => route('admin.users')],
        ['name' => 'Settings', 'url' => route('admin.settings')],
        ['name' => 'Landing Pages', 'url' => route('admin.landing-pages.index')],
    ];
@endphp
