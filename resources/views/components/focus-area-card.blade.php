@props(['area'])

@php
    $locale = app()->getLocale();
    $trans = $area->translation($locale) ?? $area->translation('mr') ?? $area->translation('en');

    // Canonical English subtitles matching reference image
    $canonicalSubtitles = [
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

    // Canonical Marathi titles matching prompt verbatim
    $canonicalMarathiTitles = [
        'education' => 'शिक्षण क्षेत्रातील उपक्रम',
        'healthcare' => 'आरोग्य क्षेत्रातील उपक्रम',
        'women-empowerment' => 'महिला सक्षमीकरण',
        'child-welfare' => 'बालकल्याण',
        'environment' => 'पर्यावरण',
        'social-welfare' => 'सामाजिक सेवा',
        'divyang-senior' => 'दिव्यांग व वृद्ध कल्याण',
        'youth-employment' => 'युवक व रोजगार',
        'rural-development' => 'ग्रामीण विकास',
    ];

    // Canonical Hindi titles
    $canonicalHindiTitles = [
        'education' => 'शिक्षा क्षेत्र के उपक्रम',
        'healthcare' => 'स्वास्थ्य क्षेत्र के उपक्रम',
        'women-empowerment' => 'महिला सशक्तिकरण',
        'child-welfare' => 'बाल कल्याण',
        'environment' => 'पर्यावरण संरक्षण',
        'social-welfare' => 'सामाजिक सेवा',
        'divyang-senior' => 'दिव्यांग एवं वरिष्ठ कल्याण',
        'youth-employment' => 'युवा एवं रोजगार',
        'rural-development' => 'ग्रामीण विकास',
    ];

    if ($locale === 'mr') {
        $title = $trans?->title ?: ($canonicalMarathiTitles[$area->slug] ?? $area->name);
        $subtitle = $canonicalSubtitles[$area->slug] ?? '';
    } elseif ($locale === 'hi') {
        $title = $trans?->title ?: ($canonicalHindiTitles[$area->slug] ?? $area->name);
        $subtitle = $canonicalSubtitles[$area->slug] ?? '';
    } else {
        // English
        $title = $canonicalSubtitles[$area->slug] ?? ($trans?->title ?: $area->name);
        $subtitle = ''; // Do not repeat title in English
    }

    $color = $area->color ?: 'teal';
    
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

    // Icon mapping matching reference image
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

    // Initiatives list with resilient fallback from canonical prompt initiatives
    $initiativesList = [];
    if (!empty($area->initiatives) && $area->initiatives->count() > 0) {
        foreach ($area->initiatives as $init) {
            $iTrans = $init->translation($locale) ?? $init->translation('mr') ?? $init->translation('en');
            $initiativesList[] = [
                'number' => $init->number ?: $init->order,
                'title' => $iTrans?->title ?? '',
            ];
        }
    } else {
        // Fallback canonical initiatives directly from prompt specification
        $fallbackData = [
            'education' => [
                ['mr' => 'शालेय साहित्य वितरण', 'hi' => 'स्कूली सामग्री वितरण', 'en' => 'Distribution of Educational Kits'],
                ['mr' => 'गरजू विद्यार्थ्यांना शैक्षणिक मदत', 'hi' => 'जरूरतमंद विद्यार्थियों को शैक्षणिक सहायता', 'en' => 'Financial Aid for Students'],
                ['mr' => 'शिष्यवृत्ती सहाय्य', 'hi' => 'छात्रवृत्ति सहायता', 'en' => 'Merit Scholarships'],
                ['mr' => 'डिजिटल शिक्षण', 'hi' => 'डिजिटल शिक्षा', 'en' => 'Smart Digital Classes'],
                ['mr' => 'करिअर मार्गदर्शन शिबिरे', 'hi' => 'करियर मार्गदर्शन शिविर', 'en' => 'Career Guidance Seminars'],
                ['mr' => 'स्पर्धा परीक्षा मार्गदर्शन', 'hi' => 'प्रतियोगी परीक्षा मार्गदर्शन', 'en' => 'Competitive Exam Coaching'],
                ['mr' => 'वाचनालय व अभ्यासिका सुविधा', 'hi' => 'पुस्तकालय एवं अध्ययन कक्ष', 'en' => 'Library & Study Rooms'],
                ['mr' => 'गुणवंत विद्यार्थ्यांचा सत्कार', 'hi' => 'प्रतिभाशाली विद्यार्थियों का सम्मान', 'en' => 'Merit Student Felicitation'],
                ['mr' => 'शाळाबाह्य मुलांना शिक्षणाशी जोडणे', 'hi' => 'वंचित बच्चों को शिक्षा से जोड़ना', 'en' => 'Enrolling Out-of-School Children'],
                ['mr' => 'डिजिटल साक्षरता अभियान', 'hi' => 'डिजिटल साक्षरता अभियान', 'en' => 'Digital Literacy Drives'],
            ],
            'healthcare' => [
                ['mr' => 'मोफत आरोग्य तपासणी शिबिरे', 'hi' => 'निःशुल्क स्वास्थ्य जांच शिविर', 'en' => 'Free Health Checkup Camps'],
                ['mr' => 'रक्तदान शिबिरे', 'hi' => 'रक्तदान शिविर', 'en' => 'Blood Donation Drives'],
                ['mr' => 'नेत्र तपासणी शिबिरे', 'hi' => 'नेत्र जांच शिविर', 'en' => 'Eye Care Camps'],
                ['mr' => 'दंत तपासणी शिबिरे', 'hi' => 'दंत चिकित्सा शिविर', 'en' => 'Dental Care Camps'],
                ['mr' => 'महिला आरोग्य जनजागृती', 'hi' => 'महिला स्वास्थ्य जागरूकता', 'en' => "Women's Health Awareness"],
                ['mr' => 'बाल आरोग्य व पोषण कार्यक्रम', 'hi' => 'बाल स्वास्थ्य एवं पोषण', 'en' => 'Child Health & Nutrition'],
                ['mr' => 'मधुमेह व रक्तदाब तपासणी', 'hi' => 'मधुमेह व रक्तचाप जांच', 'en' => 'Diabetes & BP Screenings'],
                ['mr' => 'औषध वितरण', 'hi' => 'निःशुल्क दवा वितरण', 'en' => 'Free Medicine Distribution'],
                ['mr' => 'आरोग्य जनजागृती अभियान', 'hi' => 'स्वास्थ्य जागरूकता अभियान', 'en' => 'Health Awareness Campaigns'],
                ['mr' => 'ग्रामीण भागातील आरोग्य सेवा', 'hi' => 'ग्रामीण प्राथमिक स्वास्थ्य सेवा', 'en' => 'Rural Healthcare Services'],
            ],
            'women-empowerment' => [
                ['mr' => 'महिला बचत गट निर्मिती', 'hi' => 'महिला स्वयं सहायता समूह गठन', 'en' => 'Self-Help Group Formation'],
                ['mr' => 'कौशल्य विकास प्रशिक्षण', 'hi' => 'कौशल विकास प्रशिक्षण', 'en' => 'Skill Development Training'],
                ['mr' => 'शिवणकाम व लघुउद्योग प्रशिक्षण', 'hi' => 'सिलाई एवं लघु उद्योग प्रशिक्षण', 'en' => 'Tailoring & Small Enterprise'],
                ['mr' => 'स्वयंरोजगार मार्गदर्शन', 'hi' => 'स्वरोजगार मार्गदर्शन', 'en' => 'Self-Employment Guidance'],
                ['mr' => 'महिला उद्योजकता विकास', 'hi' => 'महिला उद्यमिता विकास', 'en' => 'Women Entrepreneurship'],
                ['mr' => 'आर्थिक साक्षरता', 'hi' => 'वित्तीय साक्षरता', 'en' => 'Financial Literacy'],
                ['mr' => 'महिला आरोग्य व स्वच्छता जनजागृती', 'hi' => 'स्वास्थ्य एवं स्वच्छता जागरूकता', 'en' => 'Health & Hygiene Awareness'],
                ['mr' => 'कायदेविषयक मार्गदर्शन', 'hi' => 'कानूनी अधिकार मार्गदर्शन', 'en' => 'Legal Rights Awareness'],
                ['mr' => 'महिला सुरक्षा जनजागृती', 'hi' => 'महिला सुरक्षा जागरूकता', 'en' => 'Women Safety Drives'],
            ],
            'child-welfare' => [
                ['mr' => 'बालशिक्षण कार्यक्रम', 'hi' => 'प्रारंभिक बाल शिक्षा कार्यक्रम', 'en' => 'Early Child Education'],
                ['mr' => 'शालेय साहित्य मदत', 'hi' => 'स्कूली सामग्री सहायता', 'en' => 'School Kit Assistance'],
                ['mr' => 'पोषण आहार वितरण', 'hi' => 'पौष्टिक आहार वितरण', 'en' => 'Nutritional Meal Drives'],
                ['mr' => 'बाल आरोग्य तपासणी', 'hi' => 'बाल स्वास्थ्य जांच', 'en' => 'Pediatric Health Checkups'],
                ['mr' => 'अनाथ व गरजू मुलांना सहाय्य', 'hi' => 'अनाथ व जरूरतमंद बच्चों को सहायता', 'en' => 'Support for Underprivileged Children'],
                ['mr' => 'क्रीडा व सांस्कृतिक उपक्रम', 'hi' => 'खेलकूद एवं सांस्कृतिक कार्यक्रम', 'en' => 'Sports & Cultural Events'],
                ['mr' => 'बालहक्क जनजागृती', 'hi' => 'बाल अधिकार जागरूकता', 'en' => 'Child Rights Advocacy'],
                ['mr' => 'व्यक्तिमत्त्व विकास कार्यक्रम', 'hi' => 'व्यक्तित्व विकास कार्यक्रम', 'en' => 'Personality Development'],
            ],
            'environment' => [
                ['mr' => 'वृक्षारोपण अभियान', 'hi' => 'वृक्षारोपण अभियान', 'en' => 'Tree Plantation Drives'],
                ['mr' => 'वृक्षसंवर्धन', 'hi' => 'वृक्ष संरक्षण', 'en' => 'Plant Care & Conservation'],
                ['mr' => 'स्वच्छता अभियान', 'hi' => 'स्वच्छता अभियान', 'en' => 'Cleanliness Drives'],
                ['mr' => 'प्लास्टिकमुक्त अभियान', 'hi' => 'प्लास्टिक मुक्त अभियान', 'en' => 'Plastic-Free Campaigns'],
                ['mr' => 'पाणी संवर्धन', 'hi' => 'जल संरक्षण', 'en' => 'Water Conservation'],
                ['mr' => 'जलसंधारण', 'hi' => 'जल संचयन प्रबंधन', 'en' => 'Watershed Management'],
                ['mr' => 'पर्यावरण जनजागृती', 'hi' => 'पर्यावरण जागरूकता', 'en' => 'Eco Awareness Programs'],
                ['mr' => 'कचरा व्यवस्थापन', 'hi' => 'ठोस कचरा प्रबंधन', 'en' => 'Waste Management'],
                ['mr' => 'हरित गाव अभियान', 'hi' => 'हरित ग्राम अभियान', 'en' => 'Green Village Projects'],
            ],
            'social-welfare' => [
                ['mr' => 'अन्नदान', 'hi' => 'अन्न दान सेवा', 'en' => 'Food Relief Distribution'],
                ['mr' => 'वस्त्रदान', 'hi' => 'वस्त्र दान अभियान', 'en' => 'Clothes Donation Drives'],
                ['mr' => 'गरीब व गरजू कुटुंबांना मदत', 'hi' => 'निर्धन परिवारों को सहायता', 'en' => 'Aid for Impoverished Families'],
                ['mr' => 'आपत्तीग्रस्तांना सहाय्य', 'hi' => 'आपदा राहत सहायता', 'en' => 'Disaster Relief Support'],
                ['mr' => 'वृद्धांना मदत', 'hi' => 'वृद्धजनों को सहायता', 'en' => 'Elderly Care Assistance'],
                ['mr' => 'निराधार व्यक्तींना मदत', 'hi' => 'निराश्रितों को संबल', 'en' => 'Destitute Care Support'],
                ['mr' => 'सणासुदीला गरजूंसाठी विशेष उपक्रम', 'hi' => 'त्योहारों पर विशेष सहायता', 'en' => 'Festive Joy for the Needy'],
                ['mr' => 'सामाजिक जनजागृती कार्यक्रम', 'hi' => 'सामाजिक जागरूकता कार्यक्रम', 'en' => 'Social Literacy Campaigns'],
            ],
            'divyang-senior' => [
                ['mr' => 'दिव्यांग व्यक्तींना आवश्यक साहित्य', 'hi' => 'दिव्यांगजनों को सहायक उपकरण', 'en' => 'Assistive Aids for Divyang'],
                ['mr' => 'व्हीलचेअर व सहाय्यक उपकरणांचे वितरण', 'hi' => 'व्हीलचेयर वितरण', 'en' => 'Wheelchair & Crutches Distribution'],
                ['mr' => 'आरोग्य तपासणी', 'hi' => 'नियमित स्वास्थ्य जांच', 'en' => 'Special Health Checkups'],
                ['mr' => 'सरकारी योजनांची माहिती', 'hi' => 'सरकारी योजनाओं की जानकारी', 'en' => 'Government Schemes Guidance'],
                ['mr' => 'प्रमाणपत्र व कागदपत्र मार्गदर्शन', 'hi' => 'प्रमाण पत्र एवं दस्तावेज सहायता', 'en' => 'Disability Certificate Aid'],
                ['mr' => 'वृद्धांसाठी आरोग्य सहाय्य', 'hi' => 'वरिष्ठजनों के लिए स्वास्थ्य सहायता', 'en' => 'Elderly Medical Care'],
                ['mr' => 'वृद्धाश्रमांना मदत', 'hi' => 'वृद्धाश्रमों को सहायता', 'en' => 'Support for Old Age Homes'],
                ['mr' => 'सामाजिक व भावनिक आधार कार्यक्रम', 'hi' => 'सामाजिक एवं भावनात्मक संबल', 'en' => 'Emotional & Social Counseling'],
            ],
            'youth-employment' => [
                ['mr' => 'करिअर मार्गदर्शन', 'hi' => 'करियर काउंसलिंग', 'en' => 'Career Guidance & Counseling'],
                ['mr' => 'रोजगार मेळावे', 'hi' => 'रोजगार मेला आयोजन', 'en' => 'Job Fairs & Recruitment Drives'],
                ['mr' => 'कौशल्य विकास प्रशिक्षण', 'hi' => 'कौशल संवर्धन प्रशिक्षण', 'en' => 'Skill Development Training'],
                ['mr' => 'स्पर्धा परीक्षा मार्गदर्शन', 'hi' => 'प्रतियोगी परीक्षा मार्गदर्शन', 'en' => 'Competitive Exam Coaching'],
                ['mr' => 'उद्योजकता प्रशिक्षण', 'hi' => 'उद्यमिता विकास प्रशिक्षण', 'en' => 'Entrepreneurship Training'],
                ['mr' => 'डिजिटल कौशल्य प्रशिक्षण', 'hi' => 'डिजिटल कौशल प्रशिक्षण', 'en' => 'Digital Skills & IT Training'],
                ['mr' => 'मुलाखत व व्यक्तिमत्त्व विकास', 'hi' => 'साक्षात्कार व व्यक्तित्व विकास', 'en' => 'Interview Prep & Personality'],
                ['mr' => 'स्टार्टअप व स्वयंरोजगार मार्गदर्शन', 'hi' => 'स्टार्टअप एवं स्वरोजगार संबल', 'en' => 'Startup & Self-Employment Guidance'],
            ],
            'rural-development' => [
                ['mr' => 'ग्रामस्वच्छता', 'hi' => 'ग्राम स्वच्छता अभियान', 'en' => 'Village Sanitation Drives'],
                ['mr' => 'पाणी व स्वच्छता जनजागृती', 'hi' => 'स्वच्छ पेयजल व स्वच्छता जागरूकता', 'en' => 'Clean Water Awareness'],
                ['mr' => 'आरोग्य व शिक्षण उपक्रम', 'hi' => 'स्वास्थ्य एवं शिक्षा कार्यक्रम', 'en' => 'Rural Health & Education'],
                ['mr' => 'महिला बचत गट', 'hi' => 'महिला बचत समूह', 'en' => 'Rural Self-Help Groups'],
                ['mr' => 'शेतकरी मार्गदर्शन', 'hi' => 'किसान मार्गदर्शन एवं प्रशिक्षण', 'en' => 'Farmer Support & Guidance'],
                ['mr' => 'कौशल्य विकास', 'hi' => 'ग्रामीण कौशल विकास', 'en' => 'Rural Skills Training'],
                ['mr' => 'डिजिटल साक्षरता', 'hi' => 'डिजिटल ग्राम साक्षरता', 'en' => 'Village Digital Literacy'],
                ['mr' => 'सरकारी योजनांची माहिती', 'hi' => 'ग्रामीण कल्याणकारी योजनाएं', 'en' => 'Government Rural Schemes'],
                ['mr' => 'ग्रामविकास व सामाजिक जनजागृती', 'hi' => 'समग्र ग्राम विकास जागरूकता', 'en' => 'Holistic Village Development'],
            ],
        ];

        $rawList = $fallbackData[$area->slug] ?? [];
        foreach ($rawList as $idx => $item) {
            $initiativesList[] = [
                'number' => $idx + 1,
                'title' => $item[$locale] ?? $item['mr'] ?? $item['en'],
            ];
        }
    }

    $total = count($initiativesList);
    $half = (int) ceil($total / 2);
    $col1 = array_slice($initiativesList, 0, $half);
    $col2 = array_slice($initiativesList, $half);

    // Prioritize our newly created documentary images matching the reference exactly
    $localImagePath = 'images/focus-areas/' . $area->slug . '.jpg';
    if (file_exists(public_path($localImagePath))) {
        $imgUrl = asset($localImagePath);
    } else {
        $imgUrl = $area->image && !str_starts_with($area->image, 'http') ? asset($area->image) : asset($localImagePath);
    }
@endphp

<div class="{{ $theme['card_bg'] }} rounded-[22px] border {{ $theme['card_border'] }} shadow-sm {{ $theme['border_hover'] }} hover:shadow-lg transition-all duration-300 p-3 sm:p-3.5 flex flex-col justify-between group">
    
    <div class="flex flex-col sm:flex-row gap-3 sm:gap-3.5">
        <!-- Left Photo Container with Floating Icon (matches reference ~38% width) -->
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
                                <div class="flex items-start space-x-1.5 min-w-0" title="{{ $init['title'] }}">
                                    <span class="w-4 h-4 rounded-full {{ $theme['num_bg'] }} flex-shrink-0 flex items-center justify-center text-[10px] font-bold mt-0.5">
                                        {{ $init['number'] }}
                                    </span>
                                    <span class="text-[11px] sm:text-[11.5px] font-medium text-gray-800 leading-tight line-clamp-2">
                                        {{ $init['title'] }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-1.5">
                            @foreach($col2 as $init)
                                <div class="flex items-start space-x-1.5 min-w-0" title="{{ $init['title'] }}">
                                    <span class="w-4 h-4 rounded-full {{ $theme['num_bg'] }} flex-shrink-0 flex items-center justify-center text-[10px] font-bold mt-0.5">
                                        {{ $init['number'] }}
                                    </span>
                                    <span class="text-[11px] sm:text-[11.5px] font-medium text-gray-800 leading-tight line-clamp-2">
                                        {{ $init['title'] }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
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
