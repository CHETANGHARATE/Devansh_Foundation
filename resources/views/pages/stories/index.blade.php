@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-16 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <span>यशोगाथा / Stories of Hope</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('stories_heading', [], 'यशोगाथा व अनुभव') }}
            </h1>
            <p class="text-lg text-gray-200 leading-relaxed">
                {{ site_t('stories_subheading', [], 'देवांश फाउंडेशनच्या उपक्रमांमुळे ज्यांच्या आयुष्यात नवी पहाट उगवली अशा व्यक्तींच्या प्रेरक गोष्टी') }}
            </p>
        </div>
    </div>
</section>

<!-- Stories Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($stories as $story)
                <x-story-card :story="$story" />
            @endforeach
        </div>

        <div class="mt-12">
            {{ $stories->links() }}
        </div>
    </div>
</section>

@endsection
