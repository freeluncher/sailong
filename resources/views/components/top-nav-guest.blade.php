<div class="bg-white shadow-md w-full py-4 px-6 flex justify-between items-center fixed top-0 z-50">
    <div class="flex items-center">
        <a href="{{ url('/') }}" class="text-gray-800 text-lg font-bold">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="hidden md:flex items-center space-x-4">
        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a>
        <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a>
    </div>
    <div class="md:hidden">
        <button @click="open = !open" class="text-gray-600 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    <div :class="{ 'block': open, 'hidden': !open }"
        class="absolute top-16 left-0 w-full bg-white md:hidden z-50 shadow-md">
        <div class="px-6 py-4">
            <a href="{{ route('login') }}" class="block text-gray-600 hover:text-gray-800 mb-4">Login</a>
            <a href="{{ route('register') }}" class="block text-gray-600 hover:text-gray-800">Register</a>
        </div>
    </div>
</div>
