@extends('layouts.app')

@section('content')

<section class="bg-[#073B63] text-white py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <h1 class="text-3xl font-extrabold">{{ site_t('refund_policy', [], 'परतावा व रद्दीकरण धोरण (Refund Policy)') }}</h1>
        <p class="text-xs text-gray-300 mt-2">देवांश फाउंडेशन, नाशिक, महाराष्ट्र</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 prose prose-slate">
        <h2>१. देणगी परतावा (Donation Refunds)</h2>
        <p>सामाजिक संस्था म्हणून प्राप्त झालेल्या देणग्या त्वरित लोककल्याणकारी कामांसाठी नियोजित केल्या जातात, त्यामुळे सर्वसाधारणपणे देणगी परत केली जात नाही. तथापि, तांत्रिक त्रुटीमुळे दुप्पट व्यवहार (Double deduction) झाल्यास ७ कामकाजाच्या दिवसांत तक्रार नोंदवून योग्य पडताळणीनंतर परतावा दिला जातो.</p>

        <h2>२. मासिक देणगी रद्दीकरण (Recurring Cancellation)</h2>
        <p>कोणताही देणगीदार आपली मासिक किंवा नियमित देणगी कधीही ईमेलद्वारे विनंती करून थांबवू शकतो.</p>
    </div>
</section>

@endsection
