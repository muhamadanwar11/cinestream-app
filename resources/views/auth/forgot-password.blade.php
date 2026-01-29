<x-guest-layout>
    <div class="mb-8 text-xs font-bold text-gray-500 uppercase tracking-widest leading-relaxed">
        {{ __('Kehilangan kendali akses? Masukkan email Anda untuk menerima instruksi pemulihan identitas sinematik Anda.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-8">
            <x-primary-button class="w-full">
                {{ __('Kirim Tautan Pemulihan') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>