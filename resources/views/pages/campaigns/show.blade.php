@extends('layouts.app')

@section('title', $campaign->title . ' | ' . site_t('org_name'))
@section('meta_description', $campaign->short_description)

@section('content')

<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-100 py-3.5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-xs font-semibold text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-[#138A4B]">{{ site_t('nav_home') }}</a>
            <span>/</span>
            <a href="{{ route('campaigns.index') }}" class="hover:text-[#138A4B]">{{ site_t('featured_campaigns_heading') }}</a>
            <span>/</span>
            <span class="text-[#073B63] truncate max-w-xs">{{ $campaign->title }}</span>
        </nav>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- Main Content (8 cols) -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- Large Image -->
                <div class="aspect-[16/10] rounded-3xl overflow-hidden shadow-md bg-gray-100 border border-gray-100">
                    <img src="{{ asset(ltrim($campaign->featured_image, '/')) }}" 
                         alt="{{ $campaign->title }}" 
                         class="w-full h-full object-cover">
                </div>

                <!-- Title & Badge -->
                <div>
                    <span class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full bg-[#FA5A3A] text-white text-xs font-black uppercase tracking-wider mb-3 shadow-xs">
                        <i data-lucide="heart" class="w-3.5 h-3.5 fill-white"></i>
                        <span>{{ site_t('featured_campaign_badge') }}</span>
                    </span>
                    <h1 class="text-3xl sm:text-4xl font-black text-gray-900 leading-tight">
                        {{ $campaign->title }}
                    </h1>
                </div>

                <!-- 4 Impact Boxes -->
                @if($campaign->impacts->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 py-4">
                    @foreach($campaign->impacts->sortBy('order') as $impact)
                    @php
                        $palette = match($loop->index % 4) {
                            0 => ['bg' => 'bg-[#D1FAE5]', 'text' => 'text-[#059669]'],
                            1 => ['bg' => 'bg-[#E0F2FE]', 'text' => 'text-[#0284C7]'],
                            2 => ['bg' => 'bg-[#FEF3C7]', 'text' => 'text-[#D97706]'],
                            default => ['bg' => 'bg-[#FFE4E6]', 'text' => 'text-[#E11D48]'],
                        };
                        $lucideIcon = match($impact->icon) {
                            'users' => 'users',
                            'accessibility' => 'accessibility',
                            'heart-pulse' => 'heart-pulse',
                            'shield-check' => 'shield-check',
                            'stethoscope' => 'stethoscope',
                            'pill' => 'pill',
                            'volume-2', 'megaphone' => 'megaphone',
                            'backpack' => 'briefcase',
                            'book', 'notebook' => 'book-open',
                            'edit-3', 'pencil' => 'pen-tool',
                            'sprout' => 'sprout',
                            'flower-2' => 'flower-2',
                            'globe' => 'globe',
                            'droplet', 'water' => 'droplet',
                            'home' => 'home',
                            'scissors' => 'scissors',
                            'trending-up' => 'trending-up',
                            default => 'heart',
                        };
                    @endphp
                    <div class="rounded-2xl p-4 border border-gray-100 bg-[#F9FBFA] flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full {{ $palette['bg'] }} {{ $palette['text'] }} flex items-center justify-center mb-2">
                            <i data-lucide="{{ $lucideIcon }}" class="w-6 h-6"></i>
                        </div>
                        @if($impact->is_primary && $impact->metric_value)
                            <div class="text-lg font-black text-[#073B63]">{{ $impact->metric_value }}</div>
                            <div class="text-xs text-gray-500 font-semibold">{{ $impact->label }}</div>
                        @else
                            <div class="text-xs font-bold text-[#073B63]">{{ $impact->label }}</div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Story & Detailed Overview -->
                <div class="prose max-w-none text-gray-700 leading-relaxed space-y-4">
                    <h2 class="text-2xl font-black text-[#073B63] border-b pb-2">About This Campaign</h2>
                    <p class="text-base sm:text-lg text-gray-800 font-medium">
                        {{ $campaign->description ?: $campaign->short_description }}
                    </p>
                </div>

                <!-- 80G Tax Exemption Notice -->
                <div class="rounded-2xl bg-[#EAF7EF] border border-[#138A4B]/20 p-5 flex items-start space-x-4">
                    <div class="w-10 h-10 rounded-full bg-[#138A4B] text-white flex items-center justify-center shrink-0">
                        <i data-lucide="shield-check" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#0D5C3A]">Tax Exemption Benefit under Section 80G</h4>
                        <p class="text-xs text-gray-700 mt-1 leading-relaxed">
                            Donations made to Devansh Foundation qualify for 50% tax deduction under Section 80G of the Indian Income Tax Act. Instant official receipt issued with 80G registration details.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Sticky Donation Sidebar (4 cols) -->
            <div class="lg:col-span-4">
                <div class="sticky top-24 bg-white rounded-3xl border border-gray-200/90 shadow-lg p-6 sm:p-8 space-y-6">

                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Fundraising Progress</div>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-3xl font-black text-[#138A4B]">₹{{ number_format($campaign->raised_amount) }}</span>
                            <span class="text-sm font-semibold text-gray-500">{{ site_t('campaigns_raised_of') }} ₹{{ number_format($campaign->target_amount) }}</span>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden mt-3 mb-2">
                            <div class="h-full bg-[#138A4B] rounded-full" style="width: {{ $campaign->progress_percentage }}%"></div>
                        </div>
                        <div class="flex justify-between text-xs font-bold text-gray-600">
                            <span>{{ $campaign->progress_percentage }}% Completed</span>
                            <span>Remaining: ₹{{ number_format(max(0, $campaign->target_amount - $campaign->raised_amount)) }}</span>
                        </div>
                    </div>

                    <!-- Direct Donation CTA -->
                    <div class="pt-2">
                        <a href="{{ route('donate', ['campaign' => $campaign->slug]) }}" 
                           class="w-full inline-flex items-center justify-center space-x-2 py-4 px-6 rounded-xl text-white font-black bg-[#0D7340] hover:bg-[#0A5C33] shadow-md hover:shadow-lg transition text-base">
                            <i data-lucide="heart" class="w-5 h-5 fill-white"></i>
                            <span>{{ site_t('btn_donate_now') }} →</span>
                        </a>
                    </div>

                    <!-- Trust Points -->
                    <div class="border-t border-gray-100 pt-4 space-y-3 text-xs text-gray-600 font-semibold">
                        <div class="flex items-center space-x-2 text-[#073B63]">
                            <i data-lucide="check-circle" class="w-4 h-4 text-[#138A4B]"></i>
                            <span>100% Direct Field Impact</span>
                        </div>
                        <div class="flex items-center space-x-2 text-[#073B63]">
                            <i data-lucide="file-text" class="w-4 h-4 text-[#138A4B]"></i>
                            <span>Instant 80G Tax Exemption Certificate</span>
                        </div>
                        <div class="flex items-center space-x-2 text-[#073B63]">
                            <i data-lucide="lock" class="w-4 h-4 text-[#138A4B]"></i>
                            <span>Secure Encrypted Payment Gateway</span>
                        </div>
                    </div>

                    <!-- Share Campaign -->
                    <div class="border-t border-gray-100 pt-4">
                        <div class="text-xs font-bold text-gray-700 mb-2">Spread the Word</div>
                        <div class="flex space-x-2">
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($campaign->title . ' - ' . url()->current()) }}" 
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

        <!-- Related Campaigns -->
        @if(isset($relatedCampaigns) && $relatedCampaigns->count() > 0)
        <div class="mt-20 pt-10 border-t border-gray-100">
            <h3 class="text-2xl font-black text-[#073B63] mb-6">Other Active Campaigns</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedCampaigns as $rel)
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-4 hover:shadow-md transition">
                    <img src="{{ asset(ltrim($rel->featured_image, '/')) }}" alt="{{ $rel->title }}" class="aspect-[16/10] w-full rounded-xl object-cover mb-3">
                    <h4 class="font-bold text-sm text-[#073B63] line-clamp-1 mb-1">{{ $rel->title }}</h4>
                    <div class="text-xs text-[#138A4B] font-bold">₹{{ number_format($rel->raised_amount) }} raised of ₹{{ number_format($rel->target_amount) }}</div>
                    <a href="{{ route('campaigns.show', $rel->slug) }}" class="inline-block mt-3 text-xs font-bold text-[#1E88E5] hover:underline">View Campaign →</a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

@endsection
