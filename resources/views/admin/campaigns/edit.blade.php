@extends('layouts.admin', ['title' => 'Edit Featured Campaign', 'header' => 'Edit Campaign: ' . $campaign->title])

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-gray-800">Edit Campaign: {{ $campaign->title }}</h3>
            <p class="text-xs text-gray-500">Update amounts, images, descriptions and impact metric boxes</p>
        </div>
        <div class="flex items-center space-x-2">
            <a href="{{ route('campaigns.show', $campaign->slug) }}" target="_blank" class="px-3.5 py-2 rounded-xl bg-gray-100 text-gray-700 text-xs font-bold hover:bg-gray-200 transition flex items-center space-x-1">
                <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                <span>View Public Page</span>
            </a>
            <a href="{{ route('admin.campaigns.index') }}" class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700 text-xs font-bold hover:bg-gray-200 transition">
                ← Back to List
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="p-4 rounded-xl bg-rose-50 text-rose-800 text-xs font-semibold border border-rose-200">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.campaigns.update', $campaign) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Core Details -->
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm space-y-4">
            <h4 class="text-sm font-bold text-gray-800 border-b pb-2">1. Campaign Core Details</h4>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Target Amount (₹) *</label>
                    <input type="number" step="0.01" name="target_amount" value="{{ old('target_amount', $campaign->target_amount) }}" required class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Raised Amount (₹)</label>
                    <input type="number" step="0.01" name="raised_amount" value="{{ old('raised_amount', $campaign->raised_amount) }}" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Category *</label>
                    <input type="text" name="category" value="{{ old('category', $campaign->category) }}" required class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', $campaign->order) }}" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Status *</label>
                    <select name="status" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                        <option value="active" {{ old('status', $campaign->status) === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="paused" {{ old('status', $campaign->status) === 'paused' ? 'selected' : '' }}>Paused</option>
                        <option value="completed" {{ old('status', $campaign->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="closed" {{ old('status', $campaign->status) === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="flex items-center space-x-6 pt-3">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $campaign->is_featured) ? 'checked' : '' }} class="rounded text-[#138A4B]">
                        <span class="ml-2 text-xs font-semibold text-gray-700">Featured in Carousel</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $campaign->is_published) ? 'checked' : '' }} class="rounded text-[#138A4B]">
                        <span class="ml-2 text-xs font-semibold text-gray-700">Published</span>
                    </label>
                </div>
            </div>

            <!-- Current Image + Upload / URL -->
            <div class="pt-3 border-t space-y-3">
                <div class="flex items-center gap-4">
                    <img src="{{ asset(ltrim($campaign->featured_image, '/')) }}" alt="{{ $campaign->title }}" class="w-24 h-16 rounded-xl object-cover border shadow-sm">
                    <div>
                        <span class="text-xs font-bold text-gray-700 block">Current Photo</span>
                        <span class="text-[11px] text-gray-500 font-mono">{{ $campaign->featured_image }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Replace with New File</label>
                        <input type="file" name="image_file" accept="image/*" class="w-full text-xs file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-[#138A4B] hover:file:bg-emerald-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Or Direct Image Path</label>
                        <input type="text" name="featured_image" value="{{ old('featured_image', $campaign->featured_image) }}" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                    </div>
                </div>
            </div>
        </div>

        <!-- Multilingual Content -->
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm space-y-6" x-data="{ tab: 'en' }">
            <div class="flex items-center justify-between border-b pb-2">
                <h4 class="text-sm font-bold text-gray-800">2. Multilingual Content</h4>
                <div class="flex space-x-1">
                    <button type="button" @click="tab = 'en'" :class="tab === 'en' ? 'bg-[#138A4B] text-white' : 'bg-gray-100 text-gray-600'" class="px-3 py-1 rounded-lg text-xs font-bold transition">English</button>
                    <button type="button" @click="tab = 'mr'" :class="tab === 'mr' ? 'bg-[#138A4B] text-white' : 'bg-gray-100 text-gray-600'" class="px-3 py-1 rounded-lg text-xs font-bold transition">मराठी</button>
                    <button type="button" @click="tab = 'hi'" :class="tab === 'hi' ? 'bg-[#138A4B] text-white' : 'bg-gray-100 text-gray-600'" class="px-3 py-1 rounded-lg text-xs font-bold transition">हिन्दी</button>
                </div>
            </div>

            <!-- English -->
            <div x-show="tab === 'en'" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Campaign Title (English) *</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $trans['en']->title ?? $campaign->title) }}" required class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Highlighted Words in Title (Green Color)</label>
                    <input type="text" name="title_highlight_en" value="{{ old('title_highlight_en', $trans['en']->title_highlight ?? '') }}" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Short Description (for Carousel)</label>
                    <textarea name="short_description_en" rows="2" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('short_description_en', $trans['en']->short_description ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Full Detailed Story & Overview</label>
                    <textarea name="description_en" rows="4" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('description_en', $trans['en']->description ?? '') }}</textarea>
                </div>
            </div>

            <!-- Marathi -->
            <div x-show="tab === 'mr'" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Campaign Title (मराठी) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr', $trans['mr']->title ?? '') }}" required class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">शीर्षकातील हायलाइट केलेले शब्द (हिरवा रंग)</label>
                    <input type="text" name="title_highlight_mr" value="{{ old('title_highlight_mr', $trans['mr']->title_highlight ?? '') }}" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">संक्षिप्त माहिती</label>
                    <textarea name="short_description_mr" rows="2" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('short_description_mr', $trans['mr']->short_description ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">सविस्तर माहिती</label>
                    <textarea name="description_mr" rows="4" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('description_mr', $trans['mr']->description ?? '') }}</textarea>
                </div>
            </div>

            <!-- Hindi -->
            <div x-show="tab === 'hi'" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Campaign Title (हिन्दी)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi', $trans['hi']->title ?? '') }}" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">शीर्षक में हाइलाइट किए गए शब्द (हरा रंग)</label>
                    <input type="text" name="title_highlight_hi" value="{{ old('title_highlight_hi', $trans['hi']->title_highlight ?? '') }}" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">संक्षिप्त विवरण</label>
                    <textarea name="short_description_hi" rows="2" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('short_description_hi', $trans['hi']->short_description ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">विस्तृत विवरण</label>
                    <textarea name="description_hi" rows="4" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('description_hi', $trans['hi']->description ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- 4 Impact Boxes -->
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm space-y-4">
            <h4 class="text-sm font-bold text-gray-800 border-b pb-2">3. Supporting Impact Boxes (4 Deliverables)</h4>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @for($i = 1; $i <= 4; $i++)
                @php
                    $imp = $impacts->where('order', $i)->first();
                    $impTrans = [];
                    if ($imp) {
                        foreach ($imp->translations as $it) {
                            $impTrans[$it->language_code] = $it->label;
                        }
                    }
                @endphp
                <div class="border rounded-2xl p-4 bg-gray-50/50 space-y-2">
                    <span class="text-xs font-bold text-gray-800">Impact Box #{{ $i }} {{ $i === 1 ? '(Primary Metric)' : '' }}</span>
                    @if($i === 1)
                        <input type="hidden" name="impact_is_primary_1" value="1">
                        <input type="hidden" name="impact_color_1" value="green">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="text-[10px] font-bold text-gray-600">Metric (e.g. 500)</label>
                                <input type="text" name="impact_metric_1" value="{{ old('impact_metric_1', $imp?->metric_value) }}" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-600">Icon</label>
                                <input type="text" name="impact_icon_1" value="{{ old('impact_icon_1', $imp?->icon ?: 'users') }}" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="text-[10px] font-bold text-gray-600">Icon</label>
                                <input type="text" name="impact_icon_{{ $i }}" value="{{ old('impact_icon_' . $i, $imp?->icon ?: 'heart') }}" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-600">Color</label>
                                <input type="text" name="impact_color_{{ $i }}" value="{{ old('impact_color_' . $i, $imp?->badge_color ?: 'blue') }}" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                            </div>
                        </div>
                    @endif
                    <div>
                        <label class="text-[10px] font-bold text-gray-600">Label (EN / MR / HI)</label>
                        <input type="text" name="impact_label_en_{{ $i }}" value="{{ old('impact_label_en_' . $i, $impTrans['en'] ?? '') }}" placeholder="EN" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_mr_{{ $i }}" value="{{ old('impact_label_mr_' . $i, $impTrans['mr'] ?? '') }}" placeholder="MR" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_hi_{{ $i }}" value="{{ old('impact_label_hi_' . $i, $impTrans['hi'] ?? '') }}" placeholder="HI" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3">
            <a href="{{ route('admin.campaigns.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-600 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition">
                Update Campaign
            </button>
        </div>
    </form>
</div>

@endsection
