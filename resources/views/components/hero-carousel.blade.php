@php
    $slides = [
        [
            'name' => 'Education',
            'image' => asset('images/hero/hero-slide-education.jpg'),
            'alt' => 'Devansh Foundation - Quality Education for Children',
            'kicker' => site_t('hero_b1_kicker'),
            'title_1' => site_t('hero_b1_title_1'),
            'title_2' => site_t('hero_b1_title_2'),
            'icon' => 'leaf',
            'desc' => site_t('hero_b1_desc'),
            'chalk' => site_t('hero_b1_chalk'),
            'btn_primary_text' => site_t('hero_b1_btn_primary'),
            'btn_primary_link' => route('donate'),
            'btn_secondary_text' => site_t('hero_b1_btn_secondary'),
            'btn_secondary_link' => route('our-work.show', 'education'),
            'btn_secondary_icon' => 'users',
        ],
        [
            'name' => 'Healthcare',
            'image' => asset('images/hero/hero-slide-healthcare.jpg'),
            'alt' => 'Devansh Foundation - Healthcare for Every Life',
            'kicker' => site_t('hero_b2_kicker'),
            'title_1' => site_t('hero_b2_title_1'),
            'title_2' => site_t('hero_b2_title_2'),
            'icon' => 'heart-pulse',
            'desc' => site_t('hero_b2_desc'),
            'chalk' => site_t('hero_b2_chalk'),
            'btn_primary_text' => site_t('hero_b2_btn_primary'),
            'btn_primary_link' => route('donate'),
            'btn_secondary_text' => site_t('hero_b2_btn_secondary'),
            'btn_secondary_link' => route('our-work.show', 'healthcare'),
            'btn_secondary_icon' => 'activity',
        ],
        [
            'name' => 'Environment',
            'image' => asset('images/hero/hero-slide-environment.jpg'),
            'alt' => 'Devansh Foundation - A Cleaner Environment for Healthier Lives',
            'kicker' => site_t('hero_b3_kicker'),
            'title_1' => site_t('hero_b3_title_1'),
            'title_2' => site_t('hero_b3_title_2'),
            'icon' => 'leaf',
            'desc' => site_t('hero_b3_desc'),
            'chalk' => site_t('hero_b3_chalk'),
            'btn_primary_text' => site_t('hero_b3_btn_primary'),
            'btn_primary_link' => route('donate'),
            'btn_secondary_text' => site_t('hero_b3_btn_secondary'),
            'btn_secondary_link' => route('our-work.show', 'environment'),
            'btn_secondary_icon' => 'sprout',
        ],
        [
            'name' => 'Women Empowerment',
            'image' => asset('images/hero/hero-slide-women.jpg'),
            'alt' => 'Devansh Foundation - Empowering Women Transforming Families',
            'kicker' => site_t('hero_b4_kicker'),
            'title_1' => site_t('hero_b4_title_1'),
            'title_2' => site_t('hero_b4_title_2'),
            'icon' => 'sparkles',
            'desc' => site_t('hero_b4_desc'),
            'chalk' => site_t('hero_b4_chalk'),
            'btn_primary_text' => site_t('hero_b4_btn_primary'),
            'btn_primary_link' => route('donate'),
            'btn_secondary_text' => site_t('hero_b4_btn_secondary'),
            'btn_secondary_link' => route('our-work.show', 'women-empowerment'),
            'btn_secondary_icon' => 'smile',
        ],
    ];
@endphp

<!-- Image Preloads for Zero-Flicker Transitions -->
<div class="hidden" aria-hidden="true">
    @foreach($slides as $s)
        <img src="{{ $s['image'] }}" alt="" loading="eager" fetchpriority="high">
    @endforeach
</div>

<style>
    @media (prefers-reduced-motion: reduce) {
        .hero-crossfade-slide {
            transition: none !important;
        }
    }
</style>

<!-- ==========================================
     HERO BANNER CAROUSEL — FADE EFFECT ONLY
     (Auto-changes every 5 seconds, 1000ms crossfade, zero horizontal movement)
