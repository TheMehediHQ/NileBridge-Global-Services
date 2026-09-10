<!-- Section 7: Flagship Savings & ROI Calculator (Alpine.js) -->
<section id="calculator" class="py-24 relative overflow-hidden bg-navy-950">
    <!-- Ambient River Teal & Gold Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[850px] h-[500px] bg-teal-500/10 rounded-full blur-[150px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-10 right-10 w-[450px] h-[450px] bg-amber-500/10 rounded-full blur-[150px] pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-amber-400">Uganda Delivery Economics</span>
            <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight mt-3">
                Calculate Realized Annual Cost Savings
            </h2>
            <p class="mt-4 text-slate-400 text-base">
                Benchmark your domestic in-house payroll or legacy agency spend against NileBridge's managed Uganda operations.
            </p>
        </div>

        <div 
            x-data="roiCalculator()" 
            class="max-w-5xl mx-auto bg-navy-900/90 border border-teal-500/30 rounded-3xl p-6 sm:p-10 lg:p-12 shadow-2xl backdrop-blur-xl"
        >
            <!-- 1. Track Selection Cards -->
            <div class="mb-10">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">1. Select Flagship Specialization</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <template x-for="(track, key) in roleBenchmarks" :key="key">
                        <button 
                            type="button"
                            @click="setRole(key)"
                            :class="selectedRole === key 
                                ? 'border-amber-400 bg-amber-400/10 text-white ring-1 ring-amber-400 shadow-lg shadow-amber-500/10' 
                                : 'border-navy-800 bg-navy-950/70 text-slate-400 hover:border-teal-500/40 hover:text-slate-200'"
                            class="p-4 rounded-2xl border text-left transition-all duration-200 flex flex-col justify-between"
                        >
                            <div>
                                <span class="text-[10px] font-mono font-bold uppercase tracking-wider block text-amber-400" x-text="track.category"></span>
                                <span class="text-sm font-bold text-white block mt-1 leading-snug" x-text="track.title"></span>
                            </div>
                            <span class="text-[11px] text-teal-400 mt-3 block font-mono font-semibold" x-text="'From $' + track.nileMonthly.mid + '/mo'"></span>
                        </button>
                    </template>
                </div>
            </div>

            <!-- 2. Sliders & Seniority -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                
                <!-- Team Size Range Slider -->
                <div class="bg-navy-950/80 border border-navy-800 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-3">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-400">2. Dedicated Team Pod Size</label>
                        <span class="text-amber-400 font-extrabold text-xl font-mono" x-text="teamSize + ' Specialist' + (teamSize > 1 ? 's' : '')"></span>
                    </div>

                    <input 
                        type="range" 
                        min="1" 
                        max="50" 
                        step="1"
                        x-model.number="teamSize"
                        class="w-full h-3 bg-navy-800 rounded-lg appearance-none cursor-pointer accent-amber-400 mt-2"
                    />

                    <div class="flex justify-between text-[11px] text-slate-500 mt-2 font-mono">
                        <span>1 FTE (Pilot)</span>
                        <span>15 FTEs (Pod)</span>
                        <span>50+ FTEs (Full Center)</span>
                    </div>

                    <div class="mt-4 pt-4 border-t border-navy-900 flex justify-between items-center text-xs text-slate-400">
                        <span>Uganda Center Output</span>
                        <span class="font-mono text-white font-bold" x-text="teamSize + 'x Dedicated Capacity'"></span>
                    </div>
                </div>

                <!-- Seniority Tier Selector -->
                <div class="bg-navy-950/80 border border-navy-800 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-3">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-400">3. Vetting & Seniority Tier</label>
                        <span class="text-teal-400 font-bold text-xs uppercase tracking-wider font-mono" x-text="seniority + ' Level'"></span>
                    </div>

                    <div class="grid grid-cols-3 gap-2 mt-2">
                        <button 
                            type="button" 
                            @click="seniority = 'mid'" 
                            :class="seniority === 'mid' ? 'bg-teal-500 text-navy-950 font-bold shadow-md shadow-teal-500/30' : 'bg-navy-900 text-slate-400 hover:bg-navy-850 border border-navy-800'"
                            class="py-3 text-xs rounded-xl transition font-medium text-center"
                        >
                            Mid-Level<br><span class="text-[10px] opacity-75 font-normal">2-4 yrs exp</span>
                        </button>
                        <button 
                            type="button" 
                            @click="seniority = 'senior'" 
                            :class="seniority === 'senior' ? 'bg-teal-500 text-navy-950 font-bold shadow-md shadow-teal-500/30' : 'bg-navy-900 text-slate-400 hover:bg-navy-850 border border-navy-800'"
                            class="py-3 text-xs rounded-xl transition font-medium text-center"
                        >
                            Senior<br><span class="text-[10px] opacity-75 font-normal">5-8 yrs exp</span>
                        </button>
                        <button 
                            type="button" 
                            @click="seniority = 'lead'" 
                            :class="seniority === 'lead' ? 'bg-teal-500 text-navy-950 font-bold shadow-md shadow-teal-500/30' : 'bg-navy-900 text-slate-400 hover:bg-navy-850 border border-navy-800'"
                            class="py-3 text-xs rounded-xl transition font-medium text-center"
                        >
                            Lead / Manager<br><span class="text-[10px] opacity-75 font-normal">9+ yrs exp</span>
                        </button>
                    </div>

                    <div class="mt-4 pt-4 border-t border-navy-900 flex justify-between items-center text-xs text-slate-400">
                        <span>Fluency Guarantee</span>
                        <span class="text-amber-400 font-semibold font-mono">100% C2 Native-Level English</span>
                    </div>
                </div>

            </div>

            <!-- Dynamic Comparative Results Display -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 sm:p-8 bg-navy-950/90 border border-navy-800 rounded-2xl mb-8">
                <!-- Domestic In-House Cost -->
                <div class="text-center p-4 rounded-xl bg-navy-900/60 border border-navy-800">
                    <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider block">Estimated US/EU In-House</span>
                    <span class="text-2xl sm:text-3xl font-bold text-slate-300 font-mono mt-2 block" x-text="formatCurrency(totalDomesticCost)"></span>
                    <span class="text-[11px] text-slate-500 mt-1 block">Wages + 28% taxes, benefits & overhead</span>
                </div>

                <!-- NileBridge Managed Cost -->
                <div class="text-center p-4 rounded-xl bg-teal-500/10 border border-teal-500/30">
                    <span class="text-xs text-teal-400 font-bold uppercase tracking-wider block">NileBridge Managed Cost</span>
                    <span class="text-2xl sm:text-3xl font-extrabold text-teal-300 font-mono mt-2 block" x-text="formatCurrency(totalNilebridgeCost)"></span>
                    <span class="text-[11px] text-teal-400/80 mt-1 block font-mono" x-text="'$' + formatNumber(totalNilebridgeCost / 12) + ' / mo all-inclusive'"></span>
                </div>

                <!-- Annual Savings in Warm Gold -->
                <div class="text-center p-4 rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 text-navy-950 shadow-xl shadow-amber-500/20">
                    <span class="text-xs uppercase tracking-wider font-extrabold text-navy-900 block">Your Realized Annual Savings</span>
                    <span class="text-3xl sm:text-4xl font-black font-mono mt-2 block text-navy-950" x-text="formatCurrency(annualSavings)"></span>
                    <span class="inline-block mt-2 px-3 py-1 rounded-full text-xs font-black bg-navy-950 text-amber-300 font-mono tracking-wide" x-text="savingsPercentage + '% Cost Reduction'"></span>
                </div>
            </div>

            <!-- CTA Transition Button -->
            <div class="text-center">
                <button 
                    type="button" 
                    @click="applySavingsToForm()"
                    class="w-full sm:w-auto inline-flex items-center justify-center px-10 py-4 rounded-xl text-base font-extrabold text-navy-950 bg-gradient-to-r from-amber-400 via-amber-300 to-amber-400 hover:from-amber-300 hover:to-amber-200 shadow-xl shadow-amber-500/20 transition transform hover:-translate-y-0.5"
                >
                    Lock In This Plan & Deploy Uganda Pod
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
                <span class="block text-xs text-slate-400 mt-3 font-medium">14-day risk-free trial guarantee &bull; Zero recruitment fees &bull; Managed Kampala operations</span>
            </div>

        </div>
    </div>
</section>

<!-- Alpine.js ROI Calculator Component Logic -->
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('roiCalculator', () => ({
        selectedRole: 'bpo_customer_support',
        teamSize: 5,
        seniority: 'senior',

        roleBenchmarks: {
            bpo_customer_support: {
                category: 'Call Center',
                title: '24/7 Call Center & BPO Squads',
                baseUsAnnual: { mid: 54000, senior: 68000, lead: 85000 },
                nileMonthly: { mid: 1400, senior: 1800, lead: 2400 }
            },
            payment_processing: {
                category: 'Fintech Ops',
                title: 'Payment & Dispute Analysts',
                baseUsAnnual: { mid: 65000, senior: 82000, lead: 105000 },
                nileMonthly: { mid: 1800, senior: 2300, lead: 3100 }
            },
            software_engineering: {
                category: 'Engineering',
                title: 'Full-Stack Software Engineers',
                baseUsAnnual: { mid: 125000, senior: 165000, lead: 195000 },
                nileMonthly: { mid: 3200, senior: 4200, lead: 5400 }
            },
            finance_backoffice: {
                category: 'Finance',
                title: 'Accounting & Reconciliation Ops',
                baseUsAnnual: { mid: 75000, senior: 98000, lead: 128000 },
                nileMonthly: { mid: 1900, senior: 2500, lead: 3300 }
            }
        },

        setRole(roleKey) {
            this.selectedRole = roleKey;
        },

        get totalDomesticCost() {
            const role = this.roleBenchmarks[this.selectedRole];
            const domesticWage = role.baseUsAnnual[this.seniority];
            const fullyBurdened = domesticWage * 1.28;
            return Math.round(fullyBurdened * this.teamSize);
        },

        get totalNilebridgeCost() {
            const role = this.roleBenchmarks[this.selectedRole];
            const monthlyRate = role.nileMonthly[this.seniority];
            return Math.round((monthlyRate * 12) * this.teamSize);
        },

        get annualSavings() {
            return Math.max(0, this.totalDomesticCost - this.totalNilebridgeCost);
        },

        get savingsPercentage() {
            if (this.totalDomesticCost === 0) return 0;
            return Math.round((this.annualSavings / this.totalDomesticCost) * 100);
        },

        formatCurrency(amount) {
            return new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
                maximumFractionDigits: 0
            }).format(amount);
        },

        formatNumber(amount) {
            return new Intl.NumberFormat('en-US', {
                maximumFractionDigits: 0
            }).format(amount);
        },

        applySavingsToForm() {
            window.dispatchEvent(new CustomEvent('calculator-handoff', {
                detail: {
                    service_category: this.selectedRole,
                    team_size_needed: this.teamSize,
                    seniority: this.seniority,
                    estimated_savings: this.annualSavings,
                    estimated_budget: Math.round(this.totalNilebridgeCost / 12)
                }
            }));

            const targetSection = document.getElementById('lead-capture');
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        }
    }));
});
</script>
