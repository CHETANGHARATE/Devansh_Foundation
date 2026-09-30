@extends('layouts.admin', ['title' => 'Help Us Now - Recent Cases', 'header' => 'Help Us Now — Urgent Cases'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Help Us Now — Urgent Beneficiary Cases</h3>
            <p class="text-xs text-gray-500">Manage critical medical, child welfare, emergency and educational cases featured on the homepage carousel</p>
        </div>
        <a href="{{ route('admin.donation-cases.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition-colors w-fit">
            <i data-lucide="plus" class="w-4 h-4"></i> Add New Case
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
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4">Beneficiary / Title</th>
                        <th class="px-6 py-4">Target & Collected</th>
                        <th class="px-6 py-4">Progress</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($cases as $case)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-500">
                                #{{ $case->order }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset($case->image ?: 'images/cases/case-1-baby-nicu.jpg') }}" class="w-14 h-11 rounded-xl object-cover border border-gray-200 shadow-sm" alt="{{ $case->beneficiary_name }}">
                                    <div>
                                        <div class="font-bold text-gray-800 text-sm">{{ $case->beneficiary_name }}</div>
                                        <div class="text-xs text-[#1E653F] font-semibold mt-0.5 line-clamp-1">{{ $case->title }}</div>
                                        <div class="text-[10px] text-gray-400 font-mono mt-0.5">Slug: {{ $case->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800">{{ $case->formatted_target_amount }}</div>
                                <div class="text-[11px] text-emerald-700 font-medium">Raised: {{ $case->formatted_collected_amount }}</div>
                                <div class="text-[10px] text-gray-500">Remaining: {{ $case->formatted_remaining_amount }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="w-28 space-y-1">
                                    <div class="flex justify-between text-[10px] font-semibold text-gray-600">
                                        <span>{{ $case->progress_percentage }}%</span>
                                        @if($case->collected_amount >= $case->target_amount)
                                            <span class="text-emerald-600 font-bold">Goal Achieved!</span>
                                        @endif
                                    </div>
                                    <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                                        <div class="bg-[#1E653F] h-full rounded-full" style="width: {{ $case->progress_percentage }}%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-[#1E653F] capitalize">
                                    {{ $case->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($case->status === 'active')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">Active</span>
                                @elseif($case->status === 'completed')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-blue-700">Completed</span>
                                @elseif($case->status === 'paused')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700">Paused</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600">Closed</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('donate', ['case' => $case->slug]) }}" target="_blank" class="p-2 rounded-lg text-gray-500 hover:text-emerald-700 hover:bg-emerald-50 transition" title="Preview Case Donation">
                                        <i data-lucide="external-link" class="w-4 h-4"></i>
                                    </a>
                                    <a href="{{ route('admin.donation-cases.edit', $case) }}" class="p-2 rounded-lg text-gray-500 hover:text-[#073B63] hover:bg-gray-100 transition" title="Edit Case">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.donation-cases.destroy', $case) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this case?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg text-gray-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Delete Case">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                No urgent cases created yet. Click "Add New Case" above to add your first case.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($cases->hasPages())
            <div class="p-4 border-t border-gray-100">
                {{ $cases->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
