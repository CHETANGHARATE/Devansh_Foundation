@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#138A4B] text-white py-16 sm:py-20 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/15 text-white mb-4">
                <span>सामाजिक प्रभाव / Social Impact</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('impact_heading', [], 'आपला सामाजिक प्रभाव') }}
            </h1>
            <p class="text-lg text-emerald-50 leading-relaxed">
                {{ site_t('impact_subheading', [], 'पारदर्शक कार्यपद्धती आणि लोकांच्या विश्वासावर आधारलेला वास्तविक बदल') }}
            </p>
        </div>
    </div>
</section>

<!-- Impact Numbers Counters -->
<section class="py-16 bg-[#073B63] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($impactStats as $stat)
                <x-impact-counter :stat="$stat" />
            @endforeach
        </div>
    </div>
</section>

<!-- Impact Highlights by Focus Area -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading 
            badge="क्षेत्रनिहाय प्रभाव"
            title="विविध क्षेत्रांमधील मोजता येणारा बदल"
            subtitle="प्रत्येक उपक्रमात आम्ही पारदर्शकपणे नोंदवलेली माहिती आणि लाभार्थ्यांचे प्रत्यक्ष अनुभव."
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($focusAreas as $area)
                @php
                    $trans = $area->translation();
                @endphp
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 space-y-4 hover:border-[#138A4B]/40 transition">
                    <div class="w-12 h-12 rounded-xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center">
                        <i data-lucide="{{ $area->icon }}" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#073B63]">{{ $trans?->title }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $trans?->short_description }}</p>
                    <div class="pt-2 text-xs font-semibold text-[#138A4B]">
                        {{ $area->projects->count() }} सक्रिय उपक्रम / Projects
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Impact Stories -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading 
            badge="यशोगाथा"
            title="प्रत्यक्ष जीवनात घडलेले बदल"
            subtitle="संख्यांच्या पलीकडे जाऊन प्रत्येक व्यक्तीच्या आयुष्यात आलेला स्वाभिमान आणि आनंद."
            badgeColor="orange"
        />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($stories as $story)
                <x-story-card :story="$story" />
            @endforeach
        </div>
    </div>
</section>

@endsection
