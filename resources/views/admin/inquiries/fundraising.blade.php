@extends('layouts.admin', ['title' => 'Fundraising Campaigns', 'header' => 'Community Fundraising Inquiries'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Peer & Supporter Fundraising Requests</h3>
            <p class="text-xs text-gray-500">Volunteers and champions who wish to run local donation drives or college campaigns</p>
        </div>
        <div class="text-xs font-semibold text-gray-600 bg-white px-4 py-2 rounded-xl border border-gray-100 shadow-sm">
            Total Requests: <strong class="text-[#F58220]">{{ $fundraising->total() }}</strong>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50/75 border-b border-gray-100 text-gray-500 uppercase tracking-wider font-semibold">
                    <tr>
                        <th class="px-6 py-4">Organizer</th>
                        <th class="px-6 py-4">Campaign Idea</th>
                        <th class="px-6 py-4">Target Amount</th>
                        <th class="px-6 py-4">Location</th>
                        <th class="px-6 py-4">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($fundraising as $item)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800 text-sm">{{ $item->name }}</div>
                                <div class="text-[11px] text-gray-500">{{ $item->phone }} &bull; {{ $item->email }}</div>
                            </td>
                            <td class="px-6 py-4 max-w-sm">
                                <div class="font-semibold text-gray-800">{{ $item->campaign_idea }}</div>
                                <div class="text-[11px] text-gray-500 line-clamp-2 mt-0.5">{{ $item->message }}</div>
                            </td>
                            <td class="px-6 py-4 font-bold text-[#F58220]">
                                {{ $item->target_amount ? (is_numeric($item->target_amount) ? '₹' . number_format($item->target_amount) : $item->target_amount) : 'Open goal' }}
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $item->city ?? 'Nashik' }}
                            </td>
                            <td class="px-6 py-4 text-gray-500 font-mono text-[11px]">
                                {{ $item->created_at->format('d M, Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                No community fundraising requests received yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($fundraising->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $fundraising->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
