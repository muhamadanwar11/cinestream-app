@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-white/5 border-white/10 text-white placeholder-gray-500 focus:border-purple-500 focus:ring-purple-500 rounded-2xl shadow-sm backdrop-blur-md transition-all duration-300']) }}>