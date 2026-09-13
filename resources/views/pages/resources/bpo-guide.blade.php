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
                <span class="text-teal-400 font-semibold">BPO Guide</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-300 border border-teal-500/30 mb-5 font-mono">
                <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                <span>STRATEGIC PLAYBOOK &bull; 2026 EDITION</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white max-w-4xl leading-[1.15]">
                The Enterprise Guide to Offshoring &amp; BPO in East Africa
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-3xl mt-4 leading-relaxed font-normal">
                Everything operational leaders, COOs, and CFOs need to evaluate talent quality, infrastructure reliability, time zone alignment, and labor compliance in Uganda.
            </p>

            <div class="mt-8 pt-6 border-t border-slate-800/80 flex flex-wrap items-center gap-4 text-xs font-mono text-slate-400">
                <span>Reading Time: 12 Minutes</span>
                <span>&bull;</span>
                <span class="text-teal-400">Authored by NileBridge Strategic Advisory Group</span>
            </div>
        </div>
    </header>

    <!-- Main Editorial Content with Sidebar TOC -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16">
            
            <!-- Sticky Sidebar TOC -->
            <aside class="lg:col-span-4 order-2 lg:order-1">
                <div class="sticky top-28 space-y-6">
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/80 p-6 shadow-xs">
                        <h3 class="text-xs font-mono font-bold uppercase tracking-wider text-[#0B152F] mb-4">
                            Guide Chapters
                        </h3>
                        <nav class="space-y-1.5 text-xs">
                            <a href="#ch-1" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">1. The Macro Shift to East Africa</a>
                            <a href="#ch-2" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">2. Uganda's English Fluency Advantage</a>
                            <a href="#ch-3" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">3. Telecommunications &amp; Fiber Infrastructure</a>
                            <a href="#ch-4" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">4. EOR vs. Direct Entity Incorporation</a>
                            <a href="#ch-5" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">5. Physical &amp; Digital Security Architecture</a>
                            <a href="#ch-6" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">6. The 14-Day Pilot Launch Blueprint</a>
                        </nav>
                    </div>

                    <div class="bg-[#0B152F] rounded-2xl p-6 text-white text-xs border border-slate-800 shadow-md">
                        <div class="text-teal-400 font-mono font-bold uppercase tracking-wider mb-2">
                            Download Complete PDF
                        </div>
                        <p class="text-slate-300 leading-relaxed mb-4">
                            Need this executive brief in slide deck or PDF format for internal leadership review?
                        </p>
                        <a href="{{ route('home') }}#contact" class="inline-flex items-center justify-center w-full py-2.5 px-4 bg-teal-500 hover:bg-teal-400 text-[#0B152F] font-bold rounded-xl text-xs transition">
                            Request PDF Copy &rarr;
                        </a>
                    </div>
                </div>
            </aside>

            <!-- Guide Text Body -->
            <article class="lg:col-span-8 order-1 lg:order-2 space-y-12 text-slate-700 leading-relaxed">
                
                <section id="ch-1" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Chapter 01</div>
                    <h2 class="text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        1. The Macro Shift to East Africa
                    </h2>
                    <p class="mb-4">
                        For over two decades, enterprise outsourcing centered almost exclusively in South Asia and Southeast Asia. However, by 2026, rising domestic inflation, wage pressure, and severe attrition rates exceeding 45% in established hubs have driven Fortune 1000 enterprises to diversify into East Africa.
                    </p>
                    <p>
                        Kampala, Uganda has emerged as the premier operational destination. With over 30,000 university graduates entering the workforce annually and a median age of under 20, the country offers unparalleled workforce vitality, loyalty, and low structural attrition (&lt; 8.5% across dedicated client pods).
                    </p>
                </section>

                <section id="ch-2" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Chapter 02</div>
                    <h2 class="text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        2. Uganda's English Fluency Advantage
                    </h2>
                    <p class="mb-4">
                        Ranked <strong>#1 for English proficiency in Africa</strong> by the World Bank and independent linguistic surveys, Uganda conducts its entire tertiary education system strictly in British English.
                    </p>
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-xs sm:text-sm mb-4">
                        <strong class="text-[#0B152F] block mb-1">Neutral Accent Profile:</strong>
                        Unlike traditional offshoring territories with pronounced localized accents, Ugandan professionals naturally communicate with soft, neutral phonetics that resonate effortlessly with US and UK consumers.
                    </div>
                </section>

                <section id="ch-3" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Chapter 03</div>
                    <h2 class="text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        3. Telecommunications &amp; Power Redundancy
                    </h2>
                    <p class="mb-4">
                        A frequent concern for first-time African outsourcing evaluators is infrastructure continuity. NileBridge eliminates this risk through enterprise-grade capital deployment:
                    </p>
                    <ul class="list-disc pl-5 space-y-2 text-xs sm:text-sm text-slate-600">
                        <li><strong>Subsea Fiber Connectivity:</strong> Direct terrestrial backbones connected to the SEACOM and EASSy subsea cables via Mombasa, Kenya.</li>
                        <li><strong>Dual Commercial Power Grids:</strong> Facilities connected to diverse sub-station rings backed by dual Caterpillar Tier-3 automatic failover diesel generators.</li>
                        <li><strong>Redundant ISP Transit:</strong> Low-latency SD-WAN routing automatically balancing between Liquid Intelligent Technologies and MTN Business fiber.</li>
                    </ul>
                </section>

                <section id="ch-4" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Chapter 04</div>
                    <h2 class="text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        4. Employer of Record (EOR) vs. Direct Entity
                    </h2>
                    <p class="mb-4">
                        Incorporating a foreign subsidiary in Africa requires 6 to 9 months, bank guarantees, and complex tax registrations. NileBridge provides a turn-key <strong>Employer of Record (EOR)</strong> wrapper:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <strong class="text-[#0B152F] block mb-1">What NileBridge Manages:</strong>
                            Statutory payroll, NSSF retirement deductions, PAYE income tax withholding, worker's compensation, healthcare coverage, and local labor law compliance.
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <strong class="text-[#0B152F] block mb-1">What You Retain:</strong>
                            100% directional management over daily priorities, shift assignments, performance reviews, and complete ownership of all work product.
                        </div>
                    </div>
                </section>

                <section id="ch-5" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Chapter 05</div>
                    <h2 class="text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        5. Physical &amp; Digital Security Architecture
                    </h2>
                    <p class="mb-4">
                        Enterprise security requires defense-in-depth protocols:
                    </p>
                    <div class="space-y-3 text-xs sm:text-sm">
                        <div class="p-4 rounded-xl border border-slate-200">
                            <strong class="text-[#0B152F]">Biometric Multi-Factor Floors:</strong> Access restricted solely to assigned team members; 24/7 CCTV surveillance with 90-day cloud backups.
                        </div>
                        <div class="p-4 rounded-xl border border-slate-200">
                            <strong class="text-[#0B152F]">Clean-Desk &amp; Mobile-Free Policy:</strong> Zero personal devices, paper notes, or recording media permitted on production floor desks.
                        </div>
                        <div class="p-4 rounded-xl border border-slate-200">
                            <strong class="text-[#0B152F]">MDM Hardened Endpoints:</strong> BitLocker/FileVault AES-256 disk encryption, disabled USB write access, and instant remote wipe capabilities.
                        </div>
                    </div>
                </section>

                <section id="ch-6" class="scroll-mt-32 pt-2">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Chapter 06</div>
                    <h2 class="text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        6. The 14-Day Pilot Launch Blueprint
                    </h2>
                    <p class="mb-4">
                        Over 70% of enterprise clients begin with a 2 to 4-seat pilot pod before scaling to 25+ seats:
                    </p>
                    <div class="p-6 rounded-2xl bg-teal-50/50 border border-teal-200 text-xs sm:text-sm text-teal-950 space-y-3">
                        <div><strong>Day 1 – 3:</strong> Requisition calibration, role scoping, and pre-screened talent shortlist delivery.</div>
                        <div><strong>Day 4 – 7:</strong> Client video interviews, cultural fit assessments, and candidate selection.</div>
                        <div><strong>Day 8 – 10:</strong> Hardware provisioning, VPN configuration, and software license onboarding.</div>
                        <div><strong>Day 11 – 14:</strong> Client SOP training, shadow ticketing, and production go-live under supervision.</div>
                    </div>
                </section>

            </article>

        </div>
    </main>

    @include('landing.footer')
</div>
@endsection

