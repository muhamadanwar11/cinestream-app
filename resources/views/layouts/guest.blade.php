<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CineStream') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans text-white antialiased bg-gray-950 overflow-hidden" style="background-color: #030712;">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">

        <!-- Premium Background System -->
        <div class="fixed inset-0 z-0">
            <div
                class="absolute inset-0 bg-[url('https://image.tmdb.org/t/p/original/pB8BM7pdSp6B6Ih7Qf4n618UZvv.jpg')] bg-cover bg-center opacity-30 blur-md scale-110">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/80 to-transparent"></div>

            <!-- Dynamic Glows -->
            <div class="absolute top-1/4 -left-24 w-96 h-96 bg-purple-600/20 rounded-full blur-[120px] animate-pulse">
            </div>
            <div class="absolute bottom-1/4 -right-24 w-96 h-96 bg-blue-600/20 rounded-full blur-[120px] animate-pulse"
                style="animation-delay: 2s"></div>
        </div>

        <!-- Branding -->
        <div class="relative z-10 mb-8 text-center">
            <a href="/" class="group flex flex-col items-center gap-2">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-purple-600 to-blue-600 rounded-[22px] flex items-center justify-center shadow-2xl group-hover:scale-110 transition duration-500">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z">
                        </path>
                    </svg>
                </div>
                <h1 class="text-3xl font-black tracking-tighter text-white uppercase mt-4">CineStream <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Node</span>
                </h1>
                <p class="text-[10px] font-black text-gray-500 uppercase tracking-[0.4em]">Secure Access Portal</p>
            </a>
        </div>

        <!-- Auth Card -->
        <div
            class="relative z-10 w-full sm:max-w-md px-10 py-12 glass-dark border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.5)] sm:rounded-[40px] overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-600/5 to-blue-600/5 pointer-events-none"></div>
            <div class="relative z-10">
                {{ $slot }}
            </div>
        </div>

        <!-- Global Footer Info -->
        <div class="relative z-10 mt-8">
            <p class="text-[10px] font-black text-gray-600 uppercase tracking-widest">&copy; {{ date('Y') }} CineStream
                Cyber-Infrastructure</p>
        </div>
    </div>
</body>

</html>