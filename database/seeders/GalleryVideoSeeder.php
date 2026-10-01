<?php

namespace Database\Seeders;

use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryVideoSeeder extends Seeder
{
    public function run(): void
    {
        $album1 = GalleryAlbum::first();

        $videos = [
            [
                'gallery_album_id' => $album1?->id,
                'media_type' => 'video',
                'category' => 'Environment',
                'title_mr' => 'हरित नाशिक: १०,००० वृक्षारोपण मोहीम वृत्तचित्र',
                'title_hi' => 'हरित नासिक: १०,००० पौधरोपण अभियान डॉक्यूमेंट्री',
                'title_en' => 'Green Nashik: 10,000 Tree Plantation Drive Documentary',
                'caption_mr' => 'देवांश फाउंडेशनतर्फे इगतपुरी व त्र्यंबकेश्वर परिसरात राबवण्यात आलेल्या भव्य वृक्षारोपण मोहिमेची झलक.',
                'caption_hi' => 'देवांश फाउंडेशन द्वारा इगतपुरी व त्र्यंबकेश्वर क्षेत्र में आयोजित विशाल वृक्षारोपण अभियान की झलकियां।',
                'caption_en' => 'Highlights of the mega community tree plantation drive organized by Devansh Foundation across rural Nashik.',
                'description_mr' => 'पर्यावरण संवर्धनासाठी देवांश फाउंडेशनने स्थानिक ग्रामस्थांच्या सहकार्याने १०,००० देशी झाडांची लागवड केली व संवर्धनाची जबाबदारी घेतली.',
                'description_hi' => 'पर्यावरण संरक्षण हेतु देवांश फाउंडेशन ने स्थानीय ग्रामीणों के सहयोग से १०,००० देशी पौधों का रोपण किया।',
                'description_en' => 'In an ambitious afforestation initiative, Devansh Foundation planted 10,000 indigenous trees with active community stewardship.',
                'video_url' => 'https://www.youtube.com/watch?v=ScMzIvxBSi4',
                'thumbnail_path' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=1200&q=80',
                'image_path' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Green Nashik Tree Plantation Drive by Devansh Foundation',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'gallery_album_id' => $album1?->id,
                'media_type' => 'video',
                'category' => 'Health',
                'title_mr' => 'ग्रामीण मोफत आरोग्य शिबिर व तपासणी मोहीम',
                'title_hi' => 'ग्रामीण निःशुल्क स्वास्थ्य शिविर एवं जांच अभियान',
                'title_en' => 'Rural Free Health & Eye Diagnostic Camp Highlights',
                'caption_mr' => 'कळवण व दिंडोरी तालुक्यातील गरजू नागरिकांसाठी मोफत आरोग्य तपासणी, औषध वाटप व नेत्र तपासणी.',
                'caption_hi' => 'कलवण एवं दिंडोरी में जरूरतमंद नागरिकों के लिए निःशुल्क स्वास्थ्य जांच, औषधि वितरण एवं नेत्र शिविर।',
                'caption_en' => 'Free multi-specialty health checkups, medicine distribution, and cataract diagnosis camp for rural beneficiaries.',
                'description_mr' => 'तज्ज्ञ डॉक्टरांच्या पथकाद्वारे ५०० हून अधिक ज्येष्ठ नागरिक व महिलांची मोफत आरोग्य तपासणी करण्यात आली.',
                'description_hi' => 'विशेषज्ञ डॉक्टरों की टीम द्वारा ५०० से अधिक वरिष्ठ नागरिकों और महिलाओं की मुफ्त स्वास्थ्य जांच की गई।',
                'description_en' => 'Comprehensive multi-specialty health screening camp offering free consultations, lab tests, and medications to 500+ villagers.',
                'video_url' => 'https://www.youtube.com/watch?v=jfKfPfyJRdk',
                'thumbnail_path' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
                'image_path' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Devansh Foundation Free Medical Camp in Rural Nashik',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'gallery_album_id' => $album1?->id,
                'media_type' => 'video',
                'category' => 'Women Empowerment',
                'title_mr' => 'महिला सक्षमीकरण: व्यावसायिक शिवणकला प्रशिक्षण दीक्षांत सोहळा',
                'title_hi' => 'महिला सशक्तिकरण: व्यावसायिक सिलाई प्रशिक्षण दीक्षांत समारोह',
                'title_en' => 'Women Empowerment: Vocational Tailoring Training Convocation',
                'caption_mr' => 'ग्रामीण भागातील ५० महिलांना मोफत शिलाई मशीन व प्रमाणपत्र वाटप सोहळा.',
                'caption_hi' => 'ग्रामीण क्षेत्र की ५० महिलाओं को निःशुल्क सिलाई मशीन एवं प्रमाण पत्र वितरण समारोह।',
                'caption_en' => 'Free sewing machine distribution and graduation ceremony for 50 rural women entrepreneurs.',
                'description_mr' => '३ महिन्यांचे कौशल्य प्रशिक्षण पूर्ण केलेल्या भगिनींना स्वतःच्या पायावर उभे राहण्यासाठी मोफत शिलाई मशीन प्रदान करण्यात आली.',
                'description_hi' => '३ माह का व्यावसायिक प्रशिक्षण पूरा करने वाली महिलाओं को स्वावलंबन हेतु सिलाई मशीन वितरित की गई।',
                'description_en' => 'Equipping underprivileged women with certified tailoring skills and modern sewing machines to foster sustainable micro-enterprises.',
                'video_url' => 'https://www.youtube.com/watch?v=kJQP7kiw5Fk',
                'thumbnail_path' => 'https://images.unsplash.com/photo-1594608661623-aa0bd3a69d98?auto=format&fit=crop&w=1200&q=80',
                'image_path' => 'https://images.unsplash.com/photo-1594608661623-aa0bd3a69d98?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Women Empowerment Tailoring Program Devansh Foundation',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'gallery_album_id' => $album1?->id,
                'media_type' => 'video',
                'category' => 'Education',
                'title_mr' => 'शैक्षणिक संवर्धन: आदिवासी भागातील विद्यार्थ्यांना दप्तर व साहित्य वाटप',
                'title_hi' => 'शिक्षा संवर्धन: आदिवासी क्षेत्र के बच्चों को स्कूल किट व सामग्री वितरण',
                'title_en' => 'Educational Outreach: School Kit & Study Material Distribution',
                'caption_mr' => 'दुर्गम भागातील जिल्हा परिषद शाळांमधील प्राथमिक विद्यार्थ्यांना शैक्षणिक साहित्य, पुस्तके व स्कूल बॅग वाटप.',
                'caption_hi' => 'दूरदराज के विद्यालयों में प्राथमिक छात्रों को अध्ययन सामग्री, पुस्तकें व स्कूल बैग वितरण।',
                'caption_en' => 'Distribution of school bags, textbooks, and educational kits to primary school children in remote tribal belts.',
                'description_mr' => 'आर्थिक अडचणींमुळे शिक्षणापासून वंचित राहू नये म्हणून देवांश फाउंडेशनतर्फे विद्यार्थ्यांना संपूर्ण शैक्षणिक संच देण्यात आला.',
                'description_hi' => 'आर्थिक तंगी से बच्चों की पढ़ाई बाधित न हो, इसके लिए संपूर्ण स्कूल किट और पाठ्य सामग्री प्रदान की गई।',
                'description_en' => 'Empowering tribal children with essential school kits, notebooks, and learning materials to reduce dropouts and inspire education.',
                'video_url' => 'https://www.youtube.com/watch?v=9bZkp7q19f0',
                'thumbnail_path' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
                'image_path' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Devansh Foundation Educational Kit Distribution for Children',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($videos as $v) {
            GalleryImage::updateOrCreate(
                ['video_url' => $v['video_url']],
                $v
            );
        }
    }
}
