@extends('layouts.app')

@section('content')

<!-- ==========================================
     1. HERO SECTION (Closely matching reference)
=========================================== -->
<section class="relative bg-gradient-to-r from-[#F0F7FA] via-[#F4F9F6] to-[#E9F3ED] overflow-hidden pt-8 pb-14 lg:pt-12 lg:pb-16 border-b border-gray-100">
    <!-- Subtle soft background elements -->
    <div class="absolute inset-0 opacity-40 bg-[radial-gradient(#138A4B_0.75px,transparent_0.75px)] [background-size:24px_24px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-4 items-center">
            
            <!-- Left Hero Content (lg:col-span-5) -->
            <div class="lg:col-span-5 space-y-5 text-left z-20">
                <!-- Main Marathi Headline -->
                <h1 class="text-4xl sm:text-5xl lg:text-[54px] font-black tracking-tight leading-[1.15]">
                    <span class="block text-[#073B63]">समाजाच्या</span>
                    <span class="block text-[#138A4B]">उज्ज्वल भविष्यासाठी</span>
                    <span class="inline-flex items-center text-[#F58220]">
                        एकत्र !
                        <!-- Small Green Leaf SVG Icon -->
                        <svg class="w-8 h-8 ml-2 inline-block text-[#138A4B] fill-current" viewBox="0 0 24 24">
                            <path d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22l1-2.3A4.49 4.49 0 0 0 8 20C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75C7 8 17 8 17 8z"/>
                        </svg>
                    </span>
                </h1>

                <!-- Supporting Description -->
                <div class="space-y-1 text-sm sm:text-base text-gray-700 leading-relaxed font-medium">
                    <p>शिक्षण, आरोग्य, महिला सक्षमीकरण,</p>
                    <p>बालकल्याण, पर्यावरण आणि ग्रामीण विकासासाठी</p>
                    <p>आमचे सतत प्रयत्न...</p>
                </div>

                <!-- Tagline -->
                <div class="text-xs sm:text-sm font-bold text-[#073B63] tracking-wide pt-1">
                    Together for a Better Tomorrow
                </div>

                <!-- CTA Buttons -->
                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="{{ route('donate') }}" class="inline-flex items-center justify-center space-x-2 px-6 py-3 rounded-md text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 text-sm">
                        <i data-lucide="heart" class="w-4 h-4 fill-white"></i>
                        <span>Donate Now →</span>
                    </a>

                    <a href="{{ route('volunteer') }}" class="inline-flex items-center justify-center space-x-2 px-5 py-3 rounded-md text-white font-bold bg-[#0D5C3A] hover:bg-[#09452B] shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 text-sm">
                        <i data-lucide="users" class="w-4 h-4"></i>
                        <span>Become a Volunteer →</span>
                    </a>
                </div>
            </div>

            <!-- Center & Right: Happy Child + Circular Vignettes + Handwritten Script (lg:col-span-7) -->
            <div class="lg:col-span-7 relative flex items-center justify-center lg:justify-end">
                <div class="relative w-full max-w-[620px] h-[380px] sm:h-[430px] lg:h-[460px]">
                    
                    <!-- Center: Joyful Schoolboy Hero Photo with soft natural mask/crop -->
                    <div class="absolute left-0 sm:left-4 bottom-0 top-0 w-[68%] sm:w-[65%] rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-gray-100 z-10">
                        <img src="{{ asset('images/hero/hero-child.jpg') }}" 
                             alt="Devansh Foundation Smiling Child" 
                             class="w-full h-full object-cover object-top hover:scale-105 transition duration-700">
                    </div>

                    <!-- Handwritten Script: "Small Steps Big Changes" -->
                    <div class="absolute top-2 left-[58%] sm:left-[56%] z-20 pointer-events-none transform -rotate-3 text-center">
                        <div class="handwritten-font text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.85)] text-2xl sm:text-3xl lg:text-4xl font-extrabold leading-tight tracking-wide">
                            Small<br>Steps<br>Big<br>Changes
                        </div>
                    </div>

                    <!-- Right Stack: 3 Circular Image Vignettes with White Borders -->
                    <div class="absolute right-0 top-1/2 -translate-y-1/2 flex flex-col space-y-3 sm:space-y-4 z-20">
                        <!-- Circle 1: Education / Schoolgirl -->
                        <div class="w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 rounded-full overflow-hidden border-[3.5px] border-white shadow-xl hover:scale-110 transition duration-300 bg-white">
                            <img src="{{ asset('images/hero/circle-girl.jpg') }}" alt="Education" class="w-full h-full object-cover">
                        </div>

                        <!-- Circle 2: Healthcare / Doctor -->
                        <div class="w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 rounded-full overflow-hidden border-[3.5px] border-white shadow-xl hover:scale-110 transition duration-300 bg-white transform translate-x-2 sm:translate-x-3">
                            <img src="{{ asset('images/hero/circle-doctor.jpg') }}" alt="Healthcare" class="w-full h-full object-cover">
                        </div>

                        <!-- Circle 3: Sapling / Environment -->
                        <div class="w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 rounded-full overflow-hidden border-[3.5px] border-white shadow-xl hover:scale-110 transition duration-300 bg-white">
                            <img src="{{ asset('images/hero/circle-sapling.jpg') }}" alt="Environment" class="w-full h-full object-cover">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- ==========================================
     2. OUR FOCUS AREAS (आमची कार्यक्षेत्रे)
