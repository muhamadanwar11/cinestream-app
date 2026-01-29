@props(['movie'])

<div
    class="group relative bg-gray-900 rounded-2xl overflow-hidden shadow-lg transition duration-500 hover:shadow-2xl hover:-translate-y-2 border border-gray-800">
    <a href="{{ route('movies.show', $movie['id']) }}" class="block w-full h-full">
        <!-- Poster Image -->
        <div class="relative w-full aspect-[2/3] overflow-hidden">
            @if($movie['poster_path'])
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
                    loading="lazy"
                    class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:opacity-90">
            @else
                <div
                    class="w-full h-full bg-gray-800 flex flex-col items-center justify-center text-gray-500 p-4 text-center">
                    <svg class="w-12 h-12 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="text-xs font-medium">No Poster Available</span>
                </div>
            @endif

            <!-- Dark Gradient Overlay (Always visible at bottom) -->
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-90">
            </div>

            <!-- Hover Overlay -->
            <div class="absolute inset-0 bg-purple-900/20 opacity-0 group-hover:opacity-100 transition duration-500">
            </div>

            <!-- Content Positioned Absolutely at Bottom -->
            <div
                class="absolute bottom-0 left-0 w-full p-5 translate-y-2 group-hover:translate-y-0 transition duration-300">
                <h4 class="text-lg font-bold text-white leading-tight mb-1 drop-shadow-md line-clamp-2">
                    {{ $movie['title'] }}
                </h4>

                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-1 text-yellow-400 font-semibold">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span>{{ number_format($movie['vote_average'], 1) }}</span>
                    </div>
                    <span class="text-gray-300 font-medium bg-gray-800/60 backdrop-blur-sm px-2 py-0.5 rounded text-xs">
                        {{ \Carbon\Carbon::parse($movie['release_date'] ?? 'now')->format('Y') }}
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>