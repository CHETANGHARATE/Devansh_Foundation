@props(['stat'])

@php
    $trans = $stat->translation();
    $val = (int) $stat->number_value;
    $suffix = $stat->number_suffix ?: '+';
    $label = $trans?->label ?? 'Impact';
    $desc = $trans?->description ?? '';
    $icon = $stat->icon ?: 'users';
@endphp

<div x-data="{ 
        count: 0, 
        target: {{ $val }},
        started: false,
        animate() {
            if (this.started) return;
            this.started = true;
            let duration = 1800;
            let stepTime = 25;
            let steps = duration / stepTime;
            let increment = this.target / steps;
            let current = 0;
            let timer = setInterval(() => {
                current += increment;
                if (current >= this.target) {
                    this.count = this.target;
                    clearInterval(timer);
                } else {
                    this.count = Math.floor(current);
                }
            }, stepTime);
        }
    }" 
    x-intersect.once="animate()"
    class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 text-center text-white flex flex-col items-center justify-between hover:bg-white/15 transition">
    
    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center mb-4 text-[#F58220]">
        <i data-lucide="{{ $icon }}" class="w-6 h-6"></i>
    </div>

    <div>
        <div class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight mb-2">
            <span x-text="count.toLocaleString()">{{ number_format($val) }}</span><span>{{ $suffix }}</span>
        </div>
        <div class="text-base sm:text-lg font-bold text-white mb-1">
            {{ $label }}
        </div>
        @if($desc)
            <p class="text-xs text-gray-200 line-clamp-2">
                {{ $desc }}
            </p>
        @endif
    </div>
</div>