=========================================== -->
<section class="py-10 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header with Green Decorative Line -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 gap-2">
            <div class="flex items-center space-x-2.5">
                <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                    आमची कार्यक्षेत्रे
                </h2>
                <span class="text-xs sm:text-sm font-semibold text-gray-500 ml-1">
                    Our Focus Areas
                </span>
            </div>
            <div class="text-xs sm:text-sm font-bold text-[#073B63] tracking-wide">
                एक चांगला समाज, एक सुंदर भविष्य
            </div>
        </div>

        <!-- 8 Focus Areas in a row on desktop -->
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-3 sm:gap-4">
            
            <!-- 1. शिक्षण (Education) - Pink -->
            <a href="{{ route('our-work.index') }}" class="flex flex-col items-center text-center p-3 rounded-xl bg-gray-50/70 hover:bg-[#EAF7EF] border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-full bg-[#E91E63] text-white flex items-center justify-center shadow-md group-hover:scale-110 transition mb-2">
                    <i data-lucide="book-open" class="w-6 h-6"></i>
                </div>
                <span class="text-xs sm:text-sm font-bold text-[#073B63] leading-tight group-hover:text-[#138A4B] transition">शिक्षण</span>
                <span class="text-[10px] text-gray-500 font-medium mt-0.5">Education</span>
            </a>

            <!-- 2. आरोग्य (Healthcare) - Teal -->
            <a href="{{ route('our-work.index') }}" class="flex flex-col items-center text-center p-3 rounded-xl bg-gray-50/70 hover:bg-[#EAF7EF] border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-full bg-[#00BFA5] text-white flex items-center justify-center shadow-md group-hover:scale-110 transition mb-2">
                    <i data-lucide="activity" class="w-6 h-6"></i>
                </div>
                <span class="text-xs sm:text-sm font-bold text-[#073B63] leading-tight group-hover:text-[#138A4B] transition">आरोग्य</span>
                <span class="text-[10px] text-gray-500 font-medium mt-0.5">Healthcare</span>
            </a>

            <!-- 3. महिला सक्षमीकरण (Women Empowerment) - Orange -->
            <a href="{{ route('our-work.index') }}" class="flex flex-col items-center text-center p-3 rounded-xl bg-gray-50/70 hover:bg-[#EAF7EF] border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-full bg-[#FF6D00] text-white flex items-center justify-center shadow-md group-hover:scale-110 transition mb-2">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <span class="text-xs sm:text-sm font-bold text-[#073B63] leading-tight group-hover:text-[#138A4B] transition">महिला सक्षमीकरण</span>
                <span class="text-[10px] text-gray-500 font-medium mt-0.5">Women Empowerment</span>
            </a>

            <!-- 4. बालकल्याण (Child Welfare) - Purple -->
            <a href="{{ route('our-work.index') }}" class="flex flex-col items-center text-center p-3 rounded-xl bg-gray-50/70 hover:bg-[#EAF7EF] border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-full bg-[#8E24AA] text-white flex items-center justify-center shadow-md group-hover:scale-110 transition mb-2">
                    <i data-lucide="smile" class="w-6 h-6"></i>
                </div>
                <span class="text-xs sm:text-sm font-bold text-[#073B63] leading-tight group-hover:text-[#138A4B] transition">बालकल्याण</span>
                <span class="text-[10px] text-gray-500 font-medium mt-0.5">Child Welfare</span>
            </a>

            <!-- 5. पर्यावरण (Environment) - Fresh Green -->
            <a href="{{ route('our-work.index') }}" class="flex flex-col items-center text-center p-3 rounded-xl bg-gray-50/70 hover:bg-[#EAF7EF] border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-full bg-[#43A047] text-white flex items-center justify-center shadow-md group-hover:scale-110 transition mb-2">
                    <i data-lucide="sprout" class="w-6 h-6"></i>
                </div>
                <span class="text-xs sm:text-sm font-bold text-[#073B63] leading-tight group-hover:text-[#138A4B] transition">पर्यावरण</span>
                <span class="text-[10px] text-gray-500 font-medium mt-0.5">Environment</span>
            </a>

            <!-- 6. कौशल्य विकास (Skill Development) - Sky Blue -->
            <a href="{{ route('our-work.index') }}" class="flex flex-col items-center text-center p-3 rounded-xl bg-gray-50/70 hover:bg-[#EAF7EF] border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-full bg-[#1E88E5] text-white flex items-center justify-center shadow-md group-hover:scale-110 transition mb-2">
                    <i data-lucide="settings" class="w-6 h-6"></i>
                </div>
                <span class="text-xs sm:text-sm font-bold text-[#073B63] leading-tight group-hover:text-[#138A4B] transition">कौशल्य विकास</span>
                <span class="text-[10px] text-gray-500 font-medium mt-0.5">Skill Development</span>
            </a>

            <!-- 7. ग्रामीण विकास (Rural Development) - Gold/Amber -->
            <a href="{{ route('our-work.index') }}" class="flex flex-col items-center text-center p-3 rounded-xl bg-gray-50/70 hover:bg-[#EAF7EF] border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-full bg-[#FFA000] text-white flex items-center justify-center shadow-md group-hover:scale-110 transition mb-2">
                    <i data-lucide="home" class="w-6 h-6"></i>
                </div>
                <span class="text-xs sm:text-sm font-bold text-[#073B63] leading-tight group-hover:text-[#138A4B] transition">ग्रामीण विकास</span>
                <span class="text-[10px] text-gray-500 font-medium mt-0.5">Rural Development</span>
            </a>

            <!-- 8. सामाजिक कल्याण (Social Welfare) - Rose/Red -->
            <a href="{{ route('our-work.index') }}" class="flex flex-col items-center text-center p-3 rounded-xl bg-gray-50/70 hover:bg-[#EAF7EF] border border-gray-100 hover:border-[#138A4B]/30 hover:shadow-md transition group">
                <div class="w-12 h-12 rounded-full bg-[#D81B60] text-white flex items-center justify-center shadow-md group-hover:scale-110 transition mb-2">
                    <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                </div>
                <span class="text-xs sm:text-sm font-bold text-[#073B63] leading-tight group-hover:text-[#138A4B] transition">सामाजिक कल्याण</span>
                <span class="text-[10px] text-gray-500 font-medium mt-0.5">Social Welfare</span>
            </a>

        </div>
    </div>
