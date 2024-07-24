@extends('layouts.guest')

@section('content')
    <div class="relative h-screen w-full overflow-hidden">
        <img src="{{ asset('img/' . $tour->image) }}" alt="{{ $tour->name }}"
            class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-75"></div>
        <div class="absolute left-12 top-24 inset-0 flex flex-col items-start justify-start">
            <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-bold">{{ $tour->name }}</h1>
            <p class="text-lg md:text-xl lg:text-2xl text-white mt-4">{{ $tour->duration }}</p>
            <p class="text-lg md:text-xl lg:text-2xl text-white mt-4">{{ $tour->description }}</p>
            <p class="text-lg md:text-xl lg:text-2xl text-white mt-4">Ticket Price: Rp{{ $tour->price }}
            </p>
        </div>
    </div>
    <div class="mt-8 mx-auto px-10">
        <div class="text-center mb-10">
            <h3 class="text-4xl font-bold mb-4">Gallery</h3>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @foreach ($tour->gallery as $gallery)
                <div>
                    <img src="{{ asset($gallery['image']) }}" alt="Gallery Image"
                        class="w-full h-32 object-cover cursor-pointer"
                        onclick="openModal('{{ asset($gallery['image']) }}')">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="hidden">
        <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">
            <img id="modalImage" src="" alt="Full Screen Image" class="max-w-full max-h-full">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-white text-2xl">&times;</button>
        </div>
    </div>

    <script>
        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('modalImage').src = '';
        }
    </script>
@endsection
