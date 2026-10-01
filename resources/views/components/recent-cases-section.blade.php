@props([
    'recentCases' => collect()
])

@php
    $totalCases = $recentCases->count();
    $shouldClone = $totalCases > 3;
    $leadingClones = $shouldClone ? $recentCases->slice(-3)->values() : collect();
    $trailingClones = $shouldClone ? $recentCases->take(3)->values() : collect();
    $allDisplayCases = $shouldClone ? $leadingClones->concat($recentCases)->concat($trailingClones) : $recentCases;
@endphp

<!-- ==========================================
     HELP US NOW — RECENT CASES SECTION
     Multi-Card Auto-Sliding Carousel
     - 3 cards simultaneously on Desktop
     - 2 cards simultaneously on Tablet
     - 1 card at a time on Mobile
     - Auto-slide every 4s with smooth transition & infinite looping
=========================================== -->
<section id="help-us-now" 
         class="py-14 sm:py-20 bg-[#FBF9F4] border-t border-b border-[#EFEBE4] relative overflow-hidden" 
         aria-label="{{ site_t('recent_cases_heading') }}"
         x-data="recentCasesCarousel({{ $totalCases }}, {{ $shouldClone ? 'true' : 'false' }})"
         x-init="init()"
         @mouseenter="pauseAutoplay()"
         @mouseleave="resumeAutoplay()">

    <!-- Subtle Decorative Background Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-gradient-to-b from-[#FAF4E6]/60 via-transparent to-transparent blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- ==========================================
             SECTION HEADER (Centered with Controls)
        =========================================== -->
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12">
            
            <!-- Top Heart Icon -->
            <div class="flex justify-center mb-2">
                <svg class="w-4 h-4 text-[#8C5824] fill-[#8C5824]" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </div>

            <!-- "— Help Us Now —" Subtitle with flanking lines -->
            <div class="flex items-center justify-center space-x-3 text-xs sm:text-sm font-semibold tracking-wider uppercase text-[#1E653F] mb-2">
                <span class="w-8 sm:w-12 h-[1px] bg-[#C5BBAA]"></span>
                <span class="tracking-widest">{{ site_t('help_us_now_label') }}</span>
                <span class="w-8 sm:w-12 h-[1px] bg-[#C5BBAA]"></span>
            </div>

            <!-- "Recent Cases" Large Serif Heading -->
            <h2 class="font-serif text-3xl sm:text-4xl md:text-5xl font-black text-[#8C5824] tracking-tight leading-tight">
                {{ site_t('recent_cases_heading') }}
            </h2>

            <!-- Supporting Subheading -->
            <p class="mt-3 text-xs sm:text-sm text-gray-600 max-w-xl mx-auto leading-relaxed">
                {{ site_t('help_us_now_subheading') }}
            </p>

        </div>

        @if($totalCases === 0)
            <!-- Graceful Empty State -->
            <div class="max-w-md mx-auto bg-white rounded-3xl p-8 text-center border border-gray-200 shadow-sm">
                <div class="w-12 h-12 rounded-full bg-emerald-50 text-[#1E653F] flex items-center justify-center mx-auto mb-3">
                    <i data-lucide="heart" class="w-6 h-6"></i>
                </div>
                <h3 class="text-base font-bold text-gray-800 mb-1">{{ site_t('cases_no_cases') }}</h3>
                <p class="text-xs text-gray-500 mb-4">{{ site_t('help_us_now_subheading') }}</p>
                <a href="{{ route('donate') }}" class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-full bg-[#1E653F] text-white text-xs font-bold hover:bg-[#164E30] transition">
                    <span>{{ site_t('cases_support_general') }} →</span>
                </a>
            </div>
        @else
            <!-- ==========================================
                 MULTI-CARD CAROUSEL SLIDER (Alpine.js)
            =========================================== -->
            <div class="relative px-2 sm:px-6 lg:px-8">

                <!-- Navigation Arrow: Previous -->
                <button type="button" 
                        @click="prev()" 
                        aria-label="Previous Cases" 
                        class="absolute -left-2 sm:-left-3 lg:-left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white text-[#1E653F] shadow-lg border border-gray-200/80 hover:bg-[#1E653F] hover:text-white flex items-center justify-center transition transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-[#1E653F]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Navigation Arrow: Next -->
                <button type="button" 
                        @click="next()" 
                        aria-label="Next Cases" 
                        class="absolute -right-2 sm:-right-3 lg:-right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white text-[#1E653F] shadow-lg border border-gray-200/80 hover:bg-[#1E653F] hover:text-white flex items-center justify-center transition transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-[#1E653F]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Cards Carousel Outer Viewport -->
                <div class="overflow-hidden py-2"
                     @touchstart.passive="touchStart($event)"
                     @touchmove.passive="touchMove($event)"
                     @touchend.passive="touchEnd()"
                     @keydown.right.prevent="next()"
                     @keydown.left.prevent="prev()"
                     tabindex="0"
                     role="region"
                     aria-roledescription="carousel"
                     aria-label="Recent Cases Carousel">
                    
                    <!-- Carousel Sliding Track -->
                    <div class="flex"
                         :class="{ 'transition-transform duration-600 ease-out': isTransitioning }"
                         :style="`transform: translateX(${getTranslateX()}%);`"
                         @transitionend="handleTransitionEnd()">

                        @foreach($allDisplayCases as $loopIndex => $case)
                            @php
                                $isClone = $shouldClone && ($loopIndex < 3 || $loopIndex >= ($totalCases + 3));
                                $caseTitle = $case->t('title') ?: $case->beneficiary_name;
                                $urgentMsg = $case->t('urgent_message') ?: $case->urgent_message;
                                $caseDesc = $case->t('description') ?: $case->description;
                                $expenseLabel = $case->t('expense_label') ?: site_t('cases_treatment_expense');
                                $donateUrl = route('donate', ['case' => $case->slug]);
                                $pct = $case->progress_percentage;
                            @endphp

                            <!-- Responsive Card Slide Container: 1 on mobile, 2 on tablet, 3 on desktop -->
                            <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-2 sm:px-3 py-2 flex flex-col"
                                 @if($isClone) aria-hidden="true" @endif>

                                <article class="bg-white rounded-3xl p-5 sm:p-6 shadow-[0_10px_35px_rgba(0,0,0,0.06)] hover:shadow-[0_18px_45px_rgba(0,0,0,0.12)] border border-[#EFEBE4] flex flex-col justify-between h-full transition duration-300">
                                    
                                    <div>
                                        <!-- 1. Large Case Image -->
                                        <div class="w-full aspect-[16/10] sm:aspect-[16/9.5] rounded-2xl overflow-hidden bg-gray-100 shadow-inner relative group shrink-0">
                                            <img src="{{ asset($case->image ?: 'images/cases/case-1-baby-nicu.jpg') }}" 
                                                 alt="{{ $caseTitle }}" 
                                                 loading="lazy" 
                                                 class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                                            
                                            <!-- Category Tag Overlay -->
                                            @if($case->t('category_name'))
                                                <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-[10px] sm:text-[11px] font-bold bg-white/95 backdrop-blur-sm text-[#1E653F] shadow-sm">
                                                    {{ $case->t('category_name') }}
                                                </span>
                                            @endif
                                        </div>

                                        <!-- 2. Beneficiary / Case Title Badge -->
                                        <div class="mt-4 bg-[#E8F3EB] rounded-2xl px-3.5 py-2.5 flex items-center space-x-2.5 border border-[#D5EAD9]">
                                            <!-- Category Icon Circle Badge -->
                                            <div class="w-7 h-7 rounded-full bg-[#D4E8DA] flex items-center justify-center shrink-0 text-[#1E653F]">
                                                @if($case->category_icon === 'baby')
                                                    <svg class="w-3.5 h-3.5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                                        <circle cx="12" cy="12" r="9"/>
                                                        <circle cx="9" cy="10" r="1" fill="currentColor"/>
                                                        <circle cx="15" cy="10" r="1" fill="currentColor"/>
                                                        <path d="M8 15s1.5 2 4 2 4-2 4-2" stroke-linecap="round"/>
                                                        <path d="M12 3v2" stroke-linecap="round"/>
                                                    </svg>
                                                @elseif($case->category_icon === 'heart-pulse')
                                                    <i data-lucide="heart-pulse" class="w-3.5 h-3.5"></i>
                                                @elseif($case->category_icon === 'book-open')
                                                    <i data-lucide="book-open" class="w-3.5 h-3.5"></i>
                                                @elseif($case->category_icon === 'accessibility')
                                                    <i data-lucide="accessibility" class="w-3.5 h-3.5"></i>
                                                @elseif($case->category_icon === 'flame')
                                                    <i data-lucide="flame" class="w-3.5 h-3.5"></i>
                                                @else
                                                    <i data-lucide="heart" class="w-3.5 h-3.5"></i>
                                                @endif
                                            </div>

                                            <!-- Case Title Text -->
                                            <h3 class="text-xs sm:text-sm font-bold text-[#1E653F] leading-tight line-clamp-1">
                                                {{ $caseTitle }}
                                            </h3>
                                        </div>

                                        <!-- 3. Progress Bar Track -->
                                        <div class="mt-3.5">
                                            <div class="flex justify-between items-center text-xs font-semibold text-gray-500 mb-1 px-0.5">
                                                <span class="text-[11px]">{{ site_t('cases_progress') }}</span>
                                                <span class="text-xs font-black text-[#1E653F] bg-[#E8F3EB] px-2 py-0.5 rounded-full border border-[#D5EAD9]">
                                                    {{ round($pct) }}%
                                                </span>
                                            </div>
                                            <div class="h-2 w-full bg-[#ECE7DD] rounded-full overflow-hidden" role="progressbar" aria-valuenow="{{ (int)$pct }}" aria-valuemin="0" aria-valuemax="100">
                                                <div class="h-full bg-gradient-to-r from-[#138A4B] to-[#1E653F] rounded-full transition-all duration-700 ease-out" 
                                                     style="width: {{ $pct }}%;"></div>
                                            </div>
                                        </div>

                                        <!-- 4. Expense Strip -->
                                        <div class="mt-3.5 bg-[#FBF8F2] border border-[#F2ECE0] rounded-2xl px-3.5 py-2.5 flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-7 h-7 rounded-full bg-[#F3E7CC] flex items-center justify-center text-[#9E6618] shrink-0 shadow-xs">
                                                    <svg class="w-3.5 h-3.5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                                        <circle cx="9" cy="7" r="4"/>
                                                        <path d="M5 11c0 2 1.8 3.6 4 3.6s4-1.6 4-3.6"/>
                                                        <path d="M5 15c0 2 1.8 3.6 4 3.6s4-1.6 4-3.6"/>
                                                        <circle cx="16" cy="15" r="3.5"/>
                                                    </svg>
                                                </div>
                                                <span class="text-[11px] sm:text-xs font-semibold text-gray-700 truncate">
                                                    {{ $expenseLabel }}
                                                </span>
                                            </div>

                                            <div class="text-right">
                                                <div class="text-base sm:text-lg font-black text-[#1E653F] tracking-tight">
                                                    {{ $case->formatted_target_amount }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Goal, Collected & Remaining Metrics -->
                                        <div class="mt-2.5 bg-[#FAF8F3] rounded-2xl p-2.5 border border-[#EFEBE4]">
                                            <div class="grid grid-cols-3 gap-1 text-center">
                                                <div class="px-0.5 border-r border-[#E8E2D5]">
                                                    <div class="text-[9px] uppercase font-bold text-gray-500 tracking-wider truncate">
                                                        {{ site_t('cases_support_goal') }}
                                                    </div>
                                                    <div class="text-[11px] sm:text-xs font-black text-gray-800 mt-0.5 truncate">
                                                        {{ $case->formatted_target_amount }}
                                                    </div>
                                                </div>
                                                <div class="px-0.5 border-r border-[#E8E2D5]">
                                                    <div class="text-[9px] uppercase font-bold text-gray-500 tracking-wider truncate">
                                                        {{ site_t('cases_collected') }}
                                                    </div>
                                                    <div class="text-[11px] sm:text-xs font-black text-[#138A4B] mt-0.5 truncate">
                                                        {{ $case->formatted_collected_amount }}
                                                    </div>
                                                </div>
                                                <div class="px-0.5">
                                                    <div class="text-[9px] uppercase font-bold text-gray-500 tracking-wider truncate">
                                                        {{ site_t('cases_remaining_label') }}
                                                    </div>
                                                    <div class="text-[11px] sm:text-xs font-black text-[#8C5824] mt-0.5 truncate">
                                                        {{ $case->formatted_remaining_amount }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 5. Urgent Support Headline -->
                                        @if($urgentMsg)
                                            <h4 class="mt-3 text-xs sm:text-sm font-bold text-[#8C5824] leading-snug line-clamp-2">
                                                 {{ $urgentMsg }}
                                            </h4>
                                        @endif

                                        <!-- 6. Short Case Description with Read More toggle -->
                                        @if($caseDesc)
                                            <div x-data="{ expanded: false }" class="mt-2 text-xs text-gray-600 leading-relaxed">
                                                <p :class="expanded ? '' : 'line-clamp-2 sm:line-clamp-3'">
                                                    {{ $caseDesc }}
                                                </p>
                                                @if(strlen($caseDesc) > 120)
                                                    <button type="button" 
                                                            @click="expanded = !expanded" 
                                                            @if($isClone) tabindex="-1" @endif
                                                            class="text-[11px] font-bold text-[#1E653F] hover:underline mt-0.5 inline-block">
                                                        <span x-show="!expanded">{{ site_t('cases_read_more') }} ↓</span>
                                                        <span x-show="expanded">{{ site_t('cases_show_less') }} ↑</span>
                                                    </button>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    <!-- 7. Donate Now Button -->
                                    <div class="mt-5 pt-2">
                                        <a href="{{ $donateUrl }}" 
                                           @if($isClone) tabindex="-1" @endif
                                           class="w-full py-3 px-4 rounded-full bg-[#1E653F] hover:bg-[#164E30] text-white font-extrabold text-xs sm:text-sm flex items-center justify-center space-x-2 shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-4 focus:ring-emerald-200">
                                            <svg class="w-3.5 h-3.5 fill-white" viewBox="0 0 24 24">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                            </svg>
                                            <span>{{ site_t('btn_donate_now_heart') }}</span>
                                        </a>
                                    </div>

                                </article>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- 8 Pagination Dots Indicator -->
                <div class="flex items-center justify-center space-x-2 mt-6 sm:mt-8">
                    @for($i = 0; $i < $totalCases; $i++)
                        <button type="button" 
                                @click="goTo({{ $i }})" 
                                :class="activeDot === {{ $i }} ? 'w-8 bg-[#1E653F]' : 'w-2.5 bg-[#D9D3C7] hover:bg-[#B3A996]'"
                                aria-label="Go to case slide {{ $i + 1 }}" 
                                class="h-2.5 rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#1E653F]"></button>
                    @endfor
                </div>

                <!-- Counter Info -->
                <div class="text-center text-[11px] text-gray-500 font-semibold mt-2">
                    <span x-text="activeDot + 1"></span> of <span>{{ $totalCases }}</span>
                </div>

            </div>
        @endif

    </div>
</section>

<script>
function recentCasesCarousel(totalCount, hasClones) {
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
