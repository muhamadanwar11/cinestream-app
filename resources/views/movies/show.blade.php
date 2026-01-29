<x-app-layout>
    <div class="relative min-h-screen bg-gray-950 text-white overflow-hidden">
        <!-- Background Backdrop -->
        <div class="fixed inset-0 z-0">
            @if($movie['backdrop_path'])
                <img src="https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] }}" alt="Backdrop" class="w-full h-full object-cover opacity-20 blur-sm scale-105">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-gray-950 via-transparent to-gray-950"></div>
        </div>

        <div class="relative z-10 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Back Button -->
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 mb-10 text-gray-500 hover:text-white transition-all group font-black uppercase text-[10px] tracking-widest backdrop-blur-md px-4 py-2 bg-white/5 rounded-xl border border-white/5">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Penjelajahan
                </a>

                <div class="flex flex-col lg:flex-row gap-16">
                    <!-- Cinematic Poster Section -->
                    <div class="w-full lg:w-1/3 space-y-8">
                        <div class="relative group">
                            <div class="absolute -inset-4 bg-purple-600/30 rounded-[40px] blur-3xl opacity-0 group-hover:opacity-60 transition duration-700"></div>
                            <div class="relative rounded-[32px] overflow-hidden border border-white/10 shadow-2xl">
                                @if($movie['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-full object-cover">
                                @else
                                    <div class="w-full aspect-[2/3] bg-gray-900 flex items-center justify-center text-gray-600 font-black">TIDAK ADA GAMBAR</div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Mini Stats Card -->
                        <div class="glass-dark rounded-3xl p-8 border border-white/10 grid grid-cols-2 gap-6">
                            <div>
                                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">Skor TMDB</p>
                                <p class="text-2xl font-black text-yellow-400">{{ number_format($movie['vote_average'], 1) }}<span class="text-xs text-gray-600">/10</span></p>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">Tahun Rilis</p>
                                <p class="text-2xl font-black text-white">{{ \Carbon\Carbon::parse($movie['release_date'] ?? 'now')->format('Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Cinematic Details Section -->
                    <div class="w-full lg:w-2/3">
                        <div class="space-y-2 mb-8">
                            <span class="px-4 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] font-black uppercase tracking-[0.3em]">Mahakarya Sinematik</span>
                            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter leading-none mb-6">
                                {{ $movie['title'] }}
                            </h1>
                        </div>

                        <div class="space-y-12">
                            <!-- Synopsis Section -->
                            <div class="glass p-1 rounded-[32px]">
                                <div class="bg-gray-950/60 backdrop-blur-3xl rounded-[28px] p-10">
                                    <h3 class="text-xs font-black text-purple-400 uppercase tracking-[0.3em] mb-6 flex items-center gap-3">
                                        <span class="w-6 h-px bg-purple-500/30"></span>
                                        Ringkasan Narasi
                                    </h3>
                                    <p class="text-xl text-gray-300 leading-relaxed font-medium">
                                        {{ $movie['overview'] }}
                                    </p>
                                </div>
                            </div>

                            <!-- Cast Section -->
                            <div>
                                <h3 class="text-xs font-black text-blue-400 uppercase tracking-[0.3em] mb-6 flex items-center gap-3">
                                    <span class="w-6 h-px bg-blue-500/30"></span>
                                    Pemeran Utama
                                </h3>
                                <div class="flex flex-wrap gap-4">
                                    @foreach(array_slice($movie['credits']['cast'], 0, 8) as $cast)
                                        <div class="flex items-center gap-3 px-5 py-3 glass rounded-2xl border border-white/5 hover:border-white/20 transition-all cursor-default">
                                            @if($cast['profile_path'])
                                                <img src="https://image.tmdb.org/t/p/w185{{ $cast['profile_path'] }}" alt="{{ $cast['name'] }}" class="w-8 h-8 rounded-lg object-cover">
                                            @else
                                                <div class="w-8 h-8 bg-white/5 rounded-lg flex items-center justify-center text-[10px] text-gray-600 font-bold">N/A</div>
                                            @endif
                                            <span class="text-sm font-bold text-gray-300">{{ $cast['name'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- CTA Actions -->
                            <div class="mt-12 flex items-center gap-6">
                                @if($inWatchlist)
                                    <div class="flex items-center gap-4 px-10 py-5 bg-green-500/10 border border-green-500/20 rounded-3xl">
                                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <span class="font-black uppercase tracking-widest text-xs text-green-400">Tersimpan di Brankas</span>
                                    </div>
                                @else
                                    <form action="{{ route('watchlist.store') }}" method="POST" class="w-full md:w-auto">
                                        @csrf
                                        <input type="hidden" name="tmdb_id" value="{{ $movie['id'] }}">
                                        <input type="hidden" name="title" value="{{ $movie['title'] }}">
                                        <input type="hidden" name="poster_path" value="{{ $movie['poster_path'] }}">

                                        <button type="submit" class="w-full md:w-auto px-12 py-5 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-black rounded-3xl uppercase tracking-widest text-xs hover:scale-105 active:scale-95 transition-all shadow-2xl shadow-purple-900/40 flex items-center justify-center gap-3 group">
                                            Simpan ke Daftar Tontonan
                                            <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                                        </button>
                                    </form>
                                @endif
                                
                                <div class="hidden sm:flex flex-col">
                                    <span class="text-[10px] font-black text-gray-600 uppercase tracking-widest">Otentikasi Global</span>
                                    <span class="text-xs font-bold text-gray-400">Diverifikasi oleh Infrastruktur TMDB</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>