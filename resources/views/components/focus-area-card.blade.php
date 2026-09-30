@props(['area'])

@php
    $locale = app()->getLocale();
    $trans = $area->translation($locale) ?? $area->translation('mr') ?? $area->translation('en');

    // ── Titles ──────────────────────────────────────────────
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
    $enLabel = $titles['en'][$area->slug] ?? '';
    $title   = $titles[$locale][$area->slug] ?? $titles['mr'][$area->slug] ?? ($trans?->title ?: $area->name);

    // ── Theme map ──────────────────────────────────────────
    $themeMap = [
        'pink'    => ['accent' => '#E11D48', 'light' => '#FFF1F2', 'num_bg' => '#FFE4E6', 'num_text' => '#BE123C', 'border' => '#FECDD3'],
        'green'   => ['accent' => '#16A34A', 'light' => '#F0FDF4', 'num_bg' => '#DCFCE7', 'num_text' => '#15803D', 'border' => '#BBF7D0'],
        'teal'    => ['accent' => '#0D9488', 'light' => '#F0FDFA', 'num_bg' => '#CCFBF1', 'num_text' => '#0F766E', 'border' => '#99F6E4'],
        'emerald' => ['accent' => '#059669', 'light' => '#ECFDF5', 'num_bg' => '#D1FAE5', 'num_text' => '#065F46', 'border' => '#A7F3D0'],
        'orange'  => ['accent' => '#EA580C', 'light' => '#FFF7ED', 'num_bg' => '#FFEDD5', 'num_text' => '#C2410C', 'border' => '#FED7AA'],
        'purple'  => ['accent' => '#7C3AED', 'light' => '#FAF5FF', 'num_bg' => '#EDE9FE', 'num_text' => '#6D28D9', 'border' => '#DDD6FE'],
        'rose'    => ['accent' => '#E11D48', 'light' => '#FFF1F2', 'num_bg' => '#FFE4E6', 'num_text' => '#BE123C', 'border' => '#FECDD3'],
        'blue'    => ['accent' => '#2563EB', 'light' => '#EFF6FF', 'num_bg' => '#DBEAFE', 'num_text' => '#1D4ED8', 'border' => '#BFDBFE'],
        'amber'   => ['accent' => '#D97706', 'light' => '#FFFBEB', 'num_bg' => '#FEF3C7', 'num_text' => '#92400E', 'border' => '#FDE68A'],
        'yellow'  => ['accent' => '#CA8A04', 'light' => '#FEFCE8', 'num_bg' => '#FEF9C3', 'num_text' => '#854D0E', 'border' => '#FEF08A'],
    ];
    $color = $area->color ?: 'teal';
    $t = $themeMap[$color] ?? $themeMap['teal'];

    // ── Icon map ───────────────────────────────────────────
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

    // ── ALL Initiatives (complete list, no truncation) ─────
    $allInitiatives = [
        'education' => [
            'mr' => ['शालेय साहित्य वितरण','गरजू विद्यार्थ्यांना शैक्षणिक मदत','शिष्यवृत्ती सहाय्य','डिजिटल शिक्षण','करिअर मार्गदर्शन शिबिरे','स्पर्धा परीक्षा मार्गदर्शन','वाचनालय व अभ्यासिका सुविधा','गुणवंत विद्यार्थ्यांचा सत्कार','शाळाबाह्य मुलांना शिक्षणाशी जोडणे','डिजिटल साक्षरता अभियान'],
            'hi' => ['स्कूली सामग्री वितरण','जरूरतमंद विद्यार्थियों को सहायता','छात्रवृत्ति सहायता','डिजिटल शिक्षा','करियर मार्गदर्शन शिविर','प्रतियोगी परीक्षा मार्गदर्शन','पुस्तकालय एवं अध्ययन कक्ष','प्रतिभाशाली विद्यार्थियों का सम्मान','वंचित बच्चों को शिक्षा से जोड़ना','डिजिटल साक्षरता अभियान'],
            'en' => ['Distribution of School Kits','Academic Aid for Students','Merit Scholarships','Smart Digital Classes','Career Guidance Seminars','Competitive Exam Coaching','Library & Study Rooms','Merit Student Felicitation','Enrolling Out-of-School Children','Digital Literacy Drives'],
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
            'en' => ['Early Child Education Program','School Kit Assistance','Nutritional Meal Distribution','Pediatric Health Checkups','Support for Orphans & Underprivileged','Sports & Cultural Events','Child Rights Advocacy','Personality Development Programs'],
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
            'mr' => ['दिव्यांग व्यक्तींना आवश्यक साहित्य','व्हीलचेअर व सहाय्यक उपकरणांचे वितरण','आरोग्य तपासणी शिबिरे','सरकारी योजनांची माहिती','प्रमाणपत्र व कागदपत्र मार्गदर्शन','वृद्धांसाठी आरोग्य सहाय्य','वृद्धाश्रमांना मदत','सामाजिक व भावनिक आधार कार्यक्रम'],
            'hi' => ['दिव्यांगजनों को सहायक उपकरण','व्हीलचेयर एवं बैसाखी वितरण','नियमित स्वास्थ्य जांच शिविर','सरकारी योजनाओं की जानकारी','प्रमाण पत्र एवं दस्तावेज सहायता','वरिष्ठजनों के लिए स्वास्थ्य सहायता','वृद्धाश्रमों को सहायता','सामाजिक एवं भावनात्मक संबल'],
            'en' => ['Assistive Aids for Divyang Persons','Wheelchair & Crutches Distribution','Special Health Checkup Camps','Government Schemes Guidance','Disability Certificate Aid','Elderly Medical Care Support','Support for Old Age Homes','Emotional & Social Counseling'],
        ],
        'youth-employment' => [
            'mr' => ['करिअर मार्गदर्शन','रोजगार मेळावे','कौशल्य विकास प्रशिक्षण','स्पर्धा परीक्षा मार्गदर्शन','उद्योजकता प्रशिक्षण','डिजिटल कौशल्य प्रशिक्षण','मुलाखत व व्यक्तिमत्त्व विकास','स्टार्टअप व स्वयंरोजगार मार्गदर्शन'],
            'hi' => ['करियर काउंसलिंग','रोजगार मेला आयोजन','कौशल संवर्धन प्रशिक्षण','प्रतियोगी परीक्षा मार्गदर्शन','उद्यमिता विकास प्रशिक्षण','डिजिटल कौशल प्रशिक्षण','साक्षात्कार एवं व्यक्तित्व विकास','स्टार्टअप एवं स्वरोजगार संबल'],
            'en' => ['Career Guidance & Counseling','Job Fairs & Recruitment Drives','Skill Development Training','Competitive Exam Coaching','Entrepreneurship Training','Digital Skills & IT Training','Interview Prep & Personality','Startup & Self-Employment Guidance'],
        ],
        'rural-development' => [
            'mr' => ['ग्रामस्वच्छता','पाणी व स्वच्छता जनजागृती','आरोग्य व शिक्षण उपक्रम','महिला बचत गट','शेतकरी मार्गदर्शन','कौशल्य विकास','डिजिटल साक्षरता','सरकारी योजनांची माहिती','ग्रामविकास व सामाजिक जनजागृती'],
            'hi' => ['ग्राम स्वच्छता अभियान','स्वच्छ पेयजल व स्वच्छता जागरूकता','स्वास्थ्य एवं शिक्षा कार्यक्रम','महिला बचत समूह','किसान मार्गदर्शन एवं प्रशिक्षण','ग्रामीण कौशल विकास','डिजिटल ग्राम साक्षरता','ग्रामीण कल्याणकारी योजनाएं','समग्र ग्राम विकास जागरूकता'],
            'en' => ['Village Sanitation Drives','Clean Water & Hygiene Awareness','Rural Health & Education Programs','Women Self-Help Groups','Farmer Support & Guidance','Rural Skills Training','Village Digital Literacy','Government Rural Welfare Schemes','Holistic Village Development'],
        ],
    ];

    // Prefer DB initiatives, fallback to canonical
    $langKey      = in_array($locale, ['mr','hi','en']) ? $locale : 'mr';
    $initiatives  = [];

    if (!empty($area->initiatives) && $area->initiatives->count() > 0) {
        foreach ($area->initiatives as $init) {
            $iTrans = $init->translation($locale) ?? $init->translation('mr') ?? $init->translation('en');
            if ($iTrans?->title) {
                $initiatives[] = ['n' => $init->order ?: (count($initiatives)+1), 'text' => $iTrans->title];
            }
        }
    }

    if (empty($initiatives)) {
        $raw = $allInitiatives[$area->slug][$langKey] ?? $allInitiatives[$area->slug]['mr'] ?? [];
        foreach ($raw as $i => $text) {
            $initiatives[] = ['n' => $i+1, 'text' => $text];
        }
    }

    // Split into 2 columns
    $total = count($initiatives);
    $half  = (int) ceil($total / 2);
    $col1  = array_slice($initiatives, 0, $half);
    $col2  = array_slice($initiatives, $half);

    // Image
    $localPath = 'images/focus-areas/' . $area->slug . '.jpg';
    $imgUrl = file_exists(public_path($localPath))
        ? asset($localPath)
        : 'https://images.unsplash.com/photo-1509099652299-30938b0aeb63?auto=format&fit=crop&w=800&q=80';
