<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-600 border border-transparent rounded-2xl font-black text-xs text-white uppercase tracking-[0.2em] hover:scale-105 active:scale-95 shadow-xl shadow-purple-900/20 transition-all duration-300']) }}>
    {{ $slot }}
</button>