<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="p-8 sm:p-12 glass-dark sm:rounded-[40px] relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-600/5 to-blue-600/5 pointer-events-none">
                </div>
                <div class="max-w-xl relative z-10">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 sm:p-12 glass-dark sm:rounded-[40px] relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-600/5 to-blue-600/5 pointer-events-none">
                </div>
                <div class="max-w-xl relative z-10">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 sm:p-12 glass-dark sm:rounded-[40px] relative overflow-hidden border border-red-500/10">
                <div class="absolute inset-0 bg-gradient-to-br from-red-600/5 to-orange-600/5 pointer-events-none">
                </div>
                <div class="max-w-xl relative z-10">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>