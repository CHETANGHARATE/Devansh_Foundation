@props(['article'])

@php
    $trans = $article->translation();
    $title = $trans?->title ?? $article->slug;
    $shortDesc = $trans?->short_description ?? '';
    $img = $article->featured_image ?: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80';
    $date = $article->published_at ? $article->published_at->format('d M, Y') : '';
@endphp

<div class="ngo-card bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm flex flex-col justify-between group">
    <div>
        <div class="relative h-48 overflow-hidden bg-gray-100">
            <img src="{{ $img }}" alt="{{ $title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            <div class="absolute top-3 left-3">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#073B63] text-white">
                    {{ $article->category }}
                </span>
            </div>
            @if($date)
                <div class="absolute bottom-3 left-3">
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-black/60 text-white backdrop-blur-sm">
                        <i data-lucide="calendar" class="w-3 h-3 mr-1"></i>
                        {{ $date }}
                    </span>
                </div>
            @endif
        </div>

        <div class="p-5">
            <h3 class="text-lg font-bold text-[#073B63] group-hover:text-[#138A4B] transition leading-snug mb-2 line-clamp-2">
                {{ $title }}
            </h3>
            <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 mb-4">
                {{ $shortDesc }}
            </p>
        </div>
    </div>

    <div class="px-5 pb-5">
        <a href="{{ route('home') }}#news" class="inline-flex items-center text-sm font-semibold text-[#138A4B] hover:text-[#073B63] transition">
            <span>{{ site_t('btn_learn_more', [], 'अधिक जाणून घ्या') }}</span>
            <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
        </a>
    </div>
</div>
