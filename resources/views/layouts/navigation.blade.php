<nav x-data="{ open: false }" class="bg-gray-950/80 backdrop-blur-2xl border-b border-white/5 sticky top-0 z-[100]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center group cursor-pointer">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-purple-600 to-blue-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition duration-500">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-lg font-black tracking-tighter text-white uppercase group-hover:tracking-normal transition-all duration-500">CineStream</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-10 sm:-my-px sm:ms-12 sm:flex h-full items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Jelajahi') }}
                    </x-nav-link>
                    <x-nav-link :href="route('watchlist.index')" :active="request()->routeIs('watchlist.index')">
                        {{ __('Daftar Tontonan') }}
                    </x-nav-link>

                    @if(Auth::user()->isAdmin())
                        <div class="w-px h-4 bg-white/10"></div>
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Kontrol Admin') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                            {{ __('Data Pengguna') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-4 py-2 border border-white/5 text-[10px] font-black uppercase tracking-widest rounded-xl text-gray-400 bg-white/5 hover:text-white hover:bg-white/10 focus:outline-none transition-all duration-300">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-5 h-5 rounded-md bg-gradient-to-tr from-purple-500 to-blue-500 flex items-center justify-center text-[8px] text-white">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 opacity-50" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-gray-900 border border-white/10 rounded-xl overflow-hidden shadow-2xl">
                            <x-dropdown-link :href="route('profile.edit')"
                                class="hover:bg-white/5 text-[10px] font-black uppercase tracking-widest p-4">
                                {{ __('Profil Saya') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="hover:bg-red-500/10 text-red-400 text-[10px] font-black uppercase tracking-widest p-4">
                                    {{ __('Keluar Sistem') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl text-gray-500 hover:text-white hover:bg-white/5 focus:outline-none transition duration-150 ease-in-out border border-transparent hover:border-white/10">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-950 border-t border-white/5">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Umpan Penjelajahan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('watchlist.index')" :active="request()->routeIs('watchlist.index')">
                {{ __('Daftar Tontonan') }}
            </x-responsive-nav-link>

            @if(Auth::user()->isAdmin())
                <div class="pt-2 pb-1 border-t border-white/5">
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Kontrol Admin') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.users.index')"
                        :active="request()->routeIs('admin.users.index')">
                        {{ __('Kelola Pengguna') }}
                    </x-responsive-nav-link>
                </div>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-6 border-t border-white/5 px-6">
            <div class="flex items-center gap-4 mb-4">
                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-500 to-blue-500 flex items-center justify-center font-black text-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-black text-sm text-white uppercase tracking-tight">{{ Auth::user()->name }}</div>
                    <div class="font-bold text-[10px] text-gray-500 uppercase tracking-widest">{{ Auth::user()->email }}
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Pengaturan Profil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-400">
                        {{ __('Putus Sesi') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>