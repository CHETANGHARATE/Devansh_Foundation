@props(['area'])

@php
    $trans = $area->translation();
    $icon = $area->icon ?: 'heart';
    $title = $trans?->title ?? $area->slug;
    $desc = $trans?->short_description ?? '';
@endphp

<div class="ngo-card bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex flex-col justify-between group hover:border-[#138A4B]/40 transition">
    <div>
        <!-- Icon Badge -->
        <div class="w-14 h-14 rounded-2xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center mb-5 group-hover:bg-[#138A4B] group-hover:text-white transition duration-300 shadow-sm">
            <i data-lucide="{{ $icon }}" class="w-7 h-7"></i>
        </div>

        <!-- Title -->
        <h3 class="text-xl font-bold text-[#073B63] group-hover:text-[#138A4B] transition leading-snug mb-2">
            {{ $title }}
        </h3>

        <!-- Description -->
        <p class="text-sm text-gray-600 leading-relaxed mb-6 line-clamp-3">
            {{ $desc }}
        </p>
    </div>

    <!-- Action Link -->
    <a href="{{ route('our-work.show', $area->slug) }}" class="inline-flex items-center text-sm font-semibold text-[#138A4B] group-hover:text-[#073B63] transition">
        <span>{{ site_t('btn_learn_more', [], 'अधिक जाणून घ्या') }}</span>
        <i data-lucide="arrow-right" class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition duration-200"></i>
    </a>
</div>
