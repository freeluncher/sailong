<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 h-screen flex flex-col items-center">
    <div class="w-full">
        <div x-data="{ open: false }">
            @auth
                <x-top-nav />
            @else
                <x-top-nav-guest />
            @endauth
        </div>
    </div>
    <div id="main" class="w-full mx-auto h-screen items-center">
        @yield('content')
        @include('components.footer')
    </div>
</body>

</html>
