<footer class="bg-blue-900 text-yellow-400 py-10 border-t-4 border-yellow-400">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/3 px-4 mb-8 md:mb-0">
                <div class="flex items-center mb-4">
                    <img src="{{ Storage::url('img/logo-sailong.png') }}" alt="Sailong Logo" class="h-10 w-10 mr-3 rounded shadow">
                    <span class="text-2xl font-bold text-yellow-300">Sailong</span>
                </div>
                <p class="text-yellow-100 mb-4">Sailong adalah platform reservasi wisata, akomodasi, dan kuliner terbaik di Sulawesi Tenggara. Temukan pengalaman wisata yang mudah, aman, dan terpercaya bersama kami.</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-yellow-200 hover:text-yellow-400" title="Instagram"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-yellow-200 hover:text-yellow-400" title="Facebook"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-yellow-200 hover:text-yellow-400" title="Twitter"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-yellow-200 hover:text-yellow-400" title="YouTube"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-4 mb-8 md:mb-0">
                <h2 class="text-xl font-bold mb-4 text-yellow-300">Navigasi</h2>
                <ul>
                    <li class="mb-2"><a href="/" class="text-yellow-100 hover:text-yellow-300">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('public.accommodations.index') }}" class="text-yellow-100 hover:text-yellow-300">Akomodasi</a></li>
                    <li class="mb-2"><a href="{{ route('destinations.index') }}" class="text-yellow-100 hover:text-yellow-300">Destinasi</a></li>
                    <li class="mb-2"><a href="{{ route('cuisines.index') }}" class="text-yellow-100 hover:text-yellow-300">Kuliner</a></li>
                    <li class="mb-2"><a href="/tours" class="text-yellow-100 hover:text-yellow-300">Tur</a></li>
                    <li class="mb-2"><a href="/login" class="text-yellow-100 hover:text-yellow-300">Login</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/3 px-4">
                <h2 class="text-xl font-bold mb-4 text-yellow-300">Kontak Kami</h2>
                <ul class="mb-4">
                    <li class="mb-2 flex items-center"><i class="fas fa-envelope mr-2"></i><a href="mailto:info@sailong.com" class="text-yellow-100 hover:text-yellow-300">info@sailong.com</a></li>
                    <li class="mb-2 flex items-center"><i class="fas fa-phone mr-2"></i><a href="tel:+6282136263772" class="text-yellow-100 hover:text-yellow-300">+62 821-3626-3772</a></li>
                    <li class="mb-2 flex items-center"><i class="fas fa-map-marker-alt mr-2"></i><span class="text-yellow-100">Semarang, Jawa Tengah, Indonesia</span></li>
                </ul>
                <div class="flex space-x-2">
                    <a href="https://wa.me/+6282136263772?text=Halo%20Min!%20Saya%20tertarik%20untuk%20jadi%20mitra!" target="_blank" class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">Chat WhatsApp</a>
                </div>
            </div>
        </div>
        <div class="mt-10 border-t border-yellow-800 pt-6 text-center text-yellow-200 text-sm">
            &copy; {{ date('Y') }} Sailong. All rights reserved. | Powered by Sailong Team
        </div>
    </div>
</footer>
