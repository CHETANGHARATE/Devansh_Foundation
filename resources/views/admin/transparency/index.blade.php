@extends('layouts.admin', ['title' => 'Transparency & Legal Documents', 'header' => 'Transparency Documents'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Transparency & Legal Documents</h3>
            <p class="text-xs text-gray-500">Manage statutory registrations, trust deeds, tax exemption certificates, and audit reports</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('about.transparency') }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition">
                <i data-lucide="external-link" class="w-3.5 h-3.5"></i> View Public Page
            </a>
            <a href="{{ route('admin.transparency.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition-colors w-fit">
                <i data-lucide="plus" class="w-4 h-4"></i> Add Document
            </a>
        </div>
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
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4">Document Title</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4">Demo / Official</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($documents as $doc)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-500">
                                #{{ $doc->order }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900 text-sm">{{ $doc->t('title', 'en') }}</div>
                                <div class="text-[11px] text-gray-500 line-clamp-1 mt-0.5">{{ $doc->t('title', 'mr') }}</div>
                                <div class="text-[10px] text-gray-400 font-mono mt-0.5">slug: {{ $doc->slug }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-blue-700 uppercase">
                                    {{ $doc->document_type }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($doc->is_demo)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                        Demo Record
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        Official Scan
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($doc->is_published)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">Published</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.transparency.edit', $doc) }}" class="p-1.5 rounded-lg text-gray-600 hover:text-[#073B63] hover:bg-gray-100 transition" title="Edit">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.transparency.destroy', $doc) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this document?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 transition" title="Delete">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                No transparency documents created yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($documents->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $documents->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