</section>


<!-- ==========================================
     3. OUR IMPACT (आमच्या कार्याचा परिणाम)
=========================================== -->
<section class="relative py-12 bg-cover bg-center overflow-hidden" style="background-image: url('{{ asset('images/impact/landscape-bg.jpg') }}');">
    <!-- Gradient overlay for high legibility -->
    <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/85 to-white/70"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Header -->
        <div class="flex items-center space-x-2.5 pb-8">
            <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
            <div>
                <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight leading-tight">
                    आमच्या कार्याचा परिणाम
                </h2>
                <div class="text-xs sm:text-sm font-bold text-gray-600">
                    Our Impact
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            
            <!-- 4 Stat Badges (lg:col-span-9) -->
            <div class="lg:col-span-9 grid grid-cols-2 sm:grid-cols-4 gap-4">
                
                <!-- Stat 1: 10,000+ Beneficiaries -->
                <div class="bg-white/90 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-gray-100 flex items-center space-x-3.5 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-lg bg-[#FF4081]/15 text-[#E91E63] flex items-center justify-center shrink-0">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-[#073B63] leading-none">10,000+</div>
                        <div class="text-xs font-bold text-gray-800 mt-1 leading-none">लाभार्थी</div>
                        <div class="text-[10px] text-gray-500 font-semibold mt-0.5">Beneficiaries)</div>
                    </div>
                </div>

                <!-- Stat 2: 100+ Projects Completed -->
                <div class="bg-white/90 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-gray-100 flex items-center space-x-3.5 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-lg bg-[#138A4B]/15 text-[#138A4B] flex items-center justify-center shrink-0">
                        <i data-lucide="file-check" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-[#073B63] leading-none">100+</div>
                        <div class="text-xs font-bold text-gray-800 mt-1 leading-none">पूर्ण प्रकल्प</div>
                        <div class="text-[10px] text-gray-500 font-semibold mt-0.5">Projects Completed</div>
                    </div>
                </div>

                <!-- Stat 3: 500+ Volunteers -->
                <div class="bg-white/90 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-gray-100 flex items-center space-x-3.5 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-lg bg-[#1E88E5]/15 text-[#1E88E5] flex items-center justify-center shrink-0">
                        <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-[#073B63] leading-none">500+</div>
                        <div class="text-xs font-bold text-gray-800 mt-1 leading-none">स्वयंसेवक</div>
                        <div class="text-[10px] text-gray-500 font-semibold mt-0.5">(Volunteers)</div>
                    </div>
                </div>

                <!-- Stat 4: 50+ Villages / Areas Reached -->
                <div class="bg-white/90 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-gray-100 flex items-center space-x-3.5 hover:shadow-md transition">
                    <div class="w-11 h-11 rounded-lg bg-[#F58220]/15 text-[#F58220] flex items-center justify-center shrink-0">
                        <i data-lucide="map-pin" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black text-[#073B63] leading-none">50+</div>
                        <div class="text-xs font-bold text-gray-800 mt-1 leading-none">गावं/भाग</div>
                        <div class="text-[10px] text-gray-500 font-semibold mt-0.5">(Villages/Areas Reached)</div>
                    </div>
                </div>

            </div>

            <!-- Right Silhouette & Slogan (lg:col-span-3) -->
            <div class="lg:col-span-3 flex flex-col items-center lg:items-end justify-center text-center lg:text-right">
                <div class="handwritten-font text-2xl sm:text-3xl font-extrabold text-[#073B63] drop-shadow-sm">
                    People<br>Brighter<br>Tomorrow
                </div>
                <!-- Silhouetted figures icon/artwork -->
                <div class="flex items-center space-x-1.5 mt-2 opacity-80 text-[#073B63]">
                    <i data-lucide="users" class="w-8 h-8"></i>
                    <i data-lucide="smile" class="w-6 h-6"></i>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- ==========================================
     4. FEATURED PROJECTS (मुख्य प्रकल्प)
=========================================== -->
<section class="py-10 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex items-center justify-between pb-6">
            <div class="flex items-center space-x-2.5">
                <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                    मुख्य प्रकल्प
                </h2>
                <span class="text-xs sm:text-sm font-semibold text-gray-500 ml-1">
                    Featured Projects
                </span>
            </div>
            <a href="{{ route('projects.index') }}" class="text-xs sm:text-sm font-bold text-[#1E88E5] hover:text-[#073B63] border border-[#1E88E5]/30 hover:border-[#1E88E5] px-3.5 py-1.5 rounded-full transition">
                View All Projects →
            </a>
        </div>

        <!-- 5 Project Cards in a row on desktop matching reference -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            
            <!-- Project 1: Educational Support -->
            <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                    <img src="{{ asset('images/projects/education.jpg') }}" alt="Educational Support" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-3.5 flex flex-col flex-grow">
                    <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                        शैक्षणिक मदत
                    </h3>
                    <div class="text-[11px] text-gray-500 font-medium mb-3">
                        Educational Support
                    </div>
                    <div class="mt-auto">
                        <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 2: Health Camps -->
            <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                    <img src="{{ asset('images/projects/health.jpg') }}" alt="Health Camps" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-3.5 flex flex-col flex-grow">
                    <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                        आरोग्य शिबिरे
                    </h3>
                    <div class="text-[11px] text-gray-500 font-medium mb-3">
                        Health Camps
                    </div>
                    <div class="mt-auto">
                        <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 3: Women Empowerment -->
            <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                    <img src="{{ asset('images/projects/women.jpg') }}" alt="Women Empowerment" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-3.5 flex flex-col flex-grow">
                    <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                        महिला सक्षमीकरण
                    </h3>
                    <div class="text-[11px] text-gray-500 font-medium mb-3">
                        Women Empowerment
                    </div>
                    <div class="mt-auto">
                        <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 4: Tree Plantation -->
            <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                    <img src="{{ asset('images/projects/tree.jpg') }}" alt="Tree Plantation" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-3.5 flex flex-col flex-grow">
                    <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                        वृक्षारोपण उपक्रम
                    </h3>
                    <div class="text-[11px] text-gray-500 font-medium mb-3">
                        Tree Plantation
                    </div>
                    <div class="mt-auto">
                        <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 5: Rural Development -->
            <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition group flex flex-col">
                <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                    <img src="{{ asset('images/projects/rural.jpg') }}" alt="Rural Development" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-3.5 flex flex-col flex-grow">
                    <h3 class="text-sm font-bold text-[#073B63] leading-snug group-hover:text-[#138A4B] transition">
                        ग्रामीण विकास
                    </h3>
                    <div class="text-[11px] text-gray-500 font-medium mb-3">
                        Rural Development
                    </div>
                    <div class="mt-auto">
                        <a href="{{ route('projects.index') }}" class="text-xs font-bold text-[#1E88E5] hover:underline flex items-center">
                            Learn More →
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- ==========================================
     5. SUCCESS STORIES + SUPPORT OUR CAUSE (देणगी द्या)
=========================================== -->
<section class="py-10 bg-[#F9FBFA] border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- LEFT COLUMN: Success Stories (lg:col-span-6) -->
            <div class="lg:col-span-6 space-y-4">
                <!-- Header -->
                <div class="flex items-center space-x-2.5">
                    <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                    <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                        यशोगाथा
                    </h2>
                    <span class="text-xs sm:text-sm font-semibold text-gray-500 ml-1">
                        Success Stories
                    </span>
                </div>

                <!-- Featured Story Card matching reference -->
                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm relative flex flex-col sm:flex-row items-center gap-5">
                    <!-- Left Arrow Button -->
                    <button class="hidden sm:flex absolute -left-3.5 top-1/2 -translate-y-1/2 w-7 h-7 rounded-full bg-white border border-gray-200 shadow-sm items-center justify-center text-gray-600 hover:bg-gray-50 transition" aria-label="Previous story">
                        <i data-lucide="chevron-left" class="w-4 h-4"></i>
                    </button>

                    <!-- Schoolgirl Portrait with Circular/Rounded Framing -->
                    <div class="w-36 h-36 sm:w-40 sm:h-40 rounded-full overflow-hidden border-4 border-white shadow-md bg-gray-100 shrink-0">
                        <img src="{{ asset('images/stories/arya-patil.jpg') }}" alt="Arya Patil - Devansh Foundation" class="w-full h-full object-cover">
                    </div>

                    <!-- Testimonial Content -->
                    <div class="space-y-3 text-left">
                        <div class="text-xs sm:text-sm text-gray-700 leading-relaxed italic font-medium">
                            “देवांश फाउंडेशनच्या मदतीने मला शिक्षणाची नवी दिशा मिळाली. आज मी माझ्या स्वप्नांकडे आत्मविश्वासाने वाटचाल करत आहे.”
                        </div>
                        <div class="text-xs sm:text-sm font-bold text-[#073B63]">
                            — आर्या पाटील, लाभार्थी
                        </div>
                        <div class="pt-1">
                            <a href="{{ route('stories.index') }}" class="inline-flex items-center space-x-1 px-4 py-2 rounded-md bg-[#F58220] hover:bg-[#DC6F13] text-white text-xs font-bold shadow-sm transition">
                                <span>Read Full Story →</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Arrow Button -->
                    <button class="hidden sm:flex absolute -right-3.5 top-1/2 -translate-y-1/2 w-7 h-7 rounded-full bg-white border border-gray-200 shadow-sm items-center justify-center text-gray-600 hover:bg-gray-50 transition" aria-label="Next story">
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </button>
                </div>

                <!-- Carousel Dots Indicator -->
                <div class="flex justify-center space-x-1.5 pt-1">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#073B63]"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                </div>
            </div>

            <!-- RIGHT COLUMN: Support Our Cause (lg:col-span-6) -->
            <div class="lg:col-span-6 space-y-4" x-data="{ donationType: 'one-time', amount: '1000', customAmount: '' }">
                <!-- Header -->
                <div class="flex items-center space-x-2.5">
                    <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                    <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                        देणगी द्या
                    </h2>
                    <span class="text-xs sm:text-sm font-semibold text-gray-500 ml-1">
                        Support Our Cause
                    </span>
                </div>

                <div class="text-xs sm:text-sm text-gray-600 font-medium">
                    तुमची छोटी मदत, एखाद्याच्या आयुष्यात मोठा बदल घडवू शकते.
                </div>

                <!-- Donation Card with Tabs & QR Code Area matching reference -->
                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-sm grid grid-cols-1 md:grid-cols-12 gap-5">
                    
                    <!-- Left: Amounts & Action Button (md:col-span-8) -->
                    <div class="md:col-span-8 space-y-4">
                        <!-- Frequency Tabs -->
                        <div class="flex items-center space-x-2">
                            <button @click="donationType = 'one-time'" 
                                    class="px-3.5 py-1.5 rounded-full text-xs font-bold transition"
                                    :class="donationType === 'one-time' ? 'bg-[#F58220] text-white shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">
                                एकदाच देणगी (One-Time)
                            </button>
                            <button @click="donationType = 'monthly'" 
                                    class="px-3.5 py-1.5 rounded-full text-xs font-bold transition"
                                    :class="donationType === 'monthly' ? 'bg-[#F58220] text-white shadow-sm' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">
                                नियमित देणगी (Monthly)
                            </button>
                        </div>

                        <!-- Amount Selector Pills -->
                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                            <button @click="amount = '500'; customAmount = ''" 
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === '500' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                ₹ 500
                            </button>
                            <button @click="amount = '1000'; customAmount = ''" 
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === '1000' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                ₹ 1,000
                            </button>
                            <button @click="amount = '2500'; customAmount = ''" 
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === '2500' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                ₹ 2,500
                            </button>
                            <button @click="amount = '5000'; customAmount = ''" 
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === '5000' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                ₹ 5,000
                            </button>
                            <button @click="amount = 'custom'" 
                                    class="py-1.5 px-2 rounded-lg border text-xs font-bold transition"
                                    :class="amount === 'custom' ? 'border-[#F58220] bg-orange-50 text-[#F58220]' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                                इतर रक्कम
                            </button>
                        </div>

                        <!-- Big Orange Donate Button -->
                        <a href="{{ route('donate') }}" class="w-full inline-flex items-center justify-center space-x-2 py-3 rounded-lg text-white font-bold bg-[#F58220] hover:bg-[#DC6F13] shadow-md transition text-sm">
                            <span>Donate Now →</span>
                        </a>

                        <!-- Payment Brand Icons -->
                        <div class="pt-1 flex items-center justify-start space-x-3 text-xs text-gray-400">
                            <span class="font-extrabold text-gray-700 tracking-wider">UPI</span>
                            <span class="font-bold text-[#1A1F71] italic text-sm">VISA</span>
                            <span class="font-bold text-[#EB001B]">mastercard</span>
                            <span class="font-extrabold text-[#097939]">RuPay</span>
                            <span class="font-medium text-gray-500">Net Banking</span>
                        </div>
                    </div>

                    <!-- Right: UPI QR Code & Trust Information (md:col-span-4) -->
                    <div class="md:col-span-4 flex flex-col items-center justify-center border-t md:border-t-0 md:border-l border-gray-100 pt-4 md:pt-0 md:pl-4 text-center">
                        <div class="text-[11px] font-bold text-gray-700 mb-1.5">UPI QR Code</div>
                        
                        <!-- Real QR Code SVG Graphic -->
                        <div class="w-24 h-24 p-1 bg-white border border-gray-200 rounded-lg shadow-sm">
                            <svg class="w-full h-full text-black" viewBox="0 0 29 29" fill="currentColor">
                                <path d="M0 0h9v9H0zm2 2v5h5V2zm18-2h9v9h-9zm2 2v5h5V2zM0 20h9v9H0zm2 2v5h5v-5zm12-20h2v4h-2zm0 6h2v2h-2zm4 0h2v2h-2zm-2 2h2v4h-2zm4 0h4v2h-4zm-4 4h2v2h-2zm6 0h2v2h-2zm-6 4h4v2h-4zm6 0h2v4h-2zm-12-6h2v2h-2zm0 4h2v2h-2zm4 0h2v2h-2zm0 4h2v2h-2zm-4 2h2v2h-2zm6 0h4v2h-4zm4-4h2v2h-2zm-14-6h2v2h-2zM4 4h1v1H4zm20 0h1v1h-1zM4 24h1v1H4z"/>
                            </svg>
                        </div>
                        
                        <div class="text-[10px] font-semibold text-gray-600 mt-1.5">
                            UPI ID: <span class="font-bold text-gray-800">devanshfoundation@upi</span>
                        </div>

                        <!-- Trust Badges -->
                        <div class="space-y-1 mt-2 text-[10px] text-gray-600 font-medium text-left w-full pl-2">
                            <div class="flex items-center space-x-1 text-[#138A4B]">
                                <i data-lucide="shield-check" class="w-3.5 h-3.5 shrink-0"></i>
                                <span>80G / 12A पात्र संस्था</span>
                            </div>
                            <div class="flex items-center space-x-1 text-[#138A4B]">
                                <i data-lucide="lock" class="w-3.5 h-3.5 shrink-0"></i>
                                <span>Secure Donation</span>
                            </div>
                            <div class="flex items-center space-x-1 text-[#138A4B]">
                                <i data-lucide="file-text" class="w-3.5 h-3.5 shrink-0"></i>
                                <span>Donation Receipt</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>


<!-- ==========================================
     6. PHOTO GALLERY + NEWS & UPDATES
=========================================== -->
<section class="py-10 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- LEFT COLUMN: Photo Gallery (lg:col-span-6) -->
            <div class="lg:col-span-6 space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2.5">
                        <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                        <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                            फोटो गॅलरी
                        </h2>
                        <span class="text-xs sm:text-sm font-semibold text-gray-500 ml-1">
                            Photo Gallery
                        </span>
                    </div>
                    <a href="{{ route('gallery') }}" class="text-xs font-bold text-[#1E88E5] hover:text-[#073B63] border border-[#1E88E5]/30 hover:border-[#1E88E5] px-3 py-1 rounded-full transition">
                        View Gallery →
                    </a>
                </div>

                <!-- 5 Gallery Thumbnails with Carousel Arrows matching reference -->
                <div class="relative bg-white rounded-xl p-2 border border-gray-200 shadow-sm">
                    <!-- Left Arrow -->
                    <button class="absolute -left-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center text-gray-600 hover:bg-gray-50 z-10" aria-label="Previous image">
                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                    </button>

                    <div class="grid grid-cols-5 gap-2">
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-1.jpg') }}" alt="Gallery 1" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-2.jpg') }}" alt="Gallery 2" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-3.jpg') }}" alt="Gallery 3" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-4.jpg') }}" alt="Gallery 4" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/gallery/gallery-5.jpg') }}" alt="Gallery 5" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                        </div>
                    </div>

                    <!-- Right Arrow -->
                    <button class="absolute -right-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center text-gray-600 hover:bg-gray-50 z-10" aria-label="Next image">
                        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                    </button>
                </div>

                <!-- Carousel Dots -->
                <div class="flex justify-center space-x-1.5 pt-1">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#073B63]"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                </div>
            </div>

            <!-- RIGHT COLUMN: News & Updates (नवीन अपडेट्स) (lg:col-span-6) -->
            <div class="lg:col-span-6 space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2.5">
                        <span class="w-7 h-[3.5px] bg-[#138A4B] rounded-full inline-block"></span>
                        <h2 class="text-xl sm:text-2xl font-black text-[#073B63] tracking-tight">
                            नवीन अपडेट्स
                        </h2>
                        <span class="text-xs sm:text-sm font-semibold text-gray-500 ml-1">
                            News & Updates
                        </span>
                    </div>
                    <a href="{{ route('about') }}" class="text-xs font-bold text-[#1E88E5] hover:text-[#073B63] border border-[#1E88E5]/30 hover:border-[#1E88E5] px-3 py-1 rounded-full transition">
                        View All News →
                    </a>
                </div>

                <!-- 3 News Cards matching reference -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    
                    <!-- News 1 -->
                    <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition flex flex-col">
                        <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/news/news-1.jpg') }}" alt="News 1" class="w-full h-full object-cover">
                        </div>
                        <div class="p-2.5 flex flex-col flex-grow">
                            <div class="text-[10px] font-semibold text-gray-500 mb-1">
                                15 Sep 2026
                            </div>
                            <h3 class="text-xs font-bold text-[#073B63] leading-snug hover:text-[#138A4B] transition line-clamp-2">
                                वृक्षारोपण अभियान यशस्वीरित्या संपन्न
                            </h3>
                        </div>
                    </div>

                    <!-- News 2 -->
                    <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition flex flex-col">
                        <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/news/news-2.jpg') }}" alt="News 2" class="w-full h-full object-cover">
                        </div>
                        <div class="p-2.5 flex flex-col flex-grow">
                            <div class="text-[10px] font-semibold text-gray-500 mb-1">
                                10 Sep 2026
                            </div>
                            <h3 class="text-xs font-bold text-[#073B63] leading-snug hover:text-[#138A4B] transition line-clamp-2">
                                ग्रामीण भागात मोफत आरोग्य तपासणी शिबिर
                            </h3>
                        </div>
                    </div>

                    <!-- News 3 -->
                    <div class="bg-white rounded-xl overflow-hidden border border-gray-200/80 shadow-sm hover:shadow-md transition flex flex-col">
                        <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                            <img src="{{ asset('images/news/news-3.jpg') }}" alt="News 3" class="w-full h-full object-cover">
                        </div>
                        <div class="p-2.5 flex flex-col flex-grow">
                            <div class="text-[10px] font-semibold text-gray-500 mb-1">
                                05 Sep 2026
                            </div>
                            <h3 class="text-xs font-bold text-[#073B63] leading-snug hover:text-[#138A4B] transition line-clamp-2">
                                गरजू विद्यार्थ्यांना शैक्षणिक साहित्य वितरण
                            </h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- ==========================================
     7. GET INVOLVED CTA STRIP (Deep Green & Orange Block)
