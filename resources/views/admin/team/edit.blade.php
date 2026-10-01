@extends('layouts.admin', ['title' => 'Edit Team Member', 'header' => 'Edit Team Member'])

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-gray-800">Edit Team Member</h3>
            <p class="text-xs text-gray-500">Update team member biography, role, or upload a new portrait photo</p>
        </div>
        <a href="{{ route('admin.team.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition">
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

    <form action="{{ route('admin.team.update', $member) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-gray-100 p-6 sm:p-8 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        <!-- General Info -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $member->order) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Email Address (Optional)</label>
                <input type="email" name="email" value="{{ old('email', $member->email) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">LinkedIn Profile URL (Optional)</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $member->linkedin_url) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
            </div>
        </div>

        <!-- Photo Upload -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
            @if($member->photo)
                <img src="{{ asset($member->photo) }}" class="w-16 h-16 rounded-2xl object-cover border border-gray-200 shadow-sm shrink-0" alt="{{ $member->t('name') }}">
            @endif
            <div class="flex-1">
                <label class="block text-xs font-bold text-gray-700 mb-1">Change Portrait Photo</label>
                <input type="file" name="photo_file" accept="image/*" class="w-full text-xs rounded-xl border border-gray-200 p-2 focus:border-[#138A4B] focus:ring-0">
                <p class="text-[11px] text-gray-400 mt-1">Leave blank to retain current photo.</p>
            </div>
        </div>

        <!-- Names (Multilingual) -->
        <div class="border-t border-gray-100 pt-5 space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Member Name (Multilingual)</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Name (English) *</label>
                    <input type="text" name="name_en" value="{{ old('name_en', $member->t('name', 'en')) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Name (Marathi) *</label>
                    <input type="text" name="name_mr" value="{{ old('name_mr', $member->t('name', 'mr')) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Name (Hindi)</label>
                    <input type="text" name="name_hi" value="{{ old('name_hi', $member->t('name', 'hi')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
            </div>
        </div>

        <!-- Roles (Multilingual) -->
        <div class="border-t border-gray-100 pt-5 space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Role / Designation (Multilingual)</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Role (English) *</label>
                    <input type="text" name="role_en" value="{{ old('role_en', $member->t('role', 'en')) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Role (Marathi) *</label>
                    <input type="text" name="role_mr" value="{{ old('role_mr', $member->t('role', 'mr')) }}" required class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Role (Hindi)</label>
                    <input type="text" name="role_hi" value="{{ old('role_hi', $member->t('role', 'hi')) }}" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">
                </div>
            </div>
        </div>

        <!-- Bio (Multilingual) -->
        <div class="border-t border-gray-100 pt-5 space-y-4">
            <h4 class="text-xs font-bold text-gray-800 uppercase tracking-wider">Bio & Background</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Bio (English)</label>
                    <textarea name="bio_en" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('bio_en', $member->t('bio', 'en')) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Bio (Marathi)</label>
                    <textarea name="bio_mr" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('bio_mr', $member->t('bio', 'mr')) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Bio (Hindi)</label>
                    <textarea name="bio_hi" rows="3" class="w-full text-xs rounded-xl border-gray-200 p-2.5 focus:border-[#138A4B] focus:ring-0">{{ old('bio_hi', $member->t('bio', 'hi')) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Checkbox Controls -->
        <div class="border-t border-gray-100 pt-5 flex flex-wrap items-center gap-6">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_demo" value="1" {{ old('is_demo', $member->is_demo) ? 'checked' : '' }} class="rounded text-[#138A4B] focus:ring-0">
                <span class="text-xs font-bold text-gray-700">Mark as Demo Profile</span>
            </label>

            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $member->is_active) ? 'checked' : '' }} class="rounded text-[#138A4B] focus:ring-0">
                <span class="text-xs font-bold text-gray-700">Active (Visible on Website)</span>
            </label>
        </div>

        <div class="border-t border-gray-100 pt-5 flex justify-end gap-3">
            <a href="{{ route('admin.team.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-600 text-xs font-bold hover:bg-gray-50 transition">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#138A4B] hover:bg-[#0f6c3a] text-white text-xs font-bold shadow transition">
                Update Team Member
            </button>
        </div>
    </form>
</div>

@endsection
