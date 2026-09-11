@extends('layouts.app')

@section('content')
<div class="relative min-h-[calc(100vh-65px)] bg-[#F8FAFC] text-slate-800 py-8 sm:py-10 px-4 sm:px-6 lg:px-8 overflow-hidden">
    
    <!-- Ambient Atmospheric Gradients & Texture (Matching Homepage) -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-teal-500/5 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="absolute bottom-10 left-10 w-[450px] h-[450px] bg-amber-500/5 rounded-full blur-[130px] pointer-events-none -z-10"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-70 pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto">
        
        <!-- Top Breadcrumb & Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 pb-4 border-b border-slate-200/90 gap-4">
            <div class="flex items-center space-x-3">
                <a href="{{ route('portal.dashboard') }}" class="text-xs font-bold text-slate-500 hover:text-teal-600 flex items-center gap-1.5 transition">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Back to My Active Pipeline</span>
                </a>
                <span class="text-slate-300">/</span>
                <span class="text-xs font-mono text-[#0B152F] font-bold">{{ $lead->company_name }}</span>
            </div>

            <div class="flex items-center gap-3">
                <span class="text-xs text-slate-500 font-mono">
                    Assigned AE: <strong class="text-slate-800">{{ auth()->user()->name }}</strong>
                </span>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.leads.show', $lead) }}" 
                       class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-purple-50 text-purple-700 border border-purple-200 hover:bg-purple-100 transition">
                        <span>Admin Dossier</span>
                    </a>
                @endif
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left 2 Cols: Lead Profile & Follow-Up Notes -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Lead Profile (Crisp Architectural White Card) -->
                <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-[0_4px_20px_rgba(11,21,47,0.03)]">
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
                    
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 border-b border-slate-200/80 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-sm text-[#0B152F] shadow-sm">
                                {{ $monogram }}
                            </div>
                            <div>
                                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0B152F] tracking-tight leading-tight">
                                    {{ $lead->company_name }}
                                </h2>
                                <div class="flex flex-wrap items-center gap-2 mt-1">
                                    <span class="text-sm font-semibold text-slate-700">{{ $lead->contact_name }}</span>
                                    <span class="text-slate-300">&bull;</span>
                                    <a href="mailto:{{ $lead->contact_email }}" class="text-sm text-teal-600 hover:text-teal-700 hover:underline font-medium">
                                        {{ $lead->contact_email }}
                                    </a>
                                    @if($lead->contact_phone)
                                        <span class="text-slate-300">&bull;</span>
                                        <span class="text-xs text-slate-500 font-mono">{{ $lead->contact_phone }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold border {{ $statusClasses }}">
                                <span class="w-2 h-2 rounded-full {{ $dotClasses }} animate-pulse"></span>
                                <span>{{ $lead->status_label }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Attributes -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 py-6 border-b border-slate-200/80">
                        <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/60">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Required Specialization</span>
                            <span class="text-xs sm:text-sm font-bold text-[#0B152F] mt-1 block">{{ $lead->service_category_label }}</span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/60">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Team Pod Size</span>
                            <span class="text-sm font-bold text-teal-600 font-mono mt-1 block">{{ $lead->team_size_needed }} FTE{{ $lead->team_size_needed > 1 ? 's' : '' }}</span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/60">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Monthly Target</span>
                            <span class="text-sm font-bold text-[#0B152F] font-mono mt-1 block">
                                {{ $lead->estimated_budget ? '$' . number_format($lead->estimated_budget) : 'Custom SLA' }}
                            </span>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50/70 border border-slate-200/60">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Lead Ingest Date</span>
                            <span class="text-xs font-mono text-slate-600 mt-1 block">{{ $lead->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>

                    <!-- Client Technical Requirements / Notes -->
                    @if($lead->notes)
                        <div class="pt-6">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-2">Client Inbound Notes &amp; Scope</span>
                            <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 text-sm text-slate-700 leading-relaxed whitespace-pre-wrap">
                                {{ $lead->notes }}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Notes & Activity Timeline (Crisp White Card) -->
                <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-[0_4px_20px_rgba(11,21,47,0.03)]">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-[#0B152F] flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-amber-50 border border-amber-200 flex items-center justify-center text-amber-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <span>Account Activity &amp; Progress Log</span>
                        </h3>
                        <span class="text-xs font-mono text-slate-400">{{ $lead->leadNotes->count() }} records logged</span>
                    </div>

                    <!-- Add Follow-up Note Form -->
                    <form action="{{ route('portal.leads.notes.store', $lead) }}" method="POST" class="mb-8 p-5 rounded-2xl bg-slate-50/70 border border-slate-200/80">
                        @csrf
                        <label for="note" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Append Client Follow-Up / Discovery Note</label>
                        <textarea 
                            id="note" 
                            name="note" 
                            rows="3" 
                            required
                            placeholder="e.g. Conducted Zoom discovery with CTO. Confirmed requirement for 3 Laravel/Vue engineers. Shortlisting Kampala engineering profiles..."
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition"
                        ></textarea>
                        
                        <div class="mt-3 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 text-xs font-bold text-white bg-[#0B152F] hover:bg-teal-600 rounded-full shadow-sm transition-all transform hover:-translate-y-0.5">
                                <span>Record Progress Note</span>
                                <svg class="w-3.5 h-3.5 ml-1.5 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Historic Notes -->
                    <div class="space-y-4">
                        @forelse($lead->leadNotes as $note)
                            <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/80 hover:border-slate-300 transition">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                                        <span class="text-xs font-bold text-[#0B152F]">{{ $note->author->name ?? 'System' }}</span>
                                        <span class="text-[10px] text-slate-600 uppercase font-mono px-2 py-0.5 rounded-md bg-white border border-slate-200">
                                            {{ $note->author ? ucfirst($note->author->role) : 'System' }}
                                        </span>
                                    </div>
                                    <span class="text-[11px] text-slate-400 font-mono">{{ $note->created_at->format('M d, Y H:i') }} ({{ $note->created_at->diffForHumans() }})</span>
                                </div>
                                <div class="text-xs sm:text-sm text-slate-700 leading-relaxed whitespace-pre-wrap">
                                    {{ $note->note }}
                                </div>
                                @if($note->stage_snapshot)
                                    <div class="mt-2 text-[10px] text-slate-500 font-mono">
                                        Stage snapshot: <strong class="text-slate-700 uppercase font-semibold">{{ $note->stage_snapshot }}</strong>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="text-center py-8 text-slate-400 text-xs">
                                <svg class="w-8 h-8 mx-auto text-slate-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                <span>No account notes recorded yet.</span>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

            <!-- Right 1 Col: Status Transition Sidebar -->
            <div class="space-y-6">
                
                <!-- Stage Transition Card (Crisp White Card) -->
                <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-[0_4px_20px_rgba(11,21,47,0.03)]">
                    <div class="flex items-center gap-2 mb-4 pb-3 border-b border-slate-100">
                        <div class="w-6 h-6 rounded-md bg-teal-50 border border-teal-200 flex items-center justify-center text-teal-600">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">Advance Pipeline Stage</h4>
                    </div>
                    
                    <form action="{{ route('portal.leads.status', $lead) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="status" class="block text-xs font-semibold text-slate-600 mb-1">New Stage</label>
                            <select id="status" name="status" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-sm text-[#0B152F] focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 font-semibold cursor-pointer">
                                <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New Inbound</option>
                                <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                <option value="qualified" {{ $lead->status === 'qualified' ? 'selected' : '' }}>Qualified</option>
                                <option value="proposal_sent" {{ $lead->status === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
                                <option value="won" {{ $lead->status === 'won' ? 'selected' : '' }}>Closed Won</option>
                                <option value="lost" {{ $lead->status === 'lost' ? 'selected' : '' }}>Closed Lost</option>
                            </select>
                        </div>

                        <div>
                            <label for="status_note" class="block text-xs font-semibold text-slate-600 mb-1">Transition Rationale (Audit Memo)</label>
                            <textarea id="status_note" name="status_note" rows="2" placeholder="e.g. Completed proposal review call; client confirmed acceptance" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-1 focus:ring-teal-500"></textarea>
                        </div>

                        <button type="submit" class="w-full py-2.5 text-xs font-bold text-white bg-[#0B152F] hover:bg-teal-600 rounded-full shadow-sm transition-all transform hover:-translate-y-0.5">
                            Update Pipeline Stage
                        </button>
                    </form>
                </div>

                <!-- Quick Communication Checklist (Crisp White Card) -->
                <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-[0_4px_20px_rgba(11,21,47,0.03)] text-xs space-y-3">
                    <div class="flex items-center gap-2 mb-2 pb-2 border-b border-slate-100">
                        <div class="w-6 h-6 rounded-md bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="font-bold uppercase tracking-wider text-slate-700">AE Operating Standard</span>
                    </div>

                    <div class="flex items-center text-slate-600 gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                        <span>Sub-24h first response SLA adherence</span>
                    </div>
                    <div class="flex items-center text-slate-600 gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                        <span>Verify tech stack &amp; EAT (UTC+3) time overlap</span>
                    </div>
                    <div class="flex items-center text-slate-600 gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                        <span>Confirm budget meets minimum pod tier</span>
                    </div>
                    <div class="flex items-center text-slate-600 gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                        <span>Schedule technical interview loop via Kampala Hub</span>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection
