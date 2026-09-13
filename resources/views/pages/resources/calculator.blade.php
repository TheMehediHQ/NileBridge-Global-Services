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
                <span class="text-teal-400 font-semibold">BPO Cost Calculator</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-300 border border-teal-500/30 mb-5 font-mono">
                <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                <span>FINANCIAL MODELING TOOL</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white max-w-4xl leading-[1.15]">
                Enterprise BPO Cost &amp; Savings Calculator
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-3xl mt-4 leading-relaxed font-normal">
                Model your realized cost reduction, per-ticket unit economics, and annual ROI by transitioning domestic operations or high-churn BPO contracts to dedicated pods in Kampala, Uganda.
            </p>
        </div>
    </header>

    <!-- The Interactive Calculator Component -->
    @include('landing.roi-calculator')

    <!-- Extended Financial Comparison: Domestic vs Traditional vs NileBridge -->
    <section class="py-16 sm:py-20 lg:py-24 bg-slate-50 border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-12">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-teal-600 mb-3 font-mono">
                    <span class="w-2 h-0.5 bg-teal-500"></span>
                    <span>ECONOMIC BENCHMARKS</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0B152F] tracking-tight">
                    Structural Cost Comparison by Geography
                </h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-2">
                    How NileBridge’s Kampala hub delivers structural cost advantages without the turnover and attrition of traditional offshoring hubs.
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm border border-slate-200 rounded-2xl overflow-hidden bg-white shadow-xs">
                    <thead class="bg-[#0B152F] text-white font-mono uppercase text-[11px]">
                        <tr>
                            <th class="p-4 sm:p-5">Metric / Dimension</th>
                            <th class="p-4 sm:p-5 text-slate-300">Domestic Onshore (US / UK)</th>
                            <th class="p-4 sm:p-5 text-slate-300">Traditional Asian BPO</th>
                            <th class="p-4 sm:p-5 text-teal-400 bg-[#132247]">NileBridge (Uganda Hub)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 text-slate-700">
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-[#0B152F]">Fully Loaded Monthly FTE</td>
                            <td class="p-4 sm:p-5 text-rose-600 font-mono font-bold">$4,500 – $6,500+</td>
                            <td class="p-4 sm:p-5 font-mono">$1,800 – $2,400</td>
                            <td class="p-4 sm:p-5 font-mono font-bold text-teal-700 bg-teal-50/40">$1,100 – $1,400</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-[#0B152F]">Annual Turnover Rate</td>
                            <td class="p-4 sm:p-5">35% – 45%</td>
                            <td class="p-4 sm:p-5 text-rose-600 font-bold">40% – 65% (High Attrition)</td>
                            <td class="p-4 sm:p-5 font-bold text-teal-700 bg-teal-50/40">&lt; 8.5% (Exceptional Loyalty)</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-[#0B152F]">English Fluency Profile</td>
                            <td class="p-4 sm:p-5">Native Domestic</td>
                            <td class="p-4 sm:p-5">Variable / Heavy Accent</td>
                            <td class="p-4 sm:p-5 font-bold text-teal-700 bg-teal-50/40">#1 English Fluency in East Africa</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-[#0B152F]">Timezone Overlap</td>
                            <td class="p-4 sm:p-5">100% Core Hours</td>
                            <td class="p-4 sm:p-5">10 – 12 hr Inverse Offset</td>
                            <td class="p-4 sm:p-5 font-bold text-teal-700 bg-teal-50/40">EAT (London +3h / NY +7h) + 24/7</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-[#0B152F]">Legal &amp; Tax Liability</td>
                            <td class="p-4 sm:p-5">High Local Compliance Risk</td>
                            <td class="p-4 sm:p-5">Vendor Managed</td>
                            <td class="p-4 sm:p-5 font-bold text-teal-700 bg-teal-50/40">100% EOR Shielded Liability</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Consultation CTA -->
    <section class="py-16 bg-[#0B152F] text-white text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-4">
                Want a Tailored Financial Modeling Proposal?
            </h3>
            <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto mb-8">
                Our Senior Delivery Partners will analyze your ticket volumes, shift rosters, and domestic cost baseline to deliver an executive-ready business case.
            </p>
            <a href="{{ route('home') }}#contact" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-teal-400 to-teal-500 hover:from-teal-300 hover:to-teal-400 text-[#0B152F] font-bold px-8 py-4 rounded-xl text-sm transition-all shadow-xl active:scale-95">
                <span>Request Custom ROI Analysis &rarr;</span>
            </a>
        </div>
    </section>

    @include('landing.footer')
</div>
@endsection

