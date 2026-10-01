<?php

namespace Database\Seeders;

use App\Models\Award;
use App\Models\AwardTranslation;
use App\Models\TeamMember;
use App\Models\TeamMemberTranslation;
use App\Models\TransparencyDocument;
use App\Models\TransparencyDocumentTranslation;
use Illuminate\Database\Seeder;

class AboutUsDemoSeeder extends Seeder
{
    /**
     * Seed sample records for About Us subpages:
     * - 8 Transparency & Legal Documents
     * - 6 Team Members
     * - 4 Awards & Recognitions
     * Idempotent: uses updateOrCreate to avoid duplicates.
     */
    public function run(): void
    {
        // ==========================================
        // 1. Transparency & Legal Documents (8 Sample Documents)
        // ==========================================
        $documents = [
            [
                'slug' => 'registration-certificate',
                'document_type' => 'registration',
                'icon' => 'file-badge',
                'file_path' => null,
                'file_size' => 'Demo',
                'is_demo' => true,
                'is_published' => true,
                'status_label' => 'Sample / Demo Document',
                'order' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Registration Certificate',
                        'short_description' => 'Official registration document under the Societies Registration Act / Trust Act.',
                        'description' => 'Demo Document — Replace with official document. Official document will be uploaded soon.',
                        'status_text' => 'Sample / Demo Document',
                    ],
                    'mr' => [
                        'title' => 'संस्था नोंदणी प्रमाणपत्र',
                        'short_description' => 'सोसायटी / चॅरिटेबल ट्रस्ट नोंदणी अधिनियमांतर्गत अधिकृत नोंदणी प्रमाणपत्र.',
                        'description' => 'नमुना दस्तऐवज — अधिकृत कागदपत्र लवकरच उपलब्ध करून दिले जाईल.',
                        'status_text' => 'नमुना / डेमो कागदपत्र',
                    ],
                    'hi' => [
                        'title' => 'संस्था पंजीकरण प्रमाण पत्र',
                        'short_description' => 'सोसायटी / चैरिटेबल ट्रस्ट पंजीकरण अधिनियम के तहत आधिकारिक प्रमाण पत्र।',
                        'description' => 'नमूना दस्तावेज़ — आधिकारिक दस्तावेज़ शीघ्र ही उपलब्ध कराया जाएगा।',
                        'status_text' => 'नमूना / डेमो दस्तावेज़',
                    ],
                ],
            ],
            [
                'slug' => 'trust-society-registration',
                'document_type' => 'trust_deed',
                'icon' => 'file-check',
                'file_path' => null,
                'file_size' => 'Demo',
                'is_demo' => true,
                'is_published' => true,
                'status_label' => 'Sample / Demo Document',
                'order' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'Trust / Society Registration Deed',
                        'short_description' => 'Public charitable trust deed establishing organizational objectives and governance.',
                        'description' => 'Demo Document — Replace with official document. Official document will be uploaded soon.',
                        'status_text' => 'Sample / Demo Document',
                    ],
                    'mr' => [
                        'title' => 'ट्रस्ट / संस्था नोंदणी दस्तऐवज',
                        'short_description' => 'संस्थेची सामाजिक उद्दिष्टे व व्यवस्थापन नियमावली स्पष्ट करणारा अधिकृत ट्रस्ट दस्तऐवज.',
                        'description' => 'नमुना दस्तऐवज — अधिकृत कागदपत्र लवकरच उपलब्ध करून दिले जाईल.',
                        'status_text' => 'नमुना / डेमो कागदपत्र',
                    ],
                    'hi' => [
                        'title' => 'ट्रस्ट / संस्था पंजीकरण विलेख',
                        'short_description' => 'संस्था के सामाजिक उद्देश्यों एवं प्रबंधन नियमावली को स्पष्ट करने वाला ट्रस्ट विलेख।',
                        'description' => 'नमूना दस्तावेज़ — आधिकारिक दस्तावेज़ शीघ्र ही उपलब्ध कराया जाएगा।',
                        'status_text' => 'नमूना / डेमो दस्तावेज़',
                    ],
                ],
            ],
            [
                'slug' => 'pan-document',
                'document_type' => 'pan',
                'icon' => 'credit-card',
                'file_path' => null,
                'file_size' => 'Demo',
                'is_demo' => true,
                'is_published' => true,
                'status_label' => 'Sample / Demo Document',
                'order' => 3,
                'translations' => [
                    'en' => [
                        'title' => 'Permanent Account Number (PAN)',
                        'short_description' => 'Income Tax Department Permanent Account Number issued for non-profit operations.',
                        'description' => 'Demo Document — Replace with official document. Official document will be uploaded soon.',
                        'status_text' => 'Sample / Demo Document',
                    ],
                    'mr' => [
                        'title' => 'पॅन (PAN) नोंदणी दस्तऐवज',
                        'short_description' => 'आयकर विभागाकडून संस्थेच्या अधिकृत कार्यासाठी जारी करण्यात आलेले पॅन नोंदणी पत्र.',
                        'description' => 'नमुना दस्तऐवज — अधिकृत कागदपत्र लवकरच उपलब्ध करून दिले जाईल.',
                        'status_text' => 'नमुना / डेमो कागदपत्र',
                    ],
                    'hi' => [
                        'title' => 'पैन (PAN) पंजीकरण दस्तावेज़',
                        'short_description' => 'आयकर विभाग द्वारा गैर-लाभकारी कार्यों के संचालन हेतु जारी आधिकारिक पैन दस्तावेज़।',
                        'description' => 'नमूना दस्तावेज़ — आधिकारिक दस्तावेज़ शीघ्र ही उपलब्ध कराया जाएगा।',
                        'status_text' => 'नमूना / डेमो दस्तावेज़',
                    ],
                ],
            ],
            [
                'slug' => '12a-registration',
                'document_type' => '12a',
                'icon' => 'shield-check',
                'file_path' => null,
                'file_size' => 'Demo',
                'is_demo' => true,
                'is_published' => true,
                'status_label' => 'Sample / Demo Document',
                'order' => 4,
                'translations' => [
                    'en' => [
                        'title' => 'Section 12A Registration',
                        'short_description' => 'Income Tax exemption status certification under Section 12A of the Income Tax Act.',
                        'description' => 'Demo Document — Replace with official document. Official document will be uploaded soon.',
                        'status_text' => 'Sample / Demo Document',
                    ],
                    'mr' => [
                        'title' => 'कलम १२A करसवलत नोंदणी',
                        'short_description' => 'प्राप्तिकर कायदा कलम १२A अंतर्गत मिळणारे अधिकृत धर्मादाय करसवलत प्रमाणपत्र.',
                        'description' => 'नमुना दस्तऐवज — अधिकृत कागदपत्र लवकरच उपलब्ध करून दिले जाईल.',
                        'status_text' => 'नमुना / डेमो कागदपत्र',
                    ],
                    'hi' => [
                        'title' => 'धारा १२A आयकर छूट पंजीकरण',
                        'short_description' => 'आयकर अधिनियम धारा १२A के तहत धर्मार्थ आयकर छूट पंजीकरण प्रमाण पत्र।',
                        'description' => 'नमूना दस्तावेज़ — आधिकारिक दस्तावेज़ शीघ्र ही उपलब्ध कराया जाएगा।',
                        'status_text' => 'नमूना / डेमो दस्तावेज़',
                    ],
                ],
            ],
            [
                'slug' => '80g-certificate',
                'document_type' => '80g',
                'icon' => 'heart-handshake',
                'file_path' => null,
                'file_size' => 'Demo',
                'is_demo' => true,
                'is_published' => true,
                'status_label' => 'Sample / Demo Document',
                'order' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Section 80G Tax Exemption Certificate',
                        'short_description' => 'Enables eligible donors to claim 50% tax deductions on contributions under Section 80G.',
                        'description' => 'Demo Document — Replace with official document. Official document will be uploaded soon.',
                        'status_text' => 'Sample / Demo Document',
                    ],
                    'mr' => [
                        'title' => 'कलम ८०G देणगीदार करसवलत प्रमाणपत्र',
                        'short_description' => 'देणगीदारांना प्राप्तिकर कायद्यांतर्गत ५०% करसवलतीचा लाभ देणारे अधिकृत ८०G प्रमाणपत्र.',
                        'description' => 'नमुना दस्तऐवज — अधिकृत कागदपत्र लवकरच उपलब्ध करून दिले जाईल.',
                        'status_text' => 'नमुना / डेमो कागदपत्र',
                    ],
                    'hi' => [
                        'title' => 'धारा ८०G दानदाता कर छूट प्रमाण पत्र',
                        'short_description' => 'दानदाताओं को आयकर अधिनियम के तहत ५०% कर छूट की पात्रता प्रदान करने वाला प्रमाण पत्र।',
                        'description' => 'नमूना दस्तावेज़ — आधिकारिक दस्तावेज़ शीघ्र ही उपलब्ध कराया जाएगा।',
                        'status_text' => 'नमूना / डेमो दस्तावेज़',
                    ],
                ],
            ],
            [
                'slug' => 'annual-report',
                'document_type' => 'annual_report',
                'icon' => 'book-open',
                'file_path' => null,
                'file_size' => 'Demo',
                'is_demo' => true,
                'is_published' => true,
                'status_label' => 'Sample / Demo Document',
                'order' => 6,
                'translations' => [
                    'en' => [
                        'title' => 'Annual Activity & Impact Report',
                        'short_description' => 'Comprehensive year-in-review covering grassroots projects, beneficiaries, and milestones.',
                        'description' => 'Demo Document — Replace with official document. Official document will be uploaded soon.',
                        'status_text' => 'Sample / Demo Document',
                    ],
                    'mr' => [
                        'title' => 'वार्षिक कार्य व सामाजिक प्रभाव अहवाल',
                        'short_description' => 'वर्षभरातील सामाजिक उपक्रम, लाभार्थी आकडेवारी व विकासकामांचा सर्वसमावेशक अहवाल.',
                        'description' => 'नमुना दस्तऐवज — अधिकृत कागदपत्र लवकरच उपलब्ध करून दिले जाईल.',
                        'status_text' => 'नमुना / डेमो कागदपत्र',
                    ],
                    'hi' => [
                        'title' => 'वार्षिक गतिविधि एवं प्रभाव रिपोर्ट',
                        'short_description' => 'वर्षभर के सामाजिक अभियानों, लाभार्थी आंकड़ों और उपलब्धियों की विस्तृत रिपोर्ट।',
                        'description' => 'नमूना दस्तावेज़ — आधिकारिक दस्तावेज़ शीघ्र ही उपलब्ध कराया जाएगा।',
                        'status_text' => 'नमूना / डेमो दस्तावेज़',
                    ],
                ],
            ],
            [
                'slug' => 'audited-financial-statement',
                'document_type' => 'audited_statement',
                'icon' => 'file-spreadsheet',
                'file_path' => null,
                'file_size' => 'Demo',
                'is_demo' => true,
                'is_published' => true,
                'status_label' => 'Sample / Demo Document',
                'order' => 7,
                'translations' => [
                    'en' => [
                        'title' => 'Audited Financial Statement',
                        'short_description' => 'Independently audited balance sheet and income-expenditure statements by Chartered Accountants.',
                        'description' => 'Demo Document — Replace with official document. Official document will be uploaded soon.',
                        'status_text' => 'Sample / Demo Document',
                    ],
                    'mr' => [
                        'title' => 'लेखापरीक्षित आर्थिक विवरणपत्र (ऑडिट)',
                        'short_description' => 'सनदी लेखापालांद्वारे (CA) प्रमाणित संस्थेचे आय-व्यय व आर्थिक ताळेबंद पत्रक.',
                        'description' => 'नमुना दस्तऐवज — अधिकृत कागदपत्र लवकरच उपलब्ध करून दिले जाईल.',
                        'status_text' => 'नमुना / डेमो कागदपत्र',
                    ],
                    'hi' => [
                        'title' => 'लेखापरीक्षित वित्तीय विवरण (ऑडिट रिपोर्ट)',
                        'short_description' => 'चार्टर्ड अकाउंटेंट द्वारा प्रमाणित संस्था का आय-व्यय व वित्तीय लेखा-जोखा।',
                        'description' => 'नमूना दस्तावेज़ — आधिकारिक दस्तावेज़ शीघ्र ही उपलब्ध कराया जाएगा।',
                        'status_text' => 'नमूना / डेमो दस्तावेज़',
                    ],
                ],
            ],
            [
                'slug' => 'donation-utilization-report',
                'document_type' => 'utilization',
                'icon' => 'receipt',
                'file_path' => null,
                'file_size' => 'Demo',
                'is_demo' => true,
                'is_published' => true,
                'status_label' => 'Sample / Demo Document',
                'order' => 8,
                'translations' => [
                    'en' => [
                        'title' => 'Donation Utilization & Fund Allocation Report',
                        'short_description' => 'Detailed transparency report demonstrating fund distribution directly to grassroots programs.',
                        'description' => 'Demo Document — Replace with official document. Official document will be uploaded soon.',
                        'status_text' => 'Sample / Demo Document',
                    ],
                    'mr' => [
                        'title' => 'देणगी विनियोग व निधी वाटप अहवाल',
                        'short_description' => 'मिळालेल्या निधीचा गरजू घटकांसाठी झालेला पारदर्शक व थेट विनियोग दर्शवणारा अहवाल.',
                        'description' => 'नमुना दस्तऐवज — अधिकृत कागदपत्र लवकरच उपलब्ध करून दिले जाईल.',
                        'status_text' => 'नमुना / डेमो कागदपत्र',
                    ],
                    'hi' => [
                        'title' => 'दान उपयोग एवं निधि आवंटन रिपोर्ट',
                        'short_description' => 'प्राप्त सहयोग राशि का जमीनी स्तर पर पारदर्शी व प्रत्यक्ष उपयोग दर्शाने वाली रिपोर्ट।',
                        'description' => 'नमूना दस्तावेज़ — आधिकारिक दस्तावेज़ शीघ्र ही उपलब्ध कराया जाएगा।',
                        'status_text' => 'नमूना / डेमो दस्तावेज़',
                    ],
                ],
            ],
        ];

        foreach ($documents as $docData) {
            $trans = $docData['translations'];
            unset($docData['translations']);

            $doc = TransparencyDocument::updateOrCreate(
                ['slug' => $docData['slug']],
                $docData
            );

            foreach ($trans as $locale => $fields) {
                TransparencyDocumentTranslation::updateOrCreate(
                    [
                        'transparency_document_id' => $doc->id,
                        'language_code' => $locale,
                    ],
                    $fields
                );
            }
        }

        // ==========================================
        // 2. Team Members (6 Sample Members)
        // ==========================================
        $members = [
            [
                'slug' => 'demo-team-member-01',
                'name' => 'Demo Team Member 01',
                'photo' => '/images/team/member-1.jpg',
                'email' => null,
                'linkedin_url' => null,
                'twitter_url' => null,
                'is_demo' => true,
                'is_active' => true,
                'order' => 1,
                'translations' => [
                    'en' => [
                        'name' => 'Demo Team Member 01',
                        'role' => 'Founder & Trustee',
                        'bio' => 'Sample profile for demonstration purposes. Leading grassroots community development and strategic welfare initiatives across Maharashtra.',
                    ],
                    'mr' => [
                        'name' => 'डेमो टीम सदस्य ०१',
                        'role' => 'संस्थापक व विश्वस्त',
                        'bio' => 'डेमो / नमुना प्रोफाइल. ग्रामीण विकास, पारदर्शक प्रशासन आणि लोककल्याणकारी योजनांचे मार्गदर्शन.',
                    ],
                    'hi' => [
                        'name' => 'डेमो टीम सदस्य ०१',
                        'role' => 'संस्थापक एवं ट्रस्टी',
                        'bio' => 'डेमो / नमूना प्रोफाइल। ग्रामीण विकास, पारदर्शी प्रशासन और जनकल्याणकारी अभियानों का मार्गदर्शन।',
                    ],
                ],
            ],
            [
                'slug' => 'demo-team-member-02',
                'name' => 'Demo Team Member 02',
                'photo' => '/images/team/member-2.jpg',
                'email' => null,
                'linkedin_url' => null,
                'twitter_url' => null,
                'is_demo' => true,
                'is_active' => true,
                'order' => 2,
                'translations' => [
                    'en' => [
                        'name' => 'Demo Team Member 02',
                        'role' => 'Program Coordinator',
                        'bio' => 'Sample profile for demonstration purposes. Managing educational kits distribution and women self-reliance skill workshops.',
                    ],
                    'mr' => [
                        'name' => 'डेमो टीम सदस्य ०२',
                        'role' => 'कार्यक्रम समन्वयक',
                        'bio' => 'डेमो / नमुना प्रोफाइल. शिक्षण व महिला स्वावलंबन उपक्रमांचे सुयोग्य नियोजन आणि क्षेत्रीय अंमलबजावणी.',
                    ],
                    'hi' => [
                        'name' => 'डेमो टीम सदस्य ०२',
                        'role' => 'कार्यक्रम समन्वयक',
                        'bio' => 'डेमो / नमूना प्रोफाइल। शिक्षा एवं महिला स्वावलंबन अभियानों का सुव्यवस्थित नियोजन एवं संचालन।',
                    ],
                ],
            ],
            [
                'slug' => 'demo-team-member-03',
                'name' => 'Demo Team Member 03',
                'photo' => '/images/team/member-3.jpg',
                'email' => null,
                'linkedin_url' => null,
                'twitter_url' => null,
                'is_demo' => true,
                'is_active' => true,
                'order' => 3,
                'translations' => [
                    'en' => [
                        'name' => 'Demo Team Member 03',
                        'role' => 'Community Development Coordinator',
                        'bio' => 'Sample profile for demonstration purposes. Connecting rural village stakeholders, sarpanchs, and self-help groups with sustainable change.',
                    ],
                    'mr' => [
                        'name' => 'डेमो टीम सदस्य ०३',
                        'role' => 'समुदाय विकास समन्वयक',
                        'bio' => 'डेमो / नमुना प्रोफाइल. ग्रामीण भागातील ग्रामस्थ, बचत गट व संस्था यांच्यात निरंतर सुसंवाद आणि समन्वय.',
                    ],
                    'hi' => [
                        'name' => 'डेमो टीम सदस्य ०३',
                        'role' => 'समुदाय विकास समन्वयक',
                        'bio' => 'डेमो / नमूना प्रोफाइल। ग्रामीण क्षेत्रों में समुदाय, स्वयं सहायता समूहों एवं संस्था के बीच निरंतर समन्वय।',
                    ],
                ],
            ],
            [
                'slug' => 'demo-team-member-04',
                'name' => 'Demo Team Member 04',
                'photo' => '/images/team/member-4.jpg',
                'email' => null,
                'linkedin_url' => null,
                'twitter_url' => null,
                'is_demo' => true,
                'is_active' => true,
                'order' => 4,
                'translations' => [
                    'en' => [
                        'name' => 'Demo Team Member 04',
                        'role' => 'Healthcare Program Coordinator',
                        'bio' => 'Sample profile for demonstration purposes. Coordinating free medical diagnostic camps, medicine drives, and maternal-child health counseling.',
                    ],
                    'mr' => [
                        'name' => 'डेमो टीम सदस्य ०४',
                        'role' => 'आरोग्य कार्यक्रम समन्वयक',
                        'bio' => 'डेमो / नमुना प्रोफाइल. ग्रामीण आरोग्य शिबिरे, मोफत औषधोपचार व बालरोग तपासणी मोहिमांचे वैद्यकीय समन्वयन.',
                    ],
                    'hi' => [
                        'name' => 'डेमो टीम सदस्य ०४',
                        'role' => 'स्वास्थ्य कार्यक्रम समन्वयक',
                        'bio' => 'डेमो / नमूना प्रोफाइल। ग्रामीण स्वास्थ्य शिविरों, निःशुल्क चिकित्सा व बाल स्वास्थ्य जांच का प्रबंधन।',
                    ],
                ],
            ],
            [
                'slug' => 'demo-team-member-05',
                'name' => 'Demo Team Member 05',
                'photo' => '/images/team/member-5.jpg',
                'email' => null,
                'linkedin_url' => null,
                'twitter_url' => null,
                'is_demo' => true,
                'is_active' => true,
                'order' => 5,
                'translations' => [
                    'en' => [
                        'name' => 'Demo Team Member 05',
                        'role' => 'Volunteer & Outreach Coordinator',
                        'bio' => 'Sample profile for demonstration purposes. Mobilizing passionate youth volunteers, student clubs, and grassroots humanitarian drives.',
                    ],
                    'mr' => [
                        'name' => 'डेमो टीम सदस्य ०५',
                        'role' => 'स्वयंसेवक व संपर्क समन्वयक',
                        'bio' => 'डेमो / नमुना प्रोफाइल. उत्साही तरुणांना समाजकार्याशी जोडणे आणि स्वयंसेवक चमूचे नियोजनबद्ध संचलन.',
                    ],
                    'hi' => [
                        'name' => 'डेमो टीम सदस्य ०५',
                        'role' => 'स्वयंसेवक एवं संपर्क समन्वयक',
                        'bio' => 'डेमो / नमूना प्रोफाइल। युवाओं को सामाजिक सेवा से जोड़ना एवं स्वयंसेवक दल का संचालन।',
                    ],
                ],
            ],
            [
                'slug' => 'demo-team-member-06',
                'name' => 'Demo Team Member 06',
                'photo' => '/images/team/member-6.jpg',
                'email' => null,
                'linkedin_url' => null,
                'twitter_url' => null,
                'is_demo' => true,
                'is_active' => true,
                'order' => 6,
                'translations' => [
                    'en' => [
                        'name' => 'Demo Team Member 06',
                        'role' => 'Finance & Administration',
                        'bio' => 'Sample profile for demonstration purposes. Maintaining rigorous financial governance, audit records, and transparent reporting standards.',
                    ],
                    'mr' => [
                        'name' => 'डेमो टीम सदस्य ०६',
                        'role' => 'वित्त व प्रशासन समन्वयक',
                        'bio' => 'डेमो / नमुना प्रोफाइल. हिशेब तपासणी, पारदर्शक ऑडिट आणि आर्थिक प्रशासनाची जबाबदारी सांभाळणारे पथक.',
                    ],
                    'hi' => [
                        'name' => 'डेमो टीम सदस्य ०६',
                        'role' => 'वित्त एवं प्रशासन समन्वयक',
                        'bio' => 'डेमो / नमूना प्रोफाइल। पारदर्शी लेखा-जोखा, वित्तीय ऑडिट एवं अनुपालन का सुचारु प्रबंधन।',
                    ],
                ],
            ],
        ];

        foreach ($members as $memData) {
            $trans = $memData['translations'];
            unset($memData['translations']);

            $member = TeamMember::updateOrCreate(
                ['slug' => $memData['slug']],
                $memData
            );

            foreach ($trans as $locale => $fields) {
                TeamMemberTranslation::updateOrCreate(
                    [
                        'team_member_id' => $member->id,
                        'language_code' => $locale,
                    ],
                    $fields
                );
            }
        }

        // ==========================================
        // 3. Awards & Recognitions (4 Sample Awards)
        // ==========================================
        $awards = [
            [
                'slug' => 'community-impact-recognition-2025',
                'year' => '2025',
                'category' => 'Community Development',
                'icon' => 'award',
                'certificate_image' => null,
                'is_demo' => true,
                'is_published' => true,
                'order' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Community Impact Recognition',
                        'category_name' => 'Community Development',
                        'description' => 'Placeholder award entry for demonstrating the awards section. Sample Award — Replace with Actual Recognition.',
                        'conferred_by' => 'Regional NGO Network (Demo)',
                    ],
                    'mr' => [
                        'title' => 'समुदाय प्रभाव विशेष सन्मान',
                        'category_name' => 'ग्रामीण व समुदाय विकास',
                        'description' => 'पुरस्कार विभाग प्रदर्शित करण्यासाठी नमुना नोंदणी. नमुना पुरस्कार — मूळ पुरस्कार माहितीने पुनर्स्थित करा.',
                        'conferred_by' => 'विभागीय सामाजिक संस्था मंच (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'समुदाय प्रभाव विशेष सम्मान',
                        'category_name' => 'सामुदायिक विकास',
                        'description' => 'पुरस्कार अनुभाग प्रदर्शित करने के लिए नमूना प्रविष्टि। नमूना पुरस्कार — वास्तविक पुरस्कार जानकारी से बदलें।',
                        'conferred_by' => 'क्षेत्रीय सामाजिक मंच (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'excellence-in-social-initiative-2024',
                'year' => '2024',
                'category' => 'Social Welfare',
                'icon' => 'medal',
                'certificate_image' => null,
                'is_demo' => true,
                'is_published' => true,
                'order' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'Excellence in Social Initiative',
                        'category_name' => 'Social Welfare',
                        'description' => 'Placeholder award entry for demonstrating the awards section. Sample Award — Replace with Actual Recognition.',
                        'conferred_by' => 'Social Impact Forum (Demo)',
                    ],
                    'mr' => [
                        'title' => 'उत्कृष्ट सामाजिक उपक्रम गौरव',
                        'category_name' => 'सामाजिक कल्याण',
                        'description' => 'पुरस्कार विभाग प्रदर्शित करण्यासाठी नमुना नोंदणी. नमुना पुरस्कार — मूळ पुरस्कार माहितीने पुनर्स्थित करा.',
                        'conferred_by' => 'सामाजिक विकास व्यासपीठ (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'उत्कृष्ट सामाजिक पहल गौरव',
                        'category_name' => 'सामाजिक कल्याण',
                        'description' => 'पुरस्कार अनुभाग प्रदर्शित करने के लिए नमूना प्रविष्टि। नमूना पुरस्कार — वास्तविक पुरस्कार जानकारी से बदलें।',
                        'conferred_by' => 'सामाजिक विकास मंच (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'education-support-recognition-2024',
                'year' => '2024',
                'category' => 'Education',
                'icon' => 'graduation-cap',
                'certificate_image' => null,
                'is_demo' => true,
                'is_published' => true,
                'order' => 3,
                'translations' => [
                    'en' => [
                        'title' => 'Education Support Recognition',
                        'category_name' => 'Education',
                        'description' => 'Placeholder award entry for demonstrating the awards section. Sample Award — Replace with Actual Recognition.',
                        'conferred_by' => 'Literacy Foundation Alliance (Demo)',
                    ],
                    'mr' => [
                        'title' => 'शैक्षणिक सहाय्य सन्मान',
                        'category_name' => 'शिक्षण प्रसार',
                        'description' => 'पुरस्कार विभाग प्रदर्शित करण्यासाठी नमुना नोंदणी. नमुना पुरस्कार — मूळ पुरस्कार माहितीने पुनर्स्थित करा.',
                        'conferred_by' => 'साक्षरता व शिक्षण मंडळ (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'शैक्षणिक सहयोग सम्मान',
                        'category_name' => 'शिक्षा प्रसार',
                        'description' => 'पुरस्कार अनुभाग प्रदर्शित करने के लिए नमूना प्रविष्टि। नमूना पुरस्कार — वास्तविक पुरस्कार जानकारी से बदलें।',
                        'conferred_by' => 'साक्षरता एवं शिक्षा परिषद (डेमो)',
                    ],
                ],
            ],
            [
                'slug' => 'community-service-recognition-2023',
                'year' => '2023',
                'category' => 'Community Service',
                'icon' => 'heart',
                'certificate_image' => null,
                'is_demo' => true,
                'is_published' => true,
                'order' => 4,
                'translations' => [
                    'en' => [
                        'title' => 'Community Service Recognition',
                        'category_name' => 'Community Service',
                        'description' => 'Placeholder award entry for demonstrating the awards section. Sample Award — Replace with Actual Recognition.',
                        'conferred_by' => 'District Philanthropy Circle (Demo)',
                    ],
                    'mr' => [
                        'title' => 'समाजसेवा विशेष गौरव',
                        'category_name' => 'समाजसेवा',
                        'description' => 'पुरस्कार विभाग प्रदर्शित करण्यासाठी नमुना नोंदणी. नमुना पुरस्कार — मूळ पुरस्कार माहितीने पुनर्स्थित करा.',
                        'conferred_by' => 'जिल्हा सेवा गौरव समिती (डेमो)',
                    ],
                    'hi' => [
                        'title' => 'समाज सेवा विशेष गौरव',
                        'category_name' => 'समाज सेवा',
                        'description' => 'पुरस्कार अनुभाग प्रदर्शित करने के लिए नमूना प्रविष्टि। नमूना पुरस्कार — वास्तविक पुरस्कार जानकारी से बदलें।',
                        'conferred_by' => 'जिला सेवा गौरव समिति (डेमो)',
                    ],
                ],
            ],
        ];

        foreach ($awards as $awardData) {
            $trans = $awardData['translations'];
            unset($awardData['translations']);

            $award = Award::updateOrCreate(
                ['slug' => $awardData['slug']],
                $awardData
            );

            foreach ($trans as $locale => $fields) {
                AwardTranslation::updateOrCreate(
                    [
                        'award_id' => $award->id,
                        'language_code' => $locale,
                    ],
                    $fields
                );
            }
        }
    }
}
