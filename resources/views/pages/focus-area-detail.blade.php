@extends('layouts.app')

@php
    $locale = app()->getLocale();
    $trans = $focusArea->translation($locale) ?? $focusArea->translation('mr') ?? $focusArea->translation('en');
    $title = $trans?->title ?? $focusArea->slug;
    $subtitle = $trans?->subtitle ?? '';
    if (empty($subtitle)) {
        $subtitles = [
            'education' => 'Education',
            'healthcare' => 'Healthcare',
            'women-empowerment' => 'Women Empowerment',
            'child-welfare' => 'Child Welfare',
            'environment' => 'Environment',
            'social-welfare' => 'Social Welfare',
            'divyang-senior' => 'Divyang & Senior Welfare',
            'youth-employment' => 'Youth & Employment',
            'rural-development' => 'Rural Development',
        ];
        $subtitle = $subtitles[$focusArea->slug] ?? '';
    }

    $color = $focusArea->color ?: 'emerald';
    
    $themeMap = [
        'pink' => [
            'bg_gradient' => 'from-[#BE123C] to-[#E11D48]',
            'badge' => 'bg-[#FFE4E6] text-[#BE123C]',
            'icon_bg' => 'bg-[#E11D48] text-white',
            'accent' => '#E11D48',
        ],
        'teal' => [
            'bg_gradient' => 'from-[#0F766E] to-[#0D9488]',
            'badge' => 'bg-[#CCFBF1] text-[#0F766E]',
            'icon_bg' => 'bg-[#0D9488] text-white',
            'accent' => '#0D9488',
        ],
        'orange' => [
            'bg_gradient' => 'from-[#C2410C] to-[#EA580C]',
            'badge' => 'bg-[#FFEDD5] text-[#C2410C]',
            'icon_bg' => 'bg-[#EA580C] text-white',
            'accent' => '#EA580C',
        ],
        'purple' => [
            'bg_gradient' => 'from-[#6D28D9] to-[#8B5CF6]',
            'badge' => 'bg-[#EDE9FE] text-[#6D28D9]',
            'icon_bg' => 'bg-[#8B5CF6] text-white',
            'accent' => '#8B5CF6',
        ],
        'green' => [
            'bg_gradient' => 'from-[#15803D] to-[#16A34A]',
            'badge' => 'bg-[#DCFCE7] text-[#15803D]',
            'icon_bg' => 'bg-[#16A34A] text-white',
            'accent' => '#16A34A',
        ],
        'rose' => [
            'bg_gradient' => 'from-[#BE123C] to-[#E11D48]',
            'badge' => 'bg-[#FFE4E6] text-[#BE123C]',
            'icon_bg' => 'bg-[#E11D48] text-white',
            'accent' => '#E11D48',
        ],
        'blue' => [
            'bg_gradient' => 'from-[#1D4ED8] to-[#2563EB]',
            'badge' => 'bg-[#DBEAFE] text-[#1D4ED8]',
            'icon_bg' => 'bg-[#2563EB] text-white',
            'accent' => '#2563EB',
        ],
        'amber' => [
            'bg_gradient' => 'from-[#C2410C] to-[#EA580C]',
            'badge' => 'bg-[#FFEDD5] text-[#C2410C]',
            'icon_bg' => 'bg-[#EA580C] text-white',
            'accent' => '#EA580C',
        ],
        'yellow' => [
            'bg_gradient' => 'from-[#B45309] to-[#D97706]',
            'badge' => 'bg-[#FEF3C7] text-[#B45309]',
            'icon_bg' => 'bg-[#D97706] text-white',
            'accent' => '#D97706',
        ],
    ];

    $theme = $themeMap[$color] ?? $themeMap['teal'];
    $icon = $focusArea->icon ?: 'heart';
    $desc = $trans?->description ?? $trans?->short_description ?? '';
    $imgUrl = $focusArea->image ? asset($focusArea->image) : asset('images/focus-areas/' . $focusArea->slug . '.jpg');

    $initiatives = $focusArea->initiatives()->orderBy('number')->get();
@endphp

@section('title', $title . ' - ' . site_t('nav_our_work') . ' | ' . config('app.name', 'Devansh Foundation'))

@section('content')

<!-- Header Banner with Themed Accent -->
<section class="bg-gradient-to-r {{ $theme['bg_gradient'] }} text-white py-14 sm:py-20 relative overflow-hidden shadow-inner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <!-- Breadcrumbs -->
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-white/20 text-white backdrop-blur-sm mb-4">
                <a href="{{ route('home') }}" class="hover:underline">{{ site_t('nav_home') }}</a>
                <span>/</span>
                <a href="{{ route('our-work.index') }}" class="hover:underline">{{ site_t('nav_our_work') }}</a>
                <span>/</span>
                <span class="text-white font-extrabold">{{ $title }}</span>
            </div>

            <!-- Title with Floating Category Icon -->
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-white text-gray-900 flex items-center justify-center shadow-lg ring-4 ring-white/30 flex-shrink-0">
                    <i data-lucide="{{ $icon }}" class="w-7 h-7 sm:w-8 sm:h-8" style="color: {{ $theme['accent'] }};"></i>
                </div>
                <div>
                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight">
                        {{ $title }}
                    </h1>
                    @if($subtitle)
                        <div class="text-sm sm:text-base font-semibold text-white/90 tracking-wide mt-1">
                            {{ $subtitle }}
                        </div>
                    @endif
                </div>
            </div>

            @if($trans?->short_description)
                <p class="text-base sm:text-lg text-white/90 leading-relaxed font-medium">
                    {{ $trans->short_description }}
                </p>
            @endif
        </div>
    </div>
