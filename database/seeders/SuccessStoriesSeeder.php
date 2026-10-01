<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Story;
use App\Models\StoryTranslation;
use Illuminate\Database\Seeder;

class SuccessStoriesSeeder extends Seeder
{
    public function run(): void
    {
        $educationProject = Project::where('slug', 'educational-support')->first();
        $womenProject = Project::where('slug', 'women-empowerment-initiative')->first();
        $healthProject = Project::where('slug', 'free-health-camps-nashik')->first();

        $stories = [
            // Story 1: Arya Patil (Education) - matching reference design on homepage
            [
                'project_id' => $educationProject?->id,
                'slug' => 'student-success-priti-jadhav', // Keep backward compatible slug
                'person_name' => 'Arya Patil',
                'person_role_or_location' => 'Beneficiary',
                'image' => 'images/stories/arya-patil.jpg',
                'is_featured' => true,
                'is_published' => true,
                'order' => 1,
                'translations' => [
                    'mr' => [
                        'title' => 'शिक्षणाने बदलले आर्याचे भविष्य',
                        'quote' => '“देवांश फाउंडेशनच्या मदतीने मला शिक्षणाची नवी दिशा मिळाली. आज मी माझ्या स्वप्नांकडे आत्मविश्वासाने वाटचाल करत आहे.”',
                        'story' => 'इगतपुरी तालुक्यातील एका कष्टकरी शेतकरी कुटुंबातील आर्या ही एक हुशार विद्यार्थिनी. घरच्या हलाखीच्या आर्थिक परिस्थितीमुळे तिचे शिक्षण थांबण्याच्या मार्गावर होते. देवांश फाउंडेशनने तिला वेळेवर शैक्षणिक शिष्यवृत्ती, पुस्तके व समुपदेशन उपलब्ध करून दिले. आज ती नाशिकच्या नामांकित महाविद्यालयात विज्ञान शाखेत शिकत असून तिचे स्वप्न डॉक्टर होण्याचे आहे.',
                        'challenge' => 'अत्यंत गरिबीमुळे पुढील शिक्षण चालू ठेवण्यात आणि पुस्तके खरेदी करण्यात अडचण.',
                        'support_received' => 'दोन वर्षांची संपूर्ण शैक्षणिक शिष्यवृत्ती, पुस्तके, शालेय साहित्य व मार्गदर्शन.',
                        'outcome' => 'दहावीच्या परीक्षेत विशेष प्रावीण्य मिळवून तिने पुढील उच्च शिक्षणासाठी विज्ञान शाखेत प्रवेश घेतला आहे.',
                    ],
                    'hi' => [
                        'title' => 'शिक्षा ने बदली आर्या की दिशा',
                        'quote' => '“देवांश फाउंडेशन के सहयोग से मुझे शिक्षा की एक नई दिशा मिली। आज मैं आत्मविश्वास के साथ अपने सपनों की ओर बढ़ रही हूँ।”',
                        'story' => 'इगतपुरी के ग्रामीण क्षेत्र की आर्या एक मेधावी छात्रा हैं। परिवार की आर्थिक तंगी के कारण उनकी पढ़ाई छूटने की कगार पर थी। देवांश फाउंडेशन ने उन्हें आवश्यक छात्रवृत्ति, पुस्तकें और मार्गदर्शन प्रदान किया।',
                        'challenge' => 'पारिवारिक तंगी के कारण पढ़ाई जारी रखने और कॉलेज फीस देने में असमर्थता।',
                        'support_received' => 'पूर्ण वार्षिक छात्रवृत्ति, अध्ययन सामग्री, पुस्तकें एवं मेंटरशिप।',
                        'outcome' => 'उत्कृष्ट अंकों के साथ माध्यमिक परीक्षा उत्तीर्ण कर उच्च शिक्षा जारी रखी।',
                    ],
                    'en' => [
                        'title' => 'Education Transformed Arya’s Future',
                        'quote' => '“With the support of Devansh Foundation, I discovered a new path in my education. Today, I am moving towards my dreams with confidence.”',
                        'story' => 'Arya is a bright student from a farm labourer family in rural Igatpuri. Severe financial hardships threatened to halt her secondary education. Devansh Foundation stepped in with full academic scholarship, textbooks, stationery kit, and mentoring.',
                        'challenge' => 'Acute financial distress leaving no funds for textbooks, school fees, or academic mentoring.',
                        'support_received' => 'Complete academic scholarship, stationery kit, mentoring, and competitive exam preparation.',
                        'outcome' => 'Secured first-class distinction in secondary board examinations and continues higher science education.',
                    ],
                ],
            ],

            // Story 2: Sunita Shinde (Women Empowerment & Micro-Enterprise)
            [
                'project_id' => $womenProject?->id,
                'slug' => 'sunita-shinde-empowerment',
                'person_name' => 'Sunita Shinde',
                'person_role_or_location' => 'Beneficiary',
                'image' => 'images/stories/sunita-shinde.jpg',
                'is_featured' => true,
                'is_published' => true,
                'order' => 2,
                'translations' => [
                    'mr' => [
                        'title' => 'स्वावलंबी उद्योजिका सुनिताताई',
                        'quote' => '“देवांश फाउंडेशनच्या शिवण प्रशिक्षणामुळे मला स्वतःच्या पायावर उभे राहण्याचे बळ मिळाले. आज मी स्वाभिमानाने कुटुंबाचा सांभाळ करत आहे.”',
                        'story' => 'पती आजारी असल्याने आणि दोन लहान मुलांच्या पालनपोषणाची जबाबदारी असताना सुनिताताईंनी देवांश फाउंडेशनच्या मोफत शिवण केंद्रात ३ महिन्यांचे प्रशिक्षण पूर्ण केले. त्यानंतर मिळालेल्या शिलाई मशीनमुळे त्यांनी स्वतःचा व्यवसाय सुरू केला.',
                        'challenge' => 'उत्पन्नाचे साधन नसताना मुलांचे शिक्षण आणि आजारी पतीच्या औषधांचा खर्च पेलण्याचे मोठे संकट.',
                        'support_received' => 'व्यावसायिक शिवणकला प्रशिक्षण, शिलाई मशीन व कापड पुरवठ्याची प्राथमिक मदत.',
                        'outcome' => 'आज त्या दरमहा ₹10,000 पेक्षा जास्त कमावत असून इतर दोन गरजू महिलांनाही रोजगार दिला आहे.',
                    ],
                    'hi' => [
                        'title' => 'स्वावलंबी उद्यमी सुनीता ताई',
                        'quote' => '“देवांश फाउंडेशन के सिलाई प्रशिक्षण ने मुझे आत्मनिर्भर बनाया। आज मैं गर्व से अपने पूरे परिवार का भरण-पोषण कर रही हूँ।”',
                        'story' => 'सुनीता ताई ने फाउंडेशन के कौशल विकास केंद्र से सिलाई का संपूर्ण प्रशिक्षण प्राप्त किया और सिलाई मशीन सहायता के साथ अपनी खुद की सिलाई इकाई शुरू की।',
                        'challenge' => 'आजीविका का कोई साधन न होना और बच्चों के भरण-पोषण की चिंता।',
                        'support_received' => '3 महीने का व्यावसायिक सिलाई प्रशिक्षण एवं सिलाई मशीन सहायता।',
                        'outcome' => 'प्रति माह 10,000 रुपये से अधिक की आय अर्जित कर अन्य महिलाओं को भी प्रेरित कर रही हैं।',
                    ],
                    'en' => [
                        'title' => 'Sunita’s Journey to Self-Reliance',
                        'quote' => '“The tailoring training from Devansh Foundation gave me the courage to stand on my own feet. Today, I am proud to support my family.”',
                        'story' => 'Facing economic distress with young children to care for, Sunita enrolled in Devansh Foundation’s women vocational training center in Dindori. After graduating, she received a sewing machine and scaled her work into a reliable enterprise.',
                        'challenge' => 'Complete lack of livelihood skills while bearing primary family responsibility.',
                        'support_received' => '3-month certified garment fabrication training and sewing machinery sponsorship.',
                        'outcome' => 'Consistently generates ₹10,000+ monthly revenue and has trained two more women in her village.',
                    ],
                ],
            ],

            // Story 3: Rahul Wagh (Child Healthcare & Surgery Recovery)
            [
                'project_id' => $healthProject?->id,
                'slug' => 'rahul-wagh-medical-recovery',
                'person_name' => 'Rahul Wagh',
                'person_role_or_location' => 'Beneficiary',
                'image' => 'images/stories/rahul-wagh.jpg',
                'is_featured' => true,
                'is_published' => true,
                'order' => 3,
                'translations' => [
                    'mr' => [
                        'title' => 'आरोग्यसंजीवनी: चिमुकल्या राहुलची यशोगाथा',
                        'quote' => '“जेव्हा माझ्या उपचाराचा खर्च पालकांसाठी अशक्य झाला होता, तेव्हा देवांश फाउंडेशन कुटुंबासारखे पाठीशी उभे राहिले. आज मी पूर्णपणे बरा झालो आहे.”',
                        'story' => 'त्र्यंबकेश्वर भागातील सात वर्षांच्या राहुलला गंभीर आजारावर तातडीच्या शस्त्रक्रियेची आवश्यकता होती. मोलमजुरी करणाऱ्या पालकांवर आभाळ कोसळले होते. देवांश फाउंडेशनने पुढाकार घेऊन नामांकित रुग्णालयात शस्त्रक्रिया व सर्व औषधोपचार मोफत उपलब्ध करून दिले.',
                        'challenge' => 'अत्यंत गुंतागुंतीच्या शस्त्रक्रियेचा व औषधोपचाराचा मोठा आर्थिक खर्च पेलण्यास असमर्थता.',
                        'support_received' => 'संपूर्ण शस्त्रक्रिया खर्च, औषधोपचार, वैद्यकीय तपासण्या व सकस आहार सहाय्य.',
                        'outcome' => 'राहुल पूर्णपणे बरा होऊन आनंदाने शाळेत जाऊ लागला असून नियमित खेळात सहभागी होत आहे.',
                    ],
                    'hi' => [
                        'title' => 'स्वास्थ्य संजीवन: नन्हे राहुल की स्वस्थ उड़ान',
                        'quote' => '“जब मेरे गंभीर इलाज का खर्च माता-पिता के लिए नामुमकिन लग रहा था, तब देवांश फाउंडेशन ने एक परिवार की तरह हमारा साथ दिया।”',
                        'story' => 'त्र्यंबकेश्वर के 7 वर्षीय राहुल को तत्काल जटिल सर्जरी की आवश्यकता थी। देवांश फाउंडेशन ने समय पर आर्थिक एवं चिकित्सीय मदद उपलब्ध कराकर उसका जीवन बचाया।',
                        'challenge' => 'गरीब आदिवासी परिवार के लिए निजी अस्पताल का महंगा ऑपरेशन खर्च असंभव था।',
                        'support_received' => 'संपूर्ण सर्जरी व्यय, दवाइयां और स्वास्थ्य देखभाल मार्गदर्शन।',
                        'outcome' => 'राहुल अब पूरी तरह स्वस्थ है और खुशी-खुशी विद्यालय जाकर पढ़ाई कर रहा है।',
                    ],
                    'en' => [
                        'title' => 'Healing Hands: Rahul’s Miracle Recovery',
                        'quote' => '“When critical medical costs felt impossible for my parents, Devansh Foundation stood by us like family. Today, I am healthy and back in school.”',
                        'story' => 'Seven-year-old Rahul from Trimbakeshwar suffered from a severe condition requiring prompt surgical intervention. Devansh Foundation sponsored his hospital care, medications, and rehabilitation.',
                        'challenge' => 'Inability of poor tribal family to afford critical specialized pediatric surgery.',
                        'support_received' => 'Complete sponsorship of hospital surgery, essential pediatric medicines, and post-surgery rehabilitation.',
                        'outcome' => 'Rahul made a complete recovery, regained normal health, and is joyfully back in school.',
                    ],
                ],
            ],

            // Story 4: Dnyaneshwar Bhor (Senior Citizen Vision Restoration)
            [
                'project_id' => $healthProject?->id,
                'slug' => 'dnyaneshwar-bhor-senior-vision',
                'person_name' => 'Dnyaneshwar Bhor',
                'person_role_or_location' => 'Beneficiary',
                'image' => 'images/stories/dnyaneshwar-bhor.jpg',
                'is_featured' => true,
                'is_published' => true,
                'order' => 4,
                'translations' => [
                    'mr' => [
                        'title' => 'दृष्टीदान: ज्ञानेश्वर आजोबांना मिळाले नवजीवन',
                        'quote' => '“मोतीबिंदूमुळे अंधारात गेलेले माझे आयुष्य देवांश फाउंडेशनच्या मोफत नेत्र शस्त्रक्रियेमुळे पुन्हा प्रकाशमय झाले आणि मला माझे स्वावलंबन परत मिळाले.”',
                        'story' => 'कळवण तालुक्यातील वृद्ध ज्ञानेश्वर भोर यांना दोन्ही डोळ्यांत मोतीबिंदू झाल्याने काहीही दिसत नव्हते. देवांश फाउंडेशनच्या ग्रामीण आरोग्य शिबिरात त्यांची तपासणी झाली आणि फाउंडेशनतर्फे मोफत शस्त्रक्रिया व लेन्स बसवण्यात आली.',
                        'challenge' => 'वृद्धावस्थेतील अंधत्व आणि शस्त्रक्रियेसाठी लागणाऱ्या पैशांचा अभाव.',
                        'support_received' => 'मोफत नेत्र तपासणी, मोतीबिंदू शस्त्रक्रिया, उच्च दर्जाची लेन्स व औषधे.',
                        'outcome' => 'दोन्ही डोळ्यांची दृष्टी पूर्णपणे परत आली असून ते स्वतःची कामे स्वतः आनंदाने करत आहेत.',
                    ],
                    'hi' => [
                        'title' => 'नेत्र ज्योति: ज्ञानेश्वर जी को मिला नया जीवन',
                        'quote' => '“मोतियाबिंद के कारण वर्षों अंधेरे में रहने के बाद, देवांश फाउंडेशन की मुफ्त नेत्र सर्जरी ने मेरी रोशनी लौटाई और मुझे फिर से स्वावलंबी बनाया।”',
                        'story' => 'कलवण के वरिष्ठ नागरिक ज्ञानेश्वर जी मोतियाबिंद के कारण देख पाने में असमर्थ थे। देवांश फाउंडेशन के मुफ्त नेत्र शिविर में उनकी सफल सर्जरी कराई गई।',
                        'challenge' => 'आंखों की रोशनी खोने के बावजूद आर्थिक तंगी के चलते ऑपरेशन कराने में असमर्थ।',
                        'support_received' => 'निःशुल्क मोतियाबिंद ऑपरेशन, लेंस प्रत्यारोपण और दवाएं।',
                        'outcome' => 'दृष्टि पूर्णतः वापस लौटी और वे अब आत्मनिर्भर जीवन जी रहे हैं।',
                    ],
                    'en' => [
                        'title' => 'Light Restored: Dnyaneshwar’s Second Sight',
                        'quote' => '“After years of living in darkness due to cataracts, the free eye surgery by Devansh Foundation restored my sight and gave me my independence back.”',
                        'story' => 'Elderly farmer Dnyaneshwar Bhor had lost nearly all his vision to mature cataracts. Diagnosed during a rural eye camp, Devansh Foundation sponsored his corrective lens implantation surgery.',
                        'challenge' => 'Complete blindness and lack of accessible geriatric eye surgery in remote rural belt.',
                        'support_received' => 'Free comprehensive ophthalmic screening, cataract surgery with IOL lens, and medicated spectacles.',
                        'outcome' => 'Full visual acuity regained; he is now walking independently and actively tending his village garden.',
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
    }
}