=========================================== -->
<section id="hero-carousel-section"
         class="relative overflow-hidden bg-[#F3F9F5] border-b border-gray-100 min-h-[490px] sm:min-h-[510px] lg:min-h-[550px] flex items-center select-none"
         x-data="heroBannerFadeCarousel()"
         x-init="init()"
         @mouseenter="pause()"
         @mouseleave="resume()"
         @touchstart.passive="handleTouchStart($event)"
         @touchend.passive="handleTouchEnd($event)"
         role="region"
         aria-roledescription="carousel"
         aria-label="Devansh Foundation Key Initiatives">

    <!-- Layered Slides Container (All slides absolutely stacked at same dimensions) -->
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        @foreach($slides as $index => $slide)
            <div class="hero-crossfade-slide absolute inset-0 w-full h-full flex items-center transition-opacity duration-1000 ease-in-out"
                 :class="active === {{ $index }} ? 'opacity-100 z-10 pointer-events-auto' : (prevActive === {{ $index }} ? 'opacity-0 z-5 pointer-events-none' : 'opacity-0 z-0 pointer-events-none')"
                 :aria-hidden="active !== {{ $index }}"
                 role="group"
                 aria-roledescription="slide"
                 aria-label="{{ $index + 1 }} of 4: {{ $slide['name'] }}">

                <!-- Full-width Panoramic Graphic -->
                <div class="absolute inset-0 z-0">
                    <img src="{{ $slide['image'] }}" 
                         alt="{{ $slide['alt'] }}" 
                         class="w-full h-full object-cover object-right lg:object-center select-none pointer-events-none"
                         loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                         fetchpriority="{{ $index === 0 ? 'high' : 'auto' }}">
                    <!-- Soft gradient on the left for maximum text contrast and legibility -->
                    <div class="absolute inset-0 bg-white/45 sm:bg-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 to-transparent sm:via-white/82 lg:via-white/60 w-full sm:w-[82%] lg:w-[58%]"></div>
                </div>

                <!-- Handwritten Chalk Message positioned top-right -->
                <div class="absolute top-8 right-[18%] sm:right-[20%] lg:right-[22%] z-10 pointer-events-none transform -rotate-3 text-center hidden md:block select-none">
                    <div class="handwritten-font text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.85)] text-2xl sm:text-3xl lg:text-4xl font-extrabold leading-tight tracking-wide whitespace-pre-line">
                        {{ $slide['chalk'] }}
                    </div>
                </div>

                <!-- Live Localized Text & CTA Buttons (Left Column) -->
                <div class="max-w-7xl mx-auto px-12 sm:px-6 lg:px-8 py-10 lg:py-16 relative z-10 w-full">
                    <div class="max-w-xl lg:max-w-lg space-y-4 text-left">
                        
                        <!-- Kicker Badge with Green Left Pipe -->
                        <div class="inline-flex items-center space-x-2 text-xs font-black uppercase tracking-wider text-[#073B63]">
                            <span class="w-1.5 h-3.5 bg-[#138A4B] rounded-full inline-block"></span>
                            <span>{{ $slide['kicker'] }}</span>
                        </div>

                        <!-- Main Headline -->
                        <h1 class="text-3xl sm:text-4xl lg:text-[44px] font-black tracking-tight leading-[1.14]">
                            <span class="block text-[#073B63]">{{ $slide['title_1'] }}</span>
                            <span class="inline-flex items-center text-[#138A4B]">
                                <span>{{ $slide['title_2'] }}</span>
                                @if($slide['icon'] === 'leaf')
                                    <!-- Leaf SVG -->
                                    <svg class="w-7 h-7 sm:w-8 sm:h-8 ml-2 inline-block text-[#138A4B] fill-current" viewBox="0 0 24 24">
                                        <path d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22l1-2.3A4.49 4.49 0 0 0 8 20C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75C7 8 17 8 17 8z"/>
                                    </svg>
                                @elseif($slide['icon'] === 'heart-pulse')
                                    <!-- Heart-pulse SVG -->
                                    <svg class="w-7 h-7 sm:w-8 sm:h-8 ml-2 inline-block text-[#138A4B] fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                                        <path d="M3.22 12H9.5l.5-1 2 4.5 2-7 1.5 3.5h5.27"/>
                                    </svg>
                                @else
                                    <!-- Sparkles SVG -->
                                    <svg class="w-7 h-7 sm:w-8 sm:h-8 ml-2 inline-block text-[#138A4B] fill-current" viewBox="0 0 24 24">
                                        <path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3z"/>
                                    </svg>
                                @endif
                            </span>
                        </h1>

                        <!-- Description -->
                        <p class="text-xs sm:text-sm text-gray-700 leading-relaxed font-semibold max-w-md">
                            {{ $slide['desc'] }}
                        </p>

                        <!-- CTA Buttons -->
                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            <a href="{{ $slide['btn_primary_link'] }}" class="inline-flex items-center justify-center space-x-2 px-5 sm:px-6 py-2.5 sm:py-3 rounded-md text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 text-xs sm:text-sm">
                                <i data-lucide="heart" class="w-4 h-4 fill-white"></i>
                                <span>{{ $slide['btn_primary_text'] }} →</span>
                            </a>

                            <a href="{{ $slide['btn_secondary_link'] }}" class="inline-flex items-center justify-center space-x-2 px-5 sm:px-6 py-2.5 sm:py-3 rounded-md text-white font-bold bg-[#0D5C3A] hover:bg-[#09452B] shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 text-xs sm:text-sm">
                                <i data-lucide="{{ $slide['btn_secondary_icon'] }}" class="w-4 h-4"></i>
                                <span>{{ $slide['btn_secondary_text'] }} →</span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <!-- Left Navigation Arrow (Fade-only transition) -->
    <button type="button" 
            @click="prev()" 
            class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 z-20 w-8 h-8 sm:w-11 sm:h-11 rounded-full bg-white/90 hover:bg-white text-[#073B63] shadow-md hover:shadow-lg flex items-center justify-center transition-all duration-200 hover:scale-105 active:scale-95 focus:outline-hidden focus:ring-2 focus:ring-[#138A4B]" 
            aria-label="{{ site_t('hero_carousel_prev') }}">
        <svg class="w-4 h-4 sm:w-5 sm:h-5 stroke-current stroke-2 fill-none" viewBox="0 0 24 24">
            <path d="m15 18-6-6 6-6"/>
        </svg>
    </button>

    <!-- Right Navigation Arrow (Fade-only transition) -->
    <button type="button" 
            @click="next()" 
            class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 z-20 w-8 h-8 sm:w-11 sm:h-11 rounded-full bg-white/90 hover:bg-white text-[#073B63] shadow-md hover:shadow-lg flex items-center justify-center transition-all duration-200 hover:scale-105 active:scale-95 focus:outline-hidden focus:ring-2 focus:ring-[#138A4B]" 
            aria-label="{{ site_t('hero_carousel_next') }}">
        <svg class="w-4 h-4 sm:w-5 sm:h-5 stroke-current stroke-2 fill-none" viewBox="0 0 24 24">
            <path d="m9 18 6-6-6-6"/>
        </svg>
    </button>

    <!-- 4 Indicator Dots (Bottom Centered) -->
    <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 z-20 flex items-center space-x-2 bg-black/25 backdrop-blur-xs px-3.5 py-1.5 rounded-full border border-white/20">
        @for($i = 0; $i < 4; $i++)
            <button type="button"
                    @click="goTo({{ $i }})"
                    class="transition-all duration-300 rounded-full focus:outline-hidden cursor-pointer"
                    :class="active === {{ $i }} ? 'w-6 h-2.5 bg-[#138A4B] shadow-xs' : 'w-2.5 h-2.5 bg-white/75 hover:bg-white'"
                    aria-label="{{ site_t('hero_carousel_slide') }} {{ $i + 1 }}"
                    :aria-current="active === {{ $i }} ? 'true' : 'false'">
            </button>
        @endfor
    </div>

</section>

<!-- Pure Opacity Fade Carousel Controller (Zero translate, zero movement) -->
<script>
    function heroBannerFadeCarousel() {
        return {
            active: 0,
            prevActive: 0,
            total: 4,
            duration: 5000,
            autoplayTimer: null,
            transitionTimer: null,
            isHovered: false,
            touchStartX: 0,
            touchEndX: 0,
            reducedMotion: false,

            init() {
                this.reducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                if (!this.reducedMotion) {
                    this.startAutoplay();
                }
            },

            startAutoplay() {
                this.stopAutoplay();
                if (this.reducedMotion) return;
                this.autoplayTimer = setInterval(() => {
                    if (!this.isHovered) {
                        this.next();
                    }
                }, this.duration);
            },

            stopAutoplay() {
                if (this.autoplayTimer) {
                    clearInterval(this.autoplayTimer);
                    this.autoplayTimer = null;
                }
            },

            resetTimer() {
                this.stopAutoplay();
                this.startAutoplay();
            },

            next() {
                this.goTo((this.active + 1) % this.total);
            },

            prev() {
                this.goTo((this.active - 1 + this.total) % this.total);
            },

            goTo(index) {
                if (index === this.active) return;
                this.prevActive = this.active;
                this.active = index;

                // Keep prevActive layered underneath for the 1000ms duration of crossfade
                clearTimeout(this.transitionTimer);
                this.transitionTimer = setTimeout(() => {
                    this.prevActive = this.active;
                }, 1000);

                this.resetTimer();
            },

            pause() {
                this.isHovered = true;
            },

            resume() {
                this.isHovered = false;
            },

            handleTouchStart(e) {
                if (e.changedTouches && e.changedTouches.length > 0) {
                    this.touchStartX = e.changedTouches[0].screenX;
                }
            },

            handleTouchEnd(e) {
                if (e.changedTouches && e.changedTouches.length > 0) {
                    this.touchEndX = e.changedTouches[0].screenX;
                    const diff = this.touchStartX - this.touchEndX;
                    if (Math.abs(diff) > 40) {
                        if (diff > 0) {
                            this.next();
                        } else {
                            this.prev();
                        }
                    }
                }
            }
        };
    }
</script>
