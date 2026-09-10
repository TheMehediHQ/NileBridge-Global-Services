@extends('layouts.app')

@section('content')
<div class="py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    
    <!-- Top Header & Context -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 pb-6 border-b border-slate-800 gap-4">
        <div>
            <div class="flex items-center space-x-3">
                <span class="px-2.5 py-1 rounded-md text-[11px] font-mono font-bold uppercase bg-purple-500/10 text-purple-400 border border-purple-500/20">
                    Administrator Suite
                </span>
                <span class="text-xs text-slate-400">Welcome, {{ auth()->user()->name }}</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight mt-1">Enterprise Pipeline Oversight</h1>
        </div>

        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.leads.export') }}" 
               class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs font-bold bg-slate-900 hover:bg-slate-800 text-emerald-400 border border-slate-700 shadow-md transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Export Leads to CSV
            </a>
            <a href="{{ route('portal.dashboard') }}" 
               class="inline-flex items-center px-4 py-2.5 rounded-xl text-xs font-bold bg-slate-900 hover:bg-slate-800 text-slate-300 border border-slate-800 transition">
                Staff View &rarr;
            </a>
        </div>
    </div>

    <!-- 6 Executive Metric Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-6 gap-4 mb-8">
        <!-- Card 1 -->
        <div class="bg-slate-900/80 border border-slate-800 p-4 rounded-2xl">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block">Total Inbound</span>
            <span class="text-2xl sm:text-3xl font-black text-white font-mono mt-1 block">{{ $totalLeads }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">All registered leads</span>
        </div>

        <!-- Card 2 -->
        <div class="bg-slate-900/80 border border-slate-800 p-4 rounded-2xl">
            <span class="text-[11px] font-bold uppercase tracking-wider text-blue-400 block">New / Inbound</span>
            <span class="text-2xl sm:text-3xl font-black text-blue-400 font-mono mt-1 block">{{ $newLeadsCount }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Requires review</span>
        </div>

        <!-- Card 3 -->
        <div class="bg-slate-900/80 border border-slate-800 p-4 rounded-2xl">
            <span class="text-[11px] font-bold uppercase tracking-wider text-amber-400 block">Active Pipeline</span>
            <span class="text-2xl sm:text-3xl font-black text-amber-400 font-mono mt-1 block">{{ $inPipelineCount }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Contacted / SOW Sent</span>
        </div>

        <!-- Card 4 -->
        <div class="bg-slate-900/80 border border-slate-800 p-4 rounded-2xl">
            <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-400 block">Closed Won</span>
            <span class="text-2xl sm:text-3xl font-black text-emerald-400 font-mono mt-1 block">{{ $wonCount }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Contracts active</span>
        </div>

        <!-- Card 5 -->
        <div class="bg-slate-900/80 border border-slate-800 p-4 rounded-2xl">
            <span class="text-[11px] font-bold uppercase tracking-wider text-teal-300 block">Pipeline Value</span>
            <span class="text-xl sm:text-2xl font-black text-teal-300 font-mono mt-1 block">
                ${{ number_format($totalMonthlyPipelineBudget / 1000, 1) }}k<span class="text-xs font-normal text-slate-500">/mo</span>
            </span>
            <span class="text-[10px] text-slate-500 mt-1 block">Estimated monthly billing</span>
        </div>

        <!-- Card 6 -->
        <div class="bg-slate-900/80 border border-slate-800 p-4 rounded-2xl">
            <span class="text-[11px] font-bold uppercase tracking-wider text-purple-400 block">Active Staff</span>
            <span class="text-2xl sm:text-3xl font-black text-purple-400 font-mono mt-1 block">{{ $activeEmployeesCount }}</span>
            <span class="text-[10px] text-slate-500 mt-1 block">Dedicated AEs</span>
        </div>
    </div>

    <!-- Filtering & Search Control Bar -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-4 mb-6">
        <form action="{{ route('admin.dashboard') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            <!-- Search input -->
            <div class="sm:col-span-2">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search company, contact name, or email..."
                       class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition" />
            </div>

            <!-- Status Filter -->
            <div>
                <select name="status" 
                        onchange="this.form.submit()"
                        class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-sm text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
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
            <div class="flex items-center space-x-2">
                <select name="category" 
                        onchange="this.form.submit()"
                        class="w-full px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-sm text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    <option value="">All Disciplines</option>
                    <option value="software_engineering" {{ request('category') === 'software_engineering' ? 'selected' : '' }}>Software Engineering</option>
                    <option value="bpo_customer_support" {{ request('category') === 'bpo_customer_support' ? 'selected' : '' }}>BPO & Customer Success</option>
                    <option value="finance_backoffice" {{ request('category') === 'finance_backoffice' ? 'selected' : '' }}>Finance & Accounting</option>
                    <option value="digital_marketing" {{ request('category') === 'digital_marketing' ? 'selected' : '' }}>Growth Marketing</option>
                </select>

                @if(request('search') || request('status') || request('category'))
                    <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 text-xs text-rose-400 hover:text-rose-300 font-bold bg-rose-500/10 rounded-xl border border-rose-500/20" title="Reset Filters">
                        Clear
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Leads Data Table -->
    <div class="overflow-x-auto rounded-2xl border border-slate-800 bg-slate-900/80 shadow-2xl">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="border-b border-slate-800 bg-slate-950/70 text-slate-400 uppercase text-[11px] tracking-wider font-semibold">
                    <th class="py-4 px-6">Company & Contact</th>
                    <th class="py-4 px-4">Specialization</th>
                    <th class="py-4 px-4">Team & Budget</th>
                    <th class="py-4 px-4">Pipeline Status</th>
                    <th class="py-4 px-4">Assigned AE</th>
                    <th class="py-4 px-4">Date Ingested</th>
                    <th class="py-4 px-6 text-right">Actions</th>
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
                            <span class="block text-[10px] text-slate-500 mt-1 capitalize font-mono">Source: {{ str_replace('_', ' ', $lead->source) }}</span>
                        </td>

                        <!-- Team Size & Budget -->
                        <td class="py-4 px-4 font-mono">
                            <div class="text-white font-bold">{{ $lead->team_size_needed }} FTE{{ $lead->team_size_needed > 1 ? 's' : '' }}</div>
                            <div class="text-xs text-emerald-400 font-semibold">
                                {{ $lead->estimated_budget ? '$' . number_format($lead->estimated_budget) . '/mo' : 'Custom SOW' }}
                            </div>
                        </td>

                        <!-- Status Badge -->
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
                                <select name="assigned_to" 
                                        onchange="this.form.submit()"
                                        class="text-xs px-2.5 py-1.5 rounded-lg bg-slate-950 border border-slate-800 text-slate-200 focus:outline-none focus:ring-1 focus:ring-emerald-500 font-medium">
                                    <option value="" class="text-slate-500">Unassigned</option>
                                    @foreach($employees as $emp)
                                        <option value="{{ $emp->id }}" {{ $lead->assigned_to === $emp->id ? 'selected' : '' }}>
                                            {{ $emp->name }} ({{ ucfirst($emp->role) }})
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>

                        <!-- Ingested Date -->
                        <td class="py-4 px-4 text-xs text-slate-400">
                            <div>{{ $lead->created_at->format('M d, Y') }}</div>
                            <div class="text-[10px] text-slate-500 font-mono">{{ $lead->created_at->diffForHumans() }}</div>
                        </td>

                        <!-- Actions -->
                        <td class="py-4 px-6 text-right">
                            <a href="{{ route('admin.leads.show', $lead) }}" 
                               class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-slate-800 hover:bg-slate-700 text-white border border-slate-700 transition">
                                Open Dossier &rarr;
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-500">
                            <svg class="w-12 h-12 mx-auto text-slate-700 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <p class="text-base font-semibold text-slate-400">No enterprise leads matching the specified criteria.</p>
                            <a href="{{ route('admin.dashboard') }}" class="text-xs text-emerald-400 hover:underline mt-2 inline-block">Clear all filters</a>
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

