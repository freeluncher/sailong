<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sailong</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']);
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-700">Sailong</a>
            <div>
                @auth
                    <span class="text-gray-600 mr-4">{{ Auth::user()->name }}</span>
                    <form class="inline" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 mr-4">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Register</a>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-6">
        @yield('content')
    </div>
</body>

</html>
