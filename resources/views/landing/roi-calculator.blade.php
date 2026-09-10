<!-- 14. ROI & Savings Calculator -->
<section id="calculator" class="py-20 bg-white border-b border-slate-100" x-data="roiCalculatorWidget()">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-teal-600 mb-2">
                    <span class="w-2 h-0.5 bg-teal-500"></span>
                    ROI CALCULATOR
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0B152F] tracking-tight">
                    What Could NileBridge Save Your Business?
                </h2>
                <p class="text-xs text-slate-400 font-medium mt-1">
                    Calculate Your Realized Annual Cost Savings &bull; Calculate Realized Annual Cost Savings
                </p>
            </div>
            <p class="mt-4 md:mt-0 text-slate-500 text-sm max-w-md">
                Adjust the variables below to calculate your estimated annual savings against domestic onshore cost.
            </p>
        </div>

        <!-- 2-Tone Calculator Container -->
        <div class="rounded-2xl border border-slate-200 overflow-hidden shadow-xl grid grid-cols-1 lg:grid-cols-12">
            <!-- Left Console: Dark Navy Input Panel -->
            <div class="lg:col-span-7 bg-[#0B152F] p-6 sm:p-10 text-white flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold text-white tracking-tight">Your Current Operation</h3>
                    <p class="text-slate-400 text-sm mt-1">Enter your team numbers to estimate your savings.</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                        <!-- Current Headcount -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">
                                Current Onshore Headcount
                            </label>
                            <input 
                                type="number" 
                                min="1" 
                                max="200" 
                                x-model.number="headcount" 
                                @input="updateCalculations()"
                                class="w-full bg-[#132247] border border-slate-700/80 rounded-lg px-3.5 py-2.5 text-white text-sm focus:outline-none focus:border-teal-400 font-mono"
                            >
                        </div>

                        <!-- Average Annual Salary -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">
                                Average Annual Salary (USD)
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-2.5 text-slate-400 text-sm">$</span>
                                <input 
                                    type="number" 
                                    step="1000" 
                                    x-model.number="salary" 
                                    @input="updateCalculations()"
                                    class="w-full bg-[#132247] border border-slate-700/80 rounded-lg pl-8 pr-3.5 py-2.5 text-white text-sm focus:outline-none focus:border-teal-400 font-mono"
                                >
                            </div>
                        </div>

                        <!-- Role Function -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">
                                Role Function
                            </label>
                            <select 
                                x-model="roleFunction" 
                                @change="updateRoleRate()"
                                class="w-full bg-[#132247] border border-slate-700/80 rounded-lg px-3 py-2.5 text-white text-sm focus:outline-none focus:border-teal-400"
                            >
                                <option value="support">Customer Support (BPO)</option>
                                <option value="engineering">Software &amp; Cloud Engineering</option>
                                <option value="payments">Payment &amp; Fraud Ops</option>
                                <option value="finance">Finance &amp; Accounting</option>
                            </select>
                        </div>

                        <!-- NileBridge Hourly Range -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">
                                NileBridge Hourly Range
                            </label>
                            <select 
                                x-model.number="hourlyRate" 
                                @change="updateCalculations()"
                                class="w-full bg-[#132247] border border-slate-700/80 rounded-lg px-3 py-2.5 text-white text-sm focus:outline-none focus:border-teal-400"
                            >
                                <option value="14">$12 - $16 / hr (Tier 1)</option>
                                <option value="18">$16 - $22 / hr (Tier 2)</option>
                                <option value="25">$22 - $32 / hr (Specialist)</option>
                            </select>
                        </div>

                        <!-- Benefits & Overhead % -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">
                                Benefits &amp; Overhead %
                            </label>
                            <select 
                                x-model.number="overheadPct" 
                                @change="updateCalculations()"
                                class="w-full bg-[#132247] border border-slate-700/80 rounded-lg px-3 py-2.5 text-white text-sm focus:outline-none focus:border-teal-400"
                            >
                                <option value="0.20">20% (Standard)</option>
                                <option value="0.25">25% (Average US Corp)</option>
                                <option value="0.30">30% (High Tier Tech)</option>
                            </select>
                        </div>

                        <!-- Onboarding Timeline -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">
                                Onboarding Timeline
                            </label>
                            <select class="w-full bg-[#132247] border border-slate-700/80 rounded-lg px-3 py-2.5 text-white text-sm focus:outline-none focus:border-teal-400">
                                <option>2 - 4 Weeks (Immediate Pod)</option>
                                <option>4 - 8 Weeks (Custom Division)</option>
                            </select>
                        </div>

                        <!-- Expected NileBridge Roles (Full Span) -->
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">
                                Expected NileBridge Roles
                            </label>
                            <input 
                                type="number" 
                                min="1" 
                                max="200" 
                                x-model.number="nileRoles" 
                                @input="updateCalculations()"
                                class="w-full bg-[#132247] border border-slate-700/80 rounded-lg px-3.5 py-2.5 text-white text-sm focus:outline-none focus:border-teal-400 font-mono"
                            >
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="mt-8">
                    <a 
                        href="#lead-capture" 
                        class="inline-flex items-center justify-center gap-2 bg-amber-400 hover:bg-amber-500 text-[#0B152F] font-bold px-6 py-3 rounded-lg text-sm transition-all shadow-md active:scale-95"
                    >
                        <span>Calculate ROI &rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Right Card: Clean White Output Card -->
            <div class="lg:col-span-5 bg-white p-6 sm:p-10 flex flex-col justify-between border-t lg:border-t-0 lg:border-l border-slate-200">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">
                        ESTIMATED ANNUAL SAVINGS
                    </span>

                    <div class="text-4xl sm:text-5xl font-black text-teal-600 tracking-tight mt-2" x-text="'$' + formatNumber(netSavings)">
                        $454,000
                    </div>

                    <p class="text-sm text-slate-600 mt-1 font-medium" x-text="'~' + savingsPercentage + '% lower than current onshore operations cost'">
                        ~56% lower than current onshore operations cost
                    </p>

                    <div class="mt-8 pt-6 border-t border-slate-100 space-y-4 text-sm">
                        <div class="flex justify-between items-center text-slate-600">
                            <span>Current Annual Cost</span>
                            <span class="font-bold text-[#0B152F] font-mono" x-text="'$' + formatNumber(currentCost)">$812,500</span>
                        </div>

                        <div class="flex justify-between items-center text-slate-600">
                            <span>Estimated NileBridge Cost</span>
                            <span class="font-bold text-[#0B152F] font-mono" x-text="'$' + formatNumber(nileCost)">$358,500</span>
                        </div>

                        <div class="flex justify-between items-center pt-3 border-t border-slate-100">
                            <span class="font-bold text-[#0B152F]">Net Annual Cost Savings</span>
                            <span class="font-extrabold text-teal-600 font-mono text-base" x-text="'$' + formatNumber(netSavings)">$454,000</span>
                        </div>

                        <div class="flex justify-between items-center text-slate-600">
                            <span>First-Year Net ROI</span>
                            <span class="font-bold text-teal-600 font-mono" x-text="'+' + roiPercentage + '%'">+127%</span>
                        </div>
                    </div>
                </div>

                <!-- Footnote -->
                <p class="text-xs text-slate-400 leading-relaxed mt-8 pt-6 border-t border-slate-100">
                    *Estimates include direct salary, fully managed workspace, equipment, local taxes, benefits, compliance, and ongoing management overhead. Schedule a consultation for a customized proposal.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
