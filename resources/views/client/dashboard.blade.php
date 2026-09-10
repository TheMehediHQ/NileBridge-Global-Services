@extends('layouts.app')

@section('content')
<div class="py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    
    <!-- Top Header & Client Context -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 pb-6 border-b border-slate-800 gap-4">
        <div>
            <div class="flex items-center space-x-3">
                <span class="px-2.5 py-1 rounded-md text-[11px] font-mono font-bold uppercase bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                    Enterprise Client Portal
                </span>
                <span class="text-xs text-slate-400">{{ auth()->user()->name }}</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight mt-1">My Dedicated Talent Requisitions</h1>
        </div>

        <a href="{{ route('home') }}#lead-capture" 
           class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs font-bold text-slate-950 bg-emerald-400 hover:bg-emerald-300 shadow-md transition">
            + Request Additional Talent / Pod
        </a>
    </div>

    <!-- Client Metrics -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="bg-slate-900/80 border border-slate-800 p-5 rounded-2xl">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Total Active Requisitions</span>
            <span class="text-3xl font-black text-white font-mono mt-1 block">{{ $activeRequisitions }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Managed workforce tracks</span>
        </div>

        <div class="bg-slate-900/80 border border-slate-800 p-5 rounded-2xl">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-400 block">Dedicated Specialists</span>
            <span class="text-3xl font-black text-emerald-400 font-mono mt-1 block">{{ $totalSpecialistsTargeted }} FTEs</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Engineered talent capacity</span>
        </div>

        <div class="bg-slate-900/80 border border-slate-800 p-5 rounded-2xl">
            <span class="text-xs font-bold uppercase tracking-wider text-teal-300 block">Service Level Agreement</span>
            <span class="text-2xl font-black text-teal-300 font-mono mt-1 block">Tier-1 Institutional</span>
            <span class="text-[10px] text-slate-500 mt-1 block">2-Week Risk-Free Replacement SLA</span>
        </div>
    </div>

    <!-- Requisition Cards -->
    <div class="space-y-6">
        @forelse($inquiries as $inquiry)
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-xl">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 border-b border-slate-800 gap-4">
                    <div>
                        <div class="flex items-center space-x-2">
                            <span class="text-xs font-mono font-bold text-emerald-400 uppercase tracking-wider">{{ $inquiry->uuid }}</span>
                            <span class="text-slate-600">&bull;</span>
                            <span class="text-xs text-slate-400">Created {{ $inquiry->created_at->format('M d, Y') }}</span>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight mt-1">
                            {{ $inquiry->service_category_label }}
                        </h2>
                        <p class="text-xs text-slate-400 mt-1">
                            Dedicated Software &amp; Cloud Engineering Pod &bull; High-Velocity Agile Delivery
                        </p>
                    </div>

                    <div>
                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-bold border {{ $inquiry->status_badge_class }}">
                            <span class="w-2 h-2 rounded-full mr-2 bg-current"></span>
                            {{ $inquiry->status_label }}
                        </span>
                    </div>
                </div>

                <!-- Requisition Progress Bar Milestone -->
                <div class="py-6 border-b border-slate-800">
                    <div class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Onboarding Lifecycle Status</div>
                    
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

                    <div class="grid grid-cols-4 gap-2 text-center text-xs">
                        <div class="p-2.5 rounded-xl border {{ $step >= 1 ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-300 font-bold' : 'bg-slate-950 border-slate-800 text-slate-600' }}">
                            <span class="block text-[10px] uppercase font-mono">Stage 1</span>
                            <span>Discovery & Scope</span>
                        </div>
                        <div class="p-2.5 rounded-xl border {{ $step >= 2 ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-300 font-bold' : 'bg-slate-950 border-slate-800 text-slate-600' }}">
                            <span class="block text-[10px] uppercase font-mono">Stage 2</span>
                            <span>Candidate Vetting</span>
                        </div>
                        <div class="p-2.5 rounded-xl border {{ $step >= 4 ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-300 font-bold' : 'bg-slate-950 border-slate-800 text-slate-600' }}">
                            <span class="block text-[10px] uppercase font-mono">Stage 3</span>
                            <span>SOW & SLA Proposal</span>
                        </div>
                        <div class="p-2.5 rounded-xl border {{ $step >= 5 ? 'bg-emerald-500/20 border-emerald-500 text-emerald-300 font-black' : 'bg-slate-950 border-slate-800 text-slate-600' }}">
                            <span class="block text-[10px] uppercase font-mono">Stage 4</span>
                            <span>Active Integration</span>
                        </div>
                    </div>
                </div>

                <!-- Details & Assigned Partner -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-6 items-center">
                    <div>
                        <span class="text-xs text-slate-500 uppercase tracking-wider block font-semibold">Scope & Capacity</span>
                        <span class="text-base font-bold text-white font-mono mt-1 block">
                            {{ $inquiry->team_size_needed }} Dedicated Specialist{{ $inquiry->team_size_needed > 1 ? 's' : '' }}
                        </span>
                        <span class="text-xs text-emerald-400 font-mono mt-0.5 block">
                            {{ $inquiry->estimated_budget ? '$' . number_format($inquiry->estimated_budget) . '/month' : 'SOW Custom Budget' }}
                        </span>
                    </div>

                    <div>
                        <span class="text-xs text-slate-500 uppercase tracking-wider block font-semibold">Dedicated Delivery Partner</span>
                        @if($inquiry->assignedEmployee)
                            <span class="text-base font-bold text-white mt-1 block">{{ $inquiry->assignedEmployee->name }}</span>
                            <span class="text-xs text-slate-400 font-mono block">{{ $inquiry->assignedEmployee->email }}</span>
                        @else
                            <span class="text-sm font-semibold text-slate-400 mt-1 block">Senior Partner Matching In Progress</span>
                            <span class="text-[11px] text-slate-600 block">Allocated within 24h</span>
                        @endif
                    </div>

                    <div class="text-sm sm:text-right">
                        @if($inquiry->status === 'proposal_sent')
                            <div class="inline-block p-3 rounded-2xl bg-indigo-500/10 border border-indigo-500/30 text-left">
                                <span class="text-xs font-bold text-indigo-300 block">Proposal Transmitted</span>
                                <span class="text-[11px] text-slate-400 block mt-0.5">Please check your inbox or reply to your Delivery Partner to confirm kickoff.</span>
                            </div>
                        @elseif($inquiry->status === 'won')
                            <div class="inline-block p-3 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-left">
                                <span class="text-xs font-bold text-emerald-300 block">Workforce Active</span>
                                <span class="text-[11px] text-slate-400 block mt-0.5">2-Week Risk-Free Trial Active. Weekly KPI review on file.</span>
                            </div>
                        @else
                            <div class="text-xs text-slate-400">
                                Status: <strong class="text-slate-200">{{ $inquiry->status_label }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Latest Update from Team -->
                @if($inquiry->leadNotes->isNotEmpty())
                    <div class="mt-6 pt-4 border-t border-slate-800/80">
                        <div class="text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">Latest Account Update:</div>
                        <p class="text-xs text-slate-300 bg-slate-950/60 p-3 rounded-xl border border-slate-800/60 leading-relaxed">
                            {{ $inquiry->leadNotes->first()->note }}
                        </p>
                    </div>
                @endif
            </div>
        @empty
            <div class="bg-slate-900/40 border border-slate-800 rounded-3xl p-12 text-center text-slate-400">
                <svg class="w-12 h-12 mx-auto text-slate-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                <h3 class="text-lg font-bold text-white">No active requisitions submitted yet</h3>
                <p class="text-xs text-slate-500 max-w-sm mx-auto mt-2">
                    Submit your team sizing and technical requirements to receive pre-vetted candidate portfolios within 48 hours.
                </p>
                <div class="mt-6">
                    <a href="{{ route('home') }}#lead-capture" class="inline-flex items-center px-6 py-3 rounded-xl text-xs font-bold text-slate-950 bg-emerald-400 hover:bg-emerald-300 transition">
                        Submit Requisition &rarr;
                    </a>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection
