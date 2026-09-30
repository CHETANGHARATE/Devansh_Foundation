@extends('layouts.app')

@section('content')

<!-- ==========================================
     1. HERO SECTION (Using uploaded banner image)
=========================================== -->
<section class="relative overflow-hidden bg-[#F3F9F5] border-b border-gray-100 min-h-[460px] lg:min-h-[500px] flex items-center">
    <!-- Full-width Panoramic Hero Graphic matching reference -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/hero/hero-banner.png') }}" 
             alt="Devansh Foundation" 
             class="w-full h-full object-cover object-right lg:object-center">
        <!-- Soft gradient on the left for maximum text contrast and legibility -->
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/85 to-transparent sm:via-white/75 lg:via-white/60 w-full sm:w-[80%] lg:w-[58%]"></div>
    </div>

    <!-- Handwritten Chalk Message positioned above the child -->
    <div class="absolute top-8 right-[24%] sm:right-[26%] lg:right-[25%] z-10 pointer-events-none transform -rotate-3 text-center hidden md:block">
        <div class="handwritten-font text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.85)] text-2xl sm:text-3xl lg:text-4xl font-extrabold leading-tight tracking-wide whitespace-pre-line">
            {{ site_t('hero_handwritten') }}
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16 relative z-10 w-full">
        <div class="max-w-xl lg:max-w-lg space-y-5 text-left">
            
            <!-- Main Headline -->
            <h1 class="text-4xl sm:text-5xl lg:text-[54px] font-black tracking-tight leading-[1.12]">
                <span class="block text-[#073B63]">{{ site_t('hero_title_line1') }}</span>
                <span class="block text-[#138A4B]">{{ site_t('hero_title_line2') }}</span>
                <span class="inline-flex items-center text-[#F58220]">
                    {{ site_t('hero_title_line3') }}
                    <!-- Small Green Leaf SVG Icon -->
                    <svg class="w-8 h-8 ml-2 inline-block text-[#138A4B] fill-current" viewBox="0 0 24 24">
                        <path d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22l1-2.3A4.49 4.49 0 0 0 8 20C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75C7 8 17 8 17 8z"/>
                    </svg>
                </span>
            </h1>

            <!-- Supporting Description -->
            <div class="space-y-1 text-sm sm:text-base text-gray-800 leading-relaxed font-semibold">
                <p>{{ site_t('hero_subtitle_1') }}</p>
                <p>{{ site_t('hero_subtitle_2') }}</p>
                <p>{{ site_t('hero_subtitle_3') }}</p>
            </div>

            <!-- Tagline -->
            <div class="text-xs sm:text-sm font-bold text-[#073B63] tracking-wide pt-1">
                {{ site_t('tagline') }}
            </div>

            <!-- CTA Buttons -->
            <div class="pt-2 flex flex-wrap items-center gap-3.5">
                <a href="{{ route('donate') }}" class="inline-flex items-center justify-center space-x-2 px-6 py-3 rounded-md text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 text-sm">
                    <i data-lucide="heart" class="w-4 h-4 fill-white"></i>
                    <span>{{ site_t('btn_donate') }} →</span>
                </a>

                <a href="{{ route('volunteer') }}" class="inline-flex items-center justify-center space-x-2 px-5 py-3 rounded-md text-white font-bold bg-[#0D5C3A] hover:bg-[#09452B] shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 text-sm">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>{{ site_t('btn_volunteer') }} →</span>
                </a>
            </div>

        </div>
    </div>
</section>


<!-- ==========================================
     2. OUR FOCUS AREAS / आमची कार्यक्षेत्रे
     Professional 3×3 Grid — Vertical Cards
