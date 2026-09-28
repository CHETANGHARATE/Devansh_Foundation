@extends('layouts.admin', ['title' => 'Edit Focus Area', 'header' => 'Edit Focus Area: ' . ($focusArea->translation('mr')?->title ?? $focusArea->slug)])

@section('content')

<div class="max-w-4xl bg-white rounded-3xl p-8 border border-gray-100 shadow-sm" x-data="{ langTab: 'mr' }">
    <form action="{{ route('admin.focus-areas.update', $focusArea->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Lucide Icon Name *</label>
                <input type="text" name="icon" value="{{ old('icon', $focusArea->icon) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs font-mono">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $focusArea->order) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Hero Image URL</label>
                <input type="url" name="image" value="{{ old('image', $focusArea->image) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
            </div>
        </div>

        <!-- Multilingual Tabs -->
        <div class="pt-6 border-t border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-bold text-[#073B63] uppercase tracking-wider">Multilingual Titles & Descriptions</span>
                <div class="flex space-x-2 bg-gray-100 p-1 rounded-xl text-xs font-bold">
                    <button type="button" @click="langTab = 'mr'" :class="langTab === 'mr' ? 'bg-white shadow text-[#138A4B]' : 'text-gray-600'" class="px-3 py-1.5 rounded-lg transition">मराठी</button>
                    <button type="button" @click="langTab = 'hi'" :class="langTab === 'hi' ? 'bg-white shadow text-[#138A4B]' : 'text-gray-600'" class="px-3 py-1.5 rounded-lg transition">हिंदी</button>
                    <button type="button" @click="langTab = 'en'" :class="langTab === 'en' ? 'bg-white shadow text-[#138A4B]' : 'text-gray-600'" class="px-3 py-1.5 rounded-lg transition">English</button>
                </div>
            </div>

            <!-- Marathi -->
            @php $tMr = $trans['mr'] ?? null; @endphp
            <div x-show="langTab === 'mr'" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">शीर्षक (Title - Marathi) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr', $tMr?->title) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">संक्षिप्त माहिती (Short Description)</label>
                    <textarea name="short_description_mr" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('short_description_mr', $tMr?->short_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">सविस्तर वर्णन (Full Description)</label>
                    <textarea name="description_mr" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('description_mr', $tMr?->description) }}</textarea>
                </div>
            </div>

            <!-- Hindi -->
            @php $tHi = $trans['hi'] ?? null; @endphp
            <div x-show="langTab === 'hi'" class="space-y-4" style="display: none;">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">शीर्षक (Title - Hindi)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi', $tHi?->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">संक्षिप्त विवरण (Short Description)</label>
                    <textarea name="short_description_hi" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('short_description_hi', $tHi?->short_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">विस्तृत विवरण (Full Description)</label>
                    <textarea name="description_hi" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('description_hi', $tHi?->description) }}</textarea>
                </div>
            </div>

            <!-- English -->
            @php $tEn = $trans['en'] ?? null; @endphp
            <div x-show="langTab === 'en'" class="space-y-4" style="display: none;">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Title (English)</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $tEn?->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Short Description</label>
                    <textarea name="short_description_en" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('short_description_en', $tEn?->short_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Full Description</label>
                    <textarea name="description_en" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('description_en', $tEn?->description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="pt-6 border-t border-gray-100 flex items-center justify-between">
            <label class="flex items-center space-x-2 text-xs font-bold text-gray-700">
                <input type="checkbox" name="is_active" value="1" {{ $focusArea->is_active ? 'checked' : '' }} class="rounded text-[#138A4B]">
                <span>Active on Public Website</span>
            </label>

            <div class="space-x-3">
                <a href="{{ route('admin.focus-areas.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold">Cancel</a>
                <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#073B63] hover:bg-[#052a47] text-white text-xs font-bold shadow-md transition">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
