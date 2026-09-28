@props(['project'])

@php
    $trans = $project->translation();
    $title = $trans?->title ?? $project->slug;
    $shortDesc = $trans?->short_description ?? '';
    $areaTrans = $project->focusArea?->translation();
    $areaTitle = $areaTrans?->title ?? ($project->focusArea?->slug ?? 'Community');
    
    $target = (float) $project->target_amount;
    $raised = (float) $project->raised_amount;
    $pct = $target > 0 ? min(100, round(($raised / $target) * 100)) : 0;
    
    $img = $project->featured_image ?: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80';
@endphp

<div class="ngo-card bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm flex flex-col justify-between group">
    <div>
        <!-- Image with Category Badge -->
        <div class="relative h-52 overflow-hidden bg-gray-100">
            <img src="{{ $img }}" alt="{{ $title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
            
            <div class="absolute top-3 left-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-[#138A4B] text-white shadow-sm">
                    {{ $areaTitle }}
                </span>
            </div>

            @if($project->status === 'ongoing')
                <div class="absolute top-3 right-3">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-white/90 text-[#073B63] backdrop-blur-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 animate-pulse"></span>
                        {{ site_t('status_ongoing') }}
                    </span>
                </div>
            @endif

            <div class="absolute bottom-3 left-3 right-3 text-white text-xs flex items-center justify-between">
                @if($project->location)
                    <span class="flex items-center space-x-1 drop-shadow">
                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-[#F58220]"></i>
                        <span class="truncate max-w-[180px]">{{ $project->location }}</span>
                    </span>
                @endif
                @if($project->beneficiaries_count)
                    <span class="flex items-center space-x-1 font-semibold text-emerald-300 drop-shadow">
                        <i data-lucide="users" class="w-3.5 h-3.5"></i>
                        <span>{{ $project->beneficiaries_count }}</span>
                    </span>
                @endif
            </div>
        </div>

        <!-- Body -->
        <div class="p-5">
            <h3 class="text-xl font-bold text-[#073B63] group-hover:text-[#138A4B] transition leading-snug mb-2 line-clamp-1">
                <a href="{{ route('projects.show', $project->slug) }}">{{ $title }}</a>
            </h3>

            <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-2">
                {{ $shortDesc }}
            </p>

            <!-- Target vs Raised bar if target > 0 -->
            @if($target > 0)
                <div class="bg-gray-50 rounded-xl p-3 mb-4 border border-gray-100">
                    <div class="flex justify-between items-center text-xs font-semibold mb-1.5">
                        <span class="text-gray-500">{{ site_t('fund_goal') }}</span>
                        <span class="text-[#073B63]">₹{{ number_format($raised) }} / <span class="text-gray-400">₹{{ number_format($target) }}</span></span>
                    </div>
                    <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                        <div class="bg-gradient-to-r from-[#138A4B] to-[#2E9E58] h-full rounded-full transition-all duration-500" style="width: {{ $pct }}%"></div>
                    </div>
                    <div class="flex justify-between items-center text-[11px] text-gray-500 mt-1">
                        <span>{{ site_t('completed_pct', ['pct' => $pct]) }}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer Actions -->
    <div class="px-5 pb-5 pt-0 flex items-center justify-between gap-2 border-t border-gray-50 pt-3">
        <a href="{{ route('projects.show', $project->slug) }}" class="inline-flex items-center text-sm font-semibold text-[#073B63] hover:text-[#138A4B] transition">
            <span>{{ site_t('btn_learn_more') }}</span>
            <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
        </a>

        <a href="{{ route('donate', ['project_id' => $project->id]) }}" class="inline-flex items-center space-x-1 px-3 py-1.5 rounded-lg text-xs font-bold bg-[#F58220] hover:bg-[#DC6F13] text-white shadow-sm transition">
            <i data-lucide="heart" class="w-3.5 h-3.5"></i>
            <span>{{ site_t('btn_donate') }}</span>
        </a>
    </div>
</div>
