@extends('layouts.admin', ['title' => 'Gallery Management', 'header' => 'Media & Gallery (Photos & Videos)'])

@section('content')

<div class="space-y-6">
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Foundation Activities, Photos & Videos</h3>
            <p class="text-xs text-gray-500">Visual documentary and video records of community camps, tree drives, and ground events</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition-colors w-fit">
            <i data-lucide="plus-circle" class="w-4 h-4"></i> Add Photo or Video
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-semibold border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <!-- Stats & Filter Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-gray-100 shadow-2xs">
        
        <!-- Media Type Tabs (All, Photos, Videos) -->
        <div class="flex items-center space-x-2 bg-gray-100 p-1 rounded-xl">
            <a href="{{ route('admin.gallery.index', request()->only(['category'])) }}" 
               class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition {{ !request('type') || request('type') === 'all' ? 'bg-white text-[#073B63] shadow-xs' : 'text-gray-600 hover:text-gray-900' }}">
                All ({{ $stats['total'] }})
            </a>
            <a href="{{ route('admin.gallery.index', array_merge(request()->only(['category']), ['type' => 'photos'])) }}" 
               class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition {{ request('type') === 'photos' ? 'bg-[#138A4B] text-white shadow-xs' : 'text-gray-600 hover:text-gray-900' }}">
                Photos ({{ $stats['photos'] }})
            </a>
            <a href="{{ route('admin.gallery.index', array_merge(request()->only(['category']), ['type' => 'videos'])) }}" 
               class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition {{ request('type') === 'videos' ? 'bg-red-600 text-white shadow-xs' : 'text-gray-600 hover:text-gray-900' }}">
                Videos ({{ $stats['videos'] }})
            </a>
        </div>

        <!-- Category Filter Dropdown -->
        @if($categories->count() > 0)
            <div class="flex items-center space-x-2">
                <span class="text-xs text-gray-500 font-medium">Category:</span>
                <select onchange="window.location.href=this.value" class="px-3 py-1.5 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700 bg-white">
                    <option value="{{ route('admin.gallery.index', request()->only(['type'])) }}">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ route('admin.gallery.index', array_merge(request()->only(['type']), ['category' => $cat])) }}" {{ request('category') === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @forelse($items as $item)
            @php
                $isVid = $item->isVideo();
                $thumb = $item->display_thumbnail;
                $title = $item->title ?: ($item->caption ?: 'Untitled Media');
            @endphp
            <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition duration-200">
                
                <!-- Card Thumbnail Container -->
                <div class="relative aspect-video sm:aspect-square overflow-hidden bg-gray-100">
                    <img src="{{ $thumb }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <!-- Media Type Badge -->
                    <div class="absolute top-2 left-2 z-10">
                        @if($isVid)
                            <span class="px-2 py-0.5 rounded-md bg-red-600 text-white text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 shadow-xs">
                                <i data-lucide="video" class="w-2.5 h-2.5"></i> Video
                            </span>
                        @else
                            <span class="px-2 py-0.5 rounded-md bg-black/65 backdrop-blur-xs text-white text-[10px] font-bold uppercase tracking-wider flex items-center gap-1 shadow-xs">
                                <i data-lucide="image" class="w-2.5 h-2.5"></i> Photo
                            </span>
                        @endif
                    </div>

                    <!-- Category Badge -->
                    <div class="absolute top-2 right-2 z-10">
                        <span class="px-2 py-0.5 rounded-md bg-[#138A4B] text-white text-[9px] font-bold shadow-xs">
                            {{ $item->category }}
                        </span>
                    </div>

                    <!-- Play icon overlay for videos -->
                    @if($isVid)
                        <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/30 transition">
                            <div class="w-10 h-10 rounded-full bg-white/95 text-red-600 flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                                <svg class="w-4 h-4 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Card Meta -->
                <div class="p-3">
                    <div class="text-[11px] font-semibold text-gray-800 line-clamp-1" title="{{ $title }}">
                        {{ $title }}
                    </div>

                    <div class="flex items-center justify-between text-[10px] text-gray-400 mt-1">
                        <span class="flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full {{ $item->is_active ? 'bg-emerald-500' : 'bg-gray-300' }}"></span>
                            <span>{{ $item->is_active ? 'Active' : 'Draft' }}</span>
                        </span>
                        <span>Order: {{ $item->order }}</span>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-2.5 mt-2.5 border-t border-gray-100">
                        <span class="text-[10px] text-gray-400 font-mono">#{{ $item->id }}</span>
                        
                        <div class="flex items-center space-x-1">
                            <a href="{{ route('admin.gallery.edit', $item->id) }}" class="p-1.5 rounded-lg text-gray-600 hover:text-[#073B63] hover:bg-gray-100 transition" title="Edit">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                            </a>

                            <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Remove this gallery item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-lg text-red-500 hover:bg-red-50 transition" title="Delete">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center text-gray-400 bg-white rounded-3xl border border-gray-100">
                <i data-lucide="image" class="w-10 h-10 mx-auto text-gray-300 mb-2"></i>
                <p class="text-sm font-semibold text-gray-600">No gallery items found.</p>
                <p class="text-xs text-gray-400 mt-1">Upload photos or add videos to showcase your foundation's impact.</p>
            </div>
        @endforelse
    </div>

    @if($items->hasPages())
        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
            {{ $items->links() }}
        </div>
    @endif
</div>

@endsection
