@props(['area'])

@php
    $locale = app()->getLocale();
    $trans = $area->translation($locale) ?? $area->translation('mr') ?? $area->translation('en');
    $title = $trans?->title ?? $area->slug;
    $subtitle = $trans?->subtitle ?? '';
    
    // Explicit English subtitles mapped for bilingual reference presentation
    $subtitles = [
        'education' => 'Education',
        'healthcare' => 'Healthcare',
        'women-empowerment' => 'Women Empowerment',
        'child-welfare' => 'Child Welfare',
        'environment' => 'Environment',
        'social-welfare' => 'Social Welfare',
        'divyang-senior' => 'Divyang & Senior Welfare',
        'youth-employment' => 'Youth & Employment',
        'rural-development' => 'Rural Development',
    ];
    if (empty($subtitle) || $locale !== 'en') {
        $subtitle = $subtitles[$area->slug] ?? ($trans?->subtitle ?? '');
    }

    $color = $area->color ?: 'emerald';
    
    // Exact theme styling mapped from reference image with soft pastel backgrounds
    $themeMap = [
        'pink' => [
            'card_bg' => 'bg-[#FFF5F7]',
            'card_border' => 'border-[#FFE4E6]',
            'circle' => 'bg-[#E11D48] text-white',
            'num_bg' => 'bg-[#FFE4E6] text-[#BE123C]',
            'cta_bg' => 'bg-[#FFE4E6] text-[#BE123C] hover:bg-[#FECDD3]',
            'border_hover' => 'hover:border-[#E11D48]/40',
        ],
        'teal' => [
            'card_bg' => 'bg-[#F0FDF4]',
            'card_border' => 'border-[#DCFCE7]',
            'circle' => 'bg-[#10B981] text-white',
            'num_bg' => 'bg-[#DCFCE7] text-[#15803D]',
            'cta_bg' => 'bg-[#DCFCE7] text-[#15803D] hover:bg-[#BBF7D0]',
            'border_hover' => 'hover:border-[#10B981]/40',
        ],
        'orange' => [
            'card_bg' => 'bg-[#FFF7ED]',
            'card_border' => 'border-[#FFEDD5]',
            'circle' => 'bg-[#F97316] text-white',
            'num_bg' => 'bg-[#FFEDD5] text-[#C2410C]',
            'cta_bg' => 'bg-[#FFEDD5] text-[#C2410C] hover:bg-[#FED7AA]',
            'border_hover' => 'hover:border-[#F97316]/40',
        ],
        'purple' => [
            'card_bg' => 'bg-[#FAF5FF]',
            'card_border' => 'border-[#EDE9FE]',
            'circle' => 'bg-[#8B5CF6] text-white',
            'num_bg' => 'bg-[#EDE9FE] text-[#6D28D9]',
            'cta_bg' => 'bg-[#EDE9FE] text-[#6D28D9] hover:bg-[#DDD6FE]',
            'border_hover' => 'hover:border-[#8B5CF6]/40',
        ],
        'green' => [
            'card_bg' => 'bg-[#F0FDF4]',
            'card_border' => 'border-[#DCFCE7]',
            'circle' => 'bg-[#10B981] text-white',
            'num_bg' => 'bg-[#DCFCE7] text-[#15803D]',
            'cta_bg' => 'bg-[#DCFCE7] text-[#15803D] hover:bg-[#BBF7D0]',
            'border_hover' => 'hover:border-[#10B981]/40',
        ],
        'emerald' => [
            'card_bg' => 'bg-[#F0FDF4]',
            'card_border' => 'border-[#DCFCE7]',
            'circle' => 'bg-[#16A34A] text-white',
            'num_bg' => 'bg-[#DCFCE7] text-[#15803D]',
            'cta_bg' => 'bg-[#DCFCE7] text-[#15803D] hover:bg-[#BBF7D0]',
            'border_hover' => 'hover:border-[#16A34A]/40',
        ],
        'rose' => [
            'card_bg' => 'bg-[#FFF5F7]',
            'card_border' => 'border-[#FFE4E6]',
            'circle' => 'bg-[#E11D48] text-white',
            'num_bg' => 'bg-[#FFE4E6] text-[#BE123C]',
            'cta_bg' => 'bg-[#FFE4E6] text-[#BE123C] hover:bg-[#FECDD3]',
            'border_hover' => 'hover:border-[#E11D48]/40',
        ],
        'blue' => [
            'card_bg' => 'bg-[#EFF6FF]',
            'card_border' => 'border-[#DBEAFE]',
            'circle' => 'bg-[#2563EB] text-white',
            'num_bg' => 'bg-[#DBEAFE] text-[#1D4ED8]',
            'cta_bg' => 'bg-[#DBEAFE] text-[#1D4ED8] hover:bg-[#BFDBFE]',
            'border_hover' => 'hover:border-[#2563EB]/40',
        ],
        'amber' => [
            'card_bg' => 'bg-[#FFF7ED]',
            'card_border' => 'border-[#FFEDD5]',
            'circle' => 'bg-[#EA580C] text-white',
            'num_bg' => 'bg-[#FFEDD5] text-[#C2410C]',
            'cta_bg' => 'bg-[#FFEDD5] text-[#C2410C] hover:bg-[#FED7AA]',
            'border_hover' => 'hover:border-[#EA580C]/40',
        ],
        'yellow' => [
            'card_bg' => 'bg-[#FEFCE8]',
            'card_border' => 'border-[#FEF3C7]',
            'circle' => 'bg-[#D97706] text-white',
            'num_bg' => 'bg-[#FEF3C7] text-[#B45309]',
            'cta_bg' => 'bg-[#FEF3C7] text-[#B45309] hover:bg-[#FDE68A]',
            'border_hover' => 'hover:border-[#D97706]/40',
        ],
    ];

    $theme = $themeMap[$color] ?? $themeMap['teal'];

    // Icon mapping matching reference
    $iconMap = [
        'education' => 'book-open',
        'healthcare' => 'activity',
        'women-empowerment' => 'users',
        'child-welfare' => 'smile',
        'environment' => 'sprout',
        'social-welfare' => 'heart-handshake',
        'divyang-senior' => 'accessibility',
        'youth-employment' => 'user-check',
        'rural-development' => 'home',
    ];
    $icon = $iconMap[$area->slug] ?? ($area->icon ?: 'heart');

    // Initiatives split into two columns
    $initiatives = $area->initiatives ?? collect();
    $total = $initiatives->count();
    $half = (int) ceil($total / 2);
    $col1 = $initiatives->slice(0, $half);
    $col2 = $initiatives->slice($half);

    // Image path with fallback
    $imgUrl = $area->image ? asset($area->image) : asset('images/focus-areas/' . $area->slug . '.jpg');
