@props(['story'])

@php
    $trans = $story->translation();
    $title = $trans?->title ?? $story->person_name;
    $quote = $trans?->quote ?? '';
    $narrative = $trans?->story ?? '';
    $img = $story->image ?: 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=800&q=80';
@endphp

<div class="ngo-card bg-white rounded-2xl border border-gray-100 p-6 shadow-sm flex flex-col justify-between group hover:border-[#138A4B]/30 transition">
    <div>
        <!-- Profile Header -->
        <div class="flex items-center space-x-4 mb-4">
            <img src="{{ $img }}" alt="{{ $story->person_name }}" class="w-16 h-16 rounded-full object-cover ring-4 ring-[#EAF7EF]">
            <div>
                <h4 class="text-lg font-bold text-[#073B63] group-hover:text-[#138A4B] transition leading-snug">
                    {{ $story->person_name }}
                </h4>
                @if($story->person_role_or_location)
                    <p class="text-xs text-gray-500 flex items-center mt-0.5">
                        <i data-lucide="map-pin" class="w-3 h-3 text-[#F58220] mr-1"></i>
                        {{ $story->person_role_or_location }}
                    </p>
                @endif
            </div>
        </div>

        <!-- Quote Block -->
        @if($quote)
            <div class="relative bg-[#EEF6FB] rounded-xl p-4 mb-4 text-[#073B63] text-sm italic font-medium border-l-4 border-[#138A4B]">
                <span class="text-xl text-[#138A4B] font-serif mr-1">“</span>{{ $quote }}<span class="text-xl text-[#138A4B] font-serif ml-1">”</span>
            </div>
        @endif

        <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 mb-4">
            {{ $narrative }}
        </p>
    </div>

    <!-- Read Full Story Link -->
    <div class="pt-3 border-t border-gray-50 flex items-center justify-between">
        <a href="{{ route('stories.show', $story->slug) }}" class="inline-flex items-center text-sm font-semibold text-[#138A4B] hover:text-[#073B63] transition">
            <span>{{ site_t('btn_read_story', [], 'पूर्ण कथा वाचा') }}</span>
            <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
        </a>

        @if($story->project)
            <span class="text-xs text-gray-400 truncate max-w-[130px]">
                {{ $story->project->translation()?->title }}
            </span>
        @endif
    </div>
</div>
