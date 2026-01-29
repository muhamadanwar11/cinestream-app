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
                        {{ __('Add New User') }}
                    </h2>
                    <p class="text-gray-400">Initialize a new secure identity for CineStream</p>
                </div>
            </div>

            <div class="bg-gray-800/40 backdrop-blur-xl rounded-3xl p-8 border border-white/10 shadow-2xl">
                <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name"
                            class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">Full
                            Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white placeholder-gray-600 focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all @error('name') border-red-500 @enderror">
                        @error('name') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email"
                            class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">Email
                            Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white placeholder-gray-600 focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all @error('email') border-red-500 @enderror">
                        @error('email') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Role Selection -->
                    <div>
                        <label for="role"
                            class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">Access
                            Level</label>
                        <select id="role" name="role" required
                            class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all">
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Standard User</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Password -->
                        <div>
                            <label for="password"
                                class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">Power
                                Password</label>
                            <input id="password" type="password" name="password" required
                                class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white placeholder-gray-600 focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all @error('password') border-red-500 @enderror">
                            @error('password') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-2 px-1">Confirm
                                Identity</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="w-full bg-gray-900/50 border-white/10 rounded-2xl p-4 text-white placeholder-gray-600 focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm transition-all">
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                            class="w-full py-4 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-purple-900/20 transform transition active:scale-95">
                            Authorize User Identity
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>