<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'NileBridge Global Services | Elite Global Talent & BPO Operations' }}</title>
    <meta name="description" content="NileBridge connects enterprise companies with pre-vetted global software engineering, BPO, finance, and operations teams with up to 70% cost savings.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased selection:bg-emerald-500 selection:text-slate-950 min-h-screen flex flex-col justify-between">

    <!-- Navigation Header -->
    <header x-data="{ mobileOpen: false, scrolled: false }" 
            @scroll.window="scrolled = (window.pageYOffset > 20)"
            :class="scrolled ? 'bg-slate-950/90 backdrop-blur-md border-b border-slate-800 shadow-lg' : 'bg-transparent border-b border-slate-900'"
            class="sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-600 flex items-center justify-center shadow-lg shadow-emerald-500/20 group-hover:scale-105 transition">
                            <span class="text-slate-950 font-black text-xl tracking-tighter">NB</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-lg font-extrabold tracking-tight text-white group-hover:text-emerald-400 transition">NileBridge</span>
                            <span class="text-[10px] tracking-widest uppercase font-semibold text-emerald-400 -mt-1">Global Services</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-300">
                    <a href="{{ route('home') }}#services" class="hover:text-emerald-400 transition">Core Capabilities</a>
                    <a href="{{ route('home') }}#process" class="hover:text-emerald-400 transition">Deployment Model</a>
                    <a href="{{ route('home') }}#comparison" class="hover:text-emerald-400 transition">Why NileBridge</a>
                    <a href="{{ route('home') }}#calculator" class="hover:text-emerald-400 transition flex items-center">
                        <span class="relative flex h-2 w-2 mr-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        ROI Calculator
                    </a>
                    <a href="{{ route('home') }}#lead-capture" class="hover:text-emerald-400 transition">Schedule Consultation</a>
                </nav>

                <!-- Auth / Portal CTAs -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <!-- Authenticated User Menu -->
                        <div class="flex items-center space-x-3">
                            <a href="{{ match(auth()->user()->role) { 'admin' => route('admin.dashboard'), 'employee' => route('portal.dashboard'), default => route('client.dashboard') } }}" 
                               class="inline-flex items-center px-4 py-2 text-xs font-bold rounded-lg border border-slate-700 bg-slate-900 hover:bg-slate-800 text-white transition">
                                <span class="w-2 h-2 rounded-full mr-2 {{ match(auth()->user()->role) { 'admin' => 'bg-purple-400', 'employee' => 'bg-amber-400', default => 'bg-emerald-400' } }}"></span>
                                {{ ucfirst(auth()->user()->role) }} Portal
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-xs text-slate-400 hover:text-white px-2 py-2 transition" title="Sign out">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Guest Actions -->
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-300 hover:text-white transition">
                            Client & Staff Login
                        </a>
                        <a href="{{ route('home') }}#calculator" class="inline-flex items-center justify-center px-4 py-2.5 text-xs font-bold uppercase tracking-wider text-slate-950 bg-emerald-400 hover:bg-emerald-300 rounded-lg shadow-md shadow-emerald-500/20 transition transform hover:-translate-y-0.5">
                            Estimate Savings
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex md:hidden">
                    <button @click="mobileOpen = !mobileOpen" type="button" class="text-slate-400 hover:text-white focus:outline-none p-2" aria-label="Toggle Navigation">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileOpen" x-cloak @click.outside="mobileOpen = false" class="md:hidden bg-slate-900 border-b border-slate-800 px-4 pt-3 pb-6 space-y-3">
            <a @click="mobileOpen = false" href="{{ route('home') }}#services" class="block py-2 text-base font-medium text-slate-300 hover:text-emerald-400">Core Capabilities</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#process" class="block py-2 text-base font-medium text-slate-300 hover:text-emerald-400">Deployment Model</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#comparison" class="block py-2 text-base font-medium text-slate-300 hover:text-emerald-400">Why NileBridge</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#calculator" class="block py-2 text-base font-medium text-emerald-400">ROI Calculator</a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#lead-capture" class="block py-2 text-base font-medium text-slate-300 hover:text-emerald-400">Schedule Consultation</a>

            <div class="pt-4 border-t border-slate-800 space-y-2">
                @auth
                    <a href="{{ match(auth()->user()->role) { 'admin' => route('admin.dashboard'), 'employee' => route('portal.dashboard'), default => route('client.dashboard') } }}" 
                       class="block w-full text-center py-2.5 text-xs font-bold rounded-lg bg-emerald-500 text-slate-950">
                        Go to {{ ucfirst(auth()->user()->role) }} Dashboard
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-center py-2 text-xs text-slate-400 hover:text-white">
                            Sign Out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block w-full text-center py-2.5 text-xs font-semibold text-slate-300 border border-slate-700 rounded-lg">
                        Sign In
                    </a>
                    <a href="{{ route('home') }}#calculator" class="block w-full text-center py-2.5 text-xs font-bold uppercase tracking-wider text-slate-950 bg-emerald-400 rounded-lg">
                        Estimate Savings
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Global Toast / Alert Notifications -->
    @if(session('success') || session('status'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" 
             class="fixed bottom-6 right-6 z-50 max-w-md bg-emerald-950/95 border border-emerald-500/40 text-emerald-100 px-5 py-4 rounded-xl shadow-2xl backdrop-blur-sm flex items-start space-x-3">
            <svg class="w-6 h-6 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="flex-1 text-sm font-medium">
                {{ session('success') ?? session('status') }}
            </div>
            <button @click="show = false" class="text-emerald-400 hover:text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    @endif

    @if(session('error') || $errors->any())
        <div x-data="{ show: true }" x-show="show" class="fixed bottom-6 right-6 z-50 max-w-md bg-rose-950/95 border border-rose-500/40 text-rose-100 px-5 py-4 rounded-xl shadow-2xl backdrop-blur-sm flex items-start space-x-3">
            <svg class="w-6 h-6 text-rose-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="flex-1 text-sm font-medium">
                {{ session('error') ?? $errors->first() }}
            </div>
            <button @click="show = false" class="text-rose-400 hover:text-white">
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
