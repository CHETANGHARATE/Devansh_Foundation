<?php

namespace Database\Seeders;

use App\Models\DonationCase;
use App\Models\DonationCaseTranslation;
use Illuminate\Database\Seeder;

class DonationCaseSeeder extends Seeder
{
    public function run(): void
    {
        $cases = [
            [
                'slug' => 'baby-of-shaikh-irfan-moinuddin',
                'beneficiary_name' => 'Baby of Shaikh Irfan Moinuddin (Girl)',
                'category' => 'medical',
                'category_icon' => 'baby',
                'image' => '/images/cases/case-1-baby-nicu.jpg',
                'target_amount' => 280000.00,
                'collected_amount' => 165000.00,
                'currency' => 'INR',
                'expense_label' => 'Treatment Expense',
                'status' => 'active',
                'order' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Baby of Shaikh Irfan Moinuddin (Girl)',
                        'expense_label' => 'Treatment Expense',
                        'urgent_message' => 'Please support her treatment for low birth weight, cyanosis, severe respiratory distress and tachypnea.',
                        'description' => 'Baby of Shaikh Irfan Moinuddin, one of twins, is a few days old baby girl suffering from extreme prematurity and significant respiratory compromise, including inadequate spontaneous respiration and inability to maintain oxygen saturation.',
                        'category_name' => 'Pediatric Intensive Care',
                    ],
                    'mr' => [
                        'title' => 'शेख इरफान मोईनुद्दीन यांची कन्या (बाळ)',
                        'expense_label' => 'उपचार खर्च',
                        'urgent_message' => 'कमी जन्मवजन, सायनोसिस आणि तीव्र श्वसन त्रासावरील उपचारासाठी तातडीने मदत करा.',
                        'description' => 'शेख इरफान मोईनुद्दीन यांची नवजात जुळ्यांपैकी एक चिमुरडी कन्या असून तिचे जन्मतःच अत्यंत कमी वजन आणि श्वसन प्रक्रियेत गंभीर गुंतागुंत निर्माण झाली आहे. तिला तातडीने NICU व्हेंटिलेटर व विशेष वैद्यकीय देखभालीची गरज आहे.',
                        'category_name' => 'बालरोग अतिदक्षता उपचार',
                    ],
                    'hi' => [
                        'title' => 'शेख इरफान मोईनुद्दीन की नवजात बच्ची (बेटी)',
                        'expense_label' => 'इलाज का खर्च',
                        'urgent_message' => 'कम जन्म वजन, सायनोसिस और गंभीर सांस की बीमारी के इलाज के लिए कृपया सहायता करें.',
                        'description' => 'शेख इरफान मोईनुद्दीन की नवजात जुड़वां बच्चियों में से एक, जो अत्यधिक अपरिपक्वता और सांस लेने में गंभीर तकलीफ से जूझ रही है. उसे तत्काल एनआईसीयू और जीवनरक्षक चिकित्सकीय सहायता की आवश्यकता है.',
                        'category_name' => 'बाल गहन चिकित्सा',
                    ],
                ],
            ],
            [
                'slug' => 'master-aarav-deshmukh-heart-surgery',
                'beneficiary_name' => 'Master Aarav Deshmukh (Age 4)',
                'category' => 'medical',
                'category_icon' => 'heart-pulse',
                'image' => '/images/cases/case-2-aarav-heart.jpg',
                'target_amount' => 350000.00,
                'collected_amount' => 220000.00,
                'currency' => 'INR',
                'expense_label' => 'Surgery Expense',
                'status' => 'active',
                'order' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'Master Aarav Deshmukh (Age 4)',
                        'expense_label' => 'Surgery Expense',
                        'urgent_message' => 'Urgent open-heart surgery required for congenital Ventricular Septal Defect (VSD) closure.',
                        'description' => '4-year-old Aarav from a drought-prone farmer family in Nashik district was diagnosed with a large hole in his heart causing rapid fatigue, recurrent pneumonia, and stunted growth. Corrective pediatric cardiac surgery can save his life.',
                        'category_name' => 'Pediatric Cardiac Surgery',
                    ],
                    'mr' => [
                        'title' => 'मास्टर आरव देशमुख (वय ४ वर्षे)',
                        'expense_label' => 'शस्त्रक्रिया खर्च',
                        'urgent_message' => 'जन्मजात हृदयातील छिद्र (VSD) बंद करण्यासाठी तातडीची ओपन-हार्ट शस्त्रक्रिया आवश्यक.',
                        'description' => 'नाशिक जिल्ह्यातील शेतकरी कुटुंबातील ४ वर्षांच्या आरवला हृदयातील मोठ्या छिद्रामुळे वारंवार न्यूमोनिया व दम भरतो. डॉक्टरांनी लवकरात लवकर कार्डियाक सर्जरी करण्याचा सल्ला दिला असून त्याच्या उपचारासाठी आपले सहकार्य हवे आहे.',
                        'category_name' => 'बालरोग हृदय शस्त्रक्रिया',
                    ],
                    'hi' => [
                        'title' => 'मास्टर आरव देशमुख (उम्र ४ वर्ष)',
                        'expense_label' => 'सर्जरी का खर्च',
                        'urgent_message' => 'जन्मजात हृदय विकार (VSD क्लोजर) के लिए तत्काल ओपन हार्ट सर्जरी की आवश्यकता है.',
                        'description' => 'नासिक के एक साधारण किसान परिवार के ४ वर्षीय आरव के दिल में बड़ा छेद है, जिससे उसे लगातार निमोनिया और सांस लेने में कठिनाई हो रही है. समय पर बाल हृदय शल्यचिकित्सा से उसकी जान बचाई जा सकती है.',
                        'category_name' => 'बाल हृदय सर्जरी',
                    ],
                ],
            ],
            [
                'slug' => 'kumari-ananya-jadhav-cochlear-implant',
                'beneficiary_name' => 'Kumari Ananya Suresh Jadhav (Age 7)',
                'category' => 'child_welfare',
                'category_icon' => 'sparkles',
                'image' => '/images/cases/case-3-ananya-hearing.jpg',
                'target_amount' => 420000.00,
                'collected_amount' => 310000.00,
                'currency' => 'INR',
                'expense_label' => 'Implant & Therapy',
                'status' => 'active',
                'order' => 3,
                'translations' => [
                    'en' => [
                        'title' => 'Kumari Ananya Suresh Jadhav (Age 7)',
                        'expense_label' => 'Implant & Therapy',
                        'urgent_message' => 'Help little Ananya hear the world through life-changing bilateral cochlear implant surgery.',
                        'description' => 'Born with severe sensorineural hearing loss, bright 7-year-old Ananya dreams of attending school with friends. With specialized implant surgery and auditory therapy, she will be able to speak and listen normally.',
                        'category_name' => 'Hearing Rehabilitation',
                    ],
                    'mr' => [
                        'title' => 'कुमारी अनन्या सुरेश जाधव (वय ७ वर्षे)',
                        'expense_label' => 'प्रत्यारोपण व उपचार',
                        'urgent_message' => 'चिमुकल्या अनन्यास ऐकू येण्यासाठी कॉकलियर इम्प्लांट शस्त्रक्रियेसाठी मदत करा.',
                        'description' => 'जन्मतःच श्रवणदोष असणारी हुशार अनन्या सामान्य शाळेत शिकण्याचे स्वप्न पाहत आहे. कॉकलियर इम्प्लांट शस्त्रक्रिया आणि स्पीच थेरपीमुळे ती संपूर्ण ऐकू आणि बोलू शकेल. तिच्या उपचारासाठी मदतीचा हात द्या.',
                        'category_name' => 'श्रवणदोष पुनर्वसन',
                    ],
                    'hi' => [
                        'title' => 'कुमारी अनन्या सुरेश जाधव (उम्र ७ वर्ष)',
                        'expense_label' => 'इम्प्लांट व थेरेपी',
                        'urgent_message' => 'छोटी अनन्या को सुनने और बोलने का अवसर देने के लिए कॉकलियर इम्प्लांट में मदद करें.',
                        'description' => 'जन्मजात श्रवण बाधित ७ वर्षीय अनन्या सामान्य बच्चों की तरह स्कूल जाना चाहती है. आधुनिक कॉकलियर इम्प्लांट सर्जरी और स्पीच थेरेपी से उसका जीवन पूरी तरह बदल सकता है.',
                        'category_name' => 'श्रवण पुनर्वसन',
                    ],
                ],
            ],
            [
                'slug' => 'master-rohan-shinde-chemotherapy',
                'beneficiary_name' => 'Master Rohan Ramesh Shinde (Age 9)',
                'category' => 'medical',
                'category_icon' => 'activity',
                'image' => '/images/cases/case-4-rohan-leukemia.jpg',
                'target_amount' => 500000.00,
                'collected_amount' => 345000.00,
                'currency' => 'INR',
                'expense_label' => 'Chemotherapy Support',
                'status' => 'active',
                'order' => 4,
                'translations' => [
                    'en' => [
                        'title' => 'Master Rohan Ramesh Shinde (Age 9)',
                        'expense_label' => 'Chemotherapy Support',
                        'urgent_message' => 'Support ongoing chemotherapy and supportive care for 9-year-old Rohan fighting acute leukemia.',
                        'description' => 'Rohan was diagnosed with B-cell ALL (blood cancer). Doctors project an 85% curability rate with consistent multi-cycle chemotherapy and blood transfusions. His laborer parents have exhausted all savings.',
                        'category_name' => 'Pediatric Oncology',
                    ],
                    'mr' => [
                        'title' => 'मास्टर रोहन रमेश शिंदे (वय ९ वर्षे)',
                        'expense_label' => 'किमोथेरपी व औषधोपचार',
                        'urgent_message' => 'रक्त कर्करोगाशी (Blood Cancer) लढा देणाऱ्या ९ वर्षीय रोहनच्या उपचारासाठी सहकार्य करा.',
                        'description' => 'रोहनला एक्यूट ल्युकेमियाचे निदान झाले आहे. योग्य वेळेत किमोथेरपी व रक्त संक्रमण झाल्यास रोहन कर्करोगावर पूर्णपणे मात करू शकतो. रोजंदारीवर काम करणाऱ्या आई-वडिलांना उपचाराचा खर्च पेलवणे अशक्य झाले आहे.',
                        'category_name' => 'बाल कर्करोग उपचार',
                    ],
                    'hi' => [
                        'title' => 'मास्टर रोहन रमेश शिंदे (उम्र ९ वर्ष)',
                        'expense_label' => 'कीमोथेरेपी सहायता',
                        'urgent_message' => 'ब्लड कैंसर से जंग लड़ रहे ९ वर्षीय रोहन के कीमोथेरेपी इलाज में सहायता करें.',
                        'description' => 'रोहन को तीव्र ल्यूकेमिया का पता चला है. डॉक्टरों के अनुसार नियमित कीमोथेरेपी से उसके पूरी तरह ठीक होने की ८५% संभावना है. दिहाड़ी मजदूर माता-पिता के पास इलाज जारी रखने के पैसे नहीं बचे हैं.',
                        'category_name' => 'बाल कैंसर चिकित्सा',
                    ],
                ],
            ],
            [
                'slug' => 'kumari-sanya-more-education-support',
                'beneficiary_name' => 'Kumari Sanya Dilip More (Age 11)',
                'category' => 'education',
                'category_icon' => 'book-open',
                'image' => '/images/cases/case-5-sanya-education.jpg',
                'target_amount' => 85000.00,
                'collected_amount' => 58000.00,
                'currency' => 'INR',
                'expense_label' => 'Annual Education Fee',
                'status' => 'active',
                'order' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Kumari Sanya Dilip More (Age 11)',
                        'expense_label' => 'Annual Education Fee',
                        'urgent_message' => 'Ensure orphaned school student Sanya continues her primary education and boarding support.',
                        'description' => 'Having lost both parents during the pandemic, 11-year-old Sanya lives with her elderly grandmother. Sanya excels in mathematics and dreams of becoming an engineer. She needs support for tuition, books, and boarding.',
                        'category_name' => 'Girls Education Support',
                    ],
                    'mr' => [
                        'title' => 'कुमारी सान्या दिलीप मोरे (वय ११ वर्षे)',
                        'expense_label' => 'वार्षिक शैक्षणिक खर्च',
                        'urgent_message' => 'अनाथ शाळकरी मुलगी सान्या हिचे शिक्षण आणि वसतिगृह खर्चासाठी हातभार लावा.',
                        'description' => 'कोरोना काळात आई-वडिलांचे छत्र हरपलेली ११ वर्षीय सान्या वृद्ध आजीकडे राहत आहे. अभ्यासात अत्यंत हुशार असलेल्या सान्याला इंजिनिअर व्हायचे आहे. तिच्या शालेय फी, गणवेश व पुस्तकांसाठी आपल्या मदतीची गरज आहे.',
                        'category_name' => 'मुलींचे शिक्षण सहाय्य',
                    ],
                    'hi' => [
                        'title' => 'कुमारी सान्या दिलीप मोरे (उम्र ११ वर्ष)',
                        'expense_label' => 'वार्षिक शिक्षा खर्च',
                        'urgent_message' => 'अनाथ छात्रा सान्या की प्राथमिक शिक्षा और छात्रावास खर्च के लिए सहायता दें.',
                        'description' => 'माता-पिता को खो चुकी ११ वर्षीय होनहार सान्या अपनी बुजुर्ग दादी के साथ रहती है. गणित में अव्वल रहने वाली सान्या इंजीनियर बनना चाहती है. उसकी पढ़ाई जारी रखने के लिए सहयोग करें.',
                        'category_name' => 'बालिका शिक्षा सहयोग',
                    ],
                ],
            ],
            [
                'slug' => 'master-tanmay-patil-orthopedic-surgery',
                'beneficiary_name' => 'Master Tanmay Ganesh Patil (Age 6)',
                'category' => 'child_welfare',
                'category_icon' => 'accessibility',
                'image' => '/images/cases/case-6-tanmay-orthopedic.jpg',
                'target_amount' => 180000.00,
                'collected_amount' => 95000.00,
                'currency' => 'INR',
                'expense_label' => 'Corrective Surgery',
                'status' => 'active',
                'order' => 6,
                'translations' => [
                    'en' => [
                        'title' => 'Master Tanmay Ganesh Patil (Age 6)',
                        'expense_label' => 'Corrective Surgery',
                        'urgent_message' => 'Corrective bilateral clubfoot surgery and pediatric physiotherapy to help Tanmay walk independently.',
                        'description' => '6-year-old Tanmay suffers from severe congenital clubfoot that prevents him from standing upright or wearing shoes. Soft tissue release surgery followed by orthotic braces will give him independent mobility.',
                        'category_name' => 'Orthopedic Correction',
                    ],
                    'mr' => [
                        'title' => 'मास्टर तन्मय गणेश पाटील (वय ६ वर्षे)',
                        'expense_label' => 'अस्थिव्यंग शस्त्रक्रिया',
                        'urgent_message' => '६ वर्षांच्या तन्मयला स्वतःच्या पायावर उभे राहता यावे म्हणून तातडीची ऑर्थोपेडिक शस्त्रक्रिया आवश्यक.',
                        'description' => 'तन्मय जन्मजात क्लबफूट (वाकडे पाय) विकाराने ग्रस्त असून त्याला नीट चालता येत नाही. शस्त्रक्रिया व फिजिओथेरपीद्वारे तो सामान्य मुलांप्रमाणे धावू-खेळू शकेल. त्याच्या पायांना नवे बळ देण्यासाठी सहकार्य करा.',
                        'category_name' => 'दिव्यांग पुनर्वसन',
                    ],
                    'hi' => [
                        'title' => 'मास्टर तन्मय गणेश पाटिल (उम्र ६ वर्ष)',
                        'expense_label' => 'ऑर्थोपेडिक सर्जरी',
                        'urgent_message' => '६ वर्षीय तन्मय को अपने पैरों पर चलने में सक्षम बनाने के लिए सुधारात्मक सर्जरी आवश्यक.',
                        'description' => 'तन्मय जन्मजात क्लबफुट से पीड़ित है और बिना सहारे के चल नहीं पाता. सुधारात्मक सर्जरी और फिजियोथेरेपी से वह अपने पैरों पर खड़ा हो सकता है. इस मासूम को नई ज़िंदगी देने में मदद करें.',
                        'category_name' => 'दिव्यांग सहायता',
                    ],
                ],
            ],
            [
                'slug' => 'kumari-meera-wagh-trauma-care',
                'beneficiary_name' => 'Kumari Meera Ashok Wagh (Age 8)',
                'category' => 'emergency',
                'category_icon' => 'flame',
                'image' => '/images/cases/case-7-meera-trauma.jpg',
                'target_amount' => 210000.00,
                'collected_amount' => 145000.00,
                'currency' => 'INR',
                'expense_label' => 'Critical Trauma Care',
                'status' => 'active',
                'order' => 7,
                'translations' => [
                    'en' => [
                        'title' => 'Kumari Meera Ashok Wagh (Age 8)',
                        'expense_label' => 'Critical Trauma Care',
                        'urgent_message' => 'Emergency reconstructive burn care and contracture release therapy for 8-year-old Meera.',
                        'description' => 'Meera suffered deep accidental scalding burns in a domestic kitchen mishap. She requires immediate skin grafting, antibiotic wound management, and post-operative scar rehabilitation in intensive care.',
                        'category_name' => 'Emergency Trauma Care',
                    ],
                    'mr' => [
                        'title' => 'कुमारी मीरा अशोक वाघ (वय ८ वर्षे)',
                        'expense_label' => 'तातडीचे भाजलेले उपचार',
                        'urgent_message' => 'अपघातात गंभीर भाजलेल्या ८ वर्षांच्या मीराच्या प्लास्टिक सर्जरी व उपचारासाठी तातडीने मदत करा.',
                        'description' => 'घरातील अपघातात मीरा गंभीर भाजली असून तिच्या त्वचेवर व हातावर खोल जखमा झाल्या आहेत. संसर्ग टाळण्यासाठी आणि स्किन ग्राफ्टिंग शस्त्रक्रियेसाठी तिच्या कुटुंबाला तातडीच्या आर्थिक साहाय्याची गरज आहे.',
                        'category_name' => 'तातडीचे वैद्यकीय सहाय्य',
                    ],
                    'hi' => [
                        'title' => 'कुमारी मीरा अशोक वाघ (उम्र ८ वर्ष)',
                        'expense_label' => 'आपातकालीन ट्रॉमा केयर',
                        'urgent_message' => 'गंभीर रूप से झुलसी ८ वर्षीय मीरा की स्किन ग्राफ्टिंग और आईसीयू इलाज में मदद करें.',
                        'description' => 'घर में हुए दर्दनाक हादसे में मीरा गंभीर रूप से जल गई है. संक्रमण रोकने और प्लास्टिक सर्जरी के लिए उसे तत्काल सघन चिकित्सा की जरूरत है. मीरा को स्वस्थ करने के लिए सहयोग करें.',
                        'category_name' => 'आपातकालीन चिकित्सा',
                    ],
                ],
            ],
            [
                'slug' => 'master-omkar-pawar-sam-nutrition',
                'beneficiary_name' => 'Master Omkar Vinod Pawar (Age 5)',
                'category' => 'medical',
                'category_icon' => 'heart',
                'image' => '/images/cases/case-8-omkar-nutrition.jpg',
                'target_amount' => 120000.00,
                'collected_amount' => 78000.00,
                'currency' => 'INR',
                'expense_label' => 'Nutritional Rehab',
                'status' => 'active',
                'order' => 8,
                'translations' => [
                    'en' => [
                        'title' => 'Master Omkar Vinod Pawar (Age 5)',
                        'expense_label' => 'Nutritional Rehab',
                        'urgent_message' => 'Critical nutritional rehabilitation and micronutrient therapy for Severe Acute Malnutrition (SAM).',
                        'description' => '5-year-old tribal child Omkar from a remote taluka weighs barely 9.5 kg with severe muscular wasting and immune deficiency. A 90-day specialized nutritional therapy regimen will restore his growth and vitality.',
                        'category_name' => 'Malnutrition Relief',
                    ],
                    'mr' => [
                        'title' => 'मास्टर ओंकार विनोद पवार (वय ५ वर्षे)',
                        'expense_label' => 'पोषण पुनर्वसन उपचार',
                        'urgent_message' => 'तीव्र कुपोषित (SAM) ५ वर्षांच्या ओंकारच्या विशेष पोषण आहार व उपचारासाठी हातभार लावा.',
                        'description' => 'दुर्गम आदिवासी पाड्यातील ५ वर्षांच्या ओंकारचे वजन केवळ ९.५ किलो भरते. तीव्र अशक्तपणामुळे त्याला उठणेही कठीण झाले आहे. ९० दिवसांच्या विशेष पोषण पुनर्वसन केंद्रातील उपचाराने तो पूर्ण बरा होऊ शकतो.',
                        'category_name' => 'कुपोषण मुक्ती उपचार',
                    ],
                    'hi' => [
                        'title' => 'मास्टर ओंकार विनोद पवार (उम्र ५ वर्ष)',
                        'expense_label' => 'पोषण पुनर्वास इलाज',
                        'urgent_message' => 'अति गंभीर कुपोषण से पीड़ित ५ वर्षीय ओंकार के विशेष पोषण उपचार में सहायता करें.',
                        'description' => 'आदिवासी अंचल के ५ वर्षीय ओंकार का वजन अत्यंत कम है और वह गंभीर कुपोषण से लड़ रहा है. ९० दिनों के विशेष चिकित्सीय पोषण आहार से उसे नया जीवन मिल सकता है. कृपया सहयोग करें.',
                        'category_name' => 'कुपोषण निवारण',
                    ],
                ],
            ],
        ];

        foreach ($cases as $caseData) {
            $transData = $caseData['translations'];
            unset($caseData['translations']);

            $case = DonationCase::updateOrCreate(
                ['slug' => $caseData['slug']],
                $caseData
            );

            foreach ($transData as $locale => $fields) {
                DonationCaseTranslation::updateOrCreate(
                    [
                        'donation_case_id' => $case->id,
                        'language_code' => $locale,
                    ],
                    $fields
                );
            }
        }
    }
}
