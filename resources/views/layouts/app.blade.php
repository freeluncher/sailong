<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sailong') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('custom-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/79638a8e95.js" crossorigin="anonymous"></script>

</head>

<body class="bg-gray-100 flex h-screen">
    <div x-data="{ open: false }" class="flex flex-col w-full">
        <x-top-nav />

        <div class="flex flex-1">
            <x-sidebar :menu="$menu" />
            <main class="flex-1 p-6">
                @yield('content')
                @yield('scripts')
            </main>
        </div>
        <!-- Footer -->
        @include('components.footer')
    </div>
</body>

</html>
