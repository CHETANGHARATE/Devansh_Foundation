@props(['featuredCampaigns'])

@if(isset($featuredCampaigns) && $featuredCampaigns->count() > 0)
<section class="py-12 lg:py-16 bg-[#F8FAF9] border-b border-gray-100 relative overflow-hidden" 
         x-data="featuredCampaignsCarousel({{ $featuredCampaigns->count() }})"
         x-init="init()"
         @mouseenter="pauseAutoplay()"
         @mouseleave="resumeAutoplay()">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative">

        <!-- Top Section Header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
            <div>
                <div class="flex items-center space-x-2.5 mb-2">
                    <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                    <span class="text-xs sm:text-sm font-black uppercase tracking-wider text-[#138A4B]">
                        {{ site_t('featured_campaigns_tagline') }}
                    </span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#073B63] tracking-tight">
                    {{ site_t('featured_campaigns_heading') }}
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 font-medium mt-1 max-w-2xl">
                    {{ site_t('featured_campaigns_subheading') }}
                </p>
            </div>

            <!-- Controls (Arrows & Counter) -->
            <div class="flex items-center space-x-3 shrink-0">
                <span class="text-xs font-bold text-gray-500 hidden sm:inline-block">
                    <span class="text-[#073B63] font-black text-sm" x-text="currentIndex + 1"></span> / {{ $featuredCampaigns->count() }}
                </span>

                <div class="flex items-center space-x-2">
                    <button type="button" 
                            @click="prev()" 
                            class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-700 hover:text-white hover:bg-[#138A4B] hover:border-[#138A4B] shadow-sm flex items-center justify-center transition focus:outline-none"
                            aria-label="Previous campaign">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button type="button" 
                            @click="next()" 
                            class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-700 hover:text-white hover:bg-[#138A4B] hover:border-[#138A4B] shadow-sm flex items-center justify-center transition focus:outline-none"
                            aria-label="Next campaign">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Carousel Container -->
        <div class="relative overflow-hidden"
             @touchstart="touchStart($event)"
             @touchmove="touchMove($event)"
             @touchend="touchEnd()">

            <div class="flex transition-transform duration-500 ease-out" 
                 :style="`transform: translateX(-${currentIndex * 100}%);`">

                @foreach($featuredCampaigns as $index => $campaign)
                @php
                    $highlightText = $campaign->title_highlight;
                    $titleText = $campaign->title;
                    if ($highlightText && str_contains($titleText, $highlightText)) {
                        $escapedHighlight = preg_quote($highlightText, '/');
                        $formattedTitle = preg_replace('/' . $escapedHighlight . '/', '<span class="text-[#138A4B]">' . e($highlightText) . '</span>', e($titleText), 1);
                    } else {
                        $formattedTitle = e($titleText);
                    }
                    $impacts = $campaign->impacts->sortBy('order')->values();
                @endphp

                <div class="w-full shrink-0 px-1 sm:px-2">
                    <!-- Main Card matching reference design -->
                    <div class="bg-white rounded-3xl sm:rounded-[36px] border border-gray-100 shadow-[0_16px_45px_rgba(0,0,0,0.06)] p-6 sm:p-8 lg:p-10 relative overflow-hidden transition-all duration-300 hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]">

                        <!-- Organic Decorative Background Accents (Reference Visuals) -->
                        <div class="absolute -top-12 -right-12 w-52 h-52 bg-[#EAF7EF]/80 rounded-full pointer-events-none -z-0"></div>
                        <div class="absolute -bottom-16 -right-12 w-48 h-48 bg-[#FFF7ED]/80 rounded-full pointer-events-none -z-0"></div>
                        <div class="absolute bottom-2 left-2 pointer-events-none opacity-30 -z-0 hidden sm:block">
                            <svg class="w-20 h-20 text-[#138A4B]" viewBox="0 0 100 100" fill="currentColor">
                                <path d="M10 80 Q10 40 40 20 Q50 50 30 75 Z"/>
                                <path d="M30 85 Q20 50 60 40 Q60 70 38 85 Z"/>
                            </svg>
                        </div>

                        <!-- Top Row: Image & Content -->
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-10 items-center relative z-10">

                            <!-- Left: Campaign Photograph -->
                            <div class="lg:col-span-5">
                                <div class="aspect-[4/3] sm:aspect-[16/11] lg:aspect-[4/3] rounded-2xl overflow-hidden bg-gray-100 border border-gray-100 shadow-sm relative group">
                                    <img src="{{ asset(ltrim($campaign->featured_image, '/')) }}" 
                                         alt="{{ $campaign->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                                </div>
                            </div>

                            <!-- Right: Campaign Information -->
                            <div class="lg:col-span-7 flex flex-col justify-center">

                                <!-- Badge: FEATURED CAMPAIGN -->
                                <div class="mb-3">
                                    <span class="inline-flex items-center space-x-1.5 px-3.5 py-1.5 rounded-full bg-[#FA5A3A] text-white text-[11px] sm:text-xs font-black uppercase tracking-wider shadow-sm">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                        <span>{{ site_t('featured_campaign_badge') }}</span>
                                    </span>
                                </div>

                                <!-- Campaign Title with Accent Doodles -->
                                <div class="relative">
                                    <h3 class="text-2xl sm:text-3xl lg:text-[34px] font-black text-gray-900 leading-tight tracking-tight pr-14">
                                        {!! $formattedTitle !!}
                                    </h3>

                                    <!-- Yellow Spark Doodle + Mint Heart Doodle (as shown in reference) -->
                                    <div class="absolute top-0 right-0 flex items-center space-x-1 pointer-events-none">
                                        <!-- Yellow Burst rays -->
                                        <svg class="w-6 h-6 text-[#FBBF24]" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V3a1 1 0 0 1 1-1zm6.364 4.05a1 1 0 0 1 .05 1.415l-2.121 2.12a1 1 0 0 1-1.414-1.414l2.12-2.121a1 1 0 0 1 1.365 0zm-12.728 0a1 1 0 0 1 1.414 0l2.121 2.12a1 1 0 0 1-1.414 1.415l-2.121-2.121a1 1 0 0 1 0-1.414z"/>
                                        </svg>
                                        <!-- Mint Heart Outline -->
                                        <svg class="w-8 h-8 text-[#6EE7B7]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Campaign Description -->
                                <p class="text-sm sm:text-base text-gray-600 font-medium leading-relaxed mt-3 mb-5">
                                    {{ $campaign->short_description }}
                                </p>

                                <!-- Raised Amount & Target -->
                                <div class="flex flex-wrap items-baseline gap-2 mb-2.5">
                                    <span class="text-2xl sm:text-3xl font-black text-[#138A4B] tracking-tight">
                                        {{ $campaign->formatted_raised_amount }}
                                    </span>
                                    <span class="text-sm sm:text-base font-bold text-gray-700">
                                        {{ site_t('campaigns_raised_of') }} {{ $campaign->formatted_target_amount }}
                                    </span>
                                </div>

                                <!-- Progress Bar + Percentage Display -->
                                <div class="flex items-center space-x-3 sm:space-x-4">
                                    <div class="flex-grow h-3.5 bg-gray-200/80 rounded-full overflow-hidden p-0.5">
                                        <div class="h-full bg-[#138A4B] rounded-full transition-all duration-700" 
                                             style="width: {{ $campaign->progress_percentage }}%"></div>
                                    </div>
                                    <span class="text-base sm:text-lg font-black text-[#073B63] shrink-0">
                                        {{ $campaign->progress_display }}%
                                    </span>
                                </div>

                            </div>
                        </div>

                        <!-- Middle Row: 4 Supporting Information / Impact Boxes -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 my-6 sm:my-8 pt-6 border-t border-gray-100 relative z-10">
                            @foreach($impacts as $impact)
                            @php
                                // Icon color styling based on index or badge_color
                                $palette = match($loop->index % 4) {
                                    0 => ['bg' => 'bg-[#D1FAE5]', 'text' => 'text-[#059669]', 'border' => 'border-emerald-100'],
                                    1 => ['bg' => 'bg-[#E0F2FE]', 'text' => 'text-[#0284C7]', 'border' => 'border-sky-100'],
                                    2 => ['bg' => 'bg-[#FEF3C7]', 'text' => 'text-[#D97706]', 'border' => 'border-amber-100'],
                                    default => ['bg' => 'bg-[#FFE4E6]', 'text' => 'text-[#E11D48]', 'border' => 'border-rose-100'],
                                };

                                $lucideIcon = match($impact->icon) {
                                    'users' => 'users',
                                    'accessibility' => 'accessibility',
                                    'heart-pulse' => 'heart-pulse',
                                    'shield-check' => 'shield-check',
                                    'stethoscope' => 'stethoscope',
                                    'pill' => 'pill',
                                    'volume-2', 'megaphone' => 'megaphone',
                                    'graduation-cap' => 'graduation-cap',
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

                            <div class="rounded-2xl p-3.5 sm:p-4 border border-gray-100 bg-[#F9FBFA] hover:bg-white hover:border-[#138A4B]/20 hover:shadow-sm transition-all duration-200 flex flex-col items-center justify-center text-center">
                                <!-- Circular Icon Container -->
                                <div class="w-12 h-12 rounded-full {{ $palette['bg'] }} {{ $palette['text'] }} flex items-center justify-center mb-2 shadow-xs shrink-0">
                                    <i data-lucide="{{ $lucideIcon }}" class="w-6 h-6"></i>
                                </div>

                                @if($impact->is_primary && $impact->metric_value)
                                    <div class="text-base sm:text-lg font-black text-[#073B63] leading-tight">
                                        {{ $impact->metric_value }}
                                    </div>
                                    <div class="text-[11px] sm:text-xs text-gray-500 font-semibold mt-0.5">
                                        {{ $impact->label }}
                                    </div>
                                @else
                                    <div class="text-xs sm:text-sm font-bold text-[#073B63] leading-snug">
                                        {{ $impact->label }}
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <!-- Bottom Row: 2 Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4 relative z-10">
                            <!-- Primary: Donate Now -->
                            <a href="{{ route('donate', ['campaign' => $campaign->slug]) }}" 
                               class="flex-1 sm:flex-initial inline-flex items-center justify-center space-x-2 py-3.5 px-8 rounded-xl text-white font-bold bg-[#0D7340] hover:bg-[#0A5C33] shadow-md hover:shadow-lg transition-all duration-200 text-sm sm:text-base group">
                                <svg class="w-4 h-4 fill-white group-hover:scale-110 transition-transform" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                                <span>{{ site_t('btn_donate_now') }} →</span>
                            </a>

                            <!-- Secondary: View Campaign Details -->
                            <a href="{{ route('campaigns.show', $campaign->slug) }}" 
                               class="flex-1 sm:flex-initial inline-flex items-center justify-center space-x-2 py-3.5 px-8 rounded-xl text-[#073B63] font-bold bg-white border-2 border-[#073B63] hover:bg-gray-50 transition-all duration-200 text-sm sm:text-base">
                                <span>{{ site_t('btn_view_campaign_details') }} →</span>
                            </a>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>

        </div>

        <!-- Carousel Pagination Indicator Dots -->
        <div class="flex items-center justify-center space-x-2 mt-6">
            @foreach($featuredCampaigns as $index => $campaign)
            <button type="button" 
                    @click="goTo({{ $index }})" 
                    class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"
                    :class="currentIndex === {{ $index }} ? 'w-8 bg-[#138A4B]' : 'w-2.5 bg-gray-300 hover:bg-gray-400'"
                    aria-label="Go to campaign {{ $index + 1 }}">
            </button>
            @endforeach
        </div>

    </div>

</section>

<script>
function featuredCampaignsCarousel(totalCount) {
    return {
        currentIndex: 0,
        total: totalCount,
        interval: null,
        isPaused: false,
        touchStartX: 0,
        touchEndX: 0,

        init() {
            if (this.total > 1) {
                this.startAutoplay();
            }
            this.$nextTick(() => {
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            });
        },

        startAutoplay() {
            this.interval = setInterval(() => {
                if (!this.isPaused) {
                    this.next();
                }
            }, 5000);
        },

        pauseAutoplay() {
            this.isPaused = true;
        },

        resumeAutoplay() {
            this.isPaused = false;
        },

        next() {
            this.currentIndex = (this.currentIndex + 1) % this.total;
            this.refreshIcons();
        },

        prev() {
            this.currentIndex = (this.currentIndex - 1 + this.total) % this.total;
            this.refreshIcons();
        },

        goTo(index) {
            this.currentIndex = index;
            this.refreshIcons();
        },

        touchStart(e) {
            this.touchStartX = e.changedTouches[0].screenX;
        },

        touchMove(e) {
            this.touchEndX = e.changedTouches[0].screenX;
        },

        touchEnd() {
            if (this.touchStartX - this.touchEndX > 50) {
                this.next();
            } else if (this.touchEndX - this.touchStartX > 50) {
                this.prev();
            }
        },

        refreshIcons() {
            this.$nextTick(() => {
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            });
        }
    };
}
</script>
@endif
