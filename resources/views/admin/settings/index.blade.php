@extends('layouts.admin', ['title' => 'Site Settings', 'header' => 'Website Global Configuration & SEO'])

@section('content')

<div class="max-w-4xl space-y-6">
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-semibold border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Contact & Office Info -->
            <div>
                <h4 class="text-sm font-bold text-[#073B63] mb-4 flex items-center gap-2">
                    <i data-lucide="phone" class="w-4 h-4 text-[#138A4B]"></i> Foundation Contact & Head Office Details
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Official Helpline Phone</label>
                        <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Official Email Address</label>
                        <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Office Registered Physical Address</label>
                        <input type="text" name="contact_address" value="{{ old('contact_address', $settings['contact_address']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Google Maps Embed URL / Iframe src</label>
                        <input type="text" name="google_maps_embed" value="{{ old('google_maps_embed', $settings['google_maps_embed']) }}" placeholder="https://www.google.com/maps/embed?pb=..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs font-mono">
                    </div>
                </div>
            </div>

            <!-- Social Media Handles -->
            <div class="pt-6 border-t border-gray-100">
                <h4 class="text-sm font-bold text-[#073B63] mb-4 flex items-center gap-2">
                    <i data-lucide="share-2" class="w-4 h-4 text-[#138A4B]"></i> Social Media & Public Channels
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Facebook Page URL</label>
                        <input type="url" name="social_facebook" value="{{ old('social_facebook', $settings['social_facebook']) }}" placeholder="https://facebook.com/..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Instagram URL</label>
                        <input type="url" name="social_instagram" value="{{ old('social_instagram', $settings['social_instagram']) }}" placeholder="https://instagram.com/..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">YouTube Channel URL</label>
                        <input type="url" name="social_youtube" value="{{ old('social_youtube', $settings['social_youtube']) }}" placeholder="https://youtube.com/..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">LinkedIn Profile / Page</label>
                        <input type="url" name="social_linkedin" value="{{ old('social_linkedin', $settings['social_linkedin']) }}" placeholder="https://linkedin.com/..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    </div>
                </div>
            </div>

            <!-- Multilingual Taglines -->
            <div class="pt-6 border-t border-gray-100">
                <h4 class="text-sm font-bold text-[#073B63] mb-4 flex items-center gap-2">
                    <i data-lucide="type" class="w-4 h-4 text-[#138A4B]"></i> Multilingual Foundation Taglines
                </h4>
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">टॅगलाईन (मराठी)</label>
                        <input type="text" name="site_tagline_mr" value="{{ old('site_tagline_mr', $settings['site_tagline_mr']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">टैगलाइन (हिंदी)</label>
                        <input type="text" name="site_tagline_hi" value="{{ old('site_tagline_hi', $settings['site_tagline_hi']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Tagline (English)</label>
                        <input type="text" name="site_tagline_en" value="{{ old('site_tagline_en', $settings['site_tagline_en']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
                    </div>
                </div>
            </div>

            <!-- SEO & Meta Tags -->
            <div class="pt-6 border-t border-gray-100">
                <h4 class="text-sm font-bold text-[#073B63] mb-4 flex items-center gap-2">
                    <i data-lucide="search" class="w-4 h-4 text-[#138A4B]"></i> Global SEO & Meta Descriptions
                </h4>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">SEO Title (Marathi)</label>
                            <input type="text" name="meta_title_mr" value="{{ old('meta_title_mr', $settings['meta_title_mr']) }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">SEO Title (Hindi)</label>
                            <input type="text" name="meta_title_hi" value="{{ old('meta_title_hi', $settings['meta_title_hi']) }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">SEO Title (English)</label>
                            <input type="text" name="meta_title_en" value="{{ old('meta_title_en', $settings['meta_title_en']) }}" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Meta Description (Marathi)</label>
                            <textarea name="meta_desc_mr" rows="2" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('meta_desc_mr', $settings['meta_desc_mr']) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Meta Description (Hindi)</label>
                            <textarea name="meta_desc_hi" rows="2" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('meta_desc_hi', $settings['meta_desc_hi']) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Meta Description (English)</label>
                            <textarea name="meta_desc_en" rows="2" class="w-full px-4 py-2 rounded-xl border border-gray-200 text-xs">{{ old('meta_desc_en', $settings['meta_desc_en']) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                <button type="submit" class="px-8 py-3 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-md hover:bg-[#0f6c3a] transition-colors">
                    Save Site Settings
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
