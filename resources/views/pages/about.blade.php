@extends('layouts.app')

@php
    $currLocale = current_locale();
@endphp

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-16 sm:py-20 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <span>{{ site_t('about_badge') }}</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('about_title') }}
            </h1>
            <p class="text-lg text-gray-200 leading-relaxed">
                {{ site_t('tagline') }}
            </p>
        </div>
    </div>
</section>

<!-- Who We Are / Main Narrative -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-[#EAF7EF] text-[#138A4B] border border-[#138A4B]/20">
                    <span>{{ site_t('about_intro_badge') }}</span>
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#073B63] leading-tight">
                    {{ site_t('about_intro_heading') }}
                </h2>

                <div class="prose text-gray-600 text-base leading-relaxed space-y-4">
                    <p class="text-lg font-medium text-gray-800">
                        {{ site_t('about_content') }}
                    </p>
                    <p>
                        {{ site_t('about_sub_content') }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div class="bg-[#EEF6FB] p-4 rounded-xl border border-[#073B63]/10">
                        <div class="text-2xl font-black text-[#073B63]">10,000+</div>
                        <div class="text-xs text-gray-600 font-semibold mt-1">{{ site_t('stat_beneficiaries') }}</div>
                    </div>
                    <div class="bg-[#EAF7EF] p-4 rounded-xl border border-[#138A4B]/10">
                        <div class="text-2xl font-black text-[#138A4B]">50+</div>
                        <div class="text-xs text-gray-600 font-semibold mt-1">{{ site_t('stat_villages') }}</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="relative">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white aspect-[4/3]">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1000&q=80" alt="About Devansh Foundation" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl border border-gray-100 max-w-xs hidden sm:block">
                        <div class="flex items-center space-x-3 mb-2">
                            <div class="w-10 h-10 rounded-xl bg-[#138A4B] text-white flex items-center justify-center">
                                <i data-lucide="check" class="w-5 h-5"></i>
                            </div>
                            <div class="text-sm font-bold text-[#073B63]">{{ site_t('about_trust_badge') }}</div>
                        </div>
                        <p class="text-xs text-gray-500">{{ site_t('about_trust_sub') }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Vision & Mission Sections -->
<section class="py-16 bg-[#EEF6FB]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Vision Card -->
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 relative overflow-hidden flex flex-col justify-between">
                <div class="w-16 h-16 rounded-2xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center mb-6">
                    <i data-lucide="eye" class="w-8 h-8"></i>
                </div>
                <div class="space-y-4">
                    <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#EAF7EF] text-[#138A4B]">
                        <span>{{ site_t('vision_badge') }}</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#073B63]">
                        {{ site_t('vision_title') }}
                    </h3>
                    <p class="text-gray-700 text-base sm:text-lg leading-relaxed font-medium">
                        "{{ site_t('vision_content') }}"
                    </p>
                </div>
            </div>

            <!-- Mission Card -->
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 relative overflow-hidden flex flex-col justify-between">
                <div class="w-16 h-16 rounded-2xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center mb-6">
                    <i data-lucide="compass" class="w-8 h-8"></i>
                </div>
                <div class="space-y-4">
                    <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#EEF6FB] text-[#073B63]">
                        <span>{{ site_t('mission_badge') }}</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#073B63]">
                        {{ site_t('mission_title') }}
                    </h3>
                    <p class="text-gray-700 text-base sm:text-lg leading-relaxed font-medium">
                        "{{ site_t('mission_content') }}"
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Our Core Values -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#EAF7EF] text-[#138A4B] mb-3">
                <span>{{ site_t('core_values') }}</span>
            </div>
            <h2 class="text-3xl font-black text-[#073B63]">
                {{ site_t('core_values') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:border-[#138A4B]/30 transition">
                <div class="w-12 h-12 rounded-xl bg-[#138A4B] text-white flex items-center justify-center mb-4">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-[#073B63] mb-2">{{ site_t('value_trust') }}</h4>
                <p class="text-sm text-gray-600 leading-relaxed">{{ site_t('value_trust_desc') }}</p>
            </div>

            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:border-[#138A4B]/30 transition">
                <div class="w-12 h-12 rounded-xl bg-[#073B63] text-white flex items-center justify-center mb-4">
                    <i data-lucide="heart" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-[#073B63] mb-2">{{ site_t('value_empathy') }}</h4>
                <p class="text-sm text-gray-600 leading-relaxed">{{ site_t('value_empathy_desc') }}</p>
            </div>

            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:border-[#138A4B]/30 transition">
                <div class="w-12 h-12 rounded-xl bg-[#F58220] text-white flex items-center justify-center mb-4">
                    <i data-lucide="zap" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-[#073B63] mb-2">{{ site_t('value_empowerment') }}</h4>
                <p class="text-sm text-gray-600 leading-relaxed">{{ site_t('value_empowerment_desc') }}</p>
            </div>

            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:border-[#138A4B]/30 transition">
                <div class="w-12 h-12 rounded-xl bg-[#2E9E58] text-white flex items-center justify-center mb-4">
                    <i data-lucide="check-circle-2" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-[#073B63] mb-2">{{ site_t('value_integrity') }}</h4>
                <p class="text-sm text-gray-600 leading-relaxed">{{ site_t('value_integrity_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Transparency & Legal Governance Section -->
<section class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-200">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#EAF7EF] text-[#138A4B]">
                        <span>{{ site_t('reports_title') }}</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#073B63]">
                        {{ site_t('audit_transparency') }}
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        {{ site_t('reports_desc') }}
                    </p>
                </div>

                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3">
                    <a href="{{ route('reports') }}" class="w-full text-center py-3.5 px-6 rounded-xl bg-[#073B63] text-white font-bold text-sm hover:bg-[#052a47] transition flex items-center justify-center space-x-2">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                        <span>{{ site_t('nav_reports') }}</span>
                    </a>
                    <a href="{{ route('contact') }}" class="w-full text-center py-3.5 px-6 rounded-xl border border-gray-300 text-gray-700 font-bold text-sm hover:bg-gray-50 transition flex items-center justify-center space-x-2">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                        <span>{{ site_t('nav_contact') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
