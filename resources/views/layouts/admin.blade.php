<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Dashboard' }} - Devansh Foundation CMS</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Noto+Sans+Devanagari:wght@400;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex flex-col antialiased text-[#17324D]" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-[#073B63] text-white flex flex-col justify-between shrink-0 z-30 transition-all duration-300 overflow-y-auto"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
            
            <div>
                <!-- Brand in Sidebar -->
                <div class="h-20 flex items-center px-6 border-b border-white/10 space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#138A4B] to-[#2E9E58] flex items-center justify-center text-white font-bold shadow-md">
                        DF
                    </div>
                    <div>
                        <div class="font-bold text-sm tracking-tight text-white">Devansh Foundation</div>
                        <div class="text-[10px] text-emerald-300 font-semibold tracking-wider uppercase">Admin Control Panel</div>
                    </div>
                </div>

                <!-- Navigation List -->
                <nav class="p-4 space-y-1 text-xs font-semibold">
                    <div class="text-[10px] uppercase tracking-wider text-gray-400 px-3 py-2">General</div>
                    
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                        <span>Dashboard</span>
                    </a>

                    <div class="text-[10px] uppercase tracking-wider text-gray-400 px-3 pt-4 pb-2">Content Management</div>

                    <a href="{{ route('admin.projects.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.projects.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="folder-kanban" class="w-4 h-4"></i>
                        <span>Projects</span>
                    </a>

                    <a href="{{ route('admin.focus-areas.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.focus-areas.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="shapes" class="w-4 h-4"></i>
                        <span>Focus Areas</span>
                    </a>

                    <a href="{{ route('admin.impact-stats.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.impact-stats.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="trending-up" class="w-4 h-4"></i>
                        <span>Impact Statistics</span>
                    </a>

                    <div class="text-[10px] uppercase tracking-wider text-gray-400 px-3 pt-4 pb-2">About Us Subpages</div>

                    <a href="{{ route('admin.transparency.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.transparency.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="file-check" class="w-4 h-4"></i>
                        <span>Transparency & Docs</span>
                    </a>

                    <a href="{{ route('admin.team.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.team.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="users" class="w-4 h-4"></i>
                        <span>Our Team</span>
                    </a>

                    <a href="{{ route('admin.awards.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.awards.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="award" class="w-4 h-4"></i>
                        <span>Awards & Recognition</span>
                    </a>

                    <a href="{{ route('admin.campaigns.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.campaigns.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="sparkles" class="w-4 h-4"></i>
                        <span>Featured Campaigns</span>
                    </a>

                    <a href="{{ route('admin.donation-cases.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.donation-cases.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="hand-heart" class="w-4 h-4"></i>
                        <span>Help Us Now (Cases)</span>
                    </a>

                    <a href="{{ route('admin.stories.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.stories.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="heart" class="w-4 h-4"></i>
                        <span>Success Stories</span>
                    </a>

                    <a href="{{ route('admin.news.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.news.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="newspaper" class="w-4 h-4"></i>
                        <span>News & Updates</span>
                    </a>

                    <a href="{{ route('admin.gallery.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.gallery.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="video" class="w-4 h-4"></i>
                        <span>Gallery (Photos & Videos)</span>
                    </a>

                    <a href="{{ route('admin.reports.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.reports.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                        <span>Reports & Audits</span>
                    </a>

                    <div class="text-[10px] uppercase tracking-wider text-gray-400 px-3 pt-4 pb-2">Donations & Gateway</div>

                    <a href="{{ route('admin.donations.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.donations.index') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="circle-dollar-sign" class="w-4 h-4"></i>
                        <span>Donation Records</span>
                    </a>

                    <a href="{{ route('admin.donations.settings') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.donations.settings') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="qr-code" class="w-4 h-4"></i>
                        <span>UPI & Bank Settings</span>
                    </a>

                    <div class="text-[10px] uppercase tracking-wider text-gray-400 px-3 pt-4 pb-2">Inquiries & Leads</div>

                    <a href="{{ route('admin.volunteers.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.volunteers.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="heart-handshake" class="w-4 h-4"></i>
                        <span>Volunteers</span>
                    </a>

                    <a href="{{ route('admin.partnerships.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.partnerships.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="users" class="w-4 h-4"></i>
                        <span>Partnerships</span>
                    </a>

                    <a href="{{ route('admin.csr.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.csr.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="briefcase" class="w-4 h-4"></i>
                        <span>CSR Requests</span>
                    </a>

                    <a href="{{ route('admin.contacts.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.contacts.*') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                        <span>Contact Messages</span>
                    </a>

                    <div class="text-[10px] uppercase tracking-wider text-gray-400 px-3 pt-4 pb-2">Configuration</div>

                    <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.settings.index') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="settings" class="w-4 h-4"></i>
                        <span>Website Settings</span>
                    </a>

                    <a href="{{ route('admin.profile') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.profile') ? 'bg-[#138A4B] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <i data-lucide="user" class="w-4 h-4"></i>
                        <span>Admin Profile</span>
                    </a>
                </nav>
            </div>

            <!-- Footer User info & Logout -->
            <div class="p-4 border-t border-white/10 space-y-2">
                <div class="flex items-center justify-between text-xs px-2">
                    <span class="text-gray-300 truncate max-w-[140px]">{{ auth()->user()?->name ?? 'Admin' }}</span>
                    <span class="text-emerald-400 font-bold uppercase text-[10px]">Active</span>
                </div>
                
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-2 py-2 px-3 rounded-lg bg-white/10 hover:bg-red-600/80 text-white text-xs font-semibold transition">
                        <i data-lucide="log-out" class="w-3.5 h-3.5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>

        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Top Dashboard Bar -->
            <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-20 shrink-0">
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <h1 class="text-xl font-bold text-[#073B63]">{{ $header ?? 'Dashboard' }}</h1>
                </div>

                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center space-x-1.5 px-4 py-2 rounded-xl text-xs font-bold bg-[#EAF7EF] text-[#138A4B] hover:bg-[#138A4B] hover:text-white transition">
                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                        <span>View Public Website</span>
                    </a>
                </div>
            </header>

            <!-- Scrollable Content with Flash Alerts -->
            <main class="flex-1 overflow-y-auto p-6 lg:p-8 bg-gray-50 space-y-6">
                
                @if(session('success'))
                    <div class="bg-emerald-500 text-white px-4 py-3 rounded-xl shadow-sm flex items-center justify-between text-sm">
                        <div class="flex items-center space-x-2">
                            <i data-lucide="check-circle" class="w-5 h-5"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(isset($errors) && $errors->any())
                    <div class="bg-red-500 text-white px-4 py-3 rounded-xl shadow-sm text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <div>• {{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>
