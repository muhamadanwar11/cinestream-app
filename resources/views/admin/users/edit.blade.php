<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen text-white">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10 flex items-center gap-4">
                <a href="{{ route('admin.users.index') }}"
                    class="p-2 bg-gray-800 rounded-full text-gray-400 hover:text-white transition shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <div>
                    <h2
                        class="text-3xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500">
                        {{ __('Modify Identity') }}
                    </h2>
                    <p class="text-gray-400">Updating permissions for <span
                            class="text-white font-bold">{{ $user->name }}</span></p>
                </div>
            </div>

            <div class="bg-gray-800/40 backdrop-blur-xl rounded-3xl p-8 border border-white/10 shadow-2xl">
                <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label for="name"
                            class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">Full
                            Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all">
                        @error('name') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email"
                            class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">Email
                            Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all">
                        @error('email') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Role Selection -->
                    <div>
                        <label for="role"
                            class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">Access
                            Level</label>
                        @if($user->id !== auth()->id())
                            <select id="role" name="role" required
                                class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all">
                                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>Standard User
                                </option>
                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>
                                    Administrator</option>
                            </select>
                        @else
                            <input type="hidden" name="role" value="admin">
                            <div
                                class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-gray-500 cursor-not-allowed">
                                Administrator (Active Session Locked)
                            </div>
                        @endif
                    </div>

                    <div class="pt-8 border-t border-white/5">
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-white mb-1">Security Update</h3>
                            <p class="text-xs text-gray-500 uppercase tracking-widest">Leave blank if password should
                                remain unchanged</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Password -->
                            <div>
                                <label for="password"
                                    class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">New
                                    Password</label>
                                <input id="password" type="password" name="password"
                                    class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white placeholder-gray-700 focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all">
                                @error('password') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation"
                                    class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">Confirm
                                    Identity</label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white placeholder-gray-700 focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                            class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-blue-900/20 transform transition active:scale-95">
                            Update Security Protocol
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>