<div class="bg-transparent w-full py-4 px-6 flex justify-between items-center absolute top-0 z-50">
    <a href="/" class="flex items-center space-x-2">
        <img src="{{ Storage::url('img/logo-sailong.png') }}" alt="Logo" class="h-10 w-auto object-cover">
        <span class="text-yellow-300 font-bold text-2xl mt-2">Sailong</span>
    </a>
    <div class="hidden md:flex items-center space-x-4">
        <a href="{{ route('login') }}" class="text-yellow-100 hover:text-yellow-300">Login</a>
        <a href="{{ route('register') }}" class="text-yellow-100 hover:text-yellow-300">Register</a>
    </div>
    <div class="md:hidden">
        <button @click="open = !open" class="text-yellow-100 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    <div :class="{ 'block': open, 'hidden': !open }"
        class="absolute top-16 left-0 w-full bg-blue-900 md:hidden z-50 shadow-md">
        <div class="px-6 py-4">
            <a href="{{ route('login') }}" class="block text-yellow-100 hover:text-yellow-300 mb-4">Login</a>
            <a href="{{ route('register') }}" class="block text-yellow-100 hover:text-yellow-300">Register</a>
        </div>
    </div>
</div>
