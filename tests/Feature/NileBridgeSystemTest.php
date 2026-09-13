<?php

namespace Tests\Feature;

use App\Models\Lead;
use App\Models\LeadNote;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class NileBridgeSystemTest extends TestCase
{
    use DatabaseTransactions;

    protected User $admin;
    protected User $employee1;
    protected User $employee2;
    protected User $customer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::where('role', User::ROLE_ADMIN)->first() ?? User::factory()->create([
            'email' => 'admin@nilebridge.com',
            'role' => User::ROLE_ADMIN,
            'status' => User::STATUS_ACTIVE,
        ]);

        $this->employee1 = User::where('email', 'employee1@nilebridge.com')->first() ?? User::factory()->create([
            'email' => 'employee1@nilebridge.com',
            'role' => User::ROLE_EMPLOYEE,
            'status' => User::STATUS_ACTIVE,
        ]);

        $this->employee2 = User::where('email', 'employee2@nilebridge.com')->first() ?? User::factory()->create([
            'email' => 'employee2@nilebridge.com',
            'role' => User::ROLE_EMPLOYEE,
            'status' => User::STATUS_ACTIVE,
        ]);

        $this->customer = User::where('email', 'client@acme.com')->first() ?? User::factory()->create([
            'email' => 'client@acme.com',
            'role' => User::ROLE_CUSTOMER,
            'status' => User::STATUS_ACTIVE,
        ]);
    }

    /**
     * Test 1: Landing page loads with 200 and key marketing sections.
     */
    public function test_landing_page_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('NileBridge');
        $response->assertSee('Elite Global Talent');
        $response->assertSee('Call Center & Payment Processing', false);
        $response->assertSee('Up to 70%');
        $response->assertSee('Cloud Engineering');
        $response->assertSee('Calculate Your Realized Annual Cost Savings');
        $response->assertSee('Calculate Realized Annual Cost Savings');
        $response->assertSee('Why Tier-1 Enterprises Choose NileBridge');
        $response->assertSee('Initiate Your Global Talent Search');
        $response->assertSee('Initiate Your Requisition');
    }

    /**
     * Test 1.5: Public legal compliance pages render successfully.
     */
    public function test_legal_pages_render_successfully(): void
    {
        $privacyResponse = $this->get(route('privacy'));
        $privacyResponse->assertStatus(200);
        $privacyResponse->assertSee('Global Privacy Policy');
        $privacyResponse->assertSee('privacy@nilebridge.com');

        $termsResponse = $this->get(route('terms'));
        $termsResponse->assertStatus(200);
        $termsResponse->assertSee('Terms of Service &amp; Master Agreement', false);
        $termsResponse->assertSee('100% Intellectual Property Assignment');
    }

    /**
     * Test 1.6: All six dedicated enterprise service detail pages render successfully.
     */
    public function test_all_six_service_pages_render_successfully(): void
    {
        $services = [
            'call-center-customer-experience' => 'Call Center & Customer Experience',
            'payment-operations' => 'Payment Operations',
            'back-office-operations' => 'Back-Office Operations',
            'technical-support' => 'Technical Support',
            'digital-ecommerce-operations' => 'Digital & E-commerce Operations',
            'healthcare-administration' => 'Healthcare Administration',
        ];

        foreach ($services as $slug => $title) {
            $response = $this->get(route('services.show', $slug));
            $response->assertStatus(200);
            $response->assertSee(e($title), false);
            $response->assertSee('INITIATE REQUISITION');
        }
    }

    /**
     * Test 1.7: All seven dedicated enterprise industry detail pages render successfully.
     */
    public function test_all_seven_industry_pages_render_successfully(): void
    {
        $industries = [
            'ecommerce' => 'E-commerce & Retail BPO',
            'saas-technology' => 'SaaS & High-Growth Technology',
            'fintech-payments' => 'Fintech & Digital Payments',
            'healthcare' => 'Healthcare & HealthTech Administration',
            'education' => 'Education & EdTech Solutions',
            'financial-services' => 'Financial Services & WealthTech',
            'professional-services' => 'Professional Services & Consulting',
        ];

        foreach ($industries as $slug => $title) {
            $response = $this->get(route('industries.show', $slug));
            $response->assertStatus(200);
            $response->assertSee(e($title), false);
            $response->assertSee('INITIATE INDUSTRY REQUISITION');
        }
    }

    /**
     * Test 1.8: All four dedicated enterprise resource pages render successfully.
     */
    public function test_all_four_resource_pages_render_successfully(): void
    {
        $calcResponse = $this->get(route('resources.calculator'));
        $calcResponse->assertStatus(200);
        $calcResponse->assertSee('Enterprise BPO Cost &amp; Savings Calculator', false);

        $guideResponse = $this->get(route('resources.bpo-guide'));
        $guideResponse->assertStatus(200);
        $guideResponse->assertSee('The Enterprise Guide to Offshoring &amp; BPO in East Africa', false);

        $casesResponse = $this->get(route('resources.case-studies'));
        $casesResponse->assertStatus(200);
        $casesResponse->assertSee('Client Case Studies &amp; Verified Results', false);

        $insightsResponse = $this->get(route('resources.insights'));
        $insightsResponse->assertStatus(200);
        $insightsResponse->assertSee('Industry Insights, BPO Research &amp; Market Analysis', false);
    }

    /**
     * Test 2: Public user can submit lead inquiry with calculator payload.
     */
    public function test_public_lead_capture_stores_record_and_redirects(): void
    {
        $payload = [
            'company_name' => 'Apex Financial Cloud',
            'contact_name' => 'Jonathan Miller',
            'contact_email' => 'jmiller@apexfin.com',
            'contact_phone' => '+1 555 432 9988',
            'service_category' => 'software_engineering',
            'team_size_needed' => 4,
            'estimated_budget' => 16800,
            'calculator_inputs' => json_encode([
                'seniority' => 'senior',
                'annualSavings' => 520000,
            ]),
            'notes' => 'Need 4 Senior Backend engineers familiar with high-scale MySQL and Kafka.',
            'source' => 'roi_calculator',
        ];

        $response = $this->post('/leads', $payload);

        $response->assertRedirect('/#lead-capture');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('leads', [
            'company_name' => 'Apex Financial Cloud',
            'contact_email' => 'jmiller@apexfin.com',
            'status' => Lead::STATUS_NEW,
            'team_size_needed' => 4,
        ]);
    }

    /**
     * Test 3: Anti-spam honeypot silently suppresses bots.
     */
    public function test_honeypot_catches_bot_submissions(): void
    {
        $payload = [
            'website_hp' => 'http://spam-site.com',
            'company_name' => 'Spam Bot LLC',
            'contact_name' => 'Botty',
            'contact_email' => 'bot@spambot.com',
            'service_category' => 'software_engineering',
            'team_size_needed' => 10,
        ];

        $response = $this->post('/leads', $payload);

        $response->assertRedirect('/');
        $this->assertDatabaseMissing('leads', [
            'contact_email' => 'bot@spambot.com',
        ]);
    }

    /**
     * Test 4: Unauthenticated access to portals redirects to login.
     */
    public function test_unauthenticated_users_are_redirected_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/login');
        $this->get('/portal')->assertRedirect('/login');
        $this->get('/client')->assertRedirect('/login');
    }

    /**
     * Test 5: Admin can access dashboard and export CSV.
     */
    public function test_admin_can_access_dashboard_and_export_csv(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Enterprise Pipeline Oversight');
        $response->assertSee('Acme Fintech Corp');

        // Test CSV export
        $exportResponse = $this->actingAs($this->admin)->get('/admin/leads/export');
        $exportResponse->assertStatus(200);
        $exportResponse->assertHeader('content-type', 'text/csv; charset=utf-8');
    }

    /**
     * Test 6: Admin can reassign a lead to an employee.
     */
    public function test_admin_can_reassign_lead(): void
    {
        $lead = Lead::where('contact_email', 'dcho@starlightcommerce.com')->first();

        $response = $this->actingAs($this->admin)->post("/admin/leads/{$lead->id}/assign", [
            'assigned_to' => $this->employee1->id,
            'assignment_reason' => 'Assigned to Tariq for immediate eCommerce vertical outreach.',
        ]);

        $response->assertSessionHas('success');

        $this->assertDatabaseHas('leads', [
            'id' => $lead->id,
            'assigned_to' => $this->employee1->id,
        ]);

        $this->assertDatabaseHas('lead_notes', [
            'lead_id' => $lead->id,
            'user_id' => $this->admin->id,
        ]);
    }

    /**
     * Test 7: Employee can access portal and only see assigned leads.
     */
    public function test_employee_can_access_portal_and_see_assigned_leads(): void
    {
        $response = $this->actingAs($this->employee1)->get('/portal');

        $response->assertStatus(200);
        $response->assertSee('My Active Requisitions');
        // Employee 1 is assigned to Acme Fintech Corp
        $response->assertSee('Acme Fintech Corp');
        // Employee 1 is NOT assigned to Nordic Health (which is assigned to employee2)
        $response->assertDontSee('Nordic Health Technologies');
    }

    /**
     * Test 8: Employee cannot access detail view of a lead assigned to another AE.
     */
    public function test_employee_cannot_view_unassigned_lead_detail(): void
    {
        $otherLead = Lead::where('assigned_to', $this->employee2->id)->first();

        $response = $this->actingAs($this->employee1)->get("/portal/leads/{$otherLead->id}");
        $response->assertStatus(403);
    }

    /**
     * Test 9: Employee can advance status and append follow-up note.
     */
    public function test_employee_can_advance_status_and_append_note(): void
    {
        $lead = Lead::where('assigned_to', $this->employee1->id)->first();

        // 1. Advance status
        $statusResponse = $this->actingAs($this->employee1)->patch("/portal/leads/{$lead->id}/status", [
            'status' => Lead::STATUS_WON,
            'status_note' => 'Client approved contract and executed wire transfer.',
        ]);
        $statusResponse->assertSessionHas('success');

        $this->assertDatabaseHas('leads', [
            'id' => $lead->id,
            'status' => Lead::STATUS_WON,
        ]);

        // 2. Append note
        $noteResponse = $this->actingAs($this->employee1)->post("/portal/leads/{$lead->id}/notes", [
            'note' => 'Candidate profiles approved by engineering VP. Kickoff set.',
        ]);
        $noteResponse->assertSessionHas('success');

        $this->assertDatabaseHas('lead_notes', [
            'lead_id' => $lead->id,
            'note' => 'Candidate profiles approved by engineering VP. Kickoff set.',
        ]);
    }

    /**
     * Test 10: Customer can view their personal dashboard and requisitions.
     */
    public function test_customer_can_view_own_dashboard(): void
    {
        $response = $this->actingAs($this->customer)->get('/client');

        $response->assertStatus(200);
        $response->assertSee('My Dedicated Talent Requisitions');
        $response->assertSee('Dedicated Software Engineering');
        $response->assertSee('Dedicated Software & Cloud Engineering');
    }

    /**
     * Test 11: Customer cannot access admin or employee portals.
     */
    public function test_customer_cannot_access_admin_or_employee_portals(): void
    {
        // Custom RoleMiddleware redirects to client dashboard safely
        $adminResponse = $this->actingAs($this->customer)->get('/admin');
        $adminResponse->assertRedirect(route('client.dashboard'));

        $portalResponse = $this->actingAs($this->customer)->get('/portal');
        $portalResponse->assertRedirect(route('client.dashboard'));
    }

    /**
     * Test 12: Authentication flow (login and logout).
     */
    public function test_authentication_login_and_logout(): void
    {
        // Login as Admin
        $loginResponse = $this->post('/login', [
            'email' => 'admin@nilebridge.com',
            'password' => 'password',
        ]);
        $loginResponse->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($this->admin);

        // Logout
        $logoutResponse = $this->post('/logout');
        $logoutResponse->assertRedirect('/login');
        $this->assertGuest();
    }

    /**
     * Test 13: New client registration flow.
     */
    public function test_client_can_register_and_access_dashboard(): void
    {
        $registerPageResponse = $this->get('/register');
        $registerPageResponse->assertStatus(200);
        $registerPageResponse->assertSee('Create Client Account');

        $registerSubmitResponse = $this->post('/register', [
            'name' => 'John Enterprise',
            'company_name' => 'Nexus Global Labs',
            'email' => 'john@nexuslabs.co',
            'phone' => '+1 (555) 987-6543',
            'password' => 'secret1234',
            'password_confirmation' => 'secret1234',
            'terms' => '1',
        ]);

        $registerSubmitResponse->assertRedirect(route('client.dashboard'));
        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'email' => 'john@nexuslabs.co',
            'role' => User::ROLE_CUSTOMER,
        ]);
    }
}
