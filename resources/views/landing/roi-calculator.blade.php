<!-- Section 7: Interactive Savings & ROI Calculator (Alpine.js) -->
<section id="calculator" class="py-24 relative overflow-hidden">
    <!-- Background Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[450px] bg-emerald-500/10 rounded-full blur-[140px] pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Interactive Value Engine</span>
            <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight mt-3">
                Calculate Your Realized Annual Cost Savings
            </h2>
            <p class="mt-4 text-slate-400 text-base">
                Adjust team size and seniority to benchmark your in-house fully loaded budget against the NileBridge managed delivery model.
            </p>
        </div>

        <div 
            x-data="roiCalculator()" 
            class="max-w-5xl mx-auto bg-slate-900/90 border border-slate-800 rounded-3xl p-6 sm:p-10 lg:p-12 shadow-2xl backdrop-blur-xl"
        >
            <!-- Track Selection Cards -->
            <div class="mb-10">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">1. Select Discipline & Specialization</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <template x-for="(track, key) in roleBenchmarks" :key="key">
                        <button 
                            type="button"
                            @click="setRole(key)"
                            :class="selectedRole === key 
                                ? 'border-emerald-500 bg-emerald-500/15 text-white ring-1 ring-emerald-500' 
                                : 'border-slate-800 bg-slate-950/60 text-slate-400 hover:border-slate-700 hover:text-slate-200'"
                            class="p-4 rounded-2xl border text-left transition-all duration-200 flex flex-col justify-between"
                        >
                            <div>
                                <span class="text-[10px] font-mono font-semibold uppercase tracking-wider block text-emerald-400" x-text="track.category"></span>
                                <span class="text-sm font-bold text-white block mt-1 leading-snug" x-text="track.title"></span>
                            </div>
                            <span class="text-[11px] text-slate-500 mt-3 block font-mono" x-text="'From $' + track.nileMonthly.mid + '/mo'"></span>
                        </button>
                    </template>
                </div>
            </div>

            <!-- Parameters Grid: Sliders & Seniority -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                
                <!-- Team Size Range Slider -->
                <div class="bg-slate-950/60 border border-slate-800/80 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-3">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-400">2. Dedicated Team Size</label>
                        <span class="text-emerald-400 font-extrabold text-xl font-mono" x-text="teamSize + ' Specialist' + (teamSize > 1 ? 's' : '')"></span>
                    </div>

                    <input 
                        type="range" 
                        min="1" 
                        max="50" 
                        step="1"
                        x-model.number="teamSize"
                        class="w-full h-3 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-emerald-500 mt-2"
                    />

                    <div class="flex justify-between text-[11px] text-slate-500 mt-2 font-mono">
                        <span>1 FTE (Pilot)</span>
                        <span>15 FTEs (Pod)</span>
                        <span>50+ FTEs (Division)</span>
                    </div>

                    <div class="mt-4 pt-4 border-t border-slate-900 flex justify-between items-center text-xs text-slate-400">
                        <span>Direct Team Multiplier</span>
                        <span class="font-mono text-white font-bold" x-text="teamSize + 'x Scaled Output'"></span>
                    </div>
                </div>

                <!-- Seniority Tier Selector -->
                <div class="bg-slate-950/60 border border-slate-800/80 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-3">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-400">3. Seniority & Experience Bar</label>
                        <span class="text-emerald-400 font-bold text-xs uppercase tracking-wider font-mono" x-text="seniority + ' Level'"></span>
                    </div>

                    <div class="grid grid-cols-3 gap-2 mt-2">
                        <button 
                            type="button" 
                            @click="seniority = 'mid'" 
                            :class="seniority === 'mid' ? 'bg-emerald-600 text-white font-bold shadow-md shadow-emerald-700/30' : 'bg-slate-900 text-slate-400 hover:bg-slate-800 border border-slate-800'"
                            class="py-3 text-xs rounded-xl transition font-medium text-center"
                        >
                            Mid-Level<br><span class="text-[10px] opacity-75 font-normal">3-5 yrs exp</span>
                        </button>
                        <button 
                            type="button" 
                            @click="seniority = 'senior'" 
                            :class="seniority === 'senior' ? 'bg-emerald-600 text-white font-bold shadow-md shadow-emerald-700/30' : 'bg-slate-900 text-slate-400 hover:bg-slate-800 border border-slate-800'"
                            class="py-3 text-xs rounded-xl transition font-medium text-center"
                        >
                            Senior<br><span class="text-[10px] opacity-75 font-normal">6-9 yrs exp</span>
                        </button>
                        <button 
                            type="button" 
                            @click="seniority = 'lead'" 
                            :class="seniority === 'lead' ? 'bg-emerald-600 text-white font-bold shadow-md shadow-emerald-700/30' : 'bg-slate-900 text-slate-400 hover:bg-slate-800 border border-slate-800'"
                            class="py-3 text-xs rounded-xl transition font-medium text-center"
                        >
                            Lead / Principal<br><span class="text-[10px] opacity-75 font-normal">10+ yrs exp</span>
                        </button>
                    </div>

                    <div class="mt-4 pt-4 border-t border-slate-900 flex justify-between items-center text-xs text-slate-400">
                        <span>Vetting Standard</span>
                        <span class="text-emerald-400 font-semibold font-mono">100% Fluent English & Technical Assessment</span>
                    </div>
                </div>

            </div>

            <!-- Dynamic Comparative Results Display -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 sm:p-8 bg-slate-950/80 border border-slate-800 rounded-2xl mb-8">
                <!-- Domestic In-House Cost -->
                <div class="text-center p-4 rounded-xl bg-slate-900/50 border border-slate-800/60">
                    <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider block">Est. In-House Annual Cost</span>
                    <span class="text-2xl sm:text-3xl font-bold text-slate-300 font-mono mt-2 block" x-text="formatCurrency(totalDomesticCost)"></span>
                    <span class="text-[11px] text-slate-500 mt-1 block">Includes 28% taxes, benefits & workstation</span>
                </div>

                <!-- NileBridge Managed Cost -->
                <div class="text-center p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30">
                    <span class="text-xs text-emerald-400 font-bold uppercase tracking-wider block">NileBridge Managed Cost</span>
                    <span class="text-2xl sm:text-3xl font-extrabold text-emerald-400 font-mono mt-2 block" x-text="formatCurrency(totalNilebridgeCost)"></span>
                    <span class="text-[11px] text-emerald-500/80 mt-1 block font-mono" x-text="'$' + formatNumber(totalNilebridgeCost / 12) + ' / month (all-inclusive)'"></span>
                </div>

                <!-- Annual Savings -->
                <div class="text-center p-4 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-700 text-white shadow-xl shadow-emerald-900/30">
                    <span class="text-xs uppercase tracking-wider font-bold text-emerald-100 block">Your Annual Realized Savings</span>
                    <span class="text-3xl sm:text-4xl font-black font-mono mt-2 block" x-text="formatCurrency(annualSavings)"></span>
                    <span class="inline-block mt-2 px-3 py-1 rounded-full text-xs font-black bg-slate-950/40 text-emerald-300 font-mono tracking-wide" x-text="savingsPercentage + '% Cost Reduction'"></span>
                </div>
            </div>

            <!-- CTA Transition Button -->
            <div class="text-center">
                <button 
                    type="button" 
                    @click="applySavingsToForm()"
                    class="w-full sm:w-auto inline-flex items-center justify-center px-10 py-4 rounded-xl text-base font-extrabold text-slate-950 bg-emerald-400 hover:bg-emerald-300 shadow-xl shadow-emerald-500/20 transition transform hover:-translate-y-0.5"
                >
                    Lock In This Plan & Request Custom Talent Dossier
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
                <span class="block text-xs text-slate-500 mt-3 font-medium">Includes 14-day risk-free guarantee &bull; Zero placement fees &bull; No long-term lock-in</span>
            </div>

        </div>
    </div>
