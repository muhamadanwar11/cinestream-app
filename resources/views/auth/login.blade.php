<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-6">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <input id="remember_me" type="checkbox"
                    class="rounded-lg bg-white/5 border-white/10 text-purple-600 shadow-sm focus:ring-purple-500 focus:ring-offset-gray-900 transition-all cursor-pointer"
                    name="remember">
                <span
                    class="ms-3 text-xs font-bold text-gray-500 uppercase tracking-widest group-hover:text-gray-300 transition-colors">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col gap-6 mt-8">
            <x-primary-button class="w-full">
                {{ __('Login') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="text-center text-[10px] font-black text-gray-600 uppercase tracking-[0.2em] hover:text-purple-400 transition-all duration-300"
                    href="{{ route('password.request') }}">
                    {{ __('Kehilangan Akses? Pulihkan Sekarang') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>