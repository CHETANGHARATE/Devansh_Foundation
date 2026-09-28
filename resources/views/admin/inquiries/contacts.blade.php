@extends('layouts.admin', ['title' => 'Contact Messages', 'header' => 'Contact & Citizen Inquiries'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Direct Citizen Messages</h3>
            <p class="text-xs text-gray-500">Inquiries submitted via the public /contact form (protected with anti-spam honeypot)</p>
        </div>
        <div class="text-xs font-semibold text-gray-600 bg-white px-4 py-2 rounded-xl border border-gray-100 shadow-sm">
            Total Messages: <strong class="text-[#073B63]">{{ $contacts->total() }}</strong>
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
                        <th class="px-6 py-4">Sender</th>
                        <th class="px-6 py-4">Subject</th>
                        <th class="px-6 py-4">Message</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($contacts as $msg)
                        <tr class="hover:bg-gray-50/50 transition-colors {{ !$msg->is_read ? 'bg-amber-50/30' : '' }}">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800 text-sm">{{ $msg->name }}</div>
                                <div class="text-[11px] text-gray-500">{{ $msg->phone }} &bull; {{ $msg->email }}</div>
                                <div class="text-[10px] text-gray-400 mt-0.5">{{ $msg->created_at->format('d M Y, h:i A') }}</div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $msg->subject }}
                            </td>
                            <td class="px-6 py-4 max-w-sm">
                                <div class="text-xs text-gray-600 line-clamp-3">{{ $msg->message }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($msg->is_read)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600">Read</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">New Message</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if(!$msg->is_read)
                                    <form action="{{ route('admin.contacts.read', $msg->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 rounded-lg bg-[#073B63] text-white text-[11px] font-bold hover:bg-[#052b49] transition-colors">
                                            Mark Read
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-[11px]">Completed</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                No contact messages in inbox.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($contacts->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
