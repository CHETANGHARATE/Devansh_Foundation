@php
    $phone = setting('contact_phone', '+91 98765 43210');
    $email = setting('contact_email', 'info@devanshfoundation.org');
    $address = setting('contact_address', 'Devansh Foundation, Nashik, Maharashtra, India - 4220xx');
    $fb = setting('social_facebook', 'https://facebook.com/devanshfoundation');
    $insta = setting('social_instagram', 'https://instagram.com/devanshfoundation');
    $yt = setting('social_youtube', 'https://youtube.com/@devanshfoundation');
    $li = setting('social_linkedin', 'https://linkedin.com/company/devanshfoundation');
@endphp

<footer class="bg-[#061A2B] text-gray-300 pt-14 pb-8 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 pb-10 border-b border-white/10">
            
            <!-- Column 1: Logo & Tagline (lg:col-span-3) -->
            <div class="lg:col-span-3 space-y-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <!-- White Emblem SVG -->
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <svg viewBox="0 0 100 100" class="w-12 h-12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 68 C 14 55, 22 42, 34 38 C 38 37, 43 40, 41 45 C 38 52, 36 60, 46 68 C 50 71, 50 76, 44 78 C 32 82, 22 78, 18 68 Z" fill="#FFFFFF"/>
                            <path d="M82 68 C 86 55, 78 42, 66 38 C 62 37, 57 40, 59 45 C 62 52, 64 60, 54 68 C 50 71, 50 76, 56 78 C 68 82, 78 78, 82 68 Z" fill="#FFFFFF"/>
                            <circle cx="50" cy="38" r="6" fill="#FFFFFF"/>
                            <path d="M42 56 C 42 47, 58 47, 58 56 Z" fill="#FFFFFF"/>
                            <circle cx="36" cy="32" r="5" fill="#FFFFFF"/>
                            <path d="M30 48 C 30 41, 42 41, 42 48 Z" fill="#FFFFFF"/>
                            <circle cx="64" cy="32" r="5" fill="#FFFFFF"/>
                            <path d="M58 48 C 58 41, 70 41, 70 48 Z" fill="#FFFFFF"/>
                            <circle cx="50" cy="20" r="3.5" fill="#FFFFFF"/>
                            <circle cx="38" cy="18" r="2.5" fill="#FFFFFF"/>
                            <circle cx="62" cy="18" r="2.5" fill="#FFFFFF"/>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl sm:text-2xl font-black tracking-tight text-white leading-none">
                            DEVANSH
                        </span>
                        <span class="text-xs sm:text-sm font-bold tracking-wider text-white leading-tight">
                            FOUNDATION
                        </span>
                        <span class="text-[10px] font-semibold text-gray-400 tracking-wide mt-0.5">
                            Together for a Better Tomorrow
                        </span>
                    </div>
                </a>
                <p class="text-xs text-gray-400 leading-relaxed pr-4">
                    {{ site_t('footer_about', [], 'देवांश फाउंडेशन ही नाशिक, महाराष्ट्र येथे कार्यरत असलेली सामाजिक संस्था असून ती शिक्षण, आरोग्य आणि ग्रामीण विकासासाठी समर्पित आहे.') }}
                </p>
                <div class="pt-1">
                    <a href="{{ route('admin.login') }}" class="inline-flex items-center space-x-1.5 text-[11px] text-gray-500 hover:text-gray-300 transition">
                        <i data-lucide="lock" class="w-3 h-3"></i>
                        <span>Admin Access</span>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links (lg:col-span-3) -->
            <div class="lg:col-span-3">
                <div class="text-sm font-bold text-white mb-4">
                    Quick Links
                </div>
                <div class="grid grid-cols-2 gap-x-4 gap-y-2 text-xs text-gray-300">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                    <a href="{{ route('impact') }}" class="hover:text-white transition">Impact</a>
                    <a href="{{ route('about') }}" class="hover:text-white transition">About Us</a>
                    <a href="{{ route('stories.index') }}" class="hover:text-white transition">Stories</a>
                    <a href="{{ route('our-work.index') }}" class="hover:text-white transition">Our Work</a>
                    <a href="{{ route('gallery') }}" class="hover:text-white transition">Gallery</a>
                    <a href="{{ route('projects.index') }}" class="hover:text-white transition">Projects</a>
                    <a href="{{ route('reports') }}" class="hover:text-white transition">Reports</a>
                    <a href="{{ route('volunteer') }}" class="hover:text-white transition">Get Involved</a>
                    <a href="{{ route('donate') }}" class="hover:text-[#F58220] transition font-semibold">Donate</a>
                    <a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a>
                    <a href="{{ route('about') }}#faq" class="hover:text-white transition">FAQ</a>
                </div>
            </div>

            <!-- Column 3: Contact Us (lg:col-span-3) -->
            <div class="lg:col-span-3 space-y-3">
                <div class="text-sm font-bold text-white mb-4">
                    Contact Us
                </div>
                <div class="space-y-2.5 text-xs text-gray-300">
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
            </div>

            <!-- Column 4: Follow Us & Legal (lg:col-span-3) -->
            <div class="lg:col-span-3 space-y-4">
                <div class="text-sm font-bold text-white mb-4">
                    Follow Us
                </div>
                <!-- Colorful Social Icons matching reference -->
                <div class="flex items-center space-x-2.5">
                    @if($fb)
                    <a href="{{ $fb }}" target="_blank" rel="noopener" aria-label="Facebook" class="w-7 h-7 rounded bg-[#1877F2] hover:opacity-90 flex items-center justify-center text-white transition">
                        <i data-lucide="facebook" class="w-4 h-4"></i>
                    </a>
                    @endif
                    @if($insta)
                    <a href="{{ $insta }}" target="_blank" rel="noopener" aria-label="Instagram" class="w-7 h-7 rounded bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] hover:opacity-90 flex items-center justify-center text-white transition">
                        <i data-lucide="instagram" class="w-4 h-4"></i>
                    </a>
                    @endif
                    @if($yt)
                    <a href="{{ $yt }}" target="_blank" rel="noopener" aria-label="YouTube" class="w-7 h-7 rounded bg-[#FF0000] hover:opacity-90 flex items-center justify-center text-white transition">
                        <i data-lucide="youtube" class="w-4 h-4"></i>
                    </a>
                    @endif
                    @if($li)
                    <a href="{{ $li }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="w-7 h-7 rounded bg-[#0A66C2] hover:opacity-90 flex items-center justify-center text-white transition">
                        <i data-lucide="linkedin" class="w-4 h-4"></i>
                    </a>
                    @endif
                </div>

                <div class="pt-2 flex flex-wrap gap-2 text-[11px] text-gray-400">
                    <a href="{{ route('privacy-policy') }}" class="hover:text-white transition">Privacy Policy</a>
                    <span>|</span>
                    <a href="{{ route('terms') }}" class="hover:text-white transition">Terms & Conditions</a>
                    <span>|</span>
                    <a href="{{ route('sitemap') }}" class="hover:text-white transition">Sitemap</a>
                </div>

                <div class="text-[11px] text-gray-400 pt-1">
                    © {{ date('Y') }} Devansh Foundation. All Rights Reserved.
                </div>
            </div>

        </div>
    </div>
</footer>
