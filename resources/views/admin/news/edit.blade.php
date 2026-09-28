@extends('layouts.admin', ['title' => 'Edit News Article', 'header' => 'Edit News Article'])

@section('content')

<div class="max-w-4xl bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    @foreach(['Health', 'Education', 'Environment', 'Event', 'Announcement', 'CSR'] as $cat)
                        <option value="{{ $cat }}" {{ $news->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Published Date *</label>
                <input type="date" name="published_at" value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d') : date('Y-m-d')) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Custom Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $news->slug) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Replace Image</label>
                <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#EAF7EF] file:text-[#138A4B]">
                @if($news->featured_image)
                    <div class="mt-2 flex items-center gap-2">
                        <img src="{{ $news->featured_image }}" class="w-10 h-10 rounded-lg object-cover border" alt="Preview">
                        <span class="text-[11px] text-gray-400">Current Image</span>
                    </div>
                @endif
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Or Image URL</label>
                <input type="url" name="featured_image" value="{{ old('featured_image', $news->featured_image) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
        </div>

        <div class="flex items-center gap-6 pt-2">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ $news->is_featured ? 'checked' : '' }} class="w-4 h-4 rounded text-[#138A4B]">
                <span class="text-xs font-bold text-gray-700">Feature on Homepage</span>
            </label>
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" {{ $news->is_published ? 'checked' : '' }} class="w-4 h-4 rounded text-[#138A4B]">
                <span class="text-xs font-bold text-gray-700">Published</span>
            </label>
        </div>

        {{-- Multilingual Tabs --}}
        <div x-data="{ tab: 'mr' }" class="pt-6 border-t border-gray-100">
            <div class="flex items-center gap-2 mb-4 border-b border-gray-100 pb-2">
                <button type="button" @click="tab = 'mr'" :class="tab === 'mr' ? 'bg-[#073B63] text-white' : 'bg-gray-100 text-gray-600'" class="px-4 py-1.5 rounded-lg text-xs font-bold transition-colors">
                    मराठी (Default)
                </button>
                <button type="button" @click="tab = 'hi'" :class="tab === 'hi' ? 'bg-[#073B63] text-white' : 'bg-gray-100 text-gray-600'" class="px-4 py-1.5 rounded-lg text-xs font-bold transition-colors">
                    हिंदी
                </button>
                <button type="button" @click="tab = 'en'" :class="tab === 'en' ? 'bg-[#073B63] text-white' : 'bg-gray-100 text-gray-600'" class="px-4 py-1.5 rounded-lg text-xs font-bold transition-colors">
                    English
                </button>
            </div>

            <!-- Marathi -->
            <div x-show="tab === 'mr'" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">बातम्याचे शीर्षक (मराठी) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr', $trans['mr']->title ?? '') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">संक्षिप्त सारांश (Short Description)</label>
                    <textarea name="short_description_mr" rows="2" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('short_description_mr', $trans['mr']->short_description ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">सविस्तर मजकूर (Content) *</label>
                    <textarea name="content_mr" rows="8" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('content_mr', $trans['mr']->content ?? '') }}</textarea>
                </div>
            </div>

            <!-- Hindi -->
            <div x-show="tab === 'hi'" class="space-y-4" style="display: none;">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">समाचार शीर्षक (हिंदी)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi', $trans['hi']->title ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">संक्षिप्त विवरण</label>
                    <textarea name="short_description_hi" rows="2" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('short_description_hi', $trans['hi']->short_description ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">विस्तृत समाचार</label>
                    <textarea name="content_hi" rows="8" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('content_hi', $trans['hi']->content ?? '') }}</textarea>
                </div>
            </div>

            <!-- English -->
            <div x-show="tab === 'en'" class="space-y-4" style="display: none;">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Article Title (English)</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $trans['en']->title ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Short Description</label>
                    <textarea name="short_description_en" rows="2" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('short_description_en', $trans['en']->short_description ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Detailed Content</label>
                    <textarea name="content_en" rows="8" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('content_en', $trans['en']->content ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
            <a href="{{ route('admin.news.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold">Cancel</a>
            <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-md hover:bg-[#0f6c3a] transition-colors">
                Update Article
            </button>
        </div>
    </form>
</div>

@endsection
