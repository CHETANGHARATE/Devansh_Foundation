@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#2E9E58] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-white border border-white/20 mb-4">
                <a href="{{ route('get-involved') }}" class="hover:underline">सहभागी व्हा</a>
                <span>/</span>
                <span>प्रकल्प प्रायोजकत्व</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-2">
                {{ site_t('involve_sponsor', [], 'प्रकल्पास प्रायोजकत्व द्या') }}
            </h1>
            <p class="text-base sm:text-lg text-emerald-100">
                {{ site_t('involve_sponsor_desc', [], 'विशिष्ट मुलांचे शिक्षण किंवा आरोग्य शिबिराचे प्रायोजक व्हा.') }}
            </p>
        </div>
    </div>
</section>

<!-- Sponsoring Packages Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            
            <!-- Package 1: Child Education -->
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm flex flex-col justify-between hover:border-[#138A4B]/40 transition">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center mb-6">
                        <i data-lucide="graduation-cap" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#073B63] mb-2">एका विद्यार्थ्याचे वार्षिक शिक्षण</h3>
                    <div class="text-3xl font-extrabold text-[#138A4B] mb-4">₹6,000 <span class="text-xs text-gray-500 font-normal">/ वर्ष</span></div>
                    <ul class="space-y-2.5 text-xs text-gray-600 mb-6">
                        <li class="flex items-center"><i data-lucide="check" class="w-4 h-4 text-[#138A4B] mr-2"></i>संपूर्ण शालेय पुस्तके व दप्तर किट</li>
                        <li class="flex items-center"><i data-lucide="check" class="w-4 h-4 text-[#138A4B] mr-2"></i>दोन गणवेश व शूज संच</li>
                        <li class="flex items-center"><i data-lucide="check" class="w-4 h-4 text-[#138A4B] mr-2"></i>साप्ताहिक अभ्यासिका मार्गदर्शन</li>
                    </ul>
                </div>
                <a href="{{ route('donate', ['amount' => 6000]) }}" class="w-full text-center py-3 rounded-xl bg-[#138A4B] hover:bg-[#0e6b3a] text-white font-bold text-sm transition">
                    प्रायोजक बना / Sponsor
                </a>
            </div>

            <!-- Package 2: Health Camp -->
            <div class="bg-white rounded-3xl p-8 border-2 border-[#F58220] shadow-md flex flex-col justify-between relative transform -translate-y-2">
                <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-[#F58220] text-white px-3 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider">
                    सर्वाधिक आवश्यक / Most Needed
                </div>
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-orange-50 text-[#F58220] flex items-center justify-center mb-6">
                        <i data-lucide="heart-pulse" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#073B63] mb-2">एक पूर्ण ग्रामीण आरोग्य शिबीर</h3>
                    <div class="text-3xl font-extrabold text-[#F58220] mb-4">₹25,000 <span class="text-xs text-gray-500 font-normal">/ शिबीर</span></div>
                    <ul class="space-y-2.5 text-xs text-gray-600 mb-6">
                        <li class="flex items-center"><i data-lucide="check" class="w-4 h-4 text-[#F58220] mr-2"></i>300+ ग्रामस्थांची मोफत तपासणी</li>
                        <li class="flex items-center"><i data-lucide="check" class="w-4 h-4 text-[#F58220] mr-2"></i>विनामूल्य औषध वाटप व तपासण्या</li>
                        <li class="flex items-center"><i data-lucide="check" class="w-4 h-4 text-[#F58220] mr-2"></i>50+ ज्येष्ठांना मोफत चष्मे वाटप</li>
                    </ul>
                </div>
                <a href="{{ route('donate', ['amount' => 25000]) }}" class="w-full text-center py-3 rounded-xl bg-[#F58220] hover:bg-[#DC6F13] text-white font-bold text-sm shadow-md transition">
                    शिबीर प्रायोजित करा
                </a>
            </div>

            <!-- Package 3: Green Tree Plantation -->
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm flex flex-col justify-between hover:border-[#2E9E58]/40 transition">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-[#EAF7EF] text-[#2E9E58] flex items-center justify-center mb-6">
                        <i data-lucide="trees" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#073B63] mb-2">50 देशी वृक्षांचे रोपण व संगोपन</h3>
                    <div class="text-3xl font-extrabold text-[#2E9E58] mb-4">₹10,000 <span class="text-xs text-gray-500 font-normal">/ 50 झाडे</span></div>
                    <ul class="space-y-2.5 text-xs text-gray-600 mb-6">
                        <li class="flex items-center"><i data-lucide="check" class="w-4 h-4 text-[#2E9E58] mr-2"></i>देशी वृक्षांची रोपे (वड, पिंपळ, कडुलिंब)</li>
                        <li class="flex items-center"><i data-lucide="check" class="w-4 h-4 text-[#2E9E58] mr-2"></i>ठिबक सिंचन व ट्री-गार्ड सुविधा</li>
                        <li class="flex items-center"><i data-lucide="check" class="w-4 h-4 text-[#2E9E58] mr-2"></i>3 वर्षे संगोपनाची जबाबदारी</li>
                    </ul>
                </div>
                <a href="{{ route('donate', ['amount' => 10000]) }}" class="w-full text-center py-3 rounded-xl bg-[#073B63] hover:bg-[#052a47] text-white font-bold text-sm transition">
                    वृक्षारोपण प्रायोजित करा
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
