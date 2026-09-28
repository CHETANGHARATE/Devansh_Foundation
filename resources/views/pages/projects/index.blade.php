@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-16 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <span>उपक्रम व प्रकल्प / Our Projects</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('projects_heading', [], 'मुख्य प्रकल्प') }}
            </h1>
            <p class="text-lg text-gray-200 leading-relaxed">
                {{ site_t('projects_subheading', [], 'समाजात सकारात्मक बदल घडवणारे आमचे चालू आणि पूर्ण झालेले उपक्रम') }}
            </p>
        </div>
    </div>
</section>

<!-- Filter & Search Toolbar -->
<section class="py-8 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('projects.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-center">
            
            <!-- Focus Area Filter -->
            <div>
                <select name="focus_area" onchange="this.form.submit()" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 focus:border-[#138A4B]">
                    <option value="">सर्व कार्यक्षेत्रे / All Categories</option>
                    @foreach($focusAreas as $fa)
                        <option value="{{ $fa->slug }}" {{ request('focus_area') === $fa->slug ? 'selected' : '' }}>
                            {{ $fa->translation()?->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Status Filter -->
            <div>
                <select name="status" onchange="this.form.submit()" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 focus:border-[#138A4B]">
                    <option value="">सर्व स्थिती / All Status</option>
                    <option value="ongoing" {{ request('status') === 'ongoing' ? 'selected' : '' }}>चालू / Ongoing</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>पूर्ण झालेले / Completed</option>
                    <option value="upcoming" {{ request('status') === 'upcoming' ? 'selected' : '' }}>नियोजित / Upcoming</option>
                </select>
            </div>

            <!-- Search Term -->
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="प्रकल्प शोधा / Search..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 focus:border-[#138A4B]">
            </div>

            <!-- Submit / Reset buttons -->
            <div class="flex items-center space-x-2">
                <button type="submit" class="w-full py-2.5 rounded-xl bg-[#073B63] hover:bg-[#052a47] text-white font-bold text-sm transition">
                    फिल्टर लागू करा
                </button>
                @if(request()->hasAny(['focus_area', 'status', 'search']))
                    <a href="{{ route('projects.index') }}" class="px-3 py-2.5 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm font-semibold transition" title="Reset Filters">
                        <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                    </a>
                @endif
            </div>

        </form>
    </div>
</section>

<!-- Projects Listing Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $projects->links() }}
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 text-center max-w-xl mx-auto border border-gray-100 shadow-sm space-y-4">
                <div class="w-16 h-16 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mx-auto">
                    <i data-lucide="search-x" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold text-[#073B63]">कोणतेही प्रकल्प सापडले नाहीत</h3>
                <p class="text-sm text-gray-500">कृपया इतर निकष निवडून किंवा शोध संज्ञा बदलून पुन्हा प्रयत्न करा.</p>
                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-5 py-2.5 rounded-xl bg-[#138A4B] text-white font-semibold text-sm">
                    सर्व प्रकल्प रीसेट करा
                </a>
            </div>
        @endif
    </div>
</section>

@endsection
