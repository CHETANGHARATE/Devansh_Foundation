@php
    $currLocale = current_locale();
@endphp

<header x-data="{ mobileMenuOpen: false, getInvolvedOpen: false }" class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-100 transition-all">
    <div class="max-w-[1380px] mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center h-[76px] gap-2">
            
            <!-- Brand Logo with Official Uploaded Image -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2.5 group py-1 shrink-0">
                <img src="{{ asset('images/logo.png') }}" 
                     alt="Devansh Foundation" 
                     class="h-14 sm:h-[60px] w-auto object-contain drop-shadow-sm group-hover:scale-105 transition duration-300">
                <div class="hidden sm:flex flex-col text-left">
                    <span class="text-lg xl:text-xl font-black tracking-tight text-[#073B63] leading-none">
                        {{ site_t('org_name_first') }}
                    </span>
                    <span class="text-xs xl:text-sm font-bold tracking-wider text-[#073B63] leading-tight">
                        {{ site_t('org_name_second') }}
                    </span>
                    <span class="text-[9px] xl:text-[10px] font-semibold text-[#138A4B] leading-none mt-0.5">
                        {{ site_t('tagline') }}
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation Menu — ALL in ONE line with equal margins and no wrapping -->
            <nav class="hidden lg:flex items-center space-x-0.5 xl:space-x-1.5 text-[13px] xl:text-[14px] font-semibold text-[#17324D] shrink-0">
                
                <a href="{{ route('home') }}" 
                   class="whitespace-nowrap px-2 xl:px-2.5 py-1.5 transition relative {{ request()->routeIs('home') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    {{ site_t('nav_home') }}
                    @if(request()->routeIs('home'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

                <a href="{{ route('about') }}" 
                   class="whitespace-nowrap px-2 xl:px-2.5 py-1.5 transition relative {{ request()->routeIs('about') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    {{ site_t('nav_about') }}
                    @if(request()->routeIs('about'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

                <a href="{{ route('our-work.index') }}" 
                   class="whitespace-nowrap px-2 xl:px-2.5 py-1.5 transition relative {{ request()->routeIs('our-work.*') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    {{ site_t('nav_our_work') }}
                    @if(request()->routeIs('our-work.*'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

                <a href="{{ route('projects.index') }}" 
                   class="whitespace-nowrap px-2 xl:px-2.5 py-1.5 transition relative {{ request()->routeIs('projects.*') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    {{ site_t('nav_projects') }}
                    @if(request()->routeIs('projects.*'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

                <a href="{{ route('impact') }}" 
                   class="whitespace-nowrap px-2 xl:px-2.5 py-1.5 transition relative {{ request()->routeIs('impact') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    {{ site_t('nav_impact') }}
                    @if(request()->routeIs('impact'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

                <a href="{{ route('stories.index') }}" 
                   class="whitespace-nowrap px-2 xl:px-2.5 py-1.5 transition relative {{ request()->routeIs('stories.*') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    {{ site_t('nav_stories') }}
                    @if(request()->routeIs('stories.*'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

                <a href="{{ route('gallery') }}" 
                   class="whitespace-nowrap px-2 xl:px-2.5 py-1.5 transition relative {{ request()->routeIs('gallery') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    {{ site_t('nav_gallery') }}
                    @if(request()->routeIs('gallery'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

                <a href="{{ route('reports') }}" 
                   class="whitespace-nowrap px-2 xl:px-2.5 py-1.5 transition relative {{ request()->routeIs('reports') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    {{ site_t('nav_reports') }}
                    @if(request()->routeIs('reports'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

                <!-- Get Involved Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                    <button @click="open = !open" 
                            @mouseover="open = true" 
                            class="whitespace-nowrap inline-flex items-center space-x-1 px-2 xl:px-2.5 py-1.5 transition {{ request()->routeIs('get-involved*') || request()->routeIs('volunteer') || request()->routeIs('partner') || request()->routeIs('csr') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                        <span>{{ site_t('nav_get_involved') }}</span>
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{ 'rotate-180': open }" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-0 mt-1 w-52 bg-white rounded-lg shadow-xl border border-gray-100 py-1.5 z-50"
                         style="display: none;">
                        <a href="{{ route('volunteer') }}" class="flex items-center px-4 py-2 text-xs font-medium text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            {{ site_t('involve_volunteer') }}
                        </a>
                        <a href="{{ route('partner') }}" class="flex items-center px-4 py-2 text-xs font-medium text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            {{ site_t('involve_partner') }}
                        </a>
                        <a href="{{ route('csr') }}" class="flex items-center px-4 py-2 text-xs font-medium text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            {{ site_t('involve_csr') }}
                        </a>
                        <a href="{{ route('sponsor') }}" class="flex items-center px-4 py-2 text-xs font-medium text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            {{ site_t('involve_sponsor') }}
                        </a>
                        <a href="{{ route('fundraise') }}" class="flex items-center px-4 py-2 text-xs font-medium text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            {{ site_t('involve_fundraise') }}
                        </a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" 
                   class="whitespace-nowrap px-2 xl:px-2.5 py-1.5 transition relative {{ request()->routeIs('contact') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    {{ site_t('nav_contact') }}
                    @if(request()->routeIs('contact'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

            </nav>

            <!-- Action Donate CTA & Mobile Hamburger -->
            <div class="flex items-center space-x-2 shrink-0">
                <a href="{{ route('donate') }}" class="whitespace-nowrap inline-flex items-center justify-center space-x-1.5 px-3.5 xl:px-4 py-2 rounded-md text-white text-xs xl:text-sm font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-sm hover:shadow transition transform hover:-translate-y-0.5">
                    <svg class="w-3.5 h-3.5 fill-white" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span>{{ site_t('btn_donate') }} →</span>
                </a>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="lg:hidden p-2 rounded-md text-gray-700 hover:text-[#138A4B] hover:bg-gray-100 focus:outline-none" aria-label="Toggle navigation">
                    <svg class="w-6 h-6" x-show="!mobileMenuOpen" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                    <svg class="w-6 h-6" x-show="mobileMenuOpen" style="display: none;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden bg-white border-b border-gray-200 px-4 pt-3 pb-6 space-y-2 shadow-lg" 
         style="display: none;">
        
        <!-- Mobile Language Switcher -->
        <div class="flex items-center justify-between py-2 border-b border-gray-100 text-xs font-semibold">
            <span class="text-gray-500">{{ site_t('language_switcher_label') }}</span>
            <div class="flex items-center space-x-2">
                <a href="{{ route('locale.switch', 'mr') }}" class="px-2.5 py-1 rounded {{ $currLocale === 'mr' ? 'bg-[#F58220] text-white font-bold' : 'bg-gray-100 text-gray-700' }}">मराठी</a>
                <a href="{{ route('locale.switch', 'hi') }}" class="px-2.5 py-1 rounded {{ $currLocale === 'hi' ? 'bg-[#F58220] text-white font-bold' : 'bg-gray-100 text-gray-700' }}">हिंदी</a>
                <a href="{{ route('locale.switch', 'en') }}" class="px-2.5 py-1 rounded {{ $currLocale === 'en' ? 'bg-[#F58220] text-white font-bold' : 'bg-gray-100 text-gray-700' }}">English</a>
            </div>
        </div>

        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('home') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">{{ site_t('nav_home') }}</a>
        <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('about') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">{{ site_t('nav_about') }}</a>
        <a href="{{ route('our-work.index') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('our-work.*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">{{ site_t('nav_our_work') }}</a>
        <a href="{{ route('projects.index') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('projects.*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">{{ site_t('nav_projects') }}</a>
        <a href="{{ route('impact') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('impact') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">{{ site_t('nav_impact') }}</a>
        <a href="{{ route('stories.index') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('stories.*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">{{ site_t('nav_stories') }}</a>
        <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('gallery') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">{{ site_t('nav_gallery') }}</a>
        <a href="{{ route('reports') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('reports') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">{{ site_t('nav_reports') }}</a>
        <a href="{{ route('volunteer') }}" class="block px-3 py-2 rounded-md font-semibold text-gray-700 hover:bg-gray-50">{{ site_t('nav_get_involved') }}</a>
        <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('contact') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">{{ site_t('nav_contact') }}</a>

        <div class="pt-3 border-t border-gray-100 flex flex-col space-y-2">
            <a href="{{ route('donate') }}" class="w-full text-center py-2.5 rounded-md font-bold text-white bg-[#F58220] shadow">
                {{ site_t('btn_donate') }} →
            </a>
        </div>
    </div>
</header>
