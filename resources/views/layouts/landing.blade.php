<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sailong | Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div x-data="{ open: false }">
        <x-top-nav-guest />
    </div>
    <div class="relative h-screen w-full">
        @yield('content')
    </div>
    @yield('scripts')
</body>

</html>
