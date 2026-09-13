@extends('layouts.app', ['title' => $service['meta_title']])

@section('content')
<div class="bg-white min-h-screen">
    
    <!-- 1. Hero Section -->
    <header class="bg-[#0B152F] text-white pt-28 pb-16 lg:pb-24 border-b border-slate-800 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(#14b8a6_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6 font-mono">
                <a href="{{ route('home') }}" class="hover:text-teal-400 transition">Home</a>
                <span>/</span>
                <a href="{{ route('home') }}#services" class="text-slate-400 hover:text-teal-400 transition">Services</a>
                <span>/</span>
                <span class="text-teal-400 font-semibold">{{ $service['title'] }}</span>
            </nav>

            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-300 border border-teal-500/30 mb-5 font-mono">
                <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                <span>{{ $service['badge'] }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
                <div class="lg:col-span-8">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.15]">
                        {{ $service['title'] }}
                    </h1>
                    <p class="text-lg sm:text-xl text-teal-300 font-medium mt-4 leading-snug">
                        {{ $service['tagline'] }}
                    </p>
                    <p class="text-slate-300 text-sm sm:text-base max-w-3xl mt-4 leading-relaxed font-normal">
                        {{ $service['description'] }}
                    </p>

                    <!-- CTAs -->
                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <a href="#service-lead-form" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-teal-400 to-teal-500 hover:from-teal-300 hover:to-teal-400 text-[#0B152F] font-bold px-7 py-3.5 rounded-xl text-sm transition-all shadow-lg active:scale-95">
                            <span>Request Dedicated Pod &rarr;</span>
                        </a>
                        <a href="{{ route('home') }}#calculator" class="inline-flex items-center justify-center gap-2 bg-[#132247] hover:bg-[#1a2d5e] border border-slate-700 text-white font-semibold px-6 py-3.5 rounded-xl text-sm transition-all active:scale-95">
                            <span>Calculate Cost Savings</span>
                        </a>
                    </div>
                </div>

                <!-- Right Quick Spec Card -->
                <div class="lg:col-span-4">
                    <div class="bg-gradient-to-br from-[#132247] to-[#0d1838] border border-slate-700/80 rounded-2xl p-6 shadow-xl relative overflow-hidden">
                        <div class="text-xs font-mono font-bold uppercase tracking-wider text-teal-400 mb-3">
                            Delivery Pod Snapshot
                        </div>
                        <div class="space-y-3.5 text-xs text-slate-300 font-mono">
                            <div class="flex items-center justify-between pb-2 border-b border-slate-800">
                                <span class="text-slate-400">Hub Location</span>
                                <span class="font-bold text-white">Kampala, Uganda</span>
                            </div>
                            <div class="flex items-center justify-between pb-2 border-b border-slate-800">
                                <span class="text-slate-400">Turnaround SLA</span>
                                <span class="font-bold text-teal-400">10 – 14 Business Days</span>
                            </div>
                            <div class="flex items-center justify-between pb-2 border-b border-slate-800">
                                <span class="text-slate-400">Shift Coverage</span>
                                <span class="font-bold text-white">24/7 / US &amp; UK Time</span>
                            </div>
                            <div class="flex items-center justify-between pb-2 border-b border-slate-800">
                                <span class="text-slate-400">Min. Pod Size</span>
                                <span class="font-bold text-white">2 – 4 Seat Pilot</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400">Legal Governance</span>
                                <span class="font-bold text-teal-300">100% EOR Compliant</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-800/80 text-[11px] text-slate-400 leading-normal">
                            Includes fully managed hardware, biometric facility access, payroll tax withholding, and local oversight.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metrics Bar -->
            <div class="mt-12 pt-8 border-t border-slate-800/80 grid grid-cols-2 sm:grid-cols-4 gap-6">
                @foreach($service['metrics'] as $metric)
                    <div class="text-center sm:text-left">
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-teal-400 font-mono">
                            {{ $metric['value'] }}
                        </div>
                        <div class="text-xs sm:text-sm text-slate-400 mt-1 font-medium">
                            {{ $metric['label'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </header>

    <!-- 2. Core Capabilities & Deliverables Grid -->
    <section class="py-16 sm:py-20 lg:py-24 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-12 sm:mb-16">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-teal-600 mb-3 font-mono">
                    <span class="w-2 h-0.5 bg-teal-500"></span>
                    <span>CORE CAPABILITIES</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0B152F] tracking-tight">
                    What Your Dedicated Team Delivers
                </h2>
                <p class="text-slate-500 text-sm sm:text-base mt-2">
                    Customized operational workflows configured to match your standard operating procedures (SOPs).
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($service['capabilities'] as $cap)
                    <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-teal-500/50 hover:bg-white hover:shadow-lg transition-all group flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-xl bg-teal-500/10 border border-teal-500/20 text-teal-600 flex items-center justify-center font-bold text-sm mb-5 group-hover:bg-teal-500 group-hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h3 class="text-base sm:text-lg font-bold text-[#0B152F] group-hover:text-teal-600 transition tracking-tight mb-2">
                                {{ $cap['title'] }}
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                {{ $cap['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 3. Supported Tooling & Technology Stack -->
    <section class="py-12 sm:py-16 bg-slate-50 border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="text-xs font-mono font-bold uppercase tracking-wider text-slate-400 mb-2">
                Supported Software &amp; Ecosystem Integration
            </div>
            <h3 class="text-xl sm:text-2xl font-bold text-[#0B152F] tracking-tight mb-6">
                Plug Directly Into Your Existing Infrastructure
            </h3>
            <p class="text-xs sm:text-sm text-slate-500 max-w-2xl mx-auto mb-8">
                Our talent trains on your enterprise platforms before day one. No cumbersome migrations or custom integrations required.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-3 max-w-4xl mx-auto">
                @foreach($service['tech_stack'] as $tool)
                    <span class="inline-flex items-center px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold bg-white border border-slate-200 text-[#0B152F] shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-teal-500 mr-2"></span>
                        {{ $tool }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4. Sample Dedicated Roles & Transparent Pricing -->
    <section class="py-16 sm:py-20 lg:py-24 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 sm:mb-16 gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-teal-600 mb-3 font-mono">
                        <span class="w-2 h-0.5 bg-teal-500"></span>
                        <span>TRANSPARENT TALENT PRICING</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0B152F] tracking-tight">
                        Sample Roles You Can Deploy
                    </h2>
                    <p class="text-slate-500 text-sm sm:text-base mt-2">
                        All rates are fully loaded—including direct salary, workspace, managed workstation, benefits, and local taxes.
                    </p>
                </div>
                <div class="flex items-center gap-2 text-xs font-mono text-slate-500 bg-slate-50 border border-slate-200 px-4 py-2 rounded-xl">
                    <span class="text-teal-600 font-bold">Zero Hidden Fees</span> &bull; Cancel Anytime (30d Notice)
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($service['sample_roles'] as $role)
                    <div class="p-6 sm:p-8 rounded-2xl bg-white border border-slate-200 shadow-sm hover:shadow-xl hover:border-teal-500/50 transition-all flex flex-col justify-between relative overflow-hidden">
                        <div>
                            <div class="text-xs font-mono font-semibold text-teal-700 bg-teal-50 border border-teal-100 px-3 py-1 rounded-full inline-block mb-4">
                                Experience: {{ $role['experience'] }}
                            </div>
                            <h3 class="text-lg font-bold text-[#0B152F] tracking-tight mb-2">
                                {{ $role['role'] }}
                            </h3>
                            <div class="my-4 py-3 border-y border-slate-100">
                                <div class="text-2xl sm:text-3xl font-extrabold text-teal-600 font-mono">
                                    {{ $role['monthly_estimate'] }}
                                </div>
                                <div class="text-xs text-slate-400 font-mono mt-0.5">
                                    {{ $role['hourly_rate'] }} (Fully Loaded FTE)
                                </div>
                            </div>
                            <div class="space-y-2 mb-6">
                                <div class="text-xs font-mono text-slate-400 uppercase tracking-wider">Target Skills</div>
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach($role['skills'] as $skill)
                                        <span class="text-[11px] font-medium bg-slate-100 text-slate-700 px-2.5 py-1 rounded-md">
                                            {{ $skill }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <a href="#service-lead-form" class="w-full inline-flex items-center justify-center py-2.5 px-4 rounded-xl text-xs font-bold text-[#0B152F] bg-slate-100 hover:bg-teal-500 hover:text-white transition">
                            Deploy This Role &rarr;
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Compliance Guarantee Callout -->
            <div class="mt-8 p-4 sm:p-5 bg-gradient-to-r from-blue-50 to-teal-50/60 border-l-4 border-blue-600 rounded-xl flex items-start sm:items-center gap-4">
                <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div class="text-xs sm:text-sm text-slate-700">
                    <strong class="text-blue-950 font-bold">Enterprise Security &amp; Compliance:</strong> {{ $service['compliance_note'] }}
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Dedicated Lead Capture Requisition Form -->
    <section id="service-lead-form" class="py-16 sm:py-20 lg:py-24 bg-[#0B152F] text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(#14b8a6_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="text-center mb-10 sm:mb-12">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-teal-400 mb-3 font-mono">
                    <span class="w-2 h-0.5 bg-teal-400"></span>
                    <span>INITIATE REQUISITION</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Deploy Your {{ $service['title'] }} Pod
                </h2>
                <p class="text-slate-300 text-sm sm:text-base mt-2 max-w-xl mx-auto">
                    Tell us your team requirements and target timeline. We will review and provide matched talent profiles within 24 hours.
                </p>
            </div>

            <!-- Form Container -->
            <div class="bg-[#132247]/90 backdrop-blur-md rounded-2xl border border-slate-700/80 p-6 sm:p-8 lg:p-10 shadow-2xl">
                <form action="{{ route('leads.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Pre-selected Hidden Service Category -->
                    <input type="hidden" name="service_category" value="{{ $service['lead_category'] }}">

                    <!-- Honeypot anti-spam -->
                    <div class="hidden">
                        <label for="service_website_url">Website</label>
                        <input type="text" id="service_website_url" name="website_url" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- Company Name -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 font-mono mb-1.5">
                                Company Name *
                            </label>
                            <input 
                                type="text" 
                                name="company_name" 
                                required 
                                placeholder="Acme Global Inc." 
                                class="w-full bg-[#0B152F] border border-slate-700 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-teal-400"
                            >
                        </div>

                        <!-- Contact Name -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 font-mono mb-1.5">
                                Contact Name *
                            </label>
                            <input 
                                type="text" 
                                name="contact_name" 
                                required 
                                placeholder="Sarah Jenkins" 
                                class="w-full bg-[#0B152F] border border-slate-700 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-teal-400"
                            >
                        </div>

                        <!-- Corporate Email -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 font-mono mb-1.5">
                                Corporate Email Address *
                            </label>
                            <input 
                                type="email" 
                                name="contact_email" 
                                required 
                                placeholder="sarah@acmeglobal.com" 
                                class="w-full bg-[#0B152F] border border-slate-700 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-teal-400"
                            >
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 font-mono mb-1.5">
                                Phone Number
                            </label>
                            <input 
                                type="tel" 
                                name="contact_phone" 
                                placeholder="+1 (555) 019-2834" 
                                class="w-full bg-[#0B152F] border border-slate-700 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-teal-400"
                            >
                        </div>

                        <!-- Target Team Size -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 font-mono mb-1.5">
                                Target Pod Size (FTEs) *
                            </label>
                            <select 
                                name="team_size_needed" 
                                required
                                class="w-full bg-[#0B152F] border border-slate-700 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-teal-400"
                            >
                                <option value="1">1 - 2 Staff (Pilot Pod)</option>
                                <option value="3" selected>3 - 5 Staff (Standard Pod)</option>
                                <option value="10">6 - 15 Staff (Scaling Division)</option>
                                <option value="25">16 - 50+ Staff (Enterprise Migration)</option>
                            </select>
                        </div>

                        <!-- Target Monthly Budget -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 font-mono mb-1.5">
                                Estimated Monthly Budget (USD)
                            </label>
                            <input 
                                type="number" 
                                name="estimated_budget" 
                                placeholder="5000" 
                                step="500"
                                class="w-full bg-[#0B152F] border border-slate-700 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-teal-400"
                            >
                        </div>
                    </div>

                    <!-- Workflow Notes -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 font-mono mb-1.5">
                            Brief Workflow Description or Specific Role Requirements
                        </label>
                        <textarea 
                            name="message" 
                            rows="3" 
                            placeholder="Describe your current volume, target shift hours, or tools you want the team to operate..."
                            class="w-full bg-[#0B152F] border border-slate-700 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-teal-400"
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-teal-400 to-teal-500 hover:from-teal-300 hover:to-teal-400 text-[#0B152F] font-bold py-4 px-6 rounded-xl text-sm sm:text-base transition shadow-xl active:scale-[0.99] flex items-center justify-center gap-2"
                        >
                            <span>Dispatch {{ $service['title'] }} Requisition</span>
                            <span class="font-mono">&rarr;</span>
                        </button>
                        <p class="text-[11px] text-slate-400 text-center mt-3 font-mono">
                            Protected by strict mutual NDA &bull; 24h Placement SLA Active &bull; Zero Upfront Setup Fees
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- 6. Explore Other Services -->
    <section class="py-16 sm:py-20 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <h3 class="text-2xl font-bold text-[#0B152F] tracking-tight">
                    Explore Related NileBridge Capabilities
                </h3>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">
                    Multi-disciplinary talent pods working under unified Ugandan operational governance.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($otherServices as $other)
                    <a href="{{ route('services.show', $other['slug']) }}" class="p-6 rounded-2xl bg-slate-50 border border-slate-200 hover:border-teal-500 hover:bg-white hover:shadow-lg transition-all group block">
                        <div class="text-[11px] font-mono font-bold text-teal-600 uppercase mb-2">
                            {{ $other['badge'] }}
                        </div>
                        <h4 class="text-base font-bold text-[#0B152F] group-hover:text-teal-600 transition mb-2">
                            {{ $other['title'] }}
                        </h4>
                        <p class="text-xs text-slate-600 line-clamp-2 mb-4 leading-relaxed">
                            {{ $other['tagline'] }}
                        </p>
                        <span class="text-xs font-bold text-teal-600 group-hover:translate-x-1 inline-flex items-center gap-1 transition">
                            <span>Learn More</span>
                            <span>&rarr;</span>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Institutional Footer -->
    @include('landing.footer')
</div>
@endsection

