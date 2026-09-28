@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#F58220] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-white border border-white/20 mb-4">
                <a href="{{ route('get-involved') }}" class="hover:underline">{{ site_t('nav_get_involved') }}</a>
                <span>/</span>
                <span>{{ site_t('involve_csr') }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-2">
                {{ site_t('involve_csr') }}
            </h1>
            <p class="text-base sm:text-lg text-orange-100">
                {{ site_t('involve_csr_desc') }}
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
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('org_name') }} *</label>
                        <input type="text" name="company_name" required value="{{ old('company_name') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_name') }} *</label>
                        <input type="text" name="contact_person" required value="{{ old('contact_person') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_email') }} *</label>
                        <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_phone') }} *</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('nav_our_work') }}</label>
                        <select name="csr_area" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                            <option value="Education Support">{{ site_t('focus_education') }}</option>
                            <option value="Healthcare Mobile Units">{{ site_t('focus_healthcare') }}</option>
                            <option value="Tree Plantation / Eco">{{ site_t('focus_environment') }}</option>
                            <option value="Women Skill Centers">{{ site_t('focus_women') }}</option>
                            <option value="Rural Drinking Water">{{ site_t('focus_rural') }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Budget Range</label>
                        <select name="budget_range" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">
                            <option value="₹2 - ₹5 Lakhs">₹2 - ₹5 Lakhs</option>
                            <option value="₹5 - ₹10 Lakhs">₹5 - ₹10 Lakhs</option>
                            <option value="₹10 - ₹25 Lakhs">₹10 - ₹25 Lakhs</option>
                            <option value="₹25 Lakhs+">₹25 Lakhs+</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_message') }}</label>
                    <textarea name="message" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#F58220] text-sm text-gray-800">{{ old('message') }}</textarea>
                </div>

                <div>
                    <button type="submit" class="w-full py-4 rounded-xl text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-lg shadow-orange-500/20 text-base transition">
                        {{ site_t('btn_submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
