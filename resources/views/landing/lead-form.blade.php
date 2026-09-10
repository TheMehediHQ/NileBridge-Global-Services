<!-- Section 10: FAQ & Contact / Talk to an Expert matching media_1789070132452.png -->
<section id="contact" class="py-24 bg-white border-b border-slate-100 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Success Alert if session exists -->
        @if(session('success'))
            <div class="mb-12 p-5 rounded-2xl bg-teal-50 border border-teal-200 text-teal-800 text-sm flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3.5">
                    <div class="w-8 h-8 rounded-full bg-teal-500 text-white flex items-center justify-center font-bold">✓</div>
                    <div>
                        <div class="font-bold text-[#0B152F]">Inquiry Successfully Dispatched</div>
                        <div class="text-xs text-teal-700 mt-0.5">{{ session('success') }} A Senior Delivery Partner will reach out within 24 hours.</div>
                    </div>
                </div>
                <span class="text-xs font-mono font-bold text-teal-700 bg-teal-100/60 px-3 py-1 rounded-full uppercase">SLA Active</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start" x-data="{ openFaq: 1, showConsultationForm: false }">
            
            <!-- Left Column: Contact & Heading -->
            <div class="lg:col-span-5">
                <div class="inline-flex items-center space-x-2 text-xs font-bold uppercase tracking-wider text-teal-600 mb-2">
                    <span class="w-4 h-0.5 bg-teal-500"></span>
                    <span>FREQUENTLY ASKED QUESTIONS</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#0B152F] tracking-tight leading-tight">
                    Talk to an Expert<br>
                    About Your Operations
                </h2>
                <p class="mt-4 text-sm sm:text-base text-slate-500 leading-relaxed font-normal">
                    Have questions? Our team is here to help. Get in touch for a free consultation, custom pricing models, and tailored candidate portfolios.
                </p>

                <!-- Contact Details List -->
                <div class="mt-10 space-y-5">
                    <!-- Phone -->
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50/70 border border-slate-200/70 hover:border-teal-300 transition duration-300">
                        <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center shrink-0 border border-teal-100 shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-base font-bold text-[#0B152F]">+256 700 123 456</div>
                            <div class="text-sm text-slate-500 font-medium">Direct Line &bull; Call us anytime (US/UK Aligned)</div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50/70 border border-slate-200/70 hover:border-teal-300 transition duration-300">
                        <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center shrink-0 border border-teal-100 shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-base font-bold text-[#0B152F]">hello@globaltalent.com</div>
                            <div class="text-sm text-slate-500 font-medium">We reply with custom quotes within 24 hours</div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50/70 border border-slate-200/70 hover:border-teal-300 transition duration-300">
                        <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center shrink-0 border border-teal-100 shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-base font-bold text-[#0B152F]">Kampala, Uganda</div>
                            <div class="text-sm text-slate-500 font-medium">Global Delivery Operations Hub &bull; East Africa</div>
                        </div>
                    </div>
                </div>

                <!-- Trust Guarantee Badge -->
                <div class="mt-8 p-4 rounded-2xl bg-slate-50 border border-slate-100 text-sm text-slate-600 flex items-center gap-3">
                    <span class="text-teal-600 font-bold text-base">🔒</span>
                    <div>
                        <strong class="text-slate-800">Bank-Grade Confidentiality:</strong> Strict mutual NDAs signed automatically prior to discovering candidate portfolios.
                    </div>
                </div>
            </div>

            <!-- Right Column: Accordion + Embedded Lead Capture Form -->
            <div class="lg:col-span-7">
                <!-- FAQ Accordion -->
                <div class="space-y-3">
                    <!-- FAQ 1 -->
                    <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden transition shadow-sm hover:border-teal-300">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 1 ? null : 1)"
                            class="w-full px-6 py-4.5 text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>How fast can you find talent?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold" x-text="openFaq === 1 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 1" x-collapse class="px-6 pb-5 text-sm sm:text-base text-slate-600 leading-relaxed font-normal border-t border-slate-100 pt-3">
                            Our average placement cycle is 10 to 14 business days. Pre-vetted specialists in our Kampala talent pool can often onboard even faster for immediate operational needs.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden transition shadow-sm hover:border-teal-300">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 2 ? null : 2)"
                            class="w-full px-6 py-4.5 text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>What industries do you serve?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold" x-text="openFaq === 2 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 2" x-collapse class="px-6 pb-5 text-sm sm:text-base text-slate-600 leading-relaxed font-normal border-t border-slate-100 pt-3">
                            We support high-growth companies across E-Commerce, SaaS, FinTech &amp; Payment Processing, HealthTech, Logistics, and Education with dedicated remote teams.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden transition shadow-sm hover:border-teal-300">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 3 ? null : 3)"
                            class="w-full px-6 py-4.5 text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>Do you handle payroll and taxes?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold" x-text="openFaq === 3 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 3" x-collapse class="px-6 pb-5 text-sm sm:text-base text-slate-600 leading-relaxed font-normal border-t border-slate-100 pt-3">
                            Yes, 100%. We manage international payroll, local compliance, benefits, tax withholding, and equipment provisioning so you receive a single predictable invoice.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden transition shadow-sm hover:border-teal-300">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 4 ? null : 4)"
                            class="w-full px-6 py-4.5 text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>Can I hire a single team member?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold" x-text="openFaq === 4 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 4" x-collapse class="px-6 pb-5 text-sm sm:text-base text-slate-600 leading-relaxed font-normal border-t border-slate-100 pt-3">
                            Absolutely. You can start with a pilot of 1 dedicated specialist and seamlessly scale to an entire department of 50+ as your operations grow.
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden transition shadow-sm hover:border-teal-300">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 5 ? null : 5)"
                            class="w-full px-6 py-4.5 text-left flex items-center justify-between text-base sm:text-lg font-bold text-[#0B152F] hover:text-teal-600 transition"
                        >
                            <span>Is there a long-term contract?</span>
                            <span class="text-slate-400 font-mono text-lg font-bold" x-text="openFaq === 5 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 5" x-collapse class="px-6 pb-5 text-sm sm:text-base text-slate-600 leading-relaxed font-normal border-t border-slate-100 pt-3">
                            We offer flexible month-to-month contracts with no lock-ins, backed by a 2-week risk-free talent replacement guarantee.
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="mt-6">
                    <a 
                        href="#lead-capture" 
                        class="inline-flex items-center justify-center px-7 py-3.5 rounded-full text-sm sm:text-base font-bold text-white bg-teal-500 hover:bg-teal-600 transition shadow-lg shadow-teal-500/20 active:scale-95 transform hover:-translate-y-0.5"
                    >
                        <span>Get a Free Consultation &rarr;</span>
                    </a>
                </div>

                <!-- Embedded Lead Capture Card Form -->
                <div id="lead-capture" class="mt-10 bg-gradient-to-b from-slate-50 to-white rounded-3xl border border-slate-200 p-8 sm:p-10 shadow-xl relative">
                    <div class="flex items-center justify-between pb-6 border-b border-slate-200 mb-6">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-teal-600 bg-teal-50 px-2.5 py-1 rounded-full border border-teal-100">Enterprise Intake</span>
                            <h3 class="text-xl font-bold text-[#0B152F] mt-2 tracking-tight">Initiate Your Requisition</h3>
                        </div>
                        <span class="text-xs text-slate-400 font-mono">24h SLA</span>
                    </div>

                    <form action="{{ route('leads.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <!-- Honeypot -->
                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
                        </div>

                        <input type="hidden" name="source" value="landing_form">
                        <input type="hidden" name="team_size_needed" value="5">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Full name <span class="text-teal-600">*</span></label>
                                <input type="text" name="contact_name" required value="{{ old('contact_name') }}" placeholder="Jane Smith" class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                                @error('contact_name') <span class="text-xs text-rose-500 mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Work email <span class="text-teal-600">*</span></label>
                                <input type="email" name="contact_email" required value="{{ old('contact_email') }}" placeholder="jane@company.com" class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                                @error('contact_email') <span class="text-xs text-rose-500 mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Company <span class="text-teal-600">*</span></label>
                                <input type="text" name="company_name" required value="{{ old('company_name') }}" placeholder="Acme Inc." class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                                @error('company_name') <span class="text-xs text-rose-500 mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Service Interest <span class="text-teal-600">*</span></label>
                                <select name="service_category" required class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                                    <option value="bpo_customer_support">BPO &amp; Customer Support</option>
                                    <option value="payment_operations">Payment &amp; Fraud Ops</option>
                                    <option value="software_engineering">Software Engineering</option>
                                    <option value="finance_operations">Finance &amp; Back-Office</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Requirements &amp; Goals</label>
                            <textarea name="notes" rows="3" placeholder="Tell us about the roles, timezone needs or goals you are hiring for..." class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 px-6 bg-teal-500 hover:bg-teal-600 active:bg-teal-700 text-white text-sm sm:text-base font-bold rounded-xl shadow-lg shadow-teal-500/25 transition-all transform hover:-translate-y-0.5 active:scale-95 flex items-center justify-center gap-2">
                            <span>Submit Requisition &rarr;</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
