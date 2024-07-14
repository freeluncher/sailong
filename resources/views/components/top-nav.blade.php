<div class="bg-white shadow-md w-full py-4 px-6 flex justify-between items-center">
    <div>
        <button @click="open = !open" class="text-gray-600 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    <div>
        <p class="text-gray-600">Welcome, {{ Auth::user()->name }}</p>
    </div>
    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-gray-600 hover:text-gray-800">
                Logout
            </button>
        </form>

    </div>
</div>
