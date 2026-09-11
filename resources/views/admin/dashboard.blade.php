@extends('layouts.app')

@section('content')
<div class="relative min-h-[calc(100vh-65px)] bg-[#F8FAFC] text-slate-800 py-8 sm:py-10 px-4 sm:px-6 lg:px-8 overflow-hidden">
    
    <!-- Ambient Atmospheric Gradients & Texture (Matching Homepage) -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-teal-500/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-cyan-500/5 rounded-full blur-[130px] pointer-events-none -z-10"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-70 pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto">
        
        <!-- Top Executive Command Bar -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 pb-6 border-b border-slate-200/90 gap-6">
            <div>
                <div class="flex flex-wrap items-center gap-2.5 mb-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md text-[10px] font-mono font-bold uppercase tracking-wider bg-purple-50 text-purple-700 border border-purple-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                        Administrator Suite
                    </span>
                    <span class="text-xs text-slate-500 font-mono">
                        Operator: <strong class="text-slate-800">{{ auth()->user()->name }}</strong>
                    </span>
                    <span class="text-slate-300 hidden sm:inline">&bull;</span>
                    <span class="hidden sm:inline-flex items-center gap-1.5 text-[11px] font-mono text-teal-700 font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                        Kampala Central Ops Hub
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0B152F] tracking-tight leading-tight">
                    Enterprise Pipeline Oversight
                </h1>
                <p class="text-xs sm:text-sm text-slate-500 mt-1 font-normal max-w-2xl leading-relaxed">
                    Real-time global inbound requisition tracking, staff workload dispatch, and contract stage progression.
                </p>
            </div>

            <!-- Executive Quick Actions -->
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('admin.leads.export') }}" 
                   class="inline-flex items-center px-5 py-2.5 rounded-full text-xs font-bold bg-[#0B152F] hover:bg-teal-600 text-white shadow-md shadow-slate-900/10 hover:shadow-teal-500/20 transition-all transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2 text-teal-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span>Export Leads to CSV</span>
                </a>

                <a href="{{ route('portal.dashboard') }}" 
                   class="inline-flex items-center px-4 py-2.5 rounded-full text-xs font-bold bg-white hover:bg-slate-50 text-slate-700 hover:text-[#0B152F] border border-slate-200/90 shadow-sm transition-all">
                    <span>Staff View</span>
                    <svg class="w-3.5 h-3.5 ml-1.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- 6 Executive KPI Metric Cards (Crisp White Architectural Cards) -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3.5 sm:gap-4 mb-8">
            
            <!-- Card 1: Total Inbound -->
            <div class="bg-white border border-slate-200/80 hover:border-slate-300 p-4 sm:p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 font-mono">Total Inbound</span>
                    <div class="w-7 h-7 rounded-lg bg-slate-100 border border-slate-200/60 flex items-center justify-center text-slate-600">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl sm:text-3xl font-extrabold text-[#0B152F] font-mono tracking-tight">{{ $totalLeads }}</div>
                    <div class="text-[10px] text-slate-400 mt-0.5 font-medium">All registered leads</div>
                </div>
            </div>

            <!-- Card 2: New / Triage -->
            <div class="bg-white border border-slate-200/80 hover:border-blue-300 p-4 sm:p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-blue-600 font-mono">New Triage</span>
                    <div class="w-7 h-7 rounded-lg bg-blue-50 border border-blue-200 flex items-center justify-center text-blue-600">
                        <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl sm:text-3xl font-extrabold text-blue-600 font-mono tracking-tight">{{ $newLeadsCount }}</div>
                    <div class="text-[10px] text-slate-400 mt-0.5 font-medium">Awaiting first outreach</div>
                </div>
            </div>

            <!-- Card 3: Active Pipeline -->
            <div class="bg-white border border-slate-200/80 hover:border-amber-300 p-4 sm:p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-amber-600 font-mono">In Pipeline</span>
                    <div class="w-7 h-7 rounded-lg bg-amber-50 border border-amber-200 flex items-center justify-center text-amber-600">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl sm:text-3xl font-extrabold text-amber-600 font-mono tracking-tight">{{ $inPipelineCount }}</div>
                    <div class="text-[10px] text-slate-400 mt-0.5 font-medium">Qualified / SOW sent</div>
                </div>
            </div>

            <!-- Card 4: Closed Won -->
            <div class="bg-white border border-slate-200/80 hover:border-emerald-300 p-4 sm:p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-600 font-mono">Closed Won</span>
                    <div class="w-7 h-7 rounded-lg bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl sm:text-3xl font-extrabold text-emerald-600 font-mono tracking-tight">{{ $wonCount }}</div>
                    <div class="text-[10px] text-slate-400 mt-0.5 font-medium">Active client contracts</div>
                </div>
            </div>

            <!-- Card 5: Monthly Pipeline Value -->
            <div class="bg-white border border-slate-200/80 hover:border-teal-300 p-4 sm:p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-teal-700 font-mono">Pipeline Value</span>
                    <div class="w-7 h-7 rounded-lg bg-teal-50 border border-teal-200 flex items-center justify-center text-teal-600 font-mono font-bold text-xs">
                        $
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-xl sm:text-2xl font-extrabold text-teal-600 font-mono tracking-tight">
                        ${{ number_format($totalMonthlyPipelineBudget / 1000, 1) }}k<span class="text-[11px] font-normal text-slate-400">/mo</span>
                    </div>
                    <div class="text-[10px] text-slate-400 mt-0.5 font-medium">Est. monthly billing</div>
                </div>
            </div>

            <!-- Card 6: Active Staff -->
            <div class="bg-white border border-slate-200/80 hover:border-purple-300 p-4 sm:p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-purple-600 font-mono">Active Staff</span>
                    <div class="w-7 h-7 rounded-lg bg-purple-50 border border-purple-200 flex items-center justify-center text-purple-600">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl sm:text-3xl font-extrabold text-purple-600 font-mono tracking-tight">{{ $activeEmployeesCount }}</div>
                    <div class="text-[10px] text-slate-400 mt-0.5 font-medium">Dedicated AEs on duty</div>
                </div>
            </div>

        </div>

        <!-- Quick Filter Stage Tabs (Homepage pill aesthetic) -->
        <div class="flex flex-wrap items-center gap-2 mb-5">
            <span class="text-xs font-mono text-slate-500 mr-2 uppercase tracking-wider">Quick Stage:</span>
            
            <a href="{{ route('admin.dashboard', array_merge(request()->except('status'), ['status' => null])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ !request('status') ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                All ({{ $totalLeads }})
            </a>

            <a href="{{ route('admin.dashboard', array_merge(request()->except('status'), ['status' => 'new'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'new' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                New ({{ $newLeadsCount }})
            </a>

            <a href="{{ route('admin.dashboard', array_merge(request()->except('status'), ['status' => 'contacted'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'contacted' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                Contacted
            </a>

            <a href="{{ route('admin.dashboard', array_merge(request()->except('status'), ['status' => 'qualified'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'qualified' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                Qualified
            </a>

            <a href="{{ route('admin.dashboard', array_merge(request()->except('status'), ['status' => 'proposal_sent'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'proposal_sent' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                Proposal Sent
            </a>

            <a href="{{ route('admin.dashboard', array_merge(request()->except('status'), ['status' => 'won'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'won' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                Closed Won ({{ $wonCount }})
            </a>
        </div>

        <!-- Filtering & Search Control Bar (White Card matching Homepage) -->
        <div class="bg-white border border-slate-200/80 rounded-2xl p-4 sm:p-5 mb-6 shadow-[0_4px_20px_rgba(11,21,47,0.03)]">
            <form action="{{ route('admin.dashboard') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3.5 items-center">
                
                <!-- Search input -->
                <div class="sm:col-span-6 relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search company, contact name, or email..."
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition" />
                </div>

                <!-- Status Filter -->
                <div class="sm:col-span-3">
                    <select name="status" 
                            onchange="this.form.submit()"
                            class="w-full px-3.5 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-sm text-slate-700 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition cursor-pointer">
                        <option value="">All Pipeline Stages</option>
                        <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New Inbound</option>
                        <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="qualified" {{ request('status') === 'qualified' ? 'selected' : '' }}>Qualified</option>
                        <option value="proposal_sent" {{ request('status') === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
                        <option value="won" {{ request('status') === 'won' ? 'selected' : '' }}>Closed Won</option>
                        <option value="lost" {{ request('status') === 'lost' ? 'selected' : '' }}>Closed Lost</option>
                    </select>
                </div>

                <!-- Category Filter -->
                <div class="sm:col-span-3 flex items-center gap-2">
                    <select name="category" 
                            onchange="this.form.submit()"
                            class="w-full px-3.5 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-sm text-slate-700 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition cursor-pointer">
                        <option value="">All Disciplines</option>
                        <option value="software_engineering" {{ request('category') === 'software_engineering' ? 'selected' : '' }}>Software Engineering</option>
                        <option value="bpo_customer_support" {{ request('category') === 'bpo_customer_support' ? 'selected' : '' }}>BPO &amp; Customer Success</option>
                        <option value="finance_backoffice" {{ request('category') === 'finance_backoffice' ? 'selected' : '' }}>Finance &amp; Accounting</option>
                        <option value="digital_marketing" {{ request('category') === 'digital_marketing' ? 'selected' : '' }}>Growth Marketing</option>
                    </select>

                    @if(request('search') || request('status') || request('category'))
                        <a href="{{ route('admin.dashboard') }}" 
                           class="px-3 py-2.5 text-xs text-rose-600 hover:text-rose-700 font-bold bg-rose-50 hover:bg-rose-100 rounded-xl border border-rose-200 transition shrink-0" 
                           title="Reset Filters">
                            Clear
                        </a>
                    @endif
                </div>

            </form>
        </div>

        <!-- High-Density Enterprise Leads Data Table (Clean White Table) -->
        <div class="rounded-2xl border border-slate-200/80 bg-white shadow-[0_4px_24px_rgba(11,21,47,0.04)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="border-b border-slate-200/80 bg-slate-50/90 text-slate-500 uppercase text-[11px] font-bold tracking-wider">
                            <th class="py-4 px-6">Company &amp; Executive</th>
                            <th class="py-4 px-4">Specialization</th>
                            <th class="py-4 px-4">Capacity &amp; Budget</th>
                            <th class="py-4 px-4">Pipeline Status</th>
                            <th class="py-4 px-4">Assigned AE</th>
                            <th class="py-4 px-4">Ingestion Date</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($leads as $lead)
                            <tr class="hover:bg-slate-50/70 transition group">
                                
                                <!-- Company & Contact with Monogram Avatar -->
                                <td class="py-4 px-6">
                                    <div class="flex items-start gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-teal-50 border border-teal-200/80 flex items-center justify-center text-teal-700 font-mono font-bold text-xs shrink-0 group-hover:border-teal-400 transition">
                                            {{ strtoupper(substr($lead->company_name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-[#0B152F] text-base tracking-tight leading-snug group-hover:text-teal-600 transition">
                                                {{ $lead->company_name }}
                                            </div>
                                            <div class="text-xs text-slate-500 mt-0.5 flex flex-wrap items-center gap-1.5">
                                                <span>{{ $lead->contact_name }}</span>
                                                <span class="text-slate-300">&bull;</span>
                                                <a href="mailto:{{ $lead->contact_email }}" class="text-teal-600 hover:text-teal-700 hover:underline font-medium">
                                                    {{ $lead->contact_email }}
                                                </a>
                                            </div>
                                            @if($lead->contact_phone)
                                                <div class="text-[11px] text-slate-400 font-mono mt-0.5">
                                                    {{ $lead->contact_phone }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- Specialization & Source -->
                                <td class="py-4 px-4">
                                    <span class="inline-block px-2.5 py-1 rounded-md text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200/80">
                                        {{ $lead->service_category_label }}
                                    </span>
                                    <span class="block text-[10px] text-slate-400 mt-1 capitalize font-mono">
                                        Source: {{ str_replace('_', ' ', $lead->source) }}
                                    </span>
                                </td>

                                <!-- Capacity & Budget -->
                                <td class="py-4 px-4 font-mono">
                                    <div class="text-[#0B152F] font-bold text-sm">
                                        {{ $lead->team_size_needed }} FTE{{ $lead->team_size_needed > 1 ? 's' : '' }}
                                    </div>
                                    <div class="text-xs text-teal-600 font-bold mt-0.5">
                                        {{ $lead->estimated_budget ? '$' . number_format($lead->estimated_budget) . '/mo' : 'Custom SOW' }}
                                    </div>
                                    @if(isset($lead->calculator_inputs['annualSavings']) && $lead->calculator_inputs['annualSavings'])
                                        <div class="text-[10px] text-slate-400 font-normal">
                                            Est. Save: ${{ number_format($lead->calculator_inputs['annualSavings'] / 1000) }}k/yr
                                        </div>
                                    @endif
                                </td>

                                <!-- Status Badge with Dot -->
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold border {{ $lead->status_badge_class }}">
                                        <span class="w-1.5 h-1.5 rounded-full mr-1.5 bg-current"></span>
                                        {{ $lead->status_label }}
                                    </span>
                                </td>

                                <!-- Assigned AE Dropdown -->
                                <td class="py-4 px-4">
                                    <form action="{{ route('admin.leads.assign', $lead) }}" method="POST">
                                        @csrf
                                        <div class="relative inline-block">
                                            <select name="assigned_to" 
                                                    onchange="this.form.submit()"
                                                    class="text-xs px-2.5 py-1.5 pr-6 rounded-lg bg-slate-50 border border-slate-200 text-slate-700 focus:bg-white focus:outline-none focus:ring-1 focus:ring-teal-500 font-medium cursor-pointer transition">
                                                <option value="" class="text-slate-400">Unassigned</option>
                                                @foreach($employees as $emp)
                                                    <option value="{{ $emp->id }}" {{ $lead->assigned_to === $emp->id ? 'selected' : '' }}>
                                                        {{ $emp->name }} ({{ ucfirst($emp->role) }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </td>

                                <!-- Ingested Date -->
                                <td class="py-4 px-4 text-xs text-slate-500">
                                    <div class="text-slate-700 font-semibold">{{ $lead->created_at->format('M d, Y') }}</div>
                                    <div class="text-[10px] text-slate-400 font-mono mt-0.5">{{ $lead->created_at->diffForHumans() }}</div>
                                </td>

                                <!-- Actions: Open Dossier -->
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('admin.leads.show', $lead) }}" 
                                       class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-bold bg-[#0B152F] hover:bg-teal-600 text-white transition shadow-sm">
                                        <span>Open Dossier</span>
                                        <svg class="w-3.5 h-3.5 ml-1 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-16 text-center text-slate-500">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 border border-slate-200 mx-auto flex items-center justify-center text-slate-400 mb-3">
                                        <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <p class="text-base font-bold text-[#0B152F]">No enterprise leads matching the specified criteria.</p>
                                    <p class="text-xs text-slate-400 mt-1">Try adjusting your omni-search keywords or resetting active status/category filters.</p>
                                    <a href="{{ route('admin.dashboard') }}" class="text-xs font-semibold text-teal-600 hover:text-teal-700 hover:underline mt-3 inline-block">
                                        &larr; Reset all filters
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Table Pagination Bar -->
            @if($leads->hasPages())
                <div class="p-4 border-t border-slate-200/80 bg-slate-50/60">
                    {{ $leads->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
@endsection

