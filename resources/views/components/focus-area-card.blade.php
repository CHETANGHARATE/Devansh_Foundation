@props(['area'])

@php
    $locale = app()->getLocale();
    $trans = $area->translation($locale) ?? $area->translation('mr') ?? $area->translation('en');

    // Canonical titles per locale
    $titles = [
        'mr' => [
            'education'         => 'शिक्षण',
            'healthcare'        => 'आरोग्य',
            'women-empowerment' => 'महिला सक्षमीकरण',
            'child-welfare'     => 'बालकल्याण',
            'environment'       => 'पर्यावरण',
            'social-welfare'    => 'सामाजिक सेवा',
            'divyang-senior'    => 'दिव्यांग व वृद्ध कल्याण',
            'youth-employment'  => 'युवक व रोजगार',
            'rural-development' => 'ग्रामीण विकास',
        ],
        'hi' => [
            'education'         => 'शिक्षा',
            'healthcare'        => 'स्वास्थ्य',
            'women-empowerment' => 'महिला सशक्तिकरण',
            'child-welfare'     => 'बाल कल्याण',
            'environment'       => 'पर्यावरण',
            'social-welfare'    => 'सामाजिक सेवा',
            'divyang-senior'    => 'दिव्यांग एवं वरिष्ठ कल्याण',
            'youth-employment'  => 'युवा एवं रोजगार',
            'rural-development' => 'ग्रामीण विकास',
        ],
        'en' => [
            'education'         => 'Education',
            'healthcare'        => 'Healthcare',
            'women-empowerment' => 'Women Empowerment',
            'child-welfare'     => 'Child Welfare',
            'environment'       => 'Environment',
            'social-welfare'    => 'Social Welfare',
            'divyang-senior'    => 'Divyang & Senior Welfare',
            'youth-employment'  => 'Youth & Employment',
            'rural-development' => 'Rural Development',
        ],
    ];

    // English always shown as subtitle (bilingual)
    $englishLabels = $titles['en'];

    $title    = $titles[$locale][$area->slug] ?? $titles['mr'][$area->slug] ?? ($trans?->title ?: $area->name);
    $enLabel  = $englishLabels[$area->slug] ?? '';

    // Short description per locale
    $descriptions = [
        'mr' => [
            'education'         => 'दर्जेदार शिक्षणाद्वारे विद्यार्थ्यांचे जीवन उज्ज्वल करण्यासाठी आम्ही कार्यरत आहोत.',
            'healthcare'        => 'सर्वांना परवडेल अशा आरोग्य सेवा उपलब्ध करून देणे हे आमचे ध्येय आहे.',
            'women-empowerment' => 'महिलांना आत्मनिर्भर बनविण्यासाठी कौशल्य विकास व प्रशिक्षण उपक्रम.',
            'child-welfare'     => 'प्रत्येक बालकाला निरोगी व सुरक्षित बालपण मिळावे यासाठी आमचे प्रयत्न.',
            'environment'       => 'हरित व स्वच्छ भविष्यासाठी पर्यावरण संरक्षणाचे उपक्रम.',
            'social-welfare'    => 'समाजातील गरजू व वंचित घटकांना सहाय्य करण्यासाठी आम्ही सदैव तत्पर.',
            'divyang-senior'    => 'दिव्यांग व वृद्ध व्यक्तींना सन्मानाने जगण्यासाठी सहाय्य.',
            'youth-employment'  => 'युवकांना रोजगार व स्वयंरोजगारासाठी सक्षम बनविणे.',
            'rural-development' => 'ग्रामीण जनतेच्या सर्वांगीण विकासासाठी शाश्वत उपक्रम.',
        ],
        'hi' => [
            'education'         => 'गुणवत्तापूर्ण शिक्षा से विद्यार्थियों का भविष्य उज्ज्वल करना हमारा लक्ष्य है।',
            'healthcare'        => 'सभी के लिए सुलभ और किफायती स्वास्थ्य सेवाएं उपलब्ध कराना हमारा उद्देश्य।',
            'women-empowerment' => 'महिलाओं को आत्मनिर्भर बनाने हेतु कौशल विकास एवं प्रशिक्षण कार्यक्रम।',
            'child-welfare'     => 'हर बच्चे को स्वस्थ और सुरक्षित बचपन मिले इसके लिए हम प्रयासरत हैं।',
            'environment'       => 'हरित और स्वच्छ भविष्य के लिए पर्यावरण संरक्षण के अभियान।',
            'social-welfare'    => 'समाज के जरूरतमंद और वंचित वर्गों की सहायता के लिए हम सदैव तत्पर।',
            'divyang-senior'    => 'दिव्यांग एवं वरिष्ठ नागरिकों को सम्मानजनक जीवन जीने में सहायता।',
            'youth-employment'  => 'युवाओं को रोजगार एवं स्वरोजगार के लिए सक्षम बनाना।',
            'rural-development' => 'ग्रामीण जनता के सर्वांगीण विकास के लिए सतत उपक्रम।',
        ],
        'en' => [
            'education'         => 'Empowering students with quality education for a brighter and better future.',
            'healthcare'        => 'Making accessible and affordable healthcare available for every community.',
            'women-empowerment' => 'Building self-reliant women through skill training and entrepreneurship programs.',
            'child-welfare'     => 'Ensuring every child enjoys a healthy, safe and nurturing childhood.',
            'environment'       => 'Championing green initiatives for a cleaner and sustainable tomorrow.',
            'social-welfare'    => 'Standing alongside the most vulnerable members of our society.',
            'divyang-senior'    => 'Supporting divyang and elderly individuals to live with dignity.',
            'youth-employment'  => 'Preparing youth for employment, self-employment and entrepreneurship.',
            'rural-development' => 'Driving holistic and sustainable development in rural communities.',
        ],
    ];
    $description = $descriptions[$locale][$area->slug] ?? $descriptions['mr'][$area->slug] ?? '';

    // Theme map — one accent color per area
    $themeMap = [
        'pink'   => ['accent' => '#E11D48', 'light' => '#FFF1F2', 'badge' => '#FFE4E6', 'badge_text' => '#BE123C', 'btn' => '#FFF1F2', 'btn_text' => '#BE123C', 'btn_hover' => '#FECDD3', 'dot' => 'bg-[#E11D48]'],
        'green'  => ['accent' => '#16A34A', 'light' => '#F0FDF4', 'badge' => '#DCFCE7', 'badge_text' => '#15803D', 'btn' => '#F0FDF4', 'btn_text' => '#15803D', 'btn_hover' => '#BBF7D0', 'dot' => 'bg-[#16A34A]'],
        'teal'   => ['accent' => '#0D9488', 'light' => '#F0FDFA', 'badge' => '#CCFBF1', 'badge_text' => '#0F766E', 'btn' => '#F0FDFA', 'btn_text' => '#0F766E', 'btn_hover' => '#99F6E4', 'dot' => 'bg-[#0D9488]'],
        'emerald'=> ['accent' => '#059669', 'light' => '#ECFDF5', 'badge' => '#D1FAE5', 'badge_text' => '#065F46', 'btn' => '#ECFDF5', 'btn_text' => '#065F46', 'btn_hover' => '#A7F3D0', 'dot' => 'bg-[#059669]'],
        'orange' => ['accent' => '#EA580C', 'light' => '#FFF7ED', 'badge' => '#FFEDD5', 'badge_text' => '#C2410C', 'btn' => '#FFF7ED', 'btn_text' => '#C2410C', 'btn_hover' => '#FED7AA', 'dot' => 'bg-[#EA580C]'],
        'purple' => ['accent' => '#7C3AED', 'light' => '#FAF5FF', 'badge' => '#EDE9FE', 'badge_text' => '#6D28D9', 'btn' => '#FAF5FF', 'btn_text' => '#6D28D9', 'btn_hover' => '#DDD6FE', 'dot' => 'bg-[#7C3AED]'],
        'rose'   => ['accent' => '#E11D48', 'light' => '#FFF1F2', 'badge' => '#FFE4E6', 'badge_text' => '#BE123C', 'btn' => '#FFF1F2', 'btn_text' => '#BE123C', 'btn_hover' => '#FECDD3', 'dot' => 'bg-[#E11D48]'],
        'blue'   => ['accent' => '#2563EB', 'light' => '#EFF6FF', 'badge' => '#DBEAFE', 'badge_text' => '#1D4ED8', 'btn' => '#EFF6FF', 'btn_text' => '#1D4ED8', 'btn_hover' => '#BFDBFE', 'dot' => 'bg-[#2563EB]'],
        'amber'  => ['accent' => '#D97706', 'light' => '#FFFBEB', 'badge' => '#FEF3C7', 'badge_text' => '#92400E', 'btn' => '#FFFBEB', 'btn_text' => '#92400E', 'btn_hover' => '#FDE68A', 'dot' => 'bg-[#D97706]'],
        'yellow' => ['accent' => '#CA8A04', 'light' => '#FEFCE8', 'badge' => '#FEF9C3', 'badge_text' => '#854D0E', 'btn' => '#FEFCE8', 'btn_text' => '#854D0E', 'btn_hover' => '#FEF08A', 'dot' => 'bg-[#CA8A04]'],
    ];
    $color = $area->color ?: 'teal';
    $theme = $themeMap[$color] ?? $themeMap['teal'];

    // Icon mapping
    $iconMap = [
        'education'         => 'book-open',
        'healthcare'        => 'heart-pulse',
        'women-empowerment' => 'users',
        'child-welfare'     => 'baby',
        'environment'       => 'sprout',
        'social-welfare'    => 'hand-heart',
        'divyang-senior'    => 'accessibility',
        'youth-employment'  => 'briefcase',
        'rural-development' => 'home',
    ];
    $icon = $iconMap[$area->slug] ?? 'heart';

    // Top 5 key initiatives for badge display
    $allInitiatives = [
        'education'         => ['mr'=>['शालेय साहित्य वितरण','शिष्यवृत्ती सहाय्य','डिजिटल शिक्षण','करिअर मार्गदर्शन','स्पर्धा परीक्षा कोचिंग'],'hi'=>['स्कूली सामग्री वितरण','छात्रवृत्ति सहायता','डिजिटल शिक्षा','करियर मार्गदर्शन','प्रतियोगी परीक्षा'],'en'=>['School Kit Distribution','Merit Scholarships','Digital Classes','Career Guidance','Competitive Exam Coaching']],
        'healthcare'        => ['mr'=>['मोफत आरोग्य तपासणी','रक्तदान शिबिर','नेत्र तपासणी','बाल आरोग्य व पोषण','औषध वितरण'],'hi'=>['निःशुल्क स्वास्थ्य जांच','रक्तदान शिविर','नेत्र जांच','बाल स्वास्थ्य','दवा वितरण'],'en'=>['Free Health Camps','Blood Donation Drives','Eye Care Camps','Child Nutrition','Medicine Distribution']],
        'women-empowerment' => ['mr'=>['महिला बचत गट','कौशल्य विकास','शिवणकाम प्रशिक्षण','उद्योजकता विकास','आर्थिक साक्षरता'],'hi'=>['स्वयं सहायता समूह','कौशल विकास','सिलाई प्रशिक्षण','उद्यमिता विकास','वित्तीय साक्षरता'],'en'=>['Self-Help Groups','Skill Development','Tailoring Training','Entrepreneurship','Financial Literacy']],
        'child-welfare'     => ['mr'=>['बालशिक्षण कार्यक्रम','पोषण आहार','बाल आरोग्य तपासणी','क्रीडा उपक्रम','व्यक्तिमत्व विकास'],'hi'=>['बाल शिक्षा','पोषण आहार','स्वास्थ्य जांच','खेलकूद','व्यक्तित्व विकास'],'en'=>['Early Education','Nutritional Meals','Health Checkups','Sports & Culture','Personality Development']],
        'environment'       => ['mr'=>['वृक्षारोपण अभियान','स्वच्छता अभियान','प्लास्टिकमुक्त','पाणी संवर्धन','हरित गाव'],'hi'=>['वृक्षारोपण','स्वच्छता अभियान','प्लास्टिक मुक्त','जल संरक्षण','हरित ग्राम'],'en'=>['Tree Plantation','Cleanliness Drives','Plastic-Free Campaign','Water Conservation','Green Village']],
        'social-welfare'    => ['mr'=>['अन्नदान','वस्त्रदान','आपत्ती सहाय्य','वृद्धांना मदत','सामाजिक जनजागृती'],'hi'=>['अन्न दान','वस्त्र दान','आपदा राहत','वृद्ध सहायता','जागरूकता'],'en'=>['Food Relief','Clothes Donation','Disaster Relief','Elderly Care','Social Awareness']],
        'divyang-senior'    => ['mr'=>['व्हीलचेअर वितरण','आरोग्य तपासणी','सरकारी योजना माहिती','वृद्धाश्रम मदत','भावनिक आधार'],'hi'=>['व्हीलचेयर वितरण','स्वास्थ्य जांच','सरकारी योजना','वृद्धाश्रम सहायता','भावनात्मक संबल'],'en'=>['Wheelchair Distribution','Health Checkups','Govt Scheme Guidance','Old Age Home Support','Emotional Counseling']],
        'youth-employment'  => ['mr'=>['करिअर मार्गदर्शन','रोजगार मेळावे','कौशल्य प्रशिक्षण','उद्योजकता प्रशिक्षण','डिजिटल कौशल्य'],'hi'=>['करियर काउंसलिंग','रोजगार मेला','कौशल प्रशिक्षण','उद्यमिता','डिजिटल कौशल'],'en'=>['Career Counseling','Job Fairs','Skill Training','Entrepreneurship','Digital Skills']],
        'rural-development' => ['mr'=>['ग्रामस्वच्छता','शेतकरी मार्गदर्शन','महिला बचत गट','डिजिटल साक्षरता','सरकारी योजना'],'hi'=>['ग्राम स्वच्छता','किसान मार्गदर्शन','महिला बचत समूह','डिजिटल साक्षरता','सरकारी योजनाएं'],'en'=>['Village Sanitation','Farmer Guidance','Women Self-Help','Digital Literacy','Govt Rural Schemes']],
    ];

    $langKey = in_array($locale, ['mr','hi','en']) ? $locale : 'mr';
    $initiatives = $allInitiatives[$area->slug][$langKey] ?? $allInitiatives[$area->slug]['mr'] ?? [];

    // Image URL
    $localImagePath = 'images/focus-areas/' . $area->slug . '.jpg';
    $imgUrl = file_exists(public_path($localImagePath))
        ? asset($localImagePath)
        : 'https://images.unsplash.com/photo-1509099652299-30938b0aeb63?auto=format&fit=crop&w=800&q=80';
