@extends('layouts.app')

@php
    $caseTitle = $case->t('title') ?: $case->beneficiary_name;
    $urgentMsg = $case->t('urgent_message') ?: $case->urgent_message;
    $caseDesc = $case->t('description') ?: $case->description;
    $expenseLabel = $case->t('expense_label') ?: ($case->expense_label ?: site_t('cases_treatment_expense'));
    $categoryName = $case->t('category_name') ?: ucfirst($case->category);
    $donateUrl = route('donate', ['case' => $case->slug]);
@endphp

@section('title', $caseTitle . ' | ' . site_t('org_name'))
@section('meta_description', Str::limit(strip_tags($caseDesc ?: $urgentMsg), 160))

@section('content')

<!-- Breadcrumb Navigation & Back Link -->
<div class="bg-gray-50 border-b border-gray-100 py-3.5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <nav class="flex items-center space-x-2 text-xs font-semibold text-gray-500 overflow-hidden">
                <a href="{{ route('home') }}" class="hover:text-[#138A4B] shrink-0">{{ site_t('nav_home') }}</a>
                <span>/</span>
                <a href="{{ route('home') }}#help-us-now" class="hover:text-[#138A4B] shrink-0">{{ site_t('help_us_now_label') }}</a>
                <span>/</span>
                <span class="text-[#073B63] truncate">{{ $caseTitle }}</span>
            </nav>

            <a href="{{ route('home') }}#help-us-now" class="inline-flex items-center space-x-1.5 text-xs font-bold text-[#1E653F] hover:text-[#164E30] transition self-start sm:self-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>{{ site_t('btn_back_to_cases') }}</span>
            </a>
        </div>
    </div>
</div>

