<x-app-layout>
    <div class="relative min-h-screen bg-gray-950 overflow-hidden">
        <!-- Ambient Background -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-purple-600/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px]"></div>
        </div>

        <x-slot name="header">
            <div class="relative z-10 flex justify-between items-center">
                <h2 class="font-black text-3xl text-white tracking-tighter neon-text-purple uppercase">
                    {{ __('Daftar Tontonan Pribadi') }}
                </h2>
                <div class="flex items-center gap-2 px-4 py-2 glass-dark rounded-xl border border-white/5">
                    <span class="w-2 h-2 rounded-full bg-purple-500 shadow-[0_0_10px_rgba(168,85,247,0.8)]"></span>
                    <span class="text-xs font-black text-gray-400 uppercase tracking-widest">{{ $movies->count() }} Film
                        Tersimpan</span>
                </div>
            </div>
        </x-slot>

        <div class="py-12 relative z-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                @if(session('success'))
                    <div
                        class="mb-8 px-6 py-4 bg-green-500/10 border border-green-500/30 rounded-2xl text-green-400 backdrop-blur-xl animate-pulse flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="font-bold text-sm uppercase tracking-wider">{{ session('success') }}</span>
                    </div>
                @endif

                @if($movies->count() == 0)
                    <div class="glass-dark rounded-[40px] p-20 text-center border border-white/10 shadow-2xl">
                        <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-8">
                            <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4 uppercase tracking-tighter">Koleksi Anda masih kosong
                        </h3>
                        <p class="text-gray-500 max-w-sm mx-auto mb-8 leading-relaxed">Mulai tambahkan film favorit Anda
                            dari dashboard utama untuk membangun perpustakaan sinema pribadi Anda.</p>
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl font-black text-white uppercase tracking-widest text-xs hover:scale-105 transition active:scale-95 shadow-xl shadow-purple-900/20">
                            Temukan Mahakarya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                        @foreach($movies as $movie)
                            <div
                                class="group glass-dark rounded-[35px] overflow-hidden border border-white/10 hover:border-purple-500/50 transition-all duration-500 shadow-2xl flex flex-col hover:-translate-y-2">
                                <div class="relative overflow-hidden aspect-[16/9]">
                                    @if($movie->poster_path)
                                        <img src="https://image.tmdb.org/t/p/w500{{ $movie->poster_path }}"
                                            alt="{{ $movie->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                    @else
                                        <div class="w-full h-full bg-gray-900 flex items-center justify-center text-gray-700">Tidak
                                            ada gambar</div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/20 to-transparent">
                                    </div>

                                    <form action="{{ route('watchlist.destroy', $movie->id) }}" method="POST"
                                        class="absolute top-4 right-4 translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-3 bg-red-500 text-white rounded-2xl hover:bg-red-600 transition shadow-xl hover:scale-110 active:scale-90"
                                            title="Hapus dari Koleksi">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>

                                    <div class="absolute bottom-4 left-6">
                                        <h3 class="text-xl font-black text-white leading-tight drop-shadow-lg mb-1">
                                            {{ $movie->title }}</h3>
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="px-2 py-0.5 rounded-md bg-white/10 backdrop-blur-md text-[10px] font-black text-gray-300 uppercase tracking-widest border border-white/5">Konten
                                                Tersimpan</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-8 flex-1 flex flex-col">
                                    <form action="{{ route('watchlist.update', $movie->id) }}" method="POST"
                                        class="space-y-6 mt-auto">
                                        @csrf
                                        @method('PATCH')

                                        <div class="space-y-2">
                                            <div class="flex justify-between items-center">
                                                <label
                                                    class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Rating
                                                    Pribadi</label>
                                                <span
                                                    class="text-yellow-400 font-black text-sm">{{ $movie->user_rating ?? '0.0' }}</span>
                                            </div>
                                            <div class="relative">
                                                <input type="number" step="0.1" min="0" max="10" name="user_rating"
                                                    value="{{ $movie->user_rating }}"
                                                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:ring-purple-500 focus:border-purple-500 transition-all placeholder-gray-700"
                                                    placeholder="0.0 - 10">
                                            </div>
                                        </div>

                                        <div class="space-y-2">
                                            <label
                                                class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Catatan
                                                Sinematik</label>
                                            <textarea name="notes" rows="3"
                                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:ring-purple-500 focus:border-purple-500 transition-all placeholder-gray-700"
                                                placeholder="Berikan kesan Anda terhadap film ini...">{{ $movie->notes }}</textarea>
                                        </div>

                                        <button type="submit"
                                            class="w-full group/btn relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-white rounded-2xl group bg-gradient-to-br from-purple-500 to-blue-500 hover:text-white focus:outline-none transition-all duration-300 shadow-lg shadow-purple-500/10">
                                            <span
                                                class="relative w-full px-5 py-3.5 transition-all ease-in duration-75 bg-gray-900 rounded-[14px] group-hover/btn:bg-opacity-0 font-black uppercase text-[10px] tracking-[0.2em]">
                                                Sinkronkan Catatan
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>