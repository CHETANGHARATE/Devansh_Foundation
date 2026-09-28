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
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Devansh Foundation" class="h-14 w-auto object-contain rounded-full bg-white p-0.5 shadow">
                    <div class="flex flex-col">
                        <span class="text-xl sm:text-2xl font-black tracking-tight text-white leading-none">
                            {{ site_t('org_name_first') }}
                        </span>
                        <span class="text-xs sm:text-sm font-bold tracking-wider text-white leading-tight">
                            {{ site_t('org_name_second') }}
                        </span>
                        <span class="text-[10px] font-semibold text-gray-400 tracking-wide mt-0.5">
                            {{ site_t('tagline') }}
                        </span>
                    </div>
                </a>
                <p class="text-xs text-gray-400 leading-relaxed pr-4">
                    {{ site_t('footer_about') }}
                </p>
                <div class="pt-1">
                    <a href="{{ route('admin.login') }}" class="inline-flex items-center space-x-1.5 text-[11px] text-gray-500 hover:text-gray-300 transition">
                        <i data-lucide="lock" class="w-3 h-3"></i>
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
                    {{ site_t('follow_us') }}
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
