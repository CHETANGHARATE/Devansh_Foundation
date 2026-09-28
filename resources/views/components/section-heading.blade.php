@props([
    'badge' => null,
    'title' => '',
    'subtitle' => null,
    'align' => 'center',
    'badgeColor' => 'green', // green, orange, blue
])

@php
    $alignClass = $align === 'center' ? 'text-center max-w-3xl mx-auto' : 'text-left max-w-2xl';
    $badgeColors = [
        'green' => 'bg-[#EAF7EF] text-[#138A4B] border-[#138A4B]/20',
        'orange' => 'bg-orange-50 text-[#F58220] border-[#F58220]/20',
        'blue' => 'bg-[#EEF6FB] text-[#073B63] border-[#073B63]/20',
    ];
    $badgeStyle = $badgeColors[$badgeColor] ?? $badgeColors['green'];
@endphp

<div class="{{ $alignClass }} mb-12">
    @if($badge)
        <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase border {{ $badgeStyle }} mb-3">
            <span>{{ $badge }}</span>
        </div>
    @endif

    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#073B63] tracking-tight leading-tight">
        {{ $title }}
    </h2>

    @if($subtitle)
        <p class="mt-3 text-base sm:text-lg text-gray-600 leading-relaxed">
            {{ $subtitle }}
        </p>
    @endif
</div>
