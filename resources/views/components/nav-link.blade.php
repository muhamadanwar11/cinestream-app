@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'relative inline-flex items-center px-1 pt-1 text-[10px] font-black uppercase tracking-[0.2em] leading-5 text-white border-b-2 border-purple-500 transition duration-300 ease-in-out'
        : 'relative inline-flex items-center px-1 pt-1 text-[10px] font-black uppercase tracking-[0.2em] leading-5 text-gray-500 hover:text-gray-300 border-b-2 border-transparent hover:border-white/20 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>