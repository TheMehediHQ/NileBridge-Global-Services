<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadNote;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class LeadCaptureController extends Controller
{
    /**
     * Store an inbound enterprise lead inquiry.
     */
    public function store(Request $request): RedirectResponse
    {
        // Anti-spam Honeypot: must be blank
        if (! empty($request->input('website_hp'))) {
            // Silently discard bot submission
            return redirect()->route('home')->with('success', 'Your inquiry has been submitted.');
        }

        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:191'],
            'contact_name' => ['required', 'string', 'max:191'],
            'contact_email' => ['required', 'string', 'email', 'max:191'],
            'contact_phone' => ['nullable', 'string', 'max:32'],
            'service_category' => ['required', Rule::in([
                Lead::CATEGORY_SOFTWARE,
                Lead::CATEGORY_BPO,
                Lead::CATEGORY_FINANCE,
                Lead::CATEGORY_MARKETING,
            ])],
            'team_size_needed' => ['required', 'integer', 'min:1', 'max:500'],
            'estimated_budget' => ['nullable', 'numeric', 'min:0'],
            'calculator_inputs' => ['nullable'],
            'notes' => ['nullable', 'string', 'max:3000'],
            'source' => ['nullable', 'string', 'max:64'],
        ]);

        // Process calculator inputs JSON if string
        $calcInputs = null;
        if (! empty($validated['calculator_inputs'])) {
            $calcInputs = is_string($validated['calculator_inputs'])
                ? json_decode($validated['calculator_inputs'], true)
                : $validated['calculator_inputs'];
        }

        $customerId = null;
        if (auth()->check() && auth()->user()->isCustomer()) {
            $customerId = auth()->id();
        } else {
            // Check if customer email already matches existing customer
            $existingCustomer = User::where('email', $validated['contact_email'])
                ->where('role', User::ROLE_CUSTOMER)
                ->first();
            if ($existingCustomer) {
                $customerId = $existingCustomer->id;
            }
        }

        DB::transaction(function () use ($validated, $calcInputs, $customerId, $request) {
            $lead = Lead::create([
                'customer_id' => $customerId,
                'company_name' => strip_tags($validated['company_name']),
                'contact_name' => strip_tags($validated['contact_name']),
                'contact_email' => strtolower(trim($validated['contact_email'])),
                'contact_phone' => $validated['contact_phone'] ?? null,
                'service_category' => $validated['service_category'],
                'team_size_needed' => $validated['team_size_needed'],
                'estimated_budget' => $validated['estimated_budget'] ?? null,
                'calculator_inputs' => $calcInputs,
                'status' => Lead::STATUS_NEW,
                'source' => $validated['source'] ?? 'landing_page',
                'notes' => $validated['notes'] ?? null,
                'ip_address' => $request->ip(),
                'user_agent' => substr($request->userAgent() ?? '', 0, 500),
            ]);

            // Append initial system note
            $adminUser = User::where('role', User::ROLE_ADMIN)->first();
            LeadNote::create([
                'lead_id' => $lead->id,
                'user_id' => $adminUser ? $adminUser->id : 1,
                'stage_snapshot' => Lead::STATUS_NEW,
                'note' => 'Inbound enterprise inquiry captured via ' . ($lead->source === 'roi_calculator' ? 'ROI Calculator Handoff' : 'Landing Page Form') . '.',
            ]);
        });

        return redirect('/#lead-capture')->with(
            'success',
            'Inquiry received! A Senior NileBridge Delivery Partner has received your requisition and will follow up with candidate dossiers within 24 business hours.'
        );
    }
}
