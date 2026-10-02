@props(['featuredCampaigns'])

@if(isset($featuredCampaigns) && $featuredCampaigns->count() > 0)
@php
    $totalCampaigns = $featuredCampaigns->count();
    $shouldClone = $totalCampaigns >= 4;
    $leadingClones = $shouldClone ? $featuredCampaigns->slice(-4)->values() : collect();
    $trailingClones = $shouldClone ? $featuredCampaigns->take(4)->values() : collect();
    $allDisplayCampaigns = $shouldClone ? $leadingClones->concat($featuredCampaigns)->concat($trailingClones) : $featuredCampaigns;
@endphp

<section id="featured-campaigns" 
         class="py-12 lg:py-16 bg-[#F8FAF9] border-b border-gray-100 relative overflow-hidden" 
         x-data="featuredCampaignsCarousel({{ $totalCampaigns }}, {{ $shouldClone ? 'true' : 'false' }})"
         x-init="init()"
         @mouseenter="pauseAutoplay()"
         @mouseleave="resumeAutoplay()"
         aria-label="{{ site_t('featured_campaigns_heading') }}">

    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 relative">

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
             x-ref="viewport"
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
                 :style="{
                     gap: gap + 'px',
                     transform: 'translateX(' + getTranslateX() + 'px)'
                 }"
                 @transitionend="handleTransitionEnd()">

                @foreach($allDisplayCampaigns as $loopIndex => $campaign)
                    @php
                        $isClone = $shouldClone && ($loopIndex < 4 || $loopIndex >= ($totalCampaigns + 4));
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

                    <!-- Card Slide Container: Responsive width via calculated cardWidth -->
                    <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 flex flex-col"
                         :style="{ width: cardWidth ? (cardWidth + 'px') : '' }"
                         @if($isClone) aria-hidden="true" @endif>

                        <!-- Card Body: Compact, balanced proportions with consistent height -->
                        <div class="bg-white rounded-3xl border border-gray-100 shadow-[0_8px_30px_rgba(0,0,0,0.06)] hover:shadow-[0_16px_40px_rgba(0,0,0,0.1)] p-3.5 sm:p-4 relative overflow-hidden transition-all duration-300 flex flex-col justify-between h-full group">
                            
                            <!-- Organic Background Tint -->
                            <div class="absolute -top-12 -right-12 w-36 h-36 bg-[#EAF7EF]/70 rounded-full pointer-events-none -z-0"></div>

                            <div class="relative z-10 flex flex-col flex-grow">
                                
                                <!-- 1. Campaign Photograph with Badge Overlay -->
                                <div class="w-full h-36 sm:h-40 rounded-xl overflow-hidden bg-gray-100 border border-gray-100 shadow-xs relative group mb-2.5 shrink-0">
                                    <img src="{{ asset(ltrim($campaign->featured_image, '/')) }}" 
                                         alt="{{ $campaign->title }}" 
                                         loading="lazy" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                                    
                                    <!-- Badge: FEATURED CAMPAIGN -->
                                    <span class="absolute top-2.5 left-2.5 inline-flex items-center space-x-1 px-2 py-0.5 rounded-full bg-[#FA5A3A] text-white text-[9.5px] font-black uppercase tracking-wider shadow-xs">
                                        <svg class="w-2.5 h-2.5 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                        <span>{{ site_t('featured_campaign_badge') }}</span>
                                    </span>
                                </div>

                                <!-- 2. Campaign Title with Highlight -->
                                <h3 class="text-sm sm:text-base font-black text-gray-900 leading-snug tracking-tight line-clamp-2 min-h-[2.5rem] mb-1">
                                    {!! $formattedTitle !!}
                                </h3>

                                <!-- 3. Short Description -->
                                <p class="text-xs text-gray-600 font-medium leading-relaxed line-clamp-2 mb-2">
                                    {{ $campaign->short_description }}
                                </p>

                                <!-- 4. Raised Amount & Target -->
                                <div class="mb-1.5">
                                    <div class="flex items-baseline justify-between gap-1.5">
                                        <span class="text-base sm:text-lg font-black text-[#138A4B] tracking-tight">
                                            {{ $campaign->formatted_raised_amount }}
                                        </span>
                                        <span class="text-[11px] sm:text-xs font-bold text-gray-600">
                                            {{ site_t('campaigns_raised_of') }} {{ $campaign->formatted_target_amount }}
                                        </span>
                                    </div>
                                </div>

                                <!-- 5. Progress Bar + Percentage -->
                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="flex-grow h-2 bg-gray-200/80 rounded-full overflow-hidden p-0.5">
                                        <div class="h-full bg-[#138A4B] rounded-full transition-all duration-700" 
                                             style="width: {{ $campaign->progress_percentage }}%"></div>
                                    </div>
                                    <span class="text-xs font-black text-[#073B63] shrink-0">
                                        {{ $campaign->progress_display }}%
                                    </span>
                                </div>

                                <!-- 6. 4 Supporting Information / Impact Boxes (2x2 Grid) -->
                                <div class="grid grid-cols-2 gap-1.5 my-1.5 pt-2 border-t border-gray-100 mt-auto">
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

                                    <div class="rounded-xl p-1.5 border border-gray-100 bg-[#F9FBFA] flex items-center space-x-1.5 text-left">
                                        <div class="w-6 h-6 rounded-full {{ $palette['bg'] }} {{ $palette['text'] }} flex items-center justify-center shrink-0">
                                            <i data-lucide="{{ $lucideIcon }}" class="w-3 h-3"></i>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            @if($impact->is_primary && $impact->metric_value)
                                                <div class="text-[11px] font-black text-[#073B63] leading-none truncate">{{ $impact->metric_value }}</div>
                                                <div class="text-[9.5px] text-gray-500 font-semibold truncate mt-0.5">{{ $impact->label }}</div>
                                            @else
                                                <div class="text-[10px] font-bold text-[#073B63] leading-tight line-clamp-2">{{ $impact->label }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>

                            <!-- 7. Action Buttons (Clean 2-Column Grid, No Text Overflow / Clipping) -->
                            <div class="grid grid-cols-2 gap-1.5 sm:gap-2 mt-2.5 pt-2.5 border-t border-gray-100 relative z-10 shrink-0">
                                <!-- Primary: Donate Now -->
                                <a href="{{ $donateUrl }}" 
                                   @if($isClone) tabindex="-1" @endif
                                   class="w-full inline-flex items-center justify-center space-x-1 py-2 px-1.5 sm:px-2 rounded-xl text-white font-extrabold bg-[#138A4B] hover:bg-[#0E6C3A] shadow-xs hover:shadow transition-all text-[11px] sm:text-xs text-center min-h-[38px] group"
                                   style="background-color: #138A4B;">
                                    <svg class="w-3 h-3 fill-white shrink-0 group-hover:scale-110 transition-transform" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                    <span class="leading-tight">{{ site_t('btn_donate_now') }} →</span>
                                </a>

                                <!-- Secondary: View Campaign Details -->
                                <a href="{{ $detailsUrl }}" 
                                   @if($isClone) tabindex="-1" @endif
                                   class="w-full inline-flex items-center justify-center py-2 px-1.5 sm:px-2 rounded-xl text-[#073B63] font-bold bg-white border border-[#073B63]/30 hover:bg-gray-50 transition-all text-[11px] sm:text-xs text-center min-h-[38px] leading-tight">
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
        cloneOffset: hasClones ? 4 : 0,
        currentIndex: 0,
        visibleCount: 4,
        viewportWidth: 0,
        cardWidth: 0,
        gap: 20,
        isTransitioning: true,
        isAnimating: false,
        autoplayTimer: null,
        interactionTimer: null,
        animationTimer: null,
        isPaused: false,
        isInteracting: false,
        prefersReducedMotion: false,
        touchStartX: 0,
        touchStartY: 0,
        touchEndX: 0,
        resizeObserver: null,

        get activeDot() {
            return ((this.currentIndex % this.total) + this.total) % this.total;
        },

        init() {
            this.updateDimensions();

            // Observe resize using ResizeObserver for precise container tracking
            if (window.ResizeObserver && this.$refs.viewport) {
                this.resizeObserver = new ResizeObserver(() => {
                    this.updateDimensions();
                });
                this.resizeObserver.observe(this.$refs.viewport);
            }

            // Window resize fallback
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    this.updateDimensions();
                }, 100);
            });

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

            this.startAutoplay();

            this.$nextTick(() => {
                this.updateDimensions();
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            });
        },

        updateDimensions() {
            const vp = this.$refs.viewport;
            if (!vp) return;
            const width = vp.clientWidth;
            if (!width) return;
            this.viewportWidth = width;

            const windowW = window.innerWidth;
            if (windowW >= 1440) {
                this.visibleCount = 4;
            } else if (windowW >= 1200) {
                this.visibleCount = 3;
            } else if (windowW >= 768) {
                this.visibleCount = 2;
            } else {
                this.visibleCount = 1;
            }

            // Consistent gap: 20px on desktop/tablet, 16px on mobile
            this.gap = windowW >= 768 ? 20 : 16;

            const totalGaps = (this.visibleCount - 1) * this.gap;
            this.cardWidth = Math.floor((this.viewportWidth - totalGaps) / this.visibleCount);
        },

        getTranslateX() {
            if (!this.cardWidth) return 0;
            const targetPos = this.hasClones 
                ? (this.currentIndex + this.cloneOffset) 
                : this.currentIndex;
            return -(targetPos * (this.cardWidth + this.gap));
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

            clearTimeout(this.animationTimer);
            this.animationTimer = setTimeout(() => {
                if (this.isAnimating) {
                    this.handleTransitionEnd();
                }
            }, 700);
        },

        prev() {
            if (this.isAnimating) return;
            this.isAnimating = true;
            this.isTransitioning = true;
            this.currentIndex--;
            this.pauseTemporarily();
            this.refreshIcons();

            clearTimeout(this.animationTimer);
            this.animationTimer = setTimeout(() => {
                if (this.isAnimating) {
                    this.handleTransitionEnd();
                }
            }, 700);
        },

        goTo(index) {
            if (this.isAnimating) return;
            this.isAnimating = true;
            this.isTransitioning = true;
            this.currentIndex = index;
            this.pauseTemporarily();
            this.refreshIcons();

            clearTimeout(this.animationTimer);
            this.animationTimer = setTimeout(() => {
                if (this.isAnimating) {
                    this.handleTransitionEnd();
                }
            }, 700);
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
                this.currentIndex = this.total + (this.currentIndex % this.total);
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
