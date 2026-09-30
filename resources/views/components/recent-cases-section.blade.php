@props([
    'recentCases' => collect()
])

@php
    $totalCases = $recentCases->count();
@endphp

<!-- ==========================================
     HELP US NOW — RECENT CASES SECTION
     Visual Style inspired by reference mockup:
     - Warm cream/neutral background
     - Centered elegant serif heading
     - Single large focused card carousel
     - High quality rounded imagery
     - Precise green, gold-brown, and cream accents
=========================================== -->
<section id="help-us-now" class="py-14 sm:py-20 bg-[#FBF9F4] border-t border-b border-[#EFEBE4] relative overflow-hidden" aria-label="{{ site_t('recent_cases_heading') }}">

    <!-- Subtle Decorative Background Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-gradient-to-b from-[#FAF4E6]/60 via-transparent to-transparent blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- ==========================================
             SECTION HEADER (Centered)
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
                 CAROUSEL SLIDER (Alpine.js)
                 Features:
                 - 1 large card at a time (matching reference)
                 - Autoplay (5s) with pause on hover
                 - Smooth sliding transitions
                 - Touch swipe on mobile
                 - Keyboard navigation (Left/Right arrows)
                 - Previous / Next buttons & 8 dots
            =========================================== -->
            <div x-data="{
                current: 0,
                total: {{ $totalCases }},
                autoplayInterval: null,
                isPaused: false,
                touchStartX: 0,
                touchEndX: 0,
                init() {
                    this.startAutoplay();
                },
                startAutoplay() {
                    this.stopAutoplay();
                    this.autoplayInterval = setInterval(() => {
                        if (!this.isPaused) {
                            this.next();
                        }
                    }, 5000);
                },
                stopAutoplay() {
                    if (this.autoplayInterval) {
                        clearInterval(this.autoplayInterval);
                        this.autoplayInterval = null;
                    }
                },
                next() {
                    this.current = (this.current + 1) % this.total;
                },
                prev() {
                    this.current = (this.current - 1 + this.total) % this.total;
                },
                goTo(index) {
                    this.current = index;
                },
                handleTouchStart(e) {
                    this.touchStartX = e.changedTouches[0].screenX;
                },
                handleTouchEnd(e) {
                    this.touchEndX = e.changedTouches[0].screenX;
                    const diff = this.touchStartX - this.touchEndX;
                    if (diff > 45) {
                        this.next();
                    } else if (diff < -45) {
                        this.prev();
                    }
                }
            }" 
            @mouseenter="isPaused = true" 
            @mouseleave="isPaused = false"
            @keydown.right.window="next()"
            @keydown.left.window="prev()"
            class="relative max-w-xl sm:max-w-2xl mx-auto">

                <!-- Navigation Arrow Buttons (Desktop & Tablet) -->
                <button type="button" 
                        @click="prev()" 
                        aria-label="Previous Case" 
                        class="absolute -left-4 sm:-left-14 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white text-[#1E653F] shadow-lg border border-gray-200/80 hover:bg-[#1E653F] hover:text-white flex items-center justify-center transition transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-[#1E653F]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <button type="button" 
                        @click="next()" 
                        aria-label="Next Case" 
                        class="absolute -right-4 sm:-right-14 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white text-[#1E653F] shadow-lg border border-gray-200/80 hover:bg-[#1E653F] hover:text-white flex items-center justify-center transition transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-[#1E653F]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Cards Carousel Stage -->
                <div class="overflow-hidden rounded-[28px] sm:rounded-[32px]"
                     @touchstart.passive="handleTouchStart($event)"
                     @touchend.passive="handleTouchEnd($event)">
                    
                    <div class="flex transition-transform duration-500 ease-out"
                         :style="`transform: translateX(-${current * 100}%);`">

                        @foreach($recentCases as $index => $case)
                            @php
                                $caseTitle = $case->t('title') ?: $case->beneficiary_name;
                                $urgentMsg = $case->t('urgent_message') ?: $case->urgent_message;
                                $caseDesc = $case->t('description') ?: $case->description;
                                $expenseLabel = $case->t('expense_label') ?: site_t('cases_treatment_expense');
                                $donateUrl = route('donate', ['case' => $case->slug]);
                                $pct = $case->progress_percentage;
                            @endphp

                            <!-- Single Full-Width Card Slide -->
                            <div class="w-full flex-shrink-0 px-1 sm:px-2">
                                <article class="bg-white rounded-[28px] sm:rounded-[32px] p-4 sm:p-6 md:p-7 shadow-[0_15px_45px_-12px_rgba(0,0,0,0.08)] border border-[#EFEBE4] flex flex-col transition hover:shadow-[0_20px_50px_-10px_rgba(0,0,0,0.12)]">
                                    
                                    <!-- 1. Large Case Image -->
                                    <div class="w-full aspect-[16/9] sm:aspect-[16/8.8] rounded-2xl sm:rounded-[22px] overflow-hidden bg-gray-100 shadow-inner relative group">
                                        <img src="{{ asset($case->image ?: 'images/cases/case-1-baby-nicu.jpg') }}" 
                                             alt="{{ $caseTitle }}" 
                                             loading="lazy" 
                                             class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                                        
                                        <!-- Category Tag Overlay -->
                                        @if($case->t('category_name'))
                                            <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-[11px] font-bold bg-white/90 backdrop-blur-sm text-[#1E653F] shadow-sm">
                                                {{ $case->t('category_name') }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- 2. Beneficiary / Case Title Badge -->
                                    <div class="mt-4 sm:mt-5 bg-[#E8F3EB] rounded-2xl px-3.5 py-2.5 sm:px-4 sm:py-3 flex items-center space-x-3 border border-[#D5EAD9]">
                                        <!-- Category Icon Circle Badge -->
                                        <div class="w-8 h-8 rounded-full bg-[#D4E8DA] flex items-center justify-center shrink-0 text-[#1E653F]">
                                            @if($case->category_icon === 'baby')
                                                <svg class="w-4 h-4 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                                    <circle cx="12" cy="12" r="9"/>
                                                    <circle cx="9" cy="10" r="1" fill="currentColor"/>
                                                    <circle cx="15" cy="10" r="1" fill="currentColor"/>
                                                    <path d="M8 15s1.5 2 4 2 4-2 4-2" stroke-linecap="round"/>
                                                    <path d="M12 3v2" stroke-linecap="round"/>
                                                </svg>
                                            @elseif($case->category_icon === 'heart-pulse')
                                                <i data-lucide="heart-pulse" class="w-4 h-4"></i>
                                            @elseif($case->category_icon === 'book-open')
                                                <i data-lucide="book-open" class="w-4 h-4"></i>
                                            @elseif($case->category_icon === 'accessibility')
                                                <i data-lucide="accessibility" class="w-4 h-4"></i>
                                            @elseif($case->category_icon === 'flame')
                                                <i data-lucide="flame" class="w-4 h-4"></i>
                                            @else
                                                <i data-lucide="heart" class="w-4 h-4"></i>
                                            @endif
                                        </div>

                                        <!-- Case Title Text -->
                                        <h3 class="text-sm sm:text-base font-bold text-[#1E653F] leading-tight">
                                            {{ $caseTitle }}
                                        </h3>
                                    </div>

                                    <!-- 3. Progress Bar Track -->
                                    <div class="mt-3.5 sm:mt-4">
                                        <div class="h-2 sm:h-2.5 w-full bg-[#ECE7DD] rounded-full overflow-hidden" role="progressbar" aria-valuenow="{{ (int)$pct }}" aria-valuemin="0" aria-valuemax="100">
                                            <div class="h-full bg-[#1E653F] rounded-full transition-all duration-700 ease-out" 
                                                 style="width: {{ $pct }}%;"></div>
                                        </div>
                                    </div>

                                    <!-- 4. Expense Strip (Matching Reference) -->
                                    <div class="mt-3.5 sm:mt-4 bg-[#FBF8F2] border border-[#F2ECE0] rounded-2xl px-4 py-3 flex items-center justify-between">
                                        <!-- Left: Coin icon + Treatment Expense label -->
                                        <div class="flex items-center space-x-2.5">
                                            <div class="w-8 h-8 rounded-full bg-[#F3E7CC] flex items-center justify-center text-[#9E6618] shrink-0 shadow-sm">
                                                <svg class="w-4 h-4 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                                    <circle cx="9" cy="7" r="4"/>
                                                    <path d="M5 11c0 2 1.8 3.6 4 3.6s4-1.6 4-3.6"/>
                                                    <path d="M5 15c0 2 1.8 3.6 4 3.6s4-1.6 4-3.6"/>
                                                    <circle cx="16" cy="15" r="3.5"/>
                                                </svg>
                                            </div>
                                            <span class="text-xs sm:text-sm font-semibold text-gray-700">
                                                {{ $expenseLabel }}
                                            </span>
                                        </div>

                                        <!-- Right: Large bold dark green amount -->
                                        <div class="text-right">
                                            <div class="text-lg sm:text-2xl font-black text-[#1E653F] tracking-tight">
                                                {{ $case->formatted_target_amount }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Raised vs Goal Small Metric -->
                                    <div class="flex justify-between items-center text-[11px] text-gray-500 font-semibold px-2 pt-1.5">
                                        <span>
                                            <strong class="text-[#138A4B]">{{ $case->formatted_collected_amount }}</strong> {{ site_t('cases_raised_of') }} {{ $case->formatted_target_amount }}
                                        </span>
                                        <span class="text-gray-600 font-bold bg-[#F4F1EA] px-2 py-0.5 rounded-full">
                                            {{ $pct }}%
                                        </span>
                                    </div>

                                    <!-- 5. Urgent Support Headline -->
                                    @if($urgentMsg)
                                        <h4 class="mt-4 sm:mt-5 text-sm sm:text-base font-bold text-[#8C5824] leading-snug">
                                            {{ $urgentMsg }}
                                        </h4>
                                    @endif

                                    <!-- 6. Short Case Description with Read More toggle -->
                                    @if($caseDesc)
                                        <div x-data="{ expanded: false }" class="mt-2 text-xs sm:text-sm text-gray-600 leading-relaxed">
                                            <p :class="expanded ? '' : 'line-clamp-3 sm:line-clamp-4'">
                                                {{ $caseDesc }}
                                            </p>
                                            @if(strlen($caseDesc) > 160)
                                                <button type="button" 
                                                        @click="expanded = !expanded" 
                                                        class="text-[11px] font-bold text-[#1E653F] hover:underline mt-1 inline-block">
                                                    <span x-show="!expanded">{{ site_t('cases_read_more') }} ↓</span>
                                                    <span x-show="expanded">Show less ↑</span>
                                                </button>
                                            @endif
                                        </div>
                                    @endif

                                    <!-- 7. Donate Now Button -->
                                    <a href="{{ $donateUrl }}" 
                                       class="mt-5 sm:mt-6 w-full py-3.5 sm:py-4 px-6 rounded-full bg-[#1E653F] hover:bg-[#164E30] text-white font-extrabold text-sm sm:text-base flex items-center justify-center space-x-2 shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-4 focus:ring-emerald-200">
                                        <svg class="w-4 h-4 fill-white" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                        <span>{{ site_t('btn_donate_now_heart') }}</span>
                                    </a>

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
                                :class="current === {{ $i }} ? 'w-8 bg-[#1E653F]' : 'w-2.5 bg-[#D9D3C7] hover:bg-[#B3A996]'"
                                aria-label="Go to case {{ $i + 1 }}" 
                                class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"></button>
                    @endfor
                </div>

                <!-- Mobile Counter Info -->
                <div class="text-center text-[11px] text-gray-400 font-semibold mt-2">
                    <span x-text="current + 1"></span> of <span>{{ $totalCases }}</span>
                </div>

            </div>
        @endif

    </div>
</section>
