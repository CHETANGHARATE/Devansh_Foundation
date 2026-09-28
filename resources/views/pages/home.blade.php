@extends('layouts.app')

@section('content')

<!-- ==========================================
     SECTION 1 — HERO SECTION
=========================================== -->
<section class="relative bg-gradient-to-b from-[#EEF6FB] via-white to-white overflow-hidden py-16 lg:py-24">
    <!-- Decorative background blobs -->
    <div class="absolute top-0 right-0 -mr-24 -mt-24 w-96 h-96 rounded-full bg-[#138A4B]/10 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-24 -mb-24 w-96 h-96 rounded-full bg-[#073B63]/10 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Text Content -->
            <div class="lg:col-span-6 space-y-6 text-center lg:text-left">
                <!-- Mission Badge -->
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-[#EAF7EF] border border-[#138A4B]/20 text-[#138A4B] text-xs sm:text-sm font-bold tracking-wide">
                    <span class="w-2 h-2 rounded-full bg-[#138A4B] animate-ping"></span>
                    <span>देवांश फाउंडेशन • नाशिक, महाराष्ट्र</span>
                </div>

                <!-- Main Emotional Headline -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-[#073B63] tracking-tight leading-[1.15]">
                    <span class="block">{{ site_t('hero_title_line1', [], 'समाजाच्या') }}</span>
                    <span class="block text-[#138A4B]">{{ site_t('hero_title_line2', [], 'उज्ज्वल भविष्यासाठी') }}</span>
                    <span class="block">{{ site_t('hero_title_line3', [], 'एकत्र!') }}</span>
                </h1>

                <!-- Supporting Description -->
                <p class="text-lg text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0">
                    {{ site_t('hero_subtitle', [], 'शिक्षण, आरोग्य, महिला सक्षमीकरण, बालकल्याण, पर्यावरण आणि ग्रामीण विकासासाठी आमचे सतत प्रयत्न...') }}
                </p>

                <!-- Action CTAs -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="{{ route('donate') }}" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2.5 px-8 py-4 rounded-xl text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 transition transform hover:-translate-y-0.5 text-base">
                        <i data-lucide="heart" class="w-5 h-5 fill-white"></i>
                        <span>{{ site_t('btn_donate', [], 'देणगी द्या') }}</span>
                    </a>

                    <a href="{{ route('volunteer') }}" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2.5 px-7 py-4 rounded-xl text-[#073B63] font-bold bg-white hover:bg-gray-50 border-2 border-[#073B63]/20 hover:border-[#073B63] shadow-sm transition transform hover:-translate-y-0.5 text-base">
                        <i data-lucide="heart-handshake" class="w-5 h-5 text-[#138A4B]"></i>
                        <span>{{ site_t('btn_volunteer', [], 'स्वयंसेवक व्हा') }}</span>
                    </a>
                </div>

                <!-- Trust Micro-Proof -->
                <div class="pt-6 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-xs text-gray-500 font-medium">
                    <div class="flex items-center space-x-1.5">
                        <i data-lucide="shield-check" class="w-4 h-4 text-[#138A4B]"></i>
                        <span>100% पारदर्शक कार्यपद्धती</span>
                    </div>
                    <div class="flex items-center space-x-1.5">
                        <i data-lucide="award" class="w-4 h-4 text-[#F58220]"></i>
                        <span>कलम 80G कर सवलत लागू</span>
                    </div>
                    <div class="flex items-center space-x-1.5">
                        <i data-lucide="users" class="w-4 h-4 text-[#073B63]"></i>
                        <span>10,000+ लाभार्थी</span>
                    </div>
                </div>
            </div>

            <!-- Right Hero Imagery with Circular Insets & Handwritten Note -->
            <div class="lg:col-span-6 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    
                    <!-- Main Large Hero Image -->
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-gray-100 aspect-[4/3] group">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1000&q=80" 
                             alt="Devansh Foundation Community Work" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    </div>

                    <!-- Supporting Circular Badges / Inset Images -->
                    <!-- Inset 1: Education -->
                    <div class="absolute -bottom-6 -left-6 w-28 h-28 sm:w-32 sm:h-32 rounded-full overflow-hidden border-4 border-white shadow-xl ring-2 ring-[#138A4B]/20 hidden sm:block hover:scale-110 transition duration-300">
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=400&q=80" alt="Education" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                            <span class="text-[10px] text-white font-bold uppercase tracking-wider drop-shadow">शिक्षण</span>
                        </div>
                    </div>

                    <!-- Inset 2: Healthcare -->
                    <div class="absolute -top-6 -right-6 w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden border-4 border-white shadow-xl ring-2 ring-[#073B63]/20 hidden sm:block hover:scale-110 transition duration-300">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=400&q=80" alt="Healthcare" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                            <span class="text-[10px] text-white font-bold uppercase tracking-wider drop-shadow">आरोग्य</span>
                        </div>
                    </div>

                    <!-- Handwritten Note Badge -->
                    <div class="absolute -bottom-10 right-4 sm:right-8 bg-[#F58220] text-white px-5 py-3 rounded-2xl shadow-xl transform rotate-3 hover:rotate-0 transition border-2 border-white">
                        <div class="handwritten-font text-xl sm:text-2xl font-bold leading-none">
                            "{{ site_t('hero_handwritten', [], 'लहान पावले, मोठा बदल') }}"
                        </div>
                        <div class="text-[10px] uppercase tracking-wider text-orange-100 font-semibold mt-0.5">
                            Small Steps, Big Changes
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- ==========================================
     SECTION 2 — OUR FOCUS AREAS (8 CARDS)
=========================================== -->
<section class="py-20 bg-white" id="focus-areas">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading 
            :badge="site_t('focus_heading', [], 'आमची कार्यक्षेत्रे')"
            :title="site_t('focus_heading', [], 'आमची कार्यक्षेत्रे')"
            :subtitle="site_t('focus_subheading', [], 'गरजू व वंचित घटकांच्या सर्वांगीण विकासासाठी विविध क्षेत्रांत समर्पित सामाजिक कार्य')"
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($focusAreas as $area)
                <x-focus-card :area="$area" />
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('our-work.index') }}" class="inline-flex items-center space-x-2 text-sm font-bold text-[#073B63] hover:text-[#138A4B] transition">
                <span>सर्व कार्यक्षेत्रे सविस्तर पहा / Explore All Focus Areas</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>


<!-- ==========================================
     SECTION 3 — OUR IMPACT (ANIMATED COUNTERS)
=========================================== -->
<section class="py-20 bg-gradient-to-br from-[#073B63] via-[#052a47] to-[#138A4B] text-white relative overflow-hidden" id="impact">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-3">
                {{ site_t('impact_heading', [], 'आपला सामाजिक प्रभाव') }}
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                {{ site_t('impact_heading', [], 'आपला सामाजिक प्रभाव') }}
            </h2>
            <p class="mt-4 text-base sm:text-lg text-gray-200">
                {{ site_t('impact_subheading', [], 'पारदर्शक कार्यपद्धती आणि लोकांच्या विश्वासावर आधारलेला वास्तविक बदल') }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($impactStats as $stat)
                <x-impact-counter :stat="$stat" />
            @endforeach
        </div>

        <div class="mt-14 text-center">
            <a href="{{ route('impact') }}" class="inline-flex items-center space-x-2 px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white text-sm font-semibold border border-white/20 transition">
                <span>संपूर्ण प्रभाव अहवाल व विश्लेषण पहा / View Full Impact Report</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>


<!-- ==========================================
     SECTION 4 — FEATURED PROJECTS (5 PROJECTS)
=========================================== -->
<section class="py-20 bg-gray-50" id="projects">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <div class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase bg-[#EAF7EF] text-[#138A4B] border border-[#138A4B]/20 mb-3">
                    <span>प्रकल्प / Initiatives</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#073B63] tracking-tight">
                    {{ site_t('projects_heading', [], 'मुख्य प्रकल्प') }}
                </h2>
                <p class="mt-2 text-base text-gray-600 max-w-xl">
                    {{ site_t('projects_subheading', [], 'समाजात सकारात्मक बदल घडवणारे आमचे चालू आणि पूर्ण झालेले उपक्रम') }}
                </p>
            </div>

            <div class="mt-4 md:mt-0">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center space-x-2 px-6 py-3 rounded-xl bg-white border border-gray-200 text-[#073B63] hover:text-[#138A4B] hover:border-[#138A4B] font-bold text-sm shadow-sm transition">
                    <span>{{ site_t('btn_view_all_projects', [], 'सर्व प्रकल्प पहा') }}</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>

        <!-- 5 Projects Layout: Top 2 large, bottom 3 columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProjects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    </div>
</section>


<!-- ==========================================
     SECTION 5 — SUCCESS STORIES
=========================================== -->
<section class="py-20 bg-white" id="stories">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading 
            :badge="site_t('stories_heading', [], 'यशोगाथा')"
            :title="site_t('stories_heading', [], 'यशोगाथा व अनुभव')"
            :subtitle="site_t('stories_subheading', [], 'देवांश फाउंडेशनच्या उपक्रमांमुळे ज्यांच्या आयुष्यात नवी पहाट उगवली अशा व्यक्तींच्या प्रेरक गोष्टी')"
            badgeColor="orange"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($successStories as $story)
                <x-story-card :story="$story" />
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('stories.index') }}" class="inline-flex items-center space-x-2 px-6 py-3 rounded-xl bg-[#EEF6FB] text-[#073B63] hover:bg-[#073B63] hover:text-white font-bold text-sm transition">
                <span>अधिक यशोगाथा वाचा / Read More Stories</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>


<!-- ==========================================
     SECTION 6 — DONATION / SUPPORT OUR CAUSE
=========================================== -->
<section class="py-20 bg-[#EAF7EF] relative overflow-hidden" id="donate">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                
                <!-- Left Information Column -->
                <div class="lg:col-span-5 bg-gradient-to-br from-[#073B63] to-[#04243D] text-white p-8 lg:p-12 flex flex-col justify-between">
                    <div>
                        <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-4">
                            <i data-lucide="heart" class="w-3.5 h-3.5 fill-current"></i>
                            <span>{{ site_t('donate_heading', [], 'देणगी द्या') }}</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight leading-tight mb-4">
                            {{ site_t('donate_heading', [], 'देणगी द्या आणि बदल घडवा') }}
                        </h2>
                        <p class="text-gray-200 text-base leading-relaxed mb-6">
                            {{ site_t('donate_subheading', [], 'तुमची छोटी मदत, एखाद्याच्या आयुष्यात मोठा बदल घडवू शकते.') }}
                        </p>

                        <!-- UPI QR Code Showcase -->
                        <div class="bg-white/10 rounded-2xl p-5 border border-white/15 backdrop-blur-sm space-y-3 mb-6">
                            <div class="text-xs font-bold uppercase tracking-wider text-emerald-300">
                                {{ site_t('donate_upi_title', [], 'UPI द्वारे त्वरित देणगी') }}
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-20 h-20 bg-white rounded-lg p-1.5 shrink-0 flex items-center justify-center">
                                    <img src="{{ setting('donation_qr_image', 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=upi://pay?pa=devanshfoundation@upi') }}" alt="UPI QR" class="w-full h-full object-contain">
                                </div>
                                <div class="text-xs space-y-1">
                                    <div class="text-gray-300">UPI ID:</div>
                                    <div class="font-mono text-white font-bold text-sm bg-black/30 px-2 py-0.5 rounded">
                                        {{ setting('donation_upi_id', 'devanshfoundation@upi') }}
                                    </div>
                                    <div class="text-[11px] text-gray-300">GPay, PhonePe, Paytm, BHIM</div>
                                </div>
                            </div>
                        </div>

                        <!-- 80G Tax Exemption Note -->
                        <div class="flex items-start space-x-2.5 text-xs text-gray-300 bg-white/5 p-3 rounded-xl border border-white/10">
                            <i data-lucide="shield-check" class="w-5 h-5 text-[#2E9E58] shrink-0"></i>
                            <span>{{ site_t('donate_tax_benefit', [], 'सर्व देणग्यांना आयकर कायद्याच्या कलम 80G अंतर्गत कर सवलत लागू आहे.') }}</span>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/10 text-xs text-gray-400">
                        देवांश फाउंडेशन • नाशिक, महाराष्ट्र
                    </div>
                </div>

                <!-- Right Interactive Donation Form -->
                <div class="lg:col-span-7 p-8 lg:p-12" x-data="{ 
                    donationType: 'one-time', 
                    selectedAmount: 1000, 
                    customAmount: '',
                    setAmount(val) {
                        this.selectedAmount = val;
                        this.customAmount = '';
                    }
                }">
                    <form action="{{ route('donate.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Donation Frequency Switcher -->
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">देणगी प्रकार / Type</label>
                            <div class="grid grid-cols-2 gap-3 max-w-sm">
                                <button type="button" 
                                        @click="donationType = 'one-time'" 
                                        :class="donationType === 'one-time' ? 'bg-[#073B63] text-white font-bold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" 
                                        class="py-2.5 px-4 rounded-xl text-sm transition text-center">
                                    {{ site_t('donate_onetime', [], 'एकदाच (One-Time)') }}
                                </button>
                                <button type="button" 
                                        @click="donationType = 'monthly'" 
                                        :class="donationType === 'monthly' ? 'bg-[#073B63] text-white font-bold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" 
                                        class="py-2.5 px-4 rounded-xl text-sm transition text-center">
                                    {{ site_t('donate_monthly', [], 'मासिक (Monthly)') }}
                                </button>
                            </div>
                            <input type="hidden" name="donation_type" :value="donationType">
                        </div>

                        <!-- Preset Suggested Amounts -->
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">रक्कम निवडा / Select Amount (₹)</label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                @foreach([500, 1000, 2500, 5000] as $amt)
                                    <button type="button" 
                                            @click="setAmount({{ $amt }})" 
                                            :class="selectedAmount === {{ $amt }} && customAmount === '' ? 'border-2 border-[#138A4B] bg-[#EAF7EF] text-[#138A4B] font-extrabold shadow-sm' : 'border border-gray-200 hover:border-gray-300 text-gray-700 bg-white'" 
                                            class="py-3 px-3 rounded-xl text-base transition text-center font-bold">
                                        ₹{{ number_format($amt) }}
                                    </button>
                                @endforeach
                            </div>

                            <!-- Custom Amount Input -->
                            <div class="mt-3 relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400 font-bold">₹</span>
                                <input type="number" 
                                       name="amount" 
                                       x-model="customAmount" 
                                       @input="selectedAmount = customAmount"
                                       :value="customAmount ? customAmount : selectedAmount"
                                       placeholder="{{ site_t('donate_custom_amount', [], 'इतर रक्कम प्रविष्ट करा (₹)') }}"
                                       min="100" 
                                       class="w-full pl-8 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] focus:ring focus:ring-emerald-100 text-sm font-semibold text-gray-900 transition">
                            </div>
                        </div>

                        <!-- Donor Quick Details -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1">{{ site_t('donor_full_name', [], 'पूर्ण नाव') }} *</label>
                                <input type="text" name="donor_name" required placeholder="उदा. अमोल पाटील" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1">{{ site_t('donor_phone', [], 'मोबाईल नंबर') }} *</label>
                                <input type="tel" name="donor_phone" required placeholder="+91 98765 43210" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1">{{ site_t('donor_email', [], 'ईमेल पत्ता') }} *</label>
                                <input type="email" name="donor_email" required placeholder="name@example.com" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-1">पेमेंट पद्धत / Method</label>
                                <select name="payment_method" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                                    <option value="upi_qr">UPI / QR Code Scan</option>
                                    <option value="bank_transfer">Direct Bank Transfer</option>
                                    <option value="gateway">Debit/Credit Card / Netbanking</option>
                                </select>
                            </div>
                        </div>

                        <!-- Action Submit -->
                        <div>
                            <button type="submit" class="w-full py-4 rounded-xl text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 transition transform hover:-translate-y-0.5 text-base flex items-center justify-center space-x-2">
                                <i data-lucide="heart" class="w-5 h-5 fill-white"></i>
                                <span>{{ site_t('proceed_donation', [], 'देणगीसह पुढे जा') }}</span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- ==========================================
     SECTION 7 — PHOTO GALLERY
=========================================== -->
<section class="py-20 bg-white" id="gallery">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading 
            :badge="site_t('gallery_heading', [], 'फोटो गॅलरी')"
            :title="site_t('gallery_heading', [], 'फोटो गॅलरी')"
            :subtitle="site_t('gallery_subheading', [], 'आमच्या उपक्रमांचे, समाजातील कामाचे आणि हसऱ्या चेहऱ्यांचे काही क्षणचित्रे')"
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($galleryImages as $image)
                <div class="relative group rounded-2xl overflow-hidden aspect-[4/3] bg-gray-100 shadow-sm border border-gray-100">
                    <img src="{{ $image->image_path }}" alt="{{ $image->caption }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-5 text-white">
                        <span class="text-xs font-semibold uppercase tracking-wider text-emerald-300 mb-1">{{ $image->category }}</span>
                        <p class="text-sm font-medium leading-snug">{{ $image->caption }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('gallery') }}" class="inline-flex items-center space-x-2 px-6 py-3 rounded-xl bg-white border border-gray-200 text-[#073B63] hover:text-[#138A4B] hover:border-[#138A4B] font-bold text-sm shadow-sm transition">
                <span>{{ site_t('all_photos', [], 'सर्व फोटो पहा') }}</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>


<!-- ==========================================
     SECTION 8 — NEWS & UPDATES
=========================================== -->
<section class="py-20 bg-gray-50" id="news">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-heading 
            :badge="site_t('news_heading', [], 'नवीन अपडेट्स')"
            :title="site_t('news_heading', [], 'नवीन अपडेट्स व घडामोडी')"
            :subtitle="site_t('news_subheading', [], 'फाउंडेशनच्या ताज्या बातम्या, कार्यक्रम आणि महत्त्वपूर्ण घोषणा')"
            badgeColor="blue"
        />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestNews as $article)
                <x-news-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>


<!-- ==========================================
     SECTION 9 — GET INVOLVED (DARK GREEN CTA)
=========================================== -->
<section class="py-20 bg-[#073B63] text-white relative overflow-hidden" id="get-involved">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-emerald-300 border border-white/20 mb-3">
                {{ site_t('get_involved_heading', [], 'सहभागी व्हा') }}
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ site_t('get_involved_heading', [], 'तुम्ही कसे सहभागी होऊ शकता?') }}
            </h2>
            <p class="mt-3 text-base text-gray-200">
                {{ site_t('get_involved_subheading', [], 'एकत्र येऊन आपण अधिक सामर्थ्यवान समाज निर्माण करू शकतो') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <!-- 1. Volunteer -->
            <div class="bg-white/10 hover:bg-white/15 border border-white/15 rounded-2xl p-6 flex flex-col justify-between transition group">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#138A4B] text-white flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">{{ site_t('involve_volunteer', [], 'स्वयंसेवक बना') }}</h3>
                    <p class="text-xs text-gray-300 leading-relaxed mb-6">{{ site_t('involve_volunteer_desc', [], 'तुमचा वेळ आणि कौशल्य समाजाच्या कल्याणासाठी समर्पित करा.') }}</p>
                </div>
                <a href="{{ route('volunteer') }}" class="text-xs font-bold text-[#2E9E58] group-hover:text-white flex items-center transition">
                    <span>अर्ज करा / Apply</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                </a>
            </div>

            <!-- 2. Partner -->
            <div class="bg-white/10 hover:bg-white/15 border border-white/15 rounded-2xl p-6 flex flex-col justify-between transition group">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#0B4F84] text-white flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">{{ site_t('involve_partner', [], 'भागीदारी करा') }}</h3>
                    <p class="text-xs text-gray-300 leading-relaxed mb-6">{{ site_t('involve_partner_desc', [], 'संस्था आणि एनजीओ एकत्र येऊन मोठे ध्येय साध्य करू शकतात.') }}</p>
                </div>
                <a href="{{ route('partner') }}" class="text-xs font-bold text-[#2E9E58] group-hover:text-white flex items-center transition">
                    <span>जोडा / Connect</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                </a>
            </div>

            <!-- 3. CSR -->
            <div class="bg-white/10 hover:bg-white/15 border border-white/15 rounded-2xl p-6 flex flex-col justify-between transition group">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#F58220] text-white flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <i data-lucide="briefcase" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">{{ site_t('involve_csr', [], 'CSR भागीदारी') }}</h3>
                    <p class="text-xs text-gray-300 leading-relaxed mb-6">{{ site_t('involve_csr_desc', [], 'कॉर्पोरेट कंपन्यांसाठी सामाजिक उत्तरदायित्व अंतर्गत प्रभावी प्रकल्प.') }}</p>
                </div>
                <a href="{{ route('csr') }}" class="text-xs font-bold text-[#F58220] group-hover:text-white flex items-center transition">
                    <span>प्रस्ताव पाठवा / CSR</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                </a>
            </div>

            <!-- 4. Sponsor -->
            <div class="bg-white/10 hover:bg-white/15 border border-white/15 rounded-2xl p-6 flex flex-col justify-between transition group">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#2E9E58] text-white flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <i data-lucide="gift" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">{{ site_t('involve_sponsor', [], 'प्रकल्पास प्रायोजकत्व') }}</h3>
                    <p class="text-xs text-gray-300 leading-relaxed mb-6">{{ site_t('involve_sponsor_desc', [], 'विशिष्ट मुलांचे शिक्षण किंवा आरोग्य शिबिराचे प्रायोजक व्हा.') }}</p>
                </div>
                <a href="{{ route('sponsor') }}" class="text-xs font-bold text-[#2E9E58] group-hover:text-white flex items-center transition">
                    <span>प्रायोजक व्हा / Sponsor</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                </a>
            </div>

            <!-- 5. Fundraise -->
            <div class="bg-white/10 hover:bg-white/15 border border-white/15 rounded-2xl p-6 flex flex-col justify-between transition group">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#04243D] text-white flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <i data-lucide="trending-up" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">{{ site_t('involve_fundraise', [], 'निधी संकलन मोहीम') }}</h3>
                    <p class="text-xs text-gray-300 leading-relaxed mb-6">{{ site_t('involve_fundraise_desc', [], 'तुमच्या वाढदिवसानिमित्त किंवा विशेष दिनी निधी संकलन करा.') }}</p>
                </div>
                <a href="{{ route('fundraise') }}" class="text-xs font-bold text-[#2E9E58] group-hover:text-white flex items-center transition">
                    <span>मोहीम सुरू करा / Start</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- ==========================================
     SECTION 10 — FINAL EMOTIONAL CTA
=========================================== -->
<section class="relative py-24 bg-gray-900 text-white overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?auto=format&fit=crop&w=1600&q=80" 
             alt="Devansh Foundation Community" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-[#073B63]/85 backdrop-blur-[2px]"></div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
        <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-white/15 text-white border border-white/20 text-xs sm:text-sm font-bold uppercase tracking-wider">
            <span>{{ site_t('btn_join_us', [], 'आमच्यासोबत जोडा') }}</span>
        </div>

        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
            {{ site_t('final_cta_title', [], 'बदलाची सुरुवात तुमच्यापासून होते!') }}
        </h2>

        <p class="text-lg sm:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
            {{ site_t('final_cta_subtitle', [], 'आजच देवांश फाउंडेशन परिवाराचा भाग व्हा आणि गरजू बांधवांच्या चेहऱ्यावर हसू फुलवा.') }}
        </p>

        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('donate') }}" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-9 py-4 rounded-xl text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-xl text-base transition transform hover:-translate-y-0.5">
                <i data-lucide="heart" class="w-5 h-5 fill-white"></i>
                <span>{{ site_t('btn_donate', [], 'देणगी द्या') }}</span>
            </a>

            <a href="{{ route('volunteer') }}" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-8 py-4 rounded-xl text-white font-bold bg-white/10 hover:bg-white/20 border-2 border-white/40 hover:border-white transition transform hover:-translate-y-0.5 text-base">
                <i data-lucide="heart-handshake" class="w-5 h-5 text-emerald-300"></i>
                <span>{{ site_t('btn_volunteer', [], 'स्वयंसेवक व्हा') }}</span>
            </a>
        </div>
    </div>
</section>

@endsection
