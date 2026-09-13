<!-- Section 10: Frequently Asked Questions & Enterprise Lead Capture -->
<section id="contact" class="py-20 sm:py-28 lg:py-32 bg-white border-b border-slate-100 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Success Alert if session exists -->
        @if(session('success'))
            <div class="mb-10 p-5 rounded-2xl bg-teal-50 border border-teal-200 text-teal-800 text-sm flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-9 h-9 rounded-lg bg-teal-500 text-white flex items-center justify-center font-bold shrink-0">✓</div>
                    <div>
                        <div class="font-bold text-[#0B152F] text-base">Inquiry Successfully Dispatched</div>
                        <div class="text-xs text-teal-700 mt-0.5">{{ session('success') }} A Senior Delivery Partner will reach out within 24 hours.</div>
                    </div>
                </div>
                <span class="text-xs font-mono font-bold text-teal-700 bg-teal-100 px-3 py-1 rounded-full uppercase">SLA Active</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start" x-data="{ openFaq: 1 }">
            
            <!-- Left Column: FAQ Accordion (Clean, Spacious Editorial Design) -->
            <div class="lg:col-span-6">
                <div class="inline-flex items-center gap-2 text-[11px] font-mono font-bold uppercase tracking-[0.16em] text-teal-700 mb-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                    <span>FREQUENTLY ASKED QUESTIONS</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-extrabold text-[#0B152F] tracking-[-0.025em] leading-[1.12] mb-5">
                    Common Inquiries About Global Operations
                </h2>
                <p class="text-base text-slate-600 leading-relaxed font-normal mb-8">
                    Everything you need to know about talent onboarding, timezone coverage, data security, and contracts.
                </p>

                <!-- Thin Divider Accordion List -->
                <div class="divide-y divide-slate-200 border-y border-slate-200">
                    
                    <!-- FAQ 1 -->
                    <div class="py-5">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 1 ? null : 1)"
                            class="w-full text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>How fast can you source and onboard talent?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold ml-4" x-text="openFaq === 1 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 1" x-collapse class="pt-3 text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                            Our standard placement turnaround is 10 to 14 business days. Pre-screened professionals in our active talent pool in Kampala can frequently onboard within 5 to 7 days for urgent client requisitions.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="py-5">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 2 ? null : 2)"
                            class="w-full text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>How do you handle time zone alignment with US and UK teams?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold ml-4" x-text="openFaq === 2 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 2" x-collapse class="pt-3 text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                            Uganda operates on East Africa Time (EAT), which naturally shares full afternoon overlap with London and GMT, and provides up to 4 to 6 hours of core morning overlap with US Eastern time (EST). We also run full 24/7 night shift pods for Pacific and US day coverage.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="py-5">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 3 ? null : 3)"
                            class="w-full text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>Do you handle payroll, compliance, and local tax withholding?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold ml-4" x-text="openFaq === 3 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 3" x-collapse class="pt-3 text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                            Yes, completely. NileBridge functions as the legal Employer of Record (EOR) in East Africa. We handle statutory filings, healthcare, pension, local taxation, and currency conversions. You receive one consolidated itemized invoice in USD, GBP, or EUR.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="py-5">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 4 ? null : 4)"
                            class="w-full text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>Can we start with a small pilot team of 2 to 4 people?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold ml-4" x-text="openFaq === 4 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 4" x-collapse class="pt-3 text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                            Yes. Over 70% of our enterprise clients begin with a 2 to 4-person pilot pod. Once workflow velocity and quality KPIs are benchmarked, scaling up headcount is fast and seamless.
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="py-5">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 5 ? null : 5)"
                            class="w-full text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>What security standards protect client intellectual property?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold ml-4" x-text="openFaq === 5 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 5" x-collapse class="pt-3 text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                            All staff sign comprehensive proprietary IP assignment agreements and strict non-disclosures before placement. Facilities operate under biometric security controls, dedicated VPNs, MDM encrypted workstations, and strict clean-desk compliance.
                        </div>
                    </div>

                </div>

                <!-- Contact Detail Badges -->
                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center shrink-0 border border-teal-100">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-slate-500 font-medium">Direct Line</div>
                            <div class="text-sm font-bold text-[#0B152F]">+256 700 123 456</div>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center shrink-0 border border-teal-100">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-slate-500 font-medium">Email Inquiries</div>
                            <div class="text-sm font-bold text-[#0B152F]">hello@nilebridge.com</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: High-Converting Enterprise Requisition Form -->
            <div class="lg:col-span-6">
                <div id="lead-capture" class="bg-slate-50/80 rounded-2xl border border-slate-200/90 p-6 sm:p-8 lg:p-10 shadow-lg relative">
                    
                    <div class="flex items-center justify-between pb-6 border-b border-slate-200 mb-6">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-teal-700 bg-teal-50 px-2.5 py-1 rounded-full border border-teal-200/80 font-mono">REQUISITION DESK</span>
                            <h3 class="text-2xl font-extrabold text-[#0B152F] mt-2 tracking-tight">Initiate Your Requisition</h3>
                        </div>
                        <span class="text-xs text-slate-500 font-mono">24h SLA Response</span>
                    </div>

                    <form action="{{ route('leads.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <!-- Honeypot for Bot Protection -->
                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
                        </div>

                        <input type="hidden" name="source" value="landing_form">
                        <input type="hidden" name="team_size_needed" value="5">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Full Name <span class="text-teal-600">*</span></label>
                                <input type="text" name="contact_name" required value="{{ old('contact_name') }}" placeholder="Sarah Jenkins" class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-lg text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                                @error('contact_name') <span class="text-xs text-rose-500 mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Work Email <span class="text-teal-600">*</span></label>
                                <input type="email" name="contact_email" required value="{{ old('contact_email') }}" placeholder="sarah@company.com" class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-lg text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                                @error('contact_email') <span class="text-xs text-rose-500 mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Company Name <span class="text-teal-600">*</span></label>
                                <input type="text" name="company_name" required value="{{ old('company_name') }}" placeholder="Apex Global Technologies" class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-lg text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                                @error('company_name') <span class="text-xs text-rose-500 mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Service Category <span class="text-teal-600">*</span></label>
                                <select name="service_category" required class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-lg text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                                    <option value="bpo_customer_support">BPO &amp; Customer Support</option>
                                    <option value="payment_operations">Payment &amp; Fraud Operations</option>
                                    <option value="software_engineering">Cloud &amp; Software Engineering</option>
                                    <option value="finance_operations">Finance &amp; Accounting Ops</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Operational Requirements &amp; Target Start Date</label>
                            <textarea name="notes" rows="3" placeholder="Describe the competencies, required headcount, and timezone alignment needed..." class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-lg text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="w-full py-4 px-6 bg-teal-500 hover:bg-teal-600 active:bg-teal-700 text-white text-sm sm:text-base font-bold rounded-lg shadow-lg shadow-teal-500/25 transition-all transform hover:-translate-y-0.5 active:scale-95 flex items-center justify-center gap-2">
                            <span>Submit Requisition &rarr;</span>
                        </button>

                        <div class="text-center pt-2 text-xs text-slate-400">
                            Strict NDA protected &bull; Verified 24-hour partner response
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>
