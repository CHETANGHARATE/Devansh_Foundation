@extends('layouts.admin', ['title' => 'Featured Campaigns', 'header' => 'Featured Campaigns'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Featured Campaigns</h3>
            <p class="text-xs text-gray-500">Manage major fundraising drives and community programs shown on the homepage carousel</p>
        </div>
        <a href="{{ route('admin.campaigns.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition-colors w-fit">
            <i data-lucide="plus" class="w-4 h-4"></i> Add New Campaign
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
                        <th class="px-6 py-4">Campaign</th>
                        <th class="px-6 py-4">Target & Raised</th>
                        <th class="px-6 py-4">Progress</th>
                        <th class="px-6 py-4">Impact Boxes</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($campaigns as $campaign)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-500">
                                #{{ $campaign->order }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset(ltrim($campaign->featured_image, '/')) }}" class="w-16 h-12 rounded-xl object-cover border border-gray-200 shadow-sm" alt="{{ $campaign->title }}">
                                    <div class="max-w-xs">
                                        <div class="font-bold text-gray-900 text-sm leading-snug line-clamp-1">{{ $campaign->title }}</div>
                                        <div class="text-[11px] text-[#138A4B] font-semibold mt-0.5 line-clamp-1">
                                            Highlight: {{ $campaign->title_highlight ?: 'None' }}
                                        </div>
                                        <div class="text-[10px] text-gray-400 font-mono mt-0.5">/campaigns/{{ $campaign->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900">₹{{ number_format($campaign->target_amount) }}</div>
                                <div class="text-[11px] text-emerald-700 font-medium">Raised: ₹{{ number_format($campaign->raised_amount) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="w-28 space-y-1">
                                    <div class="flex justify-between text-[10px] font-semibold text-gray-600">
                                        <span>{{ $campaign->progress_percentage }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                                        <div class="bg-[#138A4B] h-full rounded-full" style="width: {{ $campaign->progress_percentage }}%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-700">
                                    {{ $campaign->impacts->count() }} Boxes
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <div>
                                        @if($campaign->status === 'active')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">Active</span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600">{{ ucfirst($campaign->status) }}</span>
                                        @endif
                                    </div>
                                    @if($campaign->is_featured)
                                        <div>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[9px] font-extrabold bg-[#FA5A3A]/10 text-[#FA5A3A] tracking-wider">FEATURED</span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('campaigns.show', $campaign->slug) }}" target="_blank" class="p-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition" title="Preview Public Page">
                                        <i data-lucide="external-link" class="w-4 h-4"></i>
                                    </a>
                                    <a href="{{ route('admin.campaigns.edit', $campaign) }}" class="p-2 rounded-lg bg-emerald-50 text-[#138A4B] hover:bg-emerald-100 transition" title="Edit Campaign">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.campaigns.destroy', $campaign) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this campaign?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition" title="Delete Campaign">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                No campaigns found. Click "Add New Campaign" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($campaigns->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $campaigns->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
