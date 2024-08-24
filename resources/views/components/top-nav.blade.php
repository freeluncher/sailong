<div class="bg-opacity-0 shadow-md w-full py-4 px-6 flex justify-between items-center" x-data="{ open: false, infoOpen: false }">
    <div class="flex items-center space-x-4">
        <a href="/" class="flex items-center space-x-2">
            <img src="{{ Storage::url('img/logo-sailong-alt.png') }}" alt="Logo" class="h-10 w-full object-cover">
            <span class="text-gray-600 font-bold text-2xl mt-2">Sailong</span>
        </a>
        <button @click="open = !open" class="text-gray-600 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    <div class="flex items-center space-x-4">
        <div class="relative" x-data="{ infoOpen: false }">
            <button @click="infoOpen = !infoOpen" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                Informasi
            </button>
            <div x-show="infoOpen" @click.away="infoOpen = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50" x-cloak>
                <a href="{{ route('public-accommodations.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Accommodations</a>
                <a href="{{ route('tours.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Tours</a>
                <a href="{{ route('cuisines.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Cuisines</a>
                <a href="{{ route('destinations.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Destinations</a>
            </div>
        </div>
        <a href="#" class="text-gray-600 hover:text-gray-800">Jadi Mitra</a>
        <a href="#" class="text-gray-600 hover:text-gray-800">Hubungi Kami</a>
        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
            alt="{{ Auth::user()->name }}" />
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 focus:outline-none">
                <span>{{ Auth::user()->name }}</span>
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
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
