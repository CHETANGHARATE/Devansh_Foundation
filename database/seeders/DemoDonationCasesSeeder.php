<?php

namespace Database\Seeders;

use App\Models\DonationCase;
use App\Models\DonationCaseTranslation;
use Illuminate\Database\Seeder;

class DemoDonationCasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Idempotent seeder: uses updateOrCreate to avoid creating duplicates.
     */
    public function run(): void
    {
        $cases = [
            [
                'slug' => 'demo-case-child-healthcare-support',
                'beneficiary_name' => 'Demo Case – Child Healthcare Support',
                'category' => 'medical',
                'category_icon' => 'baby',
                'image' => '/images/cases/case-1-demo-child-health.jpg',
                'target_amount' => 280000.00,
                'collected_amount' => 165000.00,
                'currency' => 'INR',
                'expense_label' => 'Treatment Expense',
                'status' => 'active',
                'is_demo' => true,
                'order' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Demo Case – Child Healthcare Support',
                        'expense_label' => 'Treatment Expense',
                        'urgent_message' => 'Demo case for testing healthcare support donations and the Help Us Now carousel.',
                        'description' => 'This is a fictional demonstration case created to test the Devansh Foundation donation carousel, progress bar and multilingual interface.',
                        'category_name' => 'Healthcare (Demo)',
                    ],
                    'mr' => [
                        'title' => 'डेमो प्रकरण – बाल आरोग्य सहाय्य',
                        'expense_label' => 'उपचार खर्च',
                        'urgent_message' => 'आरोग्य सहाय्य आणि देणगी प्रक्रियेच्या डेमोसाठी नमुना प्रकरण.',
                        'description' => 'हे देवंश फाउंडेशनच्या देणगी कॅरोसेल, प्रगती बार आणि बहुभाषिक प्रणालीच्या चाचणीसाठी तयार केलेले काल्पनिक डेमो प्रकरण आहे.',
                        'category_name' => 'आरोग्य सेवा (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'डेमो प्रकरण – बाल स्वास्थ्य सहायता',
                        'expense_label' => 'इलाज का खर्च',
                        'urgent_message' => 'स्वास्थ्य सहायता और दान प्रक्रिया के डेमो के लिए नमूना प्रकरण।',
                        'description' => 'यह देवांश फाउंडेशन के दान हिंडोला (कैरोज़ल), प्रगति पट्टी और बहुभाषी इंटरफ़ेस के परीक्षण के लिए बनाया गया एक काल्पनिक डेमो प्रकरण है।',
                        'category_name' => 'स्वास्थ्य सेवा (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'demo-case-education-support',
                'beneficiary_name' => 'Demo Case – Education Support',
                'category' => 'education',
                'category_icon' => 'book-open',
                'image' => '/images/cases/case-2-demo-education.jpg',
                'target_amount' => 50000.00,
                'collected_amount' => 28000.00,
                'currency' => 'INR',
                'expense_label' => 'Education Support',
                'status' => 'active',
                'is_demo' => true,
                'order' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'Demo Case – Education Support',
                        'expense_label' => 'Education Support',
                        'urgent_message' => 'Demo case for supporting education and learning resources.',
                        'description' => 'Fictional demonstration case representing educational support for testing the website donation interface.',
                        'category_name' => 'Education (Demo)',
                    ],
                    'mr' => [
                        'title' => 'डेमो प्रकरण – शैक्षणिक सहाय्य',
                        'expense_label' => 'शैक्षणिक सहाय्य',
                        'urgent_message' => 'शिक्षण आणि शैक्षणिक साहित्याच्या मदतीसाठी नमुना डेमो प्रकरण.',
                        'description' => 'वेबसाइटच्या देणगी प्रणालीच्या चाचणीसाठी शैक्षणिक मदतीचे प्रतिनिधित्व करणारे काल्पनिक नमुना प्रकरण.',
                        'category_name' => 'शिक्षण (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'डेमो प्रकरण – शैक्षणिक सहायता',
                        'expense_label' => 'शिक्षा सहायता',
                        'urgent_message' => 'शिक्षा और शिक्षण सामग्री की सहायता के लिए नमूना डेमो प्रकरण।',
                        'description' => 'वेबसाइट दान इंटरफ़ेस के परीक्षण हेतु शैक्षणिक सहयोग का प्रतिनिधित्व करने वाला काल्पनिक डेमो प्रकरण।',
                        'category_name' => 'शिक्षा (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'demo-case-medical-treatment-support',
                'beneficiary_name' => 'Demo Case – Medical Treatment Support',
                'category' => 'medical',
                'category_icon' => 'heart-pulse',
                'image' => '/images/cases/case-3-demo-medical.jpg',
                'target_amount' => 150000.00,
                'collected_amount' => 72000.00,
                'currency' => 'INR',
                'expense_label' => 'Treatment Support',
                'status' => 'active',
                'is_demo' => true,
                'order' => 3,
                'translations' => [
                    'en' => [
                        'title' => 'Demo Case – Medical Treatment Support',
                        'expense_label' => 'Treatment Support',
                        'urgent_message' => 'Demo case for testing medical support fundraising.',
                        'description' => 'Fictional demonstration case used only to demonstrate treatment-support information and donation functionality.',
                        'category_name' => 'Healthcare (Demo)',
                    ],
                    'mr' => [
                        'title' => 'डेमो प्रकरण – वैद्यकीय उपचार सहाय्य',
                        'expense_label' => 'उपचार सहाय्य',
                        'urgent_message' => 'वैद्यकीय मदत आणि निधी संकलनाच्या चाचणीसाठी नमुना प्रकरण.',
                        'description' => 'केवळ उपचार-सहाय्य माहिती आणि देणगी कार्यक्षमतेचे प्रात्यक्षिक दाखवण्यासाठी वापरलेले काल्पनिक नमुना प्रकरण.',
                        'category_name' => 'वैद्यकीय उपचार (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'डेमो प्रकरण – चिकित्सा उपचार सहायता',
                        'expense_label' => 'उपचार सहायता',
                        'urgent_message' => 'चिकित्सा सहायता और फंड संकलन के परीक्षण हेतु नमूना प्रकरण।',
                        'description' => 'केवल उपचार सहायता जानकारी और दान कार्यक्षमता प्रदर्शित करने के लिए उपयोग किया गया काल्पनिक डेमो प्रकरण।',
                        'category_name' => 'चिकित्सा उपचार (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'demo-case-women-skill-development',
                'beneficiary_name' => 'Demo Case – Women Skill Development',
                'category' => 'women_empowerment',
                'category_icon' => 'sparkles',
                'image' => '/images/cases/case-4-demo-women.jpg',
                'target_amount' => 75000.00,
                'collected_amount' => 45000.00,
                'currency' => 'INR',
                'expense_label' => 'Skill Training',
                'status' => 'active',
                'is_demo' => true,
                'order' => 4,
                'translations' => [
                    'en' => [
                        'title' => 'Demo Case – Women Skill Development',
                        'expense_label' => 'Skill Training',
                        'urgent_message' => 'Demo case for supporting women skill development initiatives.',
                        'description' => 'Fictional demonstration case representing a women empowerment and skill-development initiative.',
                        'category_name' => 'Women Empowerment (Demo)',
                    ],
                    'mr' => [
                        'title' => 'डेमो प्रकरण – महिला कौशल्य विकास',
                        'expense_label' => 'कौशल्य प्रशिक्षण',
                        'urgent_message' => 'महिला कौशल्य विकास उपक्रमांना पाठबळ देण्यासाठी नमुना प्रकरण.',
                        'description' => 'महिला सक्षमीकरण आणि कौशल्य विकास उपक्रमाचे प्रतिनिधित्व करणारे काल्पनिक नमुना प्रकरण.',
                        'category_name' => 'महिला सक्षमीकरण (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'डेमो प्रकरण – महिला कौशल विकास',
                        'expense_label' => 'कौशल प्रशिक्षण',
                        'urgent_message' => 'महिला कौशल विकास पहलों के सहयोग के लिए नमूना प्रकरण।',
                        'description' => 'महिला सशक्तिकरण और कौशल विकास पहल का प्रतिनिधित्व करने वाला काल्पनिक डेमो प्रकरण।',
                        'category_name' => 'महिला सशक्तिकरण (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'demo-case-senior-citizen-support',
                'beneficiary_name' => 'Demo Case – Senior Citizen Support',
                'category' => 'senior_welfare',
                'category_icon' => 'heart',
                'image' => '/images/cases/case-5-demo-senior.jpg',
                'target_amount' => 100000.00,
                'collected_amount' => 35000.00,
                'currency' => 'INR',
                'expense_label' => 'Eldercare Support',
                'status' => 'active',
                'is_demo' => true,
                'order' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Demo Case – Senior Citizen Support',
                        'expense_label' => 'Eldercare Support',
                        'urgent_message' => 'Demo case for testing senior citizen support campaigns.',
                        'description' => 'Fictional demonstration case representing support for senior citizens and community welfare.',
                        'category_name' => 'Senior Welfare (Demo)',
                    ],
                    'mr' => [
                        'title' => 'डेमो प्रकरण – ज्येष्ठ नागरिक सहाय्य',
                        'expense_label' => 'ज्येष्ठ नागरिक सेवा',
                        'urgent_message' => 'ज्येष्ठ नागरिक कल्याण आणि मदतीसाठी चाचणी नमुना प्रकरण.',
                        'description' => 'ज्येष्ठ नागरिक आणि समाजकल्याण सहाय्याचे प्रतिनिधित्व करणारे काल्पनिक नमुना प्रकरण.',
                        'category_name' => 'ज्येष्ठ नागरिक सहाय्य (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'डेमो प्रकरण – वरिष्ठ नागरिक सहायता',
                        'expense_label' => 'वरिष्ठ नागरिक सेवा',
                        'urgent_message' => 'वरिष्ठ नागरिक कल्याण और सहायता के लिए परीक्षण नमूना प्रकरण।',
                        'description' => 'वरिष्ठ नागरिकों और सामुदायिक कल्याण के सहयोग का प्रतिनिधित्व करने वाला काल्पनिक डेमो प्रकरण।',
                        'category_name' => 'वरिष्ठ नागरिक सहायता (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'demo-case-child-education-assistance',
                'beneficiary_name' => 'Demo Case – Child Education Assistance',
                'category' => 'child_welfare',
                'category_icon' => 'book-open',
                'image' => '/images/cases/case-6-demo-child-edu.jpg',
                'target_amount' => 60000.00,
                'collected_amount' => 42000.00,
                'currency' => 'INR',
                'expense_label' => 'Education Kit',
                'status' => 'active',
                'is_demo' => true,
                'order' => 6,
                'translations' => [
                    'en' => [
                        'title' => 'Demo Case – Child Education Assistance',
                        'expense_label' => 'Education Kit',
                        'urgent_message' => 'Demo case for educational assistance and school-support programs.',
                        'description' => 'Fictional demonstration case representing educational assistance for children.',
                        'category_name' => 'Child Welfare (Demo)',
                    ],
                    'mr' => [
                        'title' => 'डेमो प्रकरण – बाल शिक्षण सहाय्य',
                        'expense_label' => 'शैक्षणिक किट',
                        'urgent_message' => 'मुलांच्या शैक्षणिक सहाय्य आणि शाळा मदत उपक्रमांसाठी नमुना प्रकरण.',
                        'description' => 'मुलांच्या शैक्षणिक मदतीचे प्रतिनिधित्व करणारे काल्पनिक नमुना प्रकरण.',
                        'category_name' => 'बाल शिक्षण (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'डेमो प्रकरण – बाल शिक्षा सहायता',
                        'expense_label' => 'शिक्षा किट',
                        'urgent_message' => 'बच्चों की शैक्षणिक सहायता और स्कूल सहयोग कार्यक्रमों के लिए नमूना प्रकरण।',
                        'description' => 'बच्चों की शैक्षणिक सहायता का प्रतिनिधित्व करने वाला काल्पनिक डेमो प्रकरण।',
                        'category_name' => 'बाल शिक्षा (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'demo-case-rural-community-development',
                'beneficiary_name' => 'Demo Case – Rural Community Development',
                'category' => 'rural_development',
                'category_icon' => 'accessibility',
                'image' => '/images/cases/case-7-demo-rural.jpg',
                'target_amount' => 200000.00,
                'collected_amount' => 110000.00,
                'currency' => 'INR',
                'expense_label' => 'Community Development',
                'status' => 'active',
                'is_demo' => true,
                'order' => 7,
                'translations' => [
                    'en' => [
                        'title' => 'Demo Case – Rural Community Development',
                        'expense_label' => 'Community Development',
                        'urgent_message' => 'Demo case for testing rural development fundraising.',
                        'description' => 'Fictional demonstration case representing a rural community development initiative.',
                        'category_name' => 'Rural Development (Demo)',
                    ],
                    'mr' => [
                        'title' => 'डेमो प्रकरण – ग्रामीण विकास सहाय्य',
                        'expense_label' => 'ग्रामीण विकास निधी',
                        'urgent_message' => 'ग्रामीण समुदाय विकासाच्या उपक्रमांसाठी नमुना चाचणी प्रकरण.',
                        'description' => 'ग्रामीण समुदाय विकास उपक्रमाचे प्रतिनिधित्व करणारे काल्पनिक नमुना प्रकरण.',
                        'category_name' => 'ग्रामीण विकास (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'डेमो प्रकरण – ग्रामीण विकास सहायता',
                        'expense_label' => 'ग्रामीण विकास निधि',
                        'urgent_message' => 'ग्रामीण सामुदायिक विकास पहलों के लिए नमूना परीक्षण प्रकरण।',
                        'description' => 'ग्रामीण सामुदायिक विकास पहल का प्रतिनिधित्व करने वाला काल्पनिक डेमो प्रकरण।',
                        'category_name' => 'ग्रामीण विकास (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'demo-case-community-support',
                'beneficiary_name' => 'Demo Case – Community Support',
                'category' => 'social_welfare',
                'category_icon' => 'heart',
                'image' => '/images/cases/case-8-demo-community.jpg',
                'target_amount' => 125000.00,
                'collected_amount' => 80000.00,
                'currency' => 'INR',
                'expense_label' => 'Community Support',
                'status' => 'active',
                'is_demo' => true,
                'order' => 8,
                'translations' => [
                    'en' => [
                        'title' => 'Demo Case – Community Support',
                        'expense_label' => 'Community Support',
                        'urgent_message' => 'Demo case for testing community-support fundraising.',
                        'description' => 'Fictional demonstration case representing community assistance and social welfare support.',
                        'category_name' => 'Social Welfare (Demo)',
                    ],
                    'mr' => [
                        'title' => 'डेमो प्रकरण – समुदाय सहाय्य',
                        'expense_label' => 'समुदाय साहाय्य निधी',
                        'urgent_message' => 'सामाजिक कल्याण आणि समुदाय सहाय्य निधी चाचणीसाठी नमुना प्रकरण.',
                        'description' => 'समुदाय सहाय्य आणि सामाजिक कल्याणाचे प्रतिनिधित्व करणारे काल्पनिक नमुना प्रकरण.',
                        'category_name' => 'समुदाय सहाय्य (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'डेमो प्रकरण – सामुदायिक सहायता',
                        'expense_label' => 'सामुदायिक सहायता',
                        'urgent_message' => 'सामाजिक कल्याण और सामुदायिक सहायता फंड परीक्षण के लिए नमूना प्रकरण।',
                        'description' => 'सामुदायिक सहायता और सामाजिक कल्याण सहयोग का प्रतिनिधित्व करने वाला काल्पनिक डेमो प्रकरण।',
                        'category_name' => 'सामुदायिक सहायता (डेमो)',
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
