<!-- Section 8: Pricing & Engagement Models -->
<section id="pricing" class="py-20 sm:py-28 lg:py-32 bg-white border-b border-slate-100 relative" x-data="{ annual: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header (Editorial Alignment) -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-12 sm:mb-14 gap-8">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 text-[11px] font-mono font-bold uppercase tracking-[0.16em] text-teal-700 mb-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                    <span>TRANSPARENT ENGAGEMENT</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-extrabold text-[#0B152F] tracking-[-0.025em] leading-[1.12]">
                    Flexible Plans for Every Stage
                </h2>
            </div>
            <p class="text-base sm:text-lg text-slate-600 max-w-md leading-relaxed font-normal">
                Predictable cost models. No hidden operational surprises. Scale team capacity up or down with 30 days notice.
            </p>
        </div>

        <!-- Interactive Monthly / Annual Billing Switcher -->
        <div class="flex items-center justify-center gap-4 mb-16 select-none">
            <button 
                type="button"
                @click="annual = false"
                class="text-sm font-bold transition-all duration-200 cursor-pointer px-3 py-1.5 rounded-lg focus:outline-none"
                :class="!annual ? 'text-[#0B152F] bg-slate-100 shadow-xs' : 'text-slate-400 hover:text-slate-700'">
                Monthly Billing
            </button>
            
            <button 
                type="button" 
                @click="annual = !annual"
                class="relative inline-flex h-7 w-12 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-teal-500/30"
                :class="annual ? 'bg-teal-600' : 'bg-slate-300'"
                role="switch"
                :aria-checked="annual"
                aria-label="Toggle Annual Billing"
            >
                <span 
                    class="pointer-events-none inline-block h-6 w-6 transform rounded-full bg-white shadow-sm ring-0 transition duration-200 ease-in-out"
                    :class="annual ? 'translate-x-5' : 'translate-x-0'"
                ></span>
            </button>

            <button 
                type="button"
                @click="annual = true"
                class="text-sm font-bold flex items-center gap-2 transition-all duration-200 cursor-pointer px-3 py-1.5 rounded-lg focus:outline-none"
                :class="annual ? 'text-[#0B152F] bg-teal-50/70 shadow-xs' : 'text-slate-400 hover:text-slate-700'">
                <span>Annual Commitment</span>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold transition"
                      :class="annual ? 'bg-teal-500 text-white shadow-xs' : 'bg-teal-50 text-teal-700 border border-teal-200/80'">
                    Save 20%
                </span>
            </button>
        </div>

        <!-- 4 Refined Architectural Pricing Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-7 items-stretch">
            
            <!-- Card 1: Basic -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/90 hover:border-slate-300 hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400 font-mono">TIER 01</span>
                    <h3 class="text-2xl font-bold text-[#0B152F] mt-1">Basic</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Foundational remote pods &amp; pilots</p>

                    <div class="mt-6 flex items-baseline gap-1">
                        <span class="text-4xl font-extrabold text-[#0B152F] tracking-tight font-mono" x-text="annual ? '$239' : '$299'">$299</span>
                        <span class="text-xs text-slate-400 font-medium" x-text="annual ? '/mo (billed annually)' : '/month'">/month</span>
                    </div>

                    <ul class="mt-8 space-y-3 text-xs sm:text-sm text-slate-600 font-medium">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Up to 3 team members</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Core HR &amp; payroll compliance</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Standard SLA ticketing support</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Kampala facility hub access</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="#lead-capture" class="w-full inline-flex items-center justify-center py-3 px-4 rounded-full text-xs sm:text-sm font-bold border border-slate-200 text-slate-700 hover:border-teal-500 hover:text-teal-600 hover:bg-slate-50 transition active:scale-95">
                        Get Started &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 2: Growth (Recommended / Featured with Sophisticated Teal Treatment) -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 border-2 border-teal-500 shadow-xl shadow-teal-500/10 flex flex-col justify-between relative lg:-translate-y-2">
                <!-- Recommended Tag -->
                <div class="absolute -top-3.5 right-6 bg-teal-600 text-white text-[10px] font-extrabold uppercase px-3 py-1 rounded-full tracking-widest shadow-sm">
                    MOST POPULAR
                </div>

                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-teal-600 font-mono">TIER 02</span>
                    <h3 class="text-2xl font-bold text-[#0B152F] mt-1">Growth</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Ideal for scaling teams &amp; operations</p>

                    <div class="mt-6 flex items-baseline gap-1">
                        <span class="text-4xl font-extrabold text-teal-600 tracking-tight font-mono" x-text="annual ? '$639' : '$799'">$799</span>
                        <span class="text-xs text-slate-400 font-medium" x-text="annual ? '/mo (billed annually)' : '/month'">/month</span>
                    </div>

                    <ul class="mt-8 space-y-3 text-xs sm:text-sm text-slate-700 font-medium">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Up to 10 team members</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Full HR, benefits &amp; payroll</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Dedicated operations team lead</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Priority Slack channel &amp; 1h SLA</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="#lead-capture" class="w-full inline-flex items-center justify-center py-3 px-4 rounded-full text-xs sm:text-sm font-bold bg-teal-500 hover:bg-teal-600 text-white shadow-md shadow-teal-500/25 transition active:scale-95">
                        Start Hiring &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 3: Enterprise -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/90 hover:border-slate-300 hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400 font-mono">TIER 03</span>
                    <h3 class="text-2xl font-bold text-[#0B152F] mt-1">Enterprise</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Multi-pod scale &amp; full department BPO</p>

                    <div class="mt-6 flex items-baseline gap-1">
                        <span class="text-4xl font-extrabold text-[#0B152F] tracking-tight font-mono" x-text="annual ? '$1,599' : '$1,999'">$1,999</span>
                        <span class="text-xs text-slate-400 font-medium" x-text="annual ? '/mo (billed annually)' : '/month'">/month</span>
                    </div>

                    <ul class="mt-8 space-y-3 text-xs sm:text-sm text-slate-600 font-medium">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Unlimited scalable headcount</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Dedicated Account Executive</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Custom security suites &amp; MDM</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>24/7 Follow-the-sun phone hotline</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="#lead-capture" class="w-full inline-flex items-center justify-center py-3 px-4 rounded-full text-xs sm:text-sm font-bold border border-slate-200 text-slate-700 hover:border-teal-500 hover:text-teal-600 hover:bg-slate-50 transition active:scale-95">
                        Get Started &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 4: Custom (Restrained Gold Accent) -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-amber-300/80 hover:border-amber-400 hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-amber-700 font-mono">CUSTOM</span>
                    <h3 class="text-2xl font-bold text-[#0B152F] mt-1">Bespoke</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Tailored enterprise operational blueprint</p>

                    <div class="mt-6 flex items-baseline">
                        <span class="text-3xl font-extrabold text-[#0B152F] tracking-tight">Let's Talk</span>
                    </div>

                    <ul class="mt-8 space-y-3 text-xs sm:text-sm text-slate-700 font-medium">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-amber-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Bespoke talent architecture</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-amber-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>ERP &amp; internal tooling integration</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-amber-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Dedicated private facility suite</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-amber-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Custom compliance &amp; legal SLAs</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="#lead-capture" class="w-full inline-flex items-center justify-center py-3 px-4 rounded-full text-xs sm:text-sm font-bold bg-amber-400 hover:bg-amber-500 text-[#0B152F] transition shadow-xs active:scale-95">
                        Schedule Call &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
