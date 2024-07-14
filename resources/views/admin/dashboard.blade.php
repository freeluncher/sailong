    @extends('layouts.app')

    @section('content')
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
        <p>Welcome to the admin dashboard.</p>
    @endsection

    @php
        $menu = [
            ['name' => 'Users', 'url' => route('admin.users')],
            ['name' => 'Settings', 'url' => route('admin.settings')],
            ['name' => 'Landing Pages', 'url' => route('landing-pages.index')],
        ];
    @endphp
