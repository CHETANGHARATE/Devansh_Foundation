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
                <svg class="w-3.5 h-3.5 text-[#2E9E58] fill-none stroke-current stroke-2 shrink-0" viewBox="0 0 24 24">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
                <span>{{ $phone }}</span>
            </a>
            <a href="mailto:{{ $email }}" class="flex items-center space-x-1.5 hover:text-white transition">
                <svg class="w-3.5 h-3.5 text-[#2E9E58] fill-none stroke-current stroke-2 shrink-0" viewBox="0 0 24 24">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
                <span>{{ $email }}</span>
            </a>
            <span class="flex items-center space-x-1.5 text-gray-300">
                <svg class="w-3.5 h-3.5 text-[#F58220] fill-none stroke-current stroke-2 shrink-0" viewBox="0 0 24 24">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
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

            <!-- Social links with solid colored backgrounds and verified visible inline SVGs -->
            <div class="flex items-center space-x-2 text-white">
                @if($fb)
                <a href="{{ $fb }}" target="_blank" rel="noopener" aria-label="Facebook" class="w-6 h-6 rounded bg-[#1877F2] hover:opacity-90 flex items-center justify-center transition shadow-sm">
                    <svg class="w-3.5 h-3.5 fill-white" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                @endif
                @if($insta)
                <a href="{{ $insta }}" target="_blank" rel="noopener" aria-label="Instagram" class="w-6 h-6 rounded bg-gradient-to-tr from-[#F58529] via-[#DD2A7B] to-[#8134AF] hover:opacity-90 flex items-center justify-center transition shadow-sm">
                    <svg class="w-3.5 h-3.5 fill-none stroke-white stroke-[2.2]" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="0.8" fill="white"/>
                    </svg>
                </a>
                @endif
                @if($yt)
                <a href="{{ $yt }}" target="_blank" rel="noopener" aria-label="YouTube" class="w-6 h-6 rounded bg-[#FF0000] hover:opacity-90 flex items-center justify-center transition shadow-sm">
                    <svg class="w-3.5 h-3.5 fill-white" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
                @endif
                @if($li)
                <a href="{{ $li }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="w-6 h-6 rounded bg-[#0A66C2] hover:opacity-90 flex items-center justify-center transition shadow-sm">
                    <svg class="w-3.5 h-3.5 fill-white" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                </a>
                @endif

                <!-- Search Icon -->
                <a href="{{ route('search') }}" aria-label="Search" class="w-6 h-6 flex items-center justify-center text-gray-300 hover:text-white transition">
                    <svg class="w-3.5 h-3.5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
