@props(['area'])

@php
    $locale = app()->getLocale();
    $trans = $area->translation($locale) ?? $area->translation('mr') ?? $area->translation('en');

    // Canonical English subtitles
    $canonicalSubtitles = [
        'education'         => 'Education',
        'healthcare'        => 'Healthcare',
        'women-empowerment' => 'Women Empowerment',
        'child-welfare'     => 'Child Welfare',
        'environment'       => 'Environment',
        'social-welfare'    => 'Social Welfare',
        'divyang-senior'    => 'Divyang & Senior Welfare',
        'youth-employment'  => 'Youth & Employment',
        'rural-development' => 'Rural Development',
    ];

    // Canonical Marathi titles
    $canonicalMarathiTitles = [
        'education'         => 'शिक्षण क्षेत्रातील उपक्रम',
        'healthcare'        => 'आरोग्य क्षेत्रातील उपक्रम',
        'women-empowerment' => 'महिला सक्षमीकरण',
        'child-welfare'     => 'बालकल्याण',
        'environment'       => 'पर्यावरण',
        'social-welfare'    => 'सामाजिक सेवा',
        'divyang-senior'    => 'दिव्यांग व वृद्ध कल्याण',
        'youth-employment'  => 'युवक व रोजगार',
        'rural-development' => 'ग्रामीण विकास',
    ];

    // Canonical Hindi titles
    $canonicalHindiTitles = [
        'education'         => 'शिक्षा क्षेत्र के उपक्रम',
        'healthcare'        => 'स्वास्थ्य क्षेत्र के उपक्रम',
        'women-empowerment' => 'महिला सशक्तिकरण',
        'child-welfare'     => 'बाल कल्याण',
        'environment'       => 'पर्यावरण संरक्षण',
        'social-welfare'    => 'सामाजिक सेवा',
        'divyang-senior'    => 'दिव्यांग एवं वरिष्ठ कल्याण',
        'youth-employment'  => 'युवा एवं रोजगार',
        'rural-development' => 'ग्रामीण विकास',
    ];

    if ($locale === 'hi') {
        $title    = $canonicalHindiTitles[$area->slug] ?? ($trans?->title ?: $area->name);
        $subtitle = $canonicalSubtitles[$area->slug] ?? '';
    } elseif ($locale === 'en') {
        $title    = $canonicalSubtitles[$area->slug] ?? ($trans?->title ?: $area->name);
        $subtitle = '';
    } else {
        // Marathi (default)
        $title    = $canonicalMarathiTitles[$area->slug] ?? ($trans?->title ?: $area->name);
        $subtitle = $canonicalSubtitles[$area->slug] ?? '';
    }

    $color = $area->color ?: 'teal';

    // Theme map — pastel card background + icon colors matching reference
    $themeMap = [
        'pink'   => ['card_bg' => 'bg-[#FFF5F7]', 'card_border' => 'border-[#FFD6DC]', 'circle' => 'bg-[#E11D48] text-white', 'num_bg' => 'bg-[#FFE4E6] text-[#BE123C]', 'cta_bg' => 'bg-[#FFE4E6] text-[#BE123C] hover:bg-[#FECDD3]'],
        'teal'   => ['card_bg' => 'bg-[#F0FFFE]', 'card_border' => 'border-[#CCFBF1]', 'circle' => 'bg-[#0D9488] text-white', 'num_bg' => 'bg-[#CCFBF1] text-[#0F766E]', 'cta_bg' => 'bg-[#CCFBF1] text-[#0F766E] hover:bg-[#99F6E4]'],
        'green'  => ['card_bg' => 'bg-[#F0FDF4]', 'card_border' => 'border-[#BBFCD9]', 'circle' => 'bg-[#16A34A] text-white', 'num_bg' => 'bg-[#DCFCE7] text-[#15803D]', 'cta_bg' => 'bg-[#DCFCE7] text-[#15803D] hover:bg-[#BBF7D0]'],
        'emerald'=> ['card_bg' => 'bg-[#ECFDF5]', 'card_border' => 'border-[#A7F3D0]', 'circle' => 'bg-[#059669] text-white', 'num_bg' => 'bg-[#D1FAE5] text-[#065F46]', 'cta_bg' => 'bg-[#D1FAE5] text-[#065F46] hover:bg-[#A7F3D0]'],
        'orange' => ['card_bg' => 'bg-[#FFF7ED]', 'card_border' => 'border-[#FED7AA]', 'circle' => 'bg-[#EA580C] text-white', 'num_bg' => 'bg-[#FFEDD5] text-[#C2410C]', 'cta_bg' => 'bg-[#FFEDD5] text-[#C2410C] hover:bg-[#FED7AA]'],
        'purple' => ['card_bg' => 'bg-[#FAF5FF]', 'card_border' => 'border-[#DDD6FE]', 'circle' => 'bg-[#7C3AED] text-white', 'num_bg' => 'bg-[#EDE9FE] text-[#6D28D9]', 'cta_bg' => 'bg-[#EDE9FE] text-[#6D28D9] hover:bg-[#DDD6FE]'],
        'rose'   => ['card_bg' => 'bg-[#FFF1F2]', 'card_border' => 'border-[#FECDD3]', 'circle' => 'bg-[#E11D48] text-white', 'num_bg' => 'bg-[#FFE4E6] text-[#BE123C]', 'cta_bg' => 'bg-[#FFE4E6] text-[#BE123C] hover:bg-[#FECDD3]'],
        'blue'   => ['card_bg' => 'bg-[#EFF6FF]', 'card_border' => 'border-[#BFDBFE]', 'circle' => 'bg-[#2563EB] text-white', 'num_bg' => 'bg-[#DBEAFE] text-[#1D4ED8]', 'cta_bg' => 'bg-[#DBEAFE] text-[#1D4ED8] hover:bg-[#BFDBFE]'],
        'amber'  => ['card_bg' => 'bg-[#FFFBEB]', 'card_border' => 'border-[#FDE68A]', 'circle' => 'bg-[#D97706] text-white', 'num_bg' => 'bg-[#FEF3C7] text-[#92400E]', 'cta_bg' => 'bg-[#FEF3C7] text-[#92400E] hover:bg-[#FDE68A]'],
        'yellow' => ['card_bg' => 'bg-[#FEFCE8]', 'card_border' => 'border-[#FEF08A]', 'circle' => 'bg-[#CA8A04] text-white', 'num_bg' => 'bg-[#FEF9C3] text-[#854D0E]', 'cta_bg' => 'bg-[#FEF9C3] text-[#854D0E] hover:bg-[#FEF08A]'],
    ];
    $theme = $themeMap[$color] ?? $themeMap['teal'];

    // Icon mapping
    $iconMap = [
        'education'         => 'book-open',
        'healthcare'        => 'activity',
        'women-empowerment' => 'users',
        'child-welfare'     => 'smile',
        'environment'       => 'sprout',
        'social-welfare'    => 'heart-handshake',
        'divyang-senior'    => 'accessibility',
        'youth-employment'  => 'user-check',
        'rural-development' => 'home',
    ];
    $icon = $iconMap[$area->slug] ?? ($area->icon ?: 'heart');

    // All canonical initiative data — full text, NO TRUNCATION
    $fallbackData = [
        'education' => [
            'mr' => ['शालेय साहित्य वितरण','गरजू विद्यार्थ्यांना शैक्षणिक मदत','शिष्यवृत्ती सहाय्य','डिजिटल शिक्षण','करिअर मार्गदर्शन शिबिरे','स्पर्धा परीक्षा मार्गदर्शन','वाचनालय व अभ्यासिका सुविधा','गुणवंत विद्यार्थ्यांचा सत्कार','शाळाबाह्य मुलांना शिक्षणाशी जोडणे','डिजिटल साक्षरता अभियान'],
            'hi' => ['स्कूली सामग्री वितरण','जरूरतमंद विद्यार्थियों को सहायता','छात्रवृत्ति सहायता','डिजिटल शिक्षा','करियर मार्गदर्शन शिविर','प्रतियोगी परीक्षा मार्गदर्शन','पुस्तकालय एवं अध्ययन कक्ष','प्रतिभाशाली विद्यार्थियों का सम्मान','वंचित बच्चों को शिक्षा से जोड़ना','डिजिटल साक्षरता अभियान'],
            'en' => ['Distribution of Educational Kits','Financial Aid for Students','Merit Scholarships','Smart Digital Classes','Career Guidance Seminars','Competitive Exam Coaching','Library & Study Rooms','Merit Student Felicitation','Enrolling Out-of-School Children','Digital Literacy Drives'],
        ],
        'healthcare' => [
            'mr' => ['मोफत आरोग्य तपासणी शिबिरे','रक्तदान शिबिरे','नेत्र तपासणी शिबिरे','दंत तपासणी शिबिरे','महिला आरोग्य जनजागृती','बाल आरोग्य व पोषण कार्यक्रम','मधुमेह व रक्तदाब तपासणी','औषध वितरण','आरोग्य जनजागृती अभियान','ग्रामीण भागातील आरोग्य सेवा'],
            'hi' => ['निःशुल्क स्वास्थ्य जांच शिविर','रक्तदान शिविर','नेत्र जांच शिविर','दंत चिकित्सा शिविर','महिला स्वास्थ्य जागरूकता','बाल स्वास्थ्य एवं पोषण','मधुमेह व रक्तचाप जांच','निःशुल्क दवा वितरण','स्वास्थ्य जागरूकता अभियान','ग्रामीण प्राथमिक स्वास्थ्य सेवा'],
            'en' => ['Free Health Checkup Camps','Blood Donation Drives','Eye Care Camps','Dental Care Camps',"Women's Health Awareness",'Child Health & Nutrition','Diabetes & BP Screenings','Free Medicine Distribution','Health Awareness Campaigns','Rural Healthcare Services'],
        ],
        'women-empowerment' => [
            'mr' => ['महिला बचत गट निर्मिती','कौशल्य विकास प्रशिक्षण','शिवणकाम व लघुउद्योग प्रशिक्षण','स्वयंरोजगार मार्गदर्शन','महिला उद्योजकता विकास','आर्थिक साक्षरता','महिला आरोग्य व स्वच्छता जनजागृती','कायदेविषयक मार्गदर्शन','महिला सुरक्षा जनजागृती'],
            'hi' => ['महिला स्वयं सहायता समूह गठन','कौशल विकास प्रशिक्षण','सिलाई एवं लघु उद्योग प्रशिक्षण','स्वरोजगार मार्गदर्शन','महिला उद्यमिता विकास','वित्तीय साक्षरता','स्वास्थ्य एवं स्वच्छता जागरूकता','कानूनी अधिकार मार्गदर्शन','महिला सुरक्षा जागरूकता'],
            'en' => ['Self-Help Group Formation','Skill Development Training','Tailoring & Small Enterprise','Self-Employment Guidance','Women Entrepreneurship','Financial Literacy','Health & Hygiene Awareness','Legal Rights Awareness','Women Safety Drives'],
        ],
        'child-welfare' => [
            'mr' => ['बालशिक्षण कार्यक्रम','शालेय साहित्य मदत','पोषण आहार वितरण','बाल आरोग्य तपासणी','अनाथ व गरजू मुलांना सहाय्य','क्रीडा व सांस्कृतिक उपक्रम','बालहक्क जनजागृती','व्यक्तिमत्त्व विकास कार्यक्रम'],
            'hi' => ['प्रारंभिक बाल शिक्षा कार्यक्रम','स्कूली सामग्री सहायता','पौष्टिक आहार वितरण','बाल स्वास्थ्य जांच','अनाथ व जरूरतमंद बच्चों को सहायता','खेलकूद एवं सांस्कृतिक कार्यक्रम','बाल अधिकार जागरूकता','व्यक्तित्व विकास कार्यक्रम'],
            'en' => ['Early Child Education','School Kit Assistance','Nutritional Meal Drives','Pediatric Health Checkups','Support for Underprivileged Children','Sports & Cultural Events','Child Rights Advocacy','Personality Development'],
        ],
        'environment' => [
            'mr' => ['वृक्षारोपण अभियान','वृक्षसंवर्धन','स्वच्छता अभियान','प्लास्टिकमुक्त अभियान','पाणी संवर्धन','जलसंधारण','पर्यावरण जनजागृती','कचरा व्यवस्थापन','हरित गाव अभियान'],
            'hi' => ['वृक्षारोपण अभियान','वृक्ष संरक्षण','स्वच्छता अभियान','प्लास्टिक मुक्त अभियान','जल संरक्षण','जल संचयन प्रबंधन','पर्यावरण जागरूकता','ठोस कचरा प्रबंधन','हरित ग्राम अभियान'],
            'en' => ['Tree Plantation Drives','Plant Care & Conservation','Cleanliness Drives','Plastic-Free Campaigns','Water Conservation','Watershed Management','Eco Awareness Programs','Waste Management','Green Village Projects'],
        ],
        'social-welfare' => [
            'mr' => ['अन्नदान','वस्त्रदान','गरीब व गरजू कुटुंबांना मदत','आपत्तीग्रस्तांना सहाय्य','वृद्धांना मदत','निराधार व्यक्तींना मदत','सणासुदीला गरजूंसाठी विशेष उपक्रम','सामाजिक जनजागृती कार्यक्रम'],
            'hi' => ['अन्न दान सेवा','वस्त्र दान अभियान','निर्धन परिवारों को सहायता','आपदा राहत सहायता','वृद्धजनों को सहायता','निराश्रितों को संबल','त्योहारों पर विशेष सहायता','सामाजिक जागरूकता कार्यक्रम'],
            'en' => ['Food Relief Distribution','Clothes Donation Drives','Aid for Impoverished Families','Disaster Relief Support','Elderly Care Assistance','Destitute Care Support','Festive Joy for the Needy','Social Literacy Campaigns'],
        ],
        'divyang-senior' => [
            'mr' => ['दिव्यांग व्यक्तींना आवश्यक साहित्य','व्हीलचेअर व सहाय्यक उपकरणांचे वितरण','आरोग्य तपासणी','सरकारी योजनांची माहिती','प्रमाणपत्र व कागदपत्र मार्गदर्शन','वृद्धांसाठी आरोग्य सहाय्य','वृद्धाश्रमांना मदत','सामाजिक व भावनिक आधार कार्यक्रम'],
            'hi' => ['दिव्यांगजनों को सहायक उपकरण','व्हीलचेयर वितरण','नियमित स्वास्थ्य जांच','सरकारी योजनाओं की जानकारी','प्रमाण पत्र एवं दस्तावेज सहायता','वरिष्ठजनों के लिए स्वास्थ्य सहायता','वृद्धाश्रमों को सहायता','सामाजिक एवं भावनात्मक संबल'],
            'en' => ['Assistive Aids for Divyang','Wheelchair & Crutches Distribution','Special Health Checkups','Government Schemes Guidance','Disability Certificate Aid','Elderly Medical Care','Support for Old Age Homes','Emotional & Social Counseling'],
        ],
        'youth-employment' => [
            'mr' => ['करिअर मार्गदर्शन','रोजगार मेळावे','कौशल्य विकास प्रशिक्षण','स्पर्धा परीक्षा मार्गदर्शन','उद्योजकता प्रशिक्षण','डिजिटल कौशल्य प्रशिक्षण','मुलाखत व व्यक्तिमत्त्व विकास','स्टार्टअप व स्वयंरोजगार मार्गदर्शन'],
            'hi' => ['करियर काउंसलिंग','रोजगार मेला आयोजन','कौशल संवर्धन प्रशिक्षण','प्रतियोगी परीक्षा मार्गदर्शन','उद्यमिता विकास प्रशिक्षण','डिजिटल कौशल प्रशिक्षण','साक्षात्कार व व्यक्तित्व विकास','स्टार्टअप एवं स्वरोजगार संबल'],
            'en' => ['Career Guidance & Counseling','Job Fairs & Recruitment Drives','Skill Development Training','Competitive Exam Coaching','Entrepreneurship Training','Digital Skills & IT Training','Interview Prep & Personality','Startup & Self-Employment Guidance'],
        ],
        'rural-development' => [
            'mr' => ['ग्रामस्वच्छता','पाणी व स्वच्छता जनजागृती','आरोग्य व शिक्षण उपक्रम','महिला बचत गट','शेतकरी मार्गदर्शन','कौशल्य विकास','डिजिटल साक्षरता','सरकारी योजनांची माहिती','ग्रामविकास व सामाजिक जनजागृती'],
            'hi' => ['ग्राम स्वच्छता अभियान','स्वच्छ पेयजल व स्वच्छता जागरूकता','स्वास्थ्य एवं शिक्षा कार्यक्रम','महिला बचत समूह','किसान मार्गदर्शन एवं प्रशिक्षण','ग्रामीण कौशल विकास','डिजिटल ग्राम साक्षरता','ग्रामीण कल्याणकारी योजनाएं','समग्र ग्राम विकास जागरूकता'],
            'en' => ['Village Sanitation Drives','Clean Water Awareness','Rural Health & Education','Rural Self-Help Groups','Farmer Support & Guidance','Rural Skills Training','Village Digital Literacy','Government Rural Schemes','Holistic Village Development'],
        ],
    ];

    // Build initiatives list from DB first, fallback to canonical data
    $initiativesList = [];
    if (!empty($area->initiatives) && $area->initiatives->count() > 0) {
        foreach ($area->initiatives as $init) {
            $iTrans = $init->translation($locale) ?? $init->translation('mr') ?? $init->translation('en');
            if ($iTrans && $iTrans->title) {
                $initiativesList[] = [
                    'number' => $init->order ?: (count($initiativesList) + 1),
                    'title'  => $iTrans->title,
                ];
            }
        }
    }

    // If DB gave us nothing, use canonical fallback
    if (empty($initiativesList)) {
        $langKey = in_array($locale, ['mr','hi','en']) ? $locale : 'mr';
        $rawList = $fallbackData[$area->slug][$langKey] ?? $fallbackData[$area->slug]['mr'] ?? [];
        foreach ($rawList as $idx => $text) {
            $initiativesList[] = [
                'number' => $idx + 1,
                'title'  => $text,
            ];
        }
    }

    $total = count($initiativesList);
    $half  = (int) ceil($total / 2);
    $col1  = array_slice($initiativesList, 0, $half);
    $col2  = array_slice($initiativesList, $half);

    // Image: prefer local file
    $localImagePath = 'images/focus-areas/' . $area->slug . '.jpg';
    $imgUrl = file_exists(public_path($localImagePath))
        ? asset($localImagePath)
        : (($area->image && !str_starts_with($area->image, 'http')) ? asset($area->image) : 'https://images.unsplash.com/photo-1509099652299-30938b0aeb63?auto=format&fit=crop&w=800&q=80');
