@extends('layouts.admin', ['title' => 'Volunteer Applications', 'header' => 'Volunteer Applications'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Community Volunteer Roster</h3>
            <p class="text-xs text-gray-500">People who signed up to donate time, skills, and ground assistance</p>
        </div>
        <div class="text-xs font-semibold text-gray-600 bg-white px-4 py-2 rounded-xl border border-gray-100 shadow-sm">
            Total Applicants: <strong class="text-[#138A4B]">{{ $volunteers->total() }}</strong>
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
                        <th class="px-6 py-4">Applicant</th>
                        <th class="px-6 py-4">City / Availability</th>
                        <th class="px-6 py-4">Interest Areas & Skills</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($volunteers as $item)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800 text-sm">{{ $item->full_name }}</div>
                                <div class="text-[11px] text-gray-500">{{ $item->phone }} &bull; {{ $item->email }}</div>
                                <div class="text-[10px] text-gray-400 mt-0.5">Applied {{ $item->created_at->format('d M, Y') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-700">{{ $item->city }}</div>
                                <div class="text-[11px] text-gray-500">{{ $item->availability }}</div>
                            </td>
                            <td class="px-6 py-4 max-w-xs">
                                <div class="font-medium text-[#073B63]">{{ $item->areas_of_interest }}</div>
                                <div class="text-[11px] text-gray-500 line-clamp-1 mt-0.5">{{ $item->skills_experience }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($item->status === 'approved')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">Approved</span>
                                @elseif($item->status === 'contacted')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-blue-700">Contacted</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700">Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.volunteers.status', $item->id) }}" method="POST" class="inline-flex items-center gap-1">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="px-2 py-1 rounded-lg border border-gray-200 text-xs font-semibold">
                                        <option value="pending" {{ $item->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="contacted" {{ $item->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                        <option value="approved" {{ $item->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $item->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                No volunteer applications received yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($volunteers->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $volunteers->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
