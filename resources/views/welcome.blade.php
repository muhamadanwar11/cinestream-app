<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'CineStream') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="antialiased bg-gray-950 text-white font-sans selection:bg-purple-500 selection:text-white overflow-x-hidden"
    style="background-color: #030712;">

    <!-- Cinematic Background System -->
    <div class="fixed inset-0 z-0">
        <div
            class="absolute inset-0 bg-[url('https://image.tmdb.org/t/p/original/pB8BM7pdSp6B6Ih7Qf4n618UZvv.jpg')] bg-cover bg-center scale-105 opacity-40 blur-sm">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/80 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-gray-950/90 via-transparent to-gray-950/90"></div>

        <!-- Ambient Glows -->
        <div
            class="absolute top-0 right-0 w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-[150px] animate-pulse">
        </div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[150px] animate-pulse"
            style="animation-delay: 2s"></div>
    </div>

    <!-- Premium Navigation -->
    <nav
        class="relative z-50 px-8 py-6 flex justify-between items-center max-w-7xl mx-auto backdrop-blur-md bg-white/5 rounded-3xl mt-6 border border-white/5 mx-4">
        <div class="flex items-center gap-3 group cursor-pointer">
            <div
                class="w-10 h-10 bg-gradient-to-br from-purple-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition duration-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z">
                    </path>
                </svg>
            </div>
            <span
                class="text-2xl font-black tracking-tighter text-white uppercase group-hover:tracking-normal transition-all duration-500">CineStream</span>
        </div>

        <div class="flex gap-6 items-center">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm font-black text-gray-400 hover:text-white uppercase tracking-widest transition">Dashboard</a>
                    <div class="w-px h-4 bg-white/10"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm font-black text-red-400 hover:text-red-300 uppercase tracking-widest transition">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-black text-gray-400 hover:text-white uppercase tracking-widest transition">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl font-black uppercase text-xs tracking-widest hover:scale-105 transition active:scale-95 shadow-xl shadow-purple-900/20">
                        Gabung Sekarang
                    </a>
                @endauth
            @endif
        </div>
    </nav>

    <!-- Hero Content -->
    <main
        class="relative z-10 flex flex-col items-center justify-center min-h-screen text-center px-4 max-w-6xl mx-auto">
        <div class="space-y-4 mb-2">
            <span
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-purple-500/10 border border-purple-500/20 text-purple-400 text-[10px] font-black uppercase tracking-[0.3em] animate-float">
                Temukan tontonan terbaik anda
            </span>
        </div>

        <h1 class="text-6xl md:text-8xl font-black mb-8 tracking-tighter leading-[0.9]">
            TEMUKAN <br />
            <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-blue-500 to-purple-400 animate-gradient-x">KREATIVITAS
                DAN IMAJINASI ANDA</span>
        </h1>

        <p class="text-lg md:text-2xl text-gray-400 max-w-3xl mb-12 font-medium leading-relaxed">
            Perpustakaan sinema pribadi yang dirancang untuk satu tujuan: Memberikan Anda akses tak terbatas ke
            mahakarya layar lebar dunia.
        </p>

        <div class="flex flex-col sm:flex-row gap-6">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="group relative px-12 py-5 bg-white text-gray-950 font-black rounded-3xl hover:bg-gray-100 transition shadow-2xl overflow-hidden">
                    <span class="relative z-10 uppercase tracking-widest text-sm italic">Masuk ke Dashboard</span>
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="group relative px-10 py-5 bg-gradient-to-br from-purple-600 to-blue-600 text-white font-black rounded-3xl transition shadow-2xl overflow-hidden hover:scale-105 active:scale-95">
                    <span class="relative z-10 uppercase tracking-widest text-sm">Masuk</span>
                </a>
                <a href="{{ route('register') }}"
                    class="px-10 py-5 glass rounded-3xl text-white font-black uppercase tracking-widest text-sm hover:bg-white/10 transition border border-white/10 hover:border-white/20">
                    Daftar
                </a>
            @endauth
        </div>

        <!-- Metric Cards -->
        <div class="mt-24 grid grid-cols-1 sm:grid-cols-3 gap-8 w-full max-w-5xl">
            <div
                class="group glass-dark p-10 rounded-[40px] border border-white/5 hover:border-purple-500/30 transition-all duration-500 hover:-translate-y-2">
                <div
                    class="w-14 h-14 bg-purple-500/20 rounded-2xl flex items-center justify-center text-purple-400 mb-6 group-hover:scale-110 transition duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-white mb-2 uppercase tracking-tighter">Tren Global</h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">Akses instan ke data film terpopuler dari
                    seluruh penjuru dunia melalui TMDB Global Engine.</p>
            </div>

            <div
                class="group glass-dark p-10 rounded-[40px] border border-white/5 hover:border-blue-500/30 transition-all duration-500 hover:-translate-y-2">
                <div
                    class="w-14 h-14 bg-blue-500/20 rounded-2xl flex items-center justify-center text-blue-400 mb-6 group-hover:scale-110 transition duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-white mb-2 uppercase tracking-tighter">Brankas Pribadi</h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">Simpan mahakarya pilihan Anda dalam brankas
                    digital pribadi yang terisolasi dan sepenuhnya aman.</p>
            </div>

            <div
                class="group glass-dark p-10 rounded-[40px] border border-white/5 hover:border-yellow-500/30 transition-all duration-500 hover:-translate-y-2">
                <div
                    class="w-14 h-14 bg-yellow-500/20 rounded-2xl flex items-center justify-center text-yellow-400 mb-6 group-hover:scale-110 transition duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-white mb-2 uppercase tracking-tighter">Papan Kritik</h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">Berikan penilaian tajam Anda dan simpan
                    catatan khusus untuk setiap plot twist yang Anda temukan.</p>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-32 pb-12 w-full text-center">
            <div class="w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent mb-12"></div>
            <p class="text-xs font-black text-gray-600 uppercase tracking-[0.5em] mb-4">Ditenagai oleh Inti The Movie
                Database</p>
            <p class="text-gray-500 font-bold">&copy; {{ date('Y') }} Nayla Nur Faridah. Node Arsitektural CineStream.
            </p>
        </footer>
    </main>

</body>

</html>