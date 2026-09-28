@extends('layouts.app')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-r from-[#073B63] to-[#04243D] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                <a href="{{ route('get-involved') }}" class="hover:underline">सहभागी व्हा</a>
                <span>/</span>
                <span>निधी संकलन मोहीम</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight mb-2">
                {{ site_t('involve_fundraise', [], 'निधी संकलन मोहीम') }}
            </h1>
            <p class="text-base sm:text-lg text-gray-200">
                {{ site_t('involve_fundraise_desc', [], 'तुमच्या वाढदिवसानिमित्त किंवा विशेष दिनी निधी संकलन करा.') }}
            </p>
        </div>
    </div>
</section>

<!-- Form Container -->
<section class="py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100">
            <form action="{{ route('fundraise.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">नाव / Full Name *</label>
                        <input type="text" name="name" required value="{{ old('name') }}" placeholder="उदा. सागर देशमुख" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">ईमेल / Email *</label>
                        <input type="email" name="email" required value="{{ old('email') }}" placeholder="name@example.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">मोबाईल / Phone *</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" placeholder="+91 98765 43210" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">शहर / City</label>
                        <input type="text" name="city" value="{{ old('city') }}" placeholder="नाशिक, पुणे, मुंबई..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">मोहिमेचे निमित्त / Campaign Idea</label>
                        <select name="campaign_idea" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                            <option value="Birthday Campaign">वाढदिवसानिमित्त निधी संकलन (Birthday)</option>
                            <option value="Anniversary">विवाह वाढदिवस (Anniversary)</option>
                            <option value="Memorial Campaign">स्मरणार्थ निधी (Memorial)</option>
                            <option value="Marathon / Fitness Challenge">मॅरेथॉन / सायकलिंग चॅलेंज (Fitness)</option>
                            <option value="College Club Drive">महाविद्यालयीन क्लब मोहीम (College)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">अंदाजे संकलन लक्ष्य / Target (₹)</label>
                        <input type="text" name="target_amount" value="{{ old('target_amount', '₹25,000') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">मोहिमेची माहिती व योजना / Campaign Details</label>
                    <textarea name="message" rows="4" placeholder="तुम्ही ही मोहीम कशी राबवू इच्छिता आणि फाउंडेशनकडून कोणत्या मदतीची अपेक्षा आहे?" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#073B63] text-sm text-gray-800">{{ old('message') }}</textarea>
                </div>

                <div>
                    <button type="submit" class="w-full py-4 rounded-xl text-white font-bold bg-[#073B63] hover:bg-[#052a47] shadow-lg shadow-blue-900/20 text-base transition">
                        मोहीम नोंदणी करा / Start Fundraiser
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
