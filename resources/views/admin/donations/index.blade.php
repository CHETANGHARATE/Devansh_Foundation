@extends('layouts.admin', ['title' => 'Donation Tracking', 'header' => 'Donations & Contribution Ledger'])

@section('content')

<div class="space-y-6">
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm">
            <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Raised</span>
            <div class="text-2xl font-black text-[#138A4B] mt-2">₹{{ number_format($totalRaised, 2) }}</div>
            <p class="text-[11px] text-gray-400 mt-1">From verified successful transactions</p>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm">
            <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Donors</span>
            <div class="text-2xl font-black text-[#073B63] mt-2">{{ number_format($totalDonors) }}</div>
            <p class="text-[11px] text-gray-400 mt-1">Total pledges & contributions recorded</p>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex flex-col justify-between">
            <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Payment Settings</span>
            <div class="pt-2">
                <a href="{{ route('admin.donations.settings') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#073B63] text-white text-xs font-bold hover:bg-[#052b49] transition-colors">
                    <i data-lucide="qr-code" class="w-4 h-4"></i> Manage UPI & Bank Details
                </a>
            </div>
            <p class="text-[11px] text-gray-400 mt-2">Configure UPI ID, QR code and 80G tax exemptions</p>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-semibold border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filters & Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-gray-100 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.donations.index') }}" class="px-3 py-1.5 rounded-lg text-xs font-bold {{ !request('status') ? 'bg-[#073B63] text-white' : 'bg-gray-100 text-gray-600' }}">All</a>
                <a href="{{ route('admin.donations.index', ['status' => 'successful']) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold {{ request('status') == 'successful' ? 'bg-emerald-600 text-white' : 'bg-gray-100 text-gray-600' }}">Successful</a>
                <a href="{{ route('admin.donations.index', ['status' => 'pending']) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold {{ request('status') == 'pending' ? 'bg-amber-500 text-white' : 'bg-gray-100 text-gray-600' }}">Pending</a>
                <a href="{{ route('admin.donations.index', ['status' => 'failed']) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold {{ request('status') == 'failed' ? 'bg-red-500 text-white' : 'bg-gray-100 text-gray-600' }}">Failed</a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50/75 border-b border-gray-100 text-gray-500 uppercase tracking-wider font-semibold">
                    <tr>
                        <th class="px-6 py-4">Receipt / Donor</th>
                        <th class="px-6 py-4">Amount</th>
                        <th class="px-6 py-4">Project / Cause</th>
                        <th class="px-6 py-4">Mode / UTR</th>
                        <th class="px-6 py-4">80G / PAN</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Update Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($donations as $donation)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800 text-sm">{{ $donation->donor_name }}</div>
                                <div class="text-[11px] text-gray-500">{{ $donation->donor_phone }} &bull; {{ $donation->donor_email }}</div>
                                <div class="text-[10px] text-gray-400 font-mono mt-0.5">{{ $donation->receipt_number }} &bull; {{ $donation->created_at->format('d M Y, h:i A') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-black text-[#138A4B] text-base">₹{{ number_format($donation->amount, 2) }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $donation->project ? $donation->project->title : 'General Fund' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-700 uppercase">{{ $donation->payment_method }}</div>
                                @if($donation->transaction_id)
                                    <div class="text-[10px] text-gray-400 font-mono">UTR: {{ $donation->transaction_id }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($donation->pan_number)
                                    <span class="font-mono text-xs font-bold text-gray-700">{{ $donation->pan_number }}</span>
                                    <div class="text-[10px] text-emerald-600 font-semibold">80G Required</div>
                                @else
                                    <span class="text-gray-400 text-xs">No PAN</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($donation->payment_status === 'successful')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">Successful</span>
                                @elseif($donation->payment_status === 'pending')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700">Pending</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-50 text-red-700">Failed</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.donations.status', $donation->id) }}" method="POST" class="inline-flex items-center gap-1">
                                    @csrf
                                    <select name="payment_status" onchange="this.form.submit()" class="px-2 py-1 rounded-lg border border-gray-200 text-xs font-semibold">
                                        <option value="successful" {{ $donation->payment_status === 'successful' ? 'selected' : '' }}>Mark Successful</option>
                                        <option value="pending" {{ $donation->payment_status === 'pending' ? 'selected' : '' }}>Mark Pending</option>
                                        <option value="failed" {{ $donation->payment_status === 'failed' ? 'selected' : '' }}>Mark Failed</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-400">
                                No donation records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($donations->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $donations->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
