@php
    $currLocale = current_locale();
@endphp

<header x-data="{ mobileMenuOpen: false, getInvolvedOpen: false }" class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#073B63] to-[#138A4B] flex items-center justify-center text-white shadow-md group-hover:scale-105 transition">
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 21a9 9 0 0 0 9-9c0-4.97-4.03-9-9-9s-9 4.03-9 9a9 9 0 0 0 9 9z"/>
                        <path d="M12 12c-2 0-3-1-3-3s1-3 3-3 3 1 3 3-1 3-3 3z"/>
                        <path d="M12 12v6"/>
                        <path d="M9 15l3 3 3-3"/>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-extrabold tracking-tight text-[#073B63] leading-tight">
                        {{ site_t('org_name', [], 'देवांश फाउंडेशन') }}
                    </span>
                    <span class="text-[11px] font-semibold tracking-wider text-[#138A4B] uppercase">
                        {{ site_t('tagline', [], 'Together for a Better Tomorrow') }}
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation Menu -->
            <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2 text-sm font-medium text-[#17324D]">
                <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('home') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : 'hover:text-[#138A4B] hover:bg-gray-50' }}">
                    {{ site_t('nav_home', [], 'मुख्यपृष्ठ') }}
                </a>
                <a href="{{ route('about') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('about') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : 'hover:text-[#138A4B] hover:bg-gray-50' }}">
                    {{ site_t('nav_about', [], 'आमच्याबद्दल') }}
                </a>
                <a href="{{ route('our-work.index') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('our-work.*') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : 'hover:text-[#138A4B] hover:bg-gray-50' }}">
                    {{ site_t('nav_our_work', [], 'कार्यक्षेत्रे') }}
                </a>
                <a href="{{ route('projects.index') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('projects.*') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : 'hover:text-[#138A4B] hover:bg-gray-50' }}">
                    {{ site_t('nav_projects', [], 'प्रकल्प') }}
                </a>
                <a href="{{ route('impact') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('impact') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : 'hover:text-[#138A4B] hover:bg-gray-50' }}">
                    {{ site_t('nav_impact', [], 'प्रभाव') }}
                </a>
                <a href="{{ route('stories.index') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('stories.*') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : 'hover:text-[#138A4B] hover:bg-gray-50' }}">
                    {{ site_t('nav_stories', [], 'यशोगाथा') }}
                </a>
                <a href="{{ route('gallery') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('gallery') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : 'hover:text-[#138A4B] hover:bg-gray-50' }}">
                    {{ site_t('nav_gallery', [], 'गॅलरी') }}
                </a>
                <a href="{{ route('reports') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('reports') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : 'hover:text-[#138A4B] hover:bg-gray-50' }}">
                    {{ site_t('nav_reports', [], 'अहवाल') }}
                </a>

                <!-- Get Involved Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                    <button @click="open = !open" @mouseover="open = true" class="flex items-center space-x-1 px-3 py-2 rounded-lg transition hover:text-[#138A4B] hover:bg-gray-50 {{ request()->routeIs('get-involved*') || request()->routeIs('volunteer') || request()->routeIs('partner') || request()->routeIs('csr') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : '' }}">
                        <span>{{ site_t('nav_get_involved', [], 'सहभागी व्हा') }}</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-0 mt-1 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50"
                         style="display: none;">
                        <a href="{{ route('volunteer') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            <i data-lucide="heart-handshake" class="w-4 h-4 mr-2 text-[#138A4B]"></i>
                            {{ site_t('involve_volunteer', [], 'स्वयंसेवक बना') }}
                        </a>
                        <a href="{{ route('partner') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            <i data-lucide="users" class="w-4 h-4 mr-2 text-[#073B63]"></i>
                            {{ site_t('involve_partner', [], 'भागीदारी करा') }}
                        </a>
                        <a href="{{ route('csr') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            <i data-lucide="briefcase" class="w-4 h-4 mr-2 text-[#F58220]"></i>
                            {{ site_t('involve_csr', [], 'CSR भागीदारी') }}
                        </a>
                        <a href="{{ route('sponsor') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            <i data-lucide="gift" class="w-4 h-4 mr-2 text-[#2E9E58]"></i>
                            {{ site_t('involve_sponsor', [], 'प्रकल्पास प्रायोजकत्व') }}
                        </a>
                        <a href="{{ route('fundraise') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            <i data-lucide="trending-up" class="w-4 h-4 mr-2 text-[#073B63]"></i>
                            {{ site_t('involve_fundraise', [], 'निधी संकलन मोहीम') }}
                        </a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('contact') ? 'text-[#138A4B] font-bold bg-[#EAF7EF]' : 'hover:text-[#138A4B] hover:bg-gray-50' }}">
                    {{ site_t('nav_contact', [], 'संपर्क') }}
                </a>
            </nav>

            <!-- Action Donate CTA & Mobile Hamburger -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('donate') }}" class="inline-flex items-center justify-center space-x-2 px-5 py-2.5 rounded-full text-white text-sm font-semibold bg-[#F58220] hover:bg-[#DC6F13] shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                    <i data-lucide="heart" class="w-4 h-4 fill-white text-white"></i>
                    <span>{{ site_t('btn_donate', [], 'देणगी द्या') }}</span>
                </a>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="lg:hidden p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none" aria-label="Toggle Navigation">
                    <i x-show="!mobileMenuOpen" data-lucide="menu" class="w-6 h-6"></i>
                    <i x-show="mobileMenuOpen" data-lucide="x" class="w-6 h-6" style="display: none;"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Slide-out Drawer -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden border-b border-gray-200 bg-white px-4 pt-2 pb-6 space-y-2 shadow-xl"
         style="display: none;">
        
        <!-- Mobile Language Selector -->
        <div class="flex items-center justify-between py-2 border-b border-gray-100 mb-2">
            <span class="text-xs font-medium text-gray-500">भाषा / Language:</span>
            <div class="flex space-x-2 text-xs font-semibold">
                <a href="{{ route('locale.switch', 'mr') }}" class="px-2 py-1 rounded {{ $currLocale === 'mr' ? 'bg-[#138A4B] text-white' : 'text-gray-600' }}">मराठी</a>
                <a href="{{ route('locale.switch', 'hi') }}" class="px-2 py-1 rounded {{ $currLocale === 'hi' ? 'bg-[#138A4B] text-white' : 'text-gray-600' }}">हिंदी</a>
                <a href="{{ route('locale.switch', 'en') }}" class="px-2 py-1 rounded {{ $currLocale === 'en' ? 'bg-[#138A4B] text-white' : 'text-gray-600' }}">English</a>
            </div>
        </div>

        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('home') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_home', [], 'मुख्यपृष्ठ') }}</a>
        <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('about') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_about', [], 'आमच्याबद्दल') }}</a>
        <a href="{{ route('our-work.index') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('our-work.*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_our_work', [], 'आमची कार्यक्षेत्रे') }}</a>
        <a href="{{ route('projects.index') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('projects.*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_projects', [], 'प्रकल्प') }}</a>
        <a href="{{ route('impact') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('impact') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_impact', [], 'प्रभाव') }}</a>
        <a href="{{ route('stories.index') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('stories.*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_stories', [], 'यशोगाथा') }}</a>
        <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('gallery') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_gallery', [], 'गॅलरी') }}</a>
        <a href="{{ route('reports') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('reports') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_reports', [], 'अहवाल व पारदर्शकता') }}</a>
        <a href="{{ route('get-involved') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('get-involved*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_get_involved', [], 'सहभागी व्हा') }}</a>
        <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md font-medium {{ request()->routeIs('contact') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700' }}">{{ site_t('nav_contact', [], 'संपर्क') }}</a>

        <div class="pt-3 border-t border-gray-100 flex flex-col space-y-2">
            <a href="{{ route('donate') }}" class="w-full text-center py-3 rounded-xl bg-[#F58220] text-white font-bold shadow-md">
                {{ site_t('btn_donate', [], 'देणगी द्या') }}
            </a>
            <a href="{{ route('volunteer') }}" class="w-full text-center py-2.5 rounded-xl border-2 border-[#138A4B] text-[#138A4B] font-semibold">
                {{ site_t('btn_volunteer', [], 'स्वयंसेवक व्हा') }}
            </a>
        </div>
    </div>
</header>
