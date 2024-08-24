<!-- Navbar for medium to large screens -->
<div class="bg-transparent w-full py-4 px-6 flex justify-between items-center absolute top-0 left-0 z-50 hidden lg:flex">
    <a href="/" class="flex items-center space-x-2">
        <img src="{{ Storage::url('img/logo-sailong.png') }}" alt="Logo" class="h-10 w-auto object-cover">
        <span class="text-white font-bold text-2xl mt-2">Sailong</span>
    </a>
    <div class="flex items-center space-x-4 ml-auto">
        <div class="relative" x-data="{ informasiOpen: false }">
            <button @click="informasiOpen = !informasiOpen" class="text-white hover:text-gray-300 focus:outline-none">
                Informasi
            </button>
            <div x-show="informasiOpen" @click.away="informasiOpen = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50" x-cloak>
                <a href="{{ route('accommodations.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Accommodations</a>
                <a href="{{ route('cuisines.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Cuisines</a>
                <a href="{{ route('destinations.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Destinations</a>
                <a href="{{ route('tours.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Tours</a>
            </div>
        </div>
        <a href="#" class="text-white hover:text-gray-300">Jadi Mitra</a>
        <a href="#" class="text-white hover:text-gray-300">Hubungi Kami</a>
        <div class="relative" x-data="{ profileOpen: false }">
            <button @click="profileOpen = !profileOpen"
                class="flex items-center space-x-2 text-white hover:text-gray-300 focus:outline-none">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
                <span>{{ Auth::user()->name }}</span>
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="profileOpen" @click.away="profileOpen = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50" x-cloak>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                @if (Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit
                        Profile</a>
                @elseif (Auth::user()->hasRole('homestay'))
                    <a href="{{ route('homestay.profile') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profile</a>
                @else
                    <a href="{{ route('user.profile', ['name' => Auth::user()->name]) }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profile</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Navbar for mobile screens -->
<div class="fixed inset-0 z-50 flex flex-col lg:hidden" x-data="{ open: false, informasiOpen: false }">
    <div class="flex justify-between items-center bg-black p-4">
        <a href="/" class="flex items-center space-x-2">
            <img src="{{ Storage::url('img/logo-sailong.png') }}" alt="Logo" class="h-10 w-auto object-cover">
            <span class="text-white font-bold text-2xl">Sailong</span>
        </a>
        <button @click="open = !open" class="text-white focus:outline-none bg-black p-2 rounded">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    <div :class="{ 'translate-x-0': open, '-translate-x-full': !open }"
        class="fixed inset-y-0 left-0 w-64 bg-black transform transition-transform duration-300 ease-in-out p-6 space-y-4">
        <div class="flex justify-end">
            <button @click="open = false" class="text-white focus:outline-none bg-black p-2 rounded mb-4">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div class="flex">
            <a href="#" @click.prevent="informasiOpen = !informasiOpen"
                class="text-white hover:text-gray-300">Informasi</a>
        </div>
        <div x-show="informasiOpen" class="flex flex-col space-y-2">
            <a href="{{ route('accommodations.index') }}"
                class="text-white hover:text-gray-300 pl-4">Accommodations</a>
            <a href="{{ route('cuisines.index') }}" class="text-white hover:text-gray-300 pl-4">Cuisines</a>
            <a href="{{ route('destinations.index') }}" class="text-white hover:text-gray-300 pl-4">Destinations</a>
            <a href="{{ route('tours.index') }}" class="text-white hover:text-gray-300 pl-4">Tours</a>
        </div>
        <div class="flex">
            <a href="#" class="text-white hover:text-gray-300">Jadi Mitra</a>
        </div>
        <div class="flex">
            <a href="#" class="text-white hover:text-gray-300">Hubungi Kami</a>
        </div>
        <div class="relative" x-data="{ profileOpen: false }">
            <div class="flex mt-10 justify-center">
                <button @click="profileOpen = !profileOpen"
                    class="flex items-center space-x-2 text-white hover:text-gray-300 focus:outline-none">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
            </div>
            <div x-show="profileOpen" @click.away="profileOpen = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50" x-cloak>
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                @if (Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.profile') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profile</a>
                @elseif (Auth::user()->hasRole('homestay'))
                    <a href="{{ route('homestay.profile') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profile</a>
                @else
                    <a href="{{ route('user.profile', ['name' => Auth::user()->name]) }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profile</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
