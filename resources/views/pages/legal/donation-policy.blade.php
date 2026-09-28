@extends('layouts.app')

@section('content')

<section class="bg-[#073B63] text-white py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <h1 class="text-3xl font-extrabold">{{ site_t('donation_policy', [], 'देणगी धोरण (Donation Policy)') }}</h1>
        <p class="text-xs text-gray-300 mt-2">देवांश फाउंडेशन, नाशिक, महाराष्ट्र</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 prose prose-slate">
        <h2>१. देणग्यांचा विनियोग (Allocation of Funds)</h2>
        <p>प्राप्त झालेल्या देणग्या थेट शिक्षण, मोफत आरोग्य शिबिरे, महिला सक्षमीकरण, वृक्षारोपण आणि ग्रामीण पाणी प्रकल्पांसाठी खर्ची केल्या जातात. प्रशासकीय खर्च किमान ठेवून कमाल निधी प्रत्यक्ष समाजकार्यासाठी वापरला जातो.</p>

        <h2>२. आयकर सवलत (80G Exemption)</h2>
        <p>देवांश फाउंडेशनला देण्यात येणाऱ्या देणग्या भारतीय आयकर कायद्याच्या कलम 80G अंतर्गत 50% कर सवलतीस पात्र आहेत. कर सवलतीची पावती मिळवण्यासाठी देणगीदाराने पॅन कार्ड क्रमांक देणे आवश्यक आहे.</p>

        <h2>३. परकीय देणग्या (Foreign Contributions)</h2>
        <p>सध्या संस्था केवळ भारतीय नागरिक आणि भारतीय बँक खात्यांमधून भारतीय रुपयांमध्ये (INR) देणग्या स्वीकारते.</p>
    </div>
</section>

@endsection
