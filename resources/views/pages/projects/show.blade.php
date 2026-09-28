@extends('layouts.app')

@php
    $trans = $project->translation();
    $title = $trans?->title ?? $project->slug;
    $desc = $trans?->description ?? $trans?->short_description;
    $problem = $trans?->problem_statement;
    $solution = $trans?->solution;
    $activities = $trans?->activities;
    $impact = $trans?->impact_text;
    $areaTrans = $project->focusArea?->translation();
    $areaTitle = $areaTrans?->title ?? 'Social Initiative';
    
    $target = (float) $project->target_amount;
    $raised = (float) $project->raised_amount;
    $pct = $target > 0 ? min(100, round(($raised / $target) * 100)) : 0;
    
    $img = $project->featured_image ?: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80';
@endphp

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <a href="{{ route('projects.index') }}" class="hover:underline">{{ site_t('nav_projects') }}</a>
                <span>/</span>
                <span>{{ $areaTitle }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ $title }}
            </h1>
            
            <div class="flex flex-wrap items-center gap-4 text-xs sm:text-sm text-gray-300 pt-2">
                @if($project->location)
                    <span class="flex items-center space-x-1.5"><i data-lucide="map-pin" class="w-4 h-4 text-[#F58220]"></i><span>{{ $project->location }}</span></span>
                @endif
                @if($project->beneficiaries_count)
                    <span class="flex items-center space-x-1.5 text-emerald-300 font-semibold"><i data-lucide="users" class="w-4 h-4"></i><span>{{ $project->beneficiaries_count }}</span></span>
                @endif
                <span class="flex items-center space-x-1.5"><i data-lucide="check-circle" class="w-4 h-4 text-[#2E9E58]"></i><span class="capitalize">{{ site_t("status_{$project->status}") }}</span></span>
            </div>
        </div>
    </div>
</section>

<!-- Project Body -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left 8 Columns: Details -->
            <div class="lg:col-span-8 space-y-10">
                
                <!-- Main Image -->
                <div class="rounded-3xl overflow-hidden shadow-md aspect-[16/9] bg-gray-100">
                    <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-full object-cover">
                </div>

                <!-- Description -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-[#073B63]">{{ site_t('project_details') }}</h2>
                    <div class="prose text-gray-600 text-base leading-relaxed space-y-4">
                        <p>{{ $desc }}</p>
                    </div>
                </div>

                <!-- Problem & Solution 2-column comparison -->
                @if($problem || $solution)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                        @if($problem)
                            <div class="bg-red-50/60 rounded-2xl p-6 border border-red-100 space-y-3">
                                <div class="flex items-center space-x-2 text-red-700 font-bold text-sm uppercase">
                                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                                    <span>{{ site_t('project_challenge') }}</span>
                                </div>
                                <p class="text-sm text-gray-700 leading-relaxed">{{ $problem }}</p>
                            </div>
                        @endif

                        @if($solution)
                            <div class="bg-[#EAF7EF] rounded-2xl p-6 border border-[#138A4B]/20 space-y-3">
                                <div class="flex items-center space-x-2 text-[#138A4B] font-bold text-sm uppercase">
                                    <i data-lucide="lightbulb" class="w-4 h-4"></i>
                                    <span>{{ site_t('project_solution') }}</span>
                                </div>
                                <p class="text-sm text-gray-700 leading-relaxed">{{ $solution }}</p>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Activities -->
                @if($activities)
                    <div class="space-y-3">
                        <h3 class="text-xl font-bold text-[#073B63] flex items-center space-x-2">
                            <i data-lucide="check-square" class="w-5 h-5 text-[#138A4B]"></i>
                            <span>{{ site_t('project_activities') }}</span>
                        </h3>
                        <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 text-sm text-gray-700 leading-relaxed">
                            {{ $activities }}
                        </div>
                    </div>
                @endif

                <!-- Impact -->
                @if($impact)
                    <div class="space-y-3">
                        <h3 class="text-xl font-bold text-[#073B63] flex items-center space-x-2">
                            <i data-lucide="trending-up" class="w-5 h-5 text-[#2E9E58]"></i>
                            <span>{{ site_t('project_impact') }}</span>
                        </h3>
                        <div class="bg-[#EEF6FB] rounded-2xl p-6 border border-[#073B63]/10 text-sm text-gray-800 leading-relaxed font-medium">
                            {{ $impact }}
                        </div>
                    </div>
                @endif

            </div>

            <!-- Right 4 Columns: Donation & Project Action Sidebar -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Donation Widget -->
                <div class="bg-white rounded-3xl p-6 border border-gray-200 shadow-md space-y-5">
                    <div class="text-center space-y-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#EAF7EF] text-[#138A4B]">
                            {{ site_t('hero_badge') }}
                        </span>
                        <h3 class="text-xl font-extrabold text-[#073B63]">{{ site_t('donate_heading') }}</h3>
                    </div>

                    @if($target > 0)
                        <div class="bg-gray-50 rounded-2xl p-4 border border-gray-100 space-y-2">
                            <div class="flex justify-between items-center text-xs font-semibold">
                                <span class="text-gray-500">{{ site_t('fund_goal') }}</span>
                                <span class="text-[#073B63] font-bold">₹{{ number_format($raised) }} / ₹{{ number_format($target) }}</span>
                            </div>
                            <div class="w-full bg-gray-200 h-2.5 rounded-full overflow-hidden">
                                <div class="bg-gradient-to-r from-[#138A4B] to-[#2E9E58] h-full rounded-full" style="width: {{ $pct }}%"></div>
                            </div>
                            <div class="flex justify-between items-center text-[11px] text-gray-500">
                                <span>{{ site_t('completed_pct', ['pct' => $pct]) }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- UPI Quick Information -->
                    <div class="bg-[#EEF6FB] p-4 rounded-xl text-center space-y-2 text-xs">
                        <div class="text-gray-500">{{ site_t('donate_upi_title') }}:</div>
                        <div class="font-mono font-bold text-[#073B63] text-sm bg-white p-1 rounded border border-[#073B63]/20">
                            {{ setting('donation_upi_id', 'devanshfoundation@upi') }}
                        </div>
                    </div>

                    <a href="{{ route('donate', ['project_id' => $project->id]) }}" class="w-full block text-center py-3.5 rounded-xl bg-[#F58220] hover:bg-[#DC6F13] text-white font-bold text-sm shadow-md transition">
                        {{ site_t('btn_donate') }} →
                    </a>

                    <div class="text-center text-[11px] text-gray-400">
                        {{ site_t('donate_tax_benefit') }}
                    </div>
                </div>

                <!-- Volunteer Sidebar CTA -->
                <div class="bg-[#073B63] text-white rounded-3xl p-6 text-center space-y-3">
                    <h4 class="text-lg font-bold">{{ site_t('involve_volunteer') }}</h4>
                    <p class="text-xs text-gray-300 leading-relaxed">
                        {{ site_t('involve_volunteer_desc') }}
                    </p>
                    <a href="{{ route('volunteer') }}" class="w-full block py-2.5 rounded-xl bg-[#138A4B] hover:bg-[#0e6b3a] text-white font-semibold text-xs transition">
                        {{ site_t('btn_volunteer') }} →
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection
