@extends('layouts.admin', ['title' => 'Admin Profile', 'header' => 'Admin Account Profile'])

@section('content')

<div class="max-w-2xl space-y-6">
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-semibold border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
        <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Full Name *</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
                @error('name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Login Email Address *</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
                @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 border-t border-gray-100">
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Change Password (leave blank to keep current)</h4>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">New Password</label>
                        <input type="password" name="password" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                        @error('password')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#073B63] text-white text-xs font-bold shadow-md hover:bg-[#052b49] transition-colors">
                    Update Account Profile
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
