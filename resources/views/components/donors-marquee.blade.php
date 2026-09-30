@php
    $donors = [
        [
            'name' => 'Tata Trusts',
            'sub' => 'Community Philanthropy',
            'color' => '#003D79',
            'accent' => '#0066B2',
            'icon' => 'tata',
        ],
        [
            'name' => 'Reliance Foundation',
            'sub' => 'Touching Lives',
            'color' => '#D32F2F',
            'accent' => '#002D62',
            'icon' => 'reliance',
        ],
        [
            'name' => 'Infosys Foundation',
            'sub' => 'Empowering Communities',
            'color' => '#007CC3',
            'accent' => '#00558A',
            'icon' => 'infosys',
        ],
        [
            'name' => 'HDFC Parivartan',
            'sub' => 'A Step Towards Progress',
            'color' => '#004C8F',
            'accent' => '#ED1C24',
            'icon' => 'hdfc',
        ],
        [
            'name' => 'SBI Foundation',
            'sub' => 'Service Beyond Banking',
            'color' => '#0091DF',
            'accent' => '#005A9C',
            'icon' => 'sbi',
        ],
        [
            'name' => 'Rotary International',
            'sub' => 'Service Above Self',
            'color' => '#00246B',
            'accent' => '#F7A81B',
            'icon' => 'rotary',
        ],
        [
            'name' => 'Lions Clubs Global',
            'sub' => 'We Serve',
            'color' => '#001A4E',
            'accent' => '#E5A823',
            'icon' => 'lions',
        ],
        [
            'name' => 'Mahindra Rise',
            'sub' => 'Empowering Lives',
            'color' => '#E31837',
            'accent' => '#1A1A1A',
            'icon' => 'mahindra',
        ],
        [
            'name' => 'Premji Philanthropies',
            'sub' => 'Equity & Education',
            'color' => '#0A7A44',
            'accent' => '#00585E',
            'icon' => 'premji',
        ],
        [
            'name' => 'Bajaj Foundation',
            'sub' => 'Sustainable Growth',
            'color' => '#003882',
            'accent' => '#0082CA',
            'icon' => 'bajaj',
        ],
    ];
@endphp

<!-- ==========================================
     OUR DONORS & CSR PARTNERS SECTION
     Infinite Auto-Moving Logo Marquee (Right to Left)
