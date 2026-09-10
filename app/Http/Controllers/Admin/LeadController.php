<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadNote;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeadController extends Controller
{
    /**
     * Display the Executive Admin Dashboard with metrics and leads data table.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $category = $request->query('category');
        $search = $request->query('search');

        // Metrics calculations
        $totalLeads = Lead::count();
        $newLeadsCount = Lead::where('status', Lead::STATUS_NEW)->count();
        $inPipelineCount = Lead::whereIn('status', [
            Lead::STATUS_CONTACTED,
            Lead::STATUS_QUALIFIED,
            Lead::STATUS_PROPOSAL_SENT,
        ])->count();
        $wonCount = Lead::where('status', Lead::STATUS_WON)->count();
        $activeEmployeesCount = User::where('role', User::ROLE_EMPLOYEE)->where('status', User::STATUS_ACTIVE)->count();
        $totalMonthlyPipelineBudget = Lead::where('status', '!=', Lead::STATUS_LOST)->sum('estimated_budget');

        // Filtered Leads Query
        $leads = Lead::with(['assignedEmployee', 'leadNotes' => fn($q) => $q->latest()->limit(1)])
            ->filterStatus($status)
            ->filterCategory($category)
            ->search($search)
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $employees = User::whereIn('role', [User::ROLE_EMPLOYEE, User::ROLE_ADMIN])
            ->where('status', User::STATUS_ACTIVE)
            ->orderBy('name')
            ->get();

        return view('admin.dashboard', compact(
            'leads',
            'employees',
            'totalLeads',
            'newLeadsCount',
            'inPipelineCount',
            'wonCount',
            'activeEmployeesCount',
            'totalMonthlyPipelineBudget',
            'status',
            'category',
            'search'
        ));
    }

    /**
     * Display granular detail view for a specific lead.
     */
    public function show(Lead $lead): View
    {
        $lead->load(['assignedEmployee', 'customer', 'leadNotes.author']);

        $employees = User::whereIn('role', [User::ROLE_EMPLOYEE, User::ROLE_ADMIN])
            ->where('status', User::STATUS_ACTIVE)
            ->orderBy('name')
            ->get();

        return view('admin.leads.show', compact('lead', 'employees'));
    }

    /**
     * Reassign a lead to an Account Executive / Staff Member.
     */
    public function assign(Request $request, Lead $lead): RedirectResponse
    {
        $validated = $request->validate([
            'assigned_to' => ['nullable', 'exists:users,id'],
            'assignment_reason' => ['nullable', 'string', 'max:500'],
        ]);

        $newAssigneeId = $validated['assigned_to'] ? (int) $validated['assigned_to'] : null;
        $previousAssignee = $lead->assignedEmployee;
        $newAssignee = $newAssigneeId ? User::find($newAssigneeId) : null;

        DB::transaction(function () use ($lead, $newAssigneeId, $previousAssignee, $newAssignee, $validated) {
            $lead->assigned_to = $newAssigneeId;
            $lead->save();

            $prevName = $previousAssignee ? $previousAssignee->name : 'Unassigned';
            $newName = $newAssignee ? $newAssignee->name : 'Unassigned';

            $memo = "Lead allocation modified from [{$prevName}] to [{$newName}] by Administrator " . auth()->user()->name . '.';
            if (! empty($validated['assignment_reason'])) {
                $memo .= " Instructions: " . $validated['assignment_reason'];
            }

            LeadNote::create([
                'lead_id' => $lead->id,
                'user_id' => auth()->id(),
                'stage_snapshot' => $lead->status,
                'note' => $memo,
            ]);
        });

        return back()->with('success', 'Lead allocation updated successfully.');
    }

    /**
     * Update lead pipeline status.
     */
    public function updateStatus(Request $request, Lead $lead): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,contacted,qualified,proposal_sent,won,lost'],
            'status_note' => ['nullable', 'string', 'max:1000'],
        ]);

        $oldStatus = $lead->status;
        $newStatus = $validated['status'];

        DB::transaction(function () use ($lead, $oldStatus, $newStatus, $validated) {
            $lead->status = $newStatus;
            $lead->save();

            $noteContent = $validated['status_note'] ?? "Administrative status update from [{$oldStatus}] to [{$newStatus}].";

            LeadNote::create([
                'lead_id' => $lead->id,
                'user_id' => auth()->id(),
                'stage_snapshot' => $newStatus,
                'note' => $noteContent,
            ]);
        });

        return back()->with('success', "Lead status changed to [{$lead->status_label}].");
    }

    /**
     * Add an administrative timeline note to a lead.
     */
    public function addNote(Request $request, Lead $lead): RedirectResponse
    {
        $validated = $request->validate([
            'note' => ['required', 'string', 'max:3000'],
        ]);

        LeadNote::create([
            'lead_id' => $lead->id,
            'user_id' => auth()->id(),
            'stage_snapshot' => $lead->status,
            'note' => $validated['note'],
        ]);

        return back()->with('success', 'Note added to lead file.');
    }

    /**
     * Export all enterprise leads to CSV format.
     */
    public function export(Request $request): StreamedResponse
    {
        $fileName = 'nilebridge-leads-export-' . now()->format('Y-m-d-His') . '.csv';

        $leads = Lead::with('assignedEmployee')->latest()->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($leads) {
            $handle = fopen('php://output', 'w');

            // Header row
            fputcsv($handle, [
                'Lead ID',
                'UUID',
                'Company Name',
                'Contact Name',
                'Contact Email',
                'Contact Phone',
                'Service Category',
                'Team Size Needed (FTE)',
                'Estimated Monthly Budget (USD)',
                'Pipeline Status',
                'Assigned Account Executive',
                'Lead Source',
                'Created At',
            ]);

            foreach ($leads as $lead) {
                fputcsv($handle, [
                    $lead->id,
                    $lead->uuid,
                    $lead->company_name,
                    $lead->contact_name,
                    $lead->contact_email,
                    $lead->contact_phone ?? 'N/A',
                    $lead->service_category_label,
                    $lead->team_size_needed,
                    $lead->estimated_budget ? number_format($lead->estimated_budget, 2) : '0.00',
                    $lead->status_label,
                    $lead->assignedEmployee ? $lead->assignedEmployee->name : 'Unassigned',
                    $lead->source,
                    $lead->created_at->toIso8601String(),
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
