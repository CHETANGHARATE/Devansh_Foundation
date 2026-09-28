@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#F58220] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-white border border-white/20 mb-4">
                <a href="{{ route('get-involved') }}" class="hover:underline">सहभागी व्हा</a>
                <span>/</span>
                <span>कॉर्पोरेट सामाजिक उत्तरदायित्व</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-2">
                {{ site_t('involve_csr', [], 'CSR भागीदारी') }}
            </h1>
            <p class="text-base sm:text-lg text-orange-100">
                {{ site_t('involve_csr_desc', [], 'कॉर्पोरेट कंपन्यांसाठी सामाजिक उत्तरदायित्व अंतर्गत प्रभावी प्रकल्प.') }}
            </p>
        </div>
    </div>
</section>

<!-- Form Container -->
<section class="py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100">
            <form action="{{ route('csr.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">कंपनीचे नाव / Company Name *</label>
                        <input type="text" name="company_name" required value="{{ old('company_name') }}" placeholder="उदा. इन्फोटेक लिमिटेड" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">CSR समन्वयक नाव / Contact Person *</label>
                        <input type="text" name="contact_person" required value="{{ old('contact_person') }}" placeholder="पूर्ण नाव" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">कंपनी ईमेल / Official Email *</label>
                        <input type="email" name="email" required value="{{ old('email') }}" placeholder="csr@company.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">मोबाईल / Phone *</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" placeholder="+91 98765 43210" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">CSR कार्यक्षेत्र / Preferred Domain</label>
                        <select name="csr_area" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                            <option value="Education Support">शालेय शिक्षण व डिजिटल वर्ग (Education)</option>
                            <option value="Healthcare Mobile Units">ग्रामीण आरोग्य तपासणी शिबिरे (Healthcare)</option>
                            <option value="Tree Plantation / Eco">वृक्षारोपण व पर्यावरण संवर्धन (Environment)</option>
                            <option value="Women Skill Centers">महिला शिवण व कौशल्य विकास (Skills)</option>
                            <option value="Rural Drinking Water">ग्रामीण शुद्ध पेयजल प्रकल्प (Drinking Water)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">अंदाजे बजेट / Budget Range</label>
                        <select name="budget_range" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                            <option value="₹2 - ₹5 Lakhs">₹2 ते ₹5 लाख</option>
                            <option value="₹5 - ₹10 Lakhs">₹5 ते ₹10 लाख</option>
                            <option value="₹10 - ₹25 Lakhs">₹10 ते ₹25 लाख</option>
                            <option value="₹25 Lakhs+">₹25 लाखांपेक्षा अधिक</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">CSR योजना व अपेक्षा / Message</label>
                    <textarea name="message" rows="4" placeholder="आपल्या कंपनीच्या CSR उद्दिष्टांविषयी सांगा..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">{{ old('message') }}</textarea>
                </div>

                <div>
                    <button type="submit" class="w-full py-4 rounded-xl text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-lg shadow-orange-500/20 text-base transition">
                        CSR प्रस्ताव सबमिट करा / Submit CSR Inquiry
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
