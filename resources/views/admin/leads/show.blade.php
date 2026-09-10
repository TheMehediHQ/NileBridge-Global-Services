@extends('layouts.app')

@section('content')
<div class="py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    
    <!-- Breadcrumb & Nav -->
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-800">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-slate-400 hover:text-emerald-400 transition">
                &larr; Return to Pipeline Oversight
            </a>
            <span class="text-slate-600">/</span>
            <span class="text-xs font-mono text-purple-400 font-semibold">{{ $lead->uuid }}</span>
        </div>

        <div class="flex items-center space-x-3">
            <span class="text-xs text-slate-500">Ingested: {{ $lead->created_at->format('M d, Y H:i T') }}</span>
        </div>
    </div>

    <!-- Main Dossier Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left 2 Cols: Lead Information & Timeline Notes -->
        <div class="lg:col-span-2 space-y-8">
            
            <!-- Lead Profile Card -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-xl">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 border-b border-slate-800 gap-4">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">{{ $lead->company_name }}</h2>
                        <div class="flex items-center space-x-2 mt-1">
                            <span class="text-sm font-semibold text-slate-300">{{ $lead->contact_name }}</span>
                            <span class="text-slate-600">&bull;</span>
                            <a href="mailto:{{ $lead->contact_email }}" class="text-sm text-emerald-400 hover:underline">{{ $lead->contact_email }}</a>
                            @if($lead->contact_phone)
                                <span class="text-slate-600">&bull;</span>
                                <span class="text-xs text-slate-400 font-mono">{{ $lead->contact_phone }}</span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-bold border {{ $lead->status_badge_class }}">
                            <span class="w-2 h-2 rounded-full mr-2 bg-current"></span>
                            {{ $lead->status_label }}
                        </span>
                    </div>
                </div>

                <!-- Requisition Attributes Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 py-6 border-b border-slate-800">
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Talent Track</span>
                        <span class="text-sm font-semibold text-white mt-1 block">{{ $lead->service_category_label }}</span>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Team Requisition</span>
                        <span class="text-sm font-bold text-emerald-400 font-mono mt-1 block">{{ $lead->team_size_needed }} Specialist{{ $lead->team_size_needed > 1 ? 's' : '' }}</span>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Monthly Target</span>
                        <span class="text-sm font-bold text-white font-mono mt-1 block">
                            {{ $lead->estimated_budget ? '$' . number_format($lead->estimated_budget) : 'Custom SLA' }}
                        </span>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Acquisition Source</span>
                        <span class="text-xs font-mono text-slate-300 capitalize mt-1 block">{{ str_replace('_', ' ', $lead->source) }}</span>
                    </div>
                </div>

                <!-- Initial Client Specifications / Notes -->
                @if($lead->notes_text ?? $lead->notes)
                    <div class="pt-6">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block mb-2">Client Discovery Notes & Tech Stack</span>
                        <div class="p-4 rounded-2xl bg-slate-950/70 border border-slate-800/80 text-sm text-slate-300 leading-relaxed whitespace-pre-wrap">
                            {{ $lead->notes }}
                        </div>
                    </div>
                @endif

                <!-- Calculator Snapshot (if submitted via ROI tool) -->
                @if($lead->calculator_inputs)
                    <div class="mt-6 pt-6 border-t border-slate-800">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-400 block mb-3">Saved ROI Calculator Parameters</span>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 p-4 rounded-2xl bg-emerald-500/5 border border-emerald-500/20 text-xs">
                            <div>
                                <span class="text-slate-500 block">Experience Bar</span>
                                <span class="font-bold text-white uppercase font-mono">{{ $lead->calculator_inputs['seniority'] ?? 'N/A' }}</span>
                            </div>
                            <div>
                                <span class="text-slate-500 block">Est. Annual Savings</span>
                                <span class="font-bold text-emerald-400 font-mono">
                                    {{ isset($lead->calculator_inputs['estimated_savings']) ? '$' . number_format($lead->calculator_inputs['estimated_savings']) : (isset($lead->calculator_inputs['annualSavings']) ? '$' . number_format($lead->calculator_inputs['annualSavings']) : 'N/A') }}
                                </span>
                            </div>
                            <div>
                                <span class="text-slate-500 block">Team Pod</span>
                                <span class="font-bold text-white font-mono">{{ $lead->calculator_inputs['teamSize'] ?? $lead->calculator_inputs['team_size_needed'] ?? $lead->team_size_needed }} FTE</span>
                            </div>
                            <div>
                                <span class="text-slate-500 block">Calculated Reduction</span>
                                <span class="font-bold text-teal-300 font-mono">{{ $lead->calculator_inputs['savingsPercentage'] ?? '68' }}%</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Chronological Follow-Up & Activity Timeline -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-xl">
                <h3 class="text-lg font-bold text-white mb-6 flex items-center">
                    <svg class="w-5 h-5 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Operational Timeline & Follow-Up Notes
                </h3>

                <!-- Add Note Form -->
                <form action="{{ route('admin.leads.notes.store', $lead) }}" method="POST" class="mb-8 p-4 rounded-2xl bg-slate-950 border border-slate-800">
                    @csrf
                    <label for="note" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Append New Follow-up Note / Account Memo</label>
                    <textarea 
                        id="note" 
                        name="note" 
                        rows="3" 
                        required
                        placeholder="Log call details, qualification checklist, proposal feedback, or candidate interview links..."
                        class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-purple-500 transition"
                    ></textarea>
                    
                    <div class="mt-3 flex justify-end">
                        <button type="submit" class="px-5 py-2 text-xs font-bold text-white bg-purple-600 hover:bg-purple-500 rounded-xl shadow-md transition">
                            Log Timeline Note
                        </button>
                    </div>
                </form>

                <!-- Historic Notes List -->
                <div class="space-y-4">
                    @forelse($lead->leadNotes as $note)
                        <div class="p-4 rounded-2xl bg-slate-950/70 border border-slate-800/80">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                                    <span class="text-xs font-bold text-white">{{ $note->author->name ?? 'System' }}</span>
                                    <span class="text-[10px] text-slate-500 uppercase font-mono px-2 py-0.5 rounded bg-slate-900 border border-slate-800">
                                        {{ $note->author ? ucfirst($note->author->role) : 'System' }}
                                    </span>
                                </div>
                                <span class="text-[11px] text-slate-500 font-mono">{{ $note->created_at->format('M d, Y H:i') }} ({{ $note->created_at->diffForHumans() }})</span>
                            </div>
                            <div class="text-xs text-slate-300 leading-relaxed whitespace-pre-wrap">
                                {{ $note->note }}
                            </div>
                            @if($note->stage_snapshot)
                                <div class="mt-2 text-[10px] text-slate-500 font-mono">
                                    Stage at note: <strong class="text-slate-400 uppercase">{{ $note->stage_snapshot }}</strong>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-6 text-slate-500 text-xs">
                            No timeline activity logged yet.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Right 1 Col: Management Sidebar (Status & Reassignment) -->
        <div class="space-y-6">
            
            <!-- Quick Reassignment Panel -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 shadow-xl">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Account Executive Allocation</h4>
                
                <form action="{{ route('admin.leads.assign', $lead) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="assigned_to" class="block text-xs text-slate-500 mb-1">Assignee</label>
                        <select id="assigned_to" name="assigned_to" class="w-full px-3 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-sm text-white focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">Unassigned</option>
                            @foreach($employees as $emp)
                                <option value="{{ $emp->id }}" {{ $lead->assigned_to === $emp->id ? 'selected' : '' }}>
                                    {{ $emp->name }} ({{ ucfirst($emp->role) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="assignment_reason" class="block text-xs text-slate-500 mb-1">Allocation Note / Instructions</label>
                        <input type="text" id="assignment_reason" name="assignment_reason" placeholder="e.g. Assigned for immediate technical scoping call" class="w-full px-3 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-purple-500">
                    </div>

                    <button type="submit" class="w-full py-2.5 text-xs font-bold text-white bg-purple-600 hover:bg-purple-500 rounded-xl transition">
                        Update Assignment
                    </button>
                </form>
            </div>

            <!-- Pipeline Status Progression -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 shadow-xl">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Pipeline Status Transition</h4>
                
                <form action="{{ route('admin.leads.status', $lead) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="status" class="block text-xs text-slate-500 mb-1">New Stage</label>
                        <select id="status" name="status" class="w-full px-3 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-sm text-white focus:outline-none focus:ring-2 focus:ring-purple-500 font-semibold">
                            <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New Inbound</option>
                            <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="qualified" {{ $lead->status === 'qualified' ? 'selected' : '' }}>Qualified</option>
                            <option value="proposal_sent" {{ $lead->status === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
                            <option value="won" {{ $lead->status === 'won' ? 'selected' : '' }}>Closed Won</option>
                            <option value="lost" {{ $lead->status === 'lost' ? 'selected' : '' }}>Closed Lost</option>
                        </select>
                    </div>

                    <div>
                        <label for="status_note" class="block text-xs text-slate-500 mb-1">Reason / Milestone Note</label>
                        <textarea id="status_note" name="status_note" rows="2" placeholder="e.g. Master Services Agreement finalized and signed" class="w-full px-3 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-purple-500"></textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 text-xs font-bold text-slate-950 bg-emerald-400 hover:bg-emerald-300 rounded-xl transition">
                        Transition Stage
                    </button>
                </form>
            </div>

            <!-- Client Identity Link -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 shadow-xl text-xs space-y-2">
                <span class="font-bold uppercase tracking-wider text-slate-400 block mb-2">Audit Footprint</span>
                <div class="flex justify-between text-slate-400">
                    <span>IP Address:</span>
                    <span class="font-mono text-slate-300">{{ $lead->ip_address ?? 'N/A' }}</span>
                </div>
                <div class="flex justify-between text-slate-400">
                    <span>Linked Customer:</span>
                    <span class="font-semibold text-emerald-400">{{ $lead->customer ? $lead->customer->name : 'Guest Inbound' }}</span>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