@endphp

{{-- ============================================================
     FOCUS AREA CARD — Professional Vertical Layout
     Large image top, icon overlay, title + desc + badges + CTA
     ============================================================ --}}
<div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-400 border border-gray-100 flex flex-col h-full">

    {{-- ─── IMAGE BLOCK (Top, full width) ─── --}}
    <div class="relative overflow-hidden" style="height: 220px;">

        {{-- Photo --}}
        <img
            src="{{ $imgUrl }}"
            alt="{{ $title }}"
            loading="lazy"
            class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1509099652299-30938b0aeb63?auto=format&fit=crop&w=800&q=80';"
        />

        {{-- Dark gradient overlay for text legibility --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent pointer-events-none"></div>

        {{-- Top-left: Icon badge --}}
        <div
            class="absolute top-3 left-3 w-11 h-11 rounded-xl flex items-center justify-center shadow-lg backdrop-blur-sm ring-2 ring-white/30 z-10"
            style="background-color: {{ $theme['accent'] }};"
            aria-hidden="true"
        >
            <i data-lucide="{{ $icon }}" class="w-5 h-5 text-white stroke-[2.2]"></i>
        </div>

        {{-- Bottom-left: Title overlay on image --}}
        <div class="absolute bottom-0 left-0 right-0 p-4 z-10">
            <h3 class="text-white font-black text-lg sm:text-xl leading-tight drop-shadow-sm">
                <a href="{{ route('our-work.show', $area->slug) }}" class="hover:underline underline-offset-2">
                    {{ $title }}
                </a>
            </h3>
            @if($enLabel && $locale !== 'en')
                <div class="text-white/70 text-[11px] font-semibold tracking-widest uppercase mt-0.5">
                    {{ $enLabel }}
                </div>
            @endif
        </div>

    </div>

    {{-- ─── CONTENT BLOCK (Below image) ─── --}}
    <div class="flex flex-col flex-1 p-5" style="background-color: {{ $theme['light'] }};">

        {{-- Accent line --}}
        <div class="w-10 h-[3px] rounded-full mb-3" style="background-color: {{ $theme['accent'] }};"></div>

        {{-- Description --}}
        <p class="text-sm text-gray-600 leading-relaxed mb-4 font-medium">
            {{ $description }}
        </p>

        {{-- Initiative Badges (5 key programs) --}}
        @if(count($initiatives) > 0)
            <div class="flex flex-wrap gap-2 mb-5">
                @foreach($initiatives as $item)
                    <span
                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-semibold border"
                        style="background-color: {{ $theme['badge'] }}; color: {{ $theme['badge_text'] }}; border-color: {{ $theme['badge'] }};"
                    >
                        <span class="w-1.5 h-1.5 rounded-full flex-shrink-0 {{ $theme['dot'] }}"></span>
                        {{ $item }}
                    </span>
                @endforeach
            </div>
        @endif

        {{-- Spacer --}}
        <div class="flex-1"></div>

        {{-- CTA Button --}}
        <div class="pt-3 border-t border-black/5">
            <a
                href="{{ route('our-work.show', $area->slug) }}"
                class="group/btn inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-bold transition-all duration-200 shadow-sm hover:shadow-md"
                style="background-color: {{ $theme['accent'] }}; color: white;"
            >
                <span>{{ site_t('btn_learn_more', [], 'अधिक जाणून घ्या') }}</span>
                <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover/btn:translate-x-0.5 transition-transform" aria-hidden="true"></i>
            </a>
        </div>

    </div>
</div>
