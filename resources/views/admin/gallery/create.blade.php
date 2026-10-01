@php
    $isEdit = isset($item);
    $action = $isEdit ? route('admin.gallery.update', $item->id) : route('admin.gallery.store');
    $title = $isEdit ? 'Edit Gallery Item' : 'Add to Gallery';
    $currentType = old('media_type', $item->media_type ?? 'image');
@endphp

@extends('layouts.admin', ['title' => $title, 'header' => $title])

@section('content')

<div class="max-w-3xl bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm"
     x-data="{ 
         mediaType: '{{ $currentType }}',
         videoSource: '{{ old('video_url', $item->video_url ?? '') ? 'url' : (old('video_path', $item->video_path ?? '') ? 'file' : 'url') }}'
     }">

    <div class="flex items-center justify-between pb-6 mb-6 border-b border-gray-100">
        <div>
            <h2 class="text-lg font-bold text-gray-800">{{ $title }}</h2>
            <p class="text-xs text-gray-500">Upload foundation photos or add documentary videos</p>
        </div>
        <a href="{{ route('admin.gallery.index') }}" class="px-4 py-2 rounded-xl border border-gray-200 text-xs font-semibold text-gray-600 hover:bg-gray-50 transition">
            ← Back to Gallery
        </a>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs font-semibold space-y-1">
            <p class="font-bold">Please correct the following errors:</p>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <!-- 1. Media Type Selector (Image vs Video) -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Media Type *</label>
            <div class="grid grid-cols-2 gap-3 max-w-md">
                <label class="flex items-center justify-center space-x-2.5 p-3 rounded-2xl border-2 cursor-pointer transition"
                       :class="mediaType === 'image' ? 'border-[#138A4B] bg-emerald-50/50 text-[#138A4B] font-bold' : 'border-gray-200 text-gray-600 hover:border-gray-300'">
                    <input type="radio" name="media_type" value="image" x-model="mediaType" class="hidden">
                    <svg class="w-4 h-4 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                    </svg>
                    <span class="text-xs">Photo / Image</span>
                </label>

                <label class="flex items-center justify-center space-x-2.5 p-3 rounded-2xl border-2 cursor-pointer transition"
                       :class="mediaType === 'video' ? 'border-red-600 bg-red-50/50 text-red-600 font-bold' : 'border-gray-200 text-gray-600 hover:border-gray-300'">
                    <input type="radio" name="media_type" value="video" x-model="mediaType" class="hidden">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    <span class="text-xs">Video</span>
                </label>
            </div>
        </div>

        <!-- 2. PHOTO SECTION (Shown when mediaType === 'image') -->
        <div x-show="mediaType === 'image'" x-transition class="space-y-4 p-5 rounded-2xl bg-gray-50 border border-gray-100">
            <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wider flex items-center gap-1.5">
                <i data-lucide="image" class="w-3.5 h-3.5 text-[#138A4B]"></i> Image File or URL
            </h4>

            @if($isEdit && $item->isImage() && $item->image_path)
                <div class="flex items-center space-x-4 p-3 bg-white rounded-xl border border-gray-200">
                    <img src="{{ $item->image_path }}" class="w-16 h-16 rounded-lg object-cover">
                    <div class="text-xs text-gray-600">
                        <span class="font-semibold block text-gray-800">Current Image:</span>
                        <span class="truncate block max-w-md text-gray-500 font-mono text-[11px]">{{ $item->image_path }}</span>
                    </div>
                </div>
            @endif

            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Upload New Image File (Max 10MB)</label>
                <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#EAF7EF] file:text-[#138A4B]">
            </div>

            <div class="text-center text-[10px] text-gray-400 font-bold uppercase tracking-wider">— OR —</div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Direct Image URL</label>
                <input type="url" name="image_path" value="{{ old('image_path', $isEdit && $item->isImage() ? $item->image_path : '') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-[#138A4B]">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Alt Text (Accessibility for screen readers)</label>
                <input type="text" name="alt_text" value="{{ old('alt_text', $item->alt_text ?? '') }}" placeholder="e.g. Free Eye Check-up Camp in Nashik" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm">
            </div>
        </div>

        <!-- 3. VIDEO SECTION (Shown when mediaType === 'video') -->
        <div x-show="mediaType === 'video'" x-transition class="space-y-4 p-5 rounded-2xl bg-red-50/40 border border-red-100">
            <h4 class="text-xs font-bold text-red-900 uppercase tracking-wider flex items-center gap-1.5">
                <i data-lucide="video" class="w-3.5 h-3.5 text-red-600"></i> Video Source & Thumbnail
            </h4>

            @if($isEdit && $item->isVideo())
                <div class="flex items-center space-x-4 p-3 bg-white rounded-xl border border-red-200">
                    <img src="{{ $item->display_thumbnail }}" class="w-20 h-14 rounded-lg object-cover">
                    <div class="text-xs text-gray-600">
                        <span class="font-semibold block text-gray-800">Current Video:</span>
                        <span class="truncate block max-w-md text-red-600 font-mono text-[11px]">{{ $item->video_url ?: $item->video_path }}</span>
                    </div>
                </div>
            @endif

            <!-- Video URL input -->
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">
                    YouTube / Vimeo / External Video URL
                </label>
                <input type="url" name="video_url" value="{{ old('video_url', $item->video_url ?? '') }}" placeholder="https://www.youtube.com/watch?v=... or https://vimeo.com/..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-red-600">
                <p class="text-[11px] text-gray-500 mt-1">Supports standard YouTube URLs, YouTube Shorts, and Vimeo links.</p>
            </div>

            <div class="text-center text-[10px] text-gray-400 font-bold uppercase tracking-wider">— OR UPLOAD VIDEO FILE —</div>

            <!-- Upload Video File -->
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Upload Video File (MP4, WebM - Max 100MB)</label>
                <input type="file" name="video_file" accept="video/mp4,video/webm,video/ogg" class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-red-100 file:text-red-700">
            </div>

            <!-- Custom Thumbnail for Video -->
            <div class="pt-3 border-t border-red-100 space-y-3">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                    Video Thumbnail / Preview Image (Optional)
                </label>
                <p class="text-[11px] text-gray-500">For YouTube videos, if left blank, the high-definition YouTube thumbnail will be fetched automatically.</p>
                
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Upload Custom Thumbnail Image</label>
                    <input type="file" name="thumbnail_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Or Thumbnail Image URL</label>
                    <input type="url" name="thumbnail_path" value="{{ old('thumbnail_path', $item->thumbnail_path ?? '') }}" placeholder="https://..." class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm">
                </div>
            </div>
        </div>

        <!-- 4. Category & Album & Project Selectors -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    @php
                        $selectedCat = old('category', $item->category ?? 'Community');
                    @endphp
                    <option value="Health" {{ $selectedCat === 'Health' ? 'selected' : '' }}>Health / आरोग्य शिबिर</option>
                    <option value="Education" {{ $selectedCat === 'Education' ? 'selected' : '' }}>Education / शैक्षणिक उपक्रम</option>
                    <option value="Environment" {{ $selectedCat === 'Environment' ? 'selected' : '' }}>Environment / पर्यावरण संवर्धन</option>
                    <option value="Women Empowerment" {{ $selectedCat === 'Women Empowerment' ? 'selected' : '' }}>Women Empowerment / महिला सक्षमीकरण</option>
                    <option value="Community" {{ $selectedCat === 'Community' ? 'selected' : '' }}>Community / समाज कल्याण</option>
                    <option value="Disaster Relief" {{ $selectedCat === 'Disaster Relief' ? 'selected' : '' }}>Disaster Relief / आपत्ती व्यवस्थापन</option>
                    <option value="Events" {{ $selectedCat === 'Events' ? 'selected' : '' }}>Events / कार्यक्रम व सोहळे</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Album (Optional)</label>
                <select name="gallery_album_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    <option value="">-- No Album --</option>
                    @foreach($albums as $alb)
                        <option value="{{ $alb->id }}" {{ (string) old('gallery_album_id', $item->gallery_album_id ?? '') === (string) $alb->id ? 'selected' : '' }}>
                            {{ $alb->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Associated Project</label>
                <select name="project_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    <option value="">-- None --</option>
                    @foreach($projects as $p)
                        <option value="{{ $p->id }}" {{ (string) old('project_id', $item->project_id ?? '') === (string) $p->id ? 'selected' : '' }}>
                            {{ $p->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- 5. Multilingual Titles -->
        <div class="space-y-4 pt-4 border-t border-gray-100">
            <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wider">Titles / शीर्षक</h4>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">मराठी शीर्षक *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr', $item->title_mr ?? ($item->caption_mr ?? '')) }}" placeholder="उदा. वृक्षारोपण मोहीम" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">हिंदी शीर्षक</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi', $item->title_hi ?? ($item->caption_hi ?? '')) }}" placeholder="उदा. पौधरोपण अभियान" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">English Title</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $item->title_en ?? ($item->caption_en ?? '')) }}" placeholder="e.g. Tree Plantation Drive" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                </div>
            </div>
        </div>

        <!-- 6. Multilingual Captions / Short Summaries -->
        <div class="space-y-4 pt-2">
            <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wider">Short Caption / कॅप्शन</h4>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">मराठी कॅप्शन</label>
                    <textarea name="caption_mr" rows="2" placeholder="संक्षिप्त वर्णन..." class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('caption_mr', $item->caption_mr ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">हिंदी कैप्शन</label>
                    <textarea name="caption_hi" rows="2" placeholder="संक्षिप्त विवरण..." class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('caption_hi', $item->caption_hi ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">English Caption</label>
                    <textarea name="caption_en" rows="2" placeholder="Short description..." class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('caption_en', $item->caption_en ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- 7. Display Order & Active Toggle -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-gray-100 items-center">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm">
                <p class="text-[11px] text-gray-400 mt-1">Lower numbers appear first.</p>
            </div>

            <div class="pt-4">
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 rounded text-[#138A4B] focus:ring-[#138A4B]">
                    <span class="text-xs font-bold text-gray-800">Active (Visible on public gallery)</span>
                </label>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
            <a href="{{ route('admin.gallery.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold hover:bg-gray-50 transition">
                Cancel
            </a>
            <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-md hover:bg-[#0f6c3a] transition-colors">
                {{ $isEdit ? 'Update Gallery Item' : 'Save & Publish' }}
            </button>
        </div>
    </form>
</div>

@endsection
