@props(['image', 'title', 'by', 'date', 'category' => null, 'description', 'link'])

<div
    class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col transform transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
    <img src="{{ asset('img/' . $image) }}" alt="{{ $title }}" class="w-full h-48 object-cover">

    <div class="p-5 flex-1 flex flex-col">
        <div class="text-xs text-gray-500 mb-2 flex items-center justify-between">
            <span>{{ \Carbon\Carbon::parse($date)->format('F j, Y') }}</span>
            @if ($category)
                <span class="bg-emerald-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ strtoupper($category) }}
                </span>
            @endif
        </div>

        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $title }}</h3>

        <p class="text-gray-600 text-sm mb-4 flex-1">
            {{ \Illuminate\Support\Str::words(strip_tags($description), 12, '...') }}
        </p>

        <div class="flex justify-end">
            <a href="{{ $link }}"
                class="relative inline-flex items-center gap-2 border-2 border-blue-600 text-blue-600 text-sm font-semibold px-4 py-2 rounded-full overflow-hidden group hover:bg-blue-600 hover:border-0">
                <span class="relative z-10 transition-colors duration-300 group-hover:text-white">Read More</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4 relative z-10 transition-colors duration-300 group-hover:text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</div>
