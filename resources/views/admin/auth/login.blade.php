<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Devansh Foundation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center p-4 bg-gradient-to-br from-[#073B63] to-[#04243D]">
    
    <div class="max-w-md w-full bg-white rounded-3xl p-8 sm:p-10 shadow-2xl space-y-6">
        
        <!-- Brand Header -->
        <div class="text-center space-y-2">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#073B63] to-[#138A4B] text-white flex items-center justify-center mx-auto shadow-md">
                <i data-lucide="lock" class="w-8 h-8"></i>
            </div>
            <h1 class="text-2xl font-black text-[#073B63]">Devansh Foundation</h1>
            <p class="text-xs text-gray-500 font-semibold tracking-wider uppercase">Administrative Management Portal</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 text-red-700 p-3 rounded-xl text-xs border border-red-200">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('warning'))
            <div class="bg-amber-50 text-amber-800 p-3 rounded-xl text-xs border border-amber-200">
                {{ session('warning') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-emerald-50 text-emerald-800 p-3 rounded-xl text-xs border border-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>
                    <input type="email" name="email" required value="{{ old('email', 'admin@devanshfoundation.org') }}" class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400">
                        <i data-lucide="key-round" class="w-4 h-4"></i>
                    </span>
                    <input type="password" name="password" required value="admin123" class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#138A4B] text-sm text-gray-800">
                </div>
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center space-x-2 text-gray-600 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded text-[#138A4B] focus:ring-[#138A4B]">
                    <span>Remember me</span>
                </label>
                <a href="{{ route('home') }}" class="text-[#138A4B] hover:underline font-semibold">Back to Website</a>
            </div>

            <div>
                <button type="submit" class="w-full py-3.5 rounded-xl bg-[#073B63] hover:bg-[#052a47] text-white font-bold text-sm shadow-md transition">
                    Sign In to Admin Panel
                </button>
            </div>
        </form>

        <div class="bg-gray-50 rounded-xl p-3 border border-gray-100 text-center text-xs text-gray-500">
            Default Demo Credentials:<br>
            <span class="font-mono text-gray-700">admin@devanshfoundation.org</span> / <span class="font-mono text-gray-700">admin123</span>
        </div>

    </div>

</body>
</html>
