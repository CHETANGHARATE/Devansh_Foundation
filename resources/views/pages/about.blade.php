@extends('layouts.app')

@php
    $currLocale = current_locale();
@endphp

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-16 sm:py-20 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <span>संस्थेविषयी / About Us</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('about_title', [], 'आमच्याबद्दल - देवांश फाउंडेशन') }}
            </h1>
            <p class="text-lg text-gray-200 leading-relaxed">
                {{ site_t('tagline', [], 'समाजाच्या उज्ज्वल भविष्यासाठी एकत्र • Together for a Better Tomorrow') }}
            </p>
        </div>
    </div>
</section>

<!-- Who We Are / Main Narrative -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-[#EAF7EF] text-[#138A4B] border border-[#138A4B]/20">
                    <span>आम्ही कोण आहोत / Who We Are</span>
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#073B63] leading-tight">
                    सकारात्मक आणि शाश्वत सामाजिक बदलासाठी समर्पित
                </h2>

                <div class="prose text-gray-600 text-base leading-relaxed space-y-4">
                    <p class="text-lg font-medium text-gray-800">
                        {{ site_t('about_content', [], 'देवांश फाउंडेशन ही समाजामध्ये सकारात्मक आणि शाश्वत बदल घडवण्यासाठी कार्य करणारी सामाजिक संस्था आहे. शिक्षण, आरोग्य, बालकल्याण, महिला सक्षमीकरण, कौशल्य विकास, पर्यावरण, ग्रामीण विकास आणि सामाजिक कल्याण या क्षेत्रांमध्ये विविध उपक्रम राबवण्याचे संस्थेचे उद्दिष्ट आहे. समाजातील गरजू आणि वंचित घटकांना संधी, मार्गदर्शन आणि आवश्यक सहाय्य उपलब्ध करून देण्याचा आमचा प्रयत्न आहे.') }}
                    </p>
                    <p>
                        नाशिक आणि महाराष्ट्रातील ग्रामीण तसेच दुर्गम भागातील वंचित घटकांपर्यंत पोहोचून त्यांना आत्मनिर्भर बनवणे हे आमचे ध्येय आहे. प्रत्येक घटकाच्या सर्वांगीण विकासासाठी आम्ही समर्पितपणे कार्य करतो.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div class="bg-[#EEF6FB] p-4 rounded-xl border border-[#073B63]/10">
                        <div class="text-2xl font-black text-[#073B63]">10,000+</div>
                        <div class="text-xs text-gray-600 font-semibold mt-1">लाभार्थी / Beneficiaries</div>
                    </div>
                    <div class="bg-[#EAF7EF] p-4 rounded-xl border border-[#138A4B]/10">
                        <div class="text-2xl font-black text-[#138A4B]">50+</div>
                        <div class="text-xs text-gray-600 font-semibold mt-1">गावे व वाड्या / Villages</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="relative">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white aspect-[4/3]">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1000&q=80" alt="About Devansh Foundation" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl border border-gray-100 max-w-xs hidden sm:block">
                        <div class="flex items-center space-x-3 mb-2">
                            <div class="w-10 h-10 rounded-xl bg-[#138A4B] text-white flex items-center justify-center">
                                <i data-lucide="check" class="w-5 h-5"></i>
                            </div>
                            <div class="text-sm font-bold text-[#073B63]">विश्वसनीय कार्य</div>
                        </div>
                        <p class="text-xs text-gray-500">स्थानिक समुदाय आणि स्वयंसेवकांच्या सहभागातून प्रत्यक्षात साकारणारे काम.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Vision & Mission Sections (Elegant Visual Cards) -->
<section class="py-16 bg-[#EEF6FB]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Vision Card -->
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 relative overflow-hidden flex flex-col justify-between">
                <div class="w-16 h-16 rounded-2xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center mb-6">
                    <i data-lucide="eye" class="w-8 h-8"></i>
                </div>
                <div class="space-y-4">
                    <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#EAF7EF] text-[#138A4B]">
                        <span>दृष्टी / Vision</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#073B63]">
                        {{ site_t('vision_title', [], 'आमची दृष्टी (Vision)') }}
                    </h3>
                    <p class="text-gray-700 text-base sm:text-lg leading-relaxed font-medium">
                        "{{ site_t('vision_content', [], 'प्रत्येक व्यक्तीला समान संधी, दर्जेदार शिक्षण, आरोग्यसेवा आणि सन्मानपूर्वक जीवन जगण्याची संधी असलेला सक्षम, समावेशक आणि आत्मनिर्भर समाज निर्माण करणे.') }}"
                    </p>
                </div>
                <div class="pt-6 border-t border-gray-100 text-xs font-semibold text-[#138A4B] uppercase tracking-wider mt-6">
                    Equality • Dignity • Empowerment
                </div>
            </div>

            <!-- Mission Card -->
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 relative overflow-hidden flex flex-col justify-between">
                <div class="w-16 h-16 rounded-2xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center mb-6">
                    <i data-lucide="compass" class="w-8 h-8"></i>
                </div>
                <div class="space-y-4">
                    <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#EEF6FB] text-[#073B63]">
                        <span>ध्येय / Mission</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#073B63]">
                        {{ site_t('mission_title', [], 'आमचे ध्येय (Mission)') }}
                    </h3>
                    <p class="text-gray-700 text-base sm:text-lg leading-relaxed font-medium">
                        "{{ site_t('mission_content', [], 'शिक्षण, आरोग्य, कौशल्य विकास, महिला व युवक सक्षमीकरण, पर्यावरण संवर्धन आणि समुदाय विकासाच्या माध्यमातून सकारात्मक व दीर्घकालीन सामाजिक बदल घडवणे.') }}"
                    </p>
                </div>
                <div class="pt-6 border-t border-gray-100 text-xs font-semibold text-[#073B63] uppercase tracking-wider mt-6">
                    Education • Health • Environment • Community
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Our Core Values -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading 
            badge="मूल्ये / Values"
            title="आमची मार्गदर्शक तत्त्वे व मूल्ये"
            subtitle="देवांश फाउंडेशनच्या प्रत्येक उपक्रमाचा आधार या मूळ मूल्यांवर आधारलेला आहे."
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:border-[#138A4B]/30 transition">
                <div class="w-12 h-12 rounded-xl bg-[#138A4B] text-white flex items-center justify-center mb-4">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-[#073B63] mb-2">{{ site_t('value_trust', [], 'पारदर्शकता आणि विश्वास') }}</h4>
                <p class="text-sm text-gray-600 leading-relaxed">देणग्यांचा प्रत्येक रुपया गरजू घटकांपर्यंत पोहोचवण्यासाठी 100% पारदर्शक कारभार.</p>
            </div>

            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:border-[#138A4B]/30 transition">
                <div class="w-12 h-12 rounded-xl bg-[#073B63] text-white flex items-center justify-center mb-4">
                    <i data-lucide="heart" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-[#073B63] mb-2">{{ site_t('value_empathy', [], 'मानवता आणि संवेदनशीलता') }}</h4>
                <p class="text-sm text-gray-600 leading-relaxed">समाजातील वंचित आणि गरजू बांधवांच्या समस्या सहानुभूतीने समजून त्यावर प्रत्यक्ष उपाय.</p>
            </div>

            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:border-[#138A4B]/30 transition">
                <div class="w-12 h-12 rounded-xl bg-[#F58220] text-white flex items-center justify-center mb-4">
                    <i data-lucide="zap" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-[#073B63] mb-2">{{ site_t('value_empowerment', [], 'सक्षमीकरण व स्वावलंबन') }}</h4>
                <p class="text-sm text-gray-600 leading-relaxed">केवळ तात्पुरती मदत न करता शिक्षण आणि कौशल्य देऊन व्यक्तीला स्वतःच्या पायावर उभे करणे.</p>
            </div>

            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:border-[#138A4B]/30 transition">
                <div class="w-12 h-12 rounded-xl bg-[#2E9E58] text-white flex items-center justify-center mb-4">
                    <i data-lucide="check-circle-2" class="w-6 h-6"></i>
                </div>
                <h4 class="text-lg font-bold text-[#073B63] mb-2">{{ site_t('value_integrity', [], 'प्रामाणिकपणा व जबाबदारी') }}</h4>
                <p class="text-sm text-gray-600 leading-relaxed">कायदेशीर नियमांचे काटेकोर पालन आणि समाजाप्रती सर्वोच्च निष्ठा राखणे.</p>
            </div>
        </div>
    </div>
</section>

<!-- Transparency & Legal Governance Section -->
<section class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-200">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#EAF7EF] text-[#138A4B]">
                        <span>पारदर्शकता व अहवाल / Transparency</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#073B63]">
                        पारदर्शक कार्यपद्धती आणि अधिकृत अहवाल
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        देवांश फाउंडेशन सार्वजनिक विश्वास आणि पारदर्शकतेला सर्वोच्च महत्त्व देते. संस्थेचे वार्षिक प्रगती अहवाल, उपक्रम आढावा आणि वित्तीय विवरण पत्रके सार्वजनिक निरीक्षणासाठी उपलब्ध आहेत.
                    </p>
                </div>

                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3">
                    <a href="{{ route('reports') }}" class="w-full text-center py-3.5 px-6 rounded-xl bg-[#073B63] text-white font-bold text-sm hover:bg-[#052a47] transition flex items-center justify-center space-x-2">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                        <span>सर्व अहवाल पहा / View Reports</span>
                    </a>
                    <a href="{{ route('contact') }}" class="w-full text-center py-3.5 px-6 rounded-xl border border-gray-300 text-gray-700 font-bold text-sm hover:bg-gray-50 transition flex items-center justify-center space-x-2">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                        <span>चौकशी करा / Contact Us</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