<div class="py-10 lg:py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($case->is_demo)
        <!-- Demo Case Disclaimer Alert -->
        <div class="mb-8 rounded-2xl bg-amber-50 border border-amber-200/80 p-4 sm:p-5 flex items-start space-x-3.5 shadow-xs">
            <div class="w-9 h-9 rounded-full bg-amber-100 text-amber-800 flex items-center justify-center shrink-0 mt-0.5">
                <i data-lucide="info" class="w-5 h-5"></i>
            </div>
            <div>
                <div class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full bg-amber-200 text-amber-900 text-[10px] font-black uppercase tracking-wider mb-1">
                    <span>{{ site_t('cases_demo_badge') }}</span>
                </div>
                <p class="text-xs sm:text-sm text-amber-900 font-medium leading-relaxed">
                    {{ site_t('cases_demo_alert') }}
                </p>
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- Main Content (8 cols) -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- Large Photograph with Badges -->
                <div class="aspect-[16/10] rounded-3xl overflow-hidden shadow-md bg-gray-100 border border-gray-100 relative group">
                    <img src="{{ asset($case->image ?: 'images/cases/case-1-baby-nicu.jpg') }}" 
                         alt="{{ $caseTitle }}" 
                         class="w-full h-full object-cover">
                    
                    <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                        <span class="inline-flex items-center space-x-1 px-3 py-1.5 rounded-full bg-white/95 backdrop-blur-sm text-[#1E653F] text-xs font-bold shadow-sm">
                            <span>{{ $categoryName }}</span>
                        </span>

                        @if($case->is_demo)
                        <span class="inline-flex items-center space-x-1 px-3 py-1.5 rounded-full bg-amber-500 text-white text-xs font-black uppercase tracking-wider shadow-sm">
                            <span>{{ site_t('cases_demo_badge') }}</span>
                        </span>
                        @endif
                    </div>
                </div>

                <!-- Title & Urgent Message -->
                <div class="space-y-3">
                    <div class="inline-flex items-center space-x-2 text-xs font-black uppercase tracking-wider text-[#1E653F]">
                        <span class="w-2 h-4 bg-[#1E653F] rounded-full inline-block"></span>
                        <span>{{ site_t('cases_support_urgent') }}</span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-gray-900 leading-tight">
                        {{ $caseTitle }}
                    </h1>

                    @if($urgentMsg)
                    <p class="text-sm sm:text-base font-bold text-[#8C5824] bg-[#FAF8F3] border border-[#EFEBE4] rounded-2xl p-3.5 sm:p-4">
                        {{ $urgentMsg }}
                    </p>
                    @endif
                </div>

                <!-- Structured Case Details Grid -->
                <div class="bg-[#FAF8F3] rounded-3xl p-5 sm:p-6 border border-[#EFEBE4] space-y-4">
                    <h3 class="text-base font-black text-[#8C5824] uppercase tracking-wider">
                        {{ site_t('cases_details_heading') }}
                    </h3>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                        <div class="bg-white rounded-2xl p-3 border border-[#EFEBE4]">
                            <span class="text-[10px] uppercase font-bold text-gray-400 block">{{ site_t('cases_beneficiary') }}</span>
                            <span class="text-xs sm:text-sm font-black text-[#073B63] mt-0.5 block truncate">{{ $case->beneficiary_name }}</span>
                        </div>

                        <div class="bg-white rounded-2xl p-3 border border-[#EFEBE4]">
                            <span class="text-[10px] uppercase font-bold text-gray-400 block">{{ site_t('cases_category') }}</span>
                            <span class="text-xs sm:text-sm font-black text-[#1E653F] mt-0.5 block truncate">{{ $categoryName }}</span>
                        </div>

                        <div class="bg-white rounded-2xl p-3 border border-[#EFEBE4]">
                            <span class="text-[10px] uppercase font-bold text-gray-400 block">{{ site_t('cases_treatment_expense') }}</span>
                            <span class="text-xs sm:text-sm font-black text-gray-800 mt-0.5 block truncate">{{ $expenseLabel }}</span>
                        </div>

                        <div class="bg-white rounded-2xl p-3 border border-[#EFEBE4]">
                            <span class="text-[10px] uppercase font-bold text-gray-400 block">{{ site_t('cases_status') }}</span>
                            <span class="text-xs sm:text-sm font-black text-[#138A4B] mt-0.5 block">{{ site_t('cases_status_active') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Case Full Description -->
                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <h2 class="text-xl sm:text-2xl font-black text-[#073B63] border-b pb-2">
                        {{ site_t('cases_about_heading') }}
                    </h2>
                    
                    <div class="text-sm sm:text-base space-y-3 font-medium text-gray-700">
                        @if($caseDesc)
                            <p class="whitespace-pre-line">{{ $caseDesc }}</p>
                        @else
                            <p>{{ $urgentMsg ?: $caseTitle }}</p>
                        @endif
                    </div>
                </div>

                <!-- 80G Tax Exemption Notice -->
                <div class="rounded-2xl bg-[#EAF7EF] border border-[#138A4B]/20 p-5 flex items-start space-x-4">
                    <div class="w-10 h-10 rounded-full bg-[#138A4B] text-white flex items-center justify-center shrink-0">
                        <i data-lucide="shield-check" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#0D5C3A]">{{ site_t('cases_tax_benefit_title') }}</h4>
                        <p class="text-xs text-gray-700 mt-1 leading-relaxed">
                            {{ site_t('cases_tax_benefit_desc') }}
                        </p>
                    </div>
                </div>

            </div>

            <!-- Sticky Donation Sidebar (4 cols) -->
            <div class="lg:col-span-4">
                <div class="sticky top-24 bg-white rounded-3xl border border-gray-200/90 shadow-lg p-6 sm:p-8 space-y-6">

                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">
                            {{ site_t('cases_support_goal') }}
                        </div>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-3xl font-black text-[#1E653F]">{{ $case->formatted_collected_amount }}</span>
                            <span class="text-sm font-semibold text-gray-500">{{ site_t('cases_raised_of') }} {{ $case->formatted_target_amount }}</span>
                        </div>

                        <!-- Progress Bar Track -->
                        <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden mt-3 mb-2">
                            <div class="h-full bg-gradient-to-r from-[#138A4B] to-[#1E653F] rounded-full transition-all duration-700" 
                                 style="width: {{ $case->progress_percentage }}%"></div>
                        </div>
                        <div class="flex justify-between text-xs font-bold text-gray-600">
                            <span>{{ round($case->progress_percentage) }}% {{ site_t('cases_progress') }}</span>
                            <span>{{ site_t('cases_remaining_label') }}: {{ $case->formatted_remaining_amount }}</span>
                        </div>
                    </div>

                    <!-- Direct Donation CTA -->
                    <div class="pt-2">
                        <a href="{{ $donateUrl }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 py-3.5 px-6 rounded-xl text-white font-black bg-[#1E653F] hover:bg-[#164E30] shadow-md hover:shadow-lg transition text-base">
                            <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            <span>{{ site_t('btn_donate_now_heart') }} →</span>
                        </a>
                    </div>

                    <!-- Trust Points -->
                    <div class="border-t border-gray-100 pt-4 space-y-3 text-xs text-gray-600 font-semibold">
                        <div class="flex items-center space-x-2 text-[#073B63]">
                            <i data-lucide="check-circle" class="w-4 h-4 text-[#138A4B]"></i>
                            <span>100% Direct Field Care & Assistance</span>
                        </div>
                        <div class="flex items-center space-x-2 text-[#073B63]">
                            <i data-lucide="file-text" class="w-4 h-4 text-[#138A4B]"></i>
                            <span>Instant 80G Tax Exemption Certificate</span>
                        </div>
                        <div class="flex items-center space-x-2 text-[#073B63]">
                            <i data-lucide="lock" class="w-4 h-4 text-[#138A4B]"></i>
                            <span>Secure & Verified Donation Process</span>
                        </div>
                    </div>

                    <!-- Share Case -->
                    <div class="border-t border-gray-100 pt-4">
                        <div class="text-xs font-bold text-gray-700 mb-2">Share & Support</div>
                        <div class="flex space-x-2">
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($caseTitle . ' - ' . url()->current()) }}" 
                               target="_blank" rel="noopener"
                               class="flex-1 py-2 px-3 rounded-lg bg-[#25D366] text-white text-xs font-bold flex items-center justify-center space-x-1.5 hover:opacity-90">
                                <span>WhatsApp</span>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank" rel="noopener"
                               class="flex-1 py-2 px-3 rounded-lg bg-[#1877F2] text-white text-xs font-bold flex items-center justify-center space-x-1.5 hover:opacity-90">
                                <span>Facebook</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Related Cases -->
        @if(isset($otherCases) && $otherCases->count() > 0)
        <div class="mt-20 pt-10 border-t border-gray-100">
            <h3 class="text-2xl font-black text-[#8C5824] mb-6">{{ site_t('cases_other_cases') }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($otherCases as $rel)
                @php
                    $relTitle = $rel->t('title') ?: $rel->beneficiary_name;
                    $relDonate = route('donate', ['case' => $rel->slug]);
                @endphp
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-4 hover:shadow-md transition flex flex-col justify-between">
                    <div>
                        <div class="aspect-[16/10] w-full rounded-xl overflow-hidden bg-gray-100 mb-3">
                            <img src="{{ asset($rel->image ?: 'images/cases/case-1-baby-nicu.jpg') }}" alt="{{ $relTitle }}" class="w-full h-full object-cover">
                        </div>
                        <h4 class="font-bold text-sm text-[#1E653F] line-clamp-1 mb-1">{{ $relTitle }}</h4>
                        <div class="text-xs text-[#8C5824] font-bold">{{ $rel->formatted_collected_amount }} {{ site_t('cases_raised_of') }} {{ $rel->formatted_target_amount }}</div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-gray-100">
                        <a href="{{ $relDonate }}" class="py-2 px-2 rounded-lg bg-[#1E653F] text-white text-xs font-bold text-center hover:bg-[#164E30] transition">
                            {{ site_t('btn_donate_now') }}
                        </a>
                        <a href="{{ route('cases.show', $rel->slug) }}" class="py-2 px-2 rounded-lg border border-[#1E653F]/40 text-[#1E653F] text-xs font-bold text-center hover:bg-[#E8F3EB] transition">
                            {{ site_t('btn_view_details') }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

@endsection
