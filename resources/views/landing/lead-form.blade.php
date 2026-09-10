<!-- Section 8: Enterprise Lead Capture Form -->
<section id="lead-capture" class="py-24 bg-slate-900/40 border-t border-slate-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            
            <div class="text-center mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Rapid Enterprise Onboarding</span>
                <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight mt-3">
                    Initiate Your Global Talent Search
                </h2>
                <p class="mt-3 text-slate-400 text-sm sm:text-base">
                    Speak directly with a Senior NileBridge Delivery Partner. Receive pre-vetted candidate portfolios matched to your exact requirements within 48 hours.
                </p>
            </div>

            <!-- Lead Capture Card with Alpine Auto-populate State -->
            <div 
                x-data="{
                    service_category: '{{ old('service_category', 'software_engineering') }}',
                    team_size_needed: {{ old('team_size_needed', 3) }},
                    estimated_budget: '{{ old('estimated_budget', '12600') }}',
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
                class="bg-slate-900/95 border border-slate-800 p-8 sm:p-12 rounded-3xl shadow-2xl backdrop-blur-xl relative"
            >
                <!-- Handoff Banner if filled via calculator -->
                <div x-show="handoffReceived" x-cloak class="mb-8 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs sm:text-sm font-semibold text-emerald-300">
                            Custom parameters imported: <strong x-text="team_size_needed + ' FTEs'"></strong> targeting <strong x-text="'$' + new Intl.NumberFormat().format(savingsHighlight) + ' annual savings'"></strong>.
                        </span>
                    </div>
                    <span class="text-[10px] font-mono uppercase bg-emerald-500/20 text-emerald-300 px-2 py-1 rounded">Applied</span>
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
                                Company / Enterprise Entity <span class="text-emerald-400">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="company_name" 
                                name="company_name" 
                                required
                                value="{{ old('company_name') }}"
                                placeholder="e.g. Acme Technologies Inc."
                                class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition"
                            />
                            @error('company_name')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Contact Name -->
                        <div>
                            <label for="contact_name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Lead Representative / Decision Maker <span class="text-emerald-400">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="contact_name" 
                                name="contact_name" 
                                required
                                value="{{ old('contact_name') }}"
                                placeholder="e.g. Sarah Jenkins"
                                class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition"
                            />
                            @error('contact_name')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Work Email -->
                        <div>
                            <label for="contact_email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Corporate Email Address <span class="text-emerald-400">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="contact_email" 
                                name="contact_email" 
                                required
                                value="{{ old('contact_email') }}"
                                placeholder="sjenkins@acme.com"
                                class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition"
                            />
                            @error('contact_email')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="contact_phone" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Direct Phone Number (Optional)
                            </label>
                            <input 
                                type="text" 
                                id="contact_phone" 
                                name="contact_phone" 
                                value="{{ old('contact_phone') }}"
                                placeholder="+1 (555) 012-3456"
                                class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition"
                            />
                            @error('contact_phone')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Service Category Selection -->
                        <div>
                            <label for="service_category" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                Primary Specialization Required <span class="text-emerald-400">*</span>
                            </label>
                            <select 
                                id="service_category" 
                                name="service_category" 
                                x-model="service_category"
                                class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition"
                            >
                                <option value="software_engineering">Dedicated Software & Cloud Engineering</option>
                                <option value="bpo_customer_support">24/7 BPO & Omnichannel Customer Success</option>
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
                                Requisition Team Size (FTEs) <span class="text-emerald-400">*</span>
                            </label>
                            <input 
                                type="number" 
                                id="team_size_needed" 
                                name="team_size_needed" 
                                min="1" 
                                max="500" 
                                required
                                x-model.number="team_size_needed"
                                class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition"
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
                                placeholder="12600"
                                class="w-full pl-8 pr-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition"
                            />
                        </div>
                        @error('estimated_budget')
                            <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Additional Scoping Notes -->
                    <div>
                        <label for="notes" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                            Specific Tech Stack, Roles or Project Goals
                        </label>
                        <textarea 
                            id="notes" 
                            name="notes" 
                            rows="3" 
                            placeholder="e.g. We are migrating our backend to Laravel & AWS. We need 3 Senior Engineers with experience in MySQL replication and high-concurrency architecture. Target start date: next month."
                            class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition"
                        >{{ old('notes') }}</textarea>
                        @error('notes')
                            <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Privacy & Submission Button -->
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="w-full py-4 px-6 rounded-xl font-black text-slate-950 bg-emerald-400 hover:bg-emerald-300 shadow-xl shadow-emerald-500/20 text-base transition transform hover:-translate-y-0.5"
                        >
                            Request Custom Talent Dossier & Schedule Consultation
                        </button>
                        <p class="text-center text-[11px] text-slate-500 mt-3">
                            Strict NDA protected &bull; No spam &bull; Direct technical response within 24 business hours.
                        </p>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
