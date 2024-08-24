@props(['type' => 'info'])

@php
    $alertTypes = [
        'success' => 'bg-green-100 text-green-700 border-green-300',
        'error' => 'bg-red-100 text-red-700 border-red-300',
        'warning' => 'bg-yellow-100 text-yellow-700 border-yellow-300',
        'info' => 'bg-blue-100 text-blue-700 border-blue-300',
    ];
@endphp

<div class="border-l-4 p-4 mt-2 {{ $alertTypes[$type] }} rounded-lg" role="alert">
    <div class="flex">
        <div class="ml-3">
            {{ $slot }}
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-transparent text-current rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8"
            data-dismiss-target="#alert-{{ $type }}" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
</div>