@endphp

{{--
    FOCUS AREA CARD — Horizontal Layout
    ┌──────────────────────────────────────────────────────────┐
    │  [  PHOTO (40%)  ]  │  Title · Sub · Initiatives · CTA  │
    └──────────────────────────────────────────────────────────┘
--}}
<div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col sm:flex-row h-full">

    {{-- ── LEFT: Photo with floating icon badge ── --}}
    <div class="relative w-full sm:w-[40%] lg:w-[38%] flex-shrink-0 overflow-hidden" style="min-height: 240px;">
        <img
            src="{{ $imgUrl }}"
            alt="{{ $title }}"
            loading="lazy"
            class="absolute inset-0 w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1509099652299-30938b0aeb63?auto=format&fit=crop&w=800&q=80';"
        />

        {{-- Subtle gradient on right edge to blend into content --}}
        <div class="absolute inset-y-0 right-0 w-10 bg-gradient-to-r from-transparent to-white/10 pointer-events-none hidden sm:block"></div>

        {{-- Icon badge — top-left ─────────────────────────── --}}
        <div
            class="absolute top-3 left-3 w-11 h-11 rounded-xl flex items-center justify-center shadow-lg ring-2 ring-white/50 z-10"
            style="background-color: {{ $t['accent'] }};"
            aria-hidden="true"
        >
            <i data-lucide="{{ $icon }}" class="w-5 h-5 text-white stroke-[2.2]"></i>
        </div>

        {{-- Title overlay on image bottom ───────────────────  --}}
        <div class="absolute bottom-0 left-0 right-0 p-4 z-10" style="background: linear-gradient(to top, rgba(0,0,0,0.72) 0%, transparent 100%);">
            <h3 class="text-white font-black text-lg leading-tight">
                <a href="{{ route('our-work.show', $area->slug) }}">{{ $title }}</a>
            </h3>
            @if($enLabel && $locale !== 'en')
                <p class="text-white/65 text-[11px] font-semibold tracking-widest uppercase mt-0.5">{{ $enLabel }}</p>
            @endif
        </div>
    </div>

    {{-- ── RIGHT: Content ── --}}
    <div class="flex-1 flex flex-col p-4 sm:p-5" style="background-color: {{ $t['light'] }};">

        {{-- Accent underline ──────────────────────────────── --}}
        <div class="w-8 h-[3px] rounded-full mb-3 flex-shrink-0" style="background-color: {{ $t['accent'] }};"></div>

        {{-- ALL Initiatives — 2-column numbered list ──────── --}}
        @if($total > 0)
            <div class="grid grid-cols-2 gap-x-3 gap-y-1.5 mb-4 flex-1">

                {{-- Column 1 --}}
                <div class="space-y-1.5">
                    @foreach($col1 as $item)
                        <div class="flex items-start gap-1.5">
                            <span
                                class="mt-0.5 w-[18px] h-[18px] min-w-[18px] rounded-full flex items-center justify-center text-[9px] font-black leading-none flex-shrink-0"
                                style="background-color: {{ $t['num_bg'] }}; color: {{ $t['num_text'] }};"
                            >{{ $item['n'] }}</span>
                            <span class="text-[11.5px] font-medium text-gray-700 leading-snug">{{ $item['text'] }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Column 2 --}}
                <div class="space-y-1.5">
                    @foreach($col2 as $item)
                        <div class="flex items-start gap-1.5">
                            <span
                                class="mt-0.5 w-[18px] h-[18px] min-w-[18px] rounded-full flex items-center justify-center text-[9px] font-black leading-none flex-shrink-0"
                                style="background-color: {{ $t['num_bg'] }}; color: {{ $t['num_text'] }};"
                            >{{ $item['n'] }}</span>
                            <span class="text-[11.5px] font-medium text-gray-700 leading-snug">{{ $item['text'] }}</span>
                        </div>
                    @endforeach
                </div>

            </div>
        @endif

        {{-- CTA Button ────────────────────────────────────── --}}
        <div class="pt-3 border-t flex-shrink-0" style="border-color: {{ $t['border'] }};">
            <a
                href="{{ route('our-work.show', $area->slug) }}"
                class="inline-flex items-center gap-2 px-5 py-2 rounded-full text-[12px] font-bold text-white transition-all shadow-sm hover:shadow-md hover:opacity-90"
                style="background-color: {{ $t['accent'] }};"
            >
                {{ site_t('btn_learn_more', [], 'अधिक जाणून घ्या') }}
                <i data-lucide="arrow-right" class="w-3.5 h-3.5" aria-hidden="true"></i>
            </a>
        </div>

    </div>
</div>
