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
            <p class="text-base sm:text-lg text-gray-200 leading-relaxed">
                {{ site_t('gallery_subheading') }}
            </p>
        </div>
    </div>
</section>

<!-- Main Gallery Section (Alpine.js Lightbox & Filter Toolbar) -->
<section class="py-8 sm:py-12 bg-[#F9FBFA] min-h-[60vh]" 
         x-data="{
             modalOpen: false,
             modalType: 'image',
             modalSrc: '',
             modalEmbedUrl: '',
             modalDirectUrl: '',
             modalTitle: '',
             modalDesc: '',
             modalCategory: '',
             openPhoto(src, title, desc, cat) {
                 this.modalType = 'image';
                 this.modalSrc = src;
                 this.modalEmbedUrl = '';
                 this.modalDirectUrl = '';
                 this.modalTitle = title;
                 this.modalDesc = desc;
                 this.modalCategory = cat;
                 this.modalOpen = true;
             },
             openVideo(embedUrl, directUrl, title, desc, cat) {
                 this.modalType = 'video';
                 this.modalSrc = '';
                 this.modalEmbedUrl = embedUrl;
                 this.modalDirectUrl = directUrl;
                 this.modalTitle = title;
                 this.modalDesc = desc;
                 this.modalCategory = cat;
                 this.modalOpen = true;
             },
             close() {
                 this.modalOpen = false;
                 this.modalEmbedUrl = '';
                 this.modalDirectUrl = '';
                 this.modalSrc = '';
             }
         }">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Toolbar -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-200/80 shadow-xs mb-8 space-y-4">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                
                <!-- 1. Primary Filter Tabs: All, Photos, Videos -->
                <div class="flex items-center space-x-2 bg-gray-100/90 p-1.5 rounded-xl self-start md:self-auto">
                    {{-- All Tab --}}
                    <a href="{{ route('gallery', array_merge(request()->except(['type', 'page']), ['type' => 'all'])) }}" 
                       class="inline-flex items-center space-x-2 px-4 py-2 rounded-lg text-xs font-bold transition duration-200 {{ $currentType === 'all' ? 'bg-[#073B63] text-white shadow-xs' : 'text-gray-600 hover:text-gray-900 hover:bg-white/60' }}">
                        <span>{{ site_t('tab_all') }}</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] {{ $currentType === 'all' ? 'bg-white/20 text-white' : 'bg-gray-200 text-gray-600' }}">
                            {{ $totalCount }}
                        </span>
                    </a>

                    {{-- Photos Tab --}}
                    <a href="{{ route('gallery', array_merge(request()->except(['type', 'page']), ['type' => 'photos'])) }}" 
                       class="inline-flex items-center space-x-2 px-4 py-2 rounded-lg text-xs font-bold transition duration-200 {{ $currentType === 'photos' ? 'bg-[#138A4B] text-white shadow-xs' : 'text-gray-600 hover:text-gray-900 hover:bg-white/60' }}">
                        <svg class="w-3.5 h-3.5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                            <rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                        </svg>
                        <span>{{ site_t('tab_photos') }}</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] {{ $currentType === 'photos' ? 'bg-white/20 text-white' : 'bg-gray-200 text-gray-600' }}">
                            {{ $photosCount }}
                        </span>
                    </a>

                    {{-- Videos Tab --}}
                    <a href="{{ route('gallery', array_merge(request()->except(['type', 'page']), ['type' => 'videos'])) }}" 
                       class="inline-flex items-center space-x-2 px-4 py-2 rounded-lg text-xs font-bold transition duration-200 {{ $currentType === 'videos' ? 'bg-red-600 text-white shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-white/60' }}">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <span>{{ site_t('tab_videos') }}</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] {{ $currentType === 'videos' ? 'bg-white/20 text-white' : 'bg-gray-200 text-gray-600' }}">
                            {{ $videosCount }}
                        </span>
                    </a>
                </div>

                <!-- 2. Albums Dropdown (if albums exist) -->
                @if($albums->count() > 0)
                    <div class="flex items-center space-x-2">
                        <label for="album-filter" class="text-xs font-semibold text-gray-500 whitespace-nowrap hidden sm:inline">Album:</label>
                        <select id="album-filter" 
                                onchange="window.location.href=this.value" 
                                class="px-3.5 py-2 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700 bg-white shadow-2xs focus:border-[#138A4B] focus:ring-1 focus:ring-[#138A4B]">
                            <option value="{{ route('gallery', request()->only(['type', 'category'])) }}">All Albums</option>
                            @foreach($albums as $alb)
                                <option value="{{ route('gallery', array_merge(request()->only(['type', 'category']), ['album' => $alb->slug])) }}" {{ request('album') === $alb->slug ? 'selected' : '' }}>
                                    {{ $alb->title }} ({{ $alb->images_count }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>

            <!-- 3. Category Filter Pills -->
            @if($categories->count() > 0)
                <div class="pt-3 border-t border-gray-100 flex flex-wrap items-center gap-1.5">
                    <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mr-2">Categories:</span>
                    <a href="{{ route('gallery', request()->only(['type', 'album'])) }}" 
                       class="px-3 py-1 rounded-full text-xs font-semibold transition {{ !request('category') ? 'bg-[#073B63] text-white shadow-2xs' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        {{ site_t('filter_by_category') }}
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('gallery', array_merge(request()->only(['type', 'album']), ['category' => $cat])) }}" 
                           class="px-3 py-1 rounded-full text-xs font-semibold transition {{ request('category') === $cat ? 'bg-[#138A4B] text-white shadow-2xs' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Media Grid (Photos & Videos) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($items as $item)
                @php
                    $isVid = $item->isVideo();
                    $thumb = $item->display_thumbnail;
                    $title = $item->title ?: $item->caption;
                    $desc = $item->description;
                    $cat = $item->category;
                    $embedUrl = $item->video_embed_url;
                    $directUrl = $item->video_direct_url;
                @endphp

                <article class="group relative rounded-2xl overflow-hidden aspect-[4/3] bg-gray-100 shadow-sm hover:shadow-xl border border-gray-200/80 transition-all duration-300 flex flex-col justify-end cursor-pointer"
                         @if($isVid)
                             @click="openVideo('{{ $embedUrl }}', '{{ $directUrl }}', '{{ addslashes($title) }}', '{{ addslashes($desc) }}', '{{ addslashes($cat) }}')"
                         @else
                             @click="openPhoto('{{ $item->image_path }}', '{{ addslashes($title) }}', '{{ addslashes($desc) }}', '{{ addslashes($cat) }}')"
                         @endif
                >
                    <!-- Background Thumbnail Image -->
                    <img src="{{ $thumb }}" 
                         alt="{{ $item->alt }}" 
                         loading="lazy" 
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                    <!-- Gradient Vignette -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-black/10 group-hover:via-black/45 transition-colors duration-300"></div>

                    <!-- Top Left: Category Badge -->
                    <div class="absolute top-3 left-3 z-10">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#138A4B] text-white shadow-sm tracking-wide">
                            {{ $cat }}
                        </span>
                    </div>

                    <!-- Top Right: Media Type Badge -->
                    <div class="absolute top-3 right-3 z-10">
                        @if($isVid)
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-600/90 backdrop-blur-xs text-white shadow-sm flex items-center space-x-1">
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <span>{{ site_t('video_badge') }}</span>
                            </span>
                        @else
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-black/60 backdrop-blur-xs text-white shadow-sm flex items-center space-x-1">
                                <svg class="w-3 h-3 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                    <rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                                </svg>
                                <span>{{ site_t('photo_badge') }}</span>
                            </span>
                        @endif
                    </div>

                    <!-- Center: Prominent Play Button for Videos -->
                    @if($isVid)
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-10">
                            <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-full bg-white/95 text-[#073B63] shadow-xl flex items-center justify-center transform group-hover:scale-115 group-hover:bg-white group-hover:text-red-600 transition-all duration-300">
                                <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    @endif

                    <!-- Bottom Content Overlay -->
                    <div class="relative z-10 p-4 text-white">
                        <h3 class="text-xs sm:text-sm font-bold leading-snug line-clamp-2 drop-shadow-sm group-hover:text-emerald-300 transition-colors">
                            {{ $title }}
                        </h3>
                        
                        <div class="flex items-center justify-between mt-2 pt-2 border-t border-white/15 text-[10px] text-gray-300">
                            <span class="flex items-center space-x-1 font-semibold text-emerald-300">
                                @if($isVid)
                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    <span>{{ site_t('watch_video') }} →</span>
                                @else
                                    <svg class="w-3 h-3 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>
                                    </svg>
                                    <span>{{ site_t('btn_view_gallery') }} →</span>
                                @endif
                            </span>

                            @if($item->album)
                                <span class="text-gray-400 truncate max-w-[120px]">
                                    {{ $item->album->title }}
                                </span>
                            @endif
                        </div>
                    </div>
                </article>

            @empty
                <!-- Empty State -->
                <div class="col-span-full py-16 px-4 text-center bg-white rounded-3xl border border-gray-200/80 shadow-xs">
                    <div class="w-16 h-16 rounded-2xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                            <path d="m21 21-4.3-4.3"/><circle cx="11" cy="11" r="8"/><line x1="8" y1="11" x2="14" y2="11"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">
                        {{ site_t('no_media_found') }}
                    </h3>
                    <p class="text-xs text-gray-500 max-w-md mx-auto mb-6">
                        No photos or videos match your current filter selection. Try selecting another tab or category.
                    </p>
                    <a href="{{ route('gallery') }}" class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-full bg-[#073B63] hover:bg-[#052843] text-white text-xs font-bold shadow-sm transition">
                        <span>{{ site_t('view_all_media', [], 'सर्व पहा / View All') }}</span>
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Lightbox / Video Modal -->
        <div x-show="modalOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @keydown.escape.window="close()"
             @click.self="close()"
             class="fixed inset-0 z-50 bg-black/95 backdrop-blur-md flex items-center justify-center p-3 sm:p-6"
             style="display: none;">
            
            <!-- Close Button -->
            <button @click="close()" 
                    type="button"
                    class="absolute top-4 right-4 sm:top-6 sm:right-6 text-white/80 hover:text-white bg-white/10 hover:bg-white/20 p-2.5 rounded-full transition focus:outline-none focus:ring-2 focus:ring-white z-50"
                    aria-label="{{ site_t('close_modal') }}">
                <svg class="w-6 h-6 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>

            <!-- Modal Content Frame -->
            <div class="max-w-4xl w-full max-h-[92vh] flex flex-col items-center">
                
                <!-- Video Container -->
                <template x-if="modalType === 'video'">
                    <div class="w-full aspect-video rounded-2xl overflow-hidden shadow-2xl bg-black border border-white/10">
                        {{-- YouTube / Vimeo iFrame --}}
                        <template x-if="modalEmbedUrl">
                            <iframe :src="modalEmbedUrl" 
                                    class="w-full h-full" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                            </iframe>
                        </template>

                        {{-- Direct HTML5 Video Player --}}
                        <template x-if="!modalEmbedUrl && modalDirectUrl">
                            <video :src="modalDirectUrl" 
                                   controls 
                                   autoplay 
                                   class="w-full h-full object-contain">
                                Your browser does not support the video tag.
                            </video>
                        </template>
                    </div>
                </template>

                <!-- Photo Container -->
                <template x-if="modalType === 'image'">
                    <div class="max-h-[72vh] flex items-center justify-center">
                        <img :src="modalSrc" 
                             :alt="modalTitle" 
                             class="max-h-[72vh] max-w-full rounded-2xl object-contain shadow-2xl border border-white/10">
                    </div>
                </template>

                <!-- Media Title & Description Footer -->
                <div class="mt-4 text-center max-w-2xl px-4">
                    <span x-show="modalCategory" 
                          x-text="modalCategory" 
                          class="inline-block px-3 py-0.5 rounded-full text-[10px] font-bold bg-[#138A4B] text-white uppercase tracking-wider mb-1.5 shadow-sm">
                    </span>
                    <h3 x-text="modalTitle" class="text-white text-base sm:text-lg font-bold leading-snug"></h3>
                    <p x-show="modalDesc" x-text="modalDesc" class="mt-1 text-gray-300 text-xs sm:text-sm font-normal leading-relaxed"></p>
                </div>

            </div>
        </div>

        <!-- Pagination -->
        @if($items->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $items->links() }}
            </div>
        @endif

    </div>
</section>

@endsection
