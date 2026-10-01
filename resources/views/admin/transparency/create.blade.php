@extends('layouts.admin', ['title' => 'Add Transparency Document', 'header' => 'Add Document'])

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-gray-800">Add Transparency & Legal Document</h3>
            <p class="text-xs text-gray-500">Create a statutory document record with English, Marathi, and Hindi translations</p>
        </div>
        <a href="{{ route('admin.transparency.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition">
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

    <form action="{{ route('admin.transparency.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-gray-100 p-6 sm:p-8 shadow-sm space-y-6">
        @csrf

        <!-- General Info -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Document Type *</label>
                <select name="document_type" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0" required>
                    <option value="registration">Registration Certificate</option>
                    <option value="trust_deed">Trust Deed / Charter</option>
                    <option value="pan">PAN Document</option>
                    <option value="12a">Section 12A Registration</option>
                    <option value="80g">Section 80G Certificate</option>
                    <option value="annual_report">Annual Report</option>
                    <option value="audited_statement">Audited Financial Statement</option>
                    <option value="donation_utilization">Donation Utilization Report</option>
                    <option value="other">Other Statutory Document</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Display Order</label>
                <input type="number" name="order" value="{{ old('order', 1) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Icon Style</label>
                <select name="icon" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                    <option value="file-badge">Award / Badge</option>
                    <option value="file-check">Checkmark Document</option>
                    <option value="credit-card">PAN / Identity Card</option>
                    <option value="shield-check">Shield / Exemption</option>
                    <option value="heart-handshake">Heart Handshake / 80G</option>
                    <option value="book-open">Open Book / Annual Report</option>
                    <option value="file-bar-chart">Bar Chart / Audit</option>
                    <option value="pie-chart">Pie Chart / Utilization</option>
                </select>
            </div>
        </div>

        <!-- File Upload -->
        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Official Document File (PDF, Image)</label>
            <input type="file" name="document_file" class="w-full text-xs rounded-xl border border-gray-200 p-2 focus:border-[#138A4B] focus:ring-0">
            <p class="text-[11px] text-gray-400 mt-1">If left empty, this will remain marked as a Demo/Pending document.</p>
        </div>

        <!-- Multilingual Titles -->
        <div class="border-t border-gray-100 pt-5 space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Document Title (Multilingual)</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Title (English) *</label>
                    <input type="text" name="title_en" value="{{ old('title_en') }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Title (Marathi) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr') }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Title (Hindi)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi') }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
            </div>
        </div>

        <!-- Short Descriptions -->
        <div class="space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Short Summary (Displayed on Card)</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Summary (English)</label>
                    <textarea name="short_description_en" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('short_description_en') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Summary (Marathi)</label>
                    <textarea name="short_description_mr" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('short_description_mr') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Summary (Hindi)</label>
                    <textarea name="short_description_hi" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('short_description_hi') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Checkbox Controls -->
        <div class="border-t border-gray-100 pt-5 flex flex-wrap items-center gap-6">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_demo" value="1" {{ old('is_demo', true) ? 'checked' : '' }} class="rounded text-[#138A4B] focus:ring-0">
                <span class="text-xs font-bold text-gray-700">Mark as Demo / Sample Document</span>
            </label>

            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="rounded text-[#138A4B] focus:ring-0">
                <span class="text-xs font-bold text-gray-700">Published (Visible on Website)</span>
            </label>
        </div>

        <div class="border-t border-gray-100 pt-5 flex justify-end gap-3">
            <a href="{{ route('admin.transparency.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-600 text-xs font-bold hover:bg-gray-50 transition">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#138A4B] hover:bg-[#0f6c3a] text-white text-xs font-bold shadow transition">
                Save Document
            </button>
        </div>
    </form>
</div>

@endsection
