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
        @php
            $menu = [
                [
                    'name' => 'Users',
                    'url' => '#',
                    'icon' => 'fa-solid fa-user',
                    'submenu' => [
                        ['name' => 'All Users', 'url' => route('users.index'), 'icon' => 'fa-solid fa-users'],
                        ['name' => 'Roles', 'url' => route('roles.index'), 'icon' => 'fa-solid fa-masks-theater'],
                        ['name' => 'Permissions', 'url' => route('permissions.index'), 'icon' => 'fa-solid fa-key'],
                    ],
                ],
                ['name' => 'Settings', 'url' => route('admin.settings'), 'icon' => 'fa-solid fa-gear'],
                ['name' => 'Landing Pages', 'url' => route('landing-pages.index'), 'icon' => 'fa-solid fa-pager'],
            ];
        @endphp
        <div class="flex flex-1">
            <x-sidebar :menu="$menu" />
            <main class="flex-1 pt-6 pb-0 px-0">
                @yield('content')
                @yield('scripts')
                <!-- Footer -->
                @include('components.footer')
            </main>
        </div>

    </div>
</body>

</html>
