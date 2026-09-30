@php
    $phone = setting('contact_phone', '+91 98765 43210');
    $email = setting('contact_email', 'info@devanshfoundation.org');
    $address = setting('contact_address', site_t('top_location') . ' - 4220xx');
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
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group" aria-label="Devansh Foundation - Together for a Better Tomorrow">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="h-14 w-auto object-contain rounded-full bg-white p-0.5 shadow shrink-0">
                    <div class="flex flex-col text-left justify-center select-none shrink-0">
                        <svg viewBox="0 0 160 58" class="h-11 sm:h-12 w-auto select-none overflow-visible" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <text x="0" y="24" font-family="'Plus Jakarta Sans', system-ui, -apple-system, sans-serif" font-weight="900" font-size="28" fill="#FFFFFF" textLength="160" lengthAdjust="spacing">DEVANSH</text>
                            <text x="0" y="42" font-family="'Plus Jakarta Sans', system-ui, -apple-system, sans-serif" font-weight="800" font-size="14.5" fill="#22C55E" textLength="160" lengthAdjust="spacing">FOUNDATION</text>
                            <text x="0" y="56" font-family="'Plus Jakarta Sans', system-ui, -apple-system, sans-serif" font-weight="600" font-size="9.8" fill="#94A3B8" textLength="160" lengthAdjust="spacing">Together for a Better Tomorrow</text>
                        </svg>
                    </div>
                </a>
                <p class="text-xs text-gray-400 leading-relaxed pr-4">
                    {{ site_t('footer_about') }}
                </p>
                <div class="pt-1">
                    <a href="{{ route('admin.login') }}" class="inline-flex items-center space-x-1.5 text-[11px] text-gray-500 hover:text-gray-300 transition">
                        <svg class="w-3 h-3 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <span>{{ site_t('admin_access') }}</span>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links (lg:col-span-3) -->
            <div class="lg:col-span-3">
                <div class="text-sm font-bold text-white mb-4">
                    {{ site_t('quick_links') }}
                </div>
                <div class="grid grid-cols-2 gap-x-4 gap-y-2 text-xs text-gray-300">
                    <a href="{{ route('home') }}" class="hover:text-white transition">{{ site_t('nav_home') }}</a>
                    <a href="{{ route('impact') }}" class="hover:text-white transition">{{ site_t('nav_impact') }}</a>
                    <a href="{{ route('about') }}" class="hover:text-white transition">{{ site_t('nav_about') }}</a>
                    <a href="{{ route('stories.index') }}" class="hover:text-white transition">{{ site_t('nav_stories') }}</a>
                    <a href="{{ route('our-work.index') }}" class="hover:text-white transition">{{ site_t('nav_our_work') }}</a>
                    <a href="{{ route('gallery') }}" class="hover:text-white transition">{{ site_t('nav_gallery') }}</a>
                    <a href="{{ route('projects.index') }}" class="hover:text-white transition">{{ site_t('nav_projects') }}</a>
                    <a href="{{ route('reports') }}" class="hover:text-white transition">{{ site_t('nav_reports') }}</a>
                    <a href="{{ route('volunteer') }}" class="hover:text-white transition">{{ site_t('nav_get_involved') }}</a>
                    <a href="{{ route('donate') }}" class="hover:text-[#F58220] transition font-semibold">{{ site_t('btn_donate') }}</a>
                    <a href="{{ route('contact') }}" class="hover:text-white transition">{{ site_t('nav_contact') }}</a>
                    <a href="{{ route('about') }}#faq" class="hover:text-white transition">{{ site_t('faq') }}</a>
                </div>
            </div>

            <!-- Column 3: Contact Us (lg:col-span-3) -->
            <div class="lg:col-span-3 space-y-3">
                <div class="text-sm font-bold text-white mb-4">
                    {{ site_t('contact_us') }}
                </div>
                <div class="space-y-2.5 text-xs text-gray-300">
                    <div class="flex items-start space-x-2.5">
                        <svg class="w-4 h-4 text-[#F58220] fill-none stroke-current stroke-2 shrink-0 mt-0.5" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <span>{{ $address }}</span>
                    </div>
                    <div class="flex items-center space-x-2.5">
                        <svg class="w-4 h-4 text-[#2E9E58] fill-none stroke-current stroke-2 shrink-0" viewBox="0 0 24 24">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="hover:text-white transition">{{ $phone }}</a>
                    </div>
                    <div class="flex items-center space-x-2.5">
                        <svg class="w-4 h-4 text-[#2E9E58] fill-none stroke-current stroke-2 shrink-0" viewBox="0 0 24 24">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <a href="mailto:{{ $email }}" class="hover:text-white transition">{{ $email }}</a>
                    </div>
                </div>
            </div>

            <!-- Column 4: Follow Us & Legal (lg:col-span-3) -->
            <div class="lg:col-span-3 space-y-4">
                <div class="text-sm font-bold text-white mb-4">
                    {{ site_t('follow_us') }}
                </div>
                <!-- Colorful Social Icons with reliable inline SVGs -->
                <div class="flex items-center space-x-2.5">
                    @if($fb)
                    <a href="{{ $fb }}" target="_blank" rel="noopener" aria-label="Facebook" class="w-8 h-8 rounded-lg bg-[#1877F2] hover:opacity-90 flex items-center justify-center text-white transition shadow-sm hover:scale-105">
                        <svg class="w-4 h-4 fill-white" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    @endif
                    @if($insta)
                    <a href="{{ $insta }}" target="_blank" rel="noopener" aria-label="Instagram" class="w-8 h-8 rounded-lg bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] hover:opacity-90 flex items-center justify-center text-white transition shadow-sm hover:scale-105">
                        <svg class="w-4 h-4 fill-none stroke-white stroke-[2.2]" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.5" cy="6.5" r="0.8" fill="white"/>
                        </svg>
                    </a>
                    @endif
                    @if($yt)
                    <a href="{{ $yt }}" target="_blank" rel="noopener" aria-label="YouTube" class="w-8 h-8 rounded-lg bg-[#FF0000] hover:opacity-90 flex items-center justify-center text-white transition shadow-sm hover:scale-105">
                        <svg class="w-4 h-4 fill-white" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                    @endif
                    @if($li)
                    <a href="{{ $li }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="w-8 h-8 rounded-lg bg-[#0A66C2] hover:opacity-90 flex items-center justify-center text-white transition shadow-sm hover:scale-105">
                        <svg class="w-4 h-4 fill-white" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                    @endif
                </div>

                <div class="pt-2 flex flex-wrap gap-2 text-[11px] text-gray-400">
                    <a href="{{ route('privacy-policy') }}" class="hover:text-white transition">{{ site_t('privacy_policy') }}</a>
                    <span>|</span>
                    <a href="{{ route('terms') }}" class="hover:text-white transition">{{ site_t('terms_conditions') }}</a>
                    <span>|</span>
                    <a href="{{ route('sitemap') }}" class="hover:text-white transition">{{ site_t('sitemap') }}</a>
                </div>

                <div class="text-[11px] text-gray-400 pt-1">
                    {{ site_t('copyright', ['year' => date('Y')]) }}
                </div>
            </div>

        </div>
    </div>
</footer>
