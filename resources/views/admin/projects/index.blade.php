@extends('layouts.admin', ['title' => 'Manage Projects', 'header' => 'Projects Management'])

@section('content')

<div class="flex items-center justify-between">
    <div>
        <h2 class="text-lg font-bold text-[#073B63]">All Initiatives & Projects</h2>
        <p class="text-xs text-gray-500">Manage multilingual details, status, target amounts, and photos</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-[#138A4B] hover:bg-[#0e6b3a] text-white text-xs font-bold shadow-sm transition">
        <i data-lucide="plus" class="w-4 h-4"></i>
        <span>Add New Project</span>
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[11px] border-b border-gray-100">
                <tr>
                    <th class="py-3 px-4">Project Title</th>
                    <th class="py-3 px-4">Focus Area</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Beneficiaries</th>
                    <th class="py-3 px-4">Target / Raised</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($projects as $p)
                    @php $pTrans = $p->translation('en') ?: $p->translation(); @endphp
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3.5 px-4">
                            <div class="font-bold text-gray-900 text-sm">{{ $p->translation('mr')?->title ?? $p->slug }}</div>
                            <div class="text-[11px] text-gray-400 font-sans">{{ $p->translation('en')?->title }}</div>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="px-2 py-1 rounded bg-[#EAF7EF] text-[#138A4B] font-semibold text-[11px]">
                                {{ $p->focusArea?->translation('mr')?->title ?? 'General' }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="px-2 py-0.5 rounded-full font-bold text-[10px] {{ $p->status === 'ongoing' ? 'bg-emerald-100 text-emerald-800' : ($p->status === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4 text-gray-600 font-medium">
                            {{ $p->beneficiaries_count ?? '-' }}
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="font-bold text-gray-800">₹{{ number_format((float) $p->raised_amount) }}</div>
                            <div class="text-[10px] text-gray-400">Target: ₹{{ number_format((float) $p->target_amount) }}</div>
                        </td>
                        <td class="py-3.5 px-4 text-right space-x-2">
                            <a href="{{ route('admin.projects.edit', $p->id) }}" class="inline-flex items-center px-2.5 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold transition">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5 mr-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', $p->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-2.5 py-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 text-xs font-semibold transition">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5 mr-1"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-gray-100">
        {{ $projects->links() }}
    </div>
</div>

@endsection
