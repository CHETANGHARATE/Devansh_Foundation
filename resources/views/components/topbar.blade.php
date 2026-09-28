@php
    $phone = setting('contact_phone', '+91 98765 43210');
    $email = setting('contact_email', 'info@devanshfoundation.org');
    $location = setting('contact_address', 'Nashik, Maharashtra, India');
    $fb = setting('social_facebook', 'https://facebook.com/devanshfoundation');
    $insta = setting('social_instagram', 'https://instagram.com/devanshfoundation');
    $yt = setting('social_youtube', 'https://youtube.com/@devanshfoundation');
    $li = setting('social_linkedin', 'https://linkedin.com/company/devanshfoundation');
    $currLocale = current_locale();
@endphp

<div class="bg-[#061A2B] text-white text-xs py-2 px-4 border-b border-white/10 hidden md:block">
    <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
        <!-- Contact & Location Info -->
        <div class="flex items-center space-x-6 text-gray-200">
            <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="flex items-center space-x-1.5 hover:text-white transition">
                <i data-lucide="phone" class="w-3.5 h-3.5 text-[#2E9E58]"></i>
                <span>{{ $phone }}</span>
            </a>
            <a href="mailto:{{ $email }}" class="flex items-center space-x-1.5 hover:text-white transition">
                <i data-lucide="mail" class="w-3.5 h-3.5 text-[#2E9E58]"></i>
                <span>{{ $email }}</span>
            </a>
            <span class="flex items-center space-x-1.5 text-gray-300">
                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-[#F58220]"></i>
                <span>{{ $location }}</span>
            </span>
        </div>

        <!-- Language Switcher & Social Links -->
        <div class="flex items-center space-x-4">
            <!-- Language switcher -->
            <div class="flex items-center space-x-1.5 text-xs">
                <a href="{{ route('locale.switch', 'mr') }}" 
                   class="px-2.5 py-0.5 rounded transition font-medium {{ $currLocale === 'mr' ? 'bg-[#F58220] text-white font-bold shadow-sm' : 'border border-white/20 text-gray-200 hover:text-white hover:border-white/40' }}">
                   मराठी
                </a>
                <a href="{{ route('locale.switch', 'hi') }}" 
                   class="px-2.5 py-0.5 rounded transition font-medium {{ $currLocale === 'hi' ? 'bg-[#F58220] text-white font-bold shadow-sm' : 'border border-white/20 text-gray-200 hover:text-white hover:border-white/40' }}">
                   हिंदी
                </a>
                <a href="{{ route('locale.switch', 'en') }}" 
                   class="px-2.5 py-0.5 rounded transition font-medium {{ $currLocale === 'en' ? 'bg-[#F58220] text-white font-bold shadow-sm' : 'border border-white/20 text-gray-200 hover:text-white hover:border-white/40' }}">
                   English
                </a>
            </div>

            <!-- Social links with solid colored backgrounds matching reference -->
            <div class="flex items-center space-x-2 text-white">
                @if($fb)
                <a href="{{ $fb }}" target="_blank" rel="noopener" aria-label="Facebook" class="w-6 h-6 rounded bg-[#1877F2] hover:opacity-90 flex items-center justify-center transition">
                    <i data-lucide="facebook" class="w-3.5 h-3.5"></i>
                </a>
                @endif
                @if($insta)
                <a href="{{ $insta }}" target="_blank" rel="noopener" aria-label="Instagram" class="w-6 h-6 rounded bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] hover:opacity-90 flex items-center justify-center transition">
                    <i data-lucide="instagram" class="w-3.5 h-3.5"></i>
                </a>
                @endif
                @if($yt)
                <a href="{{ $yt }}" target="_blank" rel="noopener" aria-label="YouTube" class="w-6 h-6 rounded bg-[#FF0000] hover:opacity-90 flex items-center justify-center transition">
                    <i data-lucide="youtube" class="w-3.5 h-3.5"></i>
                </a>
                @endif
                @if($li)
                <a href="{{ $li }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="w-6 h-6 rounded bg-[#0A66C2] hover:opacity-90 flex items-center justify-center transition">
                    <i data-lucide="linkedin" class="w-3.5 h-3.5"></i>
                </a>
                @endif

                <!-- Search Icon -->
                <a href="{{ route('search') }}" aria-label="Search" class="w-6 h-6 flex items-center justify-center text-gray-300 hover:text-white transition">
                    <i data-lucide="search" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>
    </div>
</div>
