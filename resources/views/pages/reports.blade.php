@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-16 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <span>पारदर्शकता / Governance</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('reports_title', [], 'अहवाल आणि पारदर्शकता') }}
            </h1>
            <p class="text-lg text-gray-200 leading-relaxed">
                {{ site_t('reports_desc', [], 'देवांश फाउंडेशन सामाजिक कार्यात 100% पारदर्शकता राखण्यासाठी कटिबद्ध आहे. येथे आमचे वार्षिक आणि आर्थिक अहवाल उपलब्ध आहेत.') }}
            </p>
        </div>
    </div>
</section>

<!-- Reports Sections -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Annual Reports -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center">
                    <i data-lucide="book-open" class="w-5 h-5"></i>
                </div>
                <h2 class="text-2xl font-bold text-[#073B63]">वार्षिक अहवाल / Annual Reports</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($annualReports as $rep)
                    @php $rTrans = $rep->translation(); @endphp
                    <div class="p-6 rounded-2xl border border-gray-100 bg-gray-50/50 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between text-xs text-gray-400 mb-2">
                                <span class="font-bold text-[#138A4B]">{{ $rep->year }}</span>
                                <span>{{ $rep->file_size ?: '2.0 MB' }}</span>
                            </div>
                            <h3 class="text-base font-bold text-[#073B63] mb-1">{{ $rTrans?->title }}</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">{{ $rTrans?->description }}</p>
                        </div>

                        <a href="{{ $rep->file_path ? asset($rep->file_path) : '#' }}" target="_blank" class="inline-flex items-center justify-center space-x-2 w-full py-2.5 rounded-xl bg-[#073B63] hover:bg-[#052a47] text-white text-xs font-bold transition">
                            <i data-lucide="download" class="w-3.5 h-3.5"></i>
                            <span>PDF डाउनलोड करा</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Financial Audits -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center">
                    <i data-lucide="calculator" class="w-5 h-5"></i>
                </div>
                <h2 class="text-2xl font-bold text-[#073B63]">आर्थिक ऑडिट अहवाल / Financial Statements</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($financialReports as $rep)
                    @php $rTrans = $rep->translation(); @endphp
                    <div class="p-6 rounded-2xl border border-gray-100 bg-gray-50/50 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between text-xs text-gray-400 mb-2">
                                <span class="font-bold text-[#073B63]">{{ $rep->year }}</span>
                                <span>{{ $rep->file_size ?: '1.5 MB' }}</span>
                            </div>
                            <h3 class="text-base font-bold text-[#073B63] mb-1">{{ $rTrans?->title }}</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">{{ $rTrans?->description }}</p>
                        </div>

                        <a href="{{ $rep->file_path ? asset($rep->file_path) : '#' }}" target="_blank" class="inline-flex items-center justify-center space-x-2 w-full py-2.5 rounded-xl bg-[#138A4B] hover:bg-[#0e6b3a] text-white text-xs font-bold transition">
                            <i data-lucide="download" class="w-3.5 h-3.5"></i>
                            <span>ऑडिट कॉपी डाउनलोड करा</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Transparency & Governance Note -->
        <div class="bg-gradient-to-br from-[#073B63] to-[#04243D] text-white rounded-3xl p-8 sm:p-10 space-y-4">
            <h3 class="text-xl font-bold text-white flex items-center space-x-2">
                <i data-lucide="shield-check" class="w-6 h-6 text-[#2E9E58]"></i>
                <span>पारदर्शकतेची हमी / Our Commitment to Accountability</span>
            </h3>
            <p class="text-sm text-gray-200 leading-relaxed max-w-3xl">
                देवांश फाउंडेशन प्रत्येक देणगीदाराचा आणि नागरिकाचा विश्वास जपण्यासाठी कटिबद्ध आहे. अधिक तपशील किंवा नियामक कागदपत्रांच्या चौकशीसाठी थेट आमच्या मुख्य कार्यालयात किंवा ईमेलद्वारे संपर्क साधू शकता.
            </p>
            <div class="pt-2">
                <a href="{{ route('contact') }}" class="inline-flex items-center space-x-2 px-6 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold text-xs border border-white/20 transition">
                    <span>प्रशासकीय संपर्क साधा</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>

    </div>
</section>

@endsection
