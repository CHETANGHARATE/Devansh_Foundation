@extends('layouts.admin', ['title' => 'Focus Areas', 'header' => 'Our Focus Areas (8 Core Pillars)'])

@section('content')

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-base font-bold text-[#073B63]">Manage Foundation Focus Areas</h2>
        <p class="text-xs text-gray-500">Edit multilingual titles, descriptions, and icons for each of the 8 focus sectors</p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[11px] border-b border-gray-100">
                <tr>
                    <th class="py-3 px-4">Icon & Slug</th>
                    <th class="py-3 px-4">Title (Marathi / Hindi / English)</th>
                    <th class="py-3 px-4">Associated Projects</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($focusAreas as $fa)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3.5 px-4 flex items-center space-x-3">
                            <div class="w-9 h-9 rounded-lg bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center font-bold">
                                <i data-lucide="{{ $fa->icon }}" class="w-5 h-5"></i>
                            </div>
                            <span class="font-mono text-gray-500">{{ $fa->slug }}</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="font-bold text-gray-900 text-sm">{{ $fa->translation('mr')?->title }}</div>
                            <div class="text-[11px] text-gray-500">{{ $fa->translation('hi')?->title }} • {{ $fa->translation('en')?->title }}</div>
                        </td>
                        <td class="py-3.5 px-4 font-semibold text-[#073B63]">
                            {{ $fa->projects_count }} Projects
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $fa->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $fa->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4 text-right">
                            <a href="{{ route('admin.focus-areas.edit', $fa->id) }}" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-[#073B63] hover:bg-[#052a47] text-white text-xs font-semibold transition">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5 mr-1"></i> Edit Content
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