=========================================== -->
<section class="bg-[#0A482D] text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
            
            <!-- Left 5 Action Options (lg:col-span-8) -->
            <div class="lg:col-span-8 py-6 grid grid-cols-2 sm:grid-cols-5 gap-4">
                
                <!-- 1. स्वयंसेवक बना / Volunteer -->
                <a href="{{ route('volunteer') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="heart-handshake" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">स्वयंसेवक बना</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">Volunteer</div>
                </a>

                <!-- 2. आमच्यासोबत भागीदारी / Partner With Us -->
                <a href="{{ route('partner') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="users" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">आमच्यासोबत भागीदारी</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">Partner With Us</div>
                </a>

                <!-- 3. CSR भागीदारी / CSR Partnership -->
                <a href="{{ route('csr') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="briefcase" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">CSR भागीदारी</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">CSR Partnership</div>
                </a>

                <!-- 4. प्रकल्पाला सहाय्य करा / Sponsor a Project -->
                <a href="{{ route('sponsor') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="gift" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">प्रकल्पाला सहाय्य करा</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">Sponsor a Project</div>
                </a>

                <!-- 5. आमच्यासोबत अभियान / Fundraise With Us -->
                <a href="{{ route('fundraise') }}" class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-white/10 transition group">
                    <div class="w-10 h-10 rounded-full bg-white/10 group-hover:bg-[#138A4B] flex items-center justify-center mb-2 transition">
                        <i data-lucide="megaphone" class="w-5 h-5 text-white"></i>
                    </div>
                    <div class="text-xs font-bold leading-tight">आमच्यासोबत अभियान</div>
                    <div class="text-[10px] text-gray-300 mt-0.5">Fundraise With Us</div>
                </a>

            </div>

            <!-- Right Orange / Silhouette Campaign Block (lg:col-span-4) -->
            <div class="lg:col-span-4 bg-[#F58220] py-6 px-6 flex flex-col sm:flex-row lg:flex-col items-center justify-between text-center gap-3">
                <div class="flex items-center space-x-2">
                    <!-- Silhouettes -->
                    <div class="flex items-center space-x-1 text-white/90">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <div class="handwritten-font text-white text-2xl sm:text-3xl font-extrabold leading-none drop-shadow">
                        Change Begins With You!
                    </div>
                </div>

                <a href="{{ route('volunteer') }}" class="inline-flex items-center justify-center px-6 py-2.5 rounded-full bg-white text-[#F58220] hover:bg-gray-100 font-extrabold text-xs shadow-md transition transform hover:scale-105">
                    Join Us Today →
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
