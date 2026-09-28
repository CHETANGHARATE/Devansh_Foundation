@extends('layouts.app')

@section('content')

<section class="bg-[#073B63] text-white py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <h1 class="text-3xl font-extrabold">{{ site_t('disclaimer', [], 'अस्वीकरण (Disclaimer)') }}</h1>
        <p class="text-xs text-gray-300 mt-2">देवांश फाउंडेशन, नाशिक, महाराष्ट्र</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 prose prose-slate">
        <p>या वेबसाइटवरील सर्व माहिती केवळ सामान्य जनजागृती आणि सामाजिक कामांच्या पारदर्शकता हेतूने प्रसिद्ध करण्यात आली आहे. देवांश फाउंडेशन सर्व माहिती अचूक व अद्ययावत ठेवण्याचा पुरेपूर प्रयत्न करते. अधिक माहितीसाठी थेट आमच्या नाशिक येथील कार्यालयाशी संपर्क साधावा.</p>
    </div>
</section>

@endsection
