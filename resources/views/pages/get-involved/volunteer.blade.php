@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#138A4B] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/15 text-white mb-4">
                <a href="{{ route('get-involved') }}" class="hover:underline">{{ site_t('nav_get_involved') }}</a>
                <span>/</span>
                <span>{{ site_t('involve_volunteer') }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-2">
                {{ site_t('involve_volunteer') }}
            </h1>
            <p class="text-base sm:text-lg text-emerald-100">
                {{ site_t('involve_volunteer_desc') }}
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
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_name') }} *</label>
                        <input type="text" name="name" required value="{{ old('name') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_email') }} *</label>
                        <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_phone') }} *</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('donor_address') }}</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">वय / Age</label>
                        <input type="number" name="age" min="15" max="100" value="{{ old('age') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('nav_our_work') }}</label>
                        <select name="area_of_interest" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            <option value="Education">{{ site_t('focus_education') }}</option>
                            <option value="Healthcare">{{ site_t('focus_healthcare') }}</option>
                            <option value="Environment">{{ site_t('focus_environment') }}</option>
                            <option value="Women Empowerment">{{ site_t('focus_women') }}</option>
                            <option value="Child Welfare">{{ site_t('focus_child') }}</option>
                            <option value="Rural Development">{{ site_t('focus_rural') }}</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">उपलब्धता / Availability</label>
                        <select name="availability" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            <option value="Weekends">Weekends</option>
                            <option value="Weekdays">Weekdays</option>
                            <option value="Flexible">Flexible</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">कौशल्ये / Skills</label>
                    <input type="text" name="skills" value="{{ old('skills') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_message') }}</label>
                    <textarea name="message" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">{{ old('message') }}</textarea>
                </div>

                <div>
                    <button type="submit" class="w-full py-4 rounded-xl text-white font-bold bg-[#138A4B] hover:bg-[#0e6b3a] shadow-lg shadow-emerald-600/20 text-base transition">
                        {{ site_t('btn_submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
