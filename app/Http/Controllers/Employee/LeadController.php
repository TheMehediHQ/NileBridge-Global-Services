<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadNote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LeadController extends Controller
{
    /**
     * Display the Account Executive's active assigned leads dashboard.
     */
    public function index(Request $request): View
    {
        $userId = auth()->id();
        $status = $request->query('status');
        $search = $request->query('search');

        // Scoped metrics for current employee
        $myTotalLeads = Lead::where('assigned_to', $userId)->count();
        $myNewCount = Lead::where('assigned_to', $userId)->where('status', Lead::STATUS_NEW)->count();
        $myActivePipelineCount = Lead::where('assigned_to', $userId)->whereIn('status', [
            Lead::STATUS_CONTACTED,
            Lead::STATUS_QUALIFIED,
            Lead::STATUS_PROPOSAL_SENT,
        ])->count();
        $myWonCount = Lead::where('assigned_to', $userId)->where('status', Lead::STATUS_WON)->count();

        $leads = Lead::where('assigned_to', $userId)
            ->filterStatus($status)
            ->search($search)
            ->with(['leadNotes' => fn($q) => $q->latest()->limit(1)])
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('employee.dashboard', compact(
            'leads',
            'myTotalLeads',
            'myNewCount',
            'myActivePipelineCount',
            'myWonCount',
            'status',
            'search'
        ));
    }

    /**
     * Display the lead dossier to the assigned employee.
     */
    public function show(Lead $lead): View
    {
        // Enforce employee assignment isolation (Admin authorized as fallback)
        if (auth()->user()->role === 'employee' && $lead->assigned_to !== auth()->id()) {
            abort(403, 'Unauthorized. This lead is assigned to another Account Executive.');
        }

        $lead->load(['leadNotes.author', 'customer']);

        return view('employee.leads.show', compact('lead'));
    }

    /**
     * Update lead pipeline status by employee.
     */
    public function updateStatus(Request $request, Lead $lead): RedirectResponse
    {
        if (auth()->user()->role === 'employee' && $lead->assigned_to !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }

        $validated = $request->validate([
            'status' => ['required', 'in:new,contacted,qualified,proposal_sent,won,lost'],
            'status_note' => ['nullable', 'string', 'max:1000'],
        ]);

        $oldStatus = $lead->status;
        $newStatus = $validated['status'];

        DB::transaction(function () use ($lead, $oldStatus, $newStatus, $validated) {
            $lead->status = $newStatus;
            $lead->save();

            $noteMemo = $validated['status_note'] ?? "Pipeline advanced from [{$oldStatus}] to [{$newStatus}] by Account Executive " . auth()->user()->name . '.';

            LeadNote::create([
                'lead_id' => $lead->id,
                'user_id' => auth()->id(),
                'stage_snapshot' => $newStatus,
                'note' => $noteMemo,
            ]);
        });

        return back()->with('success', "Lead status advanced to [{$lead->status_label}].");
    }

    /**
     * Add an account note/memo to the lead file.
     */
    public function storeNote(Request $request, Lead $lead): RedirectResponse
    {
        if (auth()->user()->role === 'employee' && $lead->assigned_to !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }

        $validated = $request->validate([
            'note' => ['required', 'string', 'max:3000'],
        ]);

        LeadNote::create([
            'lead_id' => $lead->id,
            'user_id' => auth()->id(),
            'stage_snapshot' => $lead->status,
            'note' => $validated['note'],
        ]);

        return back()->with('success', 'Timeline note appended successfully.');
    }
}
