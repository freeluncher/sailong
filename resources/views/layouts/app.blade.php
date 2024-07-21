<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sailong') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('custom-css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.2/dist/cdn.min.js" defer></script>

</head>

<body class="bg-gray-100 flex h-screen">
    <div x-data="{ open: false }" class="flex flex-col w-full">
        <x-top-nav />

        <div class="flex flex-1">
            <x-sidebar :menu="$menu" />
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
