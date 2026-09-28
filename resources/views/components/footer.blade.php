@php
    $phone = setting('contact_phone', '+91 98765 43210');
    $email = setting('contact_email', 'info@devanshfoundation.org');
    $address = setting('contact_address', 'Devansh Foundation, Nashik, Maharashtra, India');
    $fb = setting('social_facebook', 'https://facebook.com/devanshfoundation');
    $insta = setting('social_instagram', 'https://instagram.com/devanshfoundation');
    $yt = setting('social_youtube', 'https://youtube.com/@devanshfoundation');
    $li = setting('social_linkedin', 'https://linkedin.com/company/devanshfoundation');
@endphp

<footer class="bg-[#073B63] text-gray-300 pt-16 pb-8 border-t border-[#0d548b]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-white/10">
            <!-- Brand Column -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#138A4B] to-[#2E9E58] flex items-center justify-center text-white shadow-md">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 21a9 9 0 0 0 9-9c0-4.97-4.03-9-9-9s-9 4.03-9 9a9 9 0 0 0 9 9z"/>
                            <path d="M12 12c-2 0-3-1-3-3s1-3 3-3 3 1 3 3-1 3-3 3z"/>
                            <path d="M12 12v6"/>
                            <path d="M9 15l3 3 3-3"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xl font-extrabold text-white tracking-tight">
                            {{ site_t('org_name', [], 'देवांश फाउंडेशन') }}
                        </div>
                        <div class="text-xs font-semibold text-[#2E9E58] uppercase tracking-wider">
                            {{ site_t('tagline', [], 'Together for a Better Tomorrow') }}
                        </div>
                    </div>
                </div>

                <p class="text-sm text-gray-300 leading-relaxed max-w-sm">
                    {{ site_t('footer_about', [], 'देवांश फाउंडेशन ही नाशिक, महाराष्ट्र येथे कार्यरत असलेली सामाजिक संस्था असून ती शिक्षण, आरोग्य आणि ग्रामीण विकासासाठी समर्पित आहे.') }}
                </p>

                <div class="pt-2">
                    <div class="text-xs font-semibold uppercase tracking-wider text-gray-400 mb-3">फॉलो करा / Follow Us</div>
                    <div class="flex space-x-3">
                        @if($fb)
                        <a href="{{ $fb }}" target="_blank" rel="noopener" aria-label="Facebook" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-[#138A4B] text-white flex items-center justify-center transition">
                            <i data-lucide="facebook" class="w-4 h-4"></i>
                        </a>
                        @endif
                        @if($insta)
                        <a href="{{ $insta }}" target="_blank" rel="noopener" aria-label="Instagram" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-[#138A4B] text-white flex items-center justify-center transition">
                            <i data-lucide="instagram" class="w-4 h-4"></i>
                        </a>
                        @endif
                        @if($yt)
                        <a href="{{ $yt }}" target="_blank" rel="noopener" aria-label="YouTube" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-[#F58220] text-white flex items-center justify-center transition">
                            <i data-lucide="youtube" class="w-4 h-4"></i>
                        </a>
                        @endif
                        @if($li)
                        <a href="{{ $li }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-[#138A4B] text-white flex items-center justify-center transition">
                            <i data-lucide="linkedin" class="w-4 h-4"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <div class="text-sm font-bold uppercase tracking-wider text-white border-l-2 border-[#F58220] pl-2">
                    {{ site_t('quick_links', [], 'महत्त्वाच्या लिंक्स') }}
                </div>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white hover:underline transition">{{ site_t('nav_home', [], 'मुख्यपृष्ठ') }}</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white hover:underline transition">{{ site_t('nav_about', [], 'आमच्याबद्दल') }}</a></li>
                    <li><a href="{{ route('our-work.index') }}" class="hover:text-white hover:underline transition">{{ site_t('nav_our_work', [], 'कार्यक्षेत्रे') }}</a></li>
                    <li><a href="{{ route('projects.index') }}" class="hover:text-white hover:underline transition">{{ site_t('nav_projects', [], 'प्रकल्प') }}</a></li>
                    <li><a href="{{ route('impact') }}" class="hover:text-white hover:underline transition">{{ site_t('nav_impact', [], 'प्रभाव') }}</a></li>
                    <li><a href="{{ route('stories.index') }}" class="hover:text-white hover:underline transition">{{ site_t('nav_stories', [], 'यशोगाथा') }}</a></li>
                    <li><a href="{{ route('gallery') }}" class="hover:text-white hover:underline transition">{{ site_t('nav_gallery', [], 'गॅलरी') }}</a></li>
                    <li><a href="{{ route('reports') }}" class="hover:text-white hover:underline transition">{{ site_t('nav_reports', [], 'अहवाल') }}</a></li>
                </ul>
            </div>

            <!-- Get Involved -->
            <div class="space-y-4">
                <div class="text-sm font-bold uppercase tracking-wider text-white border-l-2 border-[#138A4B] pl-2">
                    {{ site_t('nav_get_involved', [], 'सहभागी व्हा') }}
                </div>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('donate') }}" class="hover:text-[#F58220] transition font-semibold text-white flex items-center"><i data-lucide="heart" class="w-3.5 h-3.5 mr-1.5 text-[#F58220]"></i> {{ site_t('btn_donate', [], 'देणगी द्या') }}</a></li>
                    <li><a href="{{ route('volunteer') }}" class="hover:text-white hover:underline transition">{{ site_t('involve_volunteer', [], 'स्वयंसेवक बना') }}</a></li>
                    <li><a href="{{ route('partner') }}" class="hover:text-white hover:underline transition">{{ site_t('involve_partner', [], 'भागीदारी करा') }}</a></li>
                    <li><a href="{{ route('csr') }}" class="hover:text-white hover:underline transition">{{ site_t('involve_csr', [], 'CSR भागीदारी') }}</a></li>
                    <li><a href="{{ route('sponsor') }}" class="hover:text-white hover:underline transition">{{ site_t('involve_sponsor', [], 'प्रकल्पास प्रायोजकत्व') }}</a></li>
                    <li><a href="{{ route('fundraise') }}" class="hover:text-white hover:underline transition">{{ site_t('involve_fundraise', [], 'निधी संकलन मोहीम') }}</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="space-y-4">
                <div class="text-sm font-bold uppercase tracking-wider text-white border-l-2 border-[#2E9E58] pl-2">
                    {{ site_t('nav_contact', [], 'संपर्क') }}
                </div>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start space-x-2.5">
                        <i data-lucide="map-pin" class="w-4 h-4 text-[#F58220] shrink-0 mt-0.5"></i>
                        <span>{{ $address }}</span>
                    </div>
                    <div class="flex items-center space-x-2.5">
                        <i data-lucide="phone" class="w-4 h-4 text-[#2E9E58] shrink-0"></i>
                        <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="hover:text-white transition">{{ $phone }}</a>
                    </div>
                    <div class="flex items-center space-x-2.5">
                        <i data-lucide="mail" class="w-4 h-4 text-[#2E9E58] shrink-0"></i>
                        <a href="mailto:{{ $email }}" class="hover:text-white transition">{{ $email }}</a>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="{{ route('admin.login') }}" class="inline-flex items-center space-x-1 text-xs text-gray-400 hover:text-white">
                        <i data-lucide="lock" class="w-3 h-3"></i>
                        <span>Admin Login</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom bar with Legal policies & copyright -->
        <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-gray-400 gap-4">
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('privacy-policy') }}" class="hover:text-white transition">{{ site_t('privacy_policy', [], 'गोपनीयता धोरण') }}</a>
                <span>•</span>
                <a href="{{ route('terms') }}" class="hover:text-white transition">{{ site_t('terms_conditions', [], 'अटी व शर्ती') }}</a>
                <span>•</span>
                <a href="{{ route('donation-policy') }}" class="hover:text-white transition">{{ site_t('donation_policy', [], 'देणगी धोरण') }}</a>
                <span>•</span>
                <a href="{{ route('refund-policy') }}" class="hover:text-white transition">{{ site_t('refund_policy', [], 'परतावा धोरण') }}</a>
                <span>•</span>
                <a href="{{ route('disclaimer') }}" class="hover:text-white transition">{{ site_t('disclaimer', [], 'अस्वीकरण') }}</a>
                <span>•</span>
                <a href="{{ url('/sitemap.xml') }}" class="hover:text-white transition">Sitemap</a>
            </div>

            <div>
                {{ site_t('copyright', ['year' => date('Y')], '© ' . date('Y') . ' Devansh Foundation. All Rights Reserved.') }}
            </div>
        </div>
    </div>
</footer>
