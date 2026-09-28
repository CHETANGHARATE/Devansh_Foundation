@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <a href="{{ route('get-involved') }}" class="hover:underline">सहभागी व्हा</a>
                <span>/</span>
                <span>संस्थात्मक भागीदारी</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-2">
                {{ site_t('involve_partner', [], 'आमच्याशी भागीदारी करा') }}
            </h1>
            <p class="text-base sm:text-lg text-gray-200">
                {{ site_t('involve_partner_desc', [], 'संस्था आणि एनजीओ एकत्र येऊन मोठे ध्येय साध्य करू शकतात.') }}
            </p>
        </div>
    </div>
</section>

<!-- Form Container -->
<section class="py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100">
            <form action="{{ route('partner.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">संस्थेचे नाव / Organization *</label>
                        <input type="text" name="organization_name" required value="{{ old('organization_name') }}" placeholder="उदा. सह्याद्री विकास ट्रस्ट" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">संपर्क व्यक्ती / Contact Person *</label>
                        <input type="text" name="contact_person" required value="{{ old('contact_person') }}" placeholder="पूर्ण नाव" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">अधिकृत ईमेल / Email *</label>
                        <input type="email" name="email" required value="{{ old('email') }}" placeholder="org@example.org" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">मोबाईल / Phone *</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" placeholder="+91 98765 43210" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">वेबसाइट / Website (Optional)</label>
                        <input type="url" name="website" value="{{ old('website') }}" placeholder="https://example.org" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">भागीदारी स्वरूप / Nature</label>
                        <select name="partnership_interest" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                            <option value="Joint Community Project">संयुक्त प्रकल्प (Joint Project)</option>
                            <option value="Resource Sharing">संसाधन सामायिकरण (Resource Sharing)</option>
                            <option value="Academic Collaboration">शैक्षणिक सहकार्य (Academic Collaboration)</option>
                            <option value="Healthcare Provider">आरोग्य सेवा पुरवठादार (Healthcare)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">भागीदारी प्रस्ताव / Partnership Proposal</label>
                    <textarea name="message" rows="4" required placeholder="आपल्या संस्थेबद्दल व भागीदारीच्या उद्दिष्टांबद्दल थोडक्यात सांगा..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">{{ old('message') }}</textarea>
                </div>

                <div>
                    <button type="submit" class="w-full py-4 rounded-xl text-white font-bold bg-[#073B63] hover:bg-[#052a47] shadow-lg shadow-blue-900/20 text-base transition">
                        भागीदारी प्रस्ताव सबमिट करा / Submit Proposal
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
