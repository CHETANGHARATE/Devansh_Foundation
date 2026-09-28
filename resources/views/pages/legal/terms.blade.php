@extends('layouts.app')

@section('content')

<section class="bg-[#073B63] text-white py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <h1 class="text-3xl font-extrabold">{{ site_t('terms_conditions', [], 'अटी व शर्ती (Terms & Conditions)') }}</h1>
        <p class="text-xs text-gray-300 mt-2">देवांश फाउंडेशन, नाशिक, महाराष्ट्र</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 prose prose-slate">
        <h2>१. वेबसाइटचा वापर (Use of Website)</h2>
        <p>या संकेतस्थळाचा वापर केवळ सामाजिक, शैक्षणिक आणि सेवाभावी हेतूने देणगी किंवा स्वयंसेवक सहभागासाठी केला जावा. संकेतस्थळावरील सामग्री अनधिकृतपणे व्यावसायिक हेतूंसाठी वापरण्यास मनाई आहे.</p>

        <h2>२. देणगी आणि पावत्या (Donations)</h2>
        <p>सर्व देणग्या ऐच्छिक असून त्या वंचित समुदायाच्या कल्याणासाठी वापरल्या जातात. प्रत्येक वैध देणगीसाठी डिजिटल पावती दिली जाते.</p>

        <h2>३. कायदेशीर कार्यक्षेत्र (Jurisdiction)</h2>
        <p>या अटी व शर्तींचे पालन भारतीय कायद्यांनुसार केले जाईल आणि कोणतेही वाद नाशिक, महाराष्ट्र येथील न्यायालयाच्या अधिकारक्षेत्रात येतील.</p>
    </div>
</section>

@endsection
