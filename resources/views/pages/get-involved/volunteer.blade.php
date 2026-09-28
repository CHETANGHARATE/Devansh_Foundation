@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#138A4B] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/15 text-white mb-4">
                <a href="{{ route('get-involved') }}" class="hover:underline">सहभागी व्हा</a>
                <span>/</span>
                <span>स्वयंसेवक नोंदणी</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-2">
                {{ site_t('involve_volunteer', [], 'स्वयंसेवक बना') }}
            </h1>
            <p class="text-base sm:text-lg text-emerald-100">
                {{ site_t('involve_volunteer_desc', [], 'तुमचा वेळ आणि कौशल्य समाजाच्या कल्याणासाठी समर्पित करा.') }}
            </p>
        </div>
    </div>
</section>

<!-- Form Container -->
<section class="py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100">
            <form action="{{ route('volunteer.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">पूर्ण नाव / Full Name *</label>
                        <input type="text" name="name" required value="{{ old('name') }}" placeholder="उदा. राहुल शिंदे" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">ईमेल / Email Address *</label>
                        <input type="email" name="email" required value="{{ old('email') }}" placeholder="name@example.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">मोबाईल / Phone *</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" placeholder="+91 98765 43210" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">शहर / City</label>
                        <input type="text" name="city" value="{{ old('city', 'नाशिक / Nashik') }}" placeholder="शहर" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">वय / Age</label>
                        <input type="number" name="age" min="15" max="100" value="{{ old('age') }}" placeholder="उदा. 24" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">आवडीचे क्षेत्र / Area of Interest</label>
                        <select name="area_of_interest" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            <option value="Education">शिक्षण व बालमार्गदर्शन (Education)</option>
                            <option value="Healthcare">आरोग्य शिबिरे व सहाय्य (Healthcare)</option>
                            <option value="Environment">वृक्षारोपण व पर्यावरण (Environment)</option>
                            <option value="Women Empowerment">महिला सक्षमीकरण (Women Empowerment)</option>
                            <option value="Digital Media">सोशल मीडिया व फोटोग्राफी (Digital)</option>
                            <option value="Events">इव्हेंट व्यवस्थापन (Events)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">उपलब्धता / Availability</label>
                        <select name="availability" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            <option value="Weekends">केवळ शनिवार व रविवार (Weekends)</option>
                            <option value="Weekdays">आठवड्यातील दिवस (Weekdays)</option>
                            <option value="Flexible">वेळोवेळी गरजेनुसार (Flexible)</option>
                            <option value="Remote">घरून / ऑनलाईन (Remote)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">कौशल्ये / Skills & Expertise</label>
                    <input type="text" name="skills" value="{{ old('skills') }}" placeholder="उदा. अध्यापन, समुपदेशन, संगीत, संगणक, वाहन चालवणे..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">काही संदेश / Why do you want to join? (Optional)</label>
                    <textarea name="message" rows="4" placeholder="तुम्हाला देवांश फाउंडेशनसोबत का काम करायचे आहे?" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">{{ old('message') }}</textarea>
                </div>

                <div>
                    <button type="submit" class="w-full py-4 rounded-xl text-white font-bold bg-[#138A4B] hover:bg-[#0e6b3a] shadow-lg shadow-emerald-600/20 text-base transition">
                        स्वयंसेवक अर्ज सबमिट करा / Submit Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