</section>

<!-- Main Details Section -->
<section class="py-14 sm:py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            
            <!-- Left Main Column (8 cols) -->
            <div class="lg:col-span-8 space-y-10">
                
                <!-- Focus Area Hero Photo -->
                <div class="bg-white rounded-3xl p-3 sm:p-4 border border-gray-100 shadow-sm overflow-hidden">
                    <div class="relative rounded-2xl overflow-hidden aspect-[16/10] bg-gray-100">
                        <img 
                            src="{{ $imgUrl }}" 
                            alt="{{ $title }}" 
                            class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1200&q=80';"
                        />
                    </div>
                </div>

                <!-- Comprehensive Description -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm space-y-4">
                    <div class="flex items-center space-x-2.5">
                        <span class="w-2.5 h-6 rounded-full" style="background-color: {{ $theme['accent'] }};"></span>
                        <h2 class="text-xl sm:text-2xl font-bold text-[#073B63]">{{ site_t('project_details', [], 'तपशील व उद्देश') }}</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        {{ $desc }}
                    </p>
                </div>

                <!-- All Verbatim Initiatives List -->
                @if($initiatives->count() > 0)
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm space-y-6">
                        <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                            <div class="flex items-center space-x-2.5">
                                <span class="w-2.5 h-6 rounded-full" style="background-color: {{ $theme['accent'] }};"></span>
                                <h2 class="text-xl sm:text-2xl font-bold text-[#073B63]">
                                    {{ site_t('focus_initiatives_title', [], 'प्रमुख उपक्रम व योजना') }}
                                </h2>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $theme['badge'] }}">
                                {{ $initiatives->count() }} {{ site_t('nav_our_work', [], 'उपक्रम') }}
                            </span>
                        </div>

                        <!-- Initiatives Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($initiatives as $init)
                                @php
                                    $iTrans = $init->translation($locale) ?? $init->translation('mr') ?? $init->translation('en');
                                    $iTitle = $iTrans?->title ?? '';
                                    $iDesc = $iTrans?->description ?? '';
                                @endphp
                                <div class="p-4 rounded-2xl bg-gray-50/80 border border-gray-100 hover:border-gray-200 transition flex items-start space-x-3 group">
                                    <div class="w-7 h-7 rounded-full {{ $theme['badge'] }} flex-shrink-0 flex items-center justify-center text-xs font-bold mt-0.5 shadow-sm">
                                        {{ $init->number }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-bold text-gray-900 group-hover:text-[#073B63] transition leading-snug">
                                            {{ $iTitle }}
                                        </h4>
                                        @if($iDesc)
                                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                                                {{ $iDesc }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Projects under this Focus Area -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm space-y-6">
                    <div class="flex items-center space-x-2.5 border-b border-gray-100 pb-4">
                        <span class="w-2.5 h-6 rounded-full" style="background-color: {{ $theme['accent'] }};"></span>
                        <h2 class="text-xl sm:text-2xl font-bold text-[#073B63]">{{ site_t('nav_projects') }}</h2>
                    </div>

                    @if($projects->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach($projects as $proj)
                                <x-project-card :project="$proj" />
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-2xl p-8 text-center text-gray-500">
                            <i data-lucide="folder" class="w-10 h-10 text-gray-400 mx-auto mb-2"></i>
                            <p class="text-sm">{{ site_t('no_records_found') }}</p>
                        </div>
                    @endif
                </div>

            </div>

            <!-- Right Sidebar Column (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Donation Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-7 border border-gray-100 shadow-sm text-center space-y-4 sticky top-24">
                    <div class="w-14 h-14 rounded-2xl text-white flex items-center justify-center mx-auto shadow-md" style="background-color: {{ $theme['accent'] }};">
                        <i data-lucide="heart" class="w-7 h-7 fill-white"></i>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold text-[#073B63]">{{ site_t('donate_heading') }}</h3>
                        <p class="text-xs text-gray-500 mt-1 leading-relaxed">
                            {{ site_t('donate_subheading') }}
                        </p>
                    </div>

                    <a href="{{ route('donate') }}" class="w-full block py-3.5 rounded-xl bg-[#F58220] hover:bg-[#DC6F13] text-white font-bold text-sm shadow-md hover:shadow-lg transition">
                        {{ site_t('btn_donate') }} →
                    </a>

                    <div class="pt-4 border-t border-gray-100 text-left space-y-3">
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">
                            {{ site_t('involve_volunteer') }}
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ site_t('involve_volunteer_desc') }}
                        </p>
                        <a href="{{ route('volunteer') }}" class="w-full block py-2.5 rounded-xl border border-gray-300 hover:border-[#073B63] text-[#073B63] hover:bg-[#073B63] hover:text-white font-bold text-xs text-center transition">
                            {{ site_t('btn_volunteer') }}
                        </a>
                    </div>

                    <!-- Return to All Focus Areas -->
                    <div class="pt-3">
                        <a href="{{ route('our-work.index') }}" class="inline-flex items-center text-xs font-semibold text-[#138A4B] hover:text-[#073B63] transition">
                            <i data-lucide="arrow-left" class="w-3.5 h-3.5 mr-1"></i>
                            <span>{{ site_t('focus_all_areas', [], 'सर्व कार्यक्षेत्रे पहा') }}</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection
