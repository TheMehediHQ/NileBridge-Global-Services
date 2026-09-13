@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-[#F8FAFC] text-slate-800 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center overflow-hidden"
     x-data="{
        fillCredentials(email, pass) {
            this.$refs.emailInput.value = email;
            this.$refs.passwordInput.value = pass;
        }
     }">
    
    <!-- Ambient Atmospheric Gradients & Texture (Matching Homepage) -->
    <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-teal-500/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-10 right-1/4 w-[450px] h-[450px] bg-blue-500/5 rounded-full blur-[130px] pointer-events-none -z-10"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-70 pointer-events-none -z-10"></div>

    <div class="max-w-md w-full space-y-4 relative z-10">
        <!-- Return to Landing Navigation -->
        <div class="flex items-center justify-between px-1">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-teal-600 transition group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>&larr; Return to Landing</span>
            </a>
            <span class="text-[11px] font-mono text-slate-400">NileBridge Global</span>
        </div>

        <div class="w-full space-y-8 bg-white border border-slate-200/90 p-8 sm:p-10 rounded-3xl shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
            
            <!-- Header -->
            <div class="text-center">
                <a href="{{ url('/') }}" class="inline-block hover:scale-105 transition-transform mb-4" title="Return to NileBridge Home">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-teal-500 flex items-center justify-center shadow-lg shadow-teal-500/25 text-white">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="12" r="9" stroke-width="2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.6 9h16.8M3.6 15h16.8" />
                        <ellipse cx="12" cy="12" rx="4" ry="9" stroke-width="1.75" />
                    </svg>
                </div>
            </a>
            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold uppercase tracking-wider bg-teal-50 text-teal-700 border border-teal-200 mb-2">
                <span class="w-1.5 h-1.5 rounded-full bg-teal-500 animate-pulse"></span>
                Authorized Personnel
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0B152F] tracking-tight">Enterprise Access Portal</h2>
            <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed">
                Single sign-on gateway for Administrators, Account Executives &amp; Enterprise Clients.
            </p>
        </div>

        <!-- Session Status / Alert Feedback -->
        @if (session('status'))
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-start gap-2.5">
                <svg class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="leading-relaxed font-medium">{{ session('status') }}</span>
            </div>
        @endif

        @if(app()->isLocal())
        <!-- Quick Demo Switchers (Local Development Only) -->
        <div class="bg-slate-50/80 border border-slate-200/80 rounded-2xl p-4">
            <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-slate-500 block mb-2 text-center">Quick Demo Credentials (1-Click Fill &bull; Local Mode)</span>
            <div class="grid grid-cols-1 gap-2">
                <button type="button" 
                        @click="fillCredentials('admin@nilebridge.com', 'password')"
                        class="text-left text-xs font-medium px-3.5 py-2.5 rounded-xl bg-white hover:bg-slate-100/80 border border-slate-200/90 text-slate-700 flex items-center justify-between transition group shadow-sm">
                    <span class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                        <span><strong class="text-purple-700">Admin:</strong> admin@nilebridge.com</span>
                    </span>
                    <span class="text-[10px] text-slate-400 group-hover:text-teal-600 font-mono font-bold">Fill &rarr;</span>
                </button>
                <button type="button" 
                        @click="fillCredentials('employee1@nilebridge.com', 'password')"
                        class="text-left text-xs font-medium px-3.5 py-2.5 rounded-xl bg-white hover:bg-slate-100/80 border border-slate-200/90 text-slate-700 flex items-center justify-between transition group shadow-sm">
                    <span class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        <span><strong class="text-amber-700">Staff:</strong> employee1@nilebridge.com</span>
                    </span>
                    <span class="text-[10px] text-slate-400 group-hover:text-teal-600 font-mono font-bold">Fill &rarr;</span>
                </button>
                <button type="button" 
                        @click="fillCredentials('client@acme.com', 'password')"
                        class="text-left text-xs font-medium px-3.5 py-2.5 rounded-xl bg-white hover:bg-slate-100/80 border border-slate-200/90 text-slate-700 flex items-center justify-between transition group shadow-sm">
                    <span class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                        <span><strong class="text-teal-700">Client:</strong> client@acme.com</span>
                    </span>
                    <span class="text-[10px] text-slate-400 group-hover:text-teal-600 font-mono font-bold">Fill &rarr;</span>
                </button>
            </div>
        </div>
        @endif

        <!-- Form -->
        <form class="mt-8 space-y-5" action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Corporate Email Address</label>
                    <input id="email" 
                           x-ref="emailInput"
                           name="email" 
                           type="email" 
                           autocomplete="email" 
                           required 
                           value="{{ old('email', app()->isLocal() ? 'admin@nilebridge.com' : '') }}"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 text-sm transition" 
                           placeholder="name@company.com">
                    @error('email')
                        <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Access Key / Password</label>
                    <input id="password" 
                           x-ref="passwordInput"
                           name="password" 
                           type="password" 
                           autocomplete="current-password" 
                           required 
                           value="{{ app()->isLocal() ? 'password' : '' }}"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 text-sm transition" 
                           placeholder="••••••••••••">
                    @error('password')
                        <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between text-xs">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" checked class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-slate-300 rounded cursor-pointer">
                    <label for="remember" class="ml-2 text-slate-500 cursor-pointer">Remember session</label>
                </div>
                <div>
                    <a href="{{ route('password.request') }}" class="font-semibold text-teal-600 hover:text-teal-700 transition">Forgot password?</a>
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" 
                        class="w-full flex justify-center py-3.5 px-5 rounded-full shadow-md text-sm font-bold text-white bg-[#0B152F] hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition duration-150 transform hover:-translate-y-0.5 cursor-pointer">
                    Authorize &amp; Authenticate
                </button>
            </div>
        </form>

        <div class="text-center pt-3 border-t border-slate-100">
            <p class="text-xs text-slate-500">
                Don't have an enterprise account? 
                <a href="{{ route('register') }}" class="font-bold text-teal-600 hover:text-teal-700 transition underline ml-1">
                    Create Client Account &rarr;
                </a>
            </p>
        </div>

        <div class="text-center text-[11px] text-slate-400 leading-relaxed">
            Protected by SOC 2 Type-II &amp; ISO 27001 Access Policies. All authentication sessions are cryptographically logged.
        </div>
    </div>
</div>
</div>
@endsection
