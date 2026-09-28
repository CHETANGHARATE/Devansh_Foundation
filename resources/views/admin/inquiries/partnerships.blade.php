@extends('layouts.admin', ['title' => 'Partnership Requests', 'header' => 'Partnership Requests'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Organizational & Institutional Collaborations</h3>
            <p class="text-xs text-gray-500">Inquiries from NGOs, colleges, government bodies, and social enterprises</p>
        </div>
        <div class="text-xs font-semibold text-gray-600 bg-white px-4 py-2 rounded-xl border border-gray-100 shadow-sm">
            Total Requests: <strong class="text-[#073B63]">{{ $partnerships->total() }}</strong>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50/75 border-b border-gray-100 text-gray-500 uppercase tracking-wider font-semibold">
                    <tr>
                        <th class="px-6 py-4">Organization</th>
                        <th class="px-6 py-4">Contact Person</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4">Proposal / Message</th>
                        <th class="px-6 py-4">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($partnerships as $item)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800 text-sm">{{ $item->organization_name }}</div>
                                @if($item->website)
                                    <a href="{{ $item->website }}" target="_blank" class="text-[11px] text-[#073B63] hover:underline flex items-center gap-1 mt-0.5">
                                        {{ $item->website }} <i data-lucide="external-link" class="w-3 h-3"></i>
                                    </a>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-700">{{ $item->contact_person }}</div>
                                <div class="text-[11px] text-gray-500">{{ $item->phone }} &bull; {{ $item->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#EEF6FB] text-[#073B63]">
                                    {{ $item->partnership_interest ?: 'General Partnership' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 max-w-sm">
                                <p class="text-xs text-gray-600 line-clamp-2">{{ $item->message }}</p>
                            </td>
                            <td class="px-6 py-4 text-gray-500 font-mono text-[11px]">
                                {{ $item->created_at->format('d M, Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                No partnership proposals received yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($partnerships->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $partnerships->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
