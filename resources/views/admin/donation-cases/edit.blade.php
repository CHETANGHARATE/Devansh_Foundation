@extends('layouts.admin', ['title' => 'Edit Urgent Case', 'header' => 'Edit Urgent Case'])

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-gray-800">Edit Urgent Case: {{ $donationCase->beneficiary_name }}</h3>
            <p class="text-xs text-gray-500">Update funding goals, progress, photos, and translations</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('donate', ['case' => $donationCase->slug]) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-200 text-gray-700 text-xs font-bold hover:bg-gray-50 transition">
                <i data-lucide="external-link" class="w-3.5 h-3.5"></i> View on Site
            </a>
            <a href="{{ route('admin.donation-cases.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gray-100 text-gray-700 text-xs font-bold hover:bg-gray-200 transition">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back
            </a>
        </div>
    </div>

    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-50 text-rose-800 text-xs font-semibold border border-rose-200 space-y-1">
            <div class="font-bold">Please correct the following errors:</div>
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.donation-cases.update', $donationCase) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Core Details Card -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm space-y-6">
            <h4 class="text-sm font-bold text-gray-800 border-b border-gray-100 pb-3 flex items-center gap-2">
                <i data-lucide="info" class="w-4 h-4 text-[#138A4B]"></i> Primary Beneficiary & Target Information
            </h4>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Beneficiary / Person Name *</label>
                    <input type="text" name="beneficiary_name" value="{{ old('beneficiary_name', $donationCase->beneficiary_name) }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Slug (URL identifier)</label>
                    <input type="text" name="slug" value="{{ old('slug', $donationCase->slug) }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Target Amount (₹) *</label>
                    <input type="number" step="0.01" name="target_amount" value="{{ old('target_amount', $donationCase->target_amount) }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-900 focus:border-[#138A4B]">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Collected Amount (₹)</label>
                    <input type="number" step="0.01" name="collected_amount" value="{{ old('collected_amount', $donationCase->collected_amount) }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs text-gray-900 focus:border-[#138A4B]">
                    <div class="text-[10px] text-gray-400 mt-1">Current Progress: <strong class="text-emerald-700">{{ $donationCase->progress_percentage }}%</strong></div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Expense Label</label>
                    <input type="text" name="expense_label" value="{{ old('expense_label', $donationCase->expense_label) }}" placeholder="e.g. Treatment Expense" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Category</label>
                    <select name="category" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                        <option value="medical" {{ old('category', $donationCase->category) == 'medical' ? 'selected' : '' }}>Medical</option>
                        <option value="child_welfare" {{ old('category', $donationCase->category) == 'child_welfare' ? 'selected' : '' }}>Child Welfare</option>
                        <option value="education" {{ old('category', $donationCase->category) == 'education' ? 'selected' : '' }}>Education</option>
                        <option value="emergency" {{ old('category', $donationCase->category) == 'emergency' ? 'selected' : '' }}>Emergency Relief</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Category Icon</label>
                    <select name="category_icon" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                        <option value="baby" {{ old('category_icon', $donationCase->category_icon) == 'baby' ? 'selected' : '' }}>Baby (Neonatal / Infant)</option>
                        <option value="heart-pulse" {{ old('category_icon', $donationCase->category_icon) == 'heart-pulse' ? 'selected' : '' }}>Heart / Cardiac</option>
                        <option value="activity" {{ old('category_icon', $donationCase->category_icon) == 'activity' ? 'selected' : '' }}>Activity / Medical</option>
                        <option value="book-open" {{ old('category_icon', $donationCase->category_icon) == 'book-open' ? 'selected' : '' }}>Book (Education)</option>
                        <option value="accessibility" {{ old('category_icon', $donationCase->category_icon) == 'accessibility' ? 'selected' : '' }}>Accessibility / Orthopedic</option>
                        <option value="sparkles" {{ old('category_icon', $donationCase->category_icon) == 'sparkles' ? 'selected' : '' }}>Sparkles / Rehabilitation</option>
                        <option value="flame" {{ old('category_icon', $donationCase->category_icon) == 'flame' ? 'selected' : '' }}>Flame / Emergency</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Status *</label>
                    <select name="status" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs font-bold focus:border-[#138A4B]">
                        <option value="active" {{ old('status', $donationCase->status) == 'active' ? 'selected' : '' }}>Active (Show on Carousel)</option>
                        <option value="completed" {{ old('status', $donationCase->status) == 'completed' ? 'selected' : '' }}>Completed (Goal Achieved)</option>
                        <option value="paused" {{ old('status', $donationCase->status) == 'paused' ? 'selected' : '' }}>Paused</option>
                        <option value="closed" {{ old('status', $donationCase->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', $donationCase->order) }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                </div>
            </div>

            <!-- Demo / Real Switch -->
            <div class="flex items-center space-x-3 p-3.5 bg-amber-50/70 border border-amber-200 rounded-2xl">
                <input type="checkbox" name="is_demo" id="is_demo" value="1" {{ old('is_demo', $donationCase->is_demo) ? 'checked' : '' }} class="w-4 h-4 rounded text-[#138A4B] focus:ring-[#138A4B]">
                <div>
                    <label for="is_demo" class="text-xs font-bold text-amber-900 cursor-pointer">
                        Mark as Demo / Fictional Case (for UI testing & demonstration)
                    </label>
                    <p class="text-[11px] text-amber-700">Leave unchecked for genuine verified beneficiary fundraising cases.</p>
                </div>
            </div>

            <!-- Current Image & Update -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2 border-t border-gray-100 items-center">
                @if($donationCase->image)
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Current Image</label>
                        <img src="{{ asset($donationCase->image) }}" class="w-32 h-20 rounded-xl object-cover border border-gray-200 shadow-sm" alt="Case image">
                    </div>
                @endif
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Replace Photo</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Or Image Path</label>
                    <input type="text" name="image" value="{{ old('image', $donationCase->image) }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                </div>
            </div>
        </div>

        <!-- Multilingual Content Tabs (English, Marathi, Hindi) -->
        <div x-data="{ tab: 'en' }" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm space-y-6">
            <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                <h4 class="text-sm font-bold text-gray-800 flex items-center gap-2">
                    <i data-lucide="languages" class="w-4 h-4 text-[#138A4B]"></i> Multilingual Translations
                </h4>
                <div class="flex space-x-1 bg-gray-100 p-1 rounded-xl">
                    <button type="button" @click="tab = 'en'" :class="tab === 'en' ? 'bg-white shadow text-[#138A4B] font-bold' : 'text-gray-600'" class="px-3 py-1 rounded-lg text-xs transition">English</button>
                    <button type="button" @click="tab = 'mr'" :class="tab === 'mr' ? 'bg-white shadow text-[#138A4B] font-bold' : 'text-gray-600'" class="px-3 py-1 rounded-lg text-xs transition">मराठी (Marathi)</button>
                    <button type="button" @click="tab = 'hi'" :class="tab === 'hi' ? 'bg-white shadow text-[#138A4B] font-bold' : 'text-gray-600'" class="px-3 py-1 rounded-lg text-xs transition">हिन्दी (Hindi)</button>
                </div>
            </div>

            <!-- English Tab -->
            <div x-show="tab === 'en'" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Case Title (English) *</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $trans['en']->title ?? $donationCase->beneficiary_name) }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Category Badge Label (English)</label>
                        <input type="text" name="category_name_en" value="{{ old('category_name_en', $trans['en']->category_name ?? '') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Expense Strip Label (English)</label>
                        <input type="text" name="expense_label_en" value="{{ old('expense_label_en', $trans['en']->expense_label ?? 'Treatment Expense') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Urgent Support Headline (English)</label>
                    <textarea name="urgent_message_en" rows="2" class="w-full px-3.5 py-2 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">{{ old('urgent_message_en', $trans['en']->urgent_message ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Short Case Description (English)</label>
                    <textarea name="description_en" rows="4" class="w-full px-3.5 py-2 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">{{ old('description_en', $trans['en']->description ?? '') }}</textarea>
                </div>
            </div>

            <!-- Marathi Tab -->
            <div x-show="tab === 'mr'" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">प्रकरणाचे शीर्षक (मराठी) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr', $trans['mr']->title ?? '') }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">श्रेणी नाव (मराठी)</label>
                        <input type="text" name="category_name_mr" value="{{ old('category_name_mr', $trans['mr']->category_name ?? '') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">खर्च लेबल (मराठी)</label>
                        <input type="text" name="expense_label_mr" value="{{ old('expense_label_mr', $trans['mr']->expense_label ?? 'उपचार खर्च') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">तातडीचे आवाहन / हेडलाइन (मराठी)</label>
                    <textarea name="urgent_message_mr" rows="2" class="w-full px-3.5 py-2 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">{{ old('urgent_message_mr', $trans['mr']->urgent_message ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">सविस्तर वर्णन (मराठी)</label>
                    <textarea name="description_mr" rows="4" class="w-full px-3.5 py-2 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">{{ old('description_mr', $trans['mr']->description ?? '') }}</textarea>
                </div>
            </div>

            <!-- Hindi Tab -->
            <div x-show="tab === 'hi'" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">प्रकरण शीर्षक (हिन्दी)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi', $trans['hi']->title ?? '') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">श्रेणी नाम (हिन्दी)</label>
                        <input type="text" name="category_name_hi" value="{{ old('category_name_hi', $trans['hi']->category_name ?? '') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">खर्च लेबल (हिन्दी)</label>
                        <input type="text" name="expense_label_hi" value="{{ old('expense_label_hi', $trans['hi']->expense_label ?? 'इलाज का खर्च') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">आपातकालीन अपील / शीर्षक (हिन्दी)</label>
                    <textarea name="urgent_message_hi" rows="2" class="w-full px-3.5 py-2 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">{{ old('urgent_message_hi', $trans['hi']->urgent_message ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">विस्तृत विवरण (हिन्दी)</label>
                    <textarea name="description_hi" rows="4" class="w-full px-3.5 py-2 rounded-xl border border-gray-200 text-xs focus:border-[#138A4B]">{{ old('description_hi', $trans['hi']->description ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="{{ route('admin.donation-cases.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-700 text-xs font-bold hover:bg-gray-50 transition">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition">
                Save Changes
            </button>
        </div>
    </form>
</div>

@endsection
