<!-- Section 11: FAQ & Contact / Talk to an Expert matching media_1789070132452.png -->
<section id="contact" class="py-20 bg-white border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Success Alert if session exists -->
        @if(session('success'))
            <div class="mb-10 p-4 rounded-xl bg-teal-50 border border-teal-200 text-teal-800 text-sm flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-teal-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
                <span class="text-xs font-mono text-teal-600 uppercase">Received</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start" x-data="{ openFaq: 1, showForm: false }">
            
            <!-- Left Column: Contact & Heading -->
            <div class="lg:col-span-5">
                <div class="inline-flex items-center space-x-2 text-xs font-bold uppercase tracking-wider text-teal-600 mb-2">
                    <span class="w-4 h-0.5 bg-teal-500"></span>
                    <span>FREQUENTLY ASKED QUESTIONS</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0B152F] tracking-tight leading-tight">
                    Talk to an Expert<br>
                    About Your Operations
                </h2>
                <p class="mt-4 text-sm text-slate-500 leading-relaxed font-normal">
                    Have questions? Our team is here to help. Get in touch for a free consultation and personalized advice.
                </p>

                <!-- Contact Details -->
                <div class="mt-10 space-y-6">
                    <!-- Phone -->
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center shrink-0 border border-teal-100">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-[#0B152F]">+256 700 123 456</div>
                            <div class="text-xs text-slate-400">Call us anytime</div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center shrink-0 border border-teal-100">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-[#0B152F]">hello@globaltalent.com</div>
                            <div class="text-xs text-slate-400">We reply within 24 hours</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Accordion + Consultation Action -->
            <div class="lg:col-span-7">
                <div class="space-y-3">
                    <!-- FAQ 1 -->
                    <div class="bg-white border border-slate-200/80 rounded-xl overflow-hidden transition">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 1 ? null : 1)"
                            class="w-full px-5 py-4 text-left flex items-center justify-between text-sm font-semibold text-[#0B152F] hover:text-teal-600"
                        >
                            <span>How fast can you find talent?</span>
                            <span class="text-slate-400 font-bold" x-text="openFaq === 1 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 1" x-collapse class="px-5 pb-4 text-xs text-slate-500 leading-relaxed">
                            Our average placement cycle is 10 to 14 business days. Pre-vetted specialists in our Kampala talent pool can often onboard even faster for immediate operational needs.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="bg-white border border-slate-200/80 rounded-xl overflow-hidden transition">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 2 ? null : 2)"
                            class="w-full px-5 py-4 text-left flex items-center justify-between text-sm font-semibold text-[#0B152F] hover:text-teal-600"
                        >
                            <span>What industries do you serve?</span>
                            <span class="text-slate-400 font-bold" x-text="openFaq === 2 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 2" x-collapse class="px-5 pb-4 text-xs text-slate-500 leading-relaxed">
                            We support high-growth companies across E-Commerce, SaaS, FinTech &amp; Payment Processing, HealthTech, Logistics, and Education with dedicated remote teams.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-white border border-slate-200/80 rounded-xl overflow-hidden transition">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 3 ? null : 3)"
                            class="w-full px-5 py-4 text-left flex items-center justify-between text-sm font-semibold text-[#0B152F] hover:text-teal-600"
                        >
                            <span>Do you handle payroll and taxes?</span>
                            <span class="text-slate-400 font-bold" x-text="openFaq === 3 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 3" x-collapse class="px-5 pb-4 text-xs text-slate-500 leading-relaxed">
                            Yes, 100%. We manage international payroll, local compliance, benefits, tax withholding, and equipment provisioning so you receive a single predictable invoice.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="bg-white border border-slate-200/80 rounded-xl overflow-hidden transition">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 4 ? null : 4)"
                            class="w-full px-5 py-4 text-left flex items-center justify-between text-sm font-semibold text-[#0B152F] hover:text-teal-600"
                        >
                            <span>Can I hire a single team member?</span>
                            <span class="text-slate-400 font-bold" x-text="openFaq === 4 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 4" x-collapse class="px-5 pb-4 text-xs text-slate-500 leading-relaxed">
                            Absolutely. You can start with a pilot of 1 dedicated specialist and seamlessly scale to an entire department of 50+ as your operations grow.
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="bg-white border border-slate-200/80 rounded-xl overflow-hidden transition">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === 5 ? null : 5)"
                            class="w-full px-5 py-4 text-left flex items-center justify-between text-sm font-semibold text-[#0B152F] hover:text-teal-600"
                        >
                            <span>Is there a long-term contract?</span>
                            <span class="text-slate-400 font-bold" x-text="openFaq === 5 ? '−' : '+'"></span>
                        </button>
                        <div x-show="openFaq === 5" x-collapse class="px-5 pb-4 text-xs text-slate-500 leading-relaxed">
                            We offer flexible month-to-month contracts with no lock-ins, backed by a 2-week risk-free talent replacement guarantee.
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="mt-6">
                    <button 
                        type="button"
                        @click="showForm = !showForm"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-xl text-xs font-bold text-white bg-teal-500 hover:bg-teal-600 transition shadow-md"
                    >
                        <span>Get a Free Consultation</span>
                        <svg class="w-3.5 h-3.5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>

                <!-- Embedded Lead Capture Card Form -->
                <div id="lead-capture" class="mt-8 bg-slate-50/80 rounded-2xl border border-slate-200 p-6 sm:p-8" :class="showForm ? 'block' : 'block'">
                    <h3 class="text-base font-bold text-[#0B152F] mb-1">Initiate Your Requisition</h3>
                    <p class="text-xs text-slate-500 mb-6">Connect with a delivery partner and receive candidate portfolios within 24 hours.</p>

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
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Full name *</label>
                                <input type="text" name="contact_name" required value="{{ old('contact_name') }}" placeholder="Jane Smith" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs text-slate-800 focus:outline-none focus:border-teal-500">
                                @error('contact_name') <span class="text-[11px] text-rose-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Work email *</label>
                                <input type="email" name="contact_email" required value="{{ old('contact_email') }}" placeholder="jane@company.com" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs text-slate-800 focus:outline-none focus:border-teal-500">
                                @error('contact_email') <span class="text-[11px] text-rose-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Company *</label>
                                <input type="text" name="company_name" required value="{{ old('company_name') }}" placeholder="Acme Inc." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs text-slate-800 focus:outline-none focus:border-teal-500">
                                @error('company_name') <span class="text-[11px] text-rose-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Service Interest *</label>
                                <select name="service_category" required class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs text-slate-800 focus:outline-none focus:border-teal-500">
                                    <option value="bpo_customer_support">BPO &amp; Customer Support</option>
                                    <option value="payment_operations">Payment &amp; Fraud Ops</option>
                                    <option value="software_engineering">Software Engineering</option>
                                    <option value="finance_operations">Finance &amp; Back-Office</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Requirements</label>
                            <textarea name="notes" rows="2" placeholder="Tell us about the roles or goals you are hiring for..." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs text-slate-800 focus:outline-none focus:border-teal-500">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="w-full py-2.5 px-4 bg-teal-500 hover:bg-teal-600 text-white text-xs font-bold rounded-lg shadow-sm transition">
                            Submit Requisition &rarr;
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
