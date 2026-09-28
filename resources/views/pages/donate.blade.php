@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#138A4B] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/15 text-white mb-4">
                <span>सहकार्य व देणगी / Support Us</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight mb-2">
                {{ site_t('donate_heading', [], 'देणगी द्या आणि बदल घडवा') }}
            </h1>
            <p class="text-base sm:text-lg text-emerald-100">
                {{ site_t('donate_subheading', [], 'तुमची छोटी मदत, एखाद्याच्या आयुष्यात मोठा बदल घडवू शकते.') }}
            </p>
        </div>
    </div>
</section>

<!-- Main Donation Container -->
<section class="py-16 bg-gray-50" x-data="{ 
    donationType: 'one-time', 
    selectedAmount: {{ $presetAmount ?: 1000 }}, 
    customAmount: '',
    paymentMethod: 'upi_qr',
    setAmount(val) {
        this.selectedAmount = val;
        this.customAmount = '';
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left 7 Columns: Interactive Donation Form -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 shadow-sm border border-gray-100 space-y-8">
                <form action="{{ route('donate.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- 1. Frequency Switcher -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">1. देणगी वारंवारता / Frequency</label>
                        <div class="grid grid-cols-2 gap-3 max-w-sm">
                            <button type="button" 
                                    @click="donationType = 'one-time'" 
                                    :class="donationType === 'one-time' ? 'bg-[#073B63] text-white font-bold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" 
                                    class="py-3 px-4 rounded-xl text-sm transition text-center">
                                {{ site_t('donate_onetime', [], 'एकदाच (One-Time)') }}
                            </button>
                            <button type="button" 
                                    @click="donationType = 'monthly'" 
                                    :class="donationType === 'monthly' ? 'bg-[#073B63] text-white font-bold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" 
                                    class="py-3 px-4 rounded-xl text-sm transition text-center">
                                {{ site_t('donate_monthly', [], 'मासिक (Monthly)') }}
                            </button>
                        </div>
                        <input type="hidden" name="donation_type" :value="donationType">
                    </div>

                    <!-- 2. Amount Selector -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">2. देणगी रक्कम निवडा / Amount (₹)</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-3">
                            @foreach([500, 1000, 2500, 5000] as $amt)
                                <button type="button" 
                                        @click="setAmount({{ $amt }})" 
                                        :class="selectedAmount === {{ $amt }} && customAmount === '' ? 'border-2 border-[#138A4B] bg-[#EAF7EF] text-[#138A4B] font-extrabold shadow-sm' : 'border border-gray-200 hover:border-gray-300 text-gray-700 bg-white'" 
                                        class="py-3.5 px-3 rounded-xl text-base transition text-center font-bold">
                                    ₹{{ number_format($amt) }}
                                </button>
                            @endforeach
                        </div>

                        <!-- Custom Amount Input -->
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 font-bold">₹</span>
                            <input type="number" 
                                   name="amount" 
                                   x-model="customAmount" 
                                   @input="selectedAmount = customAmount"
                                   :value="customAmount ? customAmount : selectedAmount"
                                   placeholder="{{ site_t('donate_custom_amount', [], 'इतर रक्कम प्रविष्ट करा (₹)') }}"
                                   min="100" 
                                   required
                                   class="w-full pl-8 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] focus:ring focus:ring-emerald-100 text-sm font-semibold text-gray-900 transition">
                        </div>
                    </div>

                    <!-- 3. Cause / Dedicated Project (Optional) -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">3. विशिष्ट प्रकल्प / Dedicated Cause (Optional)</label>
                        <select name="project_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            <option value="">सर्वसामान्य समाज कल्याण निधी (General Community Fund)</option>
                            @foreach($projects as $p)
                                <option value="{{ $p->id }}" {{ $selectedProjectId == $p->id ? 'selected' : '' }}>
                                    {{ $p->translation()?->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- 4. Donor Information -->
                    <div class="space-y-4 pt-2 border-t border-gray-100">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">4. देणगीदाराची माहिती / Donor Details</label>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">{{ site_t('donor_full_name', [], 'पूर्ण नाव') }} *</label>
                                <input type="text" name="donor_name" required value="{{ old('donor_name') }}" placeholder="उदा. सागर पाटील" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">{{ site_t('donor_phone', [], 'मोबाईल नंबर') }} *</label>
                                <input type="tel" name="donor_phone" required value="{{ old('donor_phone') }}" placeholder="+91 98765 43210" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">{{ site_t('donor_email', [], 'ईमेल पत्ता') }} *</label>
                                <input type="email" name="donor_email" required value="{{ old('donor_email') }}" placeholder="name@example.com" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">{{ site_t('donor_pan', [], 'पॅन कार्ड नंबर') }} (80G कर सवलतीसाठी)</label>
                                <input type="text" name="donor_pan" value="{{ old('donor_pan') }}" placeholder="ABCDE1234F" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm uppercase text-gray-800">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs text-gray-600 mb-1">{{ site_t('donor_address', [], 'पत्ता व शहर') }}</label>
                            <input type="text" name="donor_address" value="{{ old('donor_address') }}" placeholder="पत्ता व पिनकोड" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                        </div>
                    </div>

                    <!-- 5. Payment Method & Transaction Reference -->
                    <div class="space-y-4 pt-2 border-t border-gray-100">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">5. पेमेंट पद्धत / Payment Mode</label>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <label class="flex items-center space-x-2.5 p-3 rounded-xl border cursor-pointer" :class="paymentMethod === 'upi_qr' ? 'border-[#138A4B] bg-[#EAF7EF]' : 'border-gray-200'">
                                <input type="radio" name="payment_method" value="upi_qr" x-model="paymentMethod" class="text-[#138A4B]">
                                <span class="text-xs font-bold text-gray-800">UPI / QR Code</span>
                            </label>
                            <label class="flex items-center space-x-2.5 p-3 rounded-xl border cursor-pointer" :class="paymentMethod === 'bank_transfer' ? 'border-[#138A4B] bg-[#EAF7EF]' : 'border-gray-200'">
                                <input type="radio" name="payment_method" value="bank_transfer" x-model="paymentMethod" class="text-[#138A4B]">
                                <span class="text-xs font-bold text-gray-800">बँक ट्रान्सफर / NEFT</span>
                            </label>
                            <label class="flex items-center space-x-2.5 p-3 rounded-xl border cursor-pointer" :class="paymentMethod === 'gateway' ? 'border-[#138A4B] bg-[#EAF7EF]' : 'border-gray-200'">
                                <input type="radio" name="payment_method" value="gateway" x-model="paymentMethod" class="text-[#138A4B]">
                                <span class="text-xs font-bold text-gray-800">Gateway / Cards</span>
                            </label>
                        </div>

                        <!-- If already paid via UPI app, enter reference ID -->
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">UPI Transaction Reference ID / UTR (पेमेंट झाले असल्यास)</label>
                            <input type="text" name="transaction_id" placeholder="उदा. 428910294123" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full py-4 rounded-xl text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 text-base transition flex items-center justify-center space-x-2">
                            <i data-lucide="heart" class="w-5 h-5 fill-white"></i>
                            <span>{{ site_t('proceed_donation', [], 'देणगीसह पुढे जा') }}</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right 5 Columns: QR Code & Bank Account Details -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- UPI Scan & Pay Card -->
                <div class="bg-gradient-to-br from-[#073B63] to-[#04243D] text-white rounded-3xl p-8 shadow-md space-y-6">
                    <div class="text-center space-y-2">
                        <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300">
                            <span>{{ site_t('donate_upi_title', [], 'UPI द्वारे त्वरित देणगी') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-white">{{ site_t('donate_scan_pay', [], 'स्कॅन करून थेट पेमेंट करा') }}</h3>
                    </div>

                    <!-- QR Image -->
                    <div class="bg-white rounded-2xl p-4 w-56 h-56 mx-auto shadow-inner flex items-center justify-center">
                        <img src="{{ $qrImage ?: 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=upi://pay?pa=' . urlencode($upiId) . '%26pn=Devansh%20Foundation%26cu=INR' }}" 
                             alt="Devansh Foundation UPI QR Code" 
                             class="w-full h-full object-contain">
                    </div>

                    <div class="text-center space-y-2">
                        <div class="text-xs text-gray-300">अधिकृत UPI ID:</div>
                        <div class="font-mono text-base font-bold bg-white/10 py-1.5 px-4 rounded-xl border border-white/20 select-all inline-block">
                            {{ $upiId }}
                        </div>
                        <p class="text-[11px] text-gray-300">कोणत्याही UPI ॲपवरून (GPay, PhonePe, Paytm, BHIM) स्कॅन करा.</p>
                    </div>
                </div>

                <!-- Bank Account Details Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm space-y-4">
                    <h3 class="text-lg font-bold text-[#073B63] flex items-center space-x-2">
                        <i data-lucide="building-2" class="w-5 h-5 text-[#138A4B]"></i>
                        <span>{{ site_t('donate_bank_transfer', [], 'थेट बँक खाते तपशील') }}</span>
                    </h3>

                    <div class="space-y-3 text-xs divide-y divide-gray-100">
                        <div class="flex justify-between py-1.5">
                            <span class="text-gray-500">खातेधारक नाव:</span>
                            <span class="font-bold text-gray-900">{{ $accountHolder }}</span>
                        </div>
                        <div class="flex justify-between py-1.5">
                            <span class="text-gray-500">बँकेचे नाव:</span>
                            <span class="font-bold text-gray-900">{{ $bankName }}</span>
                        </div>
                        <div class="flex justify-between py-1.5">
                            <span class="text-gray-500">खाते क्रमांक:</span>
                            <span class="font-mono font-bold text-gray-900 text-sm select-all">{{ $accountNumber }}</span>
                        </div>
                        <div class="flex justify-between py-1.5">
                            <span class="text-gray-500">IFSC कोड:</span>
                            <span class="font-mono font-bold text-gray-900 select-all">{{ $ifsc }}</span>
                        </div>
                        <div class="flex justify-between py-1.5">
                            <span class="text-gray-500">शाखा:</span>
                            <span class="font-semibold text-gray-800">{{ $branch }}</span>
                        </div>
                    </div>

                    <div class="bg-[#EAF7EF] p-3 rounded-xl border border-[#138A4B]/20 flex items-start space-x-2 text-[11px] text-[#0D6636]">
                        <i data-lucide="shield-check" class="w-4 h-4 shrink-0 mt-0.5"></i>
                        <span>{{ $tax80gInfo }}</span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection
