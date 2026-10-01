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
            <span class="text-emerald-300 font-semibold">{{ site_t('breadcrumb_awards') }}</span>
        </nav>

        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <i data-lucide="trophy" class="w-3.5 h-3.5"></i>
                <span>{{ site_t('awards_hero_badge') }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('awards_hero_title') }}
            </h1>
            <p class="text-base sm:text-lg text-gray-200 leading-relaxed">
                {{ site_t('awards_hero_subtitle') }}
            </p>
        </div>
    </div>
</section>

<!-- Official Demo Notice Banner -->
<section class="bg-[#EEF6FB] border-b border-blue-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-5 sm:p-6 border border-blue-200 shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div class="flex items-start space-x-3.5">
                <div class="w-10 h-10 rounded-xl bg-amber-50 border border-amber-200 text-amber-600 flex items-center justify-center shrink-0 mt-0.5">
                    <i data-lucide="alert-circle" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-[#073B63]">
                        {{ site_t('awards_demo_notice_title') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-600 mt-1 leading-relaxed">
                        {{ site_t('awards_demo_notice_body') }}
                    </p>
                </div>
            </div>
            <div class="shrink-0">
                <span class="inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-amber-100/80 text-amber-800 border border-amber-300">
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                    <span>{{ site_t('awards_pending_badge') }}</span>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Awards Timeline & Grid Section -->
<section class="py-20 bg-[#F8FAFC]" x-data="{ activeAwardModal: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-[#EAF7EF] text-[#138A4B] border border-[#138A4B]/20 mb-3">
                <i data-lucide="medal" class="w-3.5 h-3.5"></i>
                <span>Honors & Milestones</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-[#073B63] tracking-tight">
                {{ site_t('awards_section_title') }}
            </h2>
            <p class="text-sm sm:text-base text-gray-600 mt-2">
                {{ site_t('awards_section_subheading') }}
            </p>
        </div>

        <!-- Awards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($awards as $award)
                <div class="bg-white rounded-3xl p-7 sm:p-8 shadow-sm hover:shadow-xl border border-gray-200/80 hover:border-[#138A4B]/40 transition duration-300 flex flex-col justify-between group relative overflow-hidden">
                    
                    <!-- Decorative corner badge -->
                    <div class="absolute -right-12 -top-12 w-28 h-28 bg-[#138A4B]/5 rounded-full group-hover:scale-150 transition duration-500 pointer-events-none"></div>

                    <div>
                        <!-- Header: Icon & Year Badge -->
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-14 h-14 rounded-2xl bg-[#EEF6FB] group-hover:bg-[#EAF7EF] text-[#073B63] group-hover:text-[#138A4B] flex items-center justify-center transition duration-300">
                                @if($award->icon === 'award')
                                    <i data-lucide="award" class="w-7 h-7"></i>
                                @elseif($award->icon === 'medal')
                                    <i data-lucide="medal" class="w-7 h-7"></i>
                                @elseif($award->icon === 'graduation-cap')
                                    <i data-lucide="graduation-cap" class="w-7 h-7"></i>
                                @elseif($award->icon === 'heart')
                                    <i data-lucide="heart" class="w-7 h-7"></i>
                                @else
                                    <i data-lucide="trophy" class="w-7 h-7"></i>
                                @endif
                            </div>

                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#073B63] text-white">
                                    {{ $award->year }}
                                </span>
                                @if($award->is_demo)
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                        DEMO
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="text-xs font-bold text-[#138A4B] uppercase tracking-wider mb-1.5">
                            {{ $award->t('category_name') }}
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-[#073B63] group-hover:text-[#138A4B] transition leading-snug">
                            {{ $award->t('title') }}
                        </h3>

                        <!-- Conferred by -->
                        @if($award->t('conferred_by'))
                            <div class="flex items-center text-xs text-gray-500 font-medium mt-2">
                                <i data-lucide="check" class="w-3.5 h-3.5 text-[#138A4B] mr-1.5"></i>
                                <span>{{ site_t('awards_conferred_by') }}: <strong>{{ $award->t('conferred_by') }}</strong></span>
                            </div>
                        @endif

                        <!-- Description -->
                        <p class="text-xs sm:text-sm text-gray-600 mt-4 leading-relaxed">
                            {{ $award->t('description') }}
                        </p>
                    </div>

                    <!-- Card Footer -->
                    <div class="mt-6 pt-5 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="flex items-center space-x-1.5 text-xs text-amber-700">
                            <i data-lucide="clock" class="w-3.5 h-3.5 shrink-0"></i>
                            <span>{{ site_t('awards_pending_badge') }}</span>
                        </div>

                        <button @click="activeAwardModal = {
                            title: '{{ addslashes($award->t('title')) }}',
                            year: '{{ $award->year }}',
                            category: '{{ addslashes($award->t('category_name')) }}',
                            conferredBy: '{{ addslashes($award->t('conferred_by')) }}',
                            desc: '{{ addslashes($award->t('description')) }}',
                            isDemo: {{ $award->is_demo ? 'true' : 'false' }}
                        }"
                        type="button"
                        class="inline-flex items-center justify-center space-x-1.5 px-4 py-2 rounded-xl text-xs font-bold bg-[#EAF7EF] hover:bg-[#138A4B] text-[#138A4B] hover:text-white transition">
                            <i data-lucide="file-badge" class="w-3.5 h-3.5"></i>
                            <span>{{ site_t('awards_view_certificate') }}</span>
                        </button>
                    </div>

                </div>
            @empty
                <div class="col-span-full py-12 text-center text-gray-500">
                    No awards currently recorded.
                </div>
            @endforelse
        </div>

    </div>

    <!-- Award Details Modal -->
    <div x-show="activeAwardModal !== null" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" 
         style="display: none;"
         @keydown.escape.window="activeAwardModal = null">
        
        <div @click.away="activeAwardModal = null" 
             class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-gray-100 relative">
            
            <button @click="activeAwardModal = null" class="absolute top-5 right-5 text-gray-400 hover:text-gray-600 p-1">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>

            <div class="w-14 h-14 rounded-2xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center mb-4">
                <i data-lucide="trophy" class="w-7 h-7"></i>
            </div>

            <template x-if="activeAwardModal">
                <div>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-[#073B63] text-white" x-text="activeAwardModal.year"></span>
                        <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-amber-100 text-amber-800 border border-amber-200">
                            {{ site_t('awards_demo_badge') }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-[#073B63]" x-text="activeAwardModal.title"></h3>
                    <p class="text-xs text-[#138A4B] font-bold mt-1 uppercase tracking-wider" x-text="activeAwardModal.category"></p>

                    <div class="mt-4 p-4 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-900 leading-relaxed">
                        <div class="font-bold flex items-center mb-1">
                            <i data-lucide="info" class="w-3.5 h-3.5 mr-1.5 shrink-0"></i>
                            <span>{{ site_t('awards_pending_badge') }}</span>
                        </div>
                        <p>{{ site_t('awards_demo_notice_body') }}</p>
                    </div>

                    <div class="mt-4 space-y-2 text-sm text-gray-600">
                        <p class="text-xs font-semibold text-gray-700" x-text="'Conferred by: ' + (activeAwardModal.conferredBy || 'State/Regional Forum')"></p>
                        <p class="text-xs text-gray-500 leading-relaxed" x-text="activeAwardModal.desc"></p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-end">
                        <button @click="activeAwardModal = null" type="button" class="px-5 py-2 rounded-xl text-xs font-bold bg-[#073B63] hover:bg-[#062c4a] text-white transition">
                            {{ site_t('transparency_close_modal') }}
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

@endsection
