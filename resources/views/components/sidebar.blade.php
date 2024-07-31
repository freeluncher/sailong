@props(['menu'])

<div x-data="{ open: true }" class="flex">
    <div :class="open ? 'w-64' : 'w-16'"
        class="bg-gray-800 text-white space-y-6 py-7 px-2 transition-all duration-300 h-full flex flex-col items-center relative">
        <button @click="open = !open" class="text-white focus:outline-none absolute top-4 right-4">
            <i x-show="open" class="fas fa-angle-double-left"></i>
            <i x-show="!open" class="fas fa-angle-double-right"></i>
        </button>
        <div class="flex justify-between items-center w-full px-4 mt-8">
            <a href="{{ route('dashboard') }}" class="text-white flex items-center w-full">
                <i
                    :class="open ? 'fas fa-tachometer-alt w-8' : 'fas fa-tachometer-alt text-2xl w-full text-center'"></i>
                <span :class="open ? 'text-2xl font-extrabold ml-2' : 'hidden'"
                    class="transition-all duration-300">Dashboard</span>
            </a>
        </div>
        <nav :class="open ? 'px-4 w-full' : 'w-full flex flex-col items-center'">
            @foreach ($menu as $item)
                @if (isset($item['submenu']))
                    <div x-data="{ openSubmenu: false }" class="w-full">
                        <a href="#" @click.prevent="openSubmenu = !openSubmenu"
                            class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 w-full">
                            <div class="flex items-center w-full">
                                <i
                                    :class="open ? '{{ $item['icon'] }} w-8' : '{{ $item['icon'] }} text-2xl w-full text-center'"></i>
                                <span :class="open ? 'ml-2' : 'hidden'"
                                    class="transition-all duration-300">{{ $item['name'] }}</span>
                            </div>
                            <i x-show="!openSubmenu && open" class="fas fa-chevron-down ml-auto"></i>
                            <i x-show="openSubmenu && open" class="fas fa-chevron-up ml-auto"></i>
                        </a>
                        <div x-show="openSubmenu"
                            :class="open ? 'space-y-2 pl-6' : 'space-y-2 w-full flex flex-col items-center'"
                            class="w-full">
                            @foreach ($item['submenu'] as $submenu)
                                <a href="{{ $submenu['url'] }}"
                                    class="flex items-center py-2 px-4 rounded transition duration-200 hover:bg-gray-700 w-full">
                                    <i
                                        :class="open ? '{{ $submenu['icon'] }} w-8' :
                                            '{{ $submenu['icon'] }} text-2xl w-full text-center'"></i>
                                    <span :class="open ? 'ml-2' : 'hidden'"
                                        class="transition-all duration-300">{{ $submenu['name'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $item['url'] }}"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 w-full">
                        <i
                            :class="open ? '{{ $item['icon'] }} w-8' : '{{ $item['icon'] }} text-2xl w-full text-center'"></i>
                        <span :class="open ? 'ml-2' : 'hidden'"
                            class="transition-all duration-300">{{ $item['name'] }}</span>
                    </a>
                @endif
            @endforeach
        </nav>
    </div>
    <div class="flex-1">
        <!-- Main Content -->
    </div>
</div>
