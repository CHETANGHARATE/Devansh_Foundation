@extends('layouts.admin', ['title' => 'Payment & UPI Settings', 'header' => 'Donation Gateway & Bank Configuration'])

@section('content')

<div class="max-w-3xl space-y-6">
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-semibold border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
        <form action="{{ route('admin.donations.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <h4 class="text-sm font-bold text-[#073B63] mb-4 flex items-center gap-2">
                    <i data-lucide="smartphone" class="w-4 h-4 text-[#138A4B]"></i> UPI & Instant Payment Details
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Official UPI ID / VPA *</label>
                        <input type="text" name="upi_id" value="{{ old('upi_id', $settings['upi_id']) }}" required placeholder="devanshfoundation@upi" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-bold text-[#073B63]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Minimum Donation Amount (₹)</label>
                        <input type="number" name="min_amount" value="{{ old('min_amount', $settings['min_amount']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Upload QR Code Image</label>
                        <input type="file" name="qr_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#EAF7EF] file:text-[#138A4B]">
                        @if(!empty($settings['qr_image']))
                            <div class="mt-2 flex items-center gap-2">
                                <img src="{{ $settings['qr_image'] }}" class="w-12 h-12 object-contain rounded border" alt="QR">
                                <span class="text-[11px] text-gray-400">Current QR Code</span>
                            </div>
                        @endif
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Or QR Code Image URL</label>
                        <input type="url" name="qr_image" value="{{ old('qr_image', $settings['qr_image']) }}" placeholder="https://..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100">
                <h4 class="text-sm font-bold text-[#073B63] mb-4 flex items-center gap-2">
                    <i data-lucide="building" class="w-4 h-4 text-[#138A4B]"></i> Direct Bank Account Details (NEFT / RTGS / IMPS)
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Bank Name</label>
                        <input type="text" name="bank_name" value="{{ old('bank_name', $settings['bank_name']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Account Holder Name</label>
                        <input type="text" name="account_holder" value="{{ old('account_holder', $settings['account_holder']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Account Number</label>
                        <input type="text" name="account_number" value="{{ old('account_number', $settings['account_number']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-mono font-bold">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">IFSC Code</label>
                        <input type="text" name="ifsc_code" value="{{ old('ifsc_code', $settings['ifsc_code']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-mono font-bold uppercase">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Bank Branch</label>
                        <input type="text" name="bank_branch" value="{{ old('bank_branch', $settings['bank_branch']) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100">
                <h4 class="text-sm font-bold text-[#073B63] mb-4 flex items-center gap-2">
                    <i data-lucide="shield-check" class="w-4 h-4 text-[#138A4B]"></i> 80G Tax Exemption Note & Legal Disclaimers
                </h4>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">80G Tax Exemption Details</label>
                    <textarea name="tax_80g_info" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm">{{ old('tax_80g_info', $settings['tax_80g_info']) }}</textarea>
                    <p class="text-[11px] text-gray-400 mt-1">This text will be prominently displayed on the public /donate page.</p>
                </div>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                <a href="{{ route('admin.donations.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-semibold">Back to Donations</a>
                <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-md hover:bg-[#0f6c3a] transition-colors">
                    Save Payment Settings
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
