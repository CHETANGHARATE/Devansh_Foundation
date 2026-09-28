@extends('layouts.admin', ['title' => 'Upload Photo', 'header' => 'Upload to Gallery'])

@section('content')

<div class="max-w-2xl bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    <option value="Health">Health / आरोग्य शिबिर</option>
                    <option value="Education">Education / शैक्षणिक उपक्रम</option>
                    <option value="Environment">Environment / पर्यावरण संवर्धन</option>
                    <option value="Women Empowerment">Women Empowerment / महिला सक्षमीकरण</option>
                    <option value="Community">Community / समाज कल्याण</option>
                    <option value="Disaster Relief">Disaster Relief / आपत्ती व्यवस्थापन</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Album (Optional)</label>
                <select name="gallery_album_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    <option value="">-- No Album (Loose Image) --</option>
                    @foreach($albums as $alb)
                        <option value="{{ $alb->id }}">{{ $alb->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Associated Project (Optional)</label>
            <select name="project_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                <option value="">-- None --</option>
                @foreach($projects as $p)
                    <option value="{{ $p->id }}">{{ $p->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="space-y-4 pt-2">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Upload Image File</label>
                <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#EAF7EF] file:text-[#138A4B]">
                @error('image_file')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center text-xs text-gray-400 font-bold uppercase tracking-wider">— OR —</div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Direct Image URL</label>
                <input type="url" name="image_path" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
        </div>

        <div class="space-y-4 pt-4 border-t border-gray-100">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">फोटो कॅप्शन / Caption (मराठी)</label>
                <input type="text" name="caption_mr" placeholder="उदा. नाशिक ग्रामीण भागात मोफत नेत्र तपासणी" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">कैप्शन / Caption (हिंदी)</label>
                <input type="text" name="caption_hi" placeholder="उदा. नासिक ग्रामीण क्षेत्र में निःशुल्क नेत्र जांच" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Caption (English)</label>
                <input type="text" name="caption_en" placeholder="e.g. Free Eye Check-up Camp in Nashik Rural" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Display Order</label>
            <input type="number" name="order" value="0" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <a href="{{ route('admin.gallery.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold">Cancel</a>
            <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-md hover:bg-[#0f6c3a] transition-colors">
                Save & Upload
            </button>
        </div>
    </form>
</div>

@endsection
