@extends('layouts.admin', ['title' => 'Edit Project', 'header' => 'Edit Project: ' . ($project->translation('mr')?->title ?? $project->slug)])

@section('content')

<div class="max-w-4xl bg-white rounded-3xl p-8 border border-gray-100 shadow-sm" x-data="{ langTab: 'mr' }">
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- General Parameters -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Focus Area *</label>
                <select name="focus_area_id" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
                    @foreach($focusAreas as $fa)
                        <option value="{{ $fa->id }}" {{ $project->focus_area_id == $fa->id ? 'selected' : '' }}>
                            {{ $fa->translation('mr')?->title }} ({{ $fa->slug }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Project Status *</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
                    <option value="ongoing" {{ $project->status === 'ongoing' ? 'selected' : '' }}>चालू / Ongoing</option>
                    <option value="completed" {{ $project->status === 'completed' ? 'selected' : '' }}>पूर्ण / Completed</option>
                    <option value="upcoming" {{ $project->status === 'upcoming' ? 'selected' : '' }}>नियोजित / Upcoming</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">URL Slug *</label>
                <input type="text" name="slug" value="{{ old('slug', $project->slug) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Location</label>
                <input type="text" name="location" value="{{ old('location', $project->location) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Beneficiaries Count</label>
                <input type="text" name="beneficiaries_count" value="{{ old('beneficiaries_count', $project->beneficiaries_count) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Target Amount (₹)</label>
                <input type="number" name="target_amount" value="{{ old('target_amount', (int)$project->target_amount) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
            </div>
        </div>

        <!-- Featured Image -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-gray-100 items-center">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Upload New Image</label>
                <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#EAF7EF] file:text-[#138A4B]">
                <input type="url" name="featured_image" value="{{ old('featured_image', $project->featured_image) }}" placeholder="Or direct image URL" class="w-full mt-2 px-3 py-1.5 rounded-lg border border-gray-200 text-xs">
            </div>
            <div>
                @if($project->featured_image)
                    <div class="w-32 h-20 rounded-xl overflow-hidden shadow-sm border border-gray-200">
                        <img src="{{ $project->featured_image }}" alt="Preview" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </div>

        <!-- Multilingual Content Tabs -->
        <div class="pt-6 border-t border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-bold text-[#073B63] uppercase tracking-wider">Multilingual Details</span>
                <div class="flex space-x-2 bg-gray-100 p-1 rounded-xl text-xs font-bold">
                    <button type="button" @click="langTab = 'mr'" :class="langTab === 'mr' ? 'bg-white shadow text-[#138A4B]' : 'text-gray-600'" class="px-3 py-1.5 rounded-lg transition">मराठी</button>
                    <button type="button" @click="langTab = 'hi'" :class="langTab === 'hi' ? 'bg-white shadow text-[#138A4B]' : 'text-gray-600'" class="px-3 py-1.5 rounded-lg transition">हिंदी</button>
                    <button type="button" @click="langTab = 'en'" :class="langTab === 'en' ? 'bg-white shadow text-[#138A4B]' : 'text-gray-600'" class="px-3 py-1.5 rounded-lg transition">English</button>
                </div>
            </div>

            <!-- Marathi Tab -->
            @php $tMr = $trans['mr'] ?? null; @endphp
            <div x-show="langTab === 'mr'" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">प्रकल्प नाव (Title - Marathi) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr', $tMr?->title) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">संक्षिप्त माहिती (Short Description - Marathi)</label>
                    <textarea name="short_description_mr" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('short_description_mr', $tMr?->short_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">सविस्तर वर्णन (Description - Marathi)</label>
                    <textarea name="description_mr" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('description_mr', $tMr?->description) }}</textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">समस्या (Problem Statement)</label>
                        <textarea name="problem_statement_mr" rows="3" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('problem_statement_mr', $tMr?->problem_statement) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">उपाय (Solution)</label>
                        <textarea name="solution_mr" rows="3" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('solution_mr', $tMr?->solution) }}</textarea>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">साध्य झालेला प्रभाव (Impact Summary)</label>
                    <input type="text" name="impact_text_mr" value="{{ old('impact_text_mr', $tMr?->impact_text) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
                </div>
            </div>

            <!-- Hindi Tab -->
            @php $tHi = $trans['hi'] ?? null; @endphp
            <div x-show="langTab === 'hi'" class="space-y-4" style="display: none;">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">परियोजना नाम (Title - Hindi)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi', $tHi?->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">संक्षिप्त विवरण (Short Description - Hindi)</label>
                    <textarea name="short_description_hi" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('short_description_hi', $tHi?->short_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">विस्तृत विवरण (Description - Hindi)</label>
                    <textarea name="description_hi" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('description_hi', $tHi?->description) }}</textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">समस्या (Problem Statement)</label>
                        <textarea name="problem_statement_hi" rows="3" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('problem_statement_hi', $tHi?->problem_statement) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">समाधान (Solution)</label>
                        <textarea name="solution_hi" rows="3" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('solution_hi', $tHi?->solution) }}</textarea>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">प्रभाव (Impact Summary)</label>
                    <input type="text" name="impact_text_hi" value="{{ old('impact_text_hi', $tHi?->impact_text) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
                </div>
            </div>

            <!-- English Tab -->
            @php $tEn = $trans['en'] ?? null; @endphp
            <div x-show="langTab === 'en'" class="space-y-4" style="display: none;">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Project Title (English)</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $tEn?->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Short Description (English)</label>
                    <textarea name="short_description_en" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('short_description_en', $tEn?->short_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Full Description (English)</label>
                    <textarea name="description_en" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('description_en', $tEn?->description) }}</textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Problem Statement (English)</label>
                        <textarea name="problem_statement_en" rows="3" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('problem_statement_en', $tEn?->problem_statement) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Solution (English)</label>
                        <textarea name="solution_en" rows="3" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('solution_en', $tEn?->solution) }}</textarea>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Impact Summary (English)</label>
                    <input type="text" name="impact_text_en" value="{{ old('impact_text_en', $tEn?->impact_text) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs">
                </div>
            </div>
        </div>

        <!-- Controls: Featured, Published, Order -->
        <div class="pt-6 border-t border-gray-100 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center space-x-6 text-xs">
                <label class="flex items-center space-x-2 cursor-pointer font-bold text-gray-700">
                    <input type="checkbox" name="is_featured" value="1" {{ $project->is_featured ? 'checked' : '' }} class="rounded text-[#138A4B]">
                    <span>Feature on Homepage</span>
                </label>
                <label class="flex items-center space-x-2 cursor-pointer font-bold text-gray-700">
                    <input type="checkbox" name="is_published" value="1" {{ $project->is_published ? 'checked' : '' }} class="rounded text-[#138A4B]">
                    <span>Published Active</span>
                </label>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold hover:bg-gray-50 transition">Cancel</a>
                <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#073B63] hover:bg-[#052a47] text-white text-xs font-bold shadow-md transition">
                    Update Project
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
