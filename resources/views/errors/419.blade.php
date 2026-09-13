@extends('layouts.app')

@section('content')
<div class="relative min-h-[80vh] bg-[#F8FAFC] text-slate-800 py-16 px-4 sm:px-6 lg:px-8 flex items-center justify-center overflow-hidden">
    
    <!-- Ambient Gradients -->
    <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-teal-500/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-70 pointer-events-none -z-10"></div>

    <div class="max-w-lg w-full text-center space-y-6 relative z-10 bg-white border border-slate-200/90 p-8 sm:p-12 rounded-3xl shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono font-bold uppercase tracking-wider bg-slate-100 text-slate-700 border border-slate-200">
            <span class="w-2 h-2 rounded-full bg-slate-500"></span>
            Error 419 &bull; Session Expired
        </div>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0B152F] tracking-tight">
            Security Token Expired
        </h1>

        <p class="text-sm text-slate-500 leading-relaxed max-w-sm mx-auto">
            Your CSRF authentication token has lapsed due to inactivity. Please refresh the browser session and re-submit your form or credentials.
        </p>

        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-3">
            <button onclick="window.location.reload();" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-bold text-white bg-[#0B152F] hover:bg-teal-600 transition shadow-md cursor-pointer">
                Refresh &amp; Retry &#x21bb;
            </button>
            <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                Return to Login
            </a>
        </div>
    </div>
</div>
@endsection

