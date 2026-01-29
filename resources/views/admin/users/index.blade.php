<x-app-layout>
    <div class="py-12 bg-gray-950 min-h-screen text-white relative overflow-hidden">
        <!-- Background Ambient -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-purple-600/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/5 rounded-full blur-[120px]"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <h2 class="text-5xl font-black tracking-tighter text-white mb-2 uppercase">
                        Inventaris <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500">Pengguna</span>
                    </h2>
                    <p class="text-gray-500 font-bold uppercase tracking-[0.3em] text-[10px]">Manajemen Personel Infrastruktur</p>
                </div>
                
                <div class="flex flex-col items-end gap-6">
                    <a href="{{ route('admin.users.create') }}" class="group relative px-8 py-4 bg-gradient-to-r from-purple-600 to-blue-600 rounded-[22px] font-black text-white uppercase tracking-widest text-xs hover:scale-105 transition active:scale-95 shadow-2xl shadow-purple-900/20 flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Identitas Baru
                    </a>
                    
                    <div class="flex gap-4">
                        @if(session('success'))
                            <div class="px-6 py-3 bg-green-500/10 border border-green-500/20 text-green-400 rounded-2xl backdrop-blur-xl animate-pulse text-xs font-black uppercase tracking-widest">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="px-6 py-3 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl backdrop-blur-xl text-xs font-black uppercase tracking-widest">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- User Table Container -->
            <div class="glass-dark rounded-[40px] border border-white/10 overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-gray-500 text-[10px] font-black uppercase tracking-[0.3em] bg-white/5 border-b border-white/5">
                                <th class="px-10 py-6">Profil Operasional</th>
                                <th class="px-10 py-6">Tingkat Otorisasi</th>
                                <th class="px-10 py-6">Garis Waktu Bergabung</th>
                                <th class="px-10 py-6 text-right">Kontrol Protokol</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach($users as $user)
                                <tr class="hover:bg-white/5 transition-all duration-300 group">
                                    <td class="px-10 py-8">
                                        <div class="flex items-center gap-6">
                                            <div class="w-16 h-16 rounded-[22px] bg-gradient-to-br {{ $user->role === 'admin' ? 'from-purple-600 to-indigo-700 shadow-[0_0_25px_rgba(147,51,234,0.3)]' : 'from-blue-600 to-cyan-700 shadow-[0_0_25px_rgba(37,99,235,0.3)]' }} flex items-center justify-center font-black text-2xl text-white group-hover:scale-110 transition duration-500">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-black text-xl text-white tracking-tight uppercase group-hover:text-purple-400 transition">{{ $user->name }}</p>
                                                <p class="text-xs text-gray-500 font-mono mt-1">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-10 py-8 text-center">
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('admin.users.update-role', $user) }}" method="POST" class="flex flex-col items-start gap-3">
                                                @csrf
                                                @method('PATCH')
                                                <div class="relative">
                                                    <select name="role" onchange="this.form.submit()"
                                                        class="appearance-none bg-white/5 border border-white/10 text-gray-300 text-[10px] font-black uppercase tracking-widest rounded-xl focus:ring-purple-500 focus:border-purple-500 block w-40 px-4 py-3 cursor-pointer hover:bg-white/10 transition">
                                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Pengguna Standar</option>
                                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrator</option>
                                                    </select>
                                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                                        @if($user->role === 'admin')
                                                            <div class="w-2 h-2 rounded-full bg-purple-500 shadow-[0_0_10px_rgba(168,85,247,0.8)]"></div>
                                                        @else
                                                            <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <div class="inline-flex items-center gap-3 px-5 py-2.5 bg-purple-500/10 border border-purple-500/20 rounded-2xl">
                                                <span class="text-[10px] font-black uppercase tracking-widest text-purple-400">Sesi Saat Ini</span>
                                                <div class="w-2 h-2 rounded-full bg-purple-500 shadow-[0_0_10px_rgba(168,85,247,0.8)] animate-pulse"></div>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-10 py-8">
                                        <div class="space-y-1">
                                            <p class="text-sm font-bold text-gray-300">{{ $user->created_at->format('d M, Y') }}</p>
                                            <p class="text-[10px] text-gray-500 font-black uppercase tracking-widest">{{ $user->created_at->diffForHumans() }}</p>
                                        </div>
                                    </td>
                                    <td class="px-10 py-8 text-right">
                                        <div class="flex items-center justify-end gap-4 opacity-0 group-hover:opacity-100 transition duration-500">
                                            @if($user->id !== auth()->id())
                                                <a href="{{ route('admin.users.edit', $user) }}" class="p-3 bg-white/5 hover:bg-blue-600 rounded-2xl text-gray-400 hover:text-white border border-white/5 transition-all shadow-xl">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                </a>
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('KRITIS: Hapus otorisasi identitas untuk {{ $user->name }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-3 bg-white/5 hover:bg-red-600 rounded-2xl text-gray-400 hover:text-white border border-white/5 transition-all shadow-xl">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-[10px] font-black text-gray-600 uppercase tracking-widest px-4 py-2 border border-white/5 rounded-xl">Status Absolut</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Enhanced Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- Inject Global Premium Pagination CSS -->
    <style>
        .pagination { display: flex; gap: 0.75rem; align-items: center; }
        .page-item .page-link {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            color: #6b7280;
            padding: 0.75rem 1.25rem;
            border-radius: 18px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .page-item.active .page-link {
            background: linear-gradient(135deg, #9333ea 0%, #2563eb 100%);
            color: white;
            border: none;
            box-shadow: 0 10px 20px rgba(147, 51, 234, 0.2);
            transform: translateY(-2px);
        }
        .page-item:hover:not(.active) .page-link {
            background: rgba(255, 255, 255, 0.08);
            color: white;
            border-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</x-app-layout>