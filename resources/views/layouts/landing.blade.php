<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sailong | Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/79638a8e95.js" crossorigin="anonymous"></script>
</head>

<body>
    <div x-data="{ open: false }">
        @auth
            <x-top-nav-landing />
        @else
            <x-top-nav-landing-guest />
        @endauth
    </div>
    <div class="relative h-screen w-full">
        @yield('content')
        @include('components.footer')
    </div>

    @yield('scripts')
</body>

</html>