function roiCalculatorWidget() {
    return {
        headcount: 10,
        salary: 65000,
        overheadPct: 0.25,
        roleFunction: 'support',
        hourlyRate: 14,
        nileRoles: 10,
        currentCost: 812500,
        nileCost: 358500,
        netSavings: 454000,
        savingsPercentage: 56,
        roiPercentage: 127,

        init() {
            this.updateCalculations();
        },

        updateRoleRate() {
            if (this.roleFunction === 'support') this.hourlyRate = 14;
            else if (this.roleFunction === 'payments') this.hourlyRate = 18;
            else if (this.roleFunction === 'engineering') this.hourlyRate = 25;
            else if (this.roleFunction === 'finance') this.hourlyRate = 18;
            this.updateCalculations();
        },

        updateCalculations() {
            const h = Math.max(1, this.headcount || 1);
            const sal = Math.max(10000, this.salary || 65000);
            const ovh = Number(this.overheadPct) || 0.25;
            const nr = Math.max(1, this.nileRoles || 1);
            const hr = Number(this.hourlyRate) || 14;

            // Current cost = headcount * salary * (1 + overhead)
            this.currentCost = Math.round(h * sal * (1 + ovh));

            // NileBridge annual cost per role ~ 2080 hours * hr * 1.23 (workspace, management overhead, tech stack)
            // For $14/hr: 2080 * 14 * 1.23 = ~35,819 (~$35,850 for 1 role, $358,500 for 10)
            const annualNilePerRole = Math.round(2080 * hr * 1.231);
            this.nileCost = Math.round(nr * annualNilePerRole);

            this.netSavings = Math.max(0, this.currentCost - this.nileCost);
            this.savingsPercentage = Math.round((this.netSavings / this.currentCost) * 100);
            this.roiPercentage = this.nileCost > 0 ? Math.round((this.netSavings / this.nileCost) * 100) : 100;
        },

        formatNumber(num) {
            return Number(num).toLocaleString('en-US');
        }
    };
}
</script>
