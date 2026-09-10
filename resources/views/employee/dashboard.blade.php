@extends('layouts.app')

@section('content')
<div class="py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    
    <!-- Header & Staff Context -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 pb-6 border-b border-slate-800 gap-4">
        <div>
            <div class="flex items-center space-x-3">
                <span class="px-2.5 py-1 rounded-md text-[11px] font-mono font-bold uppercase bg-amber-500/10 text-amber-400 border border-amber-500/20">
                    Account Executive Portal
                </span>
                <span class="text-xs text-slate-400">{{ auth()->user()->name }} ({{ auth()->user()->email }})</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight mt-1">My Active Requisitions & Pipeline</h1>
        </div>

        @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs font-bold bg-purple-600 hover:bg-purple-500 text-white shadow-md transition">
                &larr; Return to Admin Oversight
            </a>
        @endif
    </div>

    <!-- 4 Staff Scoped Metric Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-slate-900/80 border border-slate-800 p-5 rounded-2xl">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Assigned To Me</span>
            <span class="text-3xl font-black text-white font-mono mt-1 block">{{ $myTotalLeads }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Total client accounts</span>
        </div>

        <div class="bg-slate-900/80 border border-slate-800 p-5 rounded-2xl">
            <span class="text-xs font-bold uppercase tracking-wider text-blue-400 block">Immediate Action (New)</span>
            <span class="text-3xl font-black text-blue-400 font-mono mt-1 block">{{ $myNewCount }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Outreach not initiated</span>
        </div>

        <div class="bg-slate-900/80 border border-slate-800 p-5 rounded-2xl">
            <span class="text-xs font-bold uppercase tracking-wider text-amber-400 block">Active Engagements</span>
            <span class="text-3xl font-black text-amber-400 font-mono mt-1 block">{{ $myActivePipelineCount }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Contacted & Proposal Sent</span>
        </div>

        <div class="bg-slate-900/80 border border-slate-800 p-5 rounded-2xl">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-400 block">Closed Won Contracts</span>
            <span class="text-3xl font-black text-emerald-400 font-mono mt-1 block">{{ $myWonCount }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Successfully signed</span>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-4 mb-6">
        <form action="{{ route('portal.dashboard') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="sm:col-span-2">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search your assigned companies or contacts..."
                       class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 transition" />
            </div>

            <div class="flex items-center space-x-2">
                <select name="status" 
                        onchange="this.form.submit()"
                        class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-sm text-white focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
                    <option value="">All Pipeline Stages</option>
                    <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New Inbound</option>
                    <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="qualified" {{ request('status') === 'qualified' ? 'selected' : '' }}>Qualified</option>
                    <option value="proposal_sent" {{ request('status') === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
                    <option value="won" {{ request('status') === 'won' ? 'selected' : '' }}>Closed Won</option>
                    <option value="lost" {{ request('status') === 'lost' ? 'selected' : '' }}>Closed Lost</option>
                </select>

                @if(request('search') || request('status'))
                    <a href="{{ route('portal.dashboard') }}" class="px-3 py-2 text-xs text-rose-400 hover:text-rose-300 font-bold bg-rose-500/10 rounded-xl border border-rose-500/20" title="Reset Filters">
                        Clear
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Assigned Leads Table -->
    <div class="overflow-x-auto rounded-2xl border border-slate-800 bg-slate-900/80 shadow-2xl">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="border-b border-slate-800 bg-slate-950/70 text-slate-400 uppercase text-[11px] tracking-wider font-semibold">
                    <th class="py-4 px-6">Client Enterprise</th>
                    <th class="py-4 px-4">Talent Specialization</th>
                    <th class="py-4 px-4">Scale & Budget</th>
                    <th class="py-4 px-4">Current Stage</th>
                    <th class="py-4 px-4">Latest Follow-up Note</th>
                    <th class="py-4 px-6 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/80 text-slate-300">
                @forelse($leads as $lead)
                    <tr class="hover:bg-slate-800/40 transition">
                        <!-- Company & Contact -->
                        <td class="py-4 px-6">
                            <div class="font-bold text-white text-base">{{ $lead->company_name }}</div>
                            <div class="text-xs text-slate-400 mt-0.5">
                                {{ $lead->contact_name }} &bull; <a href="mailto:{{ $lead->contact_email }}" class="text-emerald-400 hover:underline">{{ $lead->contact_email }}</a>
                            </div>
                            @if($lead->contact_phone)
                                <div class="text-[11px] text-slate-500 font-mono">{{ $lead->contact_phone }}</div>
                            @endif
                        </td>

                        <!-- Specialization -->
                        <td class="py-4 px-4">
                            <span class="inline-block px-2.5 py-1 rounded-md text-xs font-medium bg-slate-800 text-slate-200 border border-slate-700">
                                {{ $lead->service_category_label }}
                            </span>
                        </td>

                        <!-- Team & Budget -->
                        <td class="py-4 px-4 font-mono">
                            <div class="text-white font-bold">{{ $lead->team_size_needed }} FTE</div>
                            <div class="text-xs text-emerald-400 font-semibold">
                                {{ $lead->estimated_budget ? '$' . number_format($lead->estimated_budget) . '/mo' : 'Custom SLA' }}
                            </div>
                        </td>

                        <!-- Status Badge -->
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold border {{ $lead->status_badge_class }}">
                                <span class="w-1.5 h-1.5 rounded-full mr-1.5 bg-current"></span>
                                {{ $lead->status_label }}
                            </span>
                        </td>

                        <!-- Latest Note Snippet -->
                        <td class="py-4 px-4 max-w-xs">
                            @if($lead->leadNotes->isNotEmpty())
                                <p class="text-xs text-slate-400 truncate" title="{{ $lead->leadNotes->first()->note }}">
                                    {{ $lead->leadNotes->first()->note }}
                                </p>
                                <span class="text-[10px] text-slate-500 font-mono">{{ $lead->leadNotes->first()->created_at->diffForHumans() }}</span>
                            @else
                                <span class="text-xs text-slate-600 italic">No notes logged</span>
                            @endif
                        </td>

                        <!-- Action -->
                        <td class="py-4 px-6 text-right">
                            <a href="{{ route('portal.leads.show', $lead) }}" 
                               class="inline-flex items-center px-3.5 py-1.5 rounded-lg text-xs font-bold bg-amber-500/10 hover:bg-amber-500/20 text-amber-300 border border-amber-500/30 transition">
                                Manage Lead &rarr;
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-500">
                            <svg class="w-12 h-12 mx-auto text-slate-700 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            <p class="text-base font-semibold text-slate-400">No leads currently assigned to your pipeline.</p>
                            <p class="text-xs text-slate-500 mt-1">Check with your Administrator or clear applied filters.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $leads->links() }}
    </div>

</div>
@endsection
