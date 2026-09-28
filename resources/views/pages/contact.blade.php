@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-16 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <span>{{ site_t('nav_contact') }}</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('contact_title') }}
            </h1>
            <p class="text-lg text-gray-200 leading-relaxed">
                {{ site_t('contact_subtitle') }}
            </p>
        </div>
    </div>
</section>

<!-- Contact Form & Info Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left 5 Columns: Official Contact Cards -->
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm space-y-6">
                    <h2 class="text-2xl font-bold text-[#073B63]">{{ site_t('contact_info_title') }}</h2>

                    <div class="space-y-4 text-sm">
                        <!-- Address -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-orange-50 text-[#F58220] flex items-center justify-center shrink-0">
                                <i data-lucide="map-pin" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 font-semibold uppercase">{{ site_t('donor_address') }}</div>
                                <div class="font-bold text-gray-900 mt-0.5">{{ $address }}</div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center shrink-0">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 font-semibold uppercase">{{ site_t('form_phone') }}</div>
                                <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="font-bold text-gray-900 hover:text-[#138A4B] transition mt-0.5 block">
                                    {{ $phone }}
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center shrink-0">
                                <i data-lucide="mail" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400 font-semibold uppercase">{{ site_t('form_email') }}</div>
                                <a href="mailto:{{ $email }}" class="font-bold text-gray-900 hover:text-[#073B63] transition mt-0.5 block">
                                    {{ $email }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Embed -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 aspect-[4/3]">
                    <iframe src="{{ $mapEmbed ?: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119981.26415053915!2d73.72107936173641!3d19.99110534241372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddee0146033959%3A0xb3ce19b40020621e!2sNashik%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin' }}" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Right 7 Columns: Interactive Contact Form -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-[#073B63] mb-2">{{ site_t('contact_form_title') }}</h2>
                    <p class="text-sm text-gray-600">{{ site_t('contact_subtitle') }}</p>
                </div>

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Honeypot anti-spam field (hidden from real users) -->
                    <div style="display:none !important;" aria-hidden="true">
                        <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
                    </div>

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

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_phone') }}</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_subject') }}</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">{{ site_t('form_message') }} *</label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">{{ old('message') }}</textarea>
                    </div>

                    <div>
                        <button type="submit" class="w-full py-4 rounded-xl text-white font-bold bg-[#138A4B] hover:bg-[#0e6b3a] shadow-lg shadow-emerald-600/20 text-base transition flex items-center justify-center space-x-2">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            <span>{{ site_t('form_submit') }}</span>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection
