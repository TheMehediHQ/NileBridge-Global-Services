<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Enterprise Customer's requisitions and onboarding statuses.
     */
    public function index(): View
    {
        $user = auth()->user();

        $inquiries = Lead::forCustomer($user->id, $user->email)
            ->with(['assignedEmployee', 'leadNotes' => fn($q) => $q->latest()])
            ->latest()
            ->get();

        $totalRequisitions = $inquiries->count();
        $activeRequisitions = $inquiries->where('status', '!=', Lead::STATUS_LOST)->count();
        $totalSpecialistsTargeted = $inquiries->where('status', '!=', Lead::STATUS_LOST)->sum('team_size_needed');

        return view('client.dashboard', compact(
            'inquiries',
            'totalRequisitions',
            'activeRequisitions',
            'totalSpecialistsTargeted'
        ));
    }
}
