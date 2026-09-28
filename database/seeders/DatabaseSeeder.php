<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use App\Models\Donation;
use App\Models\FocusArea;
use App\Models\FocusAreaTranslation;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Models\ImpactStatistic;
use App\Models\ImpactStatisticTranslation;
use App\Models\NewsArticle;
use App\Models\NewsArticleTranslation;
use App\Models\Project;
use App\Models\ProjectTranslation;
use App\Models\Report;
use App\Models\ReportTranslation;
use App\Models\Setting;
use App\Models\Story;
use App\Models\StoryTranslation;
use App\Models\User;
use App\Models\VolunteerApplication;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@devanshfoundation.org'],
            [
                'name' => 'Admin - Devansh Foundation',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // 2. Settings
        $settings = [
            // General & Contact
            ['key' => 'site_name_mr', 'value' => 'देवांश फाउंडेशन', 'group' => 'general'],
            ['key' => 'site_name_hi', 'value' => 'देवांश फाउंडेशन', 'group' => 'general'],
            ['key' => 'site_name_en', 'value' => 'Devansh Foundation', 'group' => 'general'],
            ['key' => 'site_tagline_mr', 'value' => 'समाजाच्या उज्ज्वल भविष्यासाठी एकत्र', 'group' => 'general'],
            ['key' => 'site_tagline_hi', 'value' => 'समाज के उज्ज्वल भविष्य के लिए एकजुट', 'group' => 'general'],
            ['key' => 'site_tagline_en', 'value' => 'Together for a Better Tomorrow', 'group' => 'general'],
            ['key' => 'contact_phone', 'value' => '+91 98765 43210', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'info@devanshfoundation.org', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Devansh Foundation, Nashik, Maharashtra, India', 'group' => 'contact'],
            ['key' => 'google_maps_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119981.26415053915!2d73.72107936173641!3d19.99110534241372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddee0146033959%3A0xb3ce19b40020621e!2sNashik%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin', 'group' => 'contact'],
            
            // Social Links
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/devanshfoundation', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/devanshfoundation', 'group' => 'social'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/@devanshfoundation', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/devanshfoundation', 'group' => 'social'],

            // Donation Settings
            ['key' => 'donation_upi_id', 'value' => 'devanshfoundation@upi', 'group' => 'donation'],
            ['key' => 'donation_bank_name', 'value' => 'State Bank of India', 'group' => 'donation'],
            ['key' => 'donation_account_holder', 'value' => 'Devansh Foundation', 'group' => 'donation'],
            ['key' => 'donation_account_number', 'value' => '40982345091', 'group' => 'donation'],
            ['key' => 'donation_ifsc_code', 'value' => 'SBIN0001234', 'group' => 'donation'],
            ['key' => 'donation_bank_branch', 'value' => 'Nashik Main Branch, Maharashtra', 'group' => 'donation'],
            ['key' => 'donation_tax_80g_info', 'value' => 'Eligible for 50% Tax Exemption under Section 80G of Income Tax Act. Official 80G receipt issued with unique registration number.', 'group' => 'donation'],
            ['key' => 'donation_min_amount', 'value' => '100', 'group' => 'donation'],
            ['key' => 'donation_qr_image', 'value' => 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=upi://pay?pa=devanshfoundation@upi%26pn=Devansh%20Foundation%26cu=INR', 'group' => 'donation'],

            // SEO
            ['key' => 'meta_title_mr', 'value' => 'देवांश फाउंडेशन - समाजाच्या उज्ज्वल भविष्यासाठी एकत्र', 'group' => 'seo'],
            ['key' => 'meta_title_hi', 'value' => 'देवांश फाउंडेशन - समाज के उज्ज्वल भविष्य के लिए एकजुट', 'group' => 'seo'],
            ['key' => 'meta_title_en', 'value' => 'Devansh Foundation - Together for a Better Tomorrow', 'group' => 'seo'],
            ['key' => 'meta_desc_mr', 'value' => 'देवांश फाउंडेशन ही शिक्षण, आरोग्य, महिला सक्षमीकरण, बालकल्याण, पर्यावरण व ग्रामीण विकासासाठी कार्य करणारी अग्रगण्य सामाजिक संस्था आहे.', 'group' => 'seo'],
            ['key' => 'meta_desc_hi', 'value' => 'देवांश फाउंडेशन शिक्षा, स्वास्थ्य, महिला सशक्तिकरण, बाल कल्याण, पर्यावरण और ग्रामीण विकास के लिए समर्पित सामाजिक संगठन है।', 'group' => 'seo'],
            ['key' => 'meta_desc_en', 'value' => 'Devansh Foundation is an NGO committed to creating sustainable community change through education, healthcare, child welfare, and rural development in Maharashtra, India.', 'group' => 'seo'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 3. Focus Areas (8 specific areas from prompt)
        $focusAreas = [
            [
                'slug' => 'education',
                'icon' => 'graduation-cap',
                'image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=800&q=80',
                'order' => 1,
                'translations' => [
                    'mr' => [
                        'title' => 'शिक्षण',
                        'short_description' => 'गरजू व वंचित बालकांसाठी गुणवत्तापूर्ण शिक्षण, शालेय साहित्य आणि डिजिटल साक्षरता सहाय्य.',
                        'description' => 'शिक्षणाशिवाय समाजप्रगती अशक्य आहे. देवांश फाउंडेशन वंचित मुलांसाठी मोफत पुस्तके, गणवेश, संगणक साक्षरता आणि अभ्यासिका वर्ग चालवते.',
                    ],
                    'hi' => [
                        'title' => 'शिक्षा',
                        'short_description' => 'वंचित बच्चों के लिए गुणवत्तापूर्ण शिक्षा, शिक्षण सामग्री और डिजिटल साक्षरता सहायता।',
                        'description' => 'देवांश फाउंडेशन हर बच्चे तक शिक्षा का अधिकार पहुंचाने के लिए समर्पित भाव से कार्यरत है।',
                    ],
                    'en' => [
                        'title' => 'Education',
                        'short_description' => 'Quality learning resources, school kits, digital literacy, and scholarship support for underserved children.',
                        'description' => 'We believe education is the single most powerful tool to end generational poverty. Our programs provide underprivileged children with holistic schooling assistance.',
                    ],
                ],
            ],
            [
                'slug' => 'healthcare',
                'icon' => 'heart-pulse',
                'image' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80',
                'order' => 2,
                'translations' => [
                    'mr' => [
                        'title' => 'आरोग्य',
                        'short_description' => 'ग्रामीण व दुर्गम भागात मोफत आरोग्य तपासणी शिबिरे, औषधवाटप आणि आरोग्य जनजागृती.',
                        'description' => 'आरोग्य सेवा प्रत्येकाचा मूलभूत हक्क आहे. आम्ही नियमित आरोग्य शिबिरे, नेत्र तपासणी आणि महिला आरोग्यासाठी समुपदेशन करतो.',
                    ],
                    'hi' => [
                        'title' => 'स्वास्थ्य',
                        'short_description' => 'ग्रामीण व दुर्गम क्षेत्रों में निःशुल्क स्वास्थ्य जांच शिविर, दवा वितरण और स्वास्थ्य जागरूकता।',
                        'description' => 'हम वंचित तबकों को सुलभ और गुणवत्तापूर्ण प्राथमिक चिकित्सा सेवाएं उपलब्ध कराने के लिए कटिबद्ध हैं।',
                    ],
                    'en' => [
                        'title' => 'Healthcare',
                        'short_description' => 'Free medical diagnostic camps, essential medication distribution, and maternal & child health counseling.',
                        'description' => 'Bridging the urban-rural healthcare divide through mobile health units, preventative care screenings, and community wellness programs.',
                    ],
                ],
            ],
            [
                'slug' => 'women-empowerment',
                'icon' => 'sparkles',
                'image' => 'https://images.unsplash.com/photo-1609137144822-4a004eb7e313?auto=format&fit=crop&w=800&q=80',
                'order' => 3,
                'translations' => [
                    'mr' => [
                        'title' => 'महिला सक्षमीकरण',
                        'short_description' => 'महिला बचत गट, शिवणकाम, हस्तकला प्रशिक्षण आणि आर्थिक स्वावलंबनासाठी मार्गदर्शन.',
                        'description' => 'महिलांना स्वावलंबी बनवण्यासाठी व्यावसायिक प्रशिक्षण आणि सूक्ष्म-उद्योगांसाठी मार्गदर्शन देण्याचे काम फाउंडेशन करते.',
                    ],
                    'hi' => [
                        'title' => 'महिला सशक्तिकरण',
                        'short_description' => 'स्वयं सहायता समूह, सिलाई, हस्तशिल्प प्रशिक्षण और आर्थिक आत्मनिर्भरता हेतु मार्गदर्शन।',
                        'description' => 'महिलाओं को आत्मनिर्भर बनाकर उनके सामाजिक और आर्थिक स्तर को ऊंचा उठाने के प्रयास किए जाते हैं।',
                    ],
                    'en' => [
                        'title' => 'Women Empowerment',
                        'short_description' => 'Self-help group formation, vocational tailoring skills, micro-entrepreneurship training, and financial independence.',
                        'description' => 'Empowering women with market-linked vocational training, enabling them to generate sustainable family income with dignity.',
                    ],
                ],
            ],
            [
                'slug' => 'child-welfare',
                'icon' => 'baby',
                'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=800&q=80',
                'order' => 4,
                'translations' => [
                    'mr' => [
                        'title' => 'बालकल्याण',
                        'short_description' => 'अनाथ व गरजू मुलांचे पोषण, आरोग्य, मानसिक विकास आणि बालहक्क संरक्षण.',
                        'description' => 'मुलांचे सुरक्षित बालपण आणि सुदृढ शारीरिक व बौद्धिक वाढ सुनिश्चित करण्यासाठी विविध पोषण व शैक्षणिक उपक्रम.',
                    ],
                    'hi' => [
                        'title' => 'बाल कल्याण',
                        'short_description' => 'अनाथ व वंचित बच्चों का पोषण, स्वास्थ्य, सर्वांगीण विकास और बाल अधिकार संरक्षण।',
                        'description' => 'प्रत्येक बच्चे के उज्ज्वल और सुरक्षित भविष्य के लिए पोषण एवं बाल सुरक्षा के सशक्त प्रयास।',
                    ],
                    'en' => [
                        'title' => 'Child Welfare',
                        'short_description' => 'Nutrition support, emotional well-being, child rights advocacy, and safe recreational spaces for vulnerable children.',
                        'description' => 'Ensuring every child receives adequate nutrition, medical care, and protection in an affectionate, empowering environment.',
                    ],
                ],
            ],
            [
                'slug' => 'environment',
                'icon' => 'trees',
                'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                'order' => 5,
                'translations' => [
                    'mr' => [
                        'title' => 'पर्यावरण',
                        'short_description' => 'वृक्षारोपण मोहीम, जलसंधारण, प्लास्टिकमुक्ती आणि पर्यावरण संवर्धनाची लोकचळवळ.',
                        'description' => 'निसर्गाचे रक्षण ही काळाची गरज आहे. नाशिक व आसपासच्या परिसरात हजारो देशी वृक्षांची लागवड व संगोपन.',
                    ],
                    'hi' => [
                        'title' => 'पर्यावरण',
                        'short_description' => 'वृक्षारोपण अभियान, जल संरक्षण, प्लास्टिक मुक्ति और पर्यावरण संरक्षण की जन-मुहिम।',
                        'description' => 'प्राकृतिक संसाधनों के संरक्षण और हरियाली बढ़ाने के लिए व्यापक स्तर पर जन-सहयोग से अभियान चलाए जाते हैं।',
                    ],
                    'en' => [
                        'title' => 'Environment',
                        'short_description' => 'Tree plantation drives, watershed conservation, solid waste awareness, and green eco-villages.',
                        'description' => 'Restoring green cover across Maharashtra with native species planting, rainwater harvesting, and environmental sensitization.',
                    ],
                ],
            ],
            [
                'slug' => 'skill-development',
                'icon' => 'briefcase',
                'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80',
                'order' => 6,
                'translations' => [
                    'mr' => [
                        'title' => 'कौशल्य विकास',
                        'short_description' => 'ग्रामीण तरुणांसाठी आधुनिक संगणकीय व तांत्रिक कौशल्ये, रोजगार मेळावे व करिअर मार्गदर्शन.',
                        'description' => 'युवकांना रोजगाराभिमुख बनवून त्यांना स्वतःच्या पायावर उभे राहण्यास मदत करणे.',
                    ],
                    'hi' => [
                        'title' => 'कौशल विकास',
                        'short_description' => 'ग्रामीण युवाओं के लिए तकनीकी कौशल, कंप्यूटर प्रशिक्षण और रोजगार मार्गदर्शन।',
                        'description' => 'युवाओं को आजीविका के साधन उपलब्ध कराने के लिए कौशल आधारित व्यावहारिक प्रशिक्षण दिया जाता है।',
                    ],
                    'en' => [
                        'title' => 'Skill Development',
                        'short_description' => 'Vocational technical trades, IT literacy, workplace readiness, and youth placement guidance.',
                        'description' => 'Equipping underprivileged youth with market-ready vocational skills, ensuring sustainable employment and self-reliance.',
                    ],
                ],
            ],
            [
                'slug' => 'rural-development',
                'icon' => 'home',
                'image' => 'https://images.unsplash.com/photo-1509099836639-18ba1795216d?auto=format&fit=crop&w=800&q=80',
                'order' => 7,
                'translations' => [
                    'mr' => [
                        'title' => 'ग्रामीण विकास',
                        'short_description' => 'गावांमध्ये शुद्ध पिण्याचे पाणी, स्वच्छता, सौर ऊर्जा आणि आदर्श ग्राम संकल्पनेवर काम.',
                        'description' => 'ग्रामीण भागातील पायाभूत सुविधांचे सक्षमीकरण आणि ग्रामस्थांच्या सहकार्याने शाश्वत विकास घडवणे.',
                    ],
                    'hi' => [
                        'title' => 'ग्रामीण विकास',
                        'short_description' => 'गांवों में स्वच्छ पेयजल, स्वच्छता, सौर ऊर्जा और आदर्श ग्राम संकल्पना पर कार्य।',
                        'description' => 'ग्रामीण समुदायों के जीवन स्तर को सुधारने हेतु बुनियादी ढांचे और जन-जागरूकता का विकास।',
                    ],
                    'en' => [
                        'title' => 'Rural Development',
                        'short_description' => 'Clean drinking water kiosks, sanitation infrastructure, solar street lighting, and integrated village progress.',
                        'description' => 'Transforming remote hamlets into self-reliant model communities through grassroots participatory development.',
                    ],
                ],
            ],
            [
                'slug' => 'social-welfare',
                'icon' => 'hands-helping',
                'image' => 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?auto=format&fit=crop&w=800&q=80',
                'order' => 8,
                'translations' => [
                    'mr' => [
                        'title' => 'सामाजिक कल्याण',
                        'short_description' => 'ज्येष्ठ नागरिक, दिव्यांग बांधव व आपत्कालीन परिस्थितीत गरजू कुटुंबांना तात्काळ मदत.',
                        'description' => 'संकटसमयी समाजातील अत्यंत उपेक्षित घटकांना आवश्यक अन्नधान्य, औषधे व सामाजिक संरक्षण देणे.',
                    ],
                    'hi' => [
                        'title' => 'सामाजिक कल्याण',
                        'short_description' => 'वरिष्ठ नागरिक, दिव्यांगजन व आपदा के समय जरूरतमंद परिवारों को तत्काल राहत एवं सहयोग।',
                        'description' => 'समाज के अंतिम छोर पर खड़े व्यक्ति तक मानवीय सहायता और सम्मान पहुंचाना हमारा संकल्प है।',
                    ],
                    'en' => [
                        'title' => 'Social Welfare',
                        'short_description' => 'Support for the elderly, assistance for specially-abled individuals, and emergency disaster relief.',
                        'description' => 'Ensuring a humane safety net for our most vulnerable community members through unconditional dignity and care.',
                    ],
                ],
            ],
        ];

        foreach ($focusAreas as $faData) {
            $translations = $faData['translations'];
            unset($faData['translations']);

            $fa = FocusArea::updateOrCreate(['slug' => $faData['slug']], $faData);

            foreach ($translations as $lang => $trans) {
                FocusAreaTranslation::updateOrCreate(
                    ['focus_area_id' => $fa->id, 'language_code' => $lang],
                    $trans
                );
            }
        }

        // 4. Impact Statistics (Exact items requested by user)
        $impactStats = [
            [
                'number_value' => 10000,
                'number_suffix' => '+',
                'raw_number_display' => '10,000+',
                'icon' => 'users',
                'order' => 1,
                'translations' => [
                    'mr' => ['label' => 'लाभार्थी', 'description' => 'शिक्षण, आरोग्य व पोषण योजनांचा लाभ मिळालेली कुटुंबे व मुले'],
                    'hi' => ['label' => 'लाभार्थी', 'description' => 'शिक्षा, स्वास्थ्य एवं पोषण योजनाओं से लाभान्वित लोग'],
                    'en' => ['label' => 'Beneficiaries', 'description' => 'Children, women, and families empowered across diverse initiatives'],
                ],
            ],
            [
                'number_value' => 100,
                'number_suffix' => '+',
                'raw_number_display' => '100+',
                'icon' => 'clipboard-check',
                'order' => 2,
                'translations' => [
                    'mr' => ['label' => 'पूर्ण प्रकल्प', 'description' => 'समाजाभिमुख यशस्वीपणे राबवलेले प्रकल्प'],
                    'hi' => ['label' => 'पूर्ण परियोजनाएं', 'description' => 'सफलतापूर्वक संपन्न सामाजिक कार्य एवं अभियान'],
                    'en' => ['label' => 'Projects Completed', 'description' => 'Targeted grassroots interventions successfully delivered'],
                ],
            ],
            [
                'number_value' => 500,
                'number_suffix' => '+',
                'raw_number_display' => '500+',
                'icon' => 'heart-handshake',
                'order' => 3,
                'translations' => [
                    'mr' => ['label' => 'स्वयंसेवक', 'description' => 'आपला मौल्यवान वेळ देणारे समर्पित स्वयंसेवक'],
                    'hi' => ['label' => 'स्वयंसेवक', 'description' => 'समाज सेवा में समर्पित उत्साही स्वयंसेवक दल'],
                    'en' => ['label' => 'Active Volunteers', 'description' => 'Passionate individuals dedicating time and expertise'],
                ],
            ],
            [
                'number_value' => 50,
                'number_suffix' => '+',
                'raw_number_display' => '50+',
                'icon' => 'map-pin',
                'order' => 4,
                'translations' => [
                    'mr' => ['label' => 'गावे / भाग', 'description' => 'नाशिक व परिसरातील पोहोचलेली गावे आणि वस्त्या'],
                    'hi' => ['label' => 'गांव / क्षेत्र', 'description' => 'नासिक एवं आसपास के सुदूर ग्रामीण अंचल'],
                    'en' => ['label' => 'Villages / Areas Reached', 'description' => 'Remote villages and urban settlements transformed'],
                ],
            ],
        ];

        foreach ($impactStats as $statData) {
            $trans = $statData['translations'];
            unset($statData['translations']);

            $stat = ImpactStatistic::create($statData);
            foreach ($trans as $lang => $t) {
                ImpactStatisticTranslation::create(array_merge($t, [
                    'impact_statistic_id' => $stat->id,
                    'language_code' => $lang,
                ]));
            }
        }

        // 5. Featured Projects (5 projects requested)
        $educationArea = FocusArea::where('slug', 'education')->first();
        $healthArea = FocusArea::where('slug', 'healthcare')->first();
        $womenArea = FocusArea::where('slug', 'women-empowerment')->first();
        $envArea = FocusArea::where('slug', 'environment')->first();
        $ruralArea = FocusArea::where('slug', 'rural-development')->first();

        $projects = [
            [
                'focus_area_id' => $educationArea?->id,
                'slug' => 'educational-support',
                'featured_image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80',
                'location' => 'Nashik District, Maharashtra',
                'start_date' => '2024-01-15',
                'beneficiaries_count' => '1,800+ Students',
                'target_amount' => 500000,
                'raised_amount' => 385000,
                'status' => 'ongoing',
                'is_featured' => true,
                'is_published' => true,
                'order' => 1,
                'translations' => [
                    'mr' => [
                        'title' => 'शैक्षणिक मदत उपक्रम',
                        'short_description' => 'गरजू विद्यार्थ्यांना मोफत शालेय दप्तर, वह्या, गणवेश व शिष्यवृत्ती सहाय्य.',
                        'description' => 'आर्थिक अडचणींमुळे एकाही गुणवंत बालकाचे शिक्षण थांबू नये, या उद्देशाने देवांश फाउंडेशनने नाशिक जिल्ह्यातील 25 ग्रामीण शाळांमध्ये शैक्षणिक साहित्य वाटप आणि अभ्यासिका सहाय्य केंद्र सुरू केले आहे.',
                        'problem_statement' => 'अनेक ग्रामीण आणि आदिवासी पाड्यांवरील मुलांकडे शालेय पुस्तके व साहित्य नसल्याने शाळा सोडण्याचे प्रमाण मोठे होते.',
                        'solution' => 'विद्यार्थ्यांना आवश्यक संपूर्ण शैक्षणिक किट पुरवणे आणि साप्ताहिक अभ्यासिका मार्गदर्शन देणे.',
                        'impact_text' => '1,800 पेक्षा अधिक विद्यार्थ्यांना सलग दुसऱ्या वर्षी शालेय साहित्याची मदत पुरवून उपस्थिती 95% पर्यंत वाढवली.',
                    ],
                    'hi' => [
                        'title' => 'शैक्षणिक सहायता अभियान',
                        'short_description' => 'जरूरतमंद विद्यार्थियों को निःशुल्क बैग, पाठ्य सामग्री एवं छात्रवृत्ति सहयोग।',
                        'description' => 'आर्थिक तंगी के कारण किसी भी बच्चे की पढ़ाई न छूटे, इस संकल्प के साथ फाउंडेशन ग्रामीण अंचलों में निरंतर शैक्षणिक सामग्री पहुंचा रहा है।',
                        'problem_statement' => 'संसाधनों के अभाव में ग्रामीण क्षेत्रों के होनहार बच्चे पढ़ाई छोड़ने को मजबूर थे।',
                        'solution' => 'बच्चों को आवश्यक अध्ययन किट उपलब्ध कराना तथा मार्गदर्शन सत्र आयोजित करना।',
                        'impact_text' => '1,800 से अधिक बच्चों को शिक्षा की निरंतरता बनाए रखने में प्रत्यक्ष सहयोग मिला।',
                    ],
                    'en' => [
                        'title' => 'Educational Support Project',
                        'short_description' => 'School kits, stationery, uniform support, and mentoring for underprivileged students.',
                        'description' => 'Ensuring no child drops out of school due to financial hardships. Devansh Foundation supplies holistic school essentials and runs after-school learning centers across rural Nashik.',
                        'problem_statement' => 'Severe lack of basic textbooks, stationery, and learning aids forced hundreds of rural students toward school dropouts.',
                        'solution' => 'Distributing comprehensive back-to-school kits and establishing village-level tutoring libraries.',
                        'impact_text' => 'Directly sustained school attendance and academic confidence for over 1,800 children across 25 rural schools.',
                    ],
                ],
            ],
            [
                'focus_area_id' => $healthArea?->id,
                'slug' => 'healthcare-camps',
                'featured_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                'location' => 'Trimbakeshwar & Igatpuri, Nashik',
                'start_date' => '2024-02-10',
                'beneficiaries_count' => '3,500+ Patients',
                'target_amount' => 400000,
                'raised_amount' => 310000,
                'status' => 'ongoing',
                'is_featured' => true,
                'is_published' => true,
                'order' => 2,
                'translations' => [
                    'mr' => [
                        'title' => 'ग्रामीण आरोग्य शिबिरे',
                        'short_description' => 'दुर्गम भागात मोफत सर्वसाधारण व नेत्र तपासणी शिबिरे, मोफत औषधे आणि चष्मे वाटप.',
                        'description' => 'तज्ज्ञ डॉक्टरांच्या पथकासह दुर्गम खेड्यांमध्ये जाऊन मोफत आरोग्य तपासणी, रक्ताच्या चाचण्या, औषधे आणि गंभीर रुग्णांना पुढील उपचारांसाठी मदत केली जाते.',
                        'problem_statement' => 'प्राथमिक आरोग्य केंद्रांचे अंतर जास्त असल्याने ग्रामीण नागरिकांना वेळेवर निदान व औषधे मिळत नव्हती.',
                        'solution' => 'गावोगावी फिरते वैद्यकीय पथक आणि विशेषज्ञ डॉक्टरांच्या सहकार्याने नियमित आरोग्य शिबिरे आयोजित करणे.',
                        'impact_text' => '3,500 हून अधिक ग्रामस्थांची मोफत आरोग्य तपासणी व 450 ज्येष्ठांना मोफत चष्मे वाटप.',
                    ],
                    'hi' => [
                        'title' => 'स्वास्थ्य शिविर अभियान',
                        'short_description' => 'दुर्गम क्षेत्रों में निःशुल्क सामान्य एवं नेत्र जांच शिविर, दवाइयां और चश्मे वितरण।',
                        'description' => 'विशेषज्ञ चिकित्सकों के साथ ग्रामीण अंचलों में जाकर नि:शुल्क स्वास्थ्य जांच एवं आवश्यक दवाएं उपलब्ध कराई जाती हैं।',
                        'problem_statement' => 'दूरदराज के गांवों में प्राथमिक चिकित्सा सुविधाओं का अभाव था।',
                        'solution' => 'नियमित अंतराल पर मोबाइल मेडिकल कैंप आयोजित कर गांव में ही उपचार उपलब्ध कराना।',
                        'impact_text' => '3,500 से अधिक ग्रामीणों की स्वास्थ्य जांच और सैकड़ों मरीजों को आवश्यक चिकित्सा सहायता मिली।',
                    ],
                    'en' => [
                        'title' => 'Healthcare Camps Initiative',
                        'short_description' => 'Free general health check-ups, eye screenings, medicines, and cataract referrals.',
                        'description' => 'Organizing free diagnostic and preventive healthcare camps with volunteer medical specialists in remote tribal and rural areas of Nashik district.',
                        'problem_statement' => 'High travel costs and remote geography prevented vulnerable elders and families from accessing timely clinical care.',
                        'solution' => 'Taking specialized medical teams, portable diagnostics, and free pharmacy supplies directly to village doorsteps.',
                        'impact_text' => 'Screened 3,500+ patients, provided free prescription spectacles to 450 elders, and facilitated critical medical referrals.',
                    ],
                ],
            ],
            [
                'focus_area_id' => $womenArea?->id,
                'slug' => 'women-empowerment-initiative',
                'featured_image' => 'https://images.unsplash.com/photo-1596704017254-9b121068fb31?auto=format&fit=crop&w=800&q=80',
                'location' => 'Dindori & Niphad, Nashik',
                'start_date' => '2024-03-01',
                'beneficiaries_count' => '420+ Women',
                'target_amount' => 350000,
                'raised_amount' => 290000,
                'status' => 'ongoing',
                'is_featured' => true,
                'is_published' => true,
                'order' => 3,
                'translations' => [
                    'mr' => [
                        'title' => 'महिला सक्षमीकरण व स्वावलंबन',
                        'short_description' => 'शिवणकला, अन्नप्रक्रिया आणि हस्तकला प्रशिक्षण देऊन महिलांना आर्थिकदृष्ट्या सक्षम करणे.',
                        'description' => 'ग्रामीण भागातील भगिनींना व्यावसायिक कौशल्यांचे प्रशिक्षण देऊन स्वतःचा लघुउद्योग सुरू करण्यास मार्गदर्शन व बाजारपेठ जोडणी केली जाते.',
                        'problem_statement' => 'घरगुती कामाव्यतिरिक्त ग्रामीण महिलांकडे उत्पन्नाचे कोणतेही स्वतंत्र साधन नव्हते.',
                        'solution' => '3 महिन्यांचे विनामूल्य शिवण व उत्पादन प्रशिक्षण केंद्र चालवणे आणि स्वतःचे काम सुरू करण्यासाठी साधन पुरवणे.',
                        'impact_text' => '420 पेक्षा जास्त महिलांनी प्रशिक्षण पूर्ण करून स्वतःचे मासिक 6,000 ते 12,000 रुपये उत्पन्न मिळवणे सुरू केले आहे.',
                    ],
                    'hi' => [
                        'title' => 'महिला सशक्तिकरण व आजीविका',
                        'short_description' => 'सिलाई, खाद्य प्रसंस्करण एवं हस्तकला प्रशिक्षण देकर महिलाओं को आर्थिक रूप से सशक्त बनाना।',
                        'description' => 'महिलाओं को हुनरमंद बनाकर उन्हें आत्मनिर्भर बनाने और स्वयं सहायता समूहों के माध्यम से स्वावलंबी करने की पहल।',
                        'problem_statement' => 'ग्रामीण महिलाओं के पास सम्मानजनक आजीविका के अवसरों का नितांत अभाव था।',
                        'solution' => 'व्यावसायिक कौशल प्रशिक्षण केंद्र स्थापित कर उन्हें उत्पादन एवं विपणन से जोड़ना।',
                        'impact_text' => '420 से अधिक महिलाएं अब सम्मानपूर्वक अपनी स्वयं की आमदनी अर्जित कर रही हैं।',
                    ],
                    'en' => [
                        'title' => 'Women Empowerment Initiative',
                        'short_description' => 'Vocational tailoring, food processing, and financial literacy enabling self-reliance.',
                        'description' => 'Equipping rural women with trade skills, sewing machine access, and micro-business training to build self-sustaining livelihood streams.',
                        'problem_statement' => 'Limited economic opportunities left rural women dependent with no disposable household income.',
                        'solution' => 'Intensive 12-week certificate courses in garment tailoring, artisanal craft, and small business banking.',
                        'impact_text' => 'Trained 420+ women, with over 70% currently running active micro-ventures generating steady supplemental family income.',
                    ],
                ],
            ],
            [
                'focus_area_id' => $envArea?->id,
                'slug' => 'tree-plantation-drive',
                'featured_image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                'location' => 'Nashik Green Belt, Maharashtra',
                'start_date' => '2024-06-05',
                'beneficiaries_count' => '15,000+ Saplings Planted',
                'target_amount' => 250000,
                'raised_amount' => 210000,
                'status' => 'ongoing',
                'is_featured' => true,
                'is_published' => true,
                'order' => 4,
                'translations' => [
                    'mr' => [
                        'title' => 'वृक्षारोपण व पर्यावरण संवर्धन उपक्रम',
                        'short_description' => 'नाशिक परिसरात देशी वृक्षांची लागवड, जलसंधारण आणि पर्यावरण जनजागृती मोहीम.',
                        'description' => 'पर्यावरणाचा समतोल राखण्यासाठी पिंपळ, वड, जांभूळ, कडुलिंब अशा देशी वृक्षांची लागवड आणि स्थानिक तरुणांच्या मदतीने 3 वर्षे संगोपनाची हमी.',
                        'problem_statement' => 'वाढते शहरीकरण आणि वृक्षतोडीमुळे भूजल पातळी घटत असून पर्यावरणाचा ऱ्हास होत होता.',
                        'solution' => 'सार्वजनिक व शाळांच्या परिसरात सघन वृक्षारोपण आणि ठिबक सिंचन पद्धतीने संगोपन.',
                        'impact_text' => '15,000 हून अधिक वृक्षांची यशस्वी लागवड आणि 88% जगण्याचा दर राखण्यात यश.',
                    ],
                    'hi' => [
                        'title' => 'वृक्षारोपण एवं पर्यावरण संरक्षण',
                        'short_description' => 'देशी प्रजातियों के पेड़ों का रोपण, जल संरक्षण एवं पर्यावरण जागरूकता अभियान।',
                        'description' => 'हरित पर्यावरण के निर्माण हेतु जन-सहयोग से सघन वृक्षारोपण एवं उनके दीर्घकालिक संरक्षण की व्यवस्था।',
                        'problem_statement' => 'अंधाधुंध हरियाली की कमी और गिरता भूजल स्तर एक गंभीर संकट बन रहा था।',
                        'solution' => 'सामुदायिक भागीदारी के साथ देशी वृक्ष लगाना और उनकी नियमित देखभाल करना।',
                        'impact_text' => '15,000 से अधिक पौधों का रोपण कर 88% पौधों को संरक्षित किया गया।',
                    ],
                    'en' => [
                        'title' => 'Tree Plantation & Eco Restoration',
                        'short_description' => 'Planting native trees, creating micro-forests, and groundwater conservation campaigns.',
                        'description' => 'Restoring ecological biodiversity in and around Nashik through structured native afforestation and youth-led eco-patrols.',
                        'problem_statement' => 'Rapid urban runoff and deforested hillsides triggered dropping aquifers and soil erosion.',
                        'solution' => 'Community-driven plantation of hardy indigenous trees supported by localized drip systems and 3-year survival guardianship.',
                        'impact_text' => 'Planted 15,000+ native saplings with an audited 88% survival rate sustained over two seasons.',
                    ],
                ],
            ],
            [
                'focus_area_id' => $ruralArea?->id,
                'slug' => 'rural-development-initiative',
                'featured_image' => 'https://images.unsplash.com/photo-1509099836639-18ba1795216d?auto=format&fit=crop&w=800&q=80',
                'location' => 'Yeola & Sinnar Talukas, Nashik',
                'start_date' => '2024-04-15',
                'beneficiaries_count' => '12 Villages',
                'target_amount' => 600000,
                'raised_amount' => 450000,
                'status' => 'ongoing',
                'is_featured' => true,
                'is_published' => true,
                'order' => 5,
                'translations' => [
                    'mr' => [
                        'title' => 'ग्रामीण विकास व जलसंवर्धन',
                        'short_description' => 'शुद्ध पिण्याचे पाणी, जलसंधारण बंधारे, सौर पथदिवे आणि शाश्वत ग्रामविकास.',
                        'description' => 'दुष्काळग्रस्त वाड्यांमध्ये शुद्ध पाण्याचे फिल्टर बसवणे, शेततळी व नाला खोलीकरण करून भूजल पुनर्भरण वाढवणे.',
                        'problem_statement' => 'उन्हाळ्यात तीव्र पाणीटंचाई आणि अस्वच्छ पाण्यामुळे आजारांचे प्रमाण जास्त होते.',
                        'solution' => 'ग्रामपंचायतींच्या सहकार्याने बंधारे दुरुस्ती, नाला खोलीकरण आणि सामुदायिक RO जलशुद्धीकरण प्रकल्प उभारणे.',
                        'impact_text' => '12 गावांमध्ये 15,000+ ग्रामस्थांना स्वच्छ पाण्याचा कायमस्वरूपी पुरवठा उपलब्ध.',
                    ],
                    'hi' => [
                        'title' => 'ग्रामीण विकास एवं जल संचयन',
                        'short_description' => 'स्वच्छ पेयजल, जल संरक्षण चेकडैम, सोलर लाइट और आत्मनिर्भर ग्राम निर्माण।',
                        'description' => 'सूखा प्रभावित क्षेत्रों में जल संरक्षण के संरचनात्मक कार्य और स्वच्छ पेयजल की स्थायी व्यवस्था।',
                        'problem_statement' => 'गर्मी के मौसम में गंभीर पेयजल संकट एवं दूषित जल से उत्पन्न बीमारियां।',
                        'solution' => 'चेकडैम निर्माण, जल शुद्धिकरण केंद्र और सौर ऊर्जा संयंत्र स्थापित करना।',
                        'impact_text' => '12 गांवों के 15,000 से अधिक निवासियों को शुद्ध पेयजल का निरंतर लाभ।',
                    ],
                    'en' => [
                        'title' => 'Rural Development & Water Security',
                        'short_description' => 'Clean water kiosks, check-dam desilting, solar electrification, and community sanitation.',
                        'description' => 'Combating severe dry-season water distress in drought-prone blocks of Nashik through check dam rejuvenation and community RO filtration units.',
                        'problem_statement' => 'Acute summer drinking water scarcity forced families into miles-long treks for brackish water.',
                        'solution' => 'Desilting streams, constructing check-dams, and installing solar-powered community purification stations.',
                        'impact_text' => 'Delivered dependable clean drinking water access and recharge storage for 12 rural villages.',
                    ],
                ],
            ],
        ];

        foreach ($projects as $projData) {
            $trans = $projData['translations'];
            unset($projData['translations']);

            $proj = Project::updateOrCreate(['slug' => $projData['slug']], $projData);

            foreach ($trans as $lang => $t) {
                ProjectTranslation::updateOrCreate(
                    ['project_id' => $proj->id, 'language_code' => $lang],
                    $t
                );
            }
        }

        // 6. Success Stories (including the exact quote requested by user)
        $stories = [
            [
                'project_id' => Project::where('slug', 'educational-support')->first()?->id,
                'slug' => 'student-success-priti-jadhav',
                'person_name' => 'प्रीती जाधव (Priti Jadhav)',
                'person_role_or_location' => 'इगतपुरी, नाशिक (Igatpuri, Nashik)',
                'image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_published' => true,
                'order' => 1,
                'translations' => [
                    'mr' => [
                        'title' => 'शिक्षणाने बदलले प्रीतीचे भविष्य',
                        'quote' => 'देवांश फाउंडेशनच्या मदतीने मला शिक्षणाची नवी दिशा मिळाली. आज मी माझ्या स्वप्नांकडे आत्मविश्वासाने वाटचाल करत आहे.',
                        'story' => 'प्रीती ही नाशिक जिल्ह्यातील इगतपुरी भागातील एका कष्टकरी शेतमजूर कुटुंबातील मुलगी. दहावीमध्ये 88% गुण मिळवूनही घरच्या हलाखीच्या परिस्थितीमुळे तिचे पुढील शिक्षण थांबण्याच्या मार्गावर होते. देवांश फाउंडेशनने तिला तातडीने शैक्षणिक शिष्यवृत्ती, पुस्तके आणि मार्गदर्शन उपलब्ध करून दिले. आज ती नाशिकच्या नामांकित महाविद्यालयात विज्ञान शाखेत शिकत असून तिचे स्वप्न डॉक्टर होण्याचे आहे.',
                        'challenge' => 'कौटुंबिक दारिद्र्य आणि उच्च शिक्षणासाठी आवश्यक पुस्तके व फी भरण्यास असमर्थता.',
                        'support_received' => 'दोन वर्षांची संपूर्ण शैक्षणिक फी, पुस्तके, दप्तर व करिअर मार्गदर्शन समुपदेशन.',
                        'outcome' => 'बारावीच्या परीक्षेत प्रथम श्रेणी संपादन करून ती वैद्यकीय प्रवेश परीक्षेची पूर्वतयारी करत आहे.',
                    ],
                    'hi' => [
                        'title' => 'शिक्षा ने बदली प्रीति की दिशा',
                        'quote' => 'देवांश फाउंडेशन की मदद से मुझे शिक्षा की नई दिशा मिली। आज मैं अपने सपनों की ओर आत्मविश्वास से आगे बढ़ रही हूँ।',
                        'story' => 'प्रीति एक साधारण खेतिहर मजदूर परिवार से आती हैं। कक्षा 10 में उत्कृष्ट अंक पाने के बावजूद आर्थिक तंगी के कारण पढ़ाई छूटने की कगार पर थी। देवांश फाउंडेशन ने उन्हें आवश्यक छात्रवृत्ति और मार्गदर्शन दिया।',
                        'challenge' => 'परिवार की अत्यधिक गरीबी और आगे की पढ़ाई के लिए जरूरी फीस का अभाव।',
                        'support_received' => 'पूर्ण शैक्षणिक छात्रवृत्ति, पुस्तकें और करियर काउंसलिंग।',
                        'outcome' => 'वह आज कॉलेज में विज्ञान की पढ़ाई कर रही हैं और डॉक्टर बनने का सपना पूरा कर रही हैं।',
                    ],
                    'en' => [
                        'title' => 'Education Transformed Priti’s Horizon',
                        'quote' => 'With the support of Devansh Foundation, I received a new direction in my education. Today, I am walking toward my dreams with confidence.',
                        'story' => 'Priti is the daughter of landless farm labourers in Igatpuri. Despite scoring 88% in her secondary school exams, acute poverty nearly brought an abrupt end to her education. Devansh Foundation stepped in with full academic scholarship, textbooks, and mentoring. Today, she is pursuing her science graduation with an ambition to serve rural patients as a physician.',
                        'challenge' => 'Severe family poverty leaving no funds for college admission, bus travel, or academic textbooks.',
                        'support_received' => 'Complete academic scholarship, stationery kit, mentoring, and competitive exam preparation.',
                        'outcome' => 'Achieved first division in higher secondary and actively training for medical entrance exams.',
                    ],
                ],
            ],
            [
                'project_id' => Project::where('slug', 'women-empowerment-initiative')->first()?->id,
                'slug' => 'sunita-shinde-empowerment',
                'person_name' => 'सुनिता शिंदे (Sunita Shinde)',
                'person_role_or_location' => 'दिंडोरी, नाशिक (Dindori, Nashik)',
                'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_published' => true,
                'order' => 2,
                'translations' => [
                    'mr' => [
                        'title' => 'स्वावलंबी उद्योजिका सुनिताताई',
                        'quote' => 'फाउंडेशनच्या शिवण प्रशिक्षणामुळे मला स्वतःच्या पायावर उभे राहण्याचा आत्मविश्वास मिळाला. आज मी कुटुंबाला हातभार लावत आहे.',
                        'story' => 'सुनिताताईंना दोन लहान मुले असून पती आजारी असल्याने घराची सर्व जबाबदारी त्यांच्यावर होती. त्यांनी देवांश फाउंडेशनच्या मोफत शिवण केंद्रात 3 महिन्यांचे प्रशिक्षण पूर्ण केले. त्यानंतर मिळालेल्या शिलाई मशीनमुळे त्यांनी स्वतःचा व्यवसाय सुरू केला.',
                        'challenge' => 'उत्पन्नाचे कोणतेही साधन नसताना मुलांचे पालनपोषण करण्याचे संकट.',
                        'support_received' => 'व्यावसायिक शिवणकला प्रशिक्षण, शिलाई मशीन व कापड पुरवठ्याची प्राथमिक मदत.',
                        'outcome' => 'आज त्या दरमहा ₹10,000 पेक्षा जास्त कमावत असून इतर दोन महिलांनाही रोजगार दिला आहे.',
                    ],
                    'hi' => [
                        'title' => 'स्वावलंबी उद्यमी सुनीता ताई',
                        'quote' => 'फाउंडेशन के सिलाई प्रशिक्षण ने मुझे आत्मनिर्भर बनाया। आज मैं अपने परिवार की रीढ़ बन चुकी हूँ।',
                        'story' => 'सुनीता ताई ने फाउंडेशन के कौशल केंद्र से सिलाई का प्रशिक्षण लिया और अपनी खुद की सिलाई यूनिट शुरू की।',
                        'challenge' => 'आजीविका का कोई साधन नहीं होना और बच्चों के भरण-पोषण की चिंता।',
                        'support_received' => '3 महीने का व्यावसायिक सिलाई प्रशिक्षण एवं सिलाई मशीन सहायता।',
                        'outcome' => 'अब वह प्रति माह 10,000 रुपये से अधिक कमाकर परिवार का भरण-पोषण कर रही हैं।',
                    ],
                    'en' => [
                        'title' => 'Sunita’s Journey to Self-Reliance',
                        'quote' => 'The tailoring training from Devansh Foundation gave me the courage to stand on my own feet. Today, I am proud to support my family.',
                        'story' => 'Facing economic distress with young children to care for, Sunita enrolled in Devansh Foundation’s women vocational training center in Dindori. After graduating, she started custom tailoring, scaling her work into a reliable enterprise.',
                        'challenge' => 'Complete lack of livelihood skills while bearing primary family responsibility.',
                        'support_received' => '3-month certified garment fabrication training and sewing machinery sponsorship.',
                        'outcome' => 'Consistently generates ₹10,000+ monthly revenue and has trained two more women in her hamlet.',
                    ],
                ],
            ],
        ];

        foreach ($stories as $storyData) {
            $trans = $storyData['translations'];
            unset($storyData['translations']);

            $st = Story::updateOrCreate(['slug' => $storyData['slug']], $storyData);

            foreach ($trans as $lang => $t) {
                StoryTranslation::updateOrCreate(
                    ['story_id' => $st->id, 'language_code' => $lang],
                    $t
                );
            }
        }

        // 7. News & Updates
        $newsList = [
            [
                'slug' => 'mega-health-camp-nashik-2024',
                'category' => 'Event',
                'featured_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                'published_at' => '2024-09-15',
                'is_featured' => true,
                'is_published' => true,
                'translations' => [
                    'mr' => [
                        'title' => 'नाशिक ग्रामीण भागात महाआरोग्य शिबिर यशस्वी',
                        'short_description' => 'देवांश फाउंडेशनतर्फे 800 हून अधिक ग्रामस्थांची मोफत आरोग्य व नेत्र तपासणी संपन्न.',
                        'content' => 'देवांश फाउंडेशनतर्फे आयोजित महाआरोग्य शिबिरात नाशिकच्या तज्ज्ञ डॉक्टरांच्या चमूने 800 हून अधिक नागरिकांची आरोग्य तपासणी केली. शिबिरात मोफत रक्तदाब, मधुमेह, डोळ्यांची तपासणी करून आवश्यक औषधांचे विनामूल्य वाटप करण्यात आले.',
                    ],
                    'hi' => [
                        'title' => 'नासिक ग्रामीण क्षेत्र में विशाल स्वास्थ्य शिविर सफल',
                        'short_description' => 'देवांश फाउंडेशन द्वारा 800 से अधिक ग्रामीणों की निःशुल्क स्वास्थ्य एवं नेत्र जांच।',
                        'content' => 'देवांश फाउंडेशन द्वारा आयोजित स्वास्थ्य शिविर में अनुभवी चिकित्सकों की टीम ने जरूरतमंदों को निःशुल्क परामर्श, दवाइयां और चश्मे वितरित किए।',
                    ],
                    'en' => [
                        'title' => 'Mega Community Health Camp Organised in Rural Nashik',
                        'short_description' => 'Over 800 villagers benefited from comprehensive health, eye care screenings, and free medication.',
                        'content' => 'Devansh Foundation successfully conducted a multi-specialty health screening camp in rural Nashik, attended by leading physicians and volunteers who dispensed consultations and free medicines.',
                    ],
                ],
            ],
            [
                'slug' => 'monsoon-tree-plantation-5000-trees',
                'category' => 'Campaign',
                'featured_image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                'published_at' => '2024-08-10',
                'is_featured' => true,
                'is_published' => true,
                'translations' => [
                    'mr' => [
                        'title' => 'पावसाळी मोहिमेत 5,000 देशी झाडांची लागवड',
                        'short_description' => 'पर्यावरण संवर्धनासाठी महाविद्यालयीन तरुण व स्वयंसेवकांचा उत्स्फूर्त सहभाग.',
                        'content' => 'पर्यावरण दिनानिमित्त सुरू झालेल्या मोहिमेत नाशिकच्या डोंगरउतारांवर देशी प्रजातींच्या 5,000 वृक्षांचे रोपण करण्यात आले असून पुढील 3 वर्षे त्यांच्या संरक्षणाची जबाबदारी स्थानिक युवा मंडळाने घेतली आहे.',
                    ],
                    'hi' => [
                        'title' => 'मानसून अभियान में 5,000 देशी पेड़ों का रोपण',
                        'short_description' => 'पर्यावरण संरक्षण के लिए युवाओं और स्वयंसेवकों ने लिया बढ़-चढ़कर भाग।',
                        'content' => 'नासिक के प्राकृतिक अंचलों में हरियाली बढ़ाने के उद्देश्य से वृहद स्तर पर 5,000 से अधिक पौधों का रोपण संपन्न हुआ।',
                    ],
                    'en' => [
                        'title' => 'Monsoon Afforestation Drive Plants 5,000 Native Saplings',
                        'short_description' => 'Youth volunteers mobilize across Nashik green corridors for native tree propagation.',
                        'content' => 'Devansh Foundation along with dedicated student volunteers completed an extensive green corridor planting drive, adopting native banyan, neem, and jamun saplings with drip nourishment.',
                    ],
                ],
            ],
            [
                'slug' => 'back-to-school-kit-distribution',
                'category' => 'Announcement',
                'featured_image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=800&q=80',
                'published_at' => '2024-06-20',
                'is_featured' => true,
                'is_published' => true,
                'translations' => [
                    'mr' => [
                        'title' => 'नवीन शैक्षणिक वर्षात 1,200 बालकांना शालेय साहित्य वाटप',
                        'short_description' => 'वंचित मुलांच्या शिक्षणाला गती देण्यासाठी संपूर्ण शालेय किटचे वाटप.',
                        'content' => 'शाळा सुरू होण्याच्या पहिल्याच आठवड्यात जिल्हा परिषद शाळांमधील 1,200 विद्यार्थ्यांना दर्जेदार वह्या, दप्तर, वॉटर बॉटल आणि स्टेशनरी किटचे वाटप करण्यात आले.',
                    ],
                    'hi' => [
                        'title' => 'नए शैक्षणिक सत्र में 1,200 बच्चों को स्कूल किट वितरण',
                        'short_description' => 'वंचित बच्चों की शिक्षा को गति देने हेतु संपूर्ण अध्ययन सामग्री का वितरण।',
                        'content' => 'सत्र के आरंभ में ही सरकारी विद्यालयों के 1,200 से अधिक छात्रों को अध्ययन किट प्रदान किए गए।',
                    ],
                    'en' => [
                        'title' => 'Back-to-School Drive Reaches 1,200 Underprivileged Children',
                        'short_description' => 'Comprehensive learning kits delivered to rural primary schools across Nashik district.',
                        'content' => 'To kick off the new academic year with enthusiasm, Devansh Foundation equipped 1,200 young students with complete school bags, notebooks, geometry boxes, and educational charts.',
                    ],
                ],
            ],
        ];

        foreach ($newsList as $nData) {
            $trans = $nData['translations'];
            unset($nData['translations']);

            $article = NewsArticle::updateOrCreate(['slug' => $nData['slug']], $nData);

            foreach ($trans as $lang => $t) {
                NewsArticleTranslation::updateOrCreate(
                    ['news_article_id' => $article->id, 'language_code' => $lang],
                    $t
                );
            }
        }

        // 8. Gallery Albums & Images
        $album1 = GalleryAlbum::create([
            'slug' => 'community-education',
            'title_mr' => 'शैक्षणिक मदत व बालसंस्कार',
            'title_hi' => 'शैक्षणिक सहायता एवं बाल संस्कार',
            'title_en' => 'Educational Outreach & Children',
            'category' => 'Education',
            'cover_image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80',
            'order' => 1,
        ]);

        $album2 = GalleryAlbum::create([
            'slug' => 'medical-camps',
            'title_mr' => 'आरोग्य शिबिरे व औषध वाटप',
            'title_hi' => 'स्वास्थ्य शिविर एवं दवा वितरण',
            'title_en' => 'Rural Healthcare Camps',
            'category' => 'Healthcare',
            'cover_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
            'order' => 2,
        ]);

        $galleryImages = [
            [
                'gallery_album_id' => $album1->id,
                'image_path' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80',
                'caption_mr' => 'ग्रामीण शाळेत विद्यार्थ्यांना शालेय साहित्याचे वाटप करताना',
                'caption_hi' => 'ग्रामीण स्कूल में बच्चों को अध्ययन सामग्री वितरित करते हुए',
                'caption_en' => 'Distributing school learning kits to eager rural students',
                'category' => 'Education',
                'order' => 1,
            ],
            [
                'gallery_album_id' => $album1->id,
                'image_path' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=800&q=80',
                'caption_mr' => 'अभ्यासिका केंद्रात आनंदाने शिकणारी मुले',
                'caption_hi' => 'स्टडी सेंटर में उत्साह से पढ़ते बच्चे',
                'caption_en' => 'Joyful children attending interactive after-school study sessions',
                'category' => 'Education',
                'order' => 2,
            ],
            [
                'gallery_album_id' => $album2->id,
                'image_path' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                'caption_mr' => 'ज्येष्ठ नागरिकांची नेत्र तपासणी शिबीर',
                'caption_hi' => 'वरिष्ठ नागरिकों हेतु निःशुल्क नेत्र जांच शिविर',
                'caption_en' => 'Free eye diagnostic examination camp for rural senior citizens',
                'category' => 'Healthcare',
                'order' => 3,
            ],
            [
                'gallery_album_id' => $album2->id,
                'image_path' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80',
                'caption_mr' => 'ग्रामीण महिलांसाठी आरोग्य तपासणी व समुपदेशन',
                'caption_hi' => 'ग्रामीण महिलाओं के लिए स्वास्थ्य परामर्श शिविर',
                'caption_en' => 'Preventive wellness and clinical check-up for rural mothers',
                'category' => 'Healthcare',
                'order' => 4,
            ],
            [
                'gallery_album_id' => $album1->id,
                'image_path' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                'caption_mr' => 'स्वयंसेवकांद्वारे वृक्षारोपण मोहीम',
                'caption_hi' => 'स्वयंसेवकों द्वारा वृक्षारोपण अभियान',
                'caption_en' => 'Volunteers planting indigenous saplings during monsoon drive',
                'category' => 'Environment',
                'order' => 5,
            ],
            [
                'gallery_album_id' => $album1->id,
                'image_path' => 'https://images.unsplash.com/photo-1596704017254-9b121068fb31?auto=format&fit=crop&w=800&q=80',
                'caption_mr' => 'महिला सक्षमीकरण शिवण प्रशिक्षण वर्ग',
                'caption_hi' => 'महिला सिलाई प्रशिक्षण केंद्र',
                'caption_en' => 'Women mastering garment tailoring at our vocational skill center',
                'category' => 'Women Empowerment',
                'order' => 6,
            ],
        ];

        foreach ($galleryImages as $img) {
            GalleryImage::create($img);
        }

        // 9. Reports & Transparency (Annual and Financial reports with placeholders)
        $reports = [
            [
                'type' => 'annual',
                'year' => '2023-2024',
                'file_path' => 'reports/annual-report-2023-2024.pdf',
                'file_size' => '2.4 MB',
                'is_published' => true,
                'order' => 1,
                'translations' => [
                    'mr' => ['title' => 'वार्षिक प्रगती अहवाल २०२३-२४', 'description' => 'संस्थेचे वर्षभरातील उपक्रम, लाभार्थी आकडेवारी व सामाजिक प्रभावाचा सर्वसमावेशक अहवाल.'],
                    'hi' => ['title' => 'वार्षिक प्रगति रिपोर्ट २०२३-२४', 'description' => 'संस्था की वर्षभर की गतिविधियां, लाभार्थी आंकड़े और सामाजिक प्रभाव का विवरण।'],
                    'en' => ['title' => 'Annual Progress Report 2023-24', 'description' => 'Comprehensive review of community programs, audited beneficiaries, and grassroots interventions.'],
                ],
            ],
            [
                'type' => 'financial',
                'year' => '2023-2024',
                'file_path' => 'reports/financial-audit-2023-2024.pdf',
                'file_size' => '1.8 MB',
                'is_published' => true,
                'order' => 2,
                'translations' => [
                    'mr' => ['title' => 'आर्थिक ऑडिट अहवाल २०२३-२४', 'description' => 'अधिकृत चार्टर्ड अकाउंटंटद्वारे प्रमाणित संस्थेचे आय-व्यय व देणगी विनियोग तपशील.'],
                    'hi' => ['title' => 'वित्तीय ऑडिट रिपोर्ट २०२३-२४', 'description' => 'चार्टर्ड अकाउंटेंट द्वारा प्रमाणित संस्था का आय-व्यय व वित्तीय लेखा-जोखा।'],
                    'en' => ['title' => 'Financial Audit & Balance Sheet 2023-24', 'description' => 'Independently audited statements of receipts, disbursements, and foundation balance sheet.'],
                ],
            ],
            [
                'type' => 'activity',
                'year' => '2024-2025',
                'file_path' => 'reports/activity-report-q1-2024.pdf',
                'file_size' => '1.2 MB',
                'is_published' => true,
                'order' => 3,
                'translations' => [
                    'mr' => ['title' => 'आरोग्य व शिक्षण उपक्रम अहवाल २०२४', 'description' => 'नाशिक जिल्ह्यातील आरोग्य शिबिरे व शालेय साहित्य वाटपाचा त्रैमासिक विशेष अहवाल.'],
                    'hi' => ['title' => 'स्वास्थ्य एवं शिक्षा अभियान रिपोर्ट २०२४', 'description' => 'नासिक जिले में संपन्न स्वास्थ्य शिविरों और स्कूल किट वितरण की विशेष रिपोर्ट।'],
                    'en' => ['title' => 'Healthcare & Education Impact Brief 2024', 'description' => 'Quarterly field update covering diagnostic camps and student support metrics.'],
                ],
            ],
        ];

        foreach ($reports as $rData) {
            $trans = $rData['translations'];
            unset($rData['translations']);

            $rep = Report::create($rData);
            foreach ($trans as $lang => $t) {
                ReportTranslation::create(array_merge($t, [
                    'report_id' => $rep->id,
                    'language_code' => $lang,
                ]));
            }
        }

        // 10. Sample Volunteer & Donation records for Admin testing
        VolunteerApplication::create([
            'name' => 'Rahul Shinde',
            'email' => 'rahul.shinde@example.com',
            'phone' => '+91 98230 11223',
            'city' => 'Nashik',
            'age' => '24',
            'area_of_interest' => 'Education & Youth Mentoring',
            'skills' => 'Teaching, Public Speaking, Social Media',
            'availability' => 'Weekends (Saturday & Sunday)',
            'message' => 'I would love to teach underprivileged children in Nashik on weekends.',
            'status' => 'pending',
        ]);

        Donation::create([
            'donor_name' => 'Amit Sharma',
            'donor_email' => 'amit.sharma@example.com',
            'donor_phone' => '+91 99887 66554',
            'donor_pan' => 'ABCPS1234F',
            'donor_address' => 'College Road, Nashik, Maharashtra',
            'amount' => 5000,
            'donation_type' => 'one-time',
            'payment_method' => 'upi_qr',
            'transaction_id' => 'UPI4289102941',
            'payment_status' => 'successful',
            'receipt_number' => 'DF-2024-001',
            'notes' => 'Donation for Educational Support kits',
        ]);

        ContactMessage::create([
            'name' => 'Dr. Rajesh Patil',
            'email' => 'dr.rajeshpatil@example.com',
            'phone' => '+91 94222 33445',
            'subject' => 'Voluntary Medical Screening Support',
            'message' => 'Greetings! I am a general physician in Nashik and would be honored to volunteer my services in your upcoming rural medical camps.',
            'is_read' => false,
        ]);
    }
}
