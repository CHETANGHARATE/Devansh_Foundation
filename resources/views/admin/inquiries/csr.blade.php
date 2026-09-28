@extends('layouts.admin', ['title' => 'CSR Proposals', 'header' => 'Corporate CSR Inquiries'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Corporate Social Responsibility Inquiries</h3>
            <p class="text-xs text-gray-500">Companies seeking Schedule VII compliant CSR implementation partners</p>
        </div>
        <div class="text-xs font-semibold text-gray-600 bg-white px-4 py-2 rounded-xl border border-gray-100 shadow-sm">
            Total CSR Inquiries: <strong class="text-[#138A4B]">{{ $csrRequests->total() }}</strong>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50/75 border-b border-gray-100 text-gray-500 uppercase tracking-wider font-semibold">
                    <tr>
                        <th class="px-6 py-4">Company</th>
                        <th class="px-6 py-4">CSR Lead / Contact</th>
                        <th class="px-6 py-4">Focus Thematic Area</th>
                        <th class="px-6 py-4">Estimated Budget</th>
                        <th class="px-6 py-4">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($csrRequests as $item)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800 text-sm">{{ $item->company_name }}</div>
                                <div class="text-[11px] text-gray-400 mt-0.5">Location: {{ $item->city ?? 'India' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-700">{{ $item->contact_person }}</div>
                                <div class="text-[11px] text-gray-500">{{ $item->phone }} &bull; {{ $item->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#EAF7EF] text-[#138A4B]">
                                    {{ $item->csr_area ?: 'CSR Initiative' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-[#073B63]">{{ $item->budget_range ?: 'To be discussed' }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-500 font-mono text-[11px]">
                                {{ $item->created_at->format('d M, Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                No CSR proposals received yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($csrRequests->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $csrRequests->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