</section>

<!-- Alpine.js ROI Calculator Component Logic -->
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('roiCalculator', () => ({
        selectedRole: 'software_engineering',
        teamSize: 3,
        seniority: 'senior',

        roleBenchmarks: {
            software_engineering: {
                category: 'Engineering',
                title: 'Full-Stack Software Engineers',
                baseUsAnnual: { mid: 125000, senior: 165000, lead: 195000 },
                nileMonthly: { mid: 3200, senior: 4200, lead: 5400 }
            },
            bpo_customer_support: {
                category: 'BPO & Ops',
                title: 'Customer Success & Tier-2 Support',
                baseUsAnnual: { mid: 58000, senior: 72000, lead: 90000 },
                nileMonthly: { mid: 1400, senior: 1800, lead: 2400 }
            },
            finance_backoffice: {
                category: 'Finance',
                title: 'Financial Analysts & Controllers',
                baseUsAnnual: { mid: 78000, senior: 105000, lead: 135000 },
                nileMonthly: { mid: 1900, senior: 2600, lead: 3400 }
            },
            digital_marketing: {
                category: 'Revenue Ops',
                title: 'RevOps & Growth Campaigners',
                baseUsAnnual: { mid: 74000, senior: 98000, lead: 125000 },
                nileMonthly: { mid: 1800, senior: 2400, lead: 3100 }
            }
        },

        setRole(roleKey) {
            this.selectedRole = roleKey;
        },

        get totalDomesticCost() {
            const role = this.roleBenchmarks[this.selectedRole];
            const domesticWage = role.baseUsAnnual[this.seniority];
            // 1.28 represents fully burdened domestic overhead (FICA, benefits, equipment)
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
