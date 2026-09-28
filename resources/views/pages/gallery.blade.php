@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-16 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <span>{{ site_t('nav_gallery') }}</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-4">
                {{ site_t('gallery_heading') }}
            </h1>
            <p class="text-lg text-gray-200 leading-relaxed">
                {{ site_t('gallery_subheading') }}
            </p>
        </div>
    </div>
</section>

<!-- Filter Toolbar -->
<section class="py-6 bg-white border-b border-gray-100" x-data="{ currentModalImg: null, currentModalCaption: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <!-- Category Tabs -->
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('gallery') }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ !request('category') && !request('album') ? 'bg-[#073B63] text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    {{ site_t('all_photos') }}
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('gallery', ['category' => $cat]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ request('category') === $cat ? 'bg-[#138A4B] text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>

            <!-- Albums Dropdown if present -->
            @if($albums->count() > 0)
                <div>
                    <select onchange="window.location.href=this.value" class="px-4 py-2 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700">
                        <option value="{{ route('gallery') }}">{{ site_t('all_photos') }}</option>
                        @foreach($albums as $alb)
                            <option value="{{ route('gallery', ['album' => $alb->slug]) }}" {{ request('album') === $alb->slug ? 'selected' : '' }}>
                                {{ $alb->title }} ({{ $alb->images_count }})
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>

    <!-- Gallery Grid with Lightbox -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($images as $image)
                <div @click="currentModalImg = '{{ $image->image_path }}'; currentModalCaption = '{{ addslashes($image->caption) }}'" 
                     class="cursor-pointer group relative rounded-2xl overflow-hidden aspect-square bg-gray-100 shadow-sm border border-gray-100">
                    <img src="{{ $image->image_path }}" alt="{{ $image->caption }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-between p-4 text-white">
                        <span class="inline-flex self-start px-2 py-0.5 rounded text-[10px] font-bold bg-[#138A4B] text-white">
                            {{ $image->category }}
                        </span>
                        <div>
                            <p class="text-xs font-semibold leading-snug line-clamp-2">{{ $image->caption }}</p>
                            <span class="text-[10px] text-gray-300 mt-1 flex items-center">
                                <i data-lucide="zoom-in" class="w-3 h-3 mr-1"></i> {{ site_t('btn_view_gallery') }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Lightbox Modal -->
        <div x-show="currentModalImg" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @keydown.escape.window="currentModalImg = null"
             class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md flex items-center justify-center p-4 sm:p-8"
             style="display: none;">
            
            <button @click="currentModalImg = null" class="absolute top-6 right-6 text-white/80 hover:text-white bg-white/10 p-2 rounded-full transition">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>

            <div class="max-w-4xl max-h-[85vh] flex flex-col items-center">
                <img :src="currentModalImg" class="max-h-[75vh] w-auto rounded-xl object-contain shadow-2xl">
                <p x-text="currentModalCaption" class="mt-4 text-white text-sm font-medium text-center"></p>
            </div>
        </div>

        <div class="mt-12">
            {{ $images->links() }}
        </div>
    </div>
</section>

@endsection