@endphp

<div class="{{ $theme['card_bg'] }} rounded-[22px] border {{ $theme['card_border'] }} shadow-sm {{ $theme['border_hover'] }} hover:shadow-lg transition-all duration-300 p-3 sm:p-3.5 flex flex-col justify-between group">
    
    <div class="flex flex-col sm:flex-row gap-3 sm:gap-3.5">
        <!-- Left Photo Container with Floating Icon -->
        <div class="relative w-full sm:w-[38%] min-h-[160px] sm:min-h-[220px] rounded-2xl overflow-hidden flex-shrink-0 bg-gray-100 shadow-sm">
            <img 
                src="{{ $imgUrl }}" 
                alt="{{ $title }}" 
                loading="lazy" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=600&q=80';"
            />
            
            <!-- Floating Category Icon Badge (matches top-right of image as in reference) -->
            <div class="absolute top-2.5 right-2.5 sm:-right-2 sm:top-2 w-11 h-11 sm:w-12 sm:h-12 rounded-full {{ $theme['circle'] }} flex items-center justify-center shadow-lg ring-4 ring-white z-10">
                <i data-lucide="{{ $icon }}" class="w-5 h-5 sm:w-6 sm:h-6 stroke-[2.2]" aria-hidden="true"></i>
            </div>
        </div>

        <!-- Right Content: Title, Subtitle, 2-Column Numbered Initiatives -->
        <div class="flex-1 flex flex-col justify-between pt-1 sm:pt-0 sm:pl-1">
            <div>
                <!-- Heading & Subtitle -->
                <div class="mb-2 pr-2">
                    <h3 class="text-base sm:text-[17px] font-bold text-gray-900 leading-snug group-hover:text-[#073B63] transition-colors">
                        <a href="{{ route('our-work.show', $area->slug) }}">
                            {{ $title }}
                        </a>
                    </h3>
                    @if($subtitle)
                        <div class="text-[12px] font-semibold text-gray-500 tracking-wide mt-0.5">
                            {{ $subtitle }}
                        </div>
                    @endif
                </div>

                <!-- 2-Column Numbered Initiative List -->
                @if($total > 0)
                    <div class="grid grid-cols-2 gap-x-2 gap-y-1.5 my-2">
                        <!-- Column 1 -->
                        <div class="space-y-1.5">
                            @foreach($col1 as $init)
                                @php
                                    $iTrans = $init->translation($locale) ?? $init->translation('mr') ?? $init->translation('en');
                                    $iTitle = $iTrans?->title ?? '';
                                @endphp
                                <div class="flex items-start space-x-1.5 min-w-0" title="{{ $iTitle }}">
                                    <span class="w-4 h-4 rounded-full {{ $theme['num_bg'] }} flex-shrink-0 flex items-center justify-center text-[10px] font-bold mt-0.5">
                                        {{ $init->number }}
                                    </span>
                                    <span class="text-[11px] sm:text-[11.5px] font-medium text-gray-800 leading-tight line-clamp-2">
                                        {{ $iTitle }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-1.5">
                            @foreach($col2 as $init)
                                @php
                                    $iTrans = $init->translation($locale) ?? $init->translation('mr') ?? $init->translation('en');
                                    $iTitle = $iTrans?->title ?? '';
                                @endphp
                                <div class="flex items-start space-x-1.5 min-w-0" title="{{ $iTitle }}">
                                    <span class="w-4 h-4 rounded-full {{ $theme['num_bg'] }} flex-shrink-0 flex items-center justify-center text-[10px] font-bold mt-0.5">
                                        {{ $init->number }}
                                    </span>
                                    <span class="text-[11px] sm:text-[11.5px] font-medium text-gray-800 leading-tight line-clamp-2">
                                        {{ $iTitle }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="text-xs text-gray-500 leading-relaxed py-2">
                        {{ $trans?->short_description ?? '' }}
                    </p>
                @endif
            </div>

            <!-- Soft Tinted CTA Pill Button (matches reference) -->
            <div class="pt-2 sm:pt-3">
                <a 
                    href="{{ route('our-work.show', $area->slug) }}" 
                    class="w-full py-1.5 sm:py-2 px-3 rounded-full text-center text-xs font-bold {{ $theme['cta_bg'] }} transition-all flex items-center justify-center space-x-1.5 shadow-sm hover:shadow"
                >
                    <span>{{ site_t('btn_learn_more', [], 'अधिक जाणून घ्या') }}</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition duration-200" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>

</div>
