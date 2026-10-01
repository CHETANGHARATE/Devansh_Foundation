@props(['featuredCampaigns'])

@if(isset($featuredCampaigns) && $featuredCampaigns->count() > 0)
@php
    $totalCampaigns = $featuredCampaigns->count();
    $shouldClone = $totalCampaigns > 3;
    $leadingClones = $shouldClone ? $featuredCampaigns->slice(-3)->values() : collect();
    $trailingClones = $shouldClone ? $featuredCampaigns->take(3)->values() : collect();
    $allDisplayCampaigns = $shouldClone ? $leadingClones->concat($featuredCampaigns)->concat($trailingClones) : $featuredCampaigns;
@endphp

<section id="featured-campaigns" 
         class="py-12 lg:py-16 bg-[#F8FAF9] border-b border-gray-100 relative overflow-hidden" 
         x-data="featuredCampaignsCarousel({{ $totalCampaigns }}, {{ $shouldClone ? 'true' : 'false' }})"
         x-init="init()"
         @mouseenter="pauseAutoplay()"
         @mouseleave="resumeAutoplay()"
         aria-label="{{ site_t('featured_campaigns_heading') }}">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">

        <!-- Top Section Header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 sm:mb-10 gap-4">
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
                    <span class="text-[#073B63] font-black text-sm" x-text="activeDot + 1"></span> / {{ $totalCampaigns }}
                </span>

                <div class="flex items-center space-x-2">
                    <button type="button" 
                            @click="prev()" 
                            class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-700 hover:text-white hover:bg-[#138A4B] hover:border-[#138A4B] shadow-sm flex items-center justify-center transition focus:outline-none focus:ring-2 focus:ring-[#138A4B]"
                            aria-label="Previous campaign">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button type="button" 
                            @click="next()" 
                            class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-700 hover:text-white hover:bg-[#138A4B] hover:border-[#138A4B] shadow-sm flex items-center justify-center transition focus:outline-none focus:ring-2 focus:ring-[#138A4B]"
                            aria-label="Next campaign">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Carousel Outer Viewport -->
        <div class="relative overflow-hidden py-2"
             @touchstart.passive="touchStart($event)"
             @touchmove.passive="touchMove($event)"
             @touchend.passive="touchEnd()"
             @keydown.right.prevent="next()"
             @keydown.left.prevent="prev()"
             tabindex="0"
             role="region"
             aria-roledescription="carousel"
             aria-label="Featured Campaigns Carousel">

            <!-- Carousel Sliding Track -->
            <div class="flex"
                 :class="{ 'transition-transform duration-600 ease-out': isTransitioning }"
                 :style="`transform: translateX(${getTranslateX()}%);`"
                 @transitionend="handleTransitionEnd()">

                @foreach($allDisplayCampaigns as $loopIndex => $campaign)
                    @php
                        $isClone = $shouldClone && ($loopIndex < 3 || $loopIndex >= ($totalCampaigns + 3));
                        $highlightText = $campaign->title_highlight;
                        $titleText = $campaign->title;
                        if ($highlightText && str_contains($titleText, $highlightText)) {
                            $escapedHighlight = preg_quote($highlightText, '/');
                            $formattedTitle = preg_replace('/' . $escapedHighlight . '/', '<span class="text-[#138A4B]">' . e($highlightText) . '</span>', e($titleText), 1);
                        } else {
                            $formattedTitle = e($titleText);
                        }
                        $impacts = $campaign->impacts->sortBy('order')->values();
                        $donateUrl = route('donate', ['campaign' => $campaign->slug]);
                        $detailsUrl = route('campaigns.show', $campaign->slug);
                    @endphp

                    <!-- Card Slide Container (1 on mobile, 2 on tablet, 3 on desktop) -->
                    <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-2 sm:px-3 py-2 flex flex-col"
                         @if($isClone) aria-hidden="true" @endif>

                        <!-- Card Body -->
                        <div class="bg-white rounded-3xl border border-gray-100 shadow-[0_10px_35px_rgba(0,0,0,0.06)] hover:shadow-[0_18px_45px_rgba(0,0,0,0.1)] p-5 sm:p-6 relative overflow-hidden transition-all duration-300 flex flex-col justify-between h-full group">
                            
                            <!-- Organic Background Tint -->
                            <div class="absolute -top-12 -right-12 w-40 h-40 bg-[#EAF7EF]/70 rounded-full pointer-events-none -z-0"></div>

                            <div class="relative z-10 flex flex-col flex-1">
                                
                                <!-- 1. Campaign Photograph with Badge Overlay -->
                                <div class="aspect-[16/10] rounded-2xl overflow-hidden bg-gray-100 border border-gray-100 shadow-sm relative group mb-4 shrink-0">
                                    <img src="{{ asset(ltrim($campaign->featured_image, '/')) }}" 
                                         alt="{{ $campaign->title }}" 
                                         loading="lazy" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                                    
                                    <!-- Badge: FEATURED CAMPAIGN -->
                                    <span class="absolute top-3 left-3 inline-flex items-center space-x-1.5 px-3 py-1 rounded-full bg-[#FA5A3A] text-white text-[10px] font-black uppercase tracking-wider shadow-sm">
                                        <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                        <span>{{ site_t('featured_campaign_badge') }}</span>
                                    </span>
                                </div>

                                <!-- 2. Campaign Title with Highlight -->
                                <h3 class="text-base sm:text-lg font-black text-gray-900 leading-snug tracking-tight line-clamp-2 min-h-[2.8rem] mb-2">
                                    {!! $formattedTitle !!}
                                </h3>

                                <!-- 3. Short Description -->
                                <p class="text-xs sm:text-sm text-gray-600 font-medium leading-relaxed line-clamp-2 mb-4">
                                    {{ $campaign->short_description }}
                                </p>

                                <!-- 4. Raised Amount & Target -->
                                <div class="mb-2">
                                    <div class="flex items-baseline justify-between gap-2">
                                        <span class="text-xl sm:text-2xl font-black text-[#138A4B] tracking-tight">
                                            {{ $campaign->formatted_raised_amount }}
                                        </span>
                                        <span class="text-xs sm:text-sm font-bold text-gray-600">
                                            {{ site_t('campaigns_raised_of') }} {{ $campaign->formatted_target_amount }}
                                        </span>
                                    </div>
                                </div>

                                <!-- 5. Progress Bar + Percentage -->
                                <div class="flex items-center space-x-3 mb-4">
                                    <div class="flex-grow h-2.5 sm:h-3 bg-gray-200/80 rounded-full overflow-hidden p-0.5">
                                        <div class="h-full bg-[#138A4B] rounded-full transition-all duration-700" 
                                             style="width: {{ $campaign->progress_percentage }}%"></div>
                                    </div>
                                    <span class="text-xs sm:text-sm font-black text-[#073B63] shrink-0">
                                        {{ $campaign->progress_display }}%
                                    </span>
                                </div>

                                <!-- 6. 4 Supporting Information / Impact Boxes (2x2 Grid) -->
                                <div class="grid grid-cols-2 gap-2 my-2 pt-3 border-t border-gray-100 mt-auto">
                                    @foreach($impacts->take(4) as $impact)
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

                                    <div class="rounded-xl p-2 sm:p-2.5 border border-gray-100 bg-[#F9FBFA] flex items-center space-x-2 text-left">
                                        <div class="w-8 h-8 rounded-full {{ $palette['bg'] }} {{ $palette['text'] }} flex items-center justify-center shrink-0">
                                            <i data-lucide="{{ $lucideIcon }}" class="w-4 h-4"></i>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            @if($impact->is_primary && $impact->metric_value)
                                                <div class="text-xs font-black text-[#073B63] leading-none truncate">{{ $impact->metric_value }}</div>
                                                <div class="text-[10px] text-gray-500 font-semibold truncate mt-0.5">{{ $impact->label }}</div>
                                            @else
                                                <div class="text-[11px] font-bold text-[#073B63] leading-tight line-clamp-2">{{ $impact->label }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>

                            <!-- 7. Action Buttons -->
                            <div class="mt-4 pt-3 border-t border-gray-100 flex flex-col sm:flex-row items-center gap-2 relative z-10">
                                <!-- Primary: Donate Now -->
                                <a href="{{ $donateUrl }}" 
                                   @if($isClone) tabindex="-1" @endif
                                   class="w-full sm:flex-1 inline-flex items-center justify-center space-x-1.5 py-2.5 px-3 rounded-xl text-white font-bold bg-[#0D7340] hover:bg-[#0A5C33] shadow-sm hover:shadow transition-all text-xs group">
                                    <svg class="w-3.5 h-3.5 fill-white group-hover:scale-110 transition-transform" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                    <span>{{ site_t('btn_donate_now') }} →</span>
                                </a>

                                <!-- Secondary: View Campaign Details -->
                                <a href="{{ $detailsUrl }}" 
                                   @if($isClone) tabindex="-1" @endif
                                   class="w-full sm:flex-1 inline-flex items-center justify-center space-x-1 py-2.5 px-2.5 rounded-xl text-[#073B63] font-bold bg-white border border-[#073B63]/30 hover:bg-gray-50 transition-all text-xs text-center truncate">
                                    <span>{{ site_t('btn_view_campaign_details') }} →</span>
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>

        <!-- Carousel Pagination Indicator Dots -->
        <div class="flex items-center justify-center space-x-2 mt-6 sm:mt-8">
            @for($i = 0; $i < $totalCampaigns; $i++)
            <button type="button" 
                    @click="goTo({{ $i }})" 
                    class="h-2.5 rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#138A4B]"
                    :class="activeDot === {{ $i }} ? 'w-8 bg-[#138A4B]' : 'w-2.5 bg-gray-300 hover:bg-gray-400'"
                    aria-label="Go to campaign slide {{ $i + 1 }}">
            </button>
            @endfor
        </div>

    </div>

</section>

<script>
function featuredCampaignsCarousel(totalCount, hasClones) {
    return {
        total: totalCount,
        hasClones: hasClones,
        cloneOffset: hasClones ? 3 : 0,
        currentIndex: 0,
        visibleCount: 3,
        isTransitioning: true,
        isAnimating: false,
        autoplayTimer: null,
        interactionTimer: null,
        isPaused: false,
        isInteracting: false,
        prefersReducedMotion: false,
        touchStartX: 0,
        touchStartY: 0,
        touchEndX: 0,

        get activeDot() {
            return ((this.currentIndex % this.total) + this.total) % this.total;
        },

        init() {
            this.updateVisibleCount();

            // Handle prefers-reduced-motion
            const motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
            this.prefersReducedMotion = motionQuery.matches;
            motionQuery.addEventListener('change', (e) => {
                this.prefersReducedMotion = e.matches;
                if (e.matches) this.stopAutoplay();
                else this.startAutoplay();
            });

            // Handle tab visibility
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    this.stopAutoplay();
                } else {
                    this.startAutoplay();
                }
            });

            // Handle responsive resize with debouncing
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    this.updateVisibleCount();
                }, 100);
            });

            this.startAutoplay();

            this.$nextTick(() => {
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            });
        },

        updateVisibleCount() {
            const width = window.innerWidth;
            if (width >= 1024) {
                this.visibleCount = Math.min(3, this.total);
            } else if (width >= 768) {
                this.visibleCount = Math.min(2, this.total);
            } else {
                this.visibleCount = 1;
            }
        },

        getTranslateX() {
            const stepPercent = 100 / this.visibleCount;
            const targetPos = this.hasClones 
                ? (this.currentIndex + this.cloneOffset) 
                : this.currentIndex;
            return -(targetPos * stepPercent);
        },

        startAutoplay() {
            this.stopAutoplay();
            if (this.prefersReducedMotion || this.total <= this.visibleCount) {
                return;
            }
            this.autoplayTimer = setInterval(() => {
                if (!this.isPaused && !this.isInteracting && !document.hidden) {
                    this.next();
                }
            }, 4000);
        },

        stopAutoplay() {
            if (this.autoplayTimer) {
                clearInterval(this.autoplayTimer);
                this.autoplayTimer = null;
            }
        },

        pauseAutoplay() {
            this.isPaused = true;
        },

        resumeAutoplay() {
            this.isPaused = false;
        },

        pauseTemporarily(delay = 5000) {
            this.isInteracting = true;
            if (this.interactionTimer) {
                clearTimeout(this.interactionTimer);
            }
            this.interactionTimer = setTimeout(() => {
                this.isInteracting = false;
            }, delay);
        },

        next() {
            if (this.isAnimating) return;
            this.isAnimating = true;
            this.isTransitioning = true;
            this.currentIndex++;
            this.pauseTemporarily();
            this.refreshIcons();
        },

        prev() {
            if (this.isAnimating) return;
            this.isAnimating = true;
            this.isTransitioning = true;
            this.currentIndex--;
            this.pauseTemporarily();
            this.refreshIcons();
        },

        goTo(index) {
            if (this.isAnimating) return;
            this.isAnimating = true;
            this.isTransitioning = true;
            this.currentIndex = index;
            this.pauseTemporarily();
            this.refreshIcons();
        },

        handleTransitionEnd() {
            this.isAnimating = false;
            if (!this.hasClones) return;

            // When user slides past last item into trailing clones
            if (this.currentIndex >= this.total) {
                this.isTransitioning = false;
                this.currentIndex = this.currentIndex % this.total;
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        this.isTransitioning = true;
                    });
                });
            }
            // When user slides before first item into leading clones
            else if (this.currentIndex < 0) {
                this.isTransitioning = false;
                this.currentIndex = this.total + this.currentIndex;
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        this.isTransitioning = true;
                    });
                });
            }
        },

        touchStart(e) {
            if (e.touches && e.touches[0]) {
                this.touchStartX = e.touches[0].clientX;
                this.touchStartY = e.touches[0].clientY;
            }
        },

        touchMove(e) {
            if (e.touches && e.touches[0]) {
                this.touchEndX = e.touches[0].clientX;
            }
        },

        touchEnd() {
            const diffX = this.touchStartX - this.touchEndX;
            if (Math.abs(diffX) > 40) {
                if (diffX > 0) {
                    this.next();
                } else {
                    this.prev();
                }
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
