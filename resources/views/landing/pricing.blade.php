<!-- Section 8: Pricing: Flexible Plans for Every Stage matching media_1789070132452.png -->
<section id="pricing" class="py-24 bg-white border-b border-slate-100 relative" x-data="{ annual: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-12 gap-6">
            <div>
                <div class="inline-flex items-center space-x-2 text-xs font-bold uppercase tracking-wider text-teal-600 mb-2">
                    <span class="w-4 h-0.5 bg-teal-500"></span>
                    <span>PRICING</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#0B152F] tracking-tight">
                    Flexible Plans for Every Stage
                </h2>
            </div>
            <p class="text-sm sm:text-base text-slate-500 max-w-md leading-relaxed font-normal">
                Transparent pricing. No hidden fees. Choose the plan that fits your business needs and scale on demand.
            </p>
        </div>

        <!-- Interactive Monthly / Annual Billing Toggle -->
        <div class="flex items-center justify-center gap-3 mb-14">
            <span class="text-sm font-semibold" :class="!annual ? 'text-[#0B152F]' : 'text-slate-400'">Monthly Billing</span>
            <button 
                type="button" 
                @click="annual = !annual"
                class="relative inline-flex h-6 w-12 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none bg-slate-200"
                :class="annual ? 'bg-teal-500' : 'bg-slate-300'"
                role="switch"
                :aria-checked="annual"
            >
                <span 
                    class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                    :class="annual ? 'translate-x-6' : 'translate-x-0'"
                ></span>
            </button>
            <span class="text-sm font-semibold flex items-center gap-1.5" :class="annual ? 'text-[#0B152F]' : 'text-slate-400'">
                <span>Annual Billing</span>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
                    Save 20%
                </span>
            </span>
        </div>

        <!-- 4 Pricing Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
            
            <!-- Card 1: Basic -->
            <div class="bg-white rounded-2xl p-8 border border-slate-200/80 hover:border-slate-300 transition-all duration-300 flex flex-col justify-between shadow-sm hover:shadow-lg">
                <div>
                    <h3 class="text-xl font-bold text-[#0B152F]">Basic</h3>
                    <p class="text-sm text-slate-500 mt-1">Perfect for small teams &amp; pilots</p>

                    <div class="mt-6 flex items-baseline gap-1">
                        <span class="text-3xl sm:text-4xl font-black text-[#0B152F]" x-text="annual ? '$239' : '$299'">$299</span>
                        <span class="text-xs text-slate-400">/month</span>
                    </div>

                    <ul class="mt-8 space-y-3.5 text-sm text-slate-600 font-medium">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Up to 3 team members</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Basic HR &amp; payroll support</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Standard email support</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Kampala facility access</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="#lead-capture" class="w-full inline-flex items-center justify-center py-3 px-4 rounded-full text-sm font-bold border border-slate-200 text-slate-700 hover:border-teal-500 hover:text-teal-600 hover:bg-slate-50 transition active:scale-95">
                        Get Started &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 2: Growth (Featured Teal Card) -->
            <div class="bg-gradient-to-b from-teal-600 to-teal-700 rounded-2xl p-8 text-white flex flex-col justify-between shadow-2xl shadow-teal-900/20 relative lg:-translate-y-2 border-2 border-teal-400">
                <!-- Popular Badge -->
                <div class="absolute -top-3.5 right-6 bg-[#0B152F] text-teal-300 text-xs font-extrabold uppercase px-3.5 py-1 rounded-full border border-teal-500/60 tracking-wider shadow-md">
                    Most Popular
                </div>

                <div>
                    <h3 class="text-xl font-bold text-white">Growth</h3>
                    <p class="text-sm text-teal-100 mt-1">Ideal for scaling companies</p>

                    <div class="mt-6 flex items-baseline gap-1">
                        <span class="text-3xl sm:text-4xl font-black text-white" x-text="annual ? '$639' : '$799'">$799</span>
                        <span class="text-xs text-teal-100">/month</span>
                    </div>

                    <ul class="mt-8 space-y-3.5 text-sm text-teal-50 font-medium">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-200 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Up to 10 team members</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-200 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Full HR &amp; compliant payroll</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-200 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Dedicated team lead oversight</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-200 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Priority 24/7 Slack support</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-8 pt-6 border-t border-teal-500/50">
                    <a href="#lead-capture" class="w-full inline-flex items-center justify-center py-3 px-4 rounded-full text-sm font-bold bg-white text-teal-800 hover:bg-teal-50 transition shadow-lg active:scale-95">
                        Get Started &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 3: Enterprise -->
            <div class="bg-white rounded-2xl p-8 border border-slate-200/80 hover:border-slate-300 transition-all duration-300 flex flex-col justify-between shadow-sm hover:shadow-lg">
                <div>
                    <h3 class="text-xl font-bold text-[#0B152F]">Enterprise</h3>
                    <p class="text-sm text-slate-500 mt-1">For multi-pod &amp; division scale</p>

                    <div class="mt-6 flex items-baseline gap-1">
                        <span class="text-3xl sm:text-4xl font-black text-[#0B152F]" x-text="annual ? '$1,599' : '$1,999'">$1,999</span>
                        <span class="text-xs text-slate-400">/month</span>
                    </div>

                    <ul class="mt-8 space-y-3.5 text-sm text-slate-600 font-medium">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-teal-500 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Unlimited team members</span>
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
                            <span>24/7 Follow-the-sun phone SLA</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="#lead-capture" class="w-full inline-flex items-center justify-center py-3 px-4 rounded-full text-sm font-bold border border-slate-200 text-slate-700 hover:border-teal-500 hover:text-teal-600 hover:bg-slate-50 transition active:scale-95">
                        Get Started &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 4: Custom -->
            <div class="bg-gradient-to-b from-amber-50/60 to-amber-50/20 rounded-2xl p-8 border border-amber-200/90 hover:border-amber-300 transition-all duration-300 flex flex-col justify-between shadow-sm hover:shadow-lg">
                <div>
                    <h3 class="text-xl font-bold text-amber-950">Custom</h3>
                    <p class="text-sm text-amber-700/90 mt-1">Tailored to your exact blueprint</p>

                    <div class="mt-6 flex items-baseline">
                        <span class="text-2xl sm:text-3xl font-black text-[#0B152F]">Let's Talk</span>
                    </div>

                    <ul class="mt-8 space-y-3.5 text-sm text-slate-700 font-medium">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-amber-600 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Custom team architecture</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-amber-600 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Advanced ERP &amp; API integrations</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-amber-600 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Dedicated private facility suite</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-amber-600 mr-2.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Custom governance &amp; audits</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-8 pt-6 border-t border-amber-200/70">
                    <a href="#lead-capture" class="w-full inline-flex items-center justify-center py-3 px-4 rounded-full text-sm font-bold bg-amber-400 hover:bg-amber-500 text-[#0B152F] transition shadow-md active:scale-95">
                        Contact Us &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
