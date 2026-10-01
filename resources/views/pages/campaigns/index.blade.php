@extends('layouts.app')

@section('title', site_t('featured_campaigns_heading') . ' | ' . site_t('org_name'))

@section('content')

<!-- Hero Header -->
<div class="bg-gradient-to-b from-[#EAF7EF]/70 via-[#F8FAF9] to-white py-12 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-[#138A4B]/10 text-[#138A4B] text-xs font-bold uppercase tracking-wider mb-3">
            <i data-lucide="heart" class="w-3.5 h-3.5 fill-[#138A4B]"></i>
            <span>{{ site_t('featured_campaigns_tagline') }}</span>
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#073B63] tracking-tight">
            {{ site_t('featured_campaigns_heading') }}
        </h1>
        <p class="mt-3 text-sm sm:text-base text-gray-600 max-w-2xl mx-auto font-medium leading-relaxed">
            {{ site_t('featured_campaigns_subheading') }}
        </p>
    </div>
</div>

<!-- Campaign Listing Grid -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($campaigns->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($campaigns as $campaign)
            <div class="bg-white rounded-2xl border border-gray-200/90 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden flex flex-col group">
                <!-- Image -->
                <div class="aspect-[16/10] overflow-hidden bg-gray-100 relative">
                    <img src="{{ asset(ltrim($campaign->featured_image, '/')) }}" 
                         alt="{{ $campaign->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center space-x-1 px-3 py-1 rounded-full bg-[#FA5A3A] text-white text-[11px] font-black uppercase tracking-wider shadow-sm">
                            <i data-lucide="heart" class="w-3 h-3 fill-white"></i>
                            <span>{{ site_t('featured_campaign_badge') }}</span>
                        </span>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="text-lg font-black text-[#073B63] leading-snug group-hover:text-[#138A4B] transition line-clamp-2 mb-2">
                        <a href="{{ route('campaigns.show', $campaign->slug) }}">
                            {{ $campaign->title }}
                        </a>
                    </h2>

                    <p class="text-xs sm:text-sm text-gray-600 font-medium line-clamp-2 mb-4 leading-relaxed">
                        {{ $campaign->short_description }}
                    </p>

                    <!-- Raised & Target -->
                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <div class="flex items-baseline justify-between mb-2">
                            <span class="text-lg font-black text-[#138A4B]">
                                ₹{{ number_format($campaign->raised_amount) }}
                            </span>
                            <span class="text-xs font-semibold text-gray-500">
                                {{ site_t('campaigns_raised_of') }} ₹{{ number_format($campaign->target_amount) }}
                            </span>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full h-2.5 bg-gray-100 rounded-full overflow-hidden mb-5">
                            <div class="h-full bg-[#138A4B] rounded-full" style="width: {{ $campaign->progress_percentage }}%"></div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-2 gap-2.5">
                            <a href="{{ route('donate', ['campaign' => $campaign->slug]) }}" 
                               class="inline-flex items-center justify-center py-2.5 px-3 rounded-lg text-white font-bold bg-[#0D7340] hover:bg-[#0A5C33] text-xs transition shadow-xs">
                                <span>{{ site_t('btn_donate_now') }} →</span>
                            </a>
                            <a href="{{ route('campaigns.show', $campaign->slug) }}" 
                               class="inline-flex items-center justify-center py-2.5 px-3 rounded-lg text-[#073B63] font-bold bg-white border border-[#073B63] hover:bg-gray-50 text-xs transition">
                                <span>Details →</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $campaigns->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <p class="text-gray-500 text-sm font-semibold">{{ site_t('campaigns_no_active') }}</p>
        </div>
        @endif
    </div>
</div>

@endsection
