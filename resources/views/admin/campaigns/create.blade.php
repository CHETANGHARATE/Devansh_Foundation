@extends('layouts.admin', ['title' => 'Create Featured Campaign', 'header' => 'Add Featured Campaign'])

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-gray-800">Add New Featured Campaign</h3>
            <p class="text-xs text-gray-500">Create a high-impact fundraising drive with progress tracking and impact deliverables</p>
        </div>
        <a href="{{ route('admin.campaigns.index') }}" class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700 text-xs font-bold hover:bg-gray-200 transition">
            ← Back to List
        </a>
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

    <form action="{{ route('admin.campaigns.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- General Info -->
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm space-y-4">
            <h4 class="text-sm font-bold text-gray-800 border-b pb-2">1. Campaign Core Details</h4>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Target Amount (₹) *</label>
                    <input type="number" step="0.01" name="target_amount" value="{{ old('target_amount', '100000') }}" required class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Raised Amount (₹)</label>
                    <input type="number" step="0.01" name="raised_amount" value="{{ old('raised_amount', '0') }}" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Category *</label>
                    <input type="text" name="category" value="{{ old('category', 'Healthcare') }}" required class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', '1') }}" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Status *</label>
                    <select name="status" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                        <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="paused" {{ old('status') === 'paused' ? 'selected' : '' }}>Paused</option>
                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="closed" {{ old('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Featured on Homepage?</label>
                    <label class="inline-flex items-center mt-2">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', true) ? 'checked' : '' }} class="rounded text-[#138A4B]">
                        <span class="ml-2 text-xs font-semibold text-gray-700">Display in Homepage Carousel</span>
                    </label>
                </div>
            </div>

            <!-- Image Upload & URL -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-3 border-t">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Upload Photograph</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-[#138A4B] hover:file:bg-emerald-100">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Or Existing Image Path</label>
                    <input type="text" name="featured_image" value="{{ old('featured_image', '/images/campaigns/campaign-1-assistive-care.jpg') }}" placeholder="/images/campaigns/..." class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
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
                    <input type="text" name="title_en" value="{{ old('title_en') }}" required placeholder="e.g. Free Health Check-up Camp for Rural Families" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Highlighted Words in Title (Green Color)</label>
                    <input type="text" name="title_highlight_en" value="{{ old('title_highlight_en') }}" placeholder="e.g. Rural Families" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                    <span class="text-[10px] text-gray-400">These exact words will be styled in green inside the headline.</span>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Short Description (for Carousel)</label>
                    <textarea name="short_description_en" rows="2" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('short_description_en') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Full Detailed Story & Overview</label>
                    <textarea name="description_en" rows="4" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('description_en') }}</textarea>
                </div>
            </div>

            <!-- Marathi -->
            <div x-show="tab === 'mr'" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Campaign Title (मराठी) *</label>
                    <input type="text" name="title_mr" value="{{ old('title_mr') }}" required placeholder="उदा. ग्रामीण कुटुंबांसाठी मोफत आरोग्य तपासणी शिबिर" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">शीर्षकातील हायलाइट केलेले शब्द (हिरवा रंग)</label>
                    <input type="text" name="title_highlight_mr" value="{{ old('title_highlight_mr') }}" placeholder="उदा. ग्रामीण कुटुंबे" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">संक्षिप्त माहिती</label>
                    <textarea name="short_description_mr" rows="2" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('short_description_mr') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">सविस्तर माहिती</label>
                    <textarea name="description_mr" rows="4" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('description_mr') }}</textarea>
                </div>
            </div>

            <!-- Hindi -->
            <div x-show="tab === 'hi'" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Campaign Title (हिन्दी)</label>
                    <input type="text" name="title_hi" value="{{ old('title_hi') }}" placeholder="उदा. ग्रामीण परिवारों के लिए निःशुल्क स्वास्थ्य जांच शिविर" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">शीर्षक में हाइलाइट किए गए शब्द (हरा रंग)</label>
                    <input type="text" name="title_highlight_hi" value="{{ old('title_highlight_hi') }}" placeholder="उदा. ग्रामीण परिवार" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">संक्षिप्त विवरण</label>
                    <textarea name="short_description_hi" rows="2" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('short_description_hi') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">विस्तृत विवरण</label>
                    <textarea name="description_hi" rows="4" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-[#138A4B]">{{ old('description_hi') }}</textarea>
                </div>
            </div>
        </div>

        <!-- 4 Impact Boxes -->
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm space-y-4">
            <h4 class="text-sm font-bold text-gray-800 border-b pb-2">3. Supporting Impact Boxes (4 Boxes displayed below the card)</h4>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Box 1 (Usually Primary Metric e.g. 500 Patients) -->
                <div class="border rounded-2xl p-4 bg-emerald-50/40 space-y-2">
                    <span class="text-xs font-bold text-emerald-800">Impact Box #1 (Primary Metric)</span>
                    <input type="hidden" name="impact_is_primary_1" value="1">
                    <input type="hidden" name="impact_color_1" value="green">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="text-[10px] font-bold text-gray-600">Metric (e.g. 500)</label>
                            <input type="text" name="impact_metric_1" value="{{ old('impact_metric_1', '500') }}" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                        </div>
                        <div>
                            <label class="text-[10px] font-bold text-gray-600">Icon</label>
                            <select name="impact_icon_1" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                                <option value="users">users</option>
                                <option value="sprout">sprout</option>
                                <option value="home">home</option>
                                <option value="graduation-cap">graduation-cap</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-600">Label (EN / MR / HI)</label>
                        <input type="text" name="impact_label_en_1" value="{{ old('impact_label_en_1', 'Patients') }}" placeholder="EN: Patients" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_mr_1" value="{{ old('impact_label_mr_1', 'रुग्ण') }}" placeholder="MR: रुग्ण" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_hi_1" value="{{ old('impact_label_hi_1', 'मरीज') }}" placeholder="HI: मरीज" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                    </div>
                </div>

                <!-- Box 2 -->
                <div class="border rounded-2xl p-4 bg-sky-50/40 space-y-2">
                    <span class="text-xs font-bold text-sky-800">Impact Box #2</span>
                    <input type="hidden" name="impact_color_2" value="blue">
                    <div>
                        <label class="text-[10px] font-bold text-gray-600">Icon</label>
                        <select name="impact_icon_2" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                            <option value="stethoscope">stethoscope</option>
                            <option value="users">users</option>
                            <option value="backpack">backpack/kit</option>
                            <option value="droplet">droplet</option>
                            <option value="accessibility">accessibility</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-600">Label (EN / MR / HI)</label>
                        <input type="text" name="impact_label_en_2" value="{{ old('impact_label_en_2', 'Free Check-up') }}" placeholder="EN: Free Check-up" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_mr_2" value="{{ old('impact_label_mr_2', 'मोफत तपासणी') }}" placeholder="MR: मोफत तपासणी" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_hi_2" value="{{ old('impact_label_hi_2', 'निःशुल्क जांच') }}" placeholder="HI: निःशुल्क जांच" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="border rounded-2xl p-4 bg-amber-50/40 space-y-2">
                    <span class="text-xs font-bold text-amber-800">Impact Box #3</span>
                    <input type="hidden" name="impact_color_3" value="orange">
                    <div>
                        <label class="text-[10px] font-bold text-gray-600">Icon</label>
                        <select name="impact_icon_3" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                            <option value="pill">pill / medicine</option>
                            <option value="scissors">scissors / sewing</option>
                            <option value="book">book / notebooks</option>
                            <option value="users">community</option>
                            <option value="flower-2">plantation</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-600">Label (EN / MR / HI)</label>
                        <input type="text" name="impact_label_en_3" value="{{ old('impact_label_en_3', 'Medicines') }}" placeholder="EN: Medicines" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_mr_3" value="{{ old('impact_label_mr_3', 'औषधवाटप') }}" placeholder="MR: औषधवाटप" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_hi_3" value="{{ old('impact_label_hi_3', 'दवाइयां') }}" placeholder="HI: दवाइयां" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                    </div>
                </div>

                <!-- Box 4 -->
                <div class="border rounded-2xl p-4 bg-rose-50/40 space-y-2">
                    <span class="text-xs font-bold text-rose-800">Impact Box #4</span>
                    <input type="hidden" name="impact_color_4" value="red">
                    <div>
                        <label class="text-[10px] font-bold text-gray-600">Icon</label>
                        <select name="impact_icon_4" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                            <option value="megaphone">megaphone / awareness</option>
                            <option value="trending-up">trending-up / livelihood</option>
                            <option value="edit-3">stationery / pencil</option>
                            <option value="globe">globe / environment</option>
                            <option value="shield-check">shield-check</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-600">Label (EN / MR / HI)</label>
                        <input type="text" name="impact_label_en_4" value="{{ old('impact_label_en_4', 'Health Awareness') }}" placeholder="EN: Health Awareness" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_mr_4" value="{{ old('impact_label_mr_4', 'आरोग्य जागृती') }}" placeholder="MR: आरोग्य जागृती" class="w-full text-xs px-2.5 py-1.5 rounded-lg border mb-1">
                        <input type="text" name="impact_label_hi_4" value="{{ old('impact_label_hi_4', 'स्वास्थ्य जागरूकता') }}" placeholder="HI: स्वास्थ्य जागरूकता" class="w-full text-xs px-2.5 py-1.5 rounded-lg border">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3">
            <a href="{{ route('admin.campaigns.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-600 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition">
                Create Campaign
            </button>
        </div>
    </form>
</div>

@endsection
