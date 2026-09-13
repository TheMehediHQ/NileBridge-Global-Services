@extends('layouts.app', ['title' => 'Terms of Service & Master Services Agreement | NileBridge Global Services Ltd'])

@section('content')
<div class="bg-white min-h-screen">
    <!-- Header / Hero Banner -->
    <header class="bg-[#0B152F] text-white pt-28 pb-16 lg:pb-20 border-b border-slate-800 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(#14b8a6_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6 font-mono">
                <a href="{{ route('home') }}" class="hover:text-teal-400 transition">Home</a>
                <span>/</span>
                <span class="text-slate-500">Legal &amp; Compliance</span>
                <span>/</span>
                <span class="text-teal-400 font-semibold">Terms of Service</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-300 border border-teal-500/30 mb-4 font-mono">
                <span class="w-1.5 h-1.5 rounded-full bg-teal-400 animate-pulse"></span>
                <span>MASTER SERVICES &amp; TALENT GOVERNANCE</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white max-w-4xl leading-[1.15]">
                Terms of Service &amp; Master Agreement
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-3xl mt-4 leading-relaxed font-normal">
                Standard terms governing dedicated talent placement, Employer of Record (EOR) administration, customer care delivery pods, intellectual property assignments, and service level commitments.
            </p>

            <!-- Meta Badges -->
            <div class="mt-8 pt-6 border-t border-slate-800/80 flex flex-wrap items-center gap-4 text-xs font-mono text-slate-400">
                <div class="flex items-center gap-1.5">
                    <span class="text-slate-500">Last Revised:</span>
                    <span class="text-slate-200 font-semibold">January 1, 2026</span>
                </div>
                <span class="text-slate-700 hidden sm:inline">&bull;</span>
                <div class="flex items-center gap-1.5">
                    <span class="text-slate-500">Version:</span>
                    <span class="text-teal-400 font-semibold">v4.1 (Enterprise MSA)</span>
                </div>
                <span class="text-slate-700 hidden sm:inline">&bull;</span>
                <div class="flex items-center gap-1.5">
                    <span class="text-slate-500">Jurisdiction:</span>
                    <span class="text-slate-200 font-semibold">Delaware (US) / London (UK) / Kampala (UG)</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area with Sticky Navigation -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16">
            
            <!-- Sticky Sidebar: Table of Contents & Legal Desk -->
            <aside class="lg:col-span-4 order-2 lg:order-1">
                <div class="sticky top-28 space-y-6">
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/80 p-6 shadow-xs">
                        <h3 class="text-xs font-mono font-bold uppercase tracking-wider text-[#0B152F] mb-4 flex items-center justify-between">
                            <span>Table of Contents</span>
                            <span class="text-[10px] text-teal-600 bg-teal-50 px-2 py-0.5 rounded-full">11 Sections</span>
                        </h3>
                        <nav class="space-y-1.5 text-xs">
                            <a href="#tos-1" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">1. Agreement &amp; Parties</a>
                            <a href="#tos-2" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">2. Dedicated Talent Pods &amp; EOR</a>
                            <a href="#tos-3" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">3. Service Level Agreements (SLAs)</a>
                            <a href="#tos-4" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">4. Client Responsibilities</a>
                            <a href="#tos-5" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">5. Fees, Invoicing &amp; Currencies</a>
                            <a href="#tos-6" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">6. 100% Intellectual Property Assignment</a>
                            <a href="#tos-7" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">7. Strict Confidentiality &amp; NDA</a>
                            <a href="#tos-8" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">8. Non-Solicitation Covenants</a>
                            <a href="#tos-9" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">9. Limitation of Liability &amp; Indemnity</a>
                            <a href="#tos-10" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">10. Term &amp; Termination Protocol</a>
                            <a href="#tos-11" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">11. Governing Law &amp; Arbitration</a>
                        </nav>
                    </div>

                    <!-- Custom Contract Assistance -->
                    <div class="bg-[#0B152F] rounded-2xl p-6 text-white text-xs border border-slate-800 shadow-md">
                        <div class="flex items-center gap-2.5 text-teal-400 font-mono font-bold uppercase tracking-wider mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Enterprise Contracts</span>
                        </div>
                        <p class="text-slate-300 leading-relaxed mb-4">
                            Need a custom Master Services Agreement (MSA), tailored Statement of Work (SOW), or custom payment terms?
                        </p>
                        <a href="{{ route('home') }}#contact" class="inline-flex items-center justify-center w-full py-2.5 px-4 bg-teal-500 hover:bg-teal-400 text-[#0B152F] font-bold rounded-xl text-xs transition">
                            Contact Legal Counsel &rarr;
                        </a>
                    </div>
                </div>
            </aside>

            <!-- Legal Editorial Content -->
            <article class="lg:col-span-8 order-1 lg:order-2 space-y-12 text-slate-700 leading-relaxed">
                
                <!-- Summary Alert -->
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50 border border-slate-200 text-xs sm:text-sm leading-relaxed text-slate-700">
                    <strong class="text-[#0B152F] block mb-1">Key Commercial Takeaway:</strong>
                    NileBridge provides enterprise workforce sourcing and BPO management. We serve as the sole legal Employer of Record (EOR) in East Africa—handling all statutory benefits, tax withholding, and labor compliance—while you retain full directional management and <strong>100% ownership of all work product</strong>.
                </div>

                <!-- Section 1 -->
                <section id="tos-1" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 01</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        1. Agreement &amp; Contracting Parties
                    </h2>
                    <p class="mb-4">
                        These Terms of Service ("Agreement") constitute a legally binding contract between the entity or individual purchasing services ("Client", "you", or "your") and <strong>NileBridge Global Services Ltd</strong> (along with its authorized subsidiaries NileBridge UK Ltd and NileBridge Inc., collectively "NileBridge").
                    </p>
                    <p>
                        By signing a Statement of Work (SOW), submitting an online talent requisition, or authorizing payment for talent pods, you agree to be bound by these terms.
                    </p>
                </section>

                <!-- Section 2 -->
                <section id="tos-2" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 02</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        2. Dedicated Talent Pods &amp; EOR Administration
                    </h2>
                    <p class="mb-4">
                        NileBridge sources, vets, and contractually engages professionals ("Placement Talent") stationed at our secure delivery hubs in Kampala, Uganda, or approved remote home stations:
                    </p>
                    <div class="space-y-3 my-5 text-xs sm:text-sm">
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <strong class="text-[#0B152F] block mb-1">Employer of Record Status:</strong>
                            NileBridge is the sole legal employer. We manage statutory compliance under the Uganda Employment Act 2006, including PAYE tax withholding, National Social Security Fund (NSSF 10%+5%) contributions, health insurance, and paid leave.
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <strong class="text-[#0B152F] block mb-1">14-Day Fit Guarantee:</strong>
                            If any placed talent does not meet performance expectations during the initial 14 calendar days, NileBridge will provide a replacement candidate at zero onboarding surcharge.
                        </div>
                    </div>
                </section>

                <!-- Section 3 -->
                <section id="tos-3" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 03</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        3. Service Level Agreements (SLAs) &amp; Uptime
                    </h2>
                    <p class="mb-4">
                        For dedicated call center and payment processing pods, NileBridge guarantees:
                    </p>
                    <ul class="list-disc pl-5 space-y-2 text-sm text-slate-600 mb-4">
                        <li><strong>Facility &amp; Power Redundancy:</strong> Dual Tier-3 generator failover and secondary unmetered fiber lines guaranteeing 99.8% operational uptime.</li>
                        <li><strong>Shift Adherence:</strong> Dedicated shift supervisors monitor roster check-ins with &ge; 98.5% scheduled attendance targets.</li>
                        <li><strong>Ramp-Up SLA:</strong> Pre-screened candidates deployed within 10 to 14 business days from executed job specification.</li>
                    </ul>
                </section>

                <!-- Section 4 -->
                <section id="tos-4" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 04</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        4. Client Responsibilities
                    </h2>
                    <p class="mb-3">
                        To maintain workflow velocity, the Client agrees to:
                    </p>
                    <ul class="list-disc pl-5 space-y-1.5 text-xs sm:text-sm text-slate-600">
                        <li>Provide appropriate software licenses, CRM seat accesses, and virtual desktop tokens necessary for task execution.</li>
                        <li>Conduct standard process training and workflow documentation for the dedicated pod.</li>
                        <li>Designate a primary Operational Manager for sprint coordination and quality feedback.</li>
                    </ul>
                </section>

                <!-- Section 5 -->
                <section id="tos-5" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 05</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        5. Fees, Invoicing &amp; Currencies
                    </h2>
                    <p class="mb-4">
                        Fees are defined in the active Statement of Work (SOW). Unless explicitly noted:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm my-4">
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <strong class="text-[#0B152F] block mb-1">Billing Cycle &amp; Terms:</strong>
                            Invoices are issued monthly in advance with Net-15 payment terms from the date of issuance.
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <strong class="text-[#0B152F] block mb-1">Supported Currencies:</strong>
                            Clients may remit payments via domestic ACH, Wire, or SEPA in USD ($), GBP (&pound;), or EUR (&euro;).
                        </div>
                    </div>
                </section>

                <!-- Section 6 -->
                <section id="tos-6" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 06</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        6. 100% Intellectual Property Assignment
                    </h2>
                    <div class="p-5 rounded-xl bg-teal-50 border border-teal-200 text-teal-900 text-xs sm:text-sm leading-relaxed mb-4">
                        <strong>Complete Work Product Ownership:</strong> All code, documentation, reports, call scripts, tickets, and creative deliverables created by Placement Talent under this Agreement ("Work Product") shall instantly and irrevocably become the exclusive intellectual property of the Client.
                    </div>
                    <p class="text-sm">
                        All NileBridge staff sign comprehensive Proprietary Information and Inventions Agreements (PIIA) prior to commencing any client engagement.
                    </p>
                </section>

                <!-- Section 7 -->
                <section id="tos-7" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 07</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        7. Strict Confidentiality &amp; Non-Disclosure
                    </h2>
                    <p class="mb-4">
                        Each party agrees to hold all proprietary trade secrets, customer databases, technical architectures, and financial disclosures in strict confidence. Confidentiality covenants survive termination of this Agreement for a minimum of five (5) years.
                    </p>
                </section>

                <!-- Section 8 -->
                <section id="tos-8" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 08</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        8. Non-Solicitation Covenants
                    </h2>
                    <p class="mb-4">
                        During the term of this Agreement and for twelve (12) months following termination, the Client shall not directly solicit, hire, or engage any NileBridge personnel assigned to their account outside of NileBridge's managed framework without prior written consent and payment of standard placement conversion fees.
                    </p>
                </section>

                <!-- Section 9 -->
                <section id="tos-9" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 09</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        9. Limitation of Liability &amp; Indemnity
                    </h2>
                    <p class="mb-4">
                        Except for breaches of confidentiality or gross negligence, neither party's aggregate liability under this Agreement shall exceed the total fees paid by the Client in the preceding twelve (12) months.
                    </p>
                </section>

                <!-- Section 10 -->
                <section id="tos-10" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 10</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        10. Term &amp; Termination Protocol
                    </h2>
                    <p class="mb-4">
                        Standard engagements operate on month-to-month or quarterly commitments. Either party may terminate an active Statement of Work without cause upon thirty (30) days' written notice to the other party.
                    </p>
                </section>

                <!-- Section 11 -->
                <section id="tos-11" class="scroll-mt-32 pt-2">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Clause 11</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        11. Governing Law &amp; International Arbitration
                    </h2>
                    <p class="mb-4">
                        For North American clients, this Agreement is governed by the laws of the State of Delaware. For European &amp; UK clients, this Agreement is governed by the laws of England and Wales. Disputes shall be resolved through final, binding arbitration under the LCIA or AAA rules.
                    </p>
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 text-xs sm:text-sm space-y-2">
                        <div><strong>Formal Legal Notices:</strong> <a href="mailto:legal@nilebridge.com" class="text-teal-600 font-semibold hover:underline">legal@nilebridge.com</a></div>
                        <div><strong>Global Headquarters:</strong> Plot 14 Lumumba Avenue, Nakasero Business District, Kampala, Uganda</div>
                    </div>
                </section>

            </article>

        </div>
    </main>

    <!-- Institutional Footer -->
    @include('landing.footer')
</div>
@endsection

