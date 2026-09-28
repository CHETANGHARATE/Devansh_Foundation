@php
    $currLocale = current_locale();
    $pageTitle = $title ?? setting("meta_title_{$currLocale}", 'देवांश फाउंडेशन - ' . site_t('tagline', [], 'Together for a Better Tomorrow'));
    $pageDesc = $description ?? setting("meta_desc_{$currLocale}", 'Devansh Foundation is an NGO committed to creating sustainable community change through education, healthcare, child welfare, and rural development in Maharashtra, India.');
    $siteName = setting("site_name_{$currLocale}", 'देवांश फाउंडेशन');
@endphp
<!DOCTYPE html>
<html lang="{{ $currLocale }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDesc }}">

    <!-- Multilingual Hreflang Alternates -->
    <link rel="alternate" hreflang="mr" href="{{ url()->current() }}?lang=mr" />
    <link rel="alternate" hreflang="hi" href="{{ url()->current() }}?lang=hi" />
    <link rel="alternate" hreflang="en" href="{{ url()->current() }}?lang=en" />
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDesc }}">
    <meta property="og:image" content="{{ asset('images/og-share.jpg') }}">
    <meta property="og:site_name" content="{{ $siteName }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDesc }}">

    <!-- Google Fonts: Plus Jakarta Sans, Caveat (for handwritten quotes), Noto Sans Devanagari -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Noto+Sans+Devanagari:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Schema.org NGO Organization JSON-LD -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "NGO",
      "name": "Devansh Foundation",
      "alternateName": "देवांश फाउंडेशन",
      "url": "{{ url('/') }}",
      "logo": "{{ url('/') }}/logo.svg",
      "tagline": "Together for a Better Tomorrow",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Nashik",
        "addressRegion": "Maharashtra",
        "addressCountry": "India"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+91-98765-43210",
        "contactType": "Customer Service",
        "availableLanguage": ["Marathi", "Hindi", "English"]
      }
    }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="flex flex-col min-h-screen bg-white text-[#17324D] antialiased selection:bg-[#138A4B] selection:text-white">
    <!-- Top Information Bar -->
    <x-topbar />

    <!-- Sticky Navigation Header -->
    <x-navbar />

    <!-- Flash notifications -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" class="bg-[#138A4B] text-white px-4 py-3 shadow-md transition-all">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-white"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-white/80 hover:text-white"><i data-lucide="x" class="w-4 h-4"></i></button>
            </div>
        </div>
    @endif

    @if(session('error') || $errors->any())
        <div x-data="{ show: true }" x-show="show" class="bg-red-600 text-white px-4 py-3 shadow-md transition-all">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i data-lucide="alert-triangle" class="w-5 h-5 text-white"></i>
                    <span class="text-sm font-medium">
                        {{ session('error') ?? ($errors->first() ?: 'Please check the form for errors.') }}
                    </span>
                </div>
                <button @click="show = false" class="text-white/80 hover:text-white"><i data-lucide="x" class="w-4 h-4"></i></button>
            </div>
        </div>
    @endif

    <!-- Main Content Area -->
    <main class="flex-grow">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <!-- Master NGO Footer -->
    <x-footer />

    @stack('scripts')
</body>
</html>
