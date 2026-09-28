@extends('layouts.admin', ['title' => 'Edit Impact Statistic', 'header' => 'Edit Impact Counter'])

@section('content')

<div class="max-w-2xl bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
    <form action="{{ route('admin.impact-stats.update', $impactStat->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Numeric Value *</label>
                <input type="number" name="number_value" value="{{ old('number_value', $impactStat->number_value) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Suffix (+ / %)</label>
                <input type="text" name="number_suffix" value="{{ old('number_suffix', $impactStat->number_suffix) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Lucide Icon</label>
                <input type="text" name="icon" value="{{ old('icon', $impactStat->icon) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-mono">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $impactStat->order) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
            <div class="flex items-center pt-6">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $impactStat->is_active ? 'checked' : '' }} class="w-4 h-4 rounded text-[#138A4B]">
                    <span class="text-xs font-bold text-gray-700">Active (Visible on public site)</span>
                </label>
            </div>
        </div>

        <div class="space-y-4 pt-4 border-t border-gray-100">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">लेबल (मराठी) *</label>
                <input type="text" name="label_mr" value="{{ old('label_mr', $trans['mr']->label ?? '') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">लेबल (हिंदी)</label>
                <input type="text" name="label_hi" value="{{ old('label_hi', $trans['hi']->label ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Label (English)</label>
                <input type="text" name="label_en" value="{{ old('label_en', $trans['en']->label ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">वर्णन / Description (Marathi)</label>
            <textarea name="description_mr" rows="2" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('description_mr', $trans['mr']->description ?? '') }}</textarea>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <a href="{{ route('admin.impact-stats.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold">Cancel</a>
            <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-md hover:bg-[#0f6c3a] transition-colors">
                Update Statistic
            </button>
        </div>
    </form>
</div>

@endsection
