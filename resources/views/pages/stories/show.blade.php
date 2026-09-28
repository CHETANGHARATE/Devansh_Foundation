@extends('layouts.app')

@php
    $trans = $story->translation();
    $title = $trans?->title ?? $story->person_name;
    $quote = $trans?->quote;
    $narrative = $trans?->story;
    $challenge = $trans?->challenge;
    $support = $trans?->support_received;
    $outcome = $trans?->outcome;
    $img = $story->image ?: 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1000&q=80';
@endphp

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <a href="{{ route('stories.index') }}" class="hover:underline">यशोगाथा</a>
                <span>/</span>
                <span>{{ $story->person_name }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-2">
                {{ $title }}
            </h1>
            <p class="text-emerald-300 font-semibold text-sm">
                {{ $story->person_name }} {{ $story->person_role_or_location ? '• ' . $story->person_role_or_location : '' }}
            </p>
        </div>
    </div>
</section>

<!-- Story Details -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <div class="lg:col-span-8 space-y-8">
                <!-- Person Portrait & Quote -->
                <div class="bg-gradient-to-br from-[#EEF6FB] to-white rounded-3xl p-8 border border-gray-100 shadow-sm flex flex-col sm:flex-row items-center gap-6">
                    <img src="{{ $img }}" alt="{{ $story->person_name }}" class="w-32 h-32 rounded-2xl object-cover ring-4 ring-white shadow-md shrink-0">
                    <div class="space-y-2 text-center sm:text-left">
                        <div class="text-xl font-bold text-[#073B63]">{{ $story->person_name }}</div>
                        @if($quote)
                            <p class="text-gray-700 italic text-base font-medium">
                                “{{ $quote }}”
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Full Story Narrative -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-[#073B63]">सविस्तर अनुभव / Full Journey</h2>
                    <div class="prose text-gray-700 text-base leading-relaxed space-y-4">
                        <p>{{ $narrative }}</p>
                    </div>
                </div>

                <!-- Structured Highlights: Challenge, Support, Outcome -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4">
                    @if($challenge)
                        <div class="bg-red-50 p-5 rounded-2xl border border-red-100">
                            <div class="text-xs font-bold uppercase text-red-700 mb-1 flex items-center">
                                <i data-lucide="alert-circle" class="w-3.5 h-3.5 mr-1"></i>
                                <span>समोरील अडचण</span>
                            </div>
                            <p class="text-xs text-gray-700 leading-relaxed">{{ $challenge }}</p>
                        </div>
                    @endif

                    @if($support)
                        <div class="bg-[#EEF6FB] p-5 rounded-2xl border border-[#073B63]/15">
                            <div class="text-xs font-bold uppercase text-[#073B63] mb-1 flex items-center">
                                <i data-lucide="heart" class="w-3.5 h-3.5 mr-1 text-[#138A4B]"></i>
                                <span>फाउंडेशनचे सहाय्य</span>
                            </div>
                            <p class="text-xs text-gray-700 leading-relaxed">{{ $support }}</p>
                        </div>
                    @endif

                    @if($outcome)
                        <div class="bg-[#EAF7EF] p-5 rounded-2xl border border-[#138A4B]/20">
                            <div class="text-xs font-bold uppercase text-[#138A4B] mb-1 flex items-center">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 mr-1"></i>
                                <span>सकारात्मक निष्पत्ती</span>
                            </div>
                            <p class="text-xs text-gray-700 leading-relaxed">{{ $outcome }}</p>
                        </div>
                    @endif
                </div>

            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 space-y-6">
                @if($story->project)
                    <div class="bg-white rounded-3xl p-6 border border-gray-200 shadow-sm space-y-3">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">संबंधित उपक्रम</span>
                        <h4 class="text-lg font-bold text-[#073B63]">{{ $story->project->translation()?->title }}</h4>
                        <p class="text-xs text-gray-600 line-clamp-3">{{ $story->project->translation()?->short_description }}</p>
                        <a href="{{ route('projects.show', $story->project->slug) }}" class="inline-flex items-center text-xs font-bold text-[#138A4B] hover:underline">
                            <span>प्रकल्प सविस्तर पहा</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                        </a>
                    </div>
                @endif

                <div class="bg-[#EAF7EF] rounded-3xl p-6 border border-[#138A4B]/20 shadow-sm text-center space-y-3">
                    <h4 class="text-lg font-bold text-[#073B63]">अशा अनेक स्वप्नांना बळ द्या</h4>
                    <p class="text-xs text-gray-600">तुमच्या एका देणगीमुळे आणखी एका गरजू बालकाचे किंवा भगिनीचे आयुष्य बदलू शकते.</p>
                    <a href="{{ route('donate') }}" class="w-full block py-3 rounded-xl bg-[#F58220] hover:bg-[#DC6F13] text-white font-bold text-sm shadow-md transition">
                        आताच देणगी द्या
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
