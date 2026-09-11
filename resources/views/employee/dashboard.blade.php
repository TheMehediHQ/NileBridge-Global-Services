@extends('layouts.app')

@section('content')
<div class="relative min-h-[calc(100vh-65px)] bg-[#F8FAFC] text-slate-800 py-8 sm:py-10 px-4 sm:px-6 lg:px-8 overflow-hidden">
    
    <!-- Ambient Atmospheric Gradients & Dot Matrix (Matching Homepage) -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-teal-500/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-amber-500/5 rounded-full blur-[130px] pointer-events-none -z-10"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-70 pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto">
        
        <!-- Header & Staff Context -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 pb-6 border-b border-slate-200/90 gap-6">
            <div>
                <div class="flex flex-wrap items-center gap-2.5 mb-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md text-[10px] font-mono font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                        Account Executive Portal
                    </span>
                    <span class="text-xs text-slate-500 font-mono">
                        AE: <strong class="text-slate-800">{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }})
                    </span>
                    <span class="text-slate-300 hidden sm:inline">&bull;</span>
                    <span class="hidden sm:inline-flex items-center gap-1.5 text-[11px] font-mono text-teal-700 font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                        Active Assignment Pool
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0B152F] tracking-tight leading-tight">
                    My Active Requisitions &amp; Pipeline
                </h1>
                <p class="text-xs sm:text-sm text-slate-500 mt-1 font-normal max-w-2xl leading-relaxed">
                    Dedicated client account outreach, technical candidate matching, and contract negotiation pipeline.
                </p>
            </div>

            <!-- Executive Quick Actions -->
            <div class="flex flex-wrap items-center gap-3">
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" 
                       class="inline-flex items-center px-4 py-2.5 rounded-full text-xs font-bold bg-white hover:bg-slate-50 text-purple-700 hover:text-purple-900 border border-purple-200 shadow-sm transition-all">
                        <svg class="w-3.5 h-3.5 mr-1.5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Return to Admin Oversight</span>
                    </a>
                @endif

                <a href="{{ route('home') }}#lead-capture" target="_blank"
                   class="inline-flex items-center px-4 py-2.5 rounded-full text-xs font-bold bg-[#0B152F] hover:bg-teal-600 text-white shadow-md shadow-slate-900/10 hover:shadow-teal-500/20 transition-all">
                    <span>Public Intake Form</span>
                    <svg class="w-3.5 h-3.5 ml-1.5 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- 4 Staff-Scoped Metric Cards (Crisp Architectural White Cards) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            
            <!-- Card 1: Assigned To Me -->
            <div class="bg-white border border-slate-200/80 hover:border-slate-300 p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-mono">Assigned To Me</span>
                    <div class="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200/60 flex items-center justify-center text-slate-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-3xl font-extrabold text-[#0B152F] font-mono tracking-tight">{{ $myTotalLeads }}</div>
                    <div class="text-[11px] text-slate-400 mt-1 font-medium">Total client accounts</div>
                </div>
            </div>

            <!-- Card 2: Immediate Action (New) -->
            <div class="bg-white border border-slate-200/80 hover:border-blue-300 p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-blue-600 font-mono">Immediate Action (New)</span>
                    <div class="w-8 h-8 rounded-lg bg-blue-50 border border-blue-200 flex items-center justify-center text-blue-600">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-500 animate-pulse"></span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-3xl font-extrabold text-blue-600 font-mono tracking-tight">{{ $myNewCount }}</div>
                    <div class="text-[11px] text-slate-400 mt-1 font-medium">Outreach not initiated</div>
                </div>
            </div>

            <!-- Card 3: Active Engagements -->
            <div class="bg-white border border-slate-200/80 hover:border-amber-300 p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-600 font-mono">Active Engagements</span>
                    <div class="w-8 h-8 rounded-lg bg-amber-50 border border-amber-200 flex items-center justify-center text-amber-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-3xl font-extrabold text-amber-600 font-mono tracking-tight">{{ $myActivePipelineCount }}</div>
                    <div class="text-[11px] text-slate-400 mt-1 font-medium">Contacted &amp; Proposal Sent</div>
                </div>
            </div>

            <!-- Card 4: Closed Won Contracts -->
            <div class="bg-white border border-slate-200/80 hover:border-emerald-300 p-5 rounded-2xl transition group flex flex-col justify-between shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 font-mono">Closed Won Contracts</span>
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-3xl font-extrabold text-emerald-600 font-mono tracking-tight">{{ $myWonCount }}</div>
                    <div class="text-[11px] text-slate-400 mt-1 font-medium">Successfully signed contracts</div>
                </div>
            </div>

        </div>

        <!-- Quick Filter Stage Tabs (Homepage pill aesthetic) -->
        <div class="flex flex-wrap items-center gap-2 mb-5">
            <span class="text-xs font-mono text-slate-500 mr-2 uppercase tracking-wider">Quick Stage:</span>
            
            <a href="{{ route('portal.dashboard', array_merge(request()->except('status'), ['status' => null])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ !request('status') ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                All ({{ $myTotalLeads }})
            </a>

            <a href="{{ route('portal.dashboard', array_merge(request()->except('status'), ['status' => 'new'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'new' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                New ({{ $myNewCount }})
            </a>

            <a href="{{ route('portal.dashboard', array_merge(request()->except('status'), ['status' => 'contacted'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'contacted' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                Contacted
            </a>

            <a href="{{ route('portal.dashboard', array_merge(request()->except('status'), ['status' => 'qualified'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'qualified' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                Qualified
            </a>

            <a href="{{ route('portal.dashboard', array_merge(request()->except('status'), ['status' => 'proposal_sent'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'proposal_sent' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                Proposal Sent
            </a>

            <a href="{{ route('portal.dashboard', array_merge(request()->except('status'), ['status' => 'won'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'won' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                Closed Won ({{ $myWonCount }})
            </a>

            <a href="{{ route('portal.dashboard', array_merge(request()->except('status'), ['status' => 'lost'])) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-semibold transition {{ request('status') === 'lost' ? 'bg-[#0B152F] text-white shadow-sm' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200/80 hover:bg-slate-50' }}">
                Closed Lost
            </a>
        </div>

        <!-- Filter Bar (White Card Container matching Homepage) -->
        <div class="bg-white border border-slate-200/80 rounded-2xl p-4 sm:p-5 mb-6 shadow-[0_4px_20px_rgba(11,21,47,0.03)]">
            <form action="{{ route('portal.dashboard') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3.5 items-center">
                
                <!-- Search input -->
                <div class="sm:col-span-8 relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search your assigned companies, contact names, or emails..."
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition" />
                </div>

                <!-- Status Selector -->
                <div class="sm:col-span-4 flex items-center gap-2">
                    <select name="status" 
                            onchange="this.form.submit()"
                            class="w-full px-3.5 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-sm text-slate-700 focus:bg-white focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition cursor-pointer">
                        <option value="">All Pipeline Stages</option>
                        <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New Inbound</option>
                        <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="qualified" {{ request('status') === 'qualified' ? 'selected' : '' }}>Qualified</option>
                        <option value="proposal_sent" {{ request('status') === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
                        <option value="won" {{ request('status') === 'won' ? 'selected' : '' }}>Closed Won</option>
                        <option value="lost" {{ request('status') === 'lost' ? 'selected' : '' }}>Closed Lost</option>
                    </select>

                    @if(request('search') || request('status'))
                        <a href="{{ route('portal.dashboard') }}" 
                           class="px-3 py-2.5 text-xs text-rose-600 hover:text-rose-700 font-bold bg-rose-50 hover:bg-rose-100 rounded-xl border border-rose-200 transition shrink-0" 
                           title="Reset Filters">
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Assigned Leads Table (Crisp White High-Density Table) -->
        <div class="rounded-2xl border border-slate-200/80 bg-white shadow-[0_4px_24px_rgba(11,21,47,0.04)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="border-b border-slate-200/80 bg-slate-50/70 text-slate-500 uppercase text-[11px] tracking-wider font-semibold">
                            <th class="py-4 px-6">Client Enterprise</th>
                            <th class="py-4 px-4">Talent Specialization</th>
                            <th class="py-4 px-4">Scale &amp; Budget</th>
                            <th class="py-4 px-4">Current Stage</th>
                            <th class="py-4 px-4">Latest Follow-up Note</th>
                            <th class="py-4 px-6 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-600">
                        @forelse($leads as $lead)
                            @php
                                $monogram = strtoupper(substr($lead->company_name, 0, 2));
                                $statusClasses = match($lead->status) {
                                    'new' => 'bg-blue-50 text-blue-700 border-blue-200/80',
                                    'contacted' => 'bg-amber-50 text-amber-700 border-amber-200/80',
                                    'qualified' => 'bg-purple-50 text-purple-700 border-purple-200/80',
                                    'proposal_sent' => 'bg-indigo-50 text-indigo-700 border-indigo-200/80',
                                    'won' => 'bg-emerald-50 text-emerald-700 border-emerald-200/80',
                                    'lost' => 'bg-rose-50 text-rose-700 border-rose-200/80',
                                    default => 'bg-slate-50 text-slate-700 border-slate-200',
                                };
                                $dotClasses = match($lead->status) {
                                    'new' => 'bg-blue-500',
                                    'contacted' => 'bg-amber-500',
                                    'qualified' => 'bg-purple-500',
                                    'proposal_sent' => 'bg-indigo-500',
                                    'won' => 'bg-emerald-500',
                                    'lost' => 'bg-rose-500',
                                    default => 'bg-slate-400',
                                };
                            @endphp
                            <tr class="hover:bg-slate-50/70 transition">
                                <!-- Company & Contact -->
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-black text-xs text-[#0B152F] shrink-0 shadow-sm">
                                        <div class="w-9 h-9 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-xs text-[#0B152F] shrink-0 shadow-sm">
                                            {{ $monogram }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-[#0B152F] text-base leading-tight">
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
                                                <div class="text-[11px] text-slate-400 font-mono mt-0.5">{{ $lead->contact_phone }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- Specialization -->
                                <td class="py-4 px-4">
                                    <span class="inline-block px-2.5 py-1 rounded-md text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200/80">
                                        {{ $lead->service_category_label }}
                                    </span>
                                </td>

                                <!-- Team & Budget -->
                                <td class="py-4 px-4">
                                    <div class="text-[#0B152F] font-bold font-mono text-sm">{{ $lead->team_size_needed }} FTE</div>
                                    <div class="text-xs text-emerald-600 font-semibold font-mono">
                                        {{ $lead->estimated_budget ? '$' . number_format($lead->estimated_budget) . '/mo' : 'Custom SLA' }}
                                    </div>
                                </td>

                                <!-- Status Badge -->
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border {{ $statusClasses }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $dotClasses }} animate-pulse"></span>
                                        <span>{{ $lead->status_label }}</span>
                                    </span>
                                </td>

                                <!-- Latest Note Snippet -->
                                <td class="py-4 px-4 max-w-xs">
                                    @if($lead->leadNotes->isNotEmpty())
                                        <p class="text-xs text-slate-700 truncate font-normal" title="{{ $lead->leadNotes->first()->note }}">
                                            {{ $lead->leadNotes->first()->note }}
                                        </p>
                                        <span class="text-[10px] text-slate-400 font-mono">{{ $lead->leadNotes->first()->created_at->diffForHumans() }}</span>
                                    @else
                                        <span class="text-xs text-slate-400 italic">No notes logged</span>
                                    @endif
                                </td>

                                <!-- Action -->
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('portal.leads.show', $lead) }}" 
                                       class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#0B152F] hover:bg-teal-600 text-white shadow-sm transition-all transform hover:-translate-y-0.5">
                                        <span>Manage Lead</span>
                                        <svg class="w-3 h-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-16 text-center text-slate-400">
                                    <div class="w-14 h-14 mx-auto rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mb-3 border border-slate-200">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                    </div>
                                    <p class="text-base font-bold text-[#0B152F]">No leads currently assigned to your pipeline.</p>
                                    <p class="text-xs text-slate-500 mt-1">Check with your Operations Administrator or clear applied filters.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($leads->hasPages())
                <div class="px-6 py-4 border-t border-slate-200/80 bg-slate-50/50">
                    {{ $leads->links() }}
                </div>
            @endif
        </div>

    </div>

</div>
@endsection
