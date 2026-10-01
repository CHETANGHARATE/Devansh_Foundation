@extends('layouts.admin', ['title' => 'Edit Transparency Document', 'header' => 'Edit Document'])

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-gray-800">Edit Transparency & Legal Document</h3>
            <p class="text-xs text-gray-500">Update statutory document details and upload official certified files</p>
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

    <form action="{{ route('admin.transparency.update', $document) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-gray-100 p-6 sm:p-8 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        <!-- General Info -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Document Type *</label>
                <select name="document_type" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0" required>
                    <option value="registration" {{ old('document_type', $document->document_type) === 'registration' ? 'selected' : '' }}>Registration Certificate</option>
                    <option value="trust_deed" {{ old('document_type', $document->document_type) === 'trust_deed' ? 'selected' : '' }}>Trust Deed / Charter</option>
                    <option value="pan" {{ old('document_type', $document->document_type) === 'pan' ? 'selected' : '' }}>PAN Document</option>
                    <option value="12a" {{ old('document_type', $document->document_type) === '12a' ? 'selected' : '' }}>Section 12A Registration</option>
                    <option value="80g" {{ old('document_type', $document->document_type) === '80g' ? 'selected' : '' }}>Section 80G Certificate</option>
                    <option value="annual_report" {{ old('document_type', $document->document_type) === 'annual_report' ? 'selected' : '' }}>Annual Report</option>
                    <option value="audited_statement" {{ old('document_type', $document->document_type) === 'audited_statement' ? 'selected' : '' }}>Audited Financial Statement</option>
                    <option value="donation_utilization" {{ old('document_type', $document->document_type) === 'donation_utilization' ? 'selected' : '' }}>Donation Utilization Report</option>
                    <option value="other" {{ old('document_type', $document->document_type) === 'other' ? 'selected' : '' }}>Other Statutory Document</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $document->order) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Icon Style</label>
                <select name="icon" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                    <option value="file-badge" {{ old('icon', $document->icon) === 'file-badge' ? 'selected' : '' }}>Award / Badge</option>
                    <option value="file-check" {{ old('icon', $document->icon) === 'file-check' ? 'selected' : '' }}>Checkmark Document</option>
                    <option value="credit-card" {{ old('icon', $document->icon) === 'credit-card' ? 'selected' : '' }}>PAN / Identity Card</option>
                    <option value="shield-check" {{ old('icon', $document->icon) === 'shield-check' ? 'selected' : '' }}>Shield / Exemption</option>
                    <option value="heart-handshake" {{ old('icon', $document->icon) === 'heart-handshake' ? 'selected' : '' }}>Heart Handshake / 80G</option>
                    <option value="book-open" {{ old('icon', $document->icon) === 'book-open' ? 'selected' : '' }}>Open Book / Annual Report</option>
                    <option value="file-bar-chart" {{ old('icon', $document->icon) === 'file-bar-chart' ? 'selected' : '' }}>Bar Chart / Audit</option>
                    <option value="pie-chart" {{ old('icon', $document->icon) === 'pie-chart' ? 'selected' : '' }}>Pie Chart / Utilization</option>
                </select>
            </div>
        </div>

        <!-- File Upload -->
        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Upload Official Document (Replace existing)</label>
            <input type="file" name="document_file" class="w-full text-xs rounded-xl border border-gray-200 p-2 focus:border-[#138A4B] focus:ring-0">
            @if($document->file_path)
                <p class="text-[11px] text-emerald-700 font-medium mt-1">Current file: {{ $document->file_path }} ({{ $document->file_size }})</p>
            @else
                <p class="text-[11px] text-amber-700 font-medium mt-1">Currently marked as Demo. Upload a PDF to publish official file.</p>
            @endif
        </div>

        <!-- Multilingual Titles -->
        <div class="border-t border-gray-100 pt-5 space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Document Title (Multilingual)</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Title (English) *</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $document->t('title', 'en')) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Title (Marathi) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr', $document->t('title', 'mr')) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Title (Hindi)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi', $document->t('title', 'hi')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
            </div>
        </div>

        <!-- Short Descriptions -->
        <div class="space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Short Summary (Displayed on Card)</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Summary (English)</label>
                    <textarea name="short_description_en" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('short_description_en', $document->t('short_description', 'en')) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Summary (Marathi)</label>
                    <textarea name="short_description_mr" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('short_description_mr', $document->t('short_description', 'mr')) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Summary (Hindi)</label>
                    <textarea name="short_description_hi" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('short_description_hi', $document->t('short_description', 'hi')) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Checkbox Controls -->
        <div class="border-t border-gray-100 pt-5 flex flex-wrap items-center gap-6">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_demo" value="1" {{ old('is_demo', $document->is_demo) ? 'checked' : '' }} class="rounded text-[#138A4B] focus:ring-0">
                <span class="text-xs font-bold text-gray-700">Mark as Demo / Sample Document</span>
            </label>

            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $document->is_published) ? 'checked' : '' }} class="rounded text-[#138A4B] focus:ring-0">
                <span class="text-xs font-bold text-gray-700">Published (Visible on Website)</span>
            </label>
        </div>

        <div class="border-t border-gray-100 pt-5 flex justify-end gap-3">
            <a href="{{ route('admin.transparency.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-600 text-xs font-bold hover:bg-gray-50 transition">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#138A4B] hover:bg-[#0f6c3a] text-white text-xs font-bold shadow transition">
                Update Document
            </button>
        </div>
    </form>
</div>

@endsection
