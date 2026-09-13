@extends('layouts.app', ['title' => $title])

@section('content')
<div class="bg-white min-h-screen">
    
    <!-- Hero Header -->
    <header class="bg-[#0B152F] text-white pt-28 pb-16 lg:pb-20 border-b border-slate-800 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(#14b8a6_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6 font-mono">
                <a href="{{ route('home') }}" class="hover:text-teal-400 transition">Home</a>
                <span>/</span>
                <span class="text-slate-500">Resources</span>
                <span>/</span>
                <span class="text-teal-400 font-semibold">Case Studies</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-300 border border-teal-500/30 mb-5 font-mono">
                <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                <span>PROVEN ENTERPRISE IMPACT</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white max-w-4xl leading-[1.15]">
                Client Case Studies &amp; Verified Results
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-3xl mt-4 leading-relaxed font-normal">
                Discover how high-growth tech platforms, fintech unicorns, and global retailers leverage NileBridge to scale operational pods, slash response times, and realize up to 70% cost savings.
            </p>
        </div>
    </header>

    <!-- Case Studies Showcase Grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 lg:py-24">
        <div class="space-y-16">
            
            <!-- Case Study 1: Fintech -->
            <div class="rounded-3xl border border-slate-200 overflow-hidden bg-white shadow-sm hover:shadow-xl transition-all grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-4 bg-[#0B152F] p-8 sm:p-10 text-white flex flex-col justify-between">
                    <div>
                        <span class="text-[11px] font-mono font-bold text-teal-400 uppercase tracking-widest block mb-3">FINTECH &amp; PAYMENTS</span>
                        <h3 class="text-2xl font-bold tracking-tight mb-4">Apex Financial Cloud</h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                            Series-C global digital wallet and payments gateway processing $400M+ in annual volume across North America and Europe.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-800 space-y-4 font-mono">
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-teal-400">$1.42M</div>
                            <div class="text-xs text-slate-400">Contested Disputes Recovered</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-white">&lt; 2 Hours</div>
                            <div class="text-xs text-slate-400">Chargeback SLA (Down from 36h)</div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-8 p-8 sm:p-10 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div>
                            <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-400 mb-2">The Operational Challenge</h4>
                            <p class="text-sm text-slate-700 leading-relaxed">
                                Rapid transaction growth led to a surge in card-not-present fraud and dispute notices. Domestic risk analysts in San Francisco were overwhelmed, missing crucial 14-day representment windows and suffering high staff turnover.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-2">The NileBridge Solution</h4>
                            <p class="text-sm text-slate-700 leading-relaxed">
                                NileBridge deployed an 8-seat dedicated fraud and payment operations pod in Kampala within 14 business days. Operating 24/7 across two shifts, the team standardized dispute evidence compilation, integrated with Stripe and Sift, and conducted real-time velocity monitoring.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-400 mb-2">Verified Realized Results</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <span class="text-xs text-slate-500 block">Win Rate</span>
                                    <strong class="text-base text-[#0B152F] font-mono">79.2% (+31%)</strong>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <span class="text-xs text-slate-500 block">Annual Savings</span>
                                    <strong class="text-base text-teal-600 font-mono">$485,000</strong>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <span class="text-xs text-slate-500 block">Team Retention</span>
                                    <strong class="text-base text-[#0B152F] font-mono">100% (18 Mos)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Case Study 2: E-commerce -->
            <div class="rounded-3xl border border-slate-200 overflow-hidden bg-white shadow-sm hover:shadow-xl transition-all grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-4 bg-[#0B152F] p-8 sm:p-10 text-white flex flex-col justify-between">
                    <div>
                        <span class="text-[11px] font-mono font-bold text-teal-400 uppercase tracking-widest block mb-3">D2C &amp; E-COMMERCE</span>
                        <h3 class="text-2xl font-bold tracking-tight mb-4">Velox Lifestyle Retail</h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                            Fast-growing fashion apparel brand operating across Shopify Plus with over 150,000 monthly orders during holiday peak.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-800 space-y-4 font-mono">
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-teal-400">45 Agents</div>
                            <div class="text-xs text-slate-400">Ramped in Under 10 Days</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-white">98.4%</div>
                            <div class="text-xs text-slate-400">CSAT Maintained Throughout Q4</div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-8 p-8 sm:p-10 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div>
                            <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-400 mb-2">The Operational Challenge</h4>
                            <p class="text-sm text-slate-700 leading-relaxed">
                                Facing a 500% seasonal spike in customer inquiries for Black Friday and Christmas, Velox needed 40+ high-empathy English-fluent agents. Domestic temp agencies quoted exorbitant recruitment fees and required 6-month minimum commitments.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-2">The NileBridge Solution</h4>
                            <p class="text-sm text-slate-700 leading-relaxed">
                                NileBridge rapidly mobilized 45 pre-screened support specialists from its Kampala talent pool. Trained on Gorgias, Shopify Admin, and ShipBob, the team handled live chat, email inquiries, return authorizations, and pre-sales inquiries 24/7.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-400 mb-2">Verified Realized Results</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <span class="text-xs text-slate-500 block">First Response</span>
                                    <strong class="text-base text-[#0B152F] font-mono">&lt; 38 Seconds</strong>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <span class="text-xs text-slate-500 block">Peak Savings</span>
                                    <strong class="text-base text-teal-600 font-mono">72% vs US Agencies</strong>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <span class="text-xs text-slate-500 block">RMA Accuracy</span>
                                    <strong class="text-base text-[#0B152F] font-mono">99.8%</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Case Study 3: B2B SaaS -->
            <div class="rounded-3xl border border-slate-200 overflow-hidden bg-white shadow-sm hover:shadow-xl transition-all grid grid-cols-1 lg:grid-cols-12">
                <div class="lg:col-span-4 bg-[#0B152F] p-8 sm:p-10 text-white flex flex-col justify-between">
                    <div>
                        <span class="text-[11px] font-mono font-bold text-teal-400 uppercase tracking-widest block mb-3">ENTERPRISE SAAS</span>
                        <h3 class="text-2xl font-bold tracking-tight mb-4">CloudStack Platform</h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                            B2B developer infrastructure tool serving 10,000+ software engineers across US, UK, and Australian timezones.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-800 space-y-4 font-mono">
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-teal-400">+25%</div>
                            <div class="text-xs text-slate-400">Reclaimed Dev Engineering Time</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-extrabold text-white">48 Seconds</div>
                            <div class="text-xs text-slate-400">Response Time (Down from 4.2h)</div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-8 p-8 sm:p-10 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div>
                            <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-400 mb-2">The Operational Challenge</h4>
                            <p class="text-sm text-slate-700 leading-relaxed">
                                Core engineering team members were constantly interrupted to resolve basic webhook questions, API authorization bugs, and user permissions, dragging down core product roadmap velocity.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 mb-2">The NileBridge Solution</h4>
                            <p class="text-sm text-slate-700 leading-relaxed">
                                NileBridge sourced a pod of 6 university computer science graduates in Kampala. Following a 7-day technical onboarding curriculum, the pod took over all L1/L2 Jira tickets, documentation updates, and 24/7 uptime monitoring.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-400 mb-2">Verified Realized Results</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <span class="text-xs text-slate-500 block">First-Contact Fix</span>
                                    <strong class="text-base text-[#0B152F] font-mono">88.5%</strong>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <span class="text-xs text-slate-500 block">Annual Run Rate</span>
                                    <strong class="text-base text-teal-600 font-mono">-$340,000 / Yr</strong>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                                    <span class="text-xs text-slate-500 block">CSAT Rating</span>
                                    <strong class="text-base text-[#0B152F] font-mono">99.1%</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    @include('landing.footer')
</div>
@endsection

