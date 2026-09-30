@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#138A4B] text-white py-16 sm:py-20 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/15 text-white border border-white/20 mb-4">
                <span>{{ site_t('nav_our_work') }}</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('focus_heading') }}
            </h1>
            <p class="text-lg text-emerald-50 leading-relaxed">
                {{ site_t('focus_subheading') }}
            </p>
        </div>
    </div>
</section>

<!-- Focus Areas Detailed Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        @foreach($focusAreas as $index => $area)
            @php
                $trans = $area->translation();
                $title = $trans?->title ?? $area->slug;
                $desc = $trans?->description ?? ($trans?->short_description ?? '');
                $icon = $area->icon ?: 'heart';
                $img = $area->image ?: 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=800&q=80';
                $isEven = $index % 2 === 1;
            @endphp

            <div class="bg-white rounded-3xl border border-gray-100 p-8 sm:p-12 shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center {{ $isEven ? 'lg:flex-row-reverse' : '' }}">
                    
                    <!-- Text side -->
                    <div class="lg:col-span-7 space-y-5 {{ $isEven ? 'lg:order-2' : 'lg:order-1' }}">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center">
                                <i data-lucide="{{ $icon }}" class="w-6 h-6"></i>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-wider text-gray-400">{{ site_t('nav_our_work') }} #{{ $index + 1 }}</span>
                        </div>

                        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#073B63]">
                            {{ $title }}
                        </h2>

                        <p class="text-base text-gray-600 leading-relaxed">
                            {{ $desc }}
                        </p>

                        <!-- Key Pillars / Badges -->
                        <div class="flex flex-wrap gap-2 pt-2">
                            <span class="px-3 py-1 bg-[#EAF7EF] text-[#138A4B] rounded-full text-xs font-semibold">{{ site_t('about_trust_badge') }}</span>
                            <span class="px-3 py-1 bg-[#EEF6FB] text-[#073B63] rounded-full text-xs font-semibold">{{ site_t('nav_impact') }}</span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-semibold">{{ site_t('involve_volunteer') }}</span>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 flex flex-wrap items-center gap-4">
                            <a href="{{ route('our-work.show', $area->slug) }}" class="inline-flex items-center space-x-2 px-6 py-3 rounded-xl bg-[#073B63] hover:bg-[#052a47] text-white font-bold text-sm shadow-sm transition">
                                <span>{{ site_t('btn_learn_more') }}</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                            <a href="{{ route('donate') }}" class="inline-flex items-center space-x-1.5 px-5 py-3 rounded-xl bg-[#F58220] hover:bg-[#DC6F13] text-white font-bold text-sm transition">
                                <i data-lucide="heart" class="w-4 h-4"></i>
                                <span>{{ site_t('btn_donate') }}</span>
                            </a>
                        </div>
                    </div>

                    <!-- Image side -->
                    <div class="lg:col-span-5 {{ $isEven ? 'lg:order-1' : 'lg:order-2' }}">
                        <div class="relative rounded-2xl overflow-hidden aspect-[4/3] shadow-md group">
                            <img src="{{ $img }}" alt="{{ $title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
