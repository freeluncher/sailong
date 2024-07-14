@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Users Management</h1>
    <p>Manage your users here.</p>
@endsection
@php
    $menu = [
        ['name' => 'Users', 'url' => route('admin.users')],
        ['name' => 'Settings', 'url' => route('admin.settings')],
        ['name' => 'Landing Pages', 'url' => route('landing-pages.index')],
    ];
@endphp
