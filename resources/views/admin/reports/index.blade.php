@extends('layouts.admin', ['title' => 'Transparency & Reports', 'header' => 'Annual & Financial Reports'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Published Reports & Audits</h3>
            <p class="text-xs text-gray-500">Provide complete transparency to donors, CSR partners, and the public</p>
        </div>
        <a href="{{ route('admin.reports.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition-colors w-fit">
            <i data-lucide="plus" class="w-4 h-4"></i> Upload Report
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-semibold border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50/75 border-b border-gray-100 text-gray-500 uppercase tracking-wider font-semibold">
                    <tr>
                        <th class="px-6 py-4">Report Title</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4">Financial / Calendar Year</th>
                        <th class="px-6 py-4">File Size</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($reports as $report)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center font-bold">
                                        <i data-lucide="file-text" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-800 text-sm">{{ $report->title }}</div>
                                        <div class="text-[11px] text-gray-400 mt-0.5">{{ $report->file_path }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#EEF6FB] text-[#073B63] capitalize">
                                    {{ $report->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600 font-semibold">
                                {{ $report->year }}
                            </td>
                            <td class="px-6 py-4 text-gray-500 font-mono">
                                {{ $report->file_size ?: '1.2 MB' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    @if($report->file_path)
                                        <a href="{{ $report->file_path }}" target="_blank" class="p-2 rounded-lg text-[#073B63] hover:bg-gray-100 transition-colors" title="Download / View">
                                            <i data-lucide="external-link" class="w-4 h-4"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Delete this report?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 transition-colors" title="Delete">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                No reports uploaded yet. Click "Upload Report" to add annual or financial audits.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($reports->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $reports->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
