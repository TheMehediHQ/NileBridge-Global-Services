@extends('layouts.app')

@section('content')
<div class="relative min-h-[calc(100vh-65px)] bg-[#F8FAFC] text-slate-800 py-8 sm:py-10 px-4 sm:px-6 lg:px-8 overflow-hidden">
    
    <!-- Ambient Atmospheric Gradients & Texture (Matching Homepage) -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-teal-500/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-emerald-500/5 rounded-full blur-[130px] pointer-events-none -z-10"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-70 pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto">
        
        <!-- Top Header & Client Context -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 pb-6 border-b border-slate-200/90 gap-6">
            <div>
                <div class="flex flex-wrap items-center gap-2.5 mb-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md text-[10px] font-mono font-bold uppercase tracking-wider bg-teal-50 text-teal-700 border border-teal-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                        Enterprise Client Portal
                    </span>
                    <span class="text-xs text-slate-500 font-mono">
                        Client Partner: <strong class="text-slate-800">{{ auth()->user()->name }}</strong>
                    </span>
                    <span class="text-slate-300 hidden sm:inline">&bull;</span>
                    <span class="hidden sm:inline-flex items-center gap-1.5 text-[11px] font-mono text-emerald-700 font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        SLA Guaranteed
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0B152F] tracking-tight leading-tight">
                    My Dedicated Talent Requisitions
                </h1>
                <p class="text-xs sm:text-sm text-slate-500 mt-1 font-normal max-w-2xl leading-relaxed">
                    Track the progress of your vetted engineering, BPO, and finance teams deployed from our Kampala Global Delivery Hub.
                </p>
            </div>

            <!-- Client Quick Actions -->
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('home') }}#lead-capture" 
                   class="inline-flex items-center px-5 py-2.5 rounded-full text-xs font-bold bg-[#0B152F] hover:bg-teal-600 text-white shadow-md shadow-slate-900/10 hover:shadow-teal-500/20 transition-all transform hover:-translate-y-0.5">
                    <span class="text-teal-400 mr-1.5 font-bold text-sm">+</span>
                    <span>Request Additional Talent / Pod</span>
                </a>
            </div>
        </div>

        <!-- Client Metrics (Crisp Architectural White Cards) -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
            <div class="bg-white border border-slate-200/80 hover:border-slate-300 p-5 rounded-2xl transition group shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-mono">Total Active Requisitions</span>
                    <div class="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200/60 flex items-center justify-center text-slate-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-3xl font-extrabold text-[#0B152F] font-mono tracking-tight">{{ $activeRequisitions }}</span>
                    <span class="text-[11px] text-slate-400 mt-1 block font-medium">Managed workforce tracks</span>
                </div>
            </div>

            <div class="bg-white border border-slate-200/80 hover:border-emerald-300 p-5 rounded-2xl transition group shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 font-mono">Dedicated Specialists</span>
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-3xl font-extrabold text-emerald-600 font-mono tracking-tight">{{ $totalSpecialistsTargeted }} FTEs</span>
                    <span class="text-[11px] text-slate-400 mt-1 block font-medium">Engineered talent capacity</span>
                </div>
            </div>

            <div class="bg-white border border-slate-200/80 hover:border-teal-300 p-5 rounded-2xl transition group shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:shadow-[0_8px_30px_rgba(11,21,47,0.06)]">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-700 font-mono">Service Level Agreement</span>
                    <div class="w-8 h-8 rounded-lg bg-teal-50 border border-teal-200 flex items-center justify-center text-teal-600">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-2xl font-black text-teal-700 tracking-tight">Tier-1 Institutional</span>
                    <span class="text-[11px] text-slate-400 mt-1 block">2-Week Risk-Free Replacement SLA</span>
                    <span class="text-2xl font-extrabold text-teal-700 tracking-tight">Tier-1 Institutional</span>
                    <span class="text-[11px] text-slate-400 mt-1 block font-medium">2-Week Risk-Free Replacement SLA</span>
                </div>
            </div>
        </div>

        <!-- Requisition Cards (Crisp White Architectural Containers) -->
        <div class="space-y-6">
            @forelse($inquiries as $inquiry)
                @php
                    $statusClasses = match($inquiry->status) {
                        'new' => 'bg-blue-50 text-blue-700 border-blue-200/80',
                        'contacted' => 'bg-amber-50 text-amber-700 border-amber-200/80',
                        'qualified' => 'bg-purple-50 text-purple-700 border-purple-200/80',
                        'proposal_sent' => 'bg-indigo-50 text-indigo-700 border-indigo-200/80',
                        'won' => 'bg-emerald-50 text-emerald-700 border-emerald-200/80',
                        'lost' => 'bg-rose-50 text-rose-700 border-rose-200/80',
                        default => 'bg-slate-50 text-slate-700 border-slate-200',
                    };
                    $dotClasses = match($inquiry->status) {
                        'new' => 'bg-blue-500',
                        'contacted' => 'bg-amber-500',
                        'qualified' => 'bg-purple-500',
                        'proposal_sent' => 'bg-indigo-500',
                        'won' => 'bg-emerald-500',
                        'lost' => 'bg-rose-500',
                        default => 'bg-slate-400',
                    };
                @endphp
                <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-[0_4px_20px_rgba(11,21,47,0.03)] hover:border-slate-300 transition-all">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 border-b border-slate-200/80 gap-4">
                        <div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs font-mono font-bold text-teal-600 uppercase tracking-wider">{{ $inquiry->uuid }}</span>
                                <span class="text-slate-300">&bull;</span>
                                <span class="text-xs text-slate-400">Created {{ $inquiry->created_at->format('M d, Y') }}</span>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-[#0B152F] tracking-tight mt-1">
                                {{ $inquiry->service_category_label }}
                            </h2>
                            <p class="text-xs text-slate-500 mt-1">
                                Dedicated Software &amp; Cloud Engineering Pod &bull; High-Velocity Agile Delivery
                            </p>
                        </div>

                        <div>
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold border {{ $statusClasses }}">
                                <span class="w-2 h-2 rounded-full {{ $dotClasses }} animate-pulse"></span>
                                <span>{{ $inquiry->status_label }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Requisition Progress Bar Milestone -->
                    <div class="py-6 border-b border-slate-200/80">
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3 font-mono">Onboarding Lifecycle Status</div>
                        
                        @php
                            $step = match($inquiry->status) {
                                'new' => 1,
                                'contacted' => 2,
                                'qualified' => 3,
                                'proposal_sent' => 4,
                                'won' => 5,
                                default => 1,
                            };
                        @endphp

                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-center text-xs">
                            <div class="p-3 rounded-xl border {{ $step >= 1 ? 'bg-teal-50/80 border-teal-200 text-teal-800 font-bold' : 'bg-slate-50/70 border-slate-200/60 text-slate-400' }}">
                                <span class="block text-[10px] uppercase font-mono {{ $step >= 1 ? 'text-teal-600' : 'text-slate-400' }}">Stage 1</span>
                                <span>Discovery &amp; Scope</span>
                            </div>
                            <div class="p-3 rounded-xl border {{ $step >= 2 ? 'bg-teal-50/80 border-teal-200 text-teal-800 font-bold' : 'bg-slate-50/70 border-slate-200/60 text-slate-400' }}">
                                <span class="block text-[10px] uppercase font-mono {{ $step >= 2 ? 'text-teal-600' : 'text-slate-400' }}">Stage 2</span>
                                <span>Candidate Vetting</span>
                            </div>
                            <div class="p-3 rounded-xl border {{ $step >= 4 ? 'bg-teal-50/80 border-teal-200 text-teal-800 font-bold' : 'bg-slate-50/70 border-slate-200/60 text-slate-400' }}">
                                <span class="block text-[10px] uppercase font-mono {{ $step >= 4 ? 'text-teal-600' : 'text-slate-400' }}">Stage 3</span>
                                <span>SOW &amp; SLA Proposal</span>
                            </div>
                            <div class="p-3 rounded-xl border {{ $step >= 5 ? 'bg-emerald-50 border-emerald-300 text-emerald-800 font-bold' : 'bg-slate-50/70 border-slate-200/60 text-slate-400' }}">
                                <span class="block text-[10px] uppercase font-mono {{ $step >= 5 ? 'text-emerald-600' : 'text-slate-400' }}">Stage 4</span>
                                <span>Active Integration</span>
                            </div>
                        </div>
                    </div>

                    <!-- Details & Assigned Partner -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-6 items-center">
                        <div>
                            <span class="text-xs text-slate-400 uppercase tracking-wider block font-semibold">Scope &amp; Capacity</span>
                            <span class="text-base font-bold text-[#0B152F] font-mono mt-1 block">
                                {{ $inquiry->team_size_needed }} Dedicated Specialist{{ $inquiry->team_size_needed > 1 ? 's' : '' }}
                            </span>
                            <span class="text-xs text-emerald-600 font-mono font-semibold mt-0.5 block">
                                {{ $inquiry->estimated_budget ? '$' . number_format($inquiry->estimated_budget) . '/month' : 'SOW Custom Budget' }}
                            </span>
                        </div>

                        <div>
                            <span class="text-xs text-slate-400 uppercase tracking-wider block font-semibold">Dedicated Delivery Partner</span>
                            @if($inquiry->assignedEmployee)
                                <span class="text-base font-bold text-[#0B152F] mt-1 block">{{ $inquiry->assignedEmployee->name }}</span>
                                <span class="text-xs text-slate-500 font-mono block">{{ $inquiry->assignedEmployee->email }}</span>
                            @else
                                <span class="text-sm font-semibold text-slate-700 mt-1 block">Senior Partner Matching In Progress</span>
                                <span class="text-[11px] text-slate-400 block">Allocated within 24h</span>
                            @endif
                        </div>

                        <div class="text-sm sm:text-right">
                            @if($inquiry->status === 'proposal_sent')
                                <div class="inline-block p-3.5 rounded-2xl bg-indigo-50 border border-indigo-200 text-left">
                                    <span class="text-xs font-bold text-indigo-800 block">Proposal Transmitted</span>
                                    <span class="text-[11px] text-indigo-600 block mt-0.5">Please check your inbox or reply to your Delivery Partner to confirm kickoff.</span>
                                </div>
                            @elseif($inquiry->status === 'won')
                                <div class="inline-block p-3.5 rounded-2xl bg-emerald-50 border border-emerald-200 text-left">
                                    <span class="text-xs font-bold text-emerald-800 block">Workforce Active</span>
                                    <span class="text-[11px] text-emerald-700 block mt-0.5">2-Week Risk-Free Trial Active. Weekly KPI review on file.</span>
                                </div>
                            @else
                                <div class="text-xs text-slate-500">
                                    Status: <strong class="text-slate-800">{{ $inquiry->status_label }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Latest Update from Team -->
                    @if($inquiry->leadNotes->isNotEmpty())
                        <div class="mt-6 pt-4 border-t border-slate-100">
                            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">Latest Account Update:</div>
                            <p class="text-xs text-slate-700 bg-slate-50/80 p-3.5 rounded-xl border border-slate-200/80 leading-relaxed">
                                {{ $inquiry->leadNotes->first()->note }}
                            </p>
                        </div>
                    @endif
                </div>
            @empty
                <div class="bg-white border border-slate-200/80 rounded-3xl p-12 text-center text-slate-400 shadow-[0_4px_20px_rgba(11,21,47,0.03)]">
                    <div class="w-14 h-14 mx-auto rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mb-4 border border-slate-200">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0B152F]">No active requisitions submitted yet</h3>
                    <p class="text-xs text-slate-500 max-w-sm mx-auto mt-2">
                        Submit your team sizing and technical requirements to receive pre-vetted candidate portfolios within 48 hours.
                    </p>
                    <div class="mt-6">
                        <a href="{{ route('home') }}#lead-capture" class="inline-flex items-center px-6 py-2.5 rounded-full text-xs font-bold text-white bg-[#0B152F] hover:bg-teal-600 transition shadow-sm">
                            <span>Submit Requisition</span>
                            <svg class="w-3.5 h-3.5 ml-1.5 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

    </div>

</div>
@endsection
