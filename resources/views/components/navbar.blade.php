@php
    $currLocale = current_locale();
@endphp

<header x-data="{ mobileMenuOpen: false, getInvolvedOpen: false }" class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-100 transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-[76px]">
            <!-- Brand Logo closely matching reference -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group py-1">
                <!-- Authentic NGO Emblem SVG -->
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <svg viewBox="0 0 100 100" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Cupped Hands in Vibrant Blue -->
                        <path d="M18 68 C 14 55, 22 42, 34 38 C 38 37, 43 40, 41 45 C 38 52, 36 60, 46 68 C 50 71, 50 76, 44 78 C 32 82, 22 78, 18 68 Z" fill="#0B4F8C"/>
                        <path d="M82 68 C 86 55, 78 42, 66 38 C 62 37, 57 40, 59 45 C 62 52, 64 60, 54 68 C 50 71, 50 76, 56 78 C 68 82, 78 78, 82 68 Z" fill="#0B4F8C"/>
                        
                        <!-- Family figures in Orange and Green -->
                        <!-- Child center (Orange) -->
                        <circle cx="50" cy="38" r="6" fill="#F58220"/>
                        <path d="M42 56 C 42 47, 58 47, 58 56 Z" fill="#F58220"/>
                        
                        <!-- Figure Left (Green) -->
                        <circle cx="36" cy="32" r="5" fill="#138A4B"/>
                        <path d="M30 48 C 30 41, 42 41, 42 48 Z" fill="#138A4B"/>
                        
                        <!-- Figure Right (Orange/Yellow) -->
                        <circle cx="64" cy="32" r="5" fill="#F58220"/>
                        <path d="M58 48 C 58 41, 70 41, 70 48 Z" fill="#F58220"/>
                        
                        <!-- Sun / Hope Rays above -->
                        <circle cx="50" cy="20" r="3.5" fill="#F58220"/>
                        <circle cx="38" cy="18" r="2.5" fill="#138A4B"/>
                        <circle cx="62" cy="18" r="2.5" fill="#138A4B"/>
                    </svg>
                </div>
                
                <div class="flex flex-col">
                    <span class="text-xl sm:text-2xl font-black tracking-tight text-[#073B63] leading-none">
                        DEVANSH
                    </span>
                    <span class="text-sm sm:text-base font-bold tracking-wider text-[#073B63] leading-tight">
                        FOUNDATION
                    </span>
                    <span class="text-[10px] sm:text-[11px] font-semibold tracking-wide text-[#138A4B] leading-none mt-0.5">
                        Together for a Better Tomorrow
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation Menu -->
            <nav class="hidden lg:flex items-center space-x-1 xl:space-x-3 text-[13.5px] font-semibold text-[#17324D]">
                <a href="{{ route('home') }}" class="px-2.5 py-2 transition relative {{ request()->routeIs('home') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    Home
                    @if(request()->routeIs('home'))
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>
                <a href="{{ route('about') }}" class="px-2.5 py-2 transition relative {{ request()->routeIs('about') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    About Us
                    @if(request()->routeIs('about'))
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>
                <a href="{{ route('our-work.index') }}" class="px-2.5 py-2 transition relative {{ request()->routeIs('our-work.*') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    Our Work
                    @if(request()->routeIs('our-work.*'))
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>
                <a href="{{ route('projects.index') }}" class="px-2.5 py-2 transition relative {{ request()->routeIs('projects.*') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    Projects
                    @if(request()->routeIs('projects.*'))
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>
                <a href="{{ route('impact') }}" class="px-2.5 py-2 transition relative {{ request()->routeIs('impact') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    Impact
                    @if(request()->routeIs('impact'))
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>
                <a href="{{ route('stories.index') }}" class="px-2.5 py-2 transition relative {{ request()->routeIs('stories.*') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    Stories
                    @if(request()->routeIs('stories.*'))
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>
                <a href="{{ route('gallery') }}" class="px-2.5 py-2 transition relative {{ request()->routeIs('gallery') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    Gallery
                    @if(request()->routeIs('gallery'))
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>
                <a href="{{ route('reports') }}" class="px-2.5 py-2 transition relative {{ request()->routeIs('reports') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    Reports
                    @if(request()->routeIs('reports'))
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>

                <!-- Get Involved Link / Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                    <button @click="open = !open" @mouseover="open = true" class="flex items-center space-x-1 px-2.5 py-2 transition {{ request()->routeIs('get-involved*') || request()->routeIs('volunteer') || request()->routeIs('partner') || request()->routeIs('csr') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                        <span>Get Involved</span>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
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
                            <i data-lucide="heart-handshake" class="w-3.5 h-3.5 mr-2 text-[#138A4B]"></i>
                            Volunteer
                        </a>
                        <a href="{{ route('partner') }}" class="flex items-center px-4 py-2 text-xs font-medium text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            <i data-lucide="users" class="w-3.5 h-3.5 mr-2 text-[#073B63]"></i>
                            Partner With Us
                        </a>
                        <a href="{{ route('csr') }}" class="flex items-center px-4 py-2 text-xs font-medium text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            <i data-lucide="briefcase" class="w-3.5 h-3.5 mr-2 text-[#F58220]"></i>
                            CSR Partnership
                        </a>
                        <a href="{{ route('sponsor') }}" class="flex items-center px-4 py-2 text-xs font-medium text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            <i data-lucide="gift" class="w-3.5 h-3.5 mr-2 text-[#2E9E58]"></i>
                            Sponsor a Project
                        </a>
                        <a href="{{ route('fundraise') }}" class="flex items-center px-4 py-2 text-xs font-medium text-gray-700 hover:bg-[#EAF7EF] hover:text-[#138A4B]">
                            <i data-lucide="trending-up" class="w-3.5 h-3.5 mr-2 text-[#073B63]"></i>
                            Fundraise With Us
                        </a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="px-2.5 py-2 transition relative {{ request()->routeIs('contact') ? 'text-[#138A4B] font-bold' : 'hover:text-[#138A4B]' }}">
                    Contact
                    @if(request()->routeIs('contact'))
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-[2.5px] bg-[#138A4B] rounded-full"></span>
                    @endif
                </a>
            </nav>

            <!-- Action Donate CTA & Mobile Hamburger -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('donate') }}" class="inline-flex items-center justify-center space-x-1.5 px-4 sm:px-5 py-2.5 rounded-md text-white text-xs sm:text-sm font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-sm hover:shadow transition transform hover:-translate-y-0.5">
                    <i data-lucide="heart" class="w-3.5 h-3.5 fill-white"></i>
                    <span>Donate Now →</span>
                </a>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="lg:hidden p-2 rounded-md text-gray-700 hover:text-[#138A4B] hover:bg-gray-100 focus:outline-none" aria-label="Toggle navigation">
                    <i data-lucide="menu" class="w-6 h-6" x-show="!mobileMenuOpen"></i>
                    <i data-lucide="x" class="w-6 h-6" x-show="mobileMenuOpen" style="display: none;"></i>
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
            <span class="text-gray-500">Language / भाषा:</span>
            <div class="flex items-center space-x-2">
                <a href="{{ route('locale.switch', 'mr') }}" class="px-2.5 py-1 rounded {{ $currLocale === 'mr' ? 'bg-[#F58220] text-white font-bold' : 'bg-gray-100 text-gray-700' }}">मराठी</a>
                <a href="{{ route('locale.switch', 'hi') }}" class="px-2.5 py-1 rounded {{ $currLocale === 'hi' ? 'bg-[#F58220] text-white font-bold' : 'bg-gray-100 text-gray-700' }}">हिंदी</a>
                <a href="{{ route('locale.switch', 'en') }}" class="px-2.5 py-1 rounded {{ $currLocale === 'en' ? 'bg-[#F58220] text-white font-bold' : 'bg-gray-100 text-gray-700' }}">English</a>
            </div>
        </div>

        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('home') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">Home</a>
        <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('about') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">About Us</a>
        <a href="{{ route('our-work.index') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('our-work.*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">Our Work</a>
        <a href="{{ route('projects.index') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('projects.*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">Projects</a>
        <a href="{{ route('impact') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('impact') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">Impact</a>
        <a href="{{ route('stories.index') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('stories.*') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">Stories</a>
        <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('gallery') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">Gallery</a>
        <a href="{{ route('reports') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('reports') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">Reports</a>
        <a href="{{ route('volunteer') }}" class="block px-3 py-2 rounded-md font-semibold text-gray-700 hover:bg-gray-50">Get Involved</a>
        <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md font-semibold {{ request()->routeIs('contact') ? 'bg-[#EAF7EF] text-[#138A4B]' : 'text-gray-700 hover:bg-gray-50' }}">Contact</a>

        <div class="pt-3 border-t border-gray-100 flex flex-col space-y-2">
            <a href="{{ route('donate') }}" class="w-full text-center py-2.5 rounded-md font-bold text-white bg-[#F58220] shadow">
                Donate Now →
            </a>
        </div>
    </div>
</header>
