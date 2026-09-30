@props(['area'])

@php
    $locale = app()->getLocale();
    $trans = $area->translation($locale) ?? $area->translation('mr') ?? $area->translation('en');

    // ── Titles per locale ──────────────────────────────────
    $titles = [
        'mr' => [
            'education'         => 'शिक्षण क्षेत्रातील उपक्रम',
            'healthcare'        => 'आरोग्य क्षेत्रातील उपक्रम',
            'women-empowerment' => 'महिला सक्षमीकरण',
            'child-welfare'     => 'बालकल्याण',
            'environment'       => 'पर्यावरण',
            'social-welfare'    => 'सामाजिक सेवा',
            'divyang-senior'    => 'दिव्यांग व वृद्ध कल्याण',
            'youth-employment'  => 'युवक व रोजगार',
            'rural-development' => 'ग्रामीण विकास',
        ],
        'hi' => [
            'education'         => 'शिक्षा क्षेत्र के उपक्रम',
            'healthcare'        => 'स्वास्थ्य क्षेत्र के उपक्रम',
            'women-empowerment' => 'महिला सशक्तिकरण',
            'child-welfare'     => 'बाल कल्याण',
            'environment'       => 'पर्यावरण संरक्षण',
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

    // ── Theme map (pastel — matching reference image) ─────
    $themeMap = [
        'pink'    => ['card'  => '#FFF5F7', 'border' => '#FFD6DC', 'circle' => '#E11D48', 'num_bg' => '#FFE4E6', 'num_text' => '#BE123C', 'pill_bg' => '#FFE4E6', 'pill_text' => '#BE123C'],
        'green'   => ['card'  => '#F0FDF4', 'border' => '#BBFCD9', 'circle' => '#16A34A', 'num_bg' => '#DCFCE7', 'num_text' => '#15803D', 'pill_bg' => '#DCFCE7', 'pill_text' => '#15803D'],
        'teal'    => ['card'  => '#F0FDFA', 'border' => '#CCFBF1', 'circle' => '#0D9488', 'num_bg' => '#CCFBF1', 'num_text' => '#0F766E', 'pill_bg' => '#CCFBF1', 'pill_text' => '#0F766E'],
        'emerald' => ['card'  => '#ECFDF5', 'border' => '#A7F3D0', 'circle' => '#059669', 'num_bg' => '#D1FAE5', 'num_text' => '#065F46', 'pill_bg' => '#D1FAE5', 'pill_text' => '#065F46'],
        'orange'  => ['card'  => '#FFF7ED', 'border' => '#FED7AA', 'circle' => '#EA580C', 'num_bg' => '#FFEDD5', 'num_text' => '#C2410C', 'pill_bg' => '#FFEDD5', 'pill_text' => '#C2410C'],
        'purple'  => ['card'  => '#FAF5FF', 'border' => '#DDD6FE', 'circle' => '#7C3AED', 'num_bg' => '#EDE9FE', 'num_text' => '#6D28D9', 'pill_bg' => '#EDE9FE', 'pill_text' => '#6D28D9'],
        'rose'    => ['card'  => '#FFF1F2', 'border' => '#FECDD3', 'circle' => '#E11D48', 'num_bg' => '#FFE4E6', 'num_text' => '#BE123C', 'pill_bg' => '#FFE4E6', 'pill_text' => '#BE123C'],
        'blue'    => ['card'  => '#EFF6FF', 'border' => '#BFDBFE', 'circle' => '#2563EB', 'num_bg' => '#DBEAFE', 'num_text' => '#1D4ED8', 'pill_bg' => '#DBEAFE', 'pill_text' => '#1D4ED8'],
        'amber'   => ['card'  => '#FFFBEB', 'border' => '#FDE68A', 'circle' => '#D97706', 'num_bg' => '#FEF3C7', 'num_text' => '#92400E', 'pill_bg' => '#FEF3C7', 'pill_text' => '#92400E'],
        'yellow'  => ['card'  => '#FEFCE8', 'border' => '#FEF08A', 'circle' => '#CA8A04', 'num_bg' => '#FEF9C3', 'num_text' => '#854D0E', 'pill_bg' => '#FEF9C3', 'pill_text' => '#854D0E'],
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

    // ── ALL Initiatives (complete list per locale) ─────────
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
    $langKey     = in_array($locale, ['mr','hi','en']) ? $locale : 'mr';
    $initiatives = [];

    if (!empty($area->initiatives) && $area->initiatives->count() > 0) {
        foreach ($area->initiatives as $init) {
            $iT = $init->translation($locale) ?? $init->translation('mr') ?? $init->translation('en');
            if ($iT?->title) {
                $initiatives[] = ['n' => $init->order ?: (count($initiatives)+1), 'text' => $iT->title];
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

    // Image URL
    $localPath = 'images/focus-areas/' . $area->slug . '.jpg';
    $imgUrl = file_exists(public_path($localPath))
        ? asset($localPath)
        : 'https://images.unsplash.com/photo-1509099652299-30938b0aeb63?auto=format&fit=crop&w=600&q=80';
@endphp

{{--
    FOCUS AREA CARD — Exact match to reference image
    ┌─────────────────────────────────────────────────────┐
    │ [Photo] │ ○icon  Bold Title                         │
    │  ~30%   │        English Subtitle                   │
    │         │  ① item1    ⑥ item6                       │
    │         │  ② item2    ⑦ item7                       │
    │         │  ③ item3    ⑧ item8                       │
    │         │  ④ item4    ⑨ item9                       │
    │         │  ⑤ item5    ⑩ item10                      │
    │         │  [ अधिक जाणून घ्या → ]                    │
    └─────────────────────────────────────────────────────┘
--}}
<div
    class="group rounded-[18px] border overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col sm:flex-row"
    style="background-color: {{ $t['card'] }}; border-color: {{ $t['border'] }};"
>
    {{-- ── LEFT: Photo (30% width, full card height) ── --}}
    <div class="relative w-full sm:w-[30%] flex-shrink-0 overflow-hidden" style="min-height: 180px;">
        <img
            src="{{ $imgUrl }}"
            alt="{{ $title }}"
            loading="lazy"
            class="absolute inset-0 w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1509099652299-30938b0aeb63?auto=format&fit=crop&w=600&q=80';"
        />
    </div>

    {{-- ── RIGHT: Content (70% width) ── --}}
    <div class="flex-1 flex flex-col p-3 sm:p-4">

        {{-- Header: Circular icon + Title + Subtitle ────── --}}
        <div class="flex items-start gap-2.5 mb-2.5">

            {{-- Circular icon badge (matches reference exactly) --}}
            <div
                class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center shadow-md ring-2 ring-white"
                style="background-color: {{ $t['circle'] }};"
                aria-hidden="true"
            >
                <i data-lucide="{{ $icon }}" class="w-5 h-5 text-white stroke-[2.2]"></i>
            </div>

            <div class="flex-1 min-w-0">
                <h3 class="text-[15px] sm:text-base font-black text-gray-900 leading-snug">
                    <a href="{{ route('our-work.show', $area->slug) }}" class="hover:underline underline-offset-2">
                        {{ $title }}
                    </a>
                </h3>
                @if($enLabel && $locale !== 'en')
                    <p class="text-[10px] font-semibold text-gray-400 tracking-widest uppercase mt-0.5">
                        {{ $enLabel }}
                    </p>
                @endif
            </div>
        </div>

        {{-- Divider ─────────────────────────────────────── --}}
        <div class="w-full h-px mb-2.5" style="background-color: {{ $t['border'] }};"></div>

        {{-- ALL Initiative Points — 2-column numbered list ─ --}}
        @if($total > 0)
            <div class="grid grid-cols-2 gap-x-2 gap-y-1 flex-1 mb-2.5">

                {{-- Col 1 --}}
                <div class="space-y-1">
                    @foreach($col1 as $item)
                        <div class="flex items-start gap-1">
                            <span
                                class="mt-0.5 w-4 h-4 min-w-[16px] rounded-full flex items-center justify-center text-[8px] font-black leading-none flex-shrink-0"
                                style="background-color: {{ $t['num_bg'] }}; color: {{ $t['num_text'] }};"
                            >{{ $item['n'] }}</span>
                            <span class="text-[10.5px] sm:text-[11px] font-medium text-gray-700 leading-snug">{{ $item['text'] }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Col 2 --}}
                <div class="space-y-1">
                    @foreach($col2 as $item)
                        <div class="flex items-start gap-1">
                            <span
                                class="mt-0.5 w-4 h-4 min-w-[16px] rounded-full flex items-center justify-center text-[8px] font-black leading-none flex-shrink-0"
                                style="background-color: {{ $t['num_bg'] }}; color: {{ $t['num_text'] }};"
                            >{{ $item['n'] }}</span>
                            <span class="text-[10.5px] sm:text-[11px] font-medium text-gray-700 leading-snug">{{ $item['text'] }}</span>
                        </div>
                    @endforeach
                </div>

            </div>
        @endif

        {{-- CTA Pill (pastel, matches reference) ─────────── --}}
        <div class="mt-auto pt-2 border-t" style="border-color: {{ $t['border'] }};">
            <a
                href="{{ route('our-work.show', $area->slug) }}"
                class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-[11.5px] font-bold transition-all hover:opacity-80"
                style="background-color: {{ $t['pill_bg'] }}; color: {{ $t['pill_text'] }};"
            >
                {{ site_t('btn_learn_more', [], 'अधिक जाणून घ्या') }}
                <i data-lucide="arrow-right" class="w-3 h-3" aria-hidden="true"></i>
            </a>
        </div>

    </div>
</div>
