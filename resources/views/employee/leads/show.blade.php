@extends('layouts.app')

@section('content')
<div class="py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    
    <!-- Top Breadcrumb -->
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-800">
        <div class="flex items-center space-x-3">
            <a href="{{ route('portal.dashboard') }}" class="text-xs font-bold text-slate-400 hover:text-amber-400 transition">
                &larr; Back to My Active Pipeline
            </a>
            <span class="text-slate-600">/</span>
            <span class="text-xs font-mono text-amber-400 font-semibold">{{ $lead->company_name }}</span>
        </div>

        <div class="text-xs text-slate-500">
            Assigned AE: <strong class="text-slate-300">{{ auth()->user()->name }}</strong>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left 2 Cols: Lead Profile & Follow-Up Notes -->
        <div class="lg:col-span-2 space-y-8">
            
            <!-- Lead Profile -->
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

                <!-- Attributes -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 py-6 border-b border-slate-800">
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Required Specialization</span>
                        <span class="text-sm font-semibold text-white mt-1 block">{{ $lead->service_category_label }}</span>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Team Pod Size</span>
                        <span class="text-sm font-bold text-emerald-400 font-mono mt-1 block">{{ $lead->team_size_needed }} FTE{{ $lead->team_size_needed > 1 ? 's' : '' }}</span>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Monthly Target</span>
                        <span class="text-sm font-bold text-white font-mono mt-1 block">
                            {{ $lead->estimated_budget ? '$' . number_format($lead->estimated_budget) : 'Custom SLA' }}
                        </span>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Lead Ingest Date</span>
                        <span class="text-xs font-mono text-slate-300 mt-1 block">{{ $lead->created_at->format('M d, Y') }}</span>
                    </div>
                </div>

                <!-- Client Technical Requirements / Notes -->
                @if($lead->notes)
                    <div class="pt-6">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block mb-2">Client Inbound Notes & Scope</span>
                        <div class="p-4 rounded-2xl bg-slate-950/70 border border-slate-800/80 text-sm text-slate-300 leading-relaxed whitespace-pre-wrap">
                            {{ $lead->notes }}
                        </div>
                    </div>
                @endif
            </div>

            <!-- Notes & Activity Timeline -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-xl">
                <h3 class="text-lg font-bold text-white mb-6 flex items-center">
                    <svg class="w-5 h-5 text-amber-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Account Activity & Progress Log
                </h3>

                <!-- Add Follow-up Note Form -->
                <form action="{{ route('portal.leads.notes.store', $lead) }}" method="POST" class="mb-8 p-4 rounded-2xl bg-slate-950 border border-slate-800">
                    @csrf
                    <label for="note" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Append Client Follow-Up / Discovery Note</label>
                    <textarea 
                        id="note" 
                        name="note" 
                        rows="3" 
                        required
                        placeholder="e.g. Conducted Zoom discovery with CTO. Confirmed requirement for 3 Laravel/Vue engineers. Shortlisting Cairo engineering profiles..."
                        class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                    ></textarea>
                    
                    <div class="mt-3 flex justify-end">
                        <button type="submit" class="px-5 py-2 text-xs font-bold text-slate-950 bg-amber-400 hover:bg-amber-300 rounded-xl shadow-md transition">
                            Record Progress Note
                        </button>
                    </div>
                </form>

                <!-- Historic Notes -->
                <div class="space-y-4">
                    @forelse($lead->leadNotes as $note)
                        <div class="p-4 rounded-2xl bg-slate-950/70 border border-slate-800/80">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2 h-2 rounded-full bg-amber-400"></span>
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
                                    Stage snapshot: <strong class="text-slate-400 uppercase">{{ $note->stage_snapshot }}</strong>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-6 text-slate-500 text-xs">
                            No account notes recorded.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Right 1 Col: Status Transition Sidebar -->
        <div class="space-y-6">
            
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 shadow-xl">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Advance Pipeline Stage</h4>
                
                <form action="{{ route('portal.leads.status', $lead) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="status" class="block text-xs text-slate-500 mb-1">New Stage</label>
                        <select id="status" name="status" class="w-full px-3 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-sm text-white focus:outline-none focus:ring-2 focus:ring-amber-500 font-semibold">
                            <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New Inbound</option>
                            <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="qualified" {{ $lead->status === 'qualified' ? 'selected' : '' }}>Qualified</option>
                            <option value="proposal_sent" {{ $lead->status === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
                            <option value="won" {{ $lead->status === 'won' ? 'selected' : '' }}>Closed Won</option>
                            <option value="lost" {{ $lead->status === 'lost' ? 'selected' : '' }}>Closed Lost</option>
                        </select>
                    </div>

                    <div>
                        <label for="status_note" class="block text-xs text-slate-500 mb-1">Transition Rationale (Mandatory Audit)</label>
                        <textarea id="status_note" name="status_note" rows="2" placeholder="e.g. Completed proposal review call; client confirmed acceptance" class="w-full px-3 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-amber-500"></textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 text-xs font-bold text-slate-950 bg-amber-400 hover:bg-amber-300 rounded-xl transition">
                        Update Pipeline Stage
                    </button>
                </form>
            </div>

            <!-- Quick Communication Checklist -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 shadow-xl text-xs space-y-3">
                <span class="font-bold uppercase tracking-wider text-slate-400 block mb-1">AE Standard Operating Checklist</span>
                <div class="flex items-center text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2"></span>
                    <span>Sub-24h first response SLA</span>
                </div>
                <div class="flex items-center text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2"></span>
                    <span>Verify tech stack & time zone overlap</span>
                </div>
                <div class="flex items-center text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2"></span>
                    <span>Confirm budget meets minimum tier</span>
                </div>
                <div class="flex items-center text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2"></span>
                    <span>Schedule technical interview loop</span>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
