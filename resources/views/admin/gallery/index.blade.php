@extends('layouts.admin', ['title' => 'Photo Gallery', 'header' => 'Media & Photo Gallery'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Foundation Activity Photos</h3>
            <p class="text-xs text-gray-500">Visual documentary of ground events, distribution drives, and community camps</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition-colors w-fit">
            <i data-lucide="upload" class="w-4 h-4"></i> Upload Photo
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-semibold border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <!-- Album Stats Pills -->
    <div class="flex flex-wrap gap-2">
        <span class="px-3 py-1.5 rounded-xl bg-white border border-gray-100 text-xs font-semibold text-gray-700 shadow-sm">
            Total Photos: <strong class="text-[#073B63]">{{ $images->total() }}</strong>
        </span>
        @foreach($albums as $alb)
            <span class="px-3 py-1.5 rounded-xl bg-white border border-gray-100 text-xs font-semibold text-gray-700 shadow-sm">
                {{ $alb->title }}: <strong class="text-[#138A4B]">{{ $alb->images_count }}</strong>
            </span>
        @endforeach
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @forelse($images as $img)
            <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between">
                <div class="relative aspect-square overflow-hidden bg-gray-100">
                    <img src="{{ $img->image_path }}" alt="{{ $img->caption_mr }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-2 left-2">
                        <span class="px-2 py-0.5 rounded-md bg-black/60 backdrop-blur-xs text-[10px] font-bold text-white uppercase tracking-wider">
                            {{ $img->category }}
                        </span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="text-[11px] font-semibold text-gray-800 line-clamp-1">
                        {{ $img->caption_mr ?: $img->caption_en ?: 'फोटो' }}
                    </div>
                    @if($img->album)
                        <div class="text-[10px] text-gray-400 mt-0.5">{{ $img->album->title }}</div>
                    @endif
                    <div class="flex items-center justify-between pt-2 mt-2 border-t border-gray-50">
                        <span class="text-[10px] text-gray-400 font-mono">#{{ $img->id }}</span>
                        <form action="{{ route('admin.gallery.destroy', $img->id) }}" method="POST" onsubmit="return confirm('Remove this image?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1 rounded-md text-red-500 hover:bg-red-50 transition-colors" title="Delete">
                                <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-gray-400 bg-white rounded-3xl border border-gray-100">
                No images yet. Upload photos to showcase your foundation's activities.
            </div>
        @endforelse
    </div>

    @if($images->hasPages())
        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
            {{ $images->links() }}
        </div>
    @endif
</div>

@endsection
