@props(['menu'])

<div class="bg-gray-800 h-screen text-white w-64 space-y-6 py-7 px-2">
    <a href="{{ route('dashboard') }}" class="text-white flex items-center space-x-2 px-4">
        <span class="text-2xl font-extrabold">Dashboard</span>
    </a>
    <nav>
        @foreach ($menu as $item)
            @if (isset($item['submenu']))
                <div x-data="{ open: false }">
                    <a href="#" @click.prevent="open = !open"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 flex justify-between items-center">
                        {{ $item['name'] }}
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 12.707a1 1 0 010-1.414L10 6.586l4.707 4.707a1 1 0 01-1.414 1.414L10 9.414l-3.293 3.293a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <div x-show="open" class="space-y-2 pl-6">
                        @foreach ($item['submenu'] as $submenu)
                            <a href="{{ $submenu['url'] }}"
                                class="block py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                                {{ $submenu['name'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="{{ $item['url'] }}"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    {{ $item['name'] }}
                </a>
            @endif
        @endforeach
    </nav>
</div>
