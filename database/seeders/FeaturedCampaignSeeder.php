<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\CampaignImpact;
use App\Models\CampaignImpactTranslation;
use App\Models\CampaignTranslation;
use Illuminate\Database\Seeder;

class FeaturedCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Idempotent seeder: uses updateOrCreate to avoid creating duplicates.
     */
    public function run(): void
    {
        $campaigns = [
            // Campaign 1: Assistive Care
            [
                'slug' => 'support-assistive-care-for-persons-with-disabilities',
                'category' => 'Disability & Senior Welfare',
                'featured_image' => '/images/campaigns/campaign-1-assistive-care.jpg',
                'target_amount' => 110000.00,
                'raised_amount' => 73200.00,
                'currency' => 'INR',
                'is_featured' => true,
                'is_published' => true,
                'is_demo' => true,
                'status' => 'active',
                'order' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Support Assistive Care for Persons with Disabilities',
                        'title_highlight' => 'Persons with Disabilities',
                        'short_description' => 'Help provide mobility aids, therapy support and inclusion-focused assistance for children and adults with disabilities.',
                        'description' => 'Devansh Foundation works proactively to ensure dignified, independent living for children and adults facing physical and neurological challenges. Your contribution funds customized wheelchairs, walker frames, speech and physiotherapy sessions, and barrier-free inclusive schooling support.',
                        'category_name' => 'Disability & Senior Welfare',
                    ],
                    'mr' => [
                        'title' => 'दिव्यांग व्यक्तींसाठी सहाय्यक सुविधा व उपचार',
                        'title_highlight' => 'सहाय्यक सुविधा',
                        'short_description' => 'दिव्यांग मुलांना आणि प्रौढांना आवश्यक सहाय्यक साधने, थेरपी आणि समावेशक मदत उपलब्ध करून देण्यासाठी सहकार्य करा.',
                        'description' => 'देवंश फाउंडेशनच्या माध्यमातून विशेष गरजा असलेल्या बालकांना व व्यक्तींना स्वावलंबी बनवण्यासाठी व्हीलचेअर्स, वॉकर, फिजिओथेरपी आणि नियमित वैद्यकीय मार्गदर्शन उपलब्ध करून दिले जाते. या मोहिमेत सहभागी होऊन जीवन सुकर बनवा.',
                        'category_name' => 'दिव्यांग व ज्येष्ठ नागरिक कल्याण',
                    ],
                    'hi' => [
                        'title' => 'दिव्यांग व्यक्तियों के लिए सहायक सहायता व पुनर्वास',
                        'title_highlight' => 'सहायक सहायता',
                        'short_description' => 'दिव्यांग बच्चों और वयस्कों के लिए आवश्यक सहायक उपकरण, थेरेपी और समावेशी सहायता उपलब्ध कराने में सहयोग करें।',
                        'description' => 'देवांश फाउंडेशन विशेष रूप से दिव्यांग बच्चों एवं वयस्कों को स्वावलंबी और गरिमापूर्ण जीवन प्रदान करने के लिए व्हीलचेयर, फिजियोथेरेपी व समावेशी सहायता पहुंचा रहा है। आपके सहयोग से कई जीवन संवर सकते हैं।',
                        'category_name' => 'दिव्यांग एवं वरिष्ठ नागरिक कल्याण',
                    ],
                ],
                'impacts' => [
                    [
                        'order' => 1,
                        'icon' => 'users',
                        'badge_color' => 'green',
                        'is_primary' => true,
                        'metric_value' => '80',
                        'translations' => [
                            'en' => ['label' => 'Beneficiaries'],
                            'mr' => ['label' => 'लाभार्थी'],
                            'hi' => ['label' => 'लाभार्थी'],
                        ],
                    ],
                    [
                        'order' => 2,
                        'icon' => 'accessibility',
                        'badge_color' => 'blue',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Mobility Aids'],
                            'mr' => ['label' => 'सहाय्यक साधने'],
                            'hi' => ['label' => 'सहायक उपकरण'],
                        ],
                    ],
                    [
                        'order' => 3,
                        'icon' => 'heart-pulse',
                        'badge_color' => 'orange',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Therapy Support'],
                            'mr' => ['label' => 'थेरपी सहाय्य'],
                            'hi' => ['label' => 'थेरेपी सहायता'],
                        ],
                    ],
                    [
                        'order' => 4,
                        'icon' => 'shield-check',
                        'badge_color' => 'red',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Inclusion Care'],
                            'mr' => ['label' => 'समावेशक काळजी'],
                            'hi' => ['label' => 'समावेशी देखभाल'],
                        ],
                    ],
                ],
            ],

            // Campaign 2: Free Health Check-up Camp
            [
                'slug' => 'free-health-checkup-camp-for-rural-families',
                'category' => 'Healthcare',
                'featured_image' => '/images/campaigns/campaign-2-rural-health-camp.jpg',
                'target_amount' => 80000.00,
                'raised_amount' => 58000.00,
                'currency' => 'INR',
                'is_featured' => true,
                'is_published' => true,
                'is_demo' => true,
                'status' => 'active',
                'order' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'Free Health Check-up Camp for Rural Families',
                        'title_highlight' => 'Rural Families',
                        'short_description' => 'Support accessible healthcare services for underserved communities through regular medical camps.',
                        'description' => 'Rural and tribal villages in Nashik district often lack proximate primary healthcare. We arrange periodic on-ground medical camps with qualified physicians, pediatric screenings, free essential medication distribution, and clinical diagnosis.',
                        'category_name' => 'Healthcare',
                    ],
                    'mr' => [
                        'title' => 'ग्रामीण कुटुंबांसाठी मोफत आरोग्य तपासणी शिबिर',
                        'title_highlight' => 'ग्रामीण कुटुंबे',
                        'short_description' => 'नियमित आरोग्य शिबिरांच्या माध्यमातून गरजू ग्रामीण समुदायांना आरोग्य सेवा उपलब्ध करून देण्यासाठी सहकार्य करा.',
                        'description' => 'नाशिक जिल्ह्यातील दुर्गम भागातील नागरिकांसाठी तज्ज्ञ डॉक्टरांच्या उपस्थितीत मोफत आरोग्य तपासणी, औषध वाटप आणि रक्ततपासणी शिबिरे आयोजित केली जातात. आरोग्य हीच खरी संपत्ती निर्माण करण्याचा आमचा संकल्प आहे.',
                        'category_name' => 'आरोग्य सेवा',
                    ],
                    'hi' => [
                        'title' => 'ग्रामीण परिवारों के लिए निःशुल्क स्वास्थ्य जांच शिविर',
                        'title_highlight' => 'ग्रामीण परिवार',
                        'short_description' => 'नियमित स्वास्थ्य शिविरों के माध्यम से जरूरतमंद ग्रामीण समुदायों तक स्वास्थ्य सेवाएं पहुंचाने में सहयोग करें।',
                        'description' => 'ग्रामीण और दूरदराज के क्षेत्रों में प्राथमिक चिकित्सा सेवाएं पहुंचाने के लिए नियमित निःशुल्क स्वास्थ्य शिविर आयोजित किए जा रहे हैं। इसमें अनुभवी डॉक्टर, आवश्यक दवाएं व स्वास्थ्य परामर्श शामिल हैं।',
                        'category_name' => 'स्वास्थ्य सेवा',
                    ],
                ],
                'impacts' => [
                    [
                        'order' => 1,
                        'icon' => 'users',
                        'badge_color' => 'green',
                        'is_primary' => true,
                        'metric_value' => '500',
                        'translations' => [
                            'en' => ['label' => 'Patients'],
                            'mr' => ['label' => 'रुग्ण'],
                            'hi' => ['label' => 'मरीज'],
                        ],
                    ],
                    [
                        'order' => 2,
                        'icon' => 'stethoscope',
                        'badge_color' => 'blue',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Free Check-up'],
                            'mr' => ['label' => 'मोफत तपासणी'],
                            'hi' => ['label' => 'निःशुल्क जांच'],
                        ],
                    ],
                    [
                        'order' => 3,
                        'icon' => 'pill',
                        'badge_color' => 'orange',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Medicines'],
                            'mr' => ['label' => 'मोफत औषधे'],
                            'hi' => ['label' => 'दवाइयां'],
                        ],
                    ],
                    [
                        'order' => 4,
                        'icon' => 'megaphone',
                        'badge_color' => 'red',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Health Awareness'],
                            'mr' => ['label' => 'आरोग्य जनजागृती'],
                            'hi' => ['label' => 'स्वास्थ्य जागरूकता'],
                        ],
                    ],
                ],
            ],

            // Campaign 3: Empower Women Through Skill Training
            [
                'slug' => 'empower-50-women-through-skill-training',
                'category' => 'Women Empowerment',
                'featured_image' => '/images/campaigns/campaign-3-women-skill-training.jpg',
                'target_amount' => 150000.00,
                'raised_amount' => 91000.00,
                'currency' => 'INR',
                'is_featured' => true,
                'is_published' => true,
                'is_demo' => true,
                'status' => 'active',
                'order' => 3,
                'translations' => [
                    'en' => [
                        'title' => 'Empower 50 Women Through Skill Training',
                        'title_highlight' => 'Skill Training',
                        'short_description' => 'Help women gain income-generating skills and become financially independent.',
                        'description' => 'Economic independence is the foundation of lasting female empowerment. This program sponsors 3-month certified vocational training in tailoring, textile design, handicraft production, and small business financial management.',
                        'category_name' => 'Women Empowerment',
                    ],
                    'mr' => [
                        'title' => 'कौशल्य प्रशिक्षणातून ५० महिलांना सक्षम करणे',
                        'title_highlight' => 'कौशल्य प्रशिक्षण',
                        'short_description' => 'महिलांना उत्पन्नाचे साधन निर्माण करणारी कौशल्ये शिकवून आर्थिकदृष्ट्या सक्षम होण्यासाठी सहकार्य करा.',
                        'description' => 'महिलांच्या आर्थिक आत्मनिर्भरतेसाठी ३ महिन्यांचे शिवणकाम, हस्तकला आणि गृहउद्योग प्रशिक्षण दिले जाते. प्रशिक्षण पूर्ण झाल्यावर शिलाई मशीन व साहित्य किट देऊन त्यांना स्वतःच्या पायावर उभे राहण्यास मदत केली जाते.',
                        'category_name' => 'महिला सक्षमीकरण',
                    ],
                    'hi' => [
                        'title' => 'कौशल प्रशिक्षण के माध्यम से 50 महिलाओं को सशक्त बनाना',
                        'title_highlight' => 'कौशल प्रशिक्षण',
                        'short_description' => 'महिलाओं को आय सृजन करने वाले कौशल प्रदान कर आर्थिक रूप से आत्मनिर्भर बनने में सहयोग करें।',
                        'description' => 'महिलाओं की वित्तीय स्वतंत्रता के लिए सिलाई-कढ़ाई, हस्तशिल्प और स्वरोज़गार कौशल का 3 महीने का प्रशिक्षण प्रदान किया जाता है। आपकी सहायता से महिलाएं आत्मनिर्भर बन सकती हैं।',
                        'category_name' => 'महिला सशक्तिकरण',
                    ],
                ],
                'impacts' => [
                    [
                        'order' => 1,
                        'icon' => 'users',
                        'badge_color' => 'green',
                        'is_primary' => true,
                        'metric_value' => '50',
                        'translations' => [
                            'en' => ['label' => 'Women'],
                            'mr' => ['label' => 'महिला'],
                            'hi' => ['label' => 'महिलाएं'],
                        ],
                    ],
                    [
                        'order' => 2,
                        'icon' => 'presentation',
                        'badge_color' => 'blue',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Skill Training'],
                            'mr' => ['label' => 'कौशल्य प्रशिक्षण'],
                            'hi' => ['label' => 'कौशल प्रशिक्षण'],
                        ],
                    ],
                    [
                        'order' => 3,
                        'icon' => 'scissors',
                        'badge_color' => 'orange',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Sewing Kits'],
                            'mr' => ['label' => 'शिलाई किट'],
                            'hi' => ['label' => 'सिलाई किट'],
                        ],
                    ],
                    [
                        'order' => 4,
                        'icon' => 'trending-up',
                        'badge_color' => 'red',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Livelihood Support'],
                            'mr' => ['label' => 'उपजीविका सहाय्य'],
                            'hi' => ['label' => 'आजीविका सहायता'],
                        ],
                    ],
                ],
            ],

            // Campaign 4: Help 100 Students Get School Kits
            [
                'slug' => 'help-100-students-get-school-kits',
                'category' => 'Education',
                'featured_image' => '/images/campaigns/campaign-4-students-school-kits.jpg',
                'target_amount' => 100000.00,
                'raised_amount' => 72500.00,
                'currency' => 'INR',
                'is_featured' => true,
                'is_published' => true,
                'is_demo' => true,
                'status' => 'active',
                'order' => 4,
                'translations' => [
                    'en' => [
                        'title' => 'Help 100 Students Get School Kits',
                        'title_highlight' => 'School Kits',
                        'short_description' => 'Let’s make education accessible for every child. Your small contribution can create a big change.',
                        'description' => 'Financial constraints should never stand between a bright young student and their educational dreams. We equip rural primary students with high quality waterproof school bags, notebook packs, geometry sets, pens, and basic learning materials.',
                        'category_name' => 'Education',
                    ],
                    'mr' => [
                        'title' => '१०० विद्यार्थ्यांना शालेय साहित्य मिळवून देण्यासाठी मदत करा',
                        'title_highlight' => 'शालेय साहित्य',
                        'short_description' => 'प्रत्येक मुलासाठी शिक्षण अधिक सुलभ बनवूया. तुमचे छोटेसे योगदान मोठा बदल घडवू शकते.',
                        'description' => 'गरिबीमुळे कोणतेही मूल शिक्षणापासून वंचित राहू नये म्हणून ग्रामीण शाळेतील विद्यार्थ्यांना दप्तर, वह्या, कंपास पेटी आणि आवश्यक शैक्षणिक साहित्य संच वाटप केले जाते. मुलांच्या चेहऱ्यावरील आनंद अमूल्य आहे.',
                        'category_name' => 'शिक्षण सहाय्य',
                    ],
                    'hi' => [
                        'title' => '100 विद्यार्थियों को स्कूल किट उपलब्ध कराने में सहायता करें',
                        'title_highlight' => 'स्कूल किट',
                        'short_description' => 'हर बच्चे के लिए शिक्षा को सुलभ बनाएं। आपका छोटा योगदान बड़ा बदलाव ला सकता है।',
                        'description' => 'आर्थिक तंगी के कारण किसी भी बच्चे की पढ़ाई न छूटे, इसके लिए जरूरतमंद ग्रामीण बच्चों को वाटरप्रूफ स्कूल बैग, कॉपियां, ज्यामिति बॉक्स व अध्ययन सामग्री का संपूर्ण किट प्रदान किया जाता है।',
                        'category_name' => 'शिक्षा सहायता',
                    ],
                ],
                'impacts' => [
                    [
                        'order' => 1,
                        'icon' => 'users',
                        'badge_color' => 'green',
                        'is_primary' => true,
                        'metric_value' => '100',
                        'translations' => [
                            'en' => ['label' => 'Students'],
                            'mr' => ['label' => 'विद्यार्थी'],
                            'hi' => ['label' => 'विद्यार्थी'],
                        ],
                    ],
                    [
                        'order' => 2,
                        'icon' => 'backpack',
                        'badge_color' => 'blue',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'School Bags'],
                            'mr' => ['label' => 'शालेय बॅग'],
                            'hi' => ['label' => 'स्कूल बैग'],
                        ],
                    ],
                    [
                        'order' => 3,
                        'icon' => 'book-open',
                        'badge_color' => 'orange',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Notebooks'],
                            'mr' => ['label' => 'वह्या-पुस्तके'],
                            'hi' => ['label' => 'नोटबुक्स'],
                        ],
                    ],
                    [
                        'order' => 4,
                        'icon' => 'pencil',
                        'badge_color' => 'red',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Stationery'],
                            'mr' => ['label' => 'शैक्षणिक साहित्य'],
                            'hi' => ['label' => 'स्टेशनरी'],
                        ],
                    ],
                ],
            ],

            // Campaign 5: Clean Water for 10 Villages
            [
                'slug' => 'support-clean-water-for-10-villages',
                'category' => 'Rural Development',
                'featured_image' => '/images/campaigns/campaign-5-clean-water.jpg',
                'target_amount' => 200000.00,
                'raised_amount' => 112000.00,
                'currency' => 'INR',
                'is_featured' => true,
                'is_published' => true,
                'is_demo' => true,
                'status' => 'active',
                'order' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Support Clean Water for 10 Villages',
                        'title_highlight' => '10 Villages',
                        'short_description' => 'Help improve rural lives through safe drinking water and basic community support.',
                        'description' => 'Contaminated groundwater causes recurring health epidemics in dry rural hamlets. We construct community water purification units and repair hand pumps to secure clean, drinkable water for entire villages.',
                        'category_name' => 'Rural Development',
                    ],
                    'mr' => [
                        'title' => '१० गावांसाठी शुद्ध पिण्याचे पाणी सहाय्य उपक्रम',
                        'title_highlight' => '१० गावांसाठी',
                        'short_description' => 'शुद्ध पिण्याच्या पाण्याचा पुरवठा करून ग्रामीण जनतेचे आरोग्य व जीवनमान सुधारण्यास मदत करा.',
                        'description' => 'दुर्गम वाड्या-वस्त्यांवर पिण्याच्या पाण्याचे दुर्भिक्ष असते. फाउंडेशनतर्फे शुद्ध जल फिल्टर प्रकल्प उभारणी, बोअरवेल दुरुस्ती आणि जलशुद्धीकरण जनजागृती राबवून गावकऱ्यांना शुद्ध पाणी पुरवले जाते.',
                        'category_name' => 'ग्रामीण विकास',
                    ],
                    'hi' => [
                        'title' => '10 गांवों के लिए स्वच्छ पेयजल सहायता पहल',
                        'title_highlight' => '10 गांवों के लिए',
                        'short_description' => 'स्वच्छ पेयजल और बुनियादी सामुदायिक सहायता के माध्यम से ग्रामीण जीवन को बेहतर बनाने में सहयोग करें।',
                        'description' => 'असुरक्षित जल से होने वाली बीमारियों से बचाव के लिए 10 चयनित गांवों में सामुदायिक जल शोधन प्रणाली और हैंडपंप मरम्मत का कार्य किया जा रहा है।',
                        'category_name' => 'ग्रामीण विकास',
                    ],
                ],
                'impacts' => [
                    [
                        'order' => 1,
                        'icon' => 'home',
                        'badge_color' => 'green',
                        'is_primary' => true,
                        'metric_value' => '10',
                        'translations' => [
                            'en' => ['label' => 'Villages'],
                            'mr' => ['label' => 'गावे'],
                            'hi' => ['label' => 'गांव'],
                        ],
                    ],
                    [
                        'order' => 2,
                        'icon' => 'droplet',
                        'badge_color' => 'blue',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Water Filters'],
                            'mr' => ['label' => 'वॉटर फिल्टर्स'],
                            'hi' => ['label' => 'वाटर फिल्टर'],
                        ],
                    ],
                    [
                        'order' => 3,
                        'icon' => 'users',
                        'badge_color' => 'orange',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Community Support'],
                            'mr' => ['label' => 'समुदाय सहकार्य'],
                            'hi' => ['label' => 'सामुदायिक सहयोग'],
                        ],
                    ],
                    [
                        'order' => 4,
                        'icon' => 'heart',
                        'badge_color' => 'red',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Safe Drinking Water'],
                            'mr' => ['label' => 'शुद्ध पिण्याचे पाणी'],
                            'hi' => ['label' => 'स्वच्छ पेयजल'],
                        ],
                    ],
                ],
            ],

            // Campaign 6: Tree Plantation
            [
                'slug' => 'plant-1000-trees-for-a-greener-tomorrow',
                'category' => 'Environment',
                'featured_image' => '/images/campaigns/campaign-6-tree-plantation.jpg',
                'target_amount' => 75000.00,
                'raised_amount' => 43500.00,
                'currency' => 'INR',
                'is_featured' => true,
                'is_published' => true,
                'is_demo' => true,
                'status' => 'active',
                'order' => 6,
                'translations' => [
                    'en' => [
                        'title' => 'Plant 1,000 Trees for a Greener Tomorrow',
                        'title_highlight' => 'Greener Tomorrow',
                        'short_description' => 'Join our tree plantation drive to create a cleaner, greener and healthier environment.',
                        'description' => 'Devansh Foundation actively plants native trees and establishes community-led maintenance across villages and schools in Nashik. Your support helps plant, nurture, and preserve trees for future generations.',
                        'category_name' => 'Environment',
                    ],
                    'mr' => [
                        'title' => 'उज्ज्वल भविष्यासाठी १,००० वृक्षारोपण मोहीम',
                        'title_highlight' => 'वृक्षारोपण मोहीम',
                        'short_description' => 'स्वच्छ, हिरवेगार आणि निरोगी पर्यावरणासाठी आमच्या वृक्षारोपण मोहिमेत सहभागी व्हा.',
                        'description' => 'देवांश फाउंडेशनतर्फे नाशिक परिसर व ग्रामीण शाळांमध्ये देशी वृक्षांची लागवड करून ३ वर्षे त्यांच्या संगोपनाची जबाबदारी घेतली जाते. आपल्या छोट्या योगदानाने हिरवेगार भविष्य निर्माण करा.',
                        'category_name' => 'पर्यावरण संवर्धन',
                    ],
                    'hi' => [
                        'title' => 'हरित कल के लिए १,००० पौधे रोपण अभियान',
                        'title_highlight' => 'पौधे रोपण अभियान',
                        'short_description' => 'स्वच्छ, हरित और स्वस्थ पर्यावरण के निर्माण हेतु हमारे वृक्षारोपण अभियान से जुड़ें।',
                        'description' => 'देवांश फाउंडेशन द्वारा ग्रामीण व विद्यालय परिसरों में सघन पौधरोपण और उनके संरक्षण की पहल की जा रही है। भावी पीढ़ी के स्वच्छ वातावरण के लिए आपका सहयोग अमूल्य है।',
                        'category_name' => 'पर्यावरण संरक्षण',
                    ],
                ],
                'impacts' => [
                    [
                        'order' => 1,
                        'icon' => 'sprout',
                        'badge_color' => 'green',
                        'is_primary' => true,
                        'metric_value' => '1,000',
                        'translations' => [
                            'en' => ['label' => 'Trees'],
                            'mr' => ['label' => 'वृक्ष'],
                            'hi' => ['label' => 'पेड़'],
                        ],
                    ],
                    [
                        'order' => 2,
                        'icon' => 'users',
                        'badge_color' => 'blue',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Volunteers'],
                            'mr' => ['label' => 'स्वयंसेवक'],
                            'hi' => ['label' => 'स्वयंसेवक'],
                        ],
                    ],
                    [
                        'order' => 3,
                        'icon' => 'flower-2',
                        'badge_color' => 'orange',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Plantation Drive'],
                            'mr' => ['label' => 'लागवड मोहीम'],
                            'hi' => ['label' => 'वृक्षारोपण अभियान'],
                        ],
                    ],
                    [
                        'order' => 4,
                        'icon' => 'globe',
                        'badge_color' => 'red',
                        'is_primary' => false,
                        'metric_value' => null,
                        'translations' => [
                            'en' => ['label' => 'Environment Care'],
                            'mr' => ['label' => 'पर्यावरण संवर्धन'],
                            'hi' => ['label' => 'पर्यावरण संरक्षण'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($campaigns as $campData) {
            $transData = $campData['translations'];
            $impactsData = $campData['impacts'];
            unset($campData['translations'], $campData['impacts']);

            $campaign = Campaign::updateOrCreate(
                ['slug' => $campData['slug']],
                $campData
            );

            // Update Translations
            foreach ($transData as $locale => $fields) {
                CampaignTranslation::updateOrCreate(
                    [
                        'campaign_id' => $campaign->id,
                        'language_code' => $locale,
                    ],
                    $fields
                );
            }

            // Update Impacts
            foreach ($impactsData as $impData) {
                $impTrans = $impData['translations'];
                unset($impData['translations']);
                $impData['campaign_id'] = $campaign->id;

                $impact = CampaignImpact::updateOrCreate(
                    [
                        'campaign_id' => $campaign->id,
                        'order' => $impData['order'],
                    ],
                    $impData
                );

                foreach ($impTrans as $loc => $labels) {
                    CampaignImpactTranslation::updateOrCreate(
                        [
                            'campaign_impact_id' => $impact->id,
                            'language_code' => $loc,
                        ],
                        $labels
                    );
                }
            }
        }
    }
}