@endphp

{{-- ============================================================
     FOCUS AREA CARD — Matches reference IMAGE 2 exactly
     White card, image LEFT (~40%), icon badge top-left,
     title + numbered 2-col list RIGHT, CTA pill bottom
     NO line-clamp — all initiative text fully visible
     ============================================================ --}}
<div class="bg-white rounded-2xl border {{ $theme['card_border'] }} shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col">

    {{-- TOP: Image (full width on mobile, left 40% on md+) + Content --}}
    <div class="flex flex-col sm:flex-row flex-1">

        {{-- LEFT — Documentary Photo with floating icon --}}
        <div class="relative w-full sm:w-[42%] lg:w-[40%] min-h-[200px] sm:min-h-[260px] flex-shrink-0 overflow-hidden bg-gray-100">
            <img
                src="{{ $imgUrl }}"
                alt="{{ $title }}"
                loading="lazy"
                class="w-full h-full object-cover object-center group-hover:scale-[1.04] transition-transform duration-500"
                onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1509099652299-30938b0aeb63?auto=format&fit=crop&w=800&q=80';"
            />

            {{-- Gradient overlay at bottom of image for depth --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent pointer-events-none"></div>

            {{-- Floating Icon Badge — top-left corner matching reference --}}
            <div class="absolute top-3 left-3 w-12 h-12 rounded-full {{ $theme['circle'] }} flex items-center justify-center shadow-lg ring-4 ring-white/80 z-10" aria-hidden="true">
                <i data-lucide="{{ $icon }}" class="w-6 h-6 stroke-[2]"></i>
            </div>
        </div>

        {{-- RIGHT — Content: Title, Subtitle, Numbered Initiatives --}}
        <div class="flex-1 flex flex-col justify-between p-4 sm:p-5 {{ $theme['card_bg'] }}">

            {{-- Title + Subtitle --}}
            <div>
                <div class="mb-3">
                    <h3 class="text-base sm:text-[17px] lg:text-lg font-extrabold text-[#0B2545] leading-snug tracking-tight group-hover:text-[#073B63] transition-colors">
                        <a href="{{ route('our-work.show', $area->slug) }}" class="hover:underline underline-offset-2">
                            {{ $title }}
                        </a>
                    </h3>
                    @if($subtitle)
                        <div class="text-[11px] sm:text-xs font-bold text-gray-400 tracking-widest uppercase mt-1">
                            {{ $subtitle }}
                        </div>
                    @endif
                    {{-- Thin accent underline --}}
                    <div class="mt-2 w-10 h-[3px] {{ str_replace('text-white','',$theme['circle']) }} rounded-full opacity-60"></div>
                </div>

                {{-- 2-Column Numbered Initiative List — NO line-clamp, full text visible --}}
                @if($total > 0)
                    <div class="grid grid-cols-2 gap-x-2.5 gap-y-1.5">
                        {{-- Column 1 --}}
                        <div class="space-y-1.5">
                            @foreach($col1 as $init)
                                <div class="flex items-start gap-1.5">
                                    <span class="w-[18px] h-[18px] min-w-[18px] rounded-full {{ $theme['num_bg'] }} flex items-center justify-center text-[9px] font-black mt-0.5 leading-none flex-shrink-0">
                                        {{ $init['number'] }}
                                    </span>
                                    <span class="text-[11px] sm:text-[11.5px] font-medium text-gray-700 leading-snug">
                                        {{ $init['title'] }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        {{-- Column 2 --}}
                        <div class="space-y-1.5">
                            @foreach($col2 as $init)
                                <div class="flex items-start gap-1.5">
                                    <span class="w-[18px] h-[18px] min-w-[18px] rounded-full {{ $theme['num_bg'] }} flex items-center justify-center text-[9px] font-black mt-0.5 leading-none flex-shrink-0">
                                        {{ $init['number'] }}
                                    </span>
                                    <span class="text-[11px] sm:text-[11.5px] font-medium text-gray-700 leading-snug">
                                        {{ $init['title'] }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- CTA Pill Button matching reference --}}
            <div class="mt-4 pt-3 border-t border-gray-100">
                <a
                    href="{{ route('our-work.show', $area->slug) }}"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-bold {{ $theme['cta_bg'] }} transition-all shadow-sm hover:shadow"
                >
                    <span>{{ site_t('btn_learn_more', [], 'अधिक जाणून घ्या') }}</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5" aria-hidden="true"></i>
                </a>
            </div>

        </div>
    </div>
</div>
