@extends('layouts.app')

@php
    $trans = $focusArea->translation();
    $title = $trans?->title ?? $focusArea->slug;
    $desc = $trans?->description ?? $trans?->short_description;
    $icon = $focusArea->icon ?: 'heart';
    $img = $focusArea->image ?: 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1200&q=80';
@endphp

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#138A4B] text-white py-16 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/15 text-white mb-4">
                <a href="{{ route('our-work.index') }}" class="hover:underline">कार्यक्षेत्रे</a>
                <span>/</span>
                <span>{{ $title }}</span>
            </div>
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center text-emerald-300">
                    <i data-lucide="{{ $icon }}" class="w-8 h-8"></i>
                </div>
                <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight">
                    {{ $title }}
                </h1>
            </div>
            <p class="text-lg text-gray-100 leading-relaxed">
                {{ $trans?->short_description }}
            </p>
        </div>
    </div>
</section>

<!-- Focus Area Details & Projects -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Main Content -->
            <div class="lg:col-span-8 space-y-8">
                <div class="rounded-3xl overflow-hidden aspect-[16/9] shadow-md">
                    <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-full object-cover">
                </div>

                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-[#073B63]">उद्दिष्ट आणि कार्यपद्धती / Overview & Strategy</h2>
                    <p class="text-gray-600 text-base leading-relaxed">
                        {{ $desc }}
                    </p>
                </div>

                <!-- Projects under this Focus Area -->
                <div class="pt-8 border-t border-gray-100">
                    <h2 class="text-2xl font-bold text-[#073B63] mb-6">या कार्यक्षेत्रातील प्रकल्प / Related Projects</h2>
                    @if($projects->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach($projects as $proj)
                                <x-project-card :project="$proj" />
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-2xl p-8 text-center text-gray-500">
                            सध्या या क्षेत्रातील नवीन प्रकल्प नियोजित आहेत. लवकरच अपडेट केले जातील.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Donation Box -->
                <div class="bg-[#EAF7EF] rounded-3xl p-6 border border-[#138A4B]/20 shadow-sm text-center space-y-4">
                    <div class="w-12 h-12 rounded-full bg-[#138A4B] text-white flex items-center justify-center mx-auto">
                        <i data-lucide="heart" class="w-6 h-6 fill-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-[#073B63]">या कार्याला सहाय्य करा</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        तुमची छोटीशी देणगी या उपक्रमातील गरजू लाभार्थ्यांपर्यंत पोहोचण्यास थेट मदत करते.
                    </p>
                    <a href="{{ route('donate') }}" class="w-full block py-3 rounded-xl bg-[#F58220] hover:bg-[#DC6F13] text-white font-bold text-sm shadow-md transition">
                        देणगी द्या / Support Cause
                    </a>
                </div>

                <!-- Quick Volunteer CTA -->
                <div class="bg-[#EEF6FB] rounded-3xl p-6 border border-[#073B63]/20 shadow-sm text-center space-y-4">
                    <h3 class="text-lg font-bold text-[#073B63]">स्वयंसेवक म्हणून सामील व्हा</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        या कार्यक्षेत्रात काम करण्यासाठी तुमचा वेळ आणि कौशल्य समाजासाठी द्या.
                    </p>
                    <a href="{{ route('volunteer') }}" class="w-full block py-2.5 rounded-xl border-2 border-[#073B63] text-[#073B63] hover:bg-[#073B63] hover:text-white font-bold text-sm transition">
                        स्वयंसेवक अर्ज
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
