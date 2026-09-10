<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'NileBridge Global Services | Premier Uganda Call Center & Payment Processing Partner' }}</title>
    <meta name="description" content="NileBridge connects enterprise companies with Uganda-based 24/7 omnichannel call center, payment processing, and dedicated operational teams with up to 70% cost savings.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-800 font-sans antialiased selection:bg-teal-500 selection:text-white min-h-screen flex flex-col justify-between">

    <!-- Top Announcement Bar (Ultra-Crisp Enterprise Status) -->
    <div class="bg-[#050A17] text-slate-300 text-[11px] py-2 px-4 border-b border-slate-800/80 font-medium">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-2.5">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-teal-500/10 text-teal-400 border border-teal-500/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-400 mr-1.5 animate-pulse"></span>
                    Live Operations
                </span>
                <span class="text-slate-400 hidden sm:inline">&bull;</span>
                <span class="truncate"><strong>NileBridge GlobalTalent</strong> &bull; Tier-1 African Delivery Center &bull; 99.8% SLA Adherence</span>
            </div>
            <div class="hidden sm:flex items-center space-x-4 text-slate-400 text-[11px]">
                @auth
                    <span class="text-teal-400 font-medium">{{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</span>
                @else
                    <a href="{{ route('login') }}" class="hover:text-white transition flex items-center space-x-1.5">
                        <svg class="w-3.5 h-3.5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        <span>Client Portal</span>
                    </a>
                    <span>&bull;</span>
                    <a href="{{ route('login') }}" class="hover:text-white transition">Staff Sign In</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Main Navigation Header (Deep Navy Glassmorphism) -->
    <header x-data="{ mobileOpen: false, scrolled: false }" 
            @scroll.window="scrolled = (window.pageYOffset > 20)"
            :class="scrolled ? 'bg-[#070D1E]/95 backdrop-blur-xl shadow-2xl border-b border-slate-800/80' : 'bg-[#0B152F] border-b border-slate-800/60'"
            class="sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-18 py-3">
                
                <!-- Brand Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2.5 group">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-teal-500 to-cyan-400 flex items-center justify-center text-[#070D1E] font-black text-sm shadow-lg shadow-teal-500/20 group-hover:scale-105 transition">
                            <svg class="w-4 h-4 text-[#070D1E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-xl font-black tracking-tight text-white group-hover:text-teal-400 transition leading-none">GlobalTalent</span>
                            <span class="text-[10px] tracking-wider uppercase font-bold text-slate-400 hidden sm:inline">by NileBridge</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-8 text-xs font-semibold text-slate-300">
                    <a href="{{ route('home') }}" class="hover:text-white transition py-1 hover:border-b-2 hover:border-teal-400">Home</a>
                    <a href="{{ route('home') }}#services" class="hover:text-white transition py-1 hover:border-b-2 hover:border-teal-400">Services</a>
                    <a href="{{ route('home') }}#about" class="hover:text-white transition py-1 hover:border-b-2 hover:border-teal-400">Why Uganda</a>
                    <a href="{{ route('home') }}#solutions" class="hover:text-white transition py-1 hover:border-b-2 hover:border-teal-400">Solutions</a>
                    <a href="{{ route('home') }}#pricing" class="hover:text-white transition py-1 hover:border-b-2 hover:border-teal-400">Pricing</a>
                    <a href="{{ route('home') }}#testimonials" class="hover:text-white transition py-1 hover:border-b-2 hover:border-teal-400">Reviews</a>
                    <a href="{{ route('home') }}#contact" class="hover:text-white transition py-1 hover:border-b-2 hover:border-teal-400">Contact</a>
                </nav>

                <!-- Auth / Portal CTAs -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <a href="{{ match(auth()->user()->role) { 'admin' => route('admin.dashboard'), 'employee' => route('portal.dashboard'), default => route('client.dashboard') } }}" 
                           class="inline-flex items-center px-4 py-2 text-xs font-bold rounded-full border border-slate-700 bg-slate-800/80 hover:bg-slate-700 text-white transition">
                            <span class="w-2 h-2 rounded-full mr-2 {{ match(auth()->user()->role) { 'admin' => 'bg-purple-400', 'employee' => 'bg-amber-400', default => 'bg-teal-400' } }}"></span>
                            {{ ucfirst(auth()->user()->role) }} Workspace
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs text-slate-400 hover:text-white px-2 py-2 transition" title="Sign out">
                                Sign Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-xs font-semibold text-slate-300 hover:text-white transition">
                            Log In
                        </a>
                        <a href="#lead-capture" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-bold rounded-full text-white bg-teal-500 hover:bg-teal-600 shadow-lg shadow-teal-500/25 transition transform hover:-translate-y-0.5 active:scale-95">
                            <span>Get Started</span>
                            <svg class="w-3.5 h-3.5 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex lg:hidden">
                    <button @click="mobileOpen = !mobileOpen" type="button" class="text-slate-300 hover:text-white focus:outline-none p-2" aria-label="Toggle Navigation">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileOpen" x-cloak @click.outside="mobileOpen = false" class="lg:hidden bg-navy-950 border-b border-navy-800 px-4 pt-3 pb-6 space-y-3">
            <a @click="mobileOpen = false" href="{{ route('home') }}#services" class="block py-2 text-sm font-medium text-slate-200 hover:text-teal-400">Services</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#uganda-hub" class="block py-2 text-sm font-medium text-slate-200 hover:text-teal-400">Why Uganda</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#technology" class="block py-2 text-sm font-medium text-slate-200 hover:text-teal-400">Platform & MDM</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#process" class="block py-2 text-sm font-medium text-slate-200 hover:text-teal-400">How It Works</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#benchmarks" class="block py-2 text-sm font-medium text-slate-200 hover:text-teal-400">Benchmarks</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#comparison" class="block py-2 text-sm font-medium text-slate-200 hover:text-teal-400">Why NileBridge</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#calculator" class="block py-2 text-sm font-medium text-amber-400">ROI Calculator</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#lead-capture" class="block py-2 text-sm font-medium text-teal-400">Schedule Consultation</a>

            <div class="pt-4 border-t border-navy-800 space-y-2">
                @auth
                    <a href="{{ match(auth()->user()->role) { 'admin' => route('admin.dashboard'), 'employee' => route('portal.dashboard'), default => route('client.dashboard') } }}" 
                       class="block w-full text-center py-2.5 text-xs font-bold rounded-lg bg-teal-500 text-white">
                        Go to {{ ucfirst(auth()->user()->role) }} Workspace
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-center py-2 text-xs text-slate-400 hover:text-white">
                            Sign Out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block w-full text-center py-2.5 text-xs font-semibold text-slate-300 border border-navy-700 rounded-lg">
                        Sign In
                    </a>
                    <a href="{{ route('home') }}#lead-capture" class="block w-full text-center py-2.5 text-xs font-bold uppercase tracking-wider text-white bg-teal-500 rounded-lg">
                        Talk to Us
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Global Toast / Alert Notifications -->
    @if(session('success') || session('status'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" 
             class="fixed bottom-6 right-6 z-50 max-w-md bg-navy-950/95 border border-teal-500 text-white px-5 py-4 rounded-2xl shadow-2xl backdrop-blur-md flex items-start space-x-3">
            <svg class="w-6 h-6 text-teal-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="flex-1 text-xs font-medium leading-relaxed">
                {{ session('success') ?? session('status') }}
            </div>
            <button @click="show = false" class="text-slate-400 hover:text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    @endif

    @if(session('error') || $errors->any())
        <div x-data="{ show: true }" x-show="show" class="fixed bottom-6 right-6 z-50 max-w-md bg-rose-950 border border-rose-500 text-white px-5 py-4 rounded-2xl shadow-2xl backdrop-blur-md flex items-start space-x-3">
            <svg class="w-6 h-6 text-rose-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="flex-1 text-xs font-medium leading-relaxed">
                {{ session('error') ?? $errors->first() }}
            </div>
            <button @click="show = false" class="text-rose-300 hover:text-white">
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

