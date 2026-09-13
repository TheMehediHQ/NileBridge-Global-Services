@extends('layouts.app')

@section('content')
<div class="relative min-h-[80vh] bg-[#F8FAFC] text-slate-800 py-16 px-4 sm:px-6 lg:px-8 flex items-center justify-center overflow-hidden">
    
    <!-- Ambient Gradients -->
    <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-amber-500/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-70 pointer-events-none -z-10"></div>

    <div class="max-w-lg w-full text-center space-y-6 relative z-10 bg-white border border-slate-200/90 p-8 sm:p-12 rounded-3xl shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-200">
            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
            Error 403 &bull; Restricted Access
        </div>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0B152F] tracking-tight">
            Unauthorized Portal
        </h1>

        <p class="text-sm text-slate-500 leading-relaxed max-w-sm mx-auto">
            You do not possess the required persona credentials or authorization level to inspect this operations portal.
        </p>

        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-bold text-white bg-[#0B152F] hover:bg-teal-600 transition shadow-md">
                Switch Identity / Login &rarr;
            </a>
            <a href="{{ route('home') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                Return to Landing
            </a>
        </div>
    </div>
</div>
@endsection

