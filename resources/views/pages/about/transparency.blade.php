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
            <span class="text-emerald-300 font-semibold">{{ site_t('breadcrumb_transparency') }}</span>
        </nav>

        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                <span>{{ site_t('transparency_hero_badge') }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('transparency_hero_title') }}
            </h1>
            <p class="text-base sm:text-lg text-gray-200 leading-relaxed">
                {{ site_t('transparency_hero_subtitle') }}
            </p>
        </div>
    </div>
</section>

<!-- Official Disclosure & Demo Notice Banner -->
<section class="bg-[#EEF6FB] border-b border-blue-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-5 sm:p-6 border border-blue-200 shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div class="flex items-start space-x-3.5">
                <div class="w-10 h-10 rounded-xl bg-amber-50 border border-amber-200 text-amber-600 flex items-center justify-center shrink-0 mt-0.5">
                    <i data-lucide="alert-circle" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-[#073B63]">
                        {{ site_t('transparency_notice_title') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-600 mt-1 leading-relaxed">
                        {{ site_t('transparency_notice_body') }}
                    </p>
                </div>
            </div>
            <div class="shrink-0">
                <span class="inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-amber-100/80 text-amber-800 border border-amber-300">
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                    <span>{{ site_t('transparency_pending_badge') }}</span>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Our Commitment to Transparency Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-[#EAF7EF] text-[#138A4B] border border-[#138A4B]/20 mb-3">
                <i data-lucide="award" class="w-3.5 h-3.5"></i>
                <span>{{ site_t('transparency_commitment_badge') }}</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#073B63] tracking-tight">
                {{ site_t('transparency_commitment_title') }}
            </h2>
            <p class="text-sm sm:text-base text-gray-600 mt-2">
                {{ site_t('transparency_commitment_subtitle') }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Pillar 1 -->
            <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                    <i data-lucide="hand-coins" class="w-6 h-6"></i>
                </div>
                <h3 class="text-base font-bold text-[#073B63] mb-2">{{ site_t('transparency_pill_1_title') }}</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ site_t('transparency_pill_1_desc') }}</p>
            </div>

            <!-- Pillar 2 -->
            <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                    <i data-lucide="clipboard-check" class="w-6 h-6"></i>
                </div>
                <h3 class="text-base font-bold text-[#073B63] mb-2">{{ site_t('transparency_pill_2_title') }}</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ site_t('transparency_pill_2_desc') }}</p>
            </div>

            <!-- Pillar 3 -->
            <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#FEF4EC] text-[#F58220] flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                    <i data-lucide="scale" class="w-6 h-6"></i>
                </div>
                <h3 class="text-base font-bold text-[#073B63] mb-2">{{ site_t('transparency_pill_3_title') }}</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ site_t('transparency_pill_3_desc') }}</p>
            </div>

            <!-- Pillar 4 -->
            <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                    <i data-lucide="file-text" class="w-6 h-6"></i>
                </div>
                <h3 class="text-base font-bold text-[#073B63] mb-2">{{ site_t('transparency_pill_4_title') }}</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ site_t('transparency_pill_4_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Documents Grid Section (Alpine Modal Support) -->
<section class="py-16 bg-[#F8FAFC] border-t border-gray-100" x-data="{ activeModalDoc: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#073B63]">
                    {{ site_t('transparency_documents_heading') }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    {{ site_t('transparency_documents_subheading') }}
                </p>
            </div>
            <div class="text-xs text-gray-500 font-medium">
                {{ $documents->count() }} {{ site_t('nav_reports') }} / Documents Listed
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($documents as $doc)
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200/80 hover:shadow-md hover:border-[#138A4B]/40 transition duration-300 flex flex-col justify-between relative group">
                    
                    <!-- Top Icon & Badges -->
                    <div>
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-[#EEF6FB] group-hover:bg-[#EAF7EF] text-[#073B63] group-hover:text-[#138A4B] flex items-center justify-center transition duration-300">
                                @if($doc->icon === 'file-badge')
                                    <i data-lucide="award" class="w-6 h-6"></i>
                                @elseif($doc->icon === 'file-check')
                                    <i data-lucide="file-check-2" class="w-6 h-6"></i>
                                @elseif($doc->icon === 'credit-card')
                                    <i data-lucide="credit-card" class="w-6 h-6"></i>
                                @elseif($doc->icon === 'landmark')
                                    <i data-lucide="landmark" class="w-6 h-6"></i>
                                @elseif($doc->icon === 'percent')
                                    <i data-lucide="percent" class="w-6 h-6"></i>
                                @elseif($doc->icon === 'book-open')
                                    <i data-lucide="book-open" class="w-6 h-6"></i>
                                @elseif($doc->icon === 'pie-chart')
                                    <i data-lucide="pie-chart" class="w-6 h-6"></i>
                                @else
                                    <i data-lucide="file-text" class="w-6 h-6"></i>
                                @endif
                            </div>

                            @if($doc->is_demo)
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200" title="{{ site_t('transparency_demo_badge') }}">
                                    DEMO
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    VERIFIED
                                </span>
                            @endif
                        </div>

                        <!-- Document Title -->
                        <h3 class="text-base font-bold text-[#073B63] group-hover:text-[#138A4B] transition leading-snug line-clamp-2">
                            {{ $doc->t('title') }}
                        </h3>

                        <!-- Short Description -->
                        <p class="text-xs text-gray-600 mt-2 line-clamp-3 leading-relaxed">
                            {{ $doc->t('short_description') }}
                        </p>
                    </div>

                    <!-- Bottom Status & Actions -->
                    <div class="mt-6 pt-4 border-t border-gray-100 space-y-3">
                        <div class="flex items-center space-x-1.5 text-[11px] text-amber-700 bg-amber-50/80 px-2.5 py-1 rounded-md border border-amber-200/60 font-medium">
                            <i data-lucide="clock" class="w-3 h-3 shrink-0"></i>
                            <span class="truncate">{{ site_t('transparency_pending_badge') }}</span>
                        </div>

                        <div class="grid grid-cols-2 gap-2 pt-1">
                            <button @click="activeModalDoc = {
                                title: '{{ addslashes($doc->t('title')) }}',
                                desc: '{{ addslashes($doc->t('description')) }}',
                                shortDesc: '{{ addslashes($doc->t('short_description')) }}',
                                isDemo: {{ $doc->is_demo ? 'true' : 'false' }},
                                type: '{{ $doc->document_type }}'
                            }" 
                            type="button"
                            class="w-full inline-flex items-center justify-center space-x-1 text-xs font-semibold py-2 px-2.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition">
                                <i data-lucide="info" class="w-3.5 h-3.5"></i>
                                <span>{{ site_t('transparency_view_document') }}</span>
                            </button>

                            <button @click="activeModalDoc = {
                                title: '{{ addslashes($doc->t('title')) }}',
                                desc: '{{ addslashes($doc->t('description')) }}',
                                shortDesc: '{{ addslashes($doc->t('short_description')) }}',
                                isDemo: {{ $doc->is_demo ? 'true' : 'false' }},
                                type: '{{ $doc->document_type }}'
                            }"
                            type="button"
                            class="w-full inline-flex items-center justify-center space-x-1 text-xs font-semibold py-2 px-2.5 rounded-lg bg-[#EAF7EF] hover:bg-[#138A4B] text-[#138A4B] hover:text-white transition">
                                <i data-lucide="download" class="w-3.5 h-3.5"></i>
                                <span>PDF</span>
                            </button>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full py-12 text-center text-gray-500">
                    No documents currently listed.
                </div>
            @endforelse
        </div>

    </div>

    <!-- Document Info & Demo Verification Modal -->
    <div x-show="activeModalDoc !== null" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" 
         style="display: none;"
         @keydown.escape.window="activeModalDoc = null">
        
        <div @click.away="activeModalDoc = null" 
             class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-gray-100 relative">
            
            <button @click="activeModalDoc = null" class="absolute top-5 right-5 text-gray-400 hover:text-gray-600 p-1">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>

            <div class="w-12 h-12 rounded-2xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center mb-4">
                <i data-lucide="file-text" class="w-6 h-6"></i>
            </div>

            <template x-if="activeModalDoc">
                <div>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-amber-100 text-amber-800 border border-amber-200">
                            {{ site_t('transparency_demo_badge') }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-[#073B63]" x-text="activeModalDoc.title"></h3>
                    <p class="text-xs text-gray-500 mt-1 uppercase tracking-wider font-semibold" x-text="'Document Type: ' + activeModalDoc.type"></p>
                    
                    <div class="mt-4 p-4 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-900 leading-relaxed">
                        <div class="font-bold flex items-center mb-1">
                            <i data-lucide="info" class="w-3.5 h-3.5 mr-1.5 shrink-0"></i>
                            <span>{{ site_t('transparency_pending_badge') }}</span>
                        </div>
                        <p>{{ site_t('transparency_modal_notice') }}</p>
                    </div>

                    <div class="mt-4 space-y-2 text-sm text-gray-600">
                        <p class="font-medium text-gray-800" x-text="activeModalDoc.shortDesc"></p>
                        <p class="text-xs text-gray-500 leading-relaxed" x-text="activeModalDoc.desc"></p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('contact') }}" class="text-xs font-bold text-[#138A4B] hover:underline">
                            Request verification info &rarr;
                        </a>
                        <button @click="activeModalDoc = null" type="button" class="px-4 py-2 rounded-xl text-xs font-bold bg-[#073B63] hover:bg-[#062c4a] text-white transition">
                            {{ site_t('transparency_close_modal') }}
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

@endsection
