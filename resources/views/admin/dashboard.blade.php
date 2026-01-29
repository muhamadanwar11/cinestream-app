<x-app-layout>
    <div class="py-12 bg-gray-950 min-h-screen text-white relative overflow-hidden">
        <!-- Ambient Background Effects -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-purple-600/10 rounded-full blur-[120px]"></div>
        <div
            class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-purple-900/10 to-transparent pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
                <div>
                    <h2 class="text-4xl font-black tracking-tighter text-white mb-2 uppercase">
                        PUSAT <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500">KONTROL
                            ADMIN</span>
                    </h2>
                    <p class="text-gray-500 font-medium uppercase tracking-[0.3em] text-[10px]">Manajemen Infrastruktur
                        & Analitik</p>
                </div>
                <div
                    class="flex items-center gap-4 bg-white/5 backdrop-blur-xl px-6 py-3 rounded-2xl border border-white/10">
                    <div class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></div>
                    <span class="text-sm font-bold text-gray-300">{{ now()->format('l, d M Y') }}</span>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Total Users Card -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-purple-600/20 rounded-[32px] blur-xl opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>
                    <div
                        class="relative glass-dark rounded-[32px] p-8 border border-white/10 transition-all duration-300 group-hover:border-purple-500/50">
                        <div class="flex items-center justify-between mb-8">
                            <div class="p-4 bg-purple-500/10 rounded-2xl text-purple-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <span
                                class="text-[10px] font-black text-gray-500 uppercase tracking-widest bg-white/5 px-3 py-1 rounded-full border border-white/5">Akun
                                Aktif</span>
                        </div>
                        <p class="text-gray-400 text-sm font-medium mb-1">Total Basis Identitas</p>
                        <h3 class="text-5xl font-black text-white tracking-tighter">{{ $totalUsers }}</h3>
                    </div>
                </div>

                <!-- Total Movies Card -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-blue-600/20 rounded-[32px] blur-xl opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>
                    <div
                        class="relative glass-dark rounded-[32px] p-8 border border-white/10 transition-all duration-300 group-hover:border-blue-500/50">
                        <div class="flex items-center justify-between mb-8">
                            <div class="p-4 bg-blue-500/10 rounded-2xl text-blue-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                                </svg>
                            </div>
                            <span
                                class="text-[10px] font-black text-gray-500 uppercase tracking-widest bg-white/5 px-3 py-1 rounded-full border border-white/5">Konten
                                Lokal</span>
                        </div>
                        <p class="text-gray-400 text-sm font-medium mb-1">Film dalam Koleksi</p>
                        <h3 class="text-5xl font-black text-white tracking-tighter">{{ $totalMovies }}</h3>
                    </div>
                </div>

                <!-- Administrative Tools -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-indigo-600/20 rounded-[32px] blur-xl opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>
                    <div
                        class="relative glass-dark rounded-[32px] p-8 border border-white/10 transition-all duration-300 group-hover:border-indigo-500/50 flex flex-col justify-between">
                        <div>
                            <p class="text-white font-bold text-lg mb-2">Portal Manajemen</p>
                            <p class="text-gray-500 text-sm leading-snug mb-6">Akses aman ke modulasi database pengguna
                                dan protokol otentikasi.</p>
                        </div>
                        <a href="{{ route('admin.users.index') }}"
                            class="w-full flex items-center justify-center gap-2 py-4 bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl font-black uppercase text-xs tracking-[0.2em] hover:scale-[1.02] transition active:scale-95 shadow-xl shadow-purple-900/20">
                            Akses Database Pengguna
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Recent Registrations Table -->
                <div class="lg:col-span-2">
                    <div class="glass-dark rounded-[40px] border border-white/10 overflow-hidden shadow-2xl">
                        <div class="p-8 border-b border-white/5 bg-white/5 flex items-center justify-between">
                            <h3 class="text-xl font-black flex items-center gap-3 uppercase">
                                <span class="w-1.5 h-6 bg-purple-500 rounded-full"></span>
                                Pendaftaran Terbaru
                            </h3>
                            <span class="text-[10px] font-bold text-purple-400 uppercase tracking-widest">Umpan Waktu
                                Nyata</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <tbody class="divide-y divide-white/5">
                                    @foreach($recentUsers as $user)
                                        <tr class="hover:bg-white/5 transition-colors duration-200 group">
                                            <td class="px-8 py-6">
                                                <div class="flex items-center gap-4">
                                                    <div
                                                        class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-purple-500 to-blue-600 flex items-center justify-center font-black text-white shadow-lg group-hover:scale-110 transition duration-300">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <p class="font-bold text-white text-base">{{ $user->name }}</p>
                                                        <p class="text-xs text-gray-500 font-mono">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-8 py-6">
                                                @if($user->role === 'admin')
                                                    <div
                                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-purple-500/10 border border-purple-500/20 text-purple-400 text-[10px] font-black uppercase tracking-widest">
                                                        <div class="w-1 h-1 rounded-full bg-purple-400"></div>
                                                        Administrator
                                                    </div>
                                                @else
                                                    <div
                                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] font-black uppercase tracking-widest">
                                                        <div class="w-1 h-1 rounded-full bg-blue-400"></div>
                                                        Pengguna Standar
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-8 py-6 text-right text-gray-500 text-xs font-medium">
                                                {{ $user->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- System Info Module -->
                <div class="space-y-8">
                    <!-- App Info -->
                    <div class="glass-dark rounded-[40px] p-8 border border-white/10 relative overflow-hidden group">
                        <div
                            class="absolute -right-12 -top-12 w-48 h-48 bg-purple-600/10 rounded-full blur-3xl pointer-events-none">
                        </div>
                        <div class="relative z-10">
                            <h4
                                class="text-lg font-black text-white mb-6 uppercase tracking-widest flex items-center gap-2">
                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Objektif Sistem
                            </h4>
                            <p class="text-gray-400 text-sm leading-relaxed mb-6">
                                CineStream adalah sistem penemuan film personal yang dirancang khusus untuk <span
                                    class="text-white font-bold">Pecinta Film</span>. Fokus utama adalah memberikan
                                akses data sinematik yang akurat dan pengelolaan koleksi pribadi yang aman.
                            </p>
                            <div class="flex items-center gap-3 p-4 bg-white/5 rounded-2xl border border-white/5">
                                <img src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_2-d537fb228cf3ded904ef09b136fe3fec72548ebc1fea3fbbd1ad9e36364db38b.svg"
                                    class="w-8 h-8 object-contain" alt="TMDB">
                                <div>
                                    <p
                                        class="text-[10px] text-gray-500 font-black uppercase tracking-widest leading-none mb-1">
                                        Sumber Data</p>
                                    <p class="text-xs text-white font-bold">TMDB Public API</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Role Architecture -->
                    <div class="glass-dark rounded-[40px] p-8 border border-white/10 relative overflow-hidden">
                        <h4
                            class="text-lg font-black text-white mb-6 uppercase tracking-widest flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.040L3 6.247a13.235 13.235 0 001.242 7.244c1.133 2.523 3.227 4.57 5.758 5.717a12.33 12.33 0 005.758 5.717c2.531-1.147 4.625-3.194 5.758-5.717a13.235 13.235 0 001.242-7.244l-0.382-0.263z">
                                </path>
                            </svg>
                            Arsitektur Peran
                        </h4>
                        <div class="space-y-4">
                            <div class="p-4 bg-purple-500/10 rounded-2xl border border-purple-500/20">
                                <p class="text-xs font-black text-purple-400 uppercase tracking-[0.2em] mb-1">Akses
                                    Administratif</p>
                                <p class="text-xs text-gray-400 leading-snug">Kontrol penuh identitas user, statistik
                                    global, dan integritas database.</p>
                            </div>
                            <div class="p-4 bg-blue-500/10 rounded-2xl border border-blue-500/20">
                                <p class="text-xs font-black text-blue-400 uppercase tracking-[0.2em] mb-1">Identitas
                                    Standar</p>
                                <p class="text-xs text-gray-400 leading-snug">Eksplorasi API, pencarian mahakarya, dan
                                    manajemen watchlist pribadi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>