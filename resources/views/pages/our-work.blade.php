@extends('layouts.app')

@section('title', site_t('nav_our_work') . ' - ' . site_t('focus_heading') . ' | ' . config('app.name', 'Devansh Foundation'))

@section('content')

<!-- ==========================================
     आमची कार्यक्षेत्रे / OUR FOCUS AREAS
     Visual Layout Matched to Reference Image
=========================================== -->
<section class="py-10 sm:py-14 bg-[#F8FAFC] relative overflow-hidden border-b border-gray-100">
    
    <!-- Subtle background accent -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-bl from-emerald-100/40 via-blue-50/20 to-transparent rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header (Exact Reference Match) -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between pb-8 sm:pb-10 gap-6 border-b border-gray-200/70">
            
            <!-- Left Header Details -->
            <div class="max-w-3xl">
                <!-- Bar & Title -->
                <div class="flex items-center space-x-3 mb-2">
                    <span class="w-8 sm:w-10 h-1 sm:h-1.5 bg-[#16A34A] rounded-full inline-block flex-shrink-0"></span>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#0B2545] tracking-tight flex items-center flex-wrap gap-2">
                        <span>{{ site_t('focus_heading', [], 'आमची कार्यक्षेत्रे') }}</span>
                        <span class="text-gray-300 font-light hidden sm:inline">|</span>
                        <span class="text-lg sm:text-2xl font-bold text-[#073B63]">Our Focus Areas</span>
                    </h1>
                </div>

                <!-- Subtitles in Marathi & English -->
                <p class="text-sm sm:text-base font-semibold text-gray-800 leading-snug mt-1">
                    {{ site_t('focus_statement_mr', [], 'समाजाच्या सर्वांगीण विकासासाठी आम्ही विविध क्षेत्रांमध्ये सातत्याने कार्यरत आहोत.') }}
                </p>
                <p class="text-xs sm:text-sm text-gray-500 font-normal mt-0.5">
                    {{ site_t('focus_statement_en', [], 'We are continuously working across multiple areas for the holistic development of society.') }}
                </p>
            </div>

            <!-- Right Script Badge: Together for a Better Tomorrow -->
            <div class="hidden sm:flex flex-col items-end text-right select-none pl-4 flex-shrink-0">
                <div class="relative inline-block font-serif italic text-2xl lg:text-3xl font-bold text-[#073B63] leading-tight">
                    <span class="block">Together</span>
                    <span class="block text-lg lg:text-xl font-normal text-slate-600 font-sans tracking-wide">for a Better</span>
                    <span class="block text-2xl lg:text-3xl font-black text-[#0B2545]">Tomorrow</span>
                    <!-- Green flourish underline -->
                    <svg class="w-28 sm:w-32 h-3.5 mt-1 text-[#16A34A] fill-none stroke-current" viewBox="0 0 120 16">
                        <path d="M4 11 C 35 15, 80 12, 116 3" stroke-width="3.5" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>

        </div>

        <!-- 3-Column Focus Areas Grid (9 Authentic Cards) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 pt-8 sm:pt-10">
            @foreach($focusAreas as $area)
                <x-focus-area-card :area="$area" />
            @endforeach
        </div>

    </div>
</section>

<!-- ==========================================
     Support & Collaboration Call-to-Action
=========================================== -->
<section class="py-14 sm:py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-[#073B63] via-[#0F4C81] to-[#138A4B] rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-8">
            
            <div class="max-w-2xl space-y-2">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/20 text-white backdrop-blur-sm">
                    {{ site_t('nav_get_involved') }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-black tracking-tight">
                    {{ site_t('hero_badge', [], 'लहान पावले, मोठा बदल') }}
                </h2>
                <p class="text-sm sm:text-base text-emerald-100 leading-relaxed">
                    {{ site_t('focus_subheading') }}
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-3 flex-shrink-0 w-full sm:w-auto">
                <a href="{{ route('donate') }}" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-6 py-3.5 rounded-xl bg-[#F58220] hover:bg-[#DC6F13] text-white font-bold text-sm shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                    <i data-lucide="heart" class="w-4 h-4 fill-white"></i>
                    <span>{{ site_t('btn_donate') }}</span>
                </a>
                <a href="{{ route('volunteer') }}" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/30 text-white font-bold text-sm backdrop-blur-sm transition">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>{{ site_t('btn_volunteer') }}</span>
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
