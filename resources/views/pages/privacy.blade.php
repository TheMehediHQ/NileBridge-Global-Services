@extends('layouts.app', ['title' => 'Privacy Policy | NileBridge Global Services Ltd'])

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
                <span class="text-teal-400 font-semibold">Privacy Policy</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-300 border border-teal-500/30 mb-4 font-mono">
                <span class="w-1.5 h-1.5 rounded-full bg-teal-400 animate-pulse"></span>
                <span>DATA GOVERNANCE &amp; PRIVACY FRAMEWORK</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white max-w-4xl leading-[1.15]">
                Global Privacy Policy
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-3xl mt-4 leading-relaxed font-normal">
                How NileBridge Global Services Ltd and its affiliated entities collect, process, secure, and govern corporate client data, personnel records, and customer interaction logs across Uganda, the United Kingdom, and the United States.
            </p>

            <!-- Meta Badges -->
            <div class="mt-8 pt-6 border-t border-slate-800/80 flex flex-wrap items-center gap-4 text-xs font-mono text-slate-400">
                <div class="flex items-center gap-1.5">
                    <span class="text-slate-500">Effective Date:</span>
                    <span class="text-slate-200 font-semibold">January 1, 2026</span>
                </div>
                <span class="text-slate-700 hidden sm:inline">&bull;</span>
                <div class="flex items-center gap-1.5">
                    <span class="text-slate-500">Version:</span>
                    <span class="text-teal-400 font-semibold">v3.4 (Enterprise)</span>
                </div>
                <span class="text-slate-700 hidden sm:inline">&bull;</span>
                <div class="flex items-center gap-1.5">
                    <span class="text-slate-500">Governance:</span>
                    <span class="text-slate-200 font-semibold">GDPR &bull; UK GDPR &bull; Uganda DPA 2019 &bull; CCPA</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area with Sticky Navigation -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16">
            
            <!-- Sticky Sidebar: Table of Contents & DPO Contact -->
            <aside class="lg:col-span-4 order-2 lg:order-1">
                <div class="sticky top-28 space-y-6">
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/80 p-6 shadow-xs">
                        <h3 class="text-xs font-mono font-bold uppercase tracking-wider text-[#0B152F] mb-4 flex items-center justify-between">
                            <span>Table of Contents</span>
                            <span class="text-[10px] text-teal-600 bg-teal-50 px-2 py-0.5 rounded-full">9 Sections</span>
                        </h3>
                        <nav class="space-y-1.5 text-xs">
                            <a href="#section-1" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">1. Scope &amp; Legal Entities</a>
                            <a href="#section-2" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">2. Data Categories We Collect</a>
                            <a href="#section-3" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">3. Legal Basis &amp; Processing Purposes</a>
                            <a href="#section-4" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">4. Cross-Border Transfers &amp; Standard Clauses</a>
                            <a href="#section-5" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">5. Security Controls &amp; Clean Desk Policy</a>
                            <a href="#section-6" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">6. Data Retention &amp; Erasure</a>
                            <a href="#section-7" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">7. Sub-processors &amp; Cloud Infrastructure</a>
                            <a href="#section-8" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">8. Your Data Subject Rights</a>
                            <a href="#section-9" class="block py-1.5 px-2.5 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-white transition font-medium">9. Data Protection Officer (DPO) Contact</a>
                        </nav>
                    </div>

                    <!-- DPO Quick Help Box -->
                    <div class="bg-[#0B152F] rounded-2xl p-6 text-white text-xs border border-slate-800 shadow-md">
                        <div class="flex items-center gap-2.5 text-teal-400 font-mono font-bold uppercase tracking-wider mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            <span>DPO Inquiries</span>
                        </div>
                        <p class="text-slate-300 leading-relaxed mb-4">
                            For Data Processing Agreements (DPA), Standard Contractual Clauses (SCC), or Subject Access Requests (SAR):
                        </p>
                        <div class="space-y-2 font-mono">
                            <div class="flex items-center justify-between py-1 border-b border-slate-800">
                                <span class="text-slate-400">Email:</span>
                                <a href="mailto:privacy@nilebridge.com" class="text-teal-400 hover:underline">privacy@nilebridge.com</a>
                            </div>
                            <div class="flex items-center justify-between py-1 border-b border-slate-800">
                                <span class="text-slate-400">Escalations:</span>
                                <a href="mailto:security@nilebridge.com" class="text-teal-400 hover:underline">security@nilebridge.com</a>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="text-slate-400">SLA:</span>
                                <span class="text-slate-300">&le; 24 Business Hours</span>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Legal Editorial Content -->
            <article class="lg:col-span-8 order-1 lg:order-2 space-y-12 text-slate-700 leading-relaxed">
                
                <!-- Intro Notice -->
                <div class="p-4 sm:p-5 rounded-xl bg-teal-50/60 border border-teal-200 text-teal-900 text-xs sm:text-sm leading-relaxed flex items-start gap-3">
                    <svg class="w-5 h-5 text-teal-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <strong>Enterprise Client Overview:</strong> NileBridge operates primarily as a <strong>Data Processor</strong> when handling client customer inquiries and business workflows, and as an independent <strong>Data Controller</strong> for our direct website visitors, enterprise business contacts, and dedicated employees.
                    </div>
                </div>

                <!-- Section 1 -->
                <section id="section-1" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Section 01</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        1. Scope &amp; Legal Entities
                    </h2>
                    <p class="mb-4">
                        This Privacy Policy applies to all services, software interfaces, websites, and physical delivery operations provided by <strong>NileBridge Global Services Ltd</strong> (incorporated in the Republic of Uganda), its UK liaison entity <strong>NileBridge UK Ltd</strong>, and its US governance holding <strong>NileBridge Inc.</strong> (collectively referred to as "NileBridge", "we", "us", or "our").
                    </p>
                    <p>
                        This policy governs personal data collected through <a href="{{ route('home') }}" class="text-teal-600 font-semibold hover:underline">nilebridge.com</a>, our client communication portals, vendor agreements, and dedicated customer care pods executing business process outsourcing (BPO) from our flagship facilities in Kampala.
                    </p>
                </section>

                <!-- Section 2 -->
                <section id="section-2" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Section 02</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        2. Data Categories We Collect
                    </h2>
                    <p class="mb-4">
                        Depending on your relationship with NileBridge, we may collect and process the following categories of information:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-6 text-xs sm:text-sm">
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <h4 class="font-bold text-[#0B152F] mb-1.5">Corporate &amp; Lead Inquiries</h4>
                            <p class="text-slate-600 leading-normal">Company name, authorized representative name, corporate email address, business phone number, timezone, team scaling requisitions, and budget estimates.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <h4 class="font-bold text-[#0B152F] mb-1.5">Workforce &amp; Placement Data</h4>
                            <p class="text-slate-600 leading-normal">Candidate CVs, government identification, background verification records, English fluency assessments, technical test scores, and payroll banking credentials.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <h4 class="font-bold text-[#0B152F] mb-1.5">Technical &amp; Telemetry Data</h4>
                            <p class="text-slate-600 leading-normal">IP addresses, browser signatures, referring URLs, session timestamps, device hardware identifiers, and MDM terminal security health checks.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <h4 class="font-bold text-[#0B152F] mb-1.5">Client Work Product &amp; Interactions</h4>
                            <p class="text-slate-600 leading-normal">Omnichannel support ticket transcripts, telephone call recordings (with client consent), KYC review documents, and audit trails recorded within client-designated CRM tools.</p>
                        </div>
                    </div>
                </section>

                <!-- Section 3 -->
                <section id="section-3" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Section 03</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        3. Legal Basis &amp; Processing Purposes
                    </h2>
                    <p class="mb-4">
                        Under Article 6 of the General Data Protection Regulation (GDPR) and the Uganda Data Protection and Privacy Act 2019, our processing is lawful under the following legal bases:
                    </p>
                    <ul class="list-disc pl-5 space-y-2 text-sm text-slate-600 mb-4">
                        <li><strong>Performance of Contract:</strong> To deliver dedicated BPO talent pods, process monthly billing, manage shift rosters, and execute Master Service Agreements (MSAs).</li>
                        <li><strong>Legitimate Interests:</strong> To optimize our website performance, prevent fraud, secure network perimeters, and communicate with enterprise decision-makers.</li>
                        <li><strong>Legal Compliance:</strong> To satisfy statutory tax withholding, labor laws, anti-money laundering (AML) protocols, and local employment standards in Uganda.</li>
                        <li><strong>Consent:</strong> Explicit opt-in consent for marketing communications or specialized customer analytics.</li>
                    </ul>
                </section>

                <!-- Section 4 -->
                <section id="section-4" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Section 04</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        4. Cross-Border Transfers &amp; Standard Contractual Clauses
                    </h2>
                    <p class="mb-4">
                        As a global outsourcing partner, data originating within the European Economic Area (EEA), the United Kingdom, or the United States may be accessed by authorized operational staff at our delivery centers in Kampala, Uganda.
                    </p>
                    <div class="p-4 rounded-xl bg-slate-900 text-white text-xs sm:text-sm mb-4 border border-slate-800">
                        <strong class="text-teal-400 block mb-1">Standard Contractual Clauses (SCCs):</strong>
                        We execute the European Commission's approved Standard Contractual Clauses (Module 2: Controller-to-Processor and Module 3: Processor-to-Processor) along with the UK International Data Transfer Addendum (IDTA) with all enterprise clients before workforce deployment.
                    </div>
                    <p class="text-sm">
                        Furthermore, our Kampala facilities undergo regular third-party Transfer Impact Assessments (TIAs) to ensure Uganda's domestic legal framework maintains enforceable rights for data subjects equivalent to European standards.
                    </p>
                </section>

                <!-- Section 5 -->
                <section id="section-5" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Section 05</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        5. Security Controls &amp; Clean Desk Policy
                    </h2>
                    <p class="mb-4">
                        NileBridge enforces defense-in-depth physical and digital safeguards across all delivery stations:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
                        <div class="border border-slate-200 p-4 rounded-xl">
                            <strong class="text-[#0B152F] block mb-1">Clean-Desk &amp; Mobile-Free Floors:</strong>
                            Production floors are strictly zero-phone zones. Personal recording devices, external storage media, and paper notes are prohibited from operational desks.
                        </div>
                        <div class="border border-slate-200 p-4 rounded-xl">
                            <strong class="text-[#0B152F] block mb-1">Encrypted Workstations &amp; MDM:</strong>
                            Laptops and desktops are hardened with central Mobile Device Management (MDM), full-disk AES-256 BitLocker/FileVault, and remote wipe capabilities.
                        </div>
                        <div class="border border-slate-200 p-4 rounded-xl">
                            <strong class="text-[#0B152F] block mb-1">Biometric Perimeter Access:</strong>
                            24/7 CCTV surveillance with 90-day retention and multi-factor biometric door access restricted solely to assigned pod members.
                        </div>
                        <div class="border border-slate-200 p-4 rounded-xl">
                            <strong class="text-[#0B152F] block mb-1">Dedicated VPNs &amp; Zero Trust:</strong>
                            Split-tunneling disabled. Staff connect directly to client virtual desktop infrastructure (VDI) with zero local caching of sensitive consumer data.
                        </div>
                    </div>
                </section>

                <!-- Section 6 -->
                <section id="section-6" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Section 06</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        6. Data Retention &amp; Erasure
                    </h2>
                    <p class="mb-3">
                        We retain personal data only for as long as necessary to fulfill the operational purposes for which it was collected, or as mandated by legal, statutory, or audit requirements:
                    </p>
                    <ul class="list-disc pl-5 space-y-1.5 text-xs sm:text-sm text-slate-600">
                        <li><strong>Client Relationship &amp; Contract Data:</strong> 7 years following contract termination for fiscal and legal audit defense.</li>
                        <li><strong>Employee &amp; Contractor Personnel Files:</strong> 6 years post-employment under Uganda Ministry of Gender, Labour and Social Development guidelines.</li>
                        <li><strong>Prospect &amp; Inactive Requisition Records:</strong> 24 months from last recorded communication, after which records are irreversibly pseudonymized or deleted.</li>
                        <li><strong>Client-Managed CRM / Ticket Data:</strong> Governed entirely by client instruction; erased upon master service contract conclusion.</li>
                    </ul>
                </section>

                <!-- Section 7 -->
                <section id="section-7" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Section 07</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        7. Sub-processors &amp; Cloud Infrastructure
                    </h2>
                    <p class="mb-4">
                        NileBridge engages audited enterprise third-party sub-processors to power our global cloud services. Each vendor is bound by Data Processing Agreements guaranteeing equivalent data protection:
                    </p>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border border-slate-200 rounded-xl overflow-hidden">
                            <thead class="bg-slate-100 text-[#0B152F] font-mono uppercase">
                                <tr>
                                    <th class="p-3">Vendor / Entity</th>
                                    <th class="p-3">Service Role</th>
                                    <th class="p-3">Data Location</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-600">
                                <tr>
                                    <td class="p-3 font-semibold text-slate-800">Amazon Web Services (AWS)</td>
                                    <td class="p-3">Cloud Virtual Machines &amp; Database Hosting</td>
                                    <td class="p-3">US / EU Regions</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-semibold text-slate-800">Google Workspace</td>
                                    <td class="p-3">Corporate Email &amp; Encrypted Document Collaboration</td>
                                    <td class="p-3">Global / Ireland</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-semibold text-slate-800">Cloudflare Inc.</td>
                                    <td class="p-3">Edge CDN, DDoS Mitigation &amp; WAF Protection</td>
                                    <td class="p-3">Global Edge</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-semibold text-slate-800">Stanbic Bank / Absa Uganda</td>
                                    <td class="p-3">Local Statutory Payroll &amp; Commercial Banking</td>
                                    <td class="p-3">Kampala, Uganda</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Section 8 -->
                <section id="section-8" class="scroll-mt-32 pt-2 border-b border-slate-100 pb-10">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Section 08</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        8. Your Data Subject Rights
                    </h2>
                    <p class="mb-4">
                        Subject to applicable local and international data protection regulations (including GDPR Articles 15–22, CCPA, and Uganda DPA Part VII), you possess the following rights:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-sm">
                        <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200">
                            <strong class="text-[#0B152F]">Right of Access:</strong> Request confirmation and an itemized copy of personal data processed.
                        </div>
                        <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200">
                            <strong class="text-[#0B152F]">Right to Rectification:</strong> Demand correction of inaccurate or incomplete corporate/personal information.
                        </div>
                        <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200">
                            <strong class="text-[#0B152F]">Right to Erasure ("Right to be Forgotten"):</strong> Request data deletion when retention is no longer legally justified.
                        </div>
                        <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200">
                            <strong class="text-[#0B152F]">Right to Restriction &amp; Objection:</strong> Object to processing for direct marketing or under legitimate interests.
                        </div>
                    </div>
                </section>

                <!-- Section 9 -->
                <section id="section-9" class="scroll-mt-32 pt-2">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-1.5">Section 09</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-4">
                        9. Data Protection Officer (DPO) Contact
                    </h2>
                    <p class="mb-4">
                        If you have questions, wish to exercise statutory data subject rights, or require signed DPAs/SCCs for your enterprise vendor onboarding, please contact our designated compliance officer:
                    </p>
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 text-xs sm:text-sm space-y-2">
                        <div><strong>Office:</strong> Data Protection Officer &amp; Legal Compliance Directorate</div>
                        <div><strong>Corporate Entity:</strong> NileBridge Global Services Ltd</div>
                        <div><strong>Physical Address:</strong> Plot 14 Lumumba Avenue, Nakasero Business District, Kampala, Uganda</div>
                        <div><strong>Email Contact:</strong> <a href="mailto:privacy@nilebridge.com" class="text-teal-600 font-semibold hover:underline">privacy@nilebridge.com</a></div>
                        <div><strong>UK Liaison Office:</strong> 1 Canada Square, Canary Wharf, London, E14 5AA, United Kingdom</div>
                    </div>
                </section>

            </article>

        </div>
    </main>

    <!-- Institutional Footer -->
    @include('landing.footer')
</div>
@endsection

