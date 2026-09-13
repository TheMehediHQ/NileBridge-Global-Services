<!-- ROI & Savings Calculator -->
<section id="calculator" class="py-20 sm:py-28 lg:py-32 bg-white border-b border-slate-100" x-data="roiCalculatorWidget()">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 sm:mb-16 gap-6">
            <div>
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-teal-600 mb-3">
                    <span class="w-2 h-0.5 bg-teal-500"></span>
                    <span>ROI &amp; SAVINGS CALCULATOR</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0B152F] tracking-tight leading-[1.15]">
                    NileBridger ROI &amp; Savings Calculator
                </h2>
                <p class="text-slate-500 text-sm sm:text-base mt-2">
                    Calculate your potential cost reduction and operational efficiency by partnering with NileBridger.
                </p>
                <p class="text-xs text-slate-400 font-medium mt-1">
                    Calculate Your Realized Annual Cost Savings &bull; Calculate Realized Annual Cost Savings
                </p>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Live Interactive Model
                </span>
            </div>
        </div>

        <!-- Main 2-Tone Calculator Container -->
        <div class="rounded-2xl border border-slate-200 overflow-hidden shadow-xl grid grid-cols-1 lg:grid-cols-12 bg-white">
            
            <!-- Left Console: Dark Navy Input Panel (Current Operations) -->
            <div class="lg:col-span-6 bg-[#0B152F] p-6 sm:p-8 lg:p-10 text-white flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between pb-4 border-b border-slate-800 mb-6">
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold text-white tracking-tight">Current Operations</h3>
                            <p class="text-slate-400 text-xs sm:text-sm mt-0.5">Input your current team numbers and volumes</p>
                        </div>
                        <div class="w-8 h-8 rounded-lg bg-teal-500/10 border border-teal-500/20 text-teal-400 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <!-- 1. Current Number of Employees -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="calc-employees" class="text-xs font-bold uppercase tracking-wider text-slate-300 font-mono">
                                    Current Number of Employees
                                </label>
                                <span class="text-xs text-teal-400 font-mono font-semibold" x-text="employees + ' Staff'">10 Staff</span>
                            </div>
                            <div class="relative">
                                <input 
                                    id="calc-employees"
                                    type="number" 
                                    min="1" 
                                    max="1000"
                                    x-model.number="employees" 
                                    @input="calculateROI()"
                                    class="w-full bg-[#132247] border border-slate-700/80 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-teal-400 font-mono transition"
                                    placeholder="10"
                                >
                                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-slate-400 text-xs font-mono">
                                    FTEs
                                </div>
                            </div>
                        </div>

                        <!-- 2. Fully Loaded Monthly Cost / Employee ($) -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="calc-loadedCost" class="text-xs font-bold uppercase tracking-wider text-slate-300 font-mono">
                                    Fully Loaded Monthly Cost / Employee ($)
                                </label>
                                <span class="text-xs text-slate-400 font-mono">Salary + Benefits + Tax</span>
                            </div>
                            <div class="relative">
                                <span class="absolute left-3.5 top-3 text-slate-400 text-sm font-mono">$</span>
                                <input 
                                    id="calc-loadedCost"
                                    type="number" 
                                    min="0" 
                                    step="100"
                                    x-model.number="loadedCost" 
                                    @input="calculateROI()"
                                    class="w-full bg-[#132247] border border-slate-700/80 rounded-xl pl-8 pr-16 py-3 text-white text-sm focus:outline-none focus:border-teal-400 font-mono transition"
                                    placeholder="4500"
                                >
                                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-slate-400 text-xs font-mono">
                                    /mo
                                </div>
                            </div>
                        </div>

                        <!-- 3. Monthly Transactions / Support Tickets -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="calc-volume" class="text-xs font-bold uppercase tracking-wider text-slate-300 font-mono">
                                    Monthly Transactions / Support Tickets
                                </label>
                                <span class="text-xs text-slate-400 font-mono">Volume</span>
                            </div>
                            <div class="relative">
                                <input 
                                    id="calc-volume"
                                    type="number" 
                                    min="1" 
                                    step="500"
                                    x-model.number="volume" 
                                    @input="calculateROI()"
                                    class="w-full bg-[#132247] border border-slate-700/80 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-teal-400 font-mono transition"
                                    placeholder="25000"
                                >
                                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-slate-400 text-xs font-mono">
                                    Units/mo
                                </div>
                            </div>
                        </div>

                        <!-- 4. NileBridger Cost / FTE ($/month) -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="calc-nileCost" class="text-xs font-bold uppercase tracking-wider text-teal-300 font-mono">
                                    NileBridger Cost / FTE ($/month)
                                </label>
                                <span class="text-xs text-teal-400/90 font-mono">Managed Rate</span>
                            </div>
                            <div class="relative">
                                <span class="absolute left-3.5 top-3 text-teal-400 text-sm font-mono">$</span>
                                <input 
                                    id="calc-nileCost"
                                    type="number" 
                                    min="0" 
                                    step="50"
                                    x-model.number="nileCost" 
                                    @input="calculateROI()"
                                    class="w-full bg-[#132247] border border-teal-500/50 rounded-xl pl-8 pr-16 py-3 text-white text-sm focus:outline-none focus:border-teal-400 font-mono transition shadow-inner"
                                    placeholder="1200"
                                >
                                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-teal-400/80 text-xs font-mono">
                                    /mo
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action CTA -->
                <div class="mt-8 pt-6 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-xs text-slate-400">
                        Need custom volume or a dedicated pod?
                    </div>
                    <a 
                        href="#lead-capture" 
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-teal-400 to-teal-500 hover:from-teal-300 hover:to-teal-400 text-[#0B152F] font-bold px-6 py-3 rounded-xl text-sm transition-all shadow-md active:scale-95 whitespace-nowrap"
                    >
                        <span>Lock In These Savings &rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Right Console: Output Card & Metrics Grid (Estimated Savings) -->
            <div class="lg:col-span-6 bg-slate-50/70 p-6 sm:p-8 lg:p-10 flex flex-col justify-between border-t lg:border-t-0 lg:border-l border-slate-200">
                <div>
                    <div class="flex items-center justify-between pb-4 border-b border-slate-200 mb-6">
                        <h3 class="text-lg sm:text-xl font-bold text-[#0B152F] tracking-tight">Estimated Savings</h3>
                        <span class="text-xs font-mono font-semibold text-slate-500 uppercase tracking-wider">Annualized &bull; Realized</span>
                    </div>

                    <!-- Highlight Card: Potential Annual Savings -->
                    <div class="bg-[#1e293b] text-white rounded-2xl p-6 sm:p-7 shadow-lg border border-slate-800 text-center relative overflow-hidden">
                        <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl pointer-events-none"></div>
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-400 font-mono">
                            Potential Annual Savings
                        </div>
                        <div class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#10b981] font-mono tracking-tight my-2" x-text="formatCurrency(annualSavings)">
                            $396,000
                        </div>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs sm:text-sm font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                            <span x-text="savingsPercentage + '% Lower Operating Cost'">73% Lower Operating Cost</span>
                        </div>
                    </div>

                    <!-- 2x2 Metrics Grid -->
                    <div class="grid grid-cols-2 gap-3.5 mt-5">
                        <!-- Current Annual Cost -->
                        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm text-center">
                            <div class="text-xs text-slate-500 font-medium">Current Annual Cost</div>
                            <div class="text-base sm:text-lg font-bold text-slate-800 font-mono mt-1" x-text="formatCurrency(currentAnnualCost)">
                                $540,000
                            </div>
                        </div>

                        <!-- NileBridger Annual Cost -->
                        <div class="bg-white p-4 rounded-xl border border-teal-200/80 bg-teal-50/40 shadow-sm text-center">
                            <div class="text-xs text-teal-700 font-medium">NileBridger Annual Cost</div>
                            <div class="text-base sm:text-lg font-bold text-teal-700 font-mono mt-1" x-text="formatCurrency(nileAnnualCost)">
                                $144,000
                            </div>
                        </div>

                        <!-- Current Cost/Ticket -->
                        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm text-center">
                            <div class="text-xs text-slate-500 font-medium">Current Cost / Ticket</div>
                            <div class="text-base sm:text-lg font-bold text-slate-800 font-mono mt-1" x-text="'$' + currentCostPerTicket">
                                $1.80
                            </div>
                        </div>

                        <!-- NileBridger Cost/Ticket -->
                        <div class="bg-white p-4 rounded-xl border border-emerald-200/80 bg-emerald-50/40 shadow-sm text-center">
                            <div class="text-xs text-emerald-700 font-medium">NileBridger Cost / Ticket</div>
                            <div class="text-base sm:text-lg font-bold text-emerald-700 font-mono mt-1" x-text="'$' + nileCostPerTicket">
                                $0.48
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footnote / Unit Delta -->
                <div class="mt-6 pt-4 border-t border-slate-200 flex items-center justify-between text-xs text-slate-500">
                    <span class="flex items-center gap-1">
                        <span class="text-teal-600 font-bold font-mono" x-text="'~' + ticketSavingsPct + '%'">~73%</span> unit cost reduction per ticket
                    </span>
                    <span class="font-mono text-slate-400">Zero CapEx Required</span>
                </div>
            </div>

        </div>

        <!-- Scalability Guarantee Notice (Client-Requested) -->
        <div class="mt-6 p-4 sm:p-5 bg-gradient-to-r from-blue-50 via-teal-50/40 to-slate-50 border-l-4 border-blue-600 rounded-xl shadow-sm flex items-start sm:items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
            <div class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                <strong class="text-blue-900 font-bold">Scalability Guarantee:</strong> NileBridger can scale from a 5-seat pilot to a 100+ seat operation without requiring you to build additional internal infrastructure.
            </div>
        </div>

    </div>
</section>

<script>
function roiCalculatorWidget() {
    return {
        employees: 10,
        loadedCost: 4500,
        volume: 25000,
        nileCost: 1200,

        currentAnnualCost: 540000,
        nileAnnualCost: 144000,
        annualSavings: 396000,
        savingsPercentage: 73,
        currentCostPerTicket: '1.80',
        nileCostPerTicket: '0.48',
        ticketSavingsPct: 73,

        init() {
            this.calculateROI();
        },

        calculateROI() {
            const employees = parseFloat(this.employees) || 0;
            const loadedCost = parseFloat(this.loadedCost) || 0;
            const volume = parseFloat(this.volume) || 1; // avoid divide by zero
            const nileCostPerFTE = parseFloat(this.nileCost) || 0;

            const currentMonthlyCost = employees * loadedCost;
            this.currentAnnualCost = Math.round(currentMonthlyCost * 12);

            const nileMonthlyCost = employees * nileCostPerFTE;
            this.nileAnnualCost = Math.round(nileMonthlyCost * 12);

            this.annualSavings = Math.max(0, this.currentAnnualCost - this.nileAnnualCost);
            this.savingsPercentage = this.currentAnnualCost > 0 
                ? Math.round((this.annualSavings / this.currentAnnualCost) * 100) 
                : 0;

            const currentTicket = volume > 0 ? (currentMonthlyCost / volume) : 0;
            const nileTicket = volume > 0 ? (nileMonthlyCost / volume) : 0;

            this.currentCostPerTicket = currentTicket.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            this.nileCostPerTicket = nileTicket.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            this.ticketSavingsPct = currentTicket > 0 
                ? Math.round(((currentTicket - nileTicket) / currentTicket) * 100) 
                : 0;
        },

        formatCurrency(val) {
            return '$' + Number(val || 0).toLocaleString('en-US', { maximumFractionDigits: 0 });
        }
    };
}
</script>
