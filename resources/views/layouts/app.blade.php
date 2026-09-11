<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'NileBridge Global Services | Premier Uganda Call Center & Payment Processing Partner' }}</title>
    <meta name="description" content="NileBridge connects enterprise companies with Uganda-based 24/7 omnichannel call center, payment processing, and dedicated operational teams with up to 70% cost savings.">

    <!-- Typography Fonts: High-Legibility Geometric Sans -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@php
    $isPortal = request()->is('admin*', 'portal*', 'client*');
    $isAuth = request()->routeIs('login') || request()->is('login*');
@endphp
<body class="{{ $isPortal ? 'bg-[#F8FAFC] text-slate-800' : 'bg-white text-slate-800' }} font-sans antialiased selection:bg-teal-500 selection:text-white min-h-screen flex flex-col justify-between">

    @if($isPortal)
        <!-- Dedicated Executive Operations Header (Crisp Off-White Glassmorphism matching Homepage) -->
        <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 py-3.5 shadow-[0_2px_14px_rgba(11,21,47,0.03)] transition-all">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    
                    <!-- Brand Lockup & Portal Badge -->
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3 group" title="Return to Public Site">
                            <div class="w-9 h-9 rounded-xl bg-teal-500 flex items-center justify-center text-white font-extrabold text-sm shadow-sm shadow-teal-500/25 group-hover:scale-105 transition shrink-0">
                                <svg class="w-4.5 h-4.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <circle cx="12" cy="12" r="9" stroke-width="2" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.6 9h16.8M3.6 15h16.8" />
                                    <ellipse cx="12" cy="12" rx="4" ry="9" stroke-width="1.75" />
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <span class="text-[10px] tracking-[0.2em] uppercase font-bold text-teal-600 leading-tight">NileBridge</span>
                                <span class="text-lg font-bold tracking-tight text-[#0B152F] group-hover:text-teal-600 transition leading-none">GlobalTalent</span>
                            </div>
                        </a>

                        <span class="text-slate-300 hidden sm:inline">|</span>

                        <div class="hidden sm:flex items-center space-x-2">
                            @auth
                                <span class="px-2.5 py-0.5 rounded-md text-[11px] font-mono font-semibold uppercase tracking-wider {{ match(auth()->user()->role) { 'admin' => 'bg-purple-50 text-purple-700 border border-purple-200', 'employee' => 'bg-amber-50 text-amber-700 border border-amber-200', default => 'bg-teal-50 text-teal-700 border border-teal-200' } }}">
                                    {{ match(auth()->user()->role) { 'admin' => 'Admin Console', 'employee' => 'Staff Workspace', default => 'Client Portal' } }}
                                </span>
                            @endauth
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-[10px] font-mono font-semibold text-emerald-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>Pipeline Live</span>
                            </span>
                        </div>
                    </div>

                    <!-- Center Navigation (Executive Shortcuts) -->
                    <nav class="hidden md:flex items-center space-x-1.5 text-xs font-semibold">
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" 
                                   class="px-3.5 py-1.5 rounded-full transition {{ request()->routeIs('admin.*') ? 'bg-[#0B152F] text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                                    Pipeline Oversight
                                </a>
                                <a href="{{ route('portal.dashboard') }}" 
                                   class="px-3.5 py-1.5 rounded-full transition {{ request()->routeIs('portal.*') ? 'bg-[#0B152F] text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                                    Staff View
                                </a>
                            @elseif(auth()->user()->isEmployee())
                                <a href="{{ route('portal.dashboard') }}" 
                                   class="px-3.5 py-1.5 rounded-full transition {{ request()->routeIs('portal.*') ? 'bg-[#0B152F] text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                                    My Requisitions
                                </a>
                            @else
                                <a href="{{ route('client.dashboard') }}" 
                                   class="px-3.5 py-1.5 rounded-full transition {{ request()->routeIs('client.*') ? 'bg-[#0B152F] text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                                    My Pods &amp; SOWs
                                </a>
                            @endif
                        @endauth
                        <a href="{{ route('home') }}" target="_blank" class="px-3 py-1.5 rounded-full text-slate-500 hover:text-teal-600 hover:bg-slate-100 flex items-center gap-1 transition font-medium" title="Open Public Website">
                            <span>Live Site</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </nav>

                    <!-- Right Controls & User Profile -->
                    <div class="flex items-center space-x-3">
                        @auth
                            <div class="flex items-center space-x-2.5 bg-slate-50 border border-slate-200/80 px-3 py-1.5 rounded-full">
                                <div class="w-7 h-7 rounded-full bg-teal-500 text-white font-mono text-xs font-bold flex items-center justify-center shadow-xs">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                                </div>
                                <div class="hidden sm:block text-left pr-1">
                                    <div class="text-xs font-bold text-[#0B152F] leading-none">{{ auth()->user()->name }}</div>
                                    <div class="text-[10px] text-slate-500 font-mono mt-0.5 leading-none">{{ ucfirst(auth()->user()->role) }}</div>
                                </div>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="p-2 rounded-full text-slate-400 hover:text-rose-600 hover:bg-rose-50 border border-transparent hover:border-rose-200 transition" title="Sign Out">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </header>
    @elseif(!$isAuth)
        <!-- Main Navigation Header (Premium White / Glassmorphism) -->
        <header x-data="{ mobileOpen: false, scrolled: false }" 
                @scroll.window="scrolled = (window.pageYOffset > 15)"
                :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-[0_4px_24px_rgba(11,21,47,0.05)] border-b border-slate-200/80 py-3.5' : 'bg-white/85 backdrop-blur-sm border-b border-slate-100 py-4 sm:py-5'"
                class="sticky top-0 z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    
                    <!-- Brand Lockup -->
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                            <div class="w-10 h-10 rounded-xl bg-teal-500 flex items-center justify-center text-white font-extrabold text-sm shadow-md shadow-teal-500/25 group-hover:scale-105 transition shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <circle cx="12" cy="12" r="9" stroke-width="2" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.6 9h16.8M3.6 15h16.8" />
                                    <ellipse cx="12" cy="12" rx="4" ry="9" stroke-width="1.75" />
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <span class="text-[10px] sm:text-[11px] tracking-[0.2em] uppercase font-bold text-teal-600 leading-tight">NileBridge</span>
                                <span class="text-xl sm:text-2xl font-extrabold tracking-tight text-[#0B152F] group-hover:text-teal-600 transition leading-none">GlobalTalent</span>
                            </div>
                        </a>
                    </div>

                    <!-- Desktop Navigation Links -->
                    <nav class="hidden lg:flex items-center space-x-7 text-sm font-medium text-slate-600">
                        <a href="{{ route('home') }}" class="hover:text-teal-600 transition">Home</a>
                        <a href="{{ route('home') }}#services" class="hover:text-teal-600 transition">Services</a>
                        <a href="{{ route('home') }}#process" class="hover:text-teal-600 transition">How It Works</a>
                        <a href="{{ route('home') }}#uganda-hub" class="hover:text-teal-600 transition">Why Uganda</a>
                        <a href="{{ route('home') }}#testimonials" class="hover:text-teal-600 transition">Case Studies</a>
                        <a href="{{ route('home') }}#pricing" class="hover:text-teal-600 transition">Pricing</a>
                        <a href="{{ route('home') }}#contact" class="hover:text-teal-600 transition">Contact</a>
                    </nav>

                    <!-- Auth / Portal CTAs -->
                    <div class="hidden md:flex items-center space-x-5">
                        @auth
                            <a href="{{ match(auth()->user()->role) { 'admin' => route('admin.dashboard'), 'employee' => route('portal.dashboard'), default => route('client.dashboard') } }}" 
                               class="inline-flex items-center px-4 py-2 text-xs font-semibold rounded-full border border-slate-200 bg-slate-50 hover:bg-slate-100 text-slate-800 transition">
                                <span class="w-2 h-2 rounded-full mr-2 {{ match(auth()->user()->role) { 'admin' => 'bg-purple-500', 'employee' => 'bg-amber-500', default => 'bg-teal-500' } }}"></span>
                                {{ ucfirst(auth()->user()->role) }} Workspace
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-xs font-semibold text-slate-500 hover:text-rose-600 transition" title="Sign out">
                                    Sign Out
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-xs sm:text-sm font-semibold text-slate-600 hover:text-[#0B152F] transition px-3 py-2">
                                Log In
                            </a>
                            <a href="#lead-capture" 
                               class="inline-flex items-center justify-center px-5 sm:px-6 py-2.5 text-xs sm:text-sm font-semibold rounded-full text-white bg-teal-500 hover:bg-teal-600 shadow-sm shadow-teal-500/20 hover:shadow-md hover:shadow-teal-500/30 transition-all transform hover:-translate-y-0.5 active:scale-95">
                                <span>Start Hiring &rarr;</span>
                            </a>
                        @endauth
                    </div>

                    <!-- Mobile Hamburger Button -->
                    <div class="flex lg:hidden">
                        <button @click="mobileOpen = !mobileOpen" type="button" class="text-slate-700 hover:text-slate-900 focus:outline-none p-2" aria-label="Toggle Navigation">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                <path x-show="mobileOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div x-show="mobileOpen" x-cloak @click.outside="mobileOpen = false" class="lg:hidden bg-white border-b border-slate-200 px-4 pt-4 pb-6 space-y-3 shadow-xl">
                <a @click="mobileOpen = false" href="{{ route('home') }}" class="block py-2 text-sm font-semibold text-slate-700 hover:text-teal-600">Home</a>
                <a @click="mobileOpen = false" href="{{ route('home') }}#services" class="block py-2 text-sm font-semibold text-slate-700 hover:text-teal-600">Services</a>
                <a @click="mobileOpen = false" href="{{ route('home') }}#process" class="block py-2 text-sm font-semibold text-slate-700 hover:text-teal-600">How It Works</a>
                <a @click="mobileOpen = false" href="{{ route('home') }}#uganda-hub" class="block py-2 text-sm font-semibold text-slate-700 hover:text-teal-600">Why Uganda</a>
                <a @click="mobileOpen = false" href="{{ route('home') }}#testimonials" class="block py-2 text-sm font-semibold text-slate-700 hover:text-teal-600">Case Studies</a>
                <a @click="mobileOpen = false" href="{{ route('home') }}#pricing" class="block py-2 text-sm font-semibold text-slate-700 hover:text-teal-600">Pricing</a>
                <a @click="mobileOpen = false" href="{{ route('home') }}#contact" class="block py-2 text-sm font-semibold text-slate-700 hover:text-teal-600">Contact</a>

                <div class="pt-4 border-t border-slate-100 space-y-2.5">
                    @auth
                        <a href="{{ match(auth()->user()->role) { 'admin' => route('admin.dashboard'), 'employee' => route('portal.dashboard'), default => route('client.dashboard') } }}" 
                           class="block w-full text-center py-2.5 text-xs font-bold rounded-lg bg-teal-500 text-white">
                            Go to {{ ucfirst(auth()->user()->role) }} Workspace
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-center py-2 text-xs font-semibold text-slate-500 hover:text-rose-600">
                                Sign Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block w-full text-center py-2.5 text-sm font-semibold text-slate-700 border border-slate-200 rounded-lg">
                            Sign In
                        </a>
                        <a href="{{ route('home') }}#lead-capture" class="block w-full text-center py-2.5 text-sm font-bold text-white bg-teal-500 rounded-lg">
                            Start Hiring &rarr;
                        </a>
                    @endauth
                </div>
            </div>
        </header>
    @endif

    <!-- Global Toast / Alert Notifications -->
    @if(session('success') || session('status'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" 
             class="fixed bottom-6 right-6 z-50 max-w-md bg-[#0B152F] border border-teal-500/80 text-white px-4 py-3.5 rounded-2xl shadow-xl backdrop-blur-md flex items-start space-x-3">
            <svg class="w-5 h-5 text-teal-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="flex-1 text-xs font-medium leading-relaxed">
                {{ session('success') ?? session('status') }}
            </div>
            <button @click="show = false" class="text-slate-400 hover:text-white transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    @endif

    @if(session('error') || $errors->any())
        <div x-data="{ show: true }" x-show="show" class="fixed bottom-6 right-6 z-50 max-w-md bg-rose-950 border border-rose-500 text-white px-4 py-3.5 rounded-2xl shadow-xl backdrop-blur-md flex items-start space-x-3">
            <svg class="w-5 h-5 text-rose-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="flex-1 text-xs font-medium leading-relaxed">
                {{ session('error') ?? $errors->first() }}
            </div>
            <button @click="show = false" class="text-rose-300 hover:text-white transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    @endif

    <!-- Main Content Area -->
    <main class="flex-grow">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

</body>
</html>
