@props(['menu'])

<div class="bg-gray-800 h-screen text-white w-64 space-y-6 py-7 px-2">
    <a href="#" class="text-white flex items-center space-x-2 px-4">
        <span class="text-2xl font-extrabold">Dashboard</span>
    </a>
    <nav>
        @foreach ($menu as $item)
            <a href="{{ $item['url'] }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                {{ $item['name'] }}
            </a>
        @endforeach
    </nav>
</div>
