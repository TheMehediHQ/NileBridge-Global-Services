<!-- Section 8: Enterprise Lead Capture Form -->
<section id="lead-capture" class="py-24 bg-navy-950 border-t border-navy-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            
            <div class="text-center mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-amber-400">Launch Your Uganda Operations</span>
                <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight mt-3">
                    Initiate Your Requisition & Schedule Discovery
                </h2>
                <p class="mt-3 text-slate-400 text-sm sm:text-base">
                    Connect directly with a NileBridge Senior Delivery Partner. Receive pre-screened agent profiles and custom SLA statements of work within 24 hours.
                </p>
            </div>

            <!-- Lead Capture Card with Alpine Auto-populate State -->
            <div 
                x-data="{
                    service_category: '{{ old('service_category', 'bpo_customer_support') }}',
                    team_size_needed: {{ old('team_size_needed', 5) }},
                    estimated_budget: '{{ old('estimated_budget', '9000') }}',
                    calculator_inputs: '{{ old('calculator_inputs', '') }}',
                    source: '{{ old('source', 'landing_page') }}',
                    handoffReceived: false,
                    savingsHighlight: null,

                    init() {
                        window.addEventListener('calculator-handoff', (event) => {
                            this.service_category = event.detail.service_category;
                            this.team_size_needed = event.detail.team_size_needed;
                            this.estimated_budget = event.detail.estimated_budget;
                            this.calculator_inputs = JSON.stringify(event.detail);
                            this.source = 'roi_calculator';
                            this.savingsHighlight = event.detail.estimated_savings;
                            this.handoffReceived = true;
                        });
                    }
                }"
                class="bg-navy-900/95 border border-teal-500/30 p-8 sm:p-12 rounded-3xl shadow-2xl backdrop-blur-xl relative"
            >
                <!-- Handoff Banner if filled via calculator -->
                <div x-show="handoffReceived" x-cloak class="mb-8 p-4 rounded-2xl bg-amber-400/10 border border-amber-400/30 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-pulse"></span>
                        <span class="text-xs sm:text-sm font-semibold text-amber-300">
                            Calculator parameters imported: <strong x-text="team_size_needed + ' Specialists'"></strong> targeting <strong x-text="'$' + new Intl.NumberFormat().format(savingsHighlight) + ' annual savings'"></strong>.
                        </span>
                    </div>
                    <span class="text-[10px] font-mono uppercase bg-amber-400/20 text-amber-300 px-2 py-1 rounded font-bold">Applied</span>
                </div>

                <form action="{{ route('leads.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Anti-Spam Honeypot Field (Invisible to human users) -->
                    <div class="hidden" aria-hidden="true">
                        <label for="website_hp">Leave this field blank</label>
                        <input type="text" name="website_hp" id="website_hp" tabindex="-1" autocomplete="off">
                    </div>

                    <!-- Hidden Inputs for Calculator & Source State -->
                    <input type="hidden" name="source" :value="source">
                    <input type="hidden" name="calculator_inputs" :value="calculator_inputs">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Company Name -->
                        <div>
                            <label for="company_name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Company / Enterprise Name <span class="text-amber-400">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="company_name" 
                                name="company_name" 
                                required
                                value="{{ old('company_name') }}"
                                placeholder="e.g. Stripe Merchant Partner / FinTech Corp"
                                class="w-full px-4 py-3 bg-navy-950 border border-navy-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm transition"
                            />
                            @error('company_name')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Contact Name -->
                        <div>
                            <label for="contact_name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Key Decision Maker / Executive <span class="text-amber-400">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="contact_name" 
                                name="contact_name" 
                                required
                                value="{{ old('contact_name') }}"
                                placeholder="e.g. Victoria Sterling"
                                class="w-full px-4 py-3 bg-navy-950 border border-navy-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm transition"
                            />
                            @error('contact_name')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Work Email -->
                        <div>
                            <label for="contact_email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Corporate Email Address <span class="text-amber-400">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="contact_email" 
                                name="contact_email" 
                                required
                                value="{{ old('contact_email') }}"
                                placeholder="vsterling@company.com"
                                class="w-full px-4 py-3 bg-navy-950 border border-navy-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm transition"
                            />
                            @error('contact_email')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="contact_phone" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Phone Number (Optional)
                            </label>
                            <input 
                                type="text" 
                                id="contact_phone" 
                                name="contact_phone" 
                                value="{{ old('contact_phone') }}"
                                placeholder="+1 (555) 019-3322"
                                class="w-full px-4 py-3 bg-navy-950 border border-navy-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm transition"
                            />
                            @error('contact_phone')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Service Category Selection -->
                        <div>
                            <label for="service_category" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Primary Specialization <span class="text-amber-400">*</span>
                            </label>
                            <select 
                                id="service_category" 
                                name="service_category" 
                                x-model="service_category"
                                class="w-full px-4 py-3 bg-navy-950 border border-navy-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm transition"
                            >
                                <option value="bpo_customer_support">24/7 Omnichannel Call Center & BPO (Flagship)</option>
                                <option value="payment_processing">Fintech & Payment Processing Operations (Flagship)</option>
                                <option value="software_engineering">Dedicated Software & Cloud Engineering</option>
                                <option value="finance_backoffice">Finance, Accounting & Back-Office Operations</option>
                                <option value="digital_marketing">Growth Marketing & Revenue Operations</option>
                            </select>
                            @error('service_category')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Team Size Needed -->
                        <div>
                            <label for="team_size_needed" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Team Pod Size (FTEs) <span class="text-amber-400">*</span>
                            </label>
                            <input 
                                type="number" 
                                id="team_size_needed" 
                                name="team_size_needed" 
                                min="1" 
                                max="500" 
                                required
                                x-model.number="team_size_needed"
                                class="w-full px-4 py-3 bg-navy-950 border border-navy-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm transition"
                            />
                            @error('team_size_needed')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Target Monthly Budget -->
                    <div>
                        <label for="estimated_budget" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                            Estimated Monthly Target Budget (USD)
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 text-sm">$</span>
                            <input 
                                type="number" 
                                step="100" 
                                id="estimated_budget" 
                                name="estimated_budget" 
                                x-model="estimated_budget"
                                placeholder="9000"
                                class="w-full pl-8 pr-4 py-3 bg-navy-950 border border-navy-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm transition"
                            />
                        </div>
                        @error('estimated_budget')
                            <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Additional Scoping Notes -->
                    <div>
                        <label for="notes" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                            Specific Workflow, Gateways (e.g. Stripe, Zendesk) or KPI Goals
                        </label>
                        <textarea 
                            id="notes" 
                            name="notes" 
                            rows="3" 
                            placeholder="e.g. We require a 10-person 24/7 call center team for US and UK inbound support on Zendesk & Talkdesk, plus 2 dispute resolution specialists familiar with Stripe chargeback representation."
                            class="w-full px-4 py-3 bg-navy-950 border border-navy-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400 text-sm transition"
                        >{{ old('notes') }}</textarea>
                        @error('notes')
                            <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submission Button -->
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="w-full py-4 px-6 rounded-xl font-extrabold text-navy-950 bg-gradient-to-r from-amber-400 via-amber-300 to-amber-400 hover:from-amber-300 hover:to-amber-200 shadow-xl shadow-amber-500/20 text-base transition transform hover:-translate-y-0.5"
                        >
                            Request Custom Talent Dossier & Schedule Consultation
                        </button>
                        <p class="text-center text-[11px] text-slate-500 mt-3">
                            Strict NDA protected &bull; PCI-DSS compliant infrastructure &bull; Direct technical response within 24 business hours.
                        </p>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