=========================================== -->
<section class="py-14 sm:py-20 bg-gradient-to-b from-[#EEF2F8] to-[#F7F9FC] border-b border-gray-200">
@php $locale = app()->getLocale(); @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- ─── Section Header ─── -->
        <div class="relative overflow-hidden rounded-3xl mb-10 sm:mb-14" style="background: linear-gradient(135deg, #0B2545 0%, #073B63 55%, #0D5C3A 100%);">

            <!-- Decorative circles -->
            <div class="absolute -top-12 -right-12 w-56 h-56 rounded-full bg-white/5 pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/2 w-32 h-32 rounded-full bg-white/5 pointer-events-none"></div>

            <!-- Header image on right -->
            <div class="absolute right-0 top-0 bottom-0 w-[40%] hidden lg:block pointer-events-none overflow-hidden">
                <img
                    src="{{ asset('images/focus-areas/focus-header-banner.jpg') }}"
                    alt=""
                    aria-hidden="true"
                    class="w-full h-full object-cover object-center opacity-40"
                />
                <div class="absolute inset-0" style="background: linear-gradient(to right, #0B2545, #073B6300);"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 px-8 py-10 sm:px-12 sm:py-12 lg:w-[64%]">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white/80 text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-5">
                    <span class="w-2 h-2 rounded-full bg-[#4ADE80] animate-pulse"></span>
                    {{ $locale === 'en' ? 'Our Programs' : ($locale === 'hi' ? 'हमारे कार्यक्रम' : 'आमचे उपक्रम') }}
                </div>

                <!-- Title -->
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight mb-4">
                    @if(app()->getLocale() === 'en')
                        Our Focus Areas
                    @elseif(app()->getLocale() === 'hi')
                        हमारे कार्यक्षेत्र
                        <span class="block text-white/50 text-2xl font-semibold mt-1">Our Focus Areas</span>
                    @else
                        आमची कार्यक्षेत्रे
                        <span class="block text-white/50 text-2xl font-semibold mt-1">Our Focus Areas</span>
                    @endif
                </h2>

                <!-- Subtitle -->
                <p class="text-white/80 text-base sm:text-lg font-medium leading-relaxed max-w-xl">
                    {{ site_t('focus_statement_mr', [], 'समाजाच्या सर्वांगीण विकासासाठी आम्ही विविध क्षेत्रांमध्ये सातत्याने कार्यरत आहोत.') }}
                </p>
                <p class="text-white/50 text-sm mt-1.5">
                    We are continuously working across multiple areas for the holistic development of society.
                </p>

                <!-- Stats row -->
                <div class="flex flex-wrap gap-6 mt-8">
                    <div>
                        <div class="text-3xl font-black text-[#4ADE80]">9</div>
                        <div class="text-white/60 text-xs font-semibold mt-0.5">{{ $locale === 'en' ? 'Focus Areas' : ($locale === 'hi' ? 'कार्यक्षेत्र' : 'कार्यक्षेत्रे') }}</div>
                    </div>
                    <div class="w-px bg-white/20 self-stretch"></div>
                    <div>
                        <div class="text-3xl font-black text-[#60A5FA]">79+</div>
                        <div class="text-white/60 text-xs font-semibold mt-0.5">{{ $locale === 'en' ? 'Initiatives' : ($locale === 'hi' ? 'उपक्रम' : 'उपक्रम') }}</div>
                    </div>
                    <div class="w-px bg-white/20 self-stretch"></div>
                    <div>
                        <div class="text-3xl font-black text-[#F9A8D4]">10K+</div>
                        <div class="text-white/60 text-xs font-semibold mt-0.5">{{ $locale === 'en' ? 'Beneficiaries' : ($locale === 'hi' ? 'लाभार्थी' : 'लाभार्थी') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ─── 3×3 Card Grid — equal height cards ─── -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
            @foreach($focusAreas as $area)
                <x-focus-area-card :area="$area" />
            @endforeach
        </div>

    </div>
</section>


<!-- ==========================================
     3. OUR IMPACT
=========================================== -->
<section class="relative py-12 bg-cover bg-center overflow-hidden" style="background-image: url('{{ asset('images/impact/landscape-bg.jpg') }}');">
    <!-- Gradient overlay for high legibility -->
    <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/85 to-white/70"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Header -->
        <div class="flex items-center space-x-2.5 pb-8">
            <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
            <div>
                <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight leading-tight">
                    {{ site_t('impact_heading') }}
                </h2>
                <div class="text-xs sm:text-sm font-bold text-gray-600">
                    {{ site_t('impact_subheading') }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            
            <!-- 4 Stat Badges (lg:col-span-9) -->
            <div class="lg:col-span-9 grid grid-cols-2 sm:grid-cols-4 gap-4">
                
                <!-- Stat 1: 10,000+ Beneficiaries -->
                <div class="bg-white/90 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-gray-100 flex items-center space-x-3.5 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-lg bg-[#FF4081]/15 text-[#E91E63] flex items-center justify-center shrink-0">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-[#073B63] leading-none">10,000+</div>
                        <div class="text-xs font-bold text-gray-800 mt-1 leading-none">{{ site_t('stat_beneficiaries') }}</div>
                        <div class="text-[10px] text-gray-500 font-semibold mt-0.5">{{ site_t('stat_beneficiaries_sub') }}</div>
                    </div>
                </div>

                <!-- Stat 2: 100+ Projects Completed -->
                <div class="bg-white/90 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-gray-100 flex items-center space-x-3.5 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-lg bg-[#138A4B]/15 text-[#138A4B] flex items-center justify-center shrink-0">
                        <i data-lucide="file-check" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-[#073B63] leading-none">100+</div>
                        <div class="text-xs font-bold text-gray-800 mt-1 leading-none">{{ site_t('stat_projects') }}</div>
                        <div class="text-[10px] text-gray-500 font-semibold mt-0.5">{{ site_t('stat_projects_sub') }}</div>
                    </div>
                </div>

                <!-- Stat 3: 500+ Volunteers -->
                <div class="bg-white/90 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-gray-100 flex items-center space-x-3.5 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-lg bg-[#1E88E5]/15 text-[#1E88E5] flex items-center justify-center shrink-0">
                        <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-[#073B63] leading-none">500+</div>
                        <div class="text-xs font-bold text-gray-800 mt-1 leading-none">{{ site_t('stat_volunteers') }}</div>
                        <div class="text-[10px] text-gray-500 font-semibold mt-0.5">{{ site_t('stat_volunteers_sub') }}</div>
                    </div>
                </div>

                <!-- Stat 4: 50+ Villages / Areas Reached -->
                <div class="bg-white/90 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-gray-100 flex items-center space-x-3.5 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-lg bg-[#F58220]/15 text-[#F58220] flex items-center justify-center shrink-0">
                        <i data-lucide="map-pin" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-[#073B63] leading-none">50+</div>
                        <div class="text-xs font-bold text-gray-800 mt-1 leading-none">{{ site_t('stat_villages') }}</div>
                        <div class="text-[10px] text-gray-500 font-semibold mt-0.5">{{ site_t('stat_villages_sub') }}</div>
                    </div>
                </div>

            </div>

            <!-- Right Silhouette & Slogan (lg:col-span-3) -->
            <div class="lg:col-span-3 flex flex-col items-center lg:items-end justify-center text-center lg:text-right">
                <div class="handwritten-font text-2xl sm:text-3xl font-extrabold text-[#073B63] drop-shadow-sm whitespace-pre-line">
                    {{ site_t('impact_handwritten') }}
                </div>
                <!-- Silhouetted figures icon/artwork -->
                <div class="flex items-center space-x-1.5 mt-2 opacity-80 text-[#073B63]">
                    <i data-lucide="users" class="w-8 h-8"></i>
                    <i data-lucide="smile" class="w-6 h-6"></i>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- ==========================================
     4. FEATURED PROJECTS
=========================================== -->
<section class="py-10 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex items-center justify-between pb-6">
            <div class="flex items-center space-x-2.5">
                <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                    {{ site_t('projects_heading') }}
                </h2>
            </div>
            <a href="{{ route('projects.index') }}" class="text-xs sm:text-sm font-bold text-[#1E88E5] hover:text-[#073B63] border border-[#1E88E5]/30 hover:border-[#1E88E5] px-3.5 py-1.5 rounded-full transition">
                {{ site_t('btn_view_all_projects') }} →
            </a>
        </div>

        <!-- 5 Project Cards in a row on desktop matching reference -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            
            @if(isset($featuredProjects) && $featuredProjects->count() > 0)
                @foreach($featuredProjects as $project)
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ $project->featured_image ? asset($project->featured_image) : asset('images/projects/education.jpg') }}" 
                             alt="{{ $project->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-3.5 flex flex-col flex-grow">
                        <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition line-clamp-1">
                            {{ $project->title }}
                        </h3>
                        <div class="text-[11px] text-gray-500 font-medium mb-3 line-clamp-2">
                            {{ $project->short_description ?: ($project->focusArea ? $project->focusArea->title : '') }}
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('projects.show', $project->slug) }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                                {{ site_t('btn_learn_more') }} →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Project 1: Educational Support -->
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/projects/education.jpg') }}" alt="Educational Support" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-3.5 flex flex-col flex-grow">
                        <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                            {{ site_t('project_education_title') }}
                        </h3>
                        <div class="text-[11px] text-gray-500 font-medium mb-3">
                            {{ site_t('project_education_sub') }}
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                                {{ site_t('btn_learn_more') }} →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 2: Health Camps -->
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/projects/health.jpg') }}" alt="Health Camps" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-3.5 flex flex-col flex-grow">
                        <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                            {{ site_t('project_health_title') }}
                        </h3>
                        <div class="text-[11px] text-gray-500 font-medium mb-3">
                            {{ site_t('project_health_sub') }}
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                                {{ site_t('btn_learn_more') }} →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 3: Women Empowerment -->
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/projects/women.jpg') }}" alt="Women Empowerment" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-3.5 flex flex-col flex-grow">
                        <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                            {{ site_t('project_women_title') }}
                        </h3>
                        <div class="text-[11px] text-gray-500 font-medium mb-3">
                            {{ site_t('project_women_sub') }}
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                                {{ site_t('btn_learn_more') }} →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 4: Tree Plantation -->
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/projects/tree.jpg') }}" alt="Tree Plantation" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-3.5 flex flex-col flex-grow">
                        <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                            {{ site_t('project_tree_title') }}
                        </h3>
                        <div class="text-[11px] text-gray-500 font-medium mb-3">
                            {{ site_t('project_tree_sub') }}
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                                {{ site_t('btn_learn_more') }} →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 5: Rural Development -->
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/projects/rural.jpg') }}" alt="Rural Development" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-3.5 flex flex-col flex-grow">
                        <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                            {{ site_t('project_rural_title') }}
                        </h3>
                        <div class="text-[11px] text-gray-500 font-medium mb-3">
                            {{ site_t('project_rural_sub') }}
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                                {{ site_t('btn_learn_more') }} →
                            </a>
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </div>
</section>


<!-- ==========================================
     5. SUCCESS STORIES + SUPPORT OUR CAUSE (देणगी द्या)
=========================================== -->
<section class="py-10 bg-[#F9FBFA] border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- LEFT COLUMN: Success Stories (lg:col-span-6) -->
            <div class="lg:col-span-6 space-y-4">
                <!-- Header -->
                <div class="flex items-center space-x-2.5">
                    <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                    <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                        {{ site_t('stories_heading') }}
                    </h2>
                </div>

                <!-- Featured Story Card matching reference -->
                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm relative flex flex-col sm:flex-row items-center gap-5">
                    <!-- Left Arrow Button -->
                    <button class="hidden sm:flex absolute -left-3.5 top-1/2 -translate-y-1/2 w-7 h-7 rounded-full bg-white border border-gray-200 shadow-sm items-center justify-center text-gray-600 hover:bg-gray-50 transition" aria-label="Previous story">
                        <i data-lucide="chevron-left" class="w-4 h-4"></i>
                    </button>

                    <!-- Portrait with Circular/Rounded Framing -->
                    <div class="w-36 h-36 sm:w-40 sm:h-40 rounded-full overflow-hidden border-4 border-white shadow-md bg-gray-100 shrink-0">
                        <img src="{{ asset('images/stories/arya-patil.jpg') }}" alt="Devansh Foundation Success Story" class="w-full h-full object-cover">
                    </div>

                    <!-- Testimonial Content -->
                    <div class="space-y-3 text-left">
                        <div class="text-xs sm:text-sm text-gray-700 leading-relaxed italic font-medium">
                            {{ site_t('story_quote_sample') }}
                        </div>
                        <div class="text-xs sm:text-sm font-bold text-[#073B63]">
                            {{ site_t('story_author_sample') }}
                        </div>
                        <div class="pt-1">
                            <a href="{{ route('stories.index') }}" class="inline-flex items-center space-x-1 px-4 py-2 rounded-md bg-[#F58220] hover:bg-[#DC6F13] text-white text-xs font-bold shadow-sm transition">
                                <span>{{ site_t('btn_read_story') }} →</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Arrow Button -->
                    <button class="hidden sm:flex absolute -right-3.5 top-1/2 -translate-y-1/2 w-7 h-7 rounded-full bg-white border border-gray-200 shadow-sm items-center justify-center text-gray-600 hover:bg-gray-50 transition" aria-label="Next story">
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </button>
                </div>

                <!-- Carousel Dots Indicator -->
                <div class="flex justify-center space-x-1.5 pt-1">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#073B63]"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                </div>
            </div>

            <!-- RIGHT COLUMN: Support Our Cause (lg:col-span-6) -->
            <div class="lg:col-span-6 space-y-4" x-data="{ donationType: 'one-time', amount: '1000', customAmount: '' }">
                <!-- Header -->
                <div class="flex items-center space-x-2.5">
                    <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                    <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                        {{ site_t('donate_heading') }}
                    </h2>
                </div>

                <div class="text-xs sm:text-sm text-gray-600 font-medium">
                    {{ site_t('donate_subheading') }}
                </div>

                <!-- Donation Card with Tabs & QR Code Area matching reference -->
                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm grid grid-cols-1 md:grid-cols-12 gap-5">
                    
                    <!-- Left: Amounts & Action Button (md:col-span-8) -->
                    <div class="md:col-span-8 space-y-4">
                        <!-- Frequency Tabs -->
                        <div class="flex items-center space-x-2">
                            <button @click="donationType = 'one-time'" 
                                     type="button"
                                     class="px-3.5 py-1.5 rounded-full text-xs font-bold transition"
                                     :class="donationType === 'one-time' ? 'bg-[#F58220] text-white shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">
                                {{ site_t('donate_onetime') }}
                            </button>
                            <button @click="donationType = 'monthly'" 
                                     type="button"
                                     class="px-3.5 py-1.5 rounded-full text-xs font-bold transition"
                                     :class="donationType === 'monthly' ? 'bg-[#F58220] text-white shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">
                                {{ site_t('donate_monthly') }}
                            </button>
                        </div>

                        <!-- Amount Selector Pills -->
                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                            <button @click="amount = '500'; customAmount = ''" 
                                    type="button"
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === '500' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                ₹ 500
                            </button>
                            <button @click="amount = '1000'; customAmount = ''" 
                                    type="button"
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === '1000' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                ₹ 1,000
                            </button>
                            <button @click="amount = '2500'; customAmount = ''" 
                                    type="button"
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === '2500' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                ₹ 2,500
                            </button>
                            <button @click="amount = '5000'; customAmount = ''" 
                                    type="button"
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === '5000' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                ₹ 5,000
                            </button>
                            <button @click="amount = 'custom'" 
                                    type="button"
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === 'custom' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                {{ site_t('donate_custom_label') }}
                            </button>
                        </div>

                        <!-- Big Orange Donate Button -->
                        <a href="{{ route('donate') }}" class="w-full inline-flex items-center justify-center space-x-2 py-3 rounded-lg text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-md transition text-sm">
                            <span>{{ site_t('btn_donate') }} →</span>
                        </a>

                        <!-- Payment Brand Icons -->
                        <div class="pt-1 flex items-center justify-start space-x-3 text-xs text-gray-400">
                            <span class="font-extrabold text-gray-700 tracking-wider">UPI</span>
                            <span class="font-bold text-[#1A1F71] italic text-sm">VISA</span>
                            <span class="font-bold text-[#EB001B]">mastercard</span>
                            <span class="font-extrabold text-[#097939]">RuPay</span>
                            <span class="font-medium text-gray-500">Net Banking</span>
                        </div>
                    </div>

                    <!-- Right: UPI QR Code & Trust Information (md:col-span-4) -->
                    <div class="md:col-span-4 flex flex-col items-center justify-center border-t md:border-t-0 md:border-l border-gray-100 pt-4 md:pt-0 md:pl-4 text-center">
                        <div class="text-[11px] font-bold text-gray-700 mb-1.5">{{ site_t('donate_upi_qr') }}</div>
                        
                        <!-- Real QR Code SVG Graphic -->
                        <div class="w-24 h-24 p-1 bg-white border border-gray-200 rounded-lg shadow-sm">
                            <svg class="w-full h-full text-black" viewBox="0 0 29 29" fill="currentColor">
                                <path d="M0 0h9v9H0zm2 2v5h5V2zm18-2h9v9h-9zm2 2v5h5V2zM0 20h9v9H0zm2 2v5h5v-5zm12-20h2v4h-2zm0 6h2v2h-2zm4 0h2v2h-2zm-2 2h2v4h-2zm4 0h4v2h-4zm-4 4h2v2h-2zm6 0h2v2h-2zm-6 4h4v2h-4zm6 0h2v4h-2zm-12-6h2v2h-2zm0 4h2v2h-2zm4 0h2v2h-2zm0 4h2v2h-2zm-4 2h2v2h-2zm6 0h4v2h-4zm4-4h2v2h-2zm-14-6h2v2h-2zM4 4h1v1H4zm20 0h1v1h-1zM4 24h1v1H4z"/>
                            </svg>
                        </div>
                        
                        <div class="text-[10px] font-semibold text-gray-600 mt-1.5">
                            UPI ID: <span class="font-bold text-gray-800">devanshfoundation@upi</span>
                        </div>

                        <!-- Trust Badges -->
                        <div class="space-y-1 mt-2 text-[10px] text-gray-600 font-medium text-left w-full pl-2">
                            <div class="flex items-center space-x-1 text-[#138A4B]">
                                <i data-lucide="shield-check" class="w-3.5 h-3.5 shrink-0"></i>
                                <span>{{ site_t('donate_badge_80g') }}</span>
                            </div>
                            <div class="flex items-center space-x-1 text-[#138A4B]">
                                <i data-lucide="lock" class="w-3.5 h-3.5 shrink-0"></i>
                                <span>{{ site_t('donate_badge_secure') }}</span>
                            </div>
                            <div class="flex items-center space-x-1 text-[#138A4B]">
                                <i data-lucide="file-text" class="w-3.5 h-3.5 shrink-0"></i>
                                <span>{{ site_t('donate_badge_receipt') }}</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>


<!-- ==========================================
     6. PHOTO GALLERY + NEWS & UPDATES
=========================================== -->
<section class="py-10 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- LEFT COLUMN: Photo Gallery (lg:col-span-6) -->
            <div class="lg:col-span-6 space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2.5">
                        <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                        <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                            {{ site_t('gallery_heading') }}
                        </h2>
                    </div>
                    <a href="{{ route('gallery') }}" class="text-xs font-bold text-[#1E88E5] hover:text-[#073B63] border border-[#1E88E5]/30 hover:border-[#1E88E5] px-3 py-1 rounded-full transition">
                        {{ site_t('btn_view_gallery') }} →
                    </a>
                </div>

                <!-- 5 Gallery Thumbnails with Carousel Arrows matching reference -->
                <div class="relative bg-white rounded-xl p-2 border border-gray-200 shadow-sm">
                    <!-- Left Arrow -->
                    <button class="absolute -left-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center text-gray-600 hover:bg-gray-50 z-10" aria-label="Previous image">
                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                    </button>

                    <div class="grid grid-cols-5 gap-2">
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-1.jpg') }}" alt="Gallery 1" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-2.jpg') }}" alt="Gallery 2" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-3.jpg') }}" alt="Gallery 3" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-4.jpg') }}" alt="Gallery 4" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-5.jpg') }}" alt="Gallery 5" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                    </div>

                    <!-- Right Arrow -->
                    <button class="absolute -right-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center text-gray-600 hover:bg-gray-50 z-10" aria-label="Next image">
                        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                    </button>
                </div>

                <!-- Carousel Dots -->
                <div class="flex justify-center space-x-1.5 pt-1">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#073B63]"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                </div>
            </div>

            <!-- RIGHT COLUMN: News & Updates (lg:col-span-6) -->
            <div class="lg:col-span-6 space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2.5">
                        <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                        <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                            {{ site_t('news_heading') }}
                        </h2>
                    </div>
                    <a href="{{ route('about') }}" class="text-xs font-bold text-[#1E88E5] hover:text-[#073B63] border border-[#1E88E5]/30 hover:border-[#1E88E5] px-3 py-1 rounded-full transition">
                        {{ site_t('btn_view_all_news') }} →
                    </a>
                </div>

                <!-- 3 News Cards matching reference -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    
                    @if(isset($latestNews) && $latestNews->count() > 0)
                        @foreach($latestNews as $news)
                        <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition flex flex-col">
                            <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                                <img src="{{ $news->featured_image ? asset($news->featured_image) : asset('images/news/news-1.jpg') }}" 
                                     alt="{{ $news->title }}" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="p-2.5 flex flex-col flex-grow">
                                <div class="text-[10px] font-semibold text-gray-500 mb-1">
                                    {{ $news->published_at ? $news->published_at->format('d M Y') : date('d M Y') }}
                                </div>
                                <h3 class="text-xs font-bold text-[#073B63] leading-snug hover:text-[#138A4B] transition line-clamp-2">
                                    {{ $news->title }}
                                </h3>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Fallback 3 cards -->
                        <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition flex flex-col">
                            <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                                <img src="{{ asset('images/news/news-1.jpg') }}" alt="News 1" class="w-full h-full object-cover">
                            </div>
                            <div class="p-2.5 flex flex-col flex-grow">
                                <div class="text-[10px] font-semibold text-gray-500 mb-1">
                                    15 Sep 2026
                                </div>
                                <h3 class="text-xs font-bold text-[#073B63] leading-snug hover:text-[#138A4B] transition line-clamp-2">
                                    {{ site_t('project_tree_title') }}
                                </h3>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition flex flex-col">
                            <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                                <img src="{{ asset('images/news/news-2.jpg') }}" alt="News 2" class="w-full h-full object-cover">
                            </div>
                            <div class="p-2.5 flex flex-col flex-grow">
                                <div class="text-[10px] font-semibold text-gray-500 mb-1">
                                    10 Sep 2026
                                </div>
                                <h3 class="text-xs font-bold text-[#073B63] leading-snug hover:text-[#138A4B] transition line-clamp-2">
                                    {{ site_t('project_health_title') }}
                                </h3>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition flex flex-col">
                            <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                                <img src="{{ asset('images/news/news-3.jpg') }}" alt="News 3" class="w-full h-full object-cover">
                            </div>
                            <div class="p-2.5 flex flex-col flex-grow">
                                <div class="text-[10px] font-semibold text-gray-500 mb-1">
                                    05 Sep 2026
                                </div>
                                <h3 class="text-xs font-bold text-[#073B63] leading-snug hover:text-[#138A4B] transition line-clamp-2">
                                    {{ site_t('project_education_title') }}
                                </h3>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>


