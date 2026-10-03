@extends('layouts.app')

@php
    $trans = $focusArea->translation();
    $title = $trans?->title ?? $focusArea->slug;
    $desc = $trans?->description ?? $trans?->short_description;
    $icon = $focusArea->icon ?: 'heart';
    
    // Resolve image URL (handle full URL, local storage, or fallback)
    $rawImg = $focusArea->image;
    if ($rawImg && (str_starts_with($rawImg, 'http://') || str_starts_with($rawImg, 'https://'))) {
        $img = $rawImg;
    } elseif ($rawImg && file_exists(public_path($rawImg))) {
        $img = asset($rawImg);
    } else {
        $localPath = 'images/focus-areas/' . $focusArea->slug . '.jpg';
        $img = file_exists(public_path($localPath)) ? asset($localPath) : 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1200&q=80';
    }
@endphp

@section('title', $title . ' — ' . config('app.name', 'Devansh Foundation'))

@section('content')

<!-- Header Banner (Rich brand green matching design reference) -->
<section class="bg-gradient-to-r from-[#0D5C3A] via-[#107044] to-[#138A4B] text-white py-14 sm:py-16 relative overflow-hidden">
    <div class="site-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <!-- Breadcrumb Pill -->
            <div class="inline-flex items-center space-x-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/15 text-white mb-4 backdrop-blur-xs">
                <a href="{{ route('our-work.index') }}" class="hover:underline">{{ site_t('nav_our_work') }}</a>
                <span>/</span>
                <span>{{ $title }}</span>
            </div>
            <!-- Title & Icon -->
            <div class="flex items-center space-x-3.5 sm:space-x-4 mb-3 sm:mb-4">
                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-white/20 flex items-center justify-center text-white shrink-0 shadow-inner">
                    <i data-lucide="{{ $icon }}" class="w-7 h-7 sm:w-8 sm:h-8"></i>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight">
                    {{ $title }}
                </h1>
            </div>
            <!-- Subtitle -->
            <p class="text-base sm:text-lg text-emerald-50/95 leading-relaxed">
                {{ $trans?->short_description }}
            </p>
        </div>
    </div>
</section>

<!-- Focus Area Details & Projects -->
<section class="py-14 sm:py-16 bg-white">
    <div class="site-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12">
            
            <!-- Main Content -->
            <div class="lg:col-span-8 space-y-8">
                <div class="rounded-3xl overflow-hidden aspect-[16/9] shadow-md border border-gray-100">
                    <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-full object-cover">
                </div>

                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-[#073B63]">{{ site_t('project_details') }}</h2>
                    <p class="text-gray-600 text-base leading-relaxed">
                        {{ $desc }}
                    </p>
                </div>

                <!-- Projects under this Focus Area -->
                <div class="pt-8 border-t border-gray-100">
                    <h2 class="text-2xl font-bold text-[#073B63] mb-6">{{ site_t('nav_projects') }}</h2>
                    @if($projects->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach($projects as $proj)
                                <x-project-card :project="$proj" />
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-2xl p-8 text-center text-gray-500">
                            {{ site_t('no_records_found') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Donation Box -->
                <div class="bg-[#EAF7EF] rounded-3xl p-6 border border-[#138A4B]/20 shadow-sm text-center space-y-4">
                    <div class="w-12 h-12 rounded-full bg-[#138A4B] text-white flex items-center justify-center mx-auto">
                        <i data-lucide="heart" class="w-6 h-6 fill-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#073B63]">{{ site_t('donate_heading') }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        {{ site_t('donate_subheading') }}
                    </p>
                    <a href="{{ route('donate') }}" class="w-full block py-3 rounded-xl bg-[#F58220] hover:bg-[#DC6F13] text-white font-bold text-sm shadow-md transition">
                        {{ site_t('btn_donate') }} →
                    </a>
                </div>

                <!-- Quick Volunteer CTA -->
                <div class="bg-[#EEF6FB] rounded-3xl p-6 border border-[#073B63]/20 shadow-sm text-center space-y-4">
                    <h3 class="text-lg font-bold text-[#073B63]">{{ site_t('involve_volunteer') }}</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        {{ site_t('involve_volunteer_desc') }}
                    </p>
                    <a href="{{ route('volunteer') }}" class="w-full block py-2.5 rounded-xl border-2 border-[#073B63] text-[#073B63] hover:bg-[#073B63] hover:text-white font-bold text-sm transition">
                        {{ site_t('btn_volunteer') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
