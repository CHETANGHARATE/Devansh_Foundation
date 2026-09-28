@extends('layouts.app')

@section('content')

<section class="py-20 bg-gray-50">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100 text-center space-y-6">
            
            <!-- Success Icon Badge -->
            <div class="w-20 h-20 rounded-full bg-[#EAF7EF] text-[#138A4B] flex items-center justify-center mx-auto shadow-inner">
                <i data-lucide="check" class="w-10 h-10 stroke-[3]"></i>
            </div>

            <div class="space-y-2">
                <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#EAF7EF] text-[#138A4B]">
                    <span>देणगी नोंदणी यशस्वी / Donation Registered</span>
                </div>
                <h1 class="text-3xl font-extrabold text-[#073B63]">
                    देवांश फाउंडेशनतर्फे मनःपूर्वक धन्यवाद!
                </h1>
                <p class="text-sm text-gray-600 max-w-md mx-auto">
                    तुमच्या देणगीमुळे समाजातील गरजू बालके आणि कुटुंबांच्या जीवनात मोठा सकारात्मक बदल घडण्यास मदत होणार आहे.
                </p>
            </div>

            <!-- Receipt Summary Box -->
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 text-left space-y-3 text-sm">
                <div class="flex justify-between items-center py-1 border-b border-gray-200">
                    <span class="text-gray-500">पावती संदर्भ क्रमांक:</span>
                    <span class="font-mono font-bold text-[#073B63]">{{ $donation->receipt_number }}</span>
                </div>
                <div class="flex justify-between items-center py-1 border-b border-gray-200">
                    <span class="text-gray-500">देणगीदार नाव:</span>
                    <span class="font-bold text-gray-800">{{ $donation->donor_name }}</span>
                </div>
                <div class="flex justify-between items-center py-1 border-b border-gray-200">
                    <span class="text-gray-500">रक्कम / Amount:</span>
                    <span class="font-bold text-[#138A4B] text-lg">₹{{ number_format($donation->amount) }}</span>
                </div>
                <div class="flex justify-between items-center py-1">
                    <span class="text-gray-500">स्थिती / Status:</span>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold {{ $donation->payment_status === 'successful' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                        {{ ucfirst($donation->payment_status) }}
                    </span>
                </div>
            </div>

            <!-- UPI QR if status is pending -->
            @if($donation->payment_status !== 'successful')
                <div class="bg-[#EEF6FB] rounded-2xl p-6 border border-[#073B63]/10 space-y-4">
                    <h3 class="text-base font-bold text-[#073B63]">पेमेंट पूर्ण करण्यासाठी UPI स्कॅन करा:</h3>
                    <div class="w-44 h-44 bg-white rounded-xl p-2 mx-auto shadow-sm">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=upi://pay?pa={{ urlencode($upiId) }}%26pn=Devansh%20Foundation%26am={{ $donation->amount }}%26cu=INR" alt="QR" class="w-full h-full object-contain">
                    </div>
                    <div class="text-xs text-gray-600">
                        UPI ID: <span class="font-mono font-bold text-[#073B63]">{{ $upiId }}</span>
                    </div>
                </div>
            @endif

            <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('home') }}" class="w-full sm:w-auto px-8 py-3 rounded-xl bg-[#073B63] text-white font-bold text-sm transition hover:bg-[#052a47]">
                    मुख्यपृष्ठावर परत जा
                </a>
                <button onclick="window.print()" class="w-full sm:w-auto px-6 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold text-sm hover:bg-gray-50 transition flex items-center justify-center space-x-1.5">
                    <i data-lucide="printer" class="w-4 h-4"></i>
                    <span>पावती प्रिंट करा</span>
                </button>
            </div>

        </div>
    </div>
</section>

@endsection
