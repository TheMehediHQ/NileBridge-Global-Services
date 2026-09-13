@extends('layouts.app', ['title' => $title])

@section('content')
<div class="bg-white min-h-screen">
    
    <!-- Hero Header -->
    <header class="bg-[#0B152F] text-white pt-28 pb-16 lg:pb-20 border-b border-slate-800 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(#14b8a6_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6 font-mono">
                <a href="{{ route('home') }}" class="hover:text-teal-400 transition">Home</a>
                <span>/</span>
                <span class="text-slate-500">Resources</span>
                <span>/</span>
                <span class="text-teal-400 font-semibold">Insights &amp; Research</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-300 border border-teal-500/30 mb-5 font-mono">
                <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                <span>THOUGHT LEADERSHIP &amp; BENCHMARKS</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white max-w-4xl leading-[1.15]">
                Industry Insights, BPO Research &amp; Market Analysis
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-3xl mt-4 leading-relaxed font-normal">
                Analysis from our operations partners on workforce economics, cross-border compliance, talent retention, and offshore scalability trends shaping modern enterprise strategy.
            </p>
        </div>
    </header>

    <!-- Articles Grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 lg:py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Article 1 -->
            <article class="p-7 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-teal-500 hover:shadow-xl transition-all flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between text-xs text-slate-400 font-mono mb-4">
                        <span class="text-teal-600 font-bold uppercase">GLOBAL ARBITRAGE</span>
                        <span>6 min read</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0B152F] group-hover:text-teal-600 transition tracking-tight mb-3">
                        The 2026 Global Workforce Shift: Why East Africa is Overtaking Traditional Asian BPO
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-6">
                        An economic deep dive into rising wage pressure, 50%+ attrition rates in Manila and Bangalore, and why Fortune 500 COOs are diversifying into Uganda.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-mono text-slate-500">
                    <span>Published Feb 2026</span>
                    <span class="text-teal-600 font-bold group-hover:translate-x-1 transition inline-flex items-center gap-1">Read Brief &rarr;</span>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="p-7 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-teal-500 hover:shadow-xl transition-all flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between text-xs text-slate-400 font-mono mb-4">
                        <span class="text-teal-600 font-bold uppercase">UNIT ECONOMICS</span>
                        <span>8 min read</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0B152F] group-hover:text-teal-600 transition tracking-tight mb-3">
                        The True Cost of Domestic FTEs: Unmasking Hidden Taxes, Healthcare &amp; Churn
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-6">
                        Why a $60,000 domestic salary actually costs $92,000 once benefits, payroll taxes, hardware depreciation, and attrition re-hiring costs are factored in.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-mono text-slate-500">
                    <span>Published Jan 2026</span>
                    <span class="text-teal-600 font-bold group-hover:translate-x-1 transition inline-flex items-center gap-1">Read Brief &rarr;</span>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="p-7 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-teal-500 hover:shadow-xl transition-all flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between text-xs text-slate-400 font-mono mb-4">
                        <span class="text-teal-600 font-bold uppercase">SECURITY ARCHITECTURE</span>
                        <span>5 min read</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0B152F] group-hover:text-teal-600 transition tracking-tight mb-3">
                        Zero-Trust Physical Security: Protecting Client IP in Dedicated Delivery Centers
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-6">
                        How biometric multi-factor floor access, clean-room zero-phone policies, and remote wipe MDM laptops prevent intellectual property leakage.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-mono text-slate-500">
                    <span>Published Jan 2026</span>
                    <span class="text-teal-600 font-bold group-hover:translate-x-1 transition inline-flex items-center gap-1">Read Brief &rarr;</span>
                </div>
            </article>

            <!-- Article 4 -->
            <article class="p-7 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-teal-500 hover:shadow-xl transition-all flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between text-xs text-slate-400 font-mono mb-4">
                        <span class="text-teal-600 font-bold uppercase">WORKFORCE OPS</span>
                        <span>7 min read</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0B152F] group-hover:text-teal-600 transition tracking-tight mb-3">
                        Follow-the-Sun Support: Architecting Continuous 24/7 Coverage Without Burnout
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-6">
                        Shift handover protocols, asynchronous documentation standards, and queue routing blueprints to achieve sub-minute response times around the clock.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-mono text-slate-500">
                    <span>Published Dec 2025</span>
                    <span class="text-teal-600 font-bold group-hover:translate-x-1 transition inline-flex items-center gap-1">Read Brief &rarr;</span>
                </div>
            </article>

            <!-- Article 5 -->
            <article class="p-7 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-teal-500 hover:shadow-xl transition-all flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between text-xs text-slate-400 font-mono mb-4">
                        <span class="text-teal-600 font-bold uppercase">COMPLIANCE FRAMEWORK</span>
                        <span>9 min read</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0B152F] group-hover:text-teal-600 transition tracking-tight mb-3">
                        HIPAA &amp; PCI-DSS in East Africa: Auditing Vendor Controls for Cross-Border Data
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-6">
                        A practical compliance guide for US and UK General Counsels executing Standard Contractual Clauses (SCCs) and Business Associate Agreements (BAAs).
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-mono text-slate-500">
                    <span>Published Dec 2025</span>
                    <span class="text-teal-600 font-bold group-hover:translate-x-1 transition inline-flex items-center gap-1">Read Brief &rarr;</span>
                </div>
            </article>

            <!-- Article 6 -->
            <article class="p-7 rounded-2xl bg-white border border-slate-200 shadow-xs hover:border-teal-500 hover:shadow-xl transition-all flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between text-xs text-slate-400 font-mono mb-4">
                        <span class="text-teal-600 font-bold uppercase">EXECUTIVE PLAYBOOK</span>
                        <span>5 min read</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0B152F] group-hover:text-teal-600 transition tracking-tight mb-3">
                        The 14-Day Pilot Pod: Why Smart Enterprises Validate Before Full-Scale Migration
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-6">
                        How beginning with a 2 to 4-seat proof of concept benchmarks velocity, trains the team on custom SOPs, and removes migration risk completely.
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-mono text-slate-500">
                    <span>Published Nov 2025</span>
                    <span class="text-teal-600 font-bold group-hover:translate-x-1 transition inline-flex items-center gap-1">Read Brief &rarr;</span>
                </div>
            </article>

        </div>
    </main>

    <!-- Executive Newsletter Subscribe / Lead Requisition -->
    <section class="py-16 bg-slate-50 border-t border-slate-200/80 text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-2xl font-bold text-[#0B152F] tracking-tight mb-2">
                Receive Our Quarterly Enterprise Offshoring Index
            </h3>
            <p class="text-slate-500 text-xs sm:text-sm mb-6">
                Curated wage benchmarks, currency forecasts, and operational playbooks delivered directly to enterprise leaders.
            </p>
            <a href="{{ route('home') }}#contact" class="inline-flex items-center justify-center gap-2 bg-[#0B152F] hover:bg-[#132247] text-white font-bold px-7 py-3.5 rounded-xl text-sm transition shadow-md">
                <span>Subscribe to Executive Briefs &rarr;</span>
            </a>
        </div>
    </section>

    @include('landing.footer')
</div>
@endsection

