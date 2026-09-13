@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-[#F8FAFC] text-slate-800 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center overflow-hidden">
    
    <!-- Ambient Atmospheric Gradients & Texture (Matching Homepage) -->
    <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] bg-teal-500/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-10 left-1/4 w-[450px] h-[450px] bg-blue-500/5 rounded-full blur-[130px] pointer-events-none -z-10"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-70 pointer-events-none -z-10"></div>

    <div class="max-w-lg w-full space-y-4 relative z-10">
        
        <!-- Return to Landing Navigation -->
        <div class="flex items-center justify-between px-1">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-teal-600 transition group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>&larr; Return to Landing</span>
            </a>
            <span class="text-[11px] font-mono text-slate-400">NileBridge Global Client Onboarding</span>
        </div>

        <div class="w-full space-y-6 bg-white border border-slate-200/90 p-8 sm:p-10 rounded-3xl shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
            
            <!-- Header -->
            <div class="text-center">
                <a href="{{ url('/') }}" class="inline-block hover:scale-105 transition-transform mb-3" title="Return to NileBridge Home">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-teal-500 flex items-center justify-center shadow-lg shadow-teal-500/25 text-white">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="12" r="9" stroke-width="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.6 9h16.8M3.6 15h16.8" />
                            <ellipse cx="12" cy="12" rx="4" ry="9" stroke-width="1.75" />
                        </svg>
                    </div>
                </a>
                <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold uppercase tracking-wider bg-teal-50 text-teal-700 border border-teal-200 mb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                    Enterprise Client Account
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0B152F] tracking-tight">Create Client Account</h2>
                <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed">
                    Set up your enterprise dashboard to track talent requisitions, dedicated pods, and SLA guarantees.
                </p>
            </div>

            <!-- Sign Up Form -->
            <form class="space-y-4" action="{{ route('register.post') }}" method="POST">
                @csrf

                <!-- Name & Company Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Your Full Name</label>
                        <input id="name" 
                               name="name" 
                               type="text" 
                               required 
                               value="{{ old('name') }}"
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 text-sm transition" 
                               placeholder="e.g. Sarah Jenkins">
                        @error('name')
                            <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="company_name" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Company Name</label>
                        <input id="company_name" 
                               name="company_name" 
                               type="text" 
                               required 
                               value="{{ old('company_name') }}"
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 text-sm transition" 
                               placeholder="e.g. Acme Corp">
                        @error('company_name')
                            <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Email & Phone Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Work Email Address</label>
                        <input id="email" 
                               name="email" 
                               type="email" 
                               autocomplete="email" 
                               required 
                               value="{{ old('email') }}"
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 text-sm transition" 
                               placeholder="name@company.com">
                        @error('email')
                            <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Phone / WhatsApp <span class="text-slate-400 font-normal lowercase">(optional)</span></label>
                        <input id="phone" 
                               name="phone" 
                               type="tel" 
                               value="{{ old('phone') }}"
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 text-sm transition" 
                               placeholder="+1 (555) 000-0000">
                        @error('phone')
                            <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Password & Confirmation Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Password</label>
                        <input id="password" 
                               name="password" 
                               type="password" 
                               required 
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 text-sm transition" 
                               placeholder="At least 8 characters">
                        @error('password')
                            <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Confirm Password</label>
                        <input id="password_confirmation" 
                               name="password_confirmation" 
                               type="password" 
                               required 
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 text-sm transition" 
                               placeholder="Repeat password">
                    </div>
                </div>

                <!-- Terms of Service Agreement -->
                <div class="pt-1">
                    <label class="flex items-start gap-2.5 cursor-pointer">
                        <input type="checkbox" 
                               name="terms" 
                               value="1" 
                               required
                               {{ old('terms') ? 'checked' : '' }}
                               class="mt-0.5 h-4 w-4 text-teal-600 focus:ring-teal-500 border-slate-300 rounded cursor-pointer">
                        <span class="text-xs text-slate-500 leading-normal">
                            I agree to the <a href="{{ route('terms') }}" target="_blank" class="text-teal-600 hover:text-teal-700 underline font-semibold">Terms of Service</a> and acknowledge the <a href="{{ route('privacy') }}" target="_blank" class="text-teal-600 hover:text-teal-700 underline font-semibold">Privacy Policy</a>.
                        </span>
                    </label>
                    @error('terms')
                        <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full flex justify-center items-center py-3.5 px-5 rounded-full shadow-md text-sm font-bold text-white bg-[#0B152F] hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition duration-150 transform hover:-translate-y-0.5 cursor-pointer">
                        <span>Create Account &amp; Enter Portal &rarr;</span>
                    </button>
                </div>
            </form>

            <!-- Already Have Account Link -->
            <div class="text-center pt-2 border-t border-slate-100">
                <p class="text-xs text-slate-500">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-bold text-teal-600 hover:text-teal-700 transition underline ml-1">
                        Sign in here &rarr;
                    </a>
                </p>
            </div>

            <div class="text-center text-[11px] text-slate-400 leading-relaxed">
                Enterprise security guaranteed &bull; Fully compliant Employer of Record (EOR) &amp; BPO delivery network.
            </div>
        </div>

    </div>
</div>
@endsection

