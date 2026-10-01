@extends('layouts.app')

@section('content')

<!-- Hero Banner with Breadcrumbs -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-14 sm:py-18 relative overflow-hidden">
    <!-- Decorative background glow -->
    <div class="absolute -right-20 -top-20 w-96 h-96 bg-[#138A4B]/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -left-20 -bottom-20 w-96 h-96 bg-[#F58220]/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center space-x-2 text-xs sm:text-sm text-gray-300 mb-4" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white transition flex items-center">
                <i data-lucide="home" class="w-3.5 h-3.5 mr-1"></i>
                {{ site_t('breadcrumb_home') }}
            </a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('about') }}" class="hover:text-white transition">
                {{ site_t('breadcrumb_about') }}
            </a>
            <span class="text-gray-400">/</span>
            <span class="text-emerald-300 font-semibold">{{ site_t('breadcrumb_team') }}</span>
        </nav>

        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <i data-lucide="users" class="w-3.5 h-3.5"></i>
                <span>{{ site_t('team_hero_badge') }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('team_hero_title') }}
            </h1>
            <p class="text-base sm:text-lg text-gray-200 leading-relaxed">
                {{ site_t('team_hero_subtitle') }}
            </p>
        </div>
    </div>
</section>

<!-- "Together, We Create Change" Pillars -->
<section class="py-16 bg-[#EEF6FB] border-b border-blue-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-[#EAF7EF] text-[#138A4B] border border-[#138A4B]/20 mb-3">
                <i data-lucide="heart-handshake" class="w-3.5 h-3.5"></i>
                <span>{{ site_t('team_together_badge') }}</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#073B63] tracking-tight">
                {{ site_t('team_together_title') }}
            </h2>
            <p class="text-sm sm:text-base text-gray-600 mt-2">
                {{ site_t('team_together_subtitle') }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Pillar 1 -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                    <i data-lucide="award" class="w-6 h-6"></i>
                </div>
                <h3 class="text-base font-bold text-[#073B63] mb-2">{{ site_t('team_pillar_1_title') }}</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ site_t('team_pillar_1_desc') }}</p>
            </div>

            <!-- Pillar 2 -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                    <i data-lucide="sparkles" class="w-6 h-6"></i>
                </div>
                <h3 class="text-base font-bold text-[#073B63] mb-2">{{ site_t('team_pillar_2_title') }}</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ site_t('team_pillar_2_desc') }}</p>
            </div>

            <!-- Pillar 3 -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#FEF4EC] text-[#F58220] flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                    <i data-lucide="handshake" class="w-6 h-6"></i>
                </div>
                <h3 class="text-base font-bold text-[#073B63] mb-2">{{ site_t('team_pillar_3_title') }}</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ site_t('team_pillar_3_desc') }}</p>
            </div>

            <!-- Pillar 4 -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                    <i data-lucide="building" class="w-6 h-6"></i>
                </div>
                <h3 class="text-base font-bold text-[#073B63] mb-2">{{ site_t('team_pillar_4_title') }}</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ site_t('team_pillar_4_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Members Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <h2 class="text-2xl sm:text-4xl font-extrabold text-[#073B63] tracking-tight">
                {{ site_t('team_members_heading') }}
            </h2>
            <p class="text-sm sm:text-base text-gray-600 mt-2">
                {{ site_t('team_members_subheading') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($members as $member)
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 hover:border-[#138A4B]/30 transition duration-300 flex flex-col group">
                    
                    <!-- Portrait Image Frame -->
                    <div class="relative aspect-[4/3] bg-gray-100 overflow-hidden">
                        @if($member->photo)
                            <img src="{{ asset($member->photo) }}" 
                                 alt="{{ $member->t('name') }}" 
                                 class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#073B63]/10 to-[#138A4B]/10 text-gray-400">
                                <i data-lucide="user" class="w-16 h-16"></i>
                            </div>
                        @endif

                        <!-- Demo Tag -->
                        @if($member->is_demo)
                            <div class="absolute top-3 right-3">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/95 text-amber-800 shadow-sm border border-amber-200 backdrop-blur-sm">
                                    {{ site_t('team_demo_badge') }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Member Details -->
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <!-- Designation / Role -->
                            <div class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-[#EAF7EF] text-[#138A4B] mb-2">
                                {{ $member->t('role') }}
                            </div>

                            <!-- Name -->
                            <h3 class="text-xl font-bold text-[#073B63] group-hover:text-[#138A4B] transition">
                                {{ $member->t('name') }}
                            </h3>

                            <!-- Bio Description -->
                            <p class="text-xs sm:text-sm text-gray-600 mt-3 leading-relaxed">
                                {{ $member->t('bio') }}
                            </p>
                        </div>

                        <!-- Footer Meta / Status -->
                        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                            <span class="inline-flex items-center text-[#138A4B] font-semibold">
                                <i data-lucide="check-circle" class="w-3.5 h-3.5 mr-1"></i>
                                Active Coordinator
                            </span>
                            @if($member->email)
                                <a href="mailto:{{ $member->email }}" class="text-gray-400 hover:text-[#073B63] transition" title="Contact">
                                    <i data-lucide="mail" class="w-4 h-4"></i>
                                </a>
                            @else
                                <span class="text-gray-400 text-[11px]">Devansh Foundation</span>
                            @endif
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full py-12 text-center text-gray-500">
                    No team members currently listed.
                </div>
            @endforelse
        </div>

    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-14 bg-gradient-to-r from-[#073B63] to-[#138A4B] text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-3">
            {{ site_t('team_join_title') }}
        </h2>
        <p class="max-w-2xl mx-auto text-sm sm:text-base text-white/90 mb-8 leading-relaxed">
            {{ site_t('team_join_desc') }}
        </p>
        <div class="inline-flex flex-wrap items-center justify-center gap-4">
            <a href="{{ route('volunteer') }}" class="px-6 py-3 rounded-xl font-bold bg-[#F58220] hover:bg-[#DC6F13] text-white shadow-lg transition transform hover:-translate-y-0.5 inline-flex items-center space-x-2">
                <i data-lucide="user-plus" class="w-4 h-4"></i>
                <span>{{ site_t('team_join_btn') }}</span>
            </a>
            <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl font-bold bg-white/10 hover:bg-white/20 text-white border border-white/20 transition">
                {{ site_t('nav_contact') }}
            </a>
        </div>
    </div>
</section>

@endsection
