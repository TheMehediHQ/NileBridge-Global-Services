<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\LeadNote;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Required Users
        $admin = User::firstOrCreate(
            ['email' => 'admin@nilebridge.com'],
            [
                'name' => 'Alexander Vance (VP Operations)',
                'password' => Hash::make('password'),
                'role' => User::ROLE_ADMIN,
                'phone' => '+1 (555) 019-2834',
                'status' => User::STATUS_ACTIVE,
                'email_verified_at' => now(),
            ]
        );

        $employee1 = User::firstOrCreate(
            ['email' => 'employee1@nilebridge.com'],
            [
                'name' => 'Tariq Al-Mansoor (Enterprise AE)',
                'password' => Hash::make('password'),
                'role' => User::ROLE_EMPLOYEE,
                'phone' => '+1 (555) 018-9941',
                'status' => User::STATUS_ACTIVE,
                'email_verified_at' => now(),
            ]
        );

        $employee2 = User::firstOrCreate(
            ['email' => 'employee2@nilebridge.com'],
            [
                'name' => 'Maya Chen (Global Talent Partner)',
                'password' => Hash::make('password'),
                'role' => User::ROLE_EMPLOYEE,
                'phone' => '+1 (555) 018-9942',
                'status' => User::STATUS_ACTIVE,
                'email_verified_at' => now(),
            ]
        );

        $customer = User::firstOrCreate(
            ['email' => 'client@acme.com'],
            [
                'name' => 'Sarah Jenkins (CTO, Acme Corp)',
                'password' => Hash::make('password'),
                'role' => User::ROLE_CUSTOMER,
                'phone' => '+1 (555) 012-3456',
                'status' => User::STATUS_ACTIVE,
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed 5 Realistic Enterprise Leads
        $lead1 = Lead::firstOrCreate(
            ['contact_email' => 'client@acme.com'],
            [
                'uuid' => (string) Str::uuid(),
                'customer_id' => $customer->id,
                'company_name' => 'Acme Fintech Corp',
                'contact_name' => 'Sarah Jenkins',
                'contact_phone' => '+1 (555) 012-3456',
                'service_category' => Lead::CATEGORY_SOFTWARE,
                'team_size_needed' => 5,
                'estimated_budget' => 21000.00,
                'calculator_inputs' => [
                    'role' => 'software_engineering',
                    'teamSize' => 5,
                    'seniority' => 'senior',
                    'annualSavings' => 645000,
                    'savingsPercentage' => 68,
                ],
                'status' => Lead::STATUS_PROPOSAL_SENT,
                'assigned_to' => $employee1->id,
                'source' => 'roi_calculator',
                'notes' => 'Seeking 5 Senior Full-Stack Engineers (Laravel/Vue/AWS) to accelerate core banking integration. Needs kickoff within 30 days.',
                'ip_address' => '198.51.100.45',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)',
                'created_at' => now()->subDays(12),
            ]
        );

        LeadNote::create([
            'lead_id' => $lead1->id,
            'user_id' => $employee1->id,
            'stage_snapshot' => Lead::STATUS_CONTACTED,
            'note' => 'Completed technical discovery call with CTO Sarah Jenkins. Confirmed architecture requirements (PHP 8.2+, AWS ECS, MySQL replication). Pre-screened 4 shortlisted profiles.',
            'created_at' => now()->subDays(10),
        ]);

        LeadNote::create([
            'lead_id' => $lead1->id,
            'user_id' => $employee1->id,
            'stage_snapshot' => Lead::STATUS_PROPOSAL_SENT,
            'note' => 'Transmitted formal SOW and 5-specialist Dedicated Team SLA ($21,000/mo all-inclusive). Client legal team reviewing NDA and compliance addendum.',
            'created_at' => now()->subDays(3),
        ]);

        $lead2 = Lead::firstOrCreate(
            ['contact_email' => 'lars@nordichealth.io'],
            [
                'uuid' => (string) Str::uuid(),
                'company_name' => 'Nordic Health Technologies',
                'contact_name' => 'Lars Lindqvist',
                'contact_phone' => '+46 8 123 4567',
                'service_category' => Lead::CATEGORY_BPO,
                'team_size_needed' => 12,
                'estimated_budget' => 26400.00,
                'calculator_inputs' => [
                    'role' => 'bpo_customer_support',
                    'teamSize' => 12,
                    'seniority' => 'mid',
                    'annualSavings' => 482000,
                    'savingsPercentage' => 65,
                ],
                'status' => Lead::STATUS_QUALIFIED,
                'assigned_to' => $employee2->id,
                'source' => 'landing_page',
                'notes' => 'Requires 24/7 Tier-1 & Tier-2 customer success team for patient-monitoring SaaS. Multi-lingual coverage (English, Swedish, German) needed.',
                'ip_address' => '192.0.2.14',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'created_at' => now()->subDays(7),
            ]
        );

        LeadNote::create([
            'lead_id' => $lead2->id,
            'user_id' => $employee2->id,
            'stage_snapshot' => Lead::STATUS_QUALIFIED,
            'note' => 'Qualified budget and timeline. Verified HIPAA/GDPR training protocols with NileBridge Cairo delivery center lead. Scheduling candidate interviews for next Tuesday.',
            'created_at' => now()->subDays(4),
        ]);

        $lead3 = Lead::firstOrCreate(
            ['contact_email' => 'mvance@meridianlogistics.com'],
            [
                'uuid' => (string) Str::uuid(),
                'company_name' => 'Meridian Logistics Global',
                'contact_name' => 'Marcus Vance',
                'contact_phone' => '+1 (555) 902-1144',
                'service_category' => Lead::CATEGORY_FINANCE,
                'team_size_needed' => 4,
                'estimated_budget' => 10400.00,
                'calculator_inputs' => [
                    'role' => 'finance_backoffice',
                    'teamSize' => 4,
                    'seniority' => 'senior',
                    'annualSavings' => 240000,
                    'savingsPercentage' => 62,
                ],
                'status' => Lead::STATUS_CONTACTED,
                'assigned_to' => $employee1->id,
                'source' => 'roi_calculator',
                'notes' => 'Freight invoice audit and international accounts payable reconciliation. Current turnaround time is 7 days, seeking reduction to 24 hours.',
                'ip_address' => '198.51.100.89',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)',
                'created_at' => now()->subDays(4),
            ]
        );

        LeadNote::create([
            'lead_id' => $lead3->id,
            'user_id' => $employee1->id,
            'stage_snapshot' => Lead::STATUS_CONTACTED,
            'note' => 'Left initial follow-up voicemail and sent overview deck with logistics case study. Marcus replied confirming interest in 4 senior QuickBooks/NetSuite specialists.',
            'created_at' => now()->subDays(2),
        ]);

        $lead4 = Lead::firstOrCreate(
            ['contact_email' => 'elena@cloudvanguard.com'],
            [
                'uuid' => (string) Str::uuid(),
                'company_name' => 'CloudVanguard Systems',
                'contact_name' => 'Elena Rostova',
                'contact_phone' => '+1 (555) 773-8821',
                'service_category' => Lead::CATEGORY_SOFTWARE,
                'team_size_needed' => 8,
                'estimated_budget' => 38000.00,
                'calculator_inputs' => [
                    'role' => 'software_engineering',
                    'teamSize' => 8,
                    'seniority' => 'lead',
                    'annualSavings' => 1120000,
                    'savingsPercentage' => 71,
                ],
                'status' => Lead::STATUS_WON,
                'assigned_to' => $employee2->id,
                'source' => 'landing_page',
                'notes' => 'Enterprise Kubernetes & Terraform infrastructure migration. 8 dedicated Site Reliability Engineers onboarded.',
                'ip_address' => '203.0.113.50',
                'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64)',
                'created_at' => now()->subDays(25),
            ]
        );

        LeadNote::create([
            'lead_id' => $lead4->id,
            'user_id' => $employee2->id,
            'stage_snapshot' => Lead::STATUS_WON,
            'note' => 'Master Services Agreement executed! First month deposit collected ($38,000). Onboarding scheduled for Monday with client VP of Infrastructure.',
            'created_at' => now()->subDays(1),
        ]);

        $lead5 = Lead::firstOrCreate(
            ['contact_email' => 'dcho@starlightcommerce.com'],
            [
                'uuid' => (string) Str::uuid(),
                'company_name' => 'Starlight Digital Commerce',
                'contact_name' => 'David Cho',
                'contact_phone' => '+1 (555) 441-2900',
                'service_category' => Lead::CATEGORY_MARKETING,
                'team_size_needed' => 3,
                'estimated_budget' => 7500.00,
                'calculator_inputs' => [
                    'role' => 'digital_marketing',
                    'teamSize' => 3,
                    'seniority' => 'mid',
                    'annualSavings' => 165000,
                    'savingsPercentage' => 60,
                ],
                'status' => Lead::STATUS_NEW,
                'assigned_to' => null, // Intentionally unassigned for testing Admin allocation
                'source' => 'landing_page',
                'notes' => 'High-growth Shopify Plus brand looking for dedicated performance marketing ops, creative asset production, and HubSpot automation experts.',
                'ip_address' => '198.51.100.12',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_4 like Mac OS X)',
                'created_at' => now()->subHours(6),
            ]
        );

        LeadNote::create([
            'lead_id' => $lead5->id,
            'user_id' => $admin->id,
            'stage_snapshot' => Lead::STATUS_NEW,
            'note' => 'New inbound lead ingested from web capture. High-value prospect in e-commerce vertical. Ready for Account Executive assignment.',
            'created_at' => now()->subHours(5),
        ]);
    }
}
