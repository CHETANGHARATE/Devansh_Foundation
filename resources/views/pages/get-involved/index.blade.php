@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#138A4B] text-white py-16 sm:py-20 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/15 text-white mb-4">
                <span>सहभागी व्हा / Get Involved</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('get_involved_heading', [], 'तुम्ही कसे सहभागी होऊ शकता?') }}
            </h1>
            <p class="text-lg text-emerald-50 leading-relaxed">
                {{ site_t('get_involved_subheading', [], 'एकत्र येऊन आपण अधिक सामर्थ्यवान समाज निर्माण करू शकतो') }}
            </p>
        </div>
    </div>
</section>

<!-- 5 Main Gateways -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- 1. Volunteer -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6 hover:border-[#138A4B]/40 transition">
            <div class="flex items-start space-x-5">
                <div class="w-16 h-16 rounded-2xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center shrink-0">
                    <i data-lucide="heart-handshake" class="w-8 h-8"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-[#073B63] mb-1">{{ site_t('involve_volunteer', [], 'स्वयंसेवक बना') }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed max-w-xl">{{ site_t('involve_volunteer_desc', [], 'तुमचा वेळ आणि कौशल्य समाजाच्या कल्याणासाठी समर्पित करा.') }}</p>
                </div>
            </div>
            <a href="{{ route('volunteer') }}" class="w-full md:w-auto text-center px-8 py-3.5 rounded-xl bg-[#138A4B] hover:bg-[#0e6b3a] text-white font-bold text-sm shadow-md transition">
                स्वयंसेवक अर्ज करा
            </a>
        </div>

        <!-- 2. Partner -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6 hover:border-[#073B63]/40 transition">
            <div class="flex items-start space-x-5">
                <div class="w-16 h-16 rounded-2xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center shrink-0">
                    <i data-lucide="users" class="w-8 h-8"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-[#073B63] mb-1">{{ site_t('involve_partner', [], 'आमच्याशी भागीदारी करा') }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed max-w-xl">{{ site_t('involve_partner_desc', [], 'संस्था आणि एनजीओ एकत्र येऊन मोठे ध्येय साध्य करू शकतात.') }}</p>
                </div>
            </div>
            <a href="{{ route('partner') }}" class="w-full md:w-auto text-center px-8 py-3.5 rounded-xl bg-[#073B63] hover:bg-[#052a47] text-white font-bold text-sm shadow-md transition">
                भागीदारी प्रस्ताव पाठवा
            </a>
        </div>

        <!-- 3. CSR -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6 hover:border-[#F58220]/40 transition">
            <div class="flex items-start space-x-5">
                <div class="w-16 h-16 rounded-2xl bg-orange-50 text-[#F58220] flex items-center justify-center shrink-0">
                    <i data-lucide="briefcase" class="w-8 h-8"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-[#073B63] mb-1">{{ site_t('involve_csr', [], 'CSR भागीदारी') }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed max-w-xl">{{ site_t('involve_csr_desc', [], 'कॉर्पोरेट कंपन्यांसाठी सामाजिक उत्तरदायित्व अंतर्गत प्रभावी प्रकल्प.') }}</p>
                </div>
            </div>
            <a href="{{ route('csr') }}" class="w-full md:w-auto text-center px-8 py-3.5 rounded-xl bg-[#F58220] hover:bg-[#DC6F13] text-white font-bold text-sm shadow-md transition">
                CSR चर्चा सुरू करा
            </a>
        </div>

        <!-- 4. Sponsor -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6 hover:border-[#2E9E58]/40 transition">
            <div class="flex items-start space-x-5">
                <div class="w-16 h-16 rounded-2xl bg-[#EAF7EF] text-[#2E9E58] flex items-center justify-center shrink-0">
                    <i data-lucide="gift" class="w-8 h-8"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-[#073B63] mb-1">{{ site_t('involve_sponsor', [], 'प्रकल्पास प्रायोजकत्व द्या') }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed max-w-xl">{{ site_t('involve_sponsor_desc', [], 'विशिष्ट मुलांचे शिक्षण किंवा आरोग्य शिबिराचे प्रायोजक व्हा.') }}</p>
                </div>
            </div>
            <a href="{{ route('sponsor') }}" class="w-full md:w-auto text-center px-8 py-3.5 rounded-xl bg-[#2E9E58] hover:bg-[#138A4B] text-white font-bold text-sm shadow-md transition">
                प्रायोजकत्व पर्याय पहा
            </a>
        </div>

        <!-- 5. Fundraise -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6 hover:border-[#073B63]/40 transition">
            <div class="flex items-start space-x-5">
                <div class="w-16 h-16 rounded-2xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center shrink-0">
                    <i data-lucide="trending-up" class="w-8 h-8"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-[#073B63] mb-1">{{ site_t('involve_fundraise', [], 'निधी संकलन मोहीम') }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed max-w-xl">{{ site_t('involve_fundraise_desc', [], 'तुमच्या वाढदिवसानिमित्त किंवा विशेष दिनी निधी संकलन करा.') }}</p>
                </div>
            </div>
            <a href="{{ route('fundraise') }}" class="w-full md:w-auto text-center px-8 py-3.5 rounded-xl bg-[#073B63] hover:bg-[#052a47] text-white font-bold text-sm shadow-md transition">
                मोहीम सुरू करा
            </a>
        </div>

    </div>
</section>

@endsection
