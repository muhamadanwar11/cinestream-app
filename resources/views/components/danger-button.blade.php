<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-8 py-3 bg-red-600/10 border border-red-600/20 rounded-2xl font-black text-xs text-red-500 uppercase tracking-[0.2em] hover:bg-red-600 hover:text-white transition-all duration-300 shadow-lg shadow-red-900/10']) }}>
    {{ $slot }}
</button>