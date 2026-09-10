@extends('layouts.app')

@section('content')
<div class="py-16 sm:py-24 px-4 sm:px-6 lg:px-8 flex items-center justify-center min-h-[calc(100vh-160px)]"
     x-data="{
        fillCredentials(email, pass) {
            this.$refs.emailInput.value = email;
            this.$refs.passwordInput.value = pass;
        }
     }">
    <div class="max-w-md w-full space-y-8 bg-slate-900/90 border border-slate-800 p-8 sm:p-10 rounded-3xl shadow-2xl backdrop-blur-xl">
        
        <!-- Header -->
        <div class="text-center">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-400 flex items-center justify-center shadow-lg shadow-emerald-500/30 mb-4">
                <span class="text-slate-950 font-black text-2xl tracking-tighter">NB</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">Enterprise Access Portal</h2>
            <p class="mt-2 text-xs sm:text-sm text-slate-400">
                Single sign-on gateway for Administrators, Account Executives & Enterprise Clients.
            </p>
        </div>

        <!-- Quick Demo Switchers -->
        <div class="bg-slate-950/60 border border-slate-800/80 rounded-2xl p-4">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-2 text-center">Quick Demo Credentials (1-Click Fill)</span>
            <div class="grid grid-cols-1 gap-2">
                <button type="button" 
                        @click="fillCredentials('admin@nilebridge.com', 'password')"
                        class="text-left text-xs font-medium px-3 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 flex items-center justify-between transition group">
                    <span><strong class="text-purple-400">Admin:</strong> admin@nilebridge.com</span>
                    <span class="text-[10px] text-slate-500 group-hover:text-emerald-400 font-mono">Fill &rarr;</span>
                </button>
                <button type="button" 
                        @click="fillCredentials('employee1@nilebridge.com', 'password')"
                        class="text-left text-xs font-medium px-3 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 flex items-center justify-between transition group">
                    <span><strong class="text-amber-400">Employee:</strong> employee1@nilebridge.com</span>
                    <span class="text-[10px] text-slate-500 group-hover:text-emerald-400 font-mono">Fill &rarr;</span>
                </button>
                <button type="button" 
                        @click="fillCredentials('client@acme.com', 'password')"
                        class="text-left text-xs font-medium px-3 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 flex items-center justify-between transition group">
                    <span><strong class="text-emerald-400">Customer:</strong> client@acme.com</span>
                    <span class="text-[10px] text-slate-500 group-hover:text-emerald-400 font-mono">Fill &rarr;</span>
                </button>
            </div>
        </div>

        <!-- Form -->
        <form class="mt-8 space-y-6" action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1">Corporate Email Address</label>
                    <input id="email" 
                           x-ref="emailInput"
                           name="email" 
                           type="email" 
                           autocomplete="email" 
                           required 
                           value="{{ old('email', 'admin@nilebridge.com') }}"
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition" 
                           placeholder="name@company.com">
                    @error('email')
                        <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Access Key / Password</label>
                    </div>
                    <input id="password" 
                           x-ref="passwordInput"
                           name="password" 
                           type="password" 
                           autocomplete="current-password" 
                           required 
                           value="password"
                           class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition" 
                           placeholder="••••••••••••">
                    @error('password')
                        <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" checked class="h-4 w-4 text-emerald-500 focus:ring-emerald-400 border-slate-800 rounded bg-slate-950">
                    <label for="remember" class="ml-2 block text-xs text-slate-400">Remember session</label>
                </div>
                <div class="text-xs">
                    <a href="{{ route('home') }}" class="font-medium text-emerald-400 hover:text-emerald-300 transition">&larr; Return to Landing</a>
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-slate-950 bg-emerald-400 hover:bg-emerald-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150 transform hover:-translate-y-0.5">
                    Authorize & Authenticate
                </button>
            </div>
        </form>

        <div class="text-center text-[11px] text-slate-500">
            Protected by SOC2 Type-II & ISO 27001 Access Policies. All authentication sessions are cryptographically logged.
        </div>
    </div>
</div>
@endsection
