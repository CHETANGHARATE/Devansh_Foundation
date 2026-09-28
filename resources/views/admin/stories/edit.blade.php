@extends('layouts.admin', ['title' => 'Edit Success Story', 'header' => 'Edit Beneficiary Story'])

@section('content')

<div class="max-w-4xl bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
    <form action="{{ route('admin.stories.update', $story->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Beneficiary Name *</label>
                <input type="text" name="person_name" value="{{ old('person_name', $story->person_name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Role / Location</label>
                <input type="text" name="person_role_or_location" value="{{ old('person_role_or_location', $story->person_role_or_location) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Related Project</label>
                <select name="project_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    <option value="">-- General Foundation Story --</option>
                    @foreach($projects as $p)
                        <option value="{{ $p->id }}" {{ $story->project_id == $p->id ? 'selected' : '' }}>{{ $p->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Order</label>
                <input type="number" name="order" value="{{ old('order', $story->order) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Replace Photo</label>
                <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#EAF7EF] file:text-[#138A4B]">
                @if($story->image)
                    <div class="mt-2 flex items-center gap-2">
                        <img src="{{ $story->image }}" class="w-10 h-10 rounded-lg object-cover border" alt="Preview">
                        <span class="text-[11px] text-gray-400">Current Image</span>
                    </div>
                @endif
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Or Photo URL</label>
                <input type="url" name="image" value="{{ old('image', $story->image) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
        </div>

        <div class="flex items-center gap-6 pt-2">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ $story->is_featured ? 'checked' : '' }} class="w-4 h-4 rounded text-[#138A4B]">
                <span class="text-xs font-bold text-gray-700">Feature on Homepage</span>
            </label>
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" {{ $story->is_published ? 'checked' : '' }} class="w-4 h-4 rounded text-[#138A4B]">
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
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">कथेचे शीर्षक (मराठी) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr', $trans['mr']->title ?? '') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">कोट / उद्धरण (Quote)</label>
                    <input type="text" name="quote_mr" value="{{ old('quote_mr', $trans['mr']->quote ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm italic">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">सविस्तर कथा *</label>
                    <textarea name="story_mr" rows="5" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('story_mr', $trans['mr']->story ?? '') }}</textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">सुरुवातीचे आव्हान (Challenge)</label>
                        <input type="text" name="challenge_mr" value="{{ old('challenge_mr', $trans['mr']->challenge ?? '') }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">संस्थेचा पाठिंबा (Support)</label>
                        <input type="text" name="support_received_mr" value="{{ old('support_received_mr', $trans['mr']->support_received ?? '') }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">सकारात्मक परिणाम (Outcome)</label>
                        <input type="text" name="outcome_mr" value="{{ old('outcome_mr', $trans['mr']->outcome ?? '') }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                    </div>
                </div>
            </div>

            <!-- Hindi -->
            <div x-show="tab === 'hi'" class="space-y-4" style="display: none;">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">कहानी का शीर्षक (हिंदी)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi', $trans['hi']->title ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">उद्धरण (Quote)</label>
                    <input type="text" name="quote_hi" value="{{ old('quote_hi', $trans['hi']->quote ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm italic">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">विस्तृत कहानी</label>
                    <textarea name="story_hi" rows="5" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('story_hi', $trans['hi']->story ?? '') }}</textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">चुनौती</label>
                        <input type="text" name="challenge_hi" value="{{ old('challenge_hi', $trans['hi']->challenge ?? '') }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">संस्था का सहयोग</label>
                        <input type="text" name="support_received_hi" value="{{ old('support_received_hi', $trans['hi']->support_received ?? '') }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">सकारात्मक परिणाम</label>
                        <input type="text" name="outcome_hi" value="{{ old('outcome_hi', $trans['hi']->outcome ?? '') }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                    </div>
                </div>
            </div>

            <!-- English -->
            <div x-show="tab === 'en'" class="space-y-4" style="display: none;">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Story Title (English)</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $trans['en']->title ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Quote</label>
                    <input type="text" name="quote_en" value="{{ old('quote_en', $trans['en']->quote ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm italic">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Detailed Story</label>
                    <textarea name="story_en" rows="5" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('story_en', $trans['en']->story ?? '') }}</textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Initial Challenge</label>
                        <input type="text" name="challenge_en" value="{{ old('challenge_en', $trans['en']->challenge ?? '') }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Support Received</label>
                        <input type="text" name="support_received_en" value="{{ old('support_received_en', $trans['en']->support_received ?? '') }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Outcome</label>
                        <input type="text" name="outcome_en" value="{{ old('outcome_en', $trans['en']->outcome ?? '') }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
            <a href="{{ route('admin.stories.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold">Cancel</a>
            <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-md hover:bg-[#0f6c3a] transition-colors">
                Update Story
            </button>
        </div>
    </form>
</div>

@endsection
