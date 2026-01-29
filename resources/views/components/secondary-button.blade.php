<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-8 py-3 bg-white/5 border border-white/10 rounded-2xl font-black text-xs text-gray-400 uppercase tracking-[0.2em] hover:bg-white/10 hover:text-white transition-all duration-300 shadow-lg']) }}>
    {{ $slot }}
</button>