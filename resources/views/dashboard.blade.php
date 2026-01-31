<x-app-layout>
    <div class="relative min-h-screen bg-gray-950 overflow-hidden">
        <!-- Floating Ambient Background -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-purple-600/20 rounded-full blur-[120px] animate-pulse">
            </div>
            <div class="absolute top-1/2 -right-24 w-80 h-80 bg-blue-600/20 rounded-full blur-[100px] animate-pulse"
                style="animation-delay: 2s"></div>
        </div>

        <x-slot name="header">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 relative z-10">
                <h2 class="font-black text-3xl text-white tracking-tighter neon-text-purple">
                    {{ __('JELAJAHI') }}
                </h2>
                <form action="{{ route('movies.search') }}" method="GET" class="relative group w-full md:w-96">
                    <input type="text" name="query" placeholder="Cari film favorit Anda..."
                        class="w-full px-6 py-4 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50 backdrop-blur-xl transition-all group-hover:bg-white/10"
                        value="{{ request('query') }}">
                    <button type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 p-2 bg-gradient-to-r from-purple-600 to-blue-600 rounded-xl hover:scale-105 transition active:scale-95 shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </x-slot>

        <div class="py-12 relative z-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Hero Section Card -->
                <div class="mb-12 relative group">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-purple-600/20 to-blue-600/20 rounded-[40px] blur-2xl opacity-50 group-hover:opacity-100 transition duration-700">
                    </div>
                    <div
                        class="relative glass-dark rounded-[40px] p-10 md:p-16 overflow-hidden flex flex-col md:flex-row items-center gap-12 border border-white/10">
                        <div class="flex-1 space-y-6">
                            <div
                                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-purple-500/20 border border-purple-500/30 text-purple-400 text-xs font-black uppercase tracking-[0.2em]">
                                <span class="w-2 h-2 rounded-full bg-purple-400 animate-ping"></span>
                                Tentang Platform
                            </div>
                            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight">
                                Pengalaman <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500">CineStream</span>
                                Terbaik Anda
                            </h1>
                            <p class="text-xl text-gray-400 leading-relaxed max-w-2xl">
                                Temukan keajaiban sinema dunia dalam satu genggaman. Platform ini dirancang khusus untuk
                                para <span class="text-white font-bold">Pecinta Film</span> sejati seperti Anda.
                            </p>

                            <div class="flex flex-wrap gap-6 pt-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-purple-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-black">Sumber
                                            Data</p>
                                        <p class="text-white font-bold">TMDB Global Engine</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-blue-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-black">Target
                                            Pengguna</p>
                                        <p class="text-white font-bold">Pecinta Film</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden lg:block relative animate-float">
                            <div
                                class="w-64 h-80 rounded-[30px] bg-gradient-to-br from-purple-600 to-blue-600 shadow-2xl rotate-6 p-1">
                                <div
                                    class="w-full h-full bg-gray-900 rounded-[28px] overflow-hidden flex items-center justify-center">
                                    <svg class="w-20 h-20 text-white/20" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div
                                class="absolute -bottom-6 -left-6 w-32 h-32 bg-purple-500 rounded-[20px] shadow-2xl -rotate-12 p-1">
                                <div class="w-full h-full bg-gray-900 rounded-[18px] flex items-center justify-center">
                                    <svg class="w-10 h-10 text-purple-500/50" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(isset($query))
                    <div class="mb-8 flex items-end justify-between">
                        <div>
                            <p class="text-purple-400 text-sm font-black uppercase tracking-widest mb-2">Hasil Pencarian</p>
                            <h3 class="text-3xl font-black text-white">Hasil untuk "{{ $query }}"</h3>
                        </div>
                        <a href="{{ route('dashboard') }}"
                            class="text-blue-400 hover:text-white transition-colors flex items-center gap-2 group">
                            Kembali ke Penjelajahan
                            <svg class="w-5 h-5 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="mb-8">
                        <p class="text-purple-400 text-sm font-black uppercase tracking-widest mb-2">Sedang Tren</p>
                        <h3 class="text-3xl font-black text-white">Mahakarya Populer</h3>
                    </div>
                @endif

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                    @if(isset($searchResults))
                        @foreach($searchResults as $movie)
                            <x-movie-card :movie="$movie" />
                        @endforeach
                    @elseif(isset($popularMovies))
                        @foreach($popularMovies as $movie)
                            <x-movie-card :movie="$movie" />
                        @endforeach
                    @endif
                </div>

                @if((isset($searchResults) && count($searchResults) == 0) || (isset($popularMovies) && count($popularMovies) == 0))
                    <div class="flex flex-col items-center justify-center py-20 text-center">
                        <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center text-gray-700 mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-2">Tidak ada film ditemukan</h4>
                        <p class="text-gray-500">Coba cari judul lain, seperti "Inception" atau "The Godfather".</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>