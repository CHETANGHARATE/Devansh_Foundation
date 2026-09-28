@extends('layouts.admin', ['title' => 'Upload Report', 'header' => 'Upload Annual / Financial Report'])

@section('content')

<div class="max-w-2xl bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
    <form action="{{ route('admin.reports.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Report Type *</label>
                <select name="type" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    <option value="annual">Annual Report / वार्षिक अहवाल</option>
                    <option value="financial">Audited Financial Statement / आर्थिक विवरण</option>
                    <option value="impact">Impact Assessment / प्रभाव अहवाल</option>
                    <option value="activity">Activity Report / उपक्रम अहवाल</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Year / Financial Year *</label>
                <input type="text" name="year" required placeholder="e.g. 2024-25 or 2024" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
            </div>
        </div>

        <div class="space-y-4 pt-2">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Upload PDF Document</label>
                <input type="file" name="report_file" accept=".pdf,.doc,.docx" class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#EEF6FB] file:text-[#073B63]">
                <p class="text-[11px] text-gray-400 mt-1">Accepts PDF, DOCX up to 10MB</p>
            </div>

            <div class="text-center text-xs text-gray-400 font-bold uppercase tracking-wider">— OR —</div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Direct Document Link (Google Drive / Cloud / URL)</label>
                <input type="url" name="file_path" placeholder="https://..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            </div>
        </div>

        <div class="space-y-4 pt-4 border-t border-gray-100">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">अहवालाचे नाव / Title (मराठी) *</label>
                <input type="text" name="title_mr" required placeholder="उदा. वार्षिक लेखापरीक्षण अहवाल २०२४-२५" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Title (हिंदी)</label>
                <input type="text" name="title_hi" placeholder="उदा. वार्षिक लेखापरीक्षण रिपोर्ट २०२४-२५" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Title (English)</label>
                <input type="text" name="title_en" placeholder="e.g. Annual Audit Report 2024-25" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Display Order</label>
            <input type="number" name="order" value="0" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <a href="{{ route('admin.reports.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold">Cancel</a>
            <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-md hover:bg-[#0f6c3a] transition-colors">
                Publish Report
            </button>
        </div>
    </form>
</div>

@endsection