=========================================== -->
<section class="py-12 sm:py-16 bg-[#F8FAFC] border-t border-gray-100 overflow-hidden relative">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 sm:mb-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            
            <!-- Left: Section Title with Green Accent Bar -->
            <div>
                <div class="flex items-center space-x-2.5 mb-2">
                    <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-[#073B63] tracking-tight">
                        {{ site_t('donors_heading', [], 'आमचे देणगीदार') }}
                        <span class="text-gray-300 font-light mx-2">|</span>
                        <span class="text-base sm:text-xl font-bold text-gray-500">Our Donors</span>
                    </h2>
                </div>
                <p class="text-xs sm:text-sm text-gray-600 max-w-2xl leading-relaxed">
                    {{ site_t('donors_subheading', [], 'समाजाच्या सर्वांगीण विकासासाठी आमच्या कार्यात मोलाचा हातभार लावणारे सन्माननीय देणगीदार, CSR भागीदार व समर्थक.') }}
                </p>
            </div>

            <!-- Right: Action Button -->
            <div class="flex-shrink-0">
                <a href="{{ route('donate') }}" class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-full text-xs font-bold text-white bg-[#138A4B] hover:bg-[#0E6A39] shadow-sm hover:shadow transition transform hover:-translate-y-0.5">
                    <i data-lucide="heart" class="w-3.5 h-3.5 fill-white"></i>
                    <span>{{ site_t('donors_become_partner', [], 'देणगीदार / भागीदार व्हा') }} →</span>
                </a>
            </div>

        </div>
    </div>

    <!-- Marquee Container with Gradient Edge Masks -->
    <div class="relative w-full overflow-hidden">
        
        <!-- Left Gradient Mask -->
        <div class="absolute left-0 top-0 bottom-0 w-16 sm:w-32 bg-gradient-to-r from-[#F8FAFC] via-[#F8FAFC]/80 to-transparent z-10 pointer-events-none"></div>
        
        <!-- Right Gradient Mask -->
        <div class="absolute right-0 top-0 bottom-0 w-16 sm:w-32 bg-gradient-to-l from-[#F8FAFC] via-[#F8FAFC]/80 to-transparent z-10 pointer-events-none"></div>

        <!-- Infinite Scrolling Logo Track (Right to Left) -->
        <div class="animate-donor-marquee py-2 flex items-center space-x-4 sm:space-x-6">
            
            {{-- Loop Twice to guarantee a 100% seamless, stutter-free loop --}}
            @for ($loopCount = 0; $loopCount < 2; $loopCount++)
                @foreach ($donors as $donor)
                    <div 
                        class="group min-w-[200px] sm:min-w-[230px] h-[82px] sm:h-[90px] px-5 py-3 rounded-2xl bg-white border border-gray-200/70 hover:border-[#138A4B]/40 shadow-xs hover:shadow-md transition-all duration-300 flex items-center space-x-3.5 select-none cursor-pointer transform hover:-translate-y-1"
                        title="{{ $donor['name'] }} — {{ $donor['sub'] }}"
                    >
                        <!-- Donor Emblem / Logo Graphic -->
                        <div class="w-11 h-11 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-300 shadow-2xs">
                            @if ($donor['icon'] === 'tata')
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#003D79" fill-opacity="0.1"/>
                                    <path d="M10 14h20M20 14v16M13 19h14M16 24h8" stroke="#003D79" stroke-width="2.5" stroke-linecap="round"/>
                                </svg>
                            @elseif ($donor['icon'] === 'reliance')
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#D32F2F" fill-opacity="0.1"/>
                                    <circle cx="20" cy="17" r="5" fill="#D32F2F"/>
                                    <path d="M12 29c0-4.4 3.6-8 8-8s8 3.6 8 8" stroke="#002D62" stroke-width="2.5" stroke-linecap="round"/>
                                    <path d="M17 12l3-4 3 4" stroke="#D32F2F" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            @elseif ($donor['icon'] === 'infosys')
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#007CC3" fill-opacity="0.1"/>
                                    <path d="M13 14h6v12h-6zM21 20h6v6h-6z" fill="#007CC3"/>
                                    <circle cx="24" cy="15" r="2.5" fill="#007CC3"/>
                                </svg>
                            @elseif ($donor['icon'] === 'hdfc')
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#004C8F" fill-opacity="0.1"/>
                                    <rect x="12" y="12" width="16" height="16" rx="2" stroke="#004C8F" stroke-width="2"/>
                                    <path d="M16 12v16M24 12v16M12 20h16" stroke="#ED1C24" stroke-width="2"/>
                                </svg>
                            @elseif ($donor['icon'] === 'sbi')
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#0091DF" fill-opacity="0.1"/>
                                    <circle cx="20" cy="20" r="9" stroke="#0091DF" stroke-width="2.5"/>
                                    <path d="M20 20v7" stroke="#0091DF" stroke-width="3" stroke-linecap="round"/>
                                    <circle cx="20" cy="18" r="2.5" fill="white"/>
                                </svg>
                            @elseif ($donor['icon'] === 'rotary')
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#F7A81B" fill-opacity="0.12"/>
                                    <circle cx="20" cy="20" r="9" stroke="#00246B" stroke-width="2"/>
                                    <circle cx="20" cy="20" r="4" fill="#F7A81B"/>
                                    <path d="M20 9v3M20 28v3M9 20h3M28 20h3M12 12l2 2M26 26l2 2M12 28l2-2M26 14l2-2" stroke="#00246B" stroke-width="1.8"/>
                                </svg>
                            @elseif ($donor['icon'] === 'lions')
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#E5A823" fill-opacity="0.12"/>
                                    <circle cx="20" cy="20" r="9" fill="#001A4E"/>
                                    <text x="20" y="25" font-size="14" font-weight="900" fill="#E5A823" text-anchor="middle" font-family="sans-serif">L</text>
                                </svg>
                            @elseif ($donor['icon'] === 'mahindra')
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#E31837" fill-opacity="0.1"/>
                                    <path d="M12 26l8-14 8 14M16 21h8" stroke="#E31837" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            @elseif ($donor['icon'] === 'premji')
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#0A7A44" fill-opacity="0.1"/>
                                    <path d="M20 28V16M15 20c0-3 5-6 5-6s5 3 5 6-2 5-5 5-5-2-5-5z" stroke="#0A7A44" stroke-width="2" fill="#0A7A44" fill-opacity="0.2"/>
                                </svg>
                            @else
                                <svg class="w-7 h-7" viewBox="0 0 40 40" fill="none">
                                    <rect width="40" height="40" rx="8" fill="#003882" fill-opacity="0.1"/>
                                    <path d="M14 26V14l12 6-12 6z" fill="#003882"/>
                                </svg>
                            @endif
                        </div>

                        <!-- Brand Info -->
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs sm:text-[13px] font-bold text-gray-800 group-hover:text-[#073B63] transition-colors truncate leading-tight">
                                {{ $donor['name'] }}
                            </h4>
                            <p class="text-[10px] text-gray-400 group-hover:text-gray-500 transition-colors truncate mt-0.5 font-medium">
                                {{ $donor['sub'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @endfor

        </div>
    </div>

</section>
