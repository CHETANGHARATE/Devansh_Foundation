@extends('layouts.admin', ['title' => 'Dashboard', 'header' => 'Dashboard Overview'])

@section('content')

<!-- KPI Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <!-- Total Projects -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold uppercase tracking-wider text-gray-400">Total Projects</div>
            <div class="text-3xl font-extrabold text-[#073B63] mt-1">{{ $stats['total_projects'] }}</div>
            <div class="text-xs text-emerald-600 font-semibold mt-1">{{ $stats['active_projects'] }} Active Ongoing</div>
        </div>
        <div class="w-12 h-12 rounded-xl bg-[#EEF6FB] text-[#073B63] flex items-center justify-center">
            <i data-lucide="folder-kanban" class="w-6 h-6"></i>
        </div>
    </div>

    <!-- Total Donations & Amount -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold uppercase tracking-wider text-gray-400">Total Donations</div>
            <div class="text-3xl font-extrabold text-[#138A4B] mt-1">₹{{ number_format($stats['donation_amount']) }}</div>
            <div class="text-xs text-gray-500 font-semibold mt-1">{{ $stats['total_donations'] }} Total Donors</div>
        </div>
        <div class="w-12 h-12 rounded-xl bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center">
            <i data-lucide="circle-dollar-sign" class="w-6 h-6"></i>
        </div>
    </div>

    <!-- Volunteers -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold uppercase tracking-wider text-gray-400">Volunteer Enquiries</div>
            <div class="text-3xl font-extrabold text-[#F58220] mt-1">{{ $stats['total_volunteers'] }}</div>
            <div class="text-xs text-gray-500 font-semibold mt-1">Community Volunteers</div>
        </div>
        <div class="w-12 h-12 rounded-xl bg-orange-50 text-[#F58220] flex items-center justify-center">
            <i data-lucide="heart-handshake" class="w-6 h-6"></i>
        </div>
    </div>

    <!-- Unread Messages -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold uppercase tracking-wider text-gray-400">Unread Messages</div>
            <div class="text-3xl font-extrabold text-indigo-600 mt-1">{{ $stats['contact_messages'] }}</div>
            <div class="text-xs text-gray-500 font-semibold mt-1">{{ $stats['csr_requests'] }} Pending CSR Leads</div>
        </div>
        <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
            <i data-lucide="mail" class="w-6 h-6"></i>
        </div>
    </div>

</div>

<!-- Quick Actions -->
<div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4">
    <div class="text-sm font-bold text-[#073B63] uppercase tracking-wider">Quick Actions</div>
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-[#073B63] text-white text-xs font-bold hover:bg-[#052a47] transition">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Add New Project</span>
        </a>
        <a href="{{ route('admin.stories.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold hover:bg-[#0e6b3a] transition">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Add Success Story</span>
        </a>
        <a href="{{ route('admin.news.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-[#F58220] text-white text-xs font-bold hover:bg-[#DC6F13] transition">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Publish News Update</span>
        </a>
        <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-gray-100 text-gray-700 text-xs font-bold hover:bg-gray-200 transition">
            <i data-lucide="upload" class="w-4 h-4"></i>
            <span>Upload Gallery Image</span>
        </a>
        <a href="{{ route('admin.donations.settings') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-emerald-50 text-emerald-800 border border-emerald-200 text-xs font-bold hover:bg-emerald-100 transition">
            <i data-lucide="qr-code" class="w-4 h-4"></i>
            <span>Configure UPI & QR</span>
        </a>
    </div>
</div>

<!-- Two Columns: Recent Donations & Recent Volunteer Applicants -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
    <!-- Recent Donations -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4">
        <div class="flex items-center justify-between border-b border-gray-100 pb-4">
            <h2 class="text-base font-bold text-[#073B63]">Recent Donations</h2>
            <a href="{{ route('admin.donations.index') }}" class="text-xs font-semibold text-[#138A4B] hover:underline">View All</a>
        </div>

        @if($recentDonations->count() > 0)
            <div class="divide-y divide-gray-100 text-xs">
                @foreach($recentDonations as $d)
                    <div class="py-3 flex items-center justify-between">
                        <div>
                            <div class="font-bold text-gray-800">{{ $d->donor_name }}</div>
                            <div class="text-gray-400 text-[11px]">{{ $d->donor_email }} • {{ $d->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-[#138A4B] text-sm">₹{{ number_format($d->amount) }}</div>
                            <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold {{ $d->payment_status === 'successful' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                {{ ucfirst($d->payment_status) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 text-gray-400 text-xs">No donation records yet.</div>
        @endif
    </div>

    <!-- Recent Volunteer Applicants -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4">
        <div class="flex items-center justify-between border-b border-gray-100 pb-4">
            <h2 class="text-base font-bold text-[#073B63]">Volunteer Applications</h2>
            <a href="{{ route('admin.volunteers.index') }}" class="text-xs font-semibold text-[#138A4B] hover:underline">View All</a>
        </div>

        @if($recentVolunteers->count() > 0)
            <div class="divide-y divide-gray-100 text-xs">
                @foreach($recentVolunteers as $v)
                    <div class="py-3 flex items-center justify-between">
                        <div>
                            <div class="font-bold text-gray-800">{{ $v->name }} ({{ $v->city ?? 'Nashik' }})</div>
                            <div class="text-gray-400 text-[11px]">{{ $v->area_of_interest ?? 'General' }} • {{ $v->phone }}</div>
                        </div>
                        <div class="text-right">
                            <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold bg-blue-100 text-blue-800">
                                {{ ucfirst($v->status) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 text-gray-400 text-xs">No volunteer applications yet.</div>
        @endif
    </div>

</div>

@endsection
