@extends('layouts.admin', ['title' => 'Edit Award', 'header' => 'Edit Award'])

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-gray-800">Edit Award & Recognition</h3>
            <p class="text-xs text-gray-500">Update citation, conferred body, or upload official certificate scan</p>
        </div>
        <a href="{{ route('admin.awards.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition">
            <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back to List
        </a>
    </div>

    @if($errors->any())
        <div class="p-4 rounded-xl bg-red-50 text-red-700 text-xs font-semibold border border-red-200">
            <ul class="list-disc pl-4 space-y-1">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.awards.update', $award) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-gray-100 p-6 sm:p-8 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        <!-- General Info -->
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Year *</label>
                <input type="text" name="year" value="{{ old('year', $award->year) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Category Code *</label>
                <input type="text" name="category" value="{{ old('category', $award->category) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $award->order) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Icon Style</label>
                <select name="icon" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                    <option value="award" {{ old('icon', $award->icon) === 'award' ? 'selected' : '' }}>Award Medal</option>
                    <option value="trophy" {{ old('icon', $award->icon) === 'trophy' ? 'selected' : '' }}>Trophy</option>
                    <option value="medal" {{ old('icon', $award->icon) === 'medal' ? 'selected' : '' }}>Medal Ribbon</option>
                    <option value="graduation-cap" {{ old('icon', $award->icon) === 'graduation-cap' ? 'selected' : '' }}>Education Cap</option>
                    <option value="heart" {{ old('icon', $award->icon) === 'heart' ? 'selected' : '' }}>Heart / Compassion</option>
                </select>
            </div>
        </div>

        <!-- Certificate File Upload -->
        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Upload Official Certificate (Replace existing)</label>
            <input type="file" name="certificate_file" accept="image/*,application/pdf" class="w-full text-xs rounded-xl border border-gray-200 p-2 focus:border-[#138A4B] focus:ring-0">
            @if($award->certificate_image)
                <p class="text-[11px] text-emerald-700 font-medium mt-1">Current file: {{ $award->certificate_image }}</p>
            @else
                <p class="text-[11px] text-amber-700 font-medium mt-1">Currently marked as Demo. Certificate scan pending.</p>
            @endif
        </div>

        <!-- Award Titles (Multilingual) -->
        <div class="border-t border-gray-100 pt-5 space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Award Title (Multilingual)</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Title (English) *</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $award->t('title', 'en')) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Title (Marathi) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr', $award->t('title', 'mr')) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Title (Hindi)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi', $award->t('title', 'hi')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
            </div>
        </div>

        <!-- Category Names (Multilingual) -->
        <div class="border-t border-gray-100 pt-5 space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Category Display Name (Multilingual)</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Category (English)</label>
                    <input type="text" name="category_name_en" value="{{ old('category_name_en', $award->t('category_name', 'en')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Category (Marathi)</label>
                    <input type="text" name="category_name_mr" value="{{ old('category_name_mr', $award->t('category_name', 'mr')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Category (Hindi)</label>
                    <input type="text" name="category_name_hi" value="{{ old('category_name_hi', $award->t('category_name', 'hi')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
            </div>
        </div>

        <!-- Conferred By (Multilingual) -->
        <div class="border-t border-gray-100 pt-5 space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Conferred By / Organization (Multilingual)</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Conferred By (English)</label>
                    <input type="text" name="conferred_by_en" value="{{ old('conferred_by_en', $award->t('conferred_by', 'en')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Conferred By (Marathi)</label>
                    <input type="text" name="conferred_by_mr" value="{{ old('conferred_by_mr', $award->t('conferred_by', 'mr')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Conferred By (Hindi)</label>
                    <input type="text" name="conferred_by_hi" value="{{ old('conferred_by_hi', $award->t('conferred_by', 'hi')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
            </div>
        </div>

        <!-- Description (Multilingual) -->
        <div class="border-t border-gray-100 pt-5 space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Description & Citation</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Description (English)</label>
                    <textarea name="description_en" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('description_en', $award->t('description', 'en')) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Description (Marathi)</label>
                    <textarea name="description_mr" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('description_mr', $award->t('description', 'mr')) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Description (Hindi)</label>
                    <textarea name="description_hi" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('description_hi', $award->t('description', 'hi')) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Checkbox Controls -->
        <div class="border-t border-gray-100 pt-5 flex flex-wrap items-center gap-6">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_demo" value="1" {{ old('is_demo', $award->is_demo) ? 'checked' : '' }} class="rounded text-[#138A4B] focus:ring-0">
                <span class="text-xs font-bold text-gray-700">Mark as Sample / Demo Recognition</span>
            </label>

            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $award->is_published) ? 'checked' : '' }} class="rounded text-[#138A4B] focus:ring-0">
                <span class="text-xs font-bold text-gray-700">Published (Visible on Website)</span>
            </label>
        </div>

        <div class="border-t border-gray-100 pt-5 flex justify-end gap-3">
            <a href="{{ route('admin.awards.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-600 text-xs font-bold hover:bg-gray-50 transition">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#138A4B] hover:bg-[#0f6c3a] text-white text-xs font-bold shadow transition">
                Update Award
            </button>
        </div>
    </form>
</div>

@endsection
