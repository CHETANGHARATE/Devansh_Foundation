<?php

namespace Database\Seeders;

use App\Models\FocusArea;
use App\Models\FocusAreaTranslation;
use App\Models\FocusAreaInitiative;
use App\Models\FocusAreaInitiativeTranslation;
use Illuminate\Database\Seeder;

class FocusAreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            [
                'slug' => 'education',
                'order' => 1,
                'color' => 'pink',
                'icon' => 'book-open',
                'image' => 'images/focus-areas/education.jpg',
                'translations' => [
                    'mr' => [
                        'title' => 'शिक्षण क्षेत्रातील उपक्रम',
                        'short_description' => 'ग्रामीण व गरजू विद्यार्थ्यांसाठी दर्जेदार शिक्षण, शालेय साहित्य व स्पर्धा परीक्षा मार्गदर्शन.',
                        'description' => 'शिक्षणाने समाजाचा कायापालट होतो. देवांश फाउंडेशन नाशिक जिल्ह्यातील ग्रामीण व आदिवासी भागातील प्रत्येक मुलाला शिक्षणाचा मूलभूत हक्क मिळावा यासाठी निरंतर प्रयत्नशील आहे.',
                        'objectives' => '१००% शाळा नोंदणी, गळती रोखणे आणि दर्जेदार शैक्षणिक साहित्याची उपलब्धता.',
                        'impact_summary' => '५,०००+ विद्यार्थ्यांना शालेय किट व शिष्यवृत्ती सहाय्य.',
                    ],
                    'hi' => [
                        'title' => 'शिक्षा क्षेत्र के उपक्रम',
                        'short_description' => 'ग्रामीण एवं जरूरतमंद विद्यार्थियों के लिए गुणवत्तापूर्ण शिक्षा, स्कूली किट एवं मार्गदर्शन।',
                        'description' => 'शिक्षा से समाज में सकारात्मक परिवर्तन आता है। देवांश फाउंडेशन हर वंचित बच्चे को शिक्षा की मुख्यधारा से जोड़ने के लिए निरंतर कार्यरत है।',
                        'objectives' => 'शून्य स्कूल ड्रॉपआउट और समग्र डिजिटल साक्षरता।',
                        'impact_summary' => '५,०००+ विद्यार्थियों को शैक्षिक किट एवं छात्रवृत्ति।',
                    ],
                    'en' => [
                        'title' => 'Education',
                        'short_description' => 'Empowering rural & underprivileged students through school kits, digital learning & scholarships.',
                        'description' => 'Education is the most powerful tool for social change. Devansh Foundation works relentlessly to provide every child with access to quality schooling, books, and career guidance.',
                        'objectives' => 'Zero school dropouts, digital classrooms, and inclusive quality education.',
                        'impact_summary' => '5,000+ students supported with study kits and scholarships.',
                    ],
                ],
                'initiatives' => [
                    ['mr' => 'शालेय साहित्य वितरण', 'hi' => 'स्कूली सामग्री वितरण', 'en' => 'Distribution of Educational Kits'],
                    ['mr' => 'गरजू विद्यार्थ्यांना शैक्षणिक मदत', 'hi' => 'जरूरतमंद विद्यार्थियों को शैक्षणिक सहायता', 'en' => 'Financial & Educational Aid for Needy Students'],
                    ['mr' => 'शिष्यवृत्ती सहाय्य', 'hi' => 'छात्रवृत्ति सहायता', 'en' => 'Merit & Need-based Scholarships'],
                    ['mr' => 'डिजिटल शिक्षण', 'hi' => 'डिजिटल शिक्षा', 'en' => 'Smart Classes & Digital Learning'],
                    ['mr' => 'करिअर मार्गदर्शन शिबिरे', 'hi' => 'करियर मार्गदर्शन शिविर', 'en' => 'Career Guidance Seminars'],
                    ['mr' => 'स्पर्धा परीक्षा मार्गदर्शन', 'hi' => 'प्रतियोगी परीक्षा मार्गदर्शन', 'en' => 'Competitive Exam Coaching Support'],
                    ['mr' => 'वाचनालय व अभ्यासिका सुविधा', 'hi' => 'पुस्तकालय एवं अध्ययन कक्ष सुविधा', 'en' => 'Library & Community Study Rooms'],
                    ['mr' => 'गुणवंत विद्यार्थ्यांचा सत्कार', 'hi' => 'प्रतिभाशाली विद्यार्थियों का सम्मान', 'en' => 'Merit Student Felicitation & Awards'],
                    ['mr' => 'शाळाबाह्य मुलांना शिक्षणाशी जोडणे', 'hi' => 'स्कूल से वंचित बच्चों को शिक्षा से जोड़ना', 'en' => 'Enrolling Out-of-School Children'],
                    ['mr' => 'डिजिटल साक्षरता अभियान', 'hi' => 'डिजिटल साक्षरता अभियान', 'en' => 'Digital Literacy Drives in Villages'],
                ],
            ],

            [
                'slug' => 'healthcare',
                'order' => 2,
                'color' => 'green',
                'icon' => 'heart-pulse',
                'image' => 'images/focus-areas/healthcare.jpg',
                'translations' => [
                    'mr' => [
                        'title' => 'आरोग्य क्षेत्रातील उपक्रम',
                        'short_description' => 'मोफत आरोग्य तपासणी शिबिरे, औषध वितरण आणि ग्रामीण भागातील आरोग्य जनजागृती.',
                        'description' => 'आरोग्य ही खरी संपत्ती आहे. दुर्गम भागातील नागरिकांना प्राथमिक आरोग्य सेवा व औषधोपचार सहज उपलब्ध करून देण्यासाठी आम्ही शिबिरे राबवतो.',
                        'objectives' => 'सुलभ व मोफत प्राथमिक आरोग्य सुविधा आणि प्रतिबंधात्मक आरोग्य काळजी.',
                        'impact_summary' => '३५+ मोफत आरोग्य शिबिरे व १५,०००+ रुग्ण तपासणी.',
                    ],
                    'hi' => [
                        'title' => 'स्वास्थ्य क्षेत्र के उपक्रम',
                        'short_description' => 'निःशुल्क स्वास्थ्य शिविर, दवा वितरण और ग्रामीण स्वास्थ्य जागरूकता अभियान।',
                        'description' => 'स्वस्थ समाज ही सशक्त राष्ट्र का निर्माण करता है। हम दूरदराज के क्षेत्रों में मुफ्त स्वास्थ्य शिविर व चिकित्सा सेवाएं प्रदान करते हैं।',
                        'objectives' => 'हर नागरिक तक प्राथमिक स्वास्थ्य सेवाओं की सुलभ पहुंच।',
                        'impact_summary' => '३५+ स्वास्थ्य शिविर एवं १५,०००+ ग्रामीणों का उपचार।',
                    ],
                    'en' => [
                        'title' => 'Healthcare',
                        'short_description' => 'Free medical checkup camps, essential medicine distribution, and maternal care.',
                        'description' => 'Good health is the foundation of well-being. Devansh Foundation organizes mobile health clinics, eye testing camps, and health education across rural pockets.',
                        'objectives' => 'Affordable and free primary healthcare access with preventive wellness.',
                        'impact_summary' => '35+ free medical camps and 15,000+ patient consultations.',
                    ],
                ],
                'initiatives' => [
                    ['mr' => 'मोफत आरोग्य तपासणी शिबिरे', 'hi' => 'निःशुल्क स्वास्थ्य जांच शिविर', 'en' => 'Free Health Checkup Camps'],
                    ['mr' => 'रक्तदान शिबिरे', 'hi' => 'रक्तदान शिविर', 'en' => 'Blood Donation Drives'],
                    ['mr' => 'नेत्र तपासणी शिबिरे', 'hi' => 'नेत्र जांच शिविर', 'en' => 'Eye Checkup & Spectacle Distribution'],
                    ['mr' => 'दंत तपासणी शिबिरे', 'hi' => 'दंत जांच शिविर', 'en' => 'Dental Care & Hygiene Camps'],
                    ['mr' => 'महिला आरोग्य जनजागृती', 'hi' => 'महिला स्वास्थ्य जागरूकता', 'en' => 'Women Health & Hygiene Awareness'],
                    ['mr' => 'बाल आरोग्य व पोषण कार्यक्रम', 'hi' => 'बाल स्वास्थ्य एवं पोषण कार्यक्रम', 'en' => 'Child Health & Nutrition Drives'],
                    ['mr' => 'मधुमेह व रक्तदाब तपासणी', 'hi' => 'मधुमेह एवं रक्तचाप जांच', 'en' => 'Diabetes & BP Screening Camps'],
                    ['mr' => 'औषध वितरण', 'hi' => 'निःशुल्क दवा वितरण', 'en' => 'Free Essential Medicine Distribution'],
                    ['mr' => 'आरोग्य जनजागृती अभियान', 'hi' => 'स्वास्थ्य जागरूकता अभियान', 'en' => 'Community Health Awareness Campaigns'],
                    ['mr' => 'ग्रामीण भागातील आरोग्य सेवा', 'hi' => 'ग्रामीण स्वास्थ्य सेवाएं', 'en' => 'Rural Mobile Health Services'],
                ],
            ],

            [
                'slug' => 'women-empowerment',
                'order' => 3,
                'color' => 'orange',
                'icon' => 'users',
                'image' => 'images/focus-areas/women-empowerment.jpg',
                'translations' => [
                    'mr' => [
                        'title' => 'महिला सक्षमीकरण',
                        'short_description' => 'बचत गट, शिवणकाम, कौशल्य विकास व उद्योजकता प्रशिक्षणाद्वारे महिलांचा विकास.',
                        'description' => 'महिला स्वावलंबी झाल्याशिवाय समाज प्रगत होऊ शकत नाही. आम्ही महिलांना व्यावसायिक कौशल्ये व आर्थिक साक्षरता देऊन आत्मनिर्भर बनवतो.',
                        'objectives' => 'महिलांना स्वयंरोजगार आणि आर्थिक व सामाजिक सुरक्षितता प्रदान करणे.',
                        'impact_summary' => '१,२००+ महिलांना व्यावसायिक प्रशिक्षण व बचत गट मदत.',
                    ],
                    'hi' => [
                        'title' => 'महिला सशक्तिकरण',
                        'short_description' => 'स्वयं सहायता समूह, सिलाई, कौशल विकास और उद्यमिता प्रशिक्षण द्वारा महिला सशक्तिकरण।',
                        'description' => 'सशक्त महिला, सशक्त परिवार। हम ग्रामीण महिलाओं को आत्मनिर्भर बनाने हेतु वोकेशनल ट्रेनिंग और माइक्रो-फाइनेंस सहायता प्रदान करते हैं।',
                        'objectives' => 'महिलाओं का आर्थिक स्वावलंबन और आत्मसम्मान।',
                        'impact_summary' => '१,२००+ महिलाओं को व्यावसायिक कौशल प्रशिक्षण।',
                    ],
                    'en' => [
                        'title' => 'Women Empowerment',
                        'short_description' => 'Self-help groups, tailoring centers, financial literacy, and entrepreneurship programs.',
                        'description' => 'Empowered women lead to thriving communities. We enable rural and semi-urban women to achieve financial independence through livelihood skills.',
                        'objectives' => 'Economic self-reliance, vocational mastery, and dignity for women.',
                        'impact_summary' => '1,200+ women trained in tailoring and small enterprises.',
                    ],
                ],
                'initiatives' => [
                    ['mr' => 'महिला बचत गट निर्मिती', 'hi' => 'महिला स्वयं सहायता समूह गठन', 'en' => 'Self-Help Group (SHG) Formation'],
                    ['mr' => 'कौशल्य विकास प्रशिक्षण', 'hi' => 'कौशल विकास प्रशिक्षण', 'en' => 'Skill Development Workshops'],
                    ['mr' => 'शिवणकाम व लघुउद्योग प्रशिक्षण', 'hi' => 'सिलाई एवं कुटीर उद्योग प्रशिक्षण', 'en' => 'Tailoring & Small Scale Industry Training'],
                    ['mr' => 'स्वयंरोजगार मार्गदर्शन', 'hi' => 'स्वरोजगार मार्गदर्शन', 'en' => 'Self-Employment Counseling'],
                    ['mr' => 'महिला उद्योजकता विकास', 'hi' => 'महिला उद्यमिता विकास', 'en' => 'Women Entrepreneurship Incubation'],
                    ['mr' => 'आर्थिक साक्षरता', 'hi' => 'वित्तीय साक्षरता', 'en' => 'Financial Literacy & Banking Training'],
                    ['mr' => 'महिला आरोग्य व स्वच्छता जनजागृती', 'hi' => 'महिला स्वास्थ्य एवं स्वच्छता जागरूकता', 'en' => 'Sanitary Hygiene & Health Awareness'],
                    ['mr' => 'कायदेविषयक मार्गदर्शन', 'hi' => 'कानूनी अधिकार मार्गदर्शन', 'en' => 'Legal Rights & Aid Counseling'],
                    ['mr' => 'महिला सुरक्षा जनजागृती', 'hi' => 'महिला सुरक्षा जागरूकता', 'en' => 'Women Safety & Self-Defense Programs'],
                ],
            ],

            [
                'slug' => 'child-welfare',
                'order' => 4,
                'color' => 'purple',
                'icon' => 'baby',
                'image' => 'images/focus-areas/child-welfare.jpg',
                'translations' => [
                    'mr' => [
                        'title' => 'बालकल्याण',
                        'short_description' => 'अनाथ व गरजू मुलांना पोषण आहार, बालशिक्षण आणि व्यक्तिमत्त्व विकासाची संधी.',
                        'description' => 'मुले हे देशाचे भविष्य आहेत. प्रत्येक बालकाला सुरक्षित बालपण, पौष्टिक आहार व सर्वांगीण विकासाचे वातावरण मिळवून देण्यासाठी आम्ही समर्पित आहोत.',
                        'objectives' => 'कुपोषण निर्मूलन आणि बालहक्कांचे रक्षण.',
                        'impact_summary' => '२,५००+ बालकांना पोषण आहार व शैक्षणिक पाठबळ.',
                    ],
                    'hi' => [
                        'title' => 'बाल कल्याण',
                        'short_description' => 'वंचित बच्चों के लिए पौष्टिक आहार, प्राथमिक शिक्षा और समग्र व्यक्तित्व विकास।',
                        'description' => 'हर बच्चे का अधिकार है एक सुरक्षित और उज्ज्वल बचपन। हम अनाथ और जरूरतमंद बच्चों को आश्रय, पोषण और शिक्षा प्रदान करते हैं।',
                        'objectives' => 'कुपोषण मुक्ति और बाल अधिकारों का संरक्षण।',
                        'impact_summary' => '२,५००+ बच्चों को पोषण व सुरक्षा सहायता।',
                    ],
                    'en' => [
                        'title' => 'Child Welfare',
                        'short_description' => 'Nutrition meals, pediatric care, personality enrichment, and child rights advocacy.',
                        'description' => 'Every child deserves love, nourishment, and a safe learning environment. We work with vulnerable children to ensure health, education, and emotional well-being.',
                        'objectives' => 'Malnutrition eradication and holistic child development.',
                        'impact_summary' => '2,500+ children nourished and protected.',
                    ],
                ],
                'initiatives' => [
                    ['mr' => 'बालशिक्षण कार्यक्रम', 'hi' => 'बाल शिक्षा कार्यक्रम', 'en' => 'Early Childhood Education Support'],
                    ['mr' => 'शालेय साहित्य मदत', 'hi' => 'स्कूली सामग्री सहायता', 'en' => 'School Supplies & Uniform Aid'],
                    ['mr' => 'पोषण आहार वितरण', 'hi' => 'पौष्टिक आहार वितरण', 'en' => 'Supplementary Nutrition Meals'],
                    ['mr' => 'बाल आरोग्य तपासणी', 'hi' => 'बाल स्वास्थ्य जांच', 'en' => 'Pediatric Health Checkups'],
                    ['mr' => 'अनाथ व गरजू मुलांना सहाय्य', 'hi' => 'अनाथ एवं जरूरतमंद बच्चों को सहायता', 'en' => 'Support for Orphan & Destitute Children'],
                    ['mr' => 'क्रीडा व सांस्कृतिक उपक्रम', 'hi' => 'खेलकूद एवं सांस्कृतिक गतिविधियां', 'en' => 'Sports & Cultural Activities'],
                    ['mr' => 'बालहक्क जनजागृती', 'hi' => 'बाल अधिकार जागरूकता', 'en' => 'Child Rights Awareness Campaigns'],
                    ['mr' => 'व्यक्तिमत्त्व विकास कार्यक्रम', 'hi' => 'व्यक्तित्व विकास कार्यक्रम', 'en' => 'Personality Development & Life Skills'],
                ],
            ],

            [
                'slug' => 'environment',
                'order' => 5,
                'color' => 'emerald',
                'icon' => 'leaf',
                'image' => 'images/focus-areas/environment.jpg',
                'translations' => [
                    'mr' => [
                        'title' => 'पर्यावरण',
                        'short_description' => 'वृक्षारोपण, संवर्धन, प्लास्टिकमुक्त मोहीम आणि जलसंधारणाद्वारे वसुंधरा संवर्धन.',
                        'description' => 'पर्यावरणाचे रक्षण ही आपली नैतिक जबाबदारी आहे. देशी वृक्ष लागवड, पाण्याचे पुनर्भरण आणि कचरा व्यवस्थापनावर आम्ही भर देतो.',
                        'objectives' => 'हरित आच्छादन वाढवणे आणि जलसुरक्षा निर्माण करणे.',
                        'impact_summary' => '१०,०००+ देशी वृक्षांची यशस्वी लागवड व संवर्धन.',
                    ],
                    'hi' => [
                        'title' => 'पर्यावरण',
                        'short_description' => 'वृक्षारोपण, प्लास्टिक मुक्ति, जल संरक्षण और हरित ग्राम अभियान।',
                        'description' => 'पर्यावरण संरक्षण ही भावी पीढ़ियों का भविष्य सुरक्षित कर सकता है। हम सघन वृक्षारोपण और जल पुनर्भरण के जन-अभियान चलाते हैं।',
                        'objectives' => 'हरित आवरण विस्तार और प्राकृतिक जल स्रोतों का पुनर्जीवन।',
                        'impact_summary' => '१०,०००+ वृक्षारोपण व जल संरक्षण कार्य।',
                    ],
                    'en' => [
                        'title' => 'Environment',
                        'short_description' => 'Mass tree plantation, plastic eradication, water conservation, and green villages.',
                        'description' => 'Preserving mother earth is our solemn pledge. We plant native trees, harvest rainwater, and foster community stewardship for a sustainable ecology.',
                        'objectives' => 'Increased green canopy and community water security.',
                        'impact_summary' => '10,000+ native saplings planted with 3-year survival care.',
                    ],
                ],
                'initiatives' => [
                    ['mr' => 'वृक्षारोपण अभियान', 'hi' => 'वृक्षारोपण अभियान', 'en' => 'Mass Tree Plantation Drives'],
                    ['mr' => 'वृक्षसंवर्धन', 'hi' => 'वृक्ष संवर्धन', 'en' => 'Tree Nurturing & Survival Projects'],
                    ['mr' => 'स्वच्छता अभियान', 'hi' => 'स्वच्छता अभियान', 'en' => 'Cleanliness & Sanitation Drives'],
                    ['mr' => 'प्लास्टिकमुक्त अभियान', 'hi' => 'प्लास्टिक मुक्त अभियान', 'en' => 'Plastic-Free Environment Campaigns'],
                    ['mr' => 'पाणी संवर्धन', 'hi' => 'जल संरक्षण', 'en' => 'Water Conservation & Rain Harvesting'],
                    ['mr' => 'जलसंधारण', 'hi' => 'जल संधारण', 'en' => 'Watershed Management & Percolation'],
                    ['mr' => 'पर्यावरण जनजागृती', 'hi' => 'पर्यावरण जागरूकता', 'en' => 'Eco-Awareness Seminars & Workshops'],
                    ['mr' => 'कचरा व्यवस्थापन', 'hi' => 'कचरा प्रबंधन', 'en' => 'Zero-Waste Management Practices'],
                    ['mr' => 'हरित गाव अभियान', 'hi' => 'हरित ग्राम अभियान', 'en' => 'Green Village Clean Village Projects'],
                ],
            ],

            [
                'slug' => 'social-welfare',
                'order' => 6,
                'color' => 'rose',
                'icon' => 'hand-heart',
                'image' => 'images/focus-areas/social-welfare.jpg',
                'translations' => [
                    'mr' => [
                        'title' => 'सामाजिक सेवा',
                        'short_description' => 'अन्नदान, वस्त्रदान, आपत्तीग्रस्तांना मदत आणि निराधारांना मायेचा आधार.',
                        'description' => 'दुःखितांच्या अश्रू पुसणे हीच खरी ईश्वरसेवा. गरजू कुटुंबांना सण-उत्सवाच्या काळात आणि नैसर्गिक आपत्तीमध्ये तात्काळ मदत पोहोचवली जाते.',
                        'objectives' => 'कोणीही उपाशी किंवा वंचित राहू नये यासाठी थेट सामाजिक सहाय्य.',
                        'impact_summary' => '२५,०००+ जेवणाची पाकिटे व ५,०००+ ब्लँकेट्स वाटप.',
                    ],
                    'hi' => [
                        'title' => 'सामाजिक सेवा',
                        'short_description' => 'अन्नदान, वस्त्रदान, आपदा राहत और निराश्रितों को सम्मानजनक सहायता।',
                        'description' => 'मानव सेवा ही सर्वोत्तम धर्म है। हम बेसहारा बुजुर्गों, निर्धन परिवारों और संकटग्रस्त नागरिकों को आवश्यक खाद्य व वस्त्र सहायता उपलब्ध कराते हैं।',
                        'objectives' => 'भुखमरी मुक्ति और सामाजिक संबल का निर्माण।',
                        'impact_summary' => '२५,०००+ भोजन पैकेट एवं वस्त्र वितरण।',
                    ],
                    'en' => [
                        'title' => 'Social Welfare',
                        'short_description' => 'Food distribution, clothes drives, disaster response, and assistance for destitutes.',
                        'description' => 'Standing beside the vulnerable in times of distress is our core duty. We provide immediate nutrition, clothing, and shelter assistance to those who need it most.',
                        'objectives' => 'Zero hunger, dignity in distress, and social solidarity.',
                        'impact_summary' => '25,000+ meals served and emergency relief delivered.',
                    ],
                ],
                'initiatives' => [
                    ['mr' => 'अन्नदान', 'hi' => 'अन्नदान', 'en' => 'Food Distribution Drives (Annadaan)'],
                    ['mr' => 'वस्त्रदान', 'hi' => 'वस्त्रदान', 'en' => 'Clothing & Winter Blanket Drives'],
                    ['mr' => 'गरीब व गरजू कुटुंबांना मदत', 'hi' => 'निर्धन एवं जरूरतमंद परिवारों को सहायता', 'en' => 'Emergency Family Relief Kits'],
                    ['mr' => 'आपत्तीग्रस्तांना सहाय्य', 'hi' => 'आपदा पीड़ितों की सहायता', 'en' => 'Disaster & Flood Relief Aid'],
                    ['mr' => 'वृद्धांना मदत', 'hi' => 'वृद्धों की सहायता', 'en' => 'Elderly Care & Support Services'],
                    ['mr' => 'निराधार व्यक्तींना मदत', 'hi' => 'निराश्रितों को सहायता', 'en' => 'Shelter & Aid for Destitute Persons'],
                    ['mr' => 'सणासुदीला गरजूंसाठी विशेष उपक्रम', 'hi' => 'त्यौहारों पर विशेष सेवा उपक्रम', 'en' => 'Festive Smiles & Sweet Distribution'],
                    ['mr' => 'सामाजिक जनजागृती कार्यक्रम', 'hi' => 'सामाजिक जागरूकता कार्यक्रम', 'en' => 'Social Harmony & Awareness Drives'],
                ],
            ],

            [
                'slug' => 'divyang-senior',
                'order' => 7,
                'color' => 'blue',
                'icon' => 'accessibility',
                'image' => 'images/focus-areas/divyang-senior.jpg',
                'translations' => [
                    'mr' => [
                        'title' => 'दिव्यांग व वृद्ध कल्याण',
                        'short_description' => 'व्हीलचेअर, श्रवणयंत्र, सहाय्यक उपकरणे आणि ज्येष्ठांसाठी सन्मानजनक आधार.',
                        'description' => 'दिव्यांग व वृद्ध व्यक्तींना सन्मानाने जगण्याचा अधिकार आहे. आम्ही मोफत उपकरणे, आरोग्य सेवा आणि शासकीय योजनांचे लाभ मिळवून देण्यासाठी मार्गदर्शन करतो.',
                        'objectives' => 'दिव्यांग बांधवांचे सबलीकरण आणि ज्येष्ठ नागरिकांची आरोग्य सुरक्षा.',
                        'impact_summary' => '३००+ व्हीलचेअर्स व सहायक उपकरणे आणि नियमित वृद्धाश्रम सेवा.',
                    ],
                    'hi' => [
                        'title' => 'दिव्यांग एवं वृद्ध कल्याण',
                        'short_description' => 'व्हीलचेयर, सहायक उपकरण, स्वास्थ्य जांच एवं बुजुर्गों के लिए सामाजिक सहारा।',
                        'description' => 'दिव्यांगजनों और वरिष्ठ नागरिकों को गरिमापूर्ण जीवन उपलब्ध कराना हमारा ध्येय है। हम उपकरण वितरण और स्वास्थ्य सहायता सुनिश्चित करते हैं।',
                        'objectives' => 'दिव्यांगजनों की सुगमता और वरिष्ठ नागरिकों की देखभाल।',
                        'impact_summary' => '३००+ व्हीलचेयर व उपकरण वितरण।',
                    ],
                    'en' => [
                        'title' => 'Divyang & Senior Welfare',
                        'short_description' => 'Wheelchairs, assistive devices, geriatric healthcare, and old-age home support.',
                        'description' => 'Ensuring dignity, mobility, and companionship for differently-abled individuals and senior citizens through custom mobility aids and government linkages.',
                        'objectives' => 'Inclusive mobility, barrier-free living, and dignified elder care.',
                        'impact_summary' => '300+ wheelchairs & mobility aids distributed.',
                    ],
                ],
                'initiatives' => [
                    ['mr' => 'दिव्यांग व्यक्तींना आवश्यक साहित्य', 'hi' => 'दिव्यांगजनों को आवश्यक उपकरण', 'en' => 'Assistive Aids & Learning Kits'],
                    ['mr' => 'व्हीलचेअर व सहाय्यक उपकरणांचे वितरण', 'hi' => 'व्हीलचेयर व सहायक उपकरण वितरण', 'en' => 'Wheelchairs, Walkers & Tricycles'],
                    ['mr' => 'आरोग्य तपासणी', 'hi' => 'विशेष स्वास्थ्य जांच', 'en' => 'Specialized Health & Eye Checkups'],
                    ['mr' => 'सरकारी योजनांची माहिती', 'hi' => 'सरकारी योजनाओं की जानकारी', 'en' => 'Government Welfare Scheme Linkages'],
                    ['mr' => 'प्रमाणपत्र व कागदपत्र मार्गदर्शन', 'hi' => 'प्रमाणपत्र एवं दस्तावेज मार्गदर्शन', 'en' => 'Disability Certificate Facilitation'],
                    ['mr' => 'वृद्धांसाठी आरोग्य सहाय्य', 'hi' => 'वृद्धजनों के लिए स्वास्थ्य सहायता', 'en' => 'Geriatric Health & Medicine Support'],
                    ['mr' => 'वृद्धाश्रमांना मदत', 'hi' => 'वृद्धाश्रमों को सहायता', 'en' => 'Support to Old Age Homes'],
                    ['mr' => 'सामाजिक व भावनिक आधार कार्यक्रम', 'hi' => 'सामाजिक एवं भावनात्मक सहयोग कार्यक्रम', 'en' => 'Emotional & Social Well-being Sessions'],
                ],
            ],

            [
                'slug' => 'youth-employment',
                'order' => 8,
                'color' => 'amber',
                'icon' => 'briefcase',
                'image' => 'images/focus-areas/youth-employment.jpg',
                'translations' => [
                    'mr' => [
                        'title' => 'युवक व रोजगार',
                        'short_description' => 'करिअर मार्गदर्शन, रोजगार मेळावे, डिजिटल कौशल्ये आणि स्पर्धा परीक्षा तयारी.',
                        'description' => 'तरुणांच्या कौशल्याला योग्य दिशा देणे ही काळाची गरज आहे. आम्ही रोजगार मेळावे, मुलाखत मार्गदर्शन आणि व्यावसायिक कौशल्य कार्यशाळा आयोजित करतो.',
                        'objectives' => 'युवकांना स्वावलंबी बनवणे आणि रोजगाराच्या नव्या संधी उपलब्ध करणे.',
                        'impact_summary' => '८००+ तरुणांना रोजगार व करियर मार्गदर्शन.',
                    ],
                    'hi' => [
                        'title' => 'युवा एवं रोजगार',
                        'short_description' => 'करियर काउंसलिंग, रोजगार मेले, डिजिटल स्किल ट्रेनिंग और स्टार्टअप मार्गदर्शन।',
                        'description' => 'युवा शक्ति राष्ट्र की रीढ़ है। हम युवाओं को आधुनिक उद्योग आवश्यकताओं के अनुरूप तैयार कर रोजगार के अवसर प्रदान करते हैं।',
                        'objectives' => 'कौशल विकास और युवाओं का आर्थिक सशक्तिकरण।',
                        'impact_summary' => '८००+ युवाओं को जॉब फेयर व करियर सहायता।',
                    ],
                    'en' => [
                        'title' => 'Youth & Employment',
                        'short_description' => 'Career counseling, job fairs, vocational certifications, and startup incubation.',
                        'description' => 'Channeling youth energy into purposeful careers. We organize job fairs, interview training, digital skills bootcamps, and competitive exam coaching.',
                        'objectives' => 'Market-aligned skill development and gainful employment.',
                        'impact_summary' => '800+ youth connected to jobs and apprenticeships.',
                    ],
                ],
                'initiatives' => [
                    ['mr' => 'करिअर मार्गदर्शन', 'hi' => 'करियर मार्गदर्शन', 'en' => 'Youth Career Counseling & Mentorship'],
                    ['mr' => 'रोजगार मेळावे', 'hi' => 'रोजगार मेले', 'en' => 'Job Fairs & Placement Drives'],
                    ['mr' => 'कौशल्य विकास प्रशिक्षण', 'hi' => 'कौशल विकास प्रशिक्षण', 'en' => 'Vocational Skill Certifications'],
                    ['mr' => 'स्पर्धा परीक्षा मार्गदर्शन', 'hi' => 'प्रतियोगी परीक्षा मार्गदर्शन', 'en' => 'UPSC/MPSC & Banking Exam Coaching'],
                    ['mr' => 'उद्योजकता प्रशिक्षण', 'hi' => 'उद्यमिता प्रशिक्षण', 'en' => 'Entrepreneurship Development Programs'],
                    ['mr' => 'डिजिटल कौशल्य प्रशिक्षण', 'hi' => 'डिजिटल कौशल प्रशिक्षण', 'en' => 'IT & Computer Skills Training'],
                    ['mr' => 'मुलाखत व व्यक्तिमत्त्व विकास', 'hi' => 'साक्षात्कार एवं व्यक्तित्व विकास', 'en' => 'Interview Prep & Soft Skills'],
                    ['mr' => 'स्टार्टअप व स्वयंरोजगार मार्गदर्शन', 'hi' => 'स्टार्टअप एवं स्वरोजगार मार्गदर्शन', 'en' => 'Startup Incubation & Business Guidance'],
                ],
            ],

            [
                'slug' => 'rural-development',
                'order' => 9,
                'color' => 'yellow',
                'icon' => 'home',
                'image' => 'images/focus-areas/rural-development.jpg',
                'translations' => [
                    'mr' => [
                        'title' => 'ग्रामीण विकास',
                        'short_description' => 'ग्रामस्वच्छता, पाणी व्यवस्थापन, शेतकरी मार्गदर्शन आणि समृद्ध ग्राम अभियान.',
                        'description' => 'खऱ्या भारताचा विकास खेड्यांच्या विकासात सामावलेला आहे. आम्ही ग्रामस्वच्छता, जलसुरक्षा आणि शेतकरी कार्यशाळांद्वारे खेड्यांचा सर्वांगीण विकास साधतो.',
                        'objectives' => 'स्वयंपूर्ण, स्वच्छ व समृद्ध गावांची निर्मिती.',
                        'impact_summary' => '२०+ खेड्यांमध्ये शाश्वत जल व स्वच्छता उपक्रम.',
                    ],
                    'hi' => [
                        'title' => 'ग्रामीण विकास',
                        'short_description' => 'ग्राम स्वच्छता, जल प्रबंधन, किसान मार्गदर्शन और समृद्ध ग्राम निर्माण।',
                        'description' => 'ग्रामीण सशक्तिकरण से ही देश की प्रगति संभव है। हम टिकाऊ कृषि पद्धतियों, स्वच्छ पेयजल और समग्र ग्राम विकास के लिए समर्पित हैं।',
                        'objectives' => 'स्वच्छ, स्वस्थ और स्वावलंबी गांवों का निर्माण।',
                        'impact_summary' => '२०+ गांवों में समग्र विकास परियोजनाएं।',
                    ],
                    'en' => [
                        'title' => 'Rural Development',
                        'short_description' => 'Village sanitation, farmer advisory, water infrastructure, and e-governance.',
                        'description' => 'Building self-sustaining, clean, and prosperous villages through community-led watershed management, farmer workshops, and civic infrastructure.',
                        'objectives' => 'Holistic gram vikas, clean water, and agricultural prosperity.',
                        'impact_summary' => '20+ villages empowered with sustainable development programs.',
                    ],
                ],
                'initiatives' => [
                    ['mr' => 'ग्रामस्वच्छता', 'hi' => 'ग्राम स्वच्छता', 'en' => 'Village Cleanliness & Sanitation Infrastructure'],
                    ['mr' => 'पाणी व स्वच्छता जनजागृती', 'hi' => 'जल एवं स्वच्छता जागरूकता', 'en' => 'Clean Water & Sanitation Education'],
                    ['mr' => 'आरोग्य व शिक्षण उपक्रम', 'hi' => 'ग्रामीण स्वास्थ्य एवं शिक्षा उपक्रम', 'en' => 'Rural Health & Primary Education Hubs'],
                    ['mr' => 'महिला बचत गट', 'hi' => 'ग्रामीण महिला बचत समूह', 'en' => 'Village Women SHG Empowerment'],
                    ['mr' => 'शेतकरी मार्गदर्शन', 'hi' => 'किसान मार्गदर्शन एवं कृषि सलाह', 'en' => 'Sustainable Farming & Farmer Workshops'],
                    ['mr' => 'कौशल्य विकास', 'hi' => 'ग्रामीण कौशल विकास', 'en' => 'Rural Artisan & Vocational Training'],
                    ['mr' => 'डिजिटल साक्षरता', 'hi' => 'ग्रामीण डिजिटल साक्षरता', 'en' => 'Rural Digital Literacy & E-Governance'],
                    ['mr' => 'सरकारी योजनांची माहिती', 'hi' => 'सरकारी कल्याण योजनाओं की पहुंच', 'en' => 'Direct Access to Government Welfare Schemes'],
                    ['mr' => 'ग्रामविकास व सामाजिक जनजागृती', 'hi' => 'ग्राम विकास एवं सामाजिक जागरूकता', 'en' => 'Holistic Gram Vikas & Civic Awareness'],
                ],
            ],
        ];

        foreach ($areas as $data) {
            $translations = $data['translations'];
            $initiatives = $data['initiatives'];
            unset($data['translations'], $data['initiatives']);

            $fa = FocusArea::updateOrCreate(['slug' => $data['slug']], $data);

            foreach ($translations as $code => $t) {
                FocusAreaTranslation::updateOrCreate(
                    ['focus_area_id' => $fa->id, 'language_code' => $code],
                    $t
                );
            }

            // Sync initiatives
            // Delete existing initiatives for this area to avoid duplicates
            $fa->initiatives()->delete();

            foreach ($initiatives as $idx => $initData) {
                $initiative = FocusAreaInitiative::create([
                    'focus_area_id' => $fa->id,
                    'order' => $idx + 1,
                    'is_active' => true,
                ]);

                foreach (['mr', 'hi', 'en'] as $lang) {
                    if (isset($initData[$lang])) {
                        FocusAreaInitiativeTranslation::create([
                            'initiative_id' => $initiative->id,
                            'language_code' => $lang,
                            'title' => $initData[$lang],
                        ]);
                    }
                }
            }
        }
    }
}
