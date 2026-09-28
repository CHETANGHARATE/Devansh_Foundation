@extends('layouts.admin', ['title' => 'Add Impact Statistic', 'header' => 'Add New Impact Counter'])

@section('content')

<div class="max-w-2xl bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
    <form action="{{ route('admin.impact-stats.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Numeric Value *</label>
                <input type="number" name="number_value" required placeholder="10000" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Suffix (+ / %)</label>
                <input type="text" name="number_suffix" value="+" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Lucide Icon</label>
                <input type="text" name="icon" value="users" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-mono">
            </div>
        </div>

        <div class="space-y-4 pt-4 border-t border-gray-100">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">लेबल (मराठी) *</label>
                <input type="text" name="label_mr" required placeholder="उदा. लाभार्थी / पूर्ण प्रकल्प" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">लेबल (हिंदी)</label>
                <input type="text" name="label_hi" placeholder="उदा. लाभार्थी / पूर्ण परियोजनाएं" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Label (English)</label>
                <input type="text" name="label_en" placeholder="e.g. Beneficiaries Reached" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">वर्णन / Description (Marathi)</label>
            <textarea name="description_mr" rows="2" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs"></textarea>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <a href="{{ route('admin.impact-stats.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold">Cancel</a>
            <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-md">
                Save Statistic
            </button>
        </div>
    </form>
</div>

@endsection
