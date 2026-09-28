@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-2xl">
            <h1 class="text-3xl sm:text-4xl font-black tracking-tight leading-tight mb-4">
                शोध निकाल / Search Results
            </h1>
            <form action="{{ route('search') }}" method="GET" class="relative">
                <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="{{ site_t('search_placeholder', [], 'प्रकल्प, कथा, बातम्या शोधा...') }}" class="w-full pl-5 pr-14 py-3.5 rounded-2xl bg-white text-gray-900 text-sm font-semibold focus:outline-none shadow-lg">
                <button type="submit" class="absolute right-2 top-2 p-2 bg-[#138A4B] text-white rounded-xl hover:bg-[#0e6b3a] transition">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Search Results -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        @if(empty($q))
            <div class="bg-white rounded-3xl p-12 text-center text-gray-500 max-w-md mx-auto shadow-sm">
                कृपया शोधण्यासाठी शब्द किंवा प्रकल्प नाव प्रविष्ट करा.
            </div>
        @else
            <!-- Projects Found -->
            @if($projects->count() > 0)
                <div class="space-y-4">
                    <h2 class="text-xl font-bold text-[#073B63] flex items-center space-x-2">
                        <i data-lucide="folder" class="w-5 h-5 text-[#138A4B]"></i>
                        <span>सापडलेले प्रकल्प ({{ $projects->count() }})</span>
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($projects as $p)
                            <x-project-card :project="$p" />
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Stories Found -->
            @if($stories->count() > 0)
                <div class="space-y-4">
                    <h2 class="text-xl font-bold text-[#073B63] flex items-center space-x-2">
                        <i data-lucide="heart" class="w-5 h-5 text-[#F58220]"></i>
                        <span>सापडलेल्या यशोगाथा ({{ $stories->count() }})</span>
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($stories as $s)
                            <x-story-card :story="$s" />
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- News Found -->
            @if($news->count() > 0)
                <div class="space-y-4">
                    <h2 class="text-xl font-bold text-[#073B63] flex items-center space-x-2">
                        <i data-lucide="newspaper" class="w-5 h-5 text-[#073B63]"></i>
                        <span>बातम्या व अपडेट्स ({{ $news->count() }})</span>
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($news as $n)
                            <x-news-card :article="$n" />
                        @endforeach
                    </div>
                </div>
            @endif

            @if($projects->count() == 0 && $stories->count() == 0 && $news->count() == 0)
                <div class="bg-white rounded-3xl p-12 text-center text-gray-500 max-w-md mx-auto shadow-sm space-y-3">
                    <i data-lucide="search-x" class="w-12 h-12 text-gray-300 mx-auto"></i>
                    <h3 class="text-lg font-bold text-gray-700">"{{ $q }}" साठी कोणतेही निकाल सापडले नाहीत.</h3>
                    <p class="text-xs text-gray-400">कृपया वेगळे शब्द किंवा स्पेलिंग तपासून पुन्हा शोधा.</p>
                </div>
            @endif
        @endif
    </div>
</section>

@endsection