<!-- ==========================================
     7. GET INVOLVED CTA STRIP (Deep Green & Orange Block)
=========================================== -->
<section class="bg-[#0A482D] text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
            
            <!-- Left 5 Action Options (lg:col-span-8) -->
            <div class="lg:col-span-8 py-6 grid grid-cols-2 sm:grid-cols-5 gap-4">
                
                <!-- 1. Volunteer -->
                <a href="{{ route('volunteer') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="heart-handshake" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">{{ site_t('involve_volunteer') }}</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">{{ site_t('focus_tagline') }}</div>
                </a>

                <!-- 2. Partner With Us -->
                <a href="{{ route('partner') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="users" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">{{ site_t('involve_partner') }}</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">{{ site_t('org_name_first') }}</div>
                </a>

                <!-- 3. CSR Partnership -->
                <a href="{{ route('csr') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="briefcase" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">{{ site_t('involve_csr') }}</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">{{ site_t('donate_badge_80g') }}</div>
                </a>

                <!-- 4. Sponsor a Project -->
                <a href="{{ route('sponsor') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="gift" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">{{ site_t('involve_sponsor') }}</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">{{ site_t('hero_badge') }}</div>
                </a>

                <!-- 5. Fundraise With Us -->
                <a href="{{ route('fundraise') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="megaphone" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">{{ site_t('involve_fundraise') }}</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">{{ site_t('tagline') }}</div>
                </a>

            </div>

            <!-- Right Orange / Silhouette Campaign Block (lg:col-span-4) -->
            <div class="lg:col-span-4 bg-[#F58220] py-6 px-6 flex flex-col sm:flex-row lg:flex-col items-center justify-between text-center gap-3">
                <div class="flex items-center space-x-2">
                    <!-- Silhouettes -->
                    <div class="flex items-center space-x-1 text-white/90">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <div class="handwritten-font text-white text-2xl sm:text-3xl font-extrabold leading-none drop-shadow">
                        {{ site_t('final_cta_title') }}
                    </div>
                </div>

                <a href="{{ route('volunteer') }}" class="inline-flex items-center justify-center px-6 py-2.5 rounded-full bg-white text-[#F58220] hover:bg-gray-100 font-extrabold text-xs shadow-md transition transform hover:scale-105">
                    {{ site_t('btn_join_us') }} →
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
