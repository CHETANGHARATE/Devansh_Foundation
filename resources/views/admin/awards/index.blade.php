@extends('layouts.admin', ['title' => 'Awards & Recognition', 'header' => 'Awards'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Awards & Recognition</h3>
            <p class="text-xs text-gray-500">Manage institutional citations, recognitions, and achievement milestones</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('about.awards') }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition">
                <i data-lucide="external-link" class="w-3.5 h-3.5"></i> View Public Page
            </a>
            <a href="{{ route('admin.awards.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition-colors w-fit">
                <i data-lucide="plus" class="w-4 h-4"></i> Add Award
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
                        <th class="px-6 py-4">Award Title</th>
                        <th class="px-6 py-4">Year & Category</th>
                        <th class="px-6 py-4">Conferred By</th>
                        <th class="px-6 py-4">Demo / Real</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($awards as $award)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-500">
                                #{{ $award->order }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900 text-sm">{{ $award->t('title', 'en') }}</div>
                                <div class="text-[11px] text-gray-500 mt-0.5">{{ $award->t('title', 'mr') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#073B63] text-white mr-1.5">
                                    {{ $award->year }}
                                </span>
                                <span class="text-xs text-gray-600 font-medium">
                                    {{ $award->t('category_name', 'en') ?: $award->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs text-gray-700 font-medium">{{ $award->t('conferred_by', 'en') ?: 'Not Specified' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($award->is_demo)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                        Sample / Demo
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        Verified Award
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($award->is_published)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">Published</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.awards.edit', $award) }}" class="p-1.5 rounded-lg text-gray-600 hover:text-[#073B63] hover:bg-gray-100 transition" title="Edit">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.awards.destroy', $award) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this award?');" class="inline">
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
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                No awards registered yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($awards->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $awards->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
