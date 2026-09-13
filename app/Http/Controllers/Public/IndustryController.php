<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndustryController extends Controller
{
    /**
     * Complete repository of enterprise industries served by NileBridge.
     */
    protected array $industries = [
        'ecommerce' => [
            'slug' => 'ecommerce',
            'title' => 'E-commerce & Retail BPO',
            'lead_category' => 'ecommerce_digital',
            'badge' => 'RETAIL & D2C OPERATIONAL PODS',
            'tagline' => 'Scale customer support, catalog management, and order fulfillment across Black Friday, peak seasons, and 24/7 shopping cycles.',
            'description' => 'Modern consumers expect instant support across email, live chat, WhatsApp, and social media. NileBridge deploys specialized e-commerce operations pods in Kampala to manage customer returns, resolve courier exceptions, enrich product catalogs, and recover abandoned carts at up to 70% lower cost.',
            'meta_title' => 'E-commerce & Retail BPO Solutions | NileBridge Global Services',
            'meta_description' => 'Dedicated e-commerce support, catalog management, order fulfillment tracking, and multichannel customer care from Uganda. Scale peak seasons seamlessly.',
            'metrics' => [
                ['label' => 'CSAT Average', 'value' => '98.2%'],
                ['label' => 'Order Exception SLA', 'value' => '< 20 Mins'],
                ['label' => 'Peak Ramp Velocity', 'value' => '5x in 7 Days'],
                ['label' => 'Average Cost Savings', 'value' => '68%'],
            ],
            'challenges' => [
                ['title' => 'Unpredictable Peak Surges', 'desc' => 'Holiday surges (Q4, Black Friday) cause ticket backlogs. Our flexible pods scale headcount rapidly without long-term domestic overhead.'],
                ['title' => 'Multichannel Fragmentation', 'desc' => 'Shoppers reach out across TikTok, Instagram, email, and live chat. We unify responses into Gorgias and Zendesk with sub-minute response times.'],
                ['title' => 'High Return & Logistics Costs', 'desc' => 'Slow RMA processing damages retention. Our dedicated coordinators handle carrier exceptions and return tracking proactively.'],
            ],
            'capabilities' => [
                ['title' => 'Multichannel Customer Support', 'desc' => 'Live chat, email, phone, and social media care focusing on sizing questions, order tracking, and high-empathy de-escalation.'],
                ['title' => 'Product Catalog & SKU Ingestion', 'desc' => 'Listing optimization, SEO copy, attribute tagging, variant creation, and image processing for Shopify and marketplaces.'],
                ['title' => 'Order Fulfillment & Exception Routing', 'desc' => 'Investigating lost packages, carrier tracking inquiries, address corrections, and warehouse dispatch escalations.'],
                ['title' => 'Returns & Exchange (RMA) Processing', 'desc' => 'Issuing return shipping labels, validating warehouse return inspection notes, and processing refunds or store credits.'],
                ['title' => 'Pre-Sales Assistance & Cart Recovery', 'desc' => 'Engaging on-site shoppers, answering product questions in real-time, and following up on abandoned carts.'],
                ['title' => 'Marketplace Listing Health', 'desc' => 'Buy-box monitoring, negative review responses, Amazon brand registry management, and stranded inventory fixes.'],
            ],
            'roles' => [
                ['role' => 'E-commerce CX Specialist', 'exp' => '2 - 4 Years', 'rate' => '$7.50 - $9.50 / hr', 'monthly' => 'From $1,250 / mo', 'skills' => ['Shopify / Gorgias', 'Order Tracking', 'RMA Handling']],
                ['role' => 'Catalog & Marketplace Associate', 'exp' => '3 - 5 Years', 'rate' => '$9.00 - $12.00 / hr', 'monthly' => 'From $1,500 / mo', 'skills' => ['Amazon Seller Central', 'SKU Uploads', 'Feed Optimization']],
                ['role' => 'E-commerce Pod Team Leader', 'exp' => '5+ Years', 'rate' => '$12.00 - $16.00 / hr', 'monthly' => 'From $2,000 / mo', 'skills' => ['Shift Roster Management', 'SLA Calibration', 'CSAT Analytics']],
            ],
            'governance' => 'PCI-DSS compliant workstations, encrypted customer payment handoffs, and GDPR consumer data rights enforcement.',
        ],

        'saas-technology' => [
            'slug' => 'saas-technology',
            'title' => 'SaaS & High-Growth Technology',
            'lead_category' => 'technical_support',
            'badge' => 'SOFTWARE & CLOUD BPO',
            'tagline' => 'Accelerate product adoption, triage technical incidents, and deliver 24/7 technical customer support.',
            'description' => 'Fast-growing software companies need technical professionals who understand webhooks, APIs, user provisioning, and bug triage. NileBridge connects B2B and B2C software platforms with university-educated engineers and customer success reps in Kampala to reduce churn and protect net revenue retention.',
            'meta_title' => 'SaaS & Technology Outsourcing Solutions | NileBridge Global Services',
            'meta_description' => 'Dedicated customer success, technical support, API troubleshooting, and 24/7 incident triage for SaaS platforms from Uganda. Graduate engineering talent.',
            'metrics' => [
                ['label' => 'First-Contact Resolution', 'value' => '87.4%'],
                ['label' => 'P1 Incident Acknowledge', 'value' => '< 15 Mins'],
                ['label' => 'Customer Retention SLA', 'value' => '99.5%'],
                ['label' => 'Annual Cost Reduction', 'value' => '65%'],
            ],
            'challenges' => [
                ['title' => 'Engineers Trapped in Support', 'desc' => 'Core developers spend 30% of their time answering customer tickets. Our L1/L2 engineers triage bugs and repro steps so your devs can ship code.'],
                ['title' => 'Global Customer Timezones', 'desc' => 'International users expect round-the-clock help. Our Kampala pods provide seamless coverage across London, New York, and San Francisco.'],
                ['title' => 'Churn from Onboarding Friction', 'desc' => 'Users churn if not onboarded quickly. Our technical success associates walk new accounts through setup and configuration.'],
            ],
            'capabilities' => [
                ['title' => 'Tier-1 & Tier-2 Software Helpdesk', 'desc' => 'In-depth app troubleshooting, configuration assistance, browser console inspection, and reproduction step documentation.'],
                ['title' => 'API, Webhook & Integration Support', 'desc' => 'Assisting customer developers with authorization headers, REST payload errors, endpoint debugging, and rate limit advice.'],
                ['title' => 'Bug Reproduction & Jira Escalation', 'desc' => 'Verifying reproducible errors, capturing network HAR files, formulating Jira bug cards, and tagging engineering pods.'],
                ['title' => 'User Onboarding & Product Tours', 'desc' => 'Guiding newly signed enterprise accounts through SSO setup, data import, user invitations, and basic workflow creation.'],
                ['title' => '24/7 Infrastructure Incident Watch', 'desc' => 'Monitoring uptime alerts via Datadog, PagerDuty, and Grafana with immediate runbook-guided triage and on-call paging.'],
                ['title' => 'Knowledge Base & Release Notes', 'desc' => 'Drafting clear technical articles, how-to guides, and public changelog updates to deflect recurring incoming tickets.'],
            ],
            'roles' => [
                ['role' => 'L1/L2 Technical Support Specialist', 'exp' => '2 - 4 Years', 'rate' => '$9.50 - $13.00 / hr', 'monthly' => 'From $1,550 / mo', 'skills' => ['API Debugging', 'Jira / Zendesk', 'SQL Queries']],
                ['role' => 'Customer Success Specialist', 'exp' => '3 - 6 Years', 'rate' => '$11.00 - $15.00 / hr', 'monthly' => 'From $1,800 / mo', 'skills' => ['Account Onboarding', 'Health Scoring', 'Renewal Check-ins']],
                ['role' => 'Cloud Systems & DevOps Associate', 'exp' => '4 - 7 Years', 'rate' => '$14.00 - $19.00 / hr', 'monthly' => 'From $2,300 / mo', 'skills' => ['AWS / GCP Basics', 'Docker', 'Monitoring Stack']],
            ],
            'governance' => 'SOC 2 Type II compliance, hardware MFA security tokens, strictly isolated client tenant environments, and comprehensive audit logs.',
        ],

        'fintech-payments' => [
            'slug' => 'fintech-payments',
            'title' => 'Fintech & Digital Payments',
            'lead_category' => 'fintech_payments',
            'badge' => 'FINANCIAL TECHNOLOGY & RISK BPO',
            'tagline' => 'Protect margins, fight payment fraud, mitigate chargebacks, and maintain rigorous regulatory compliance.',
            'description' => 'Fintech platforms operate in high-risk, 24/7 environments where fraudulent transactions and chargebacks directly erode margins. NileBridge builds dedicated risk operations, KYC verification, dispute defense, and settlement reconciliation pods operating under strict zero-trust security standards.',
            'meta_title' => 'Fintech & Payments Outsourcing Solutions | NileBridge Global Services',
            'meta_description' => 'Dedicated fintech operations pods from Uganda. Chargeback mitigation, KYC/AML review, fraud pattern monitoring, and settlement audits at 68% savings.',
            'metrics' => [
                ['label' => 'Dispute Win Rate', 'value' => '78.4%'],
                ['label' => 'Chargeback SLA', 'value' => '< 2 Hours'],
                ['label' => 'Audit Accuracy', 'value' => '99.9%'],
                ['label' => 'Realized Savings', 'value' => '68%'],
            ],
            'challenges' => [
                ['title' => 'Aggressive Chargeback Deadlines', 'desc' => 'Processor dispute windows are short and unforgiving. Our 24/7 teams respond with tailored evidence packages within hours.'],
                ['title' => 'Surging Onboarding Fraud', 'desc' => 'Synthetic identities and bot attacks overwhelm automated KYC. Our human-in-the-loop analysts catch sophisticated fraudulent documents.'],
                ['title' => 'Complex Ledger Reconciliations', 'desc' => 'Daily payouts across multiple acquirers cause balance discrepancies. Our accounting pods balance books daily without fail.'],
            ],
            'capabilities' => [
                ['title' => 'Visa / Mastercard Dispute Defense', 'desc' => 'Compiling compelling rebuttal packages, proof of delivery, IP logs, and customer communications to win back disputed funds.'],
                ['title' => 'Real-Time Fraud Pattern Monitoring', 'desc' => 'Investigating card-testing attacks, sudden velocity spikes, device fingerprint irregularities, and unauthorized logins.'],
                ['title' => 'KYC / KYB & Beneficial Owner Reviews', 'desc' => 'Verifying corporate registry filings, government IDs, proof of address, sanctions lists, and politically exposed persons (PEP).'],
                ['title' => 'Processor Payout & Fee Reconciliations', 'desc' => 'Cross-referencing Stripe/Adyen gross settlement files against merchant bank accounts and internal database ledger entries.'],
                ['title' => 'Transaction Exception Handling', 'desc' => 'Reviewing stuck ACH transfers, wire payment rejections, currency conversion delays, and charge reversal requests.'],
                ['title' => 'AML Escalations & SAR Preparation', 'desc' => 'Structuring audit-ready suspicious activity dossiers for final sign-off by your in-house Chief Compliance Officer.'],
            ],
            'roles' => [
                ['role' => 'Payment Operations Analyst', 'exp' => '2 - 5 Years', 'rate' => '$8.50 - $11.00 / hr', 'monthly' => 'From $1,400 / mo', 'skills' => ['Dispute Evidence', 'Stripe / Adyen', 'Ledger Balancing']],
                ['role' => 'Fraud & Risk Investigator', 'exp' => '4 - 7 Years', 'rate' => '$11.00 - $14.50 / hr', 'monthly' => 'From $1,850 / mo', 'skills' => ['Velocity Analysis', 'Sift / Rules Engine', 'Case Files']],
                ['role' => 'KYC / AML Compliance Specialist', 'exp' => '3 - 6 Years', 'rate' => '$9.50 - $13.00 / hr', 'monthly' => 'From $1,600 / mo', 'skills' => ['Sanctions Screening', 'KYB Registries', 'Audit Logs']],
            ],
            'governance' => 'PCI-DSS Level 1 aligned, clean-room mobile-free floors, dedicated VPN tunneling, and zero local data caching.',
        ],

        'healthcare' => [
            'slug' => 'healthcare',
            'title' => 'Healthcare & HealthTech Administration',
            'lead_category' => 'healthcare_admin',
            'badge' => 'HIPAA-COMPLIANT MEDICAL BPO',
            'tagline' => 'Alleviate clinical burnout with compliant patient scheduling, insurance verification, and claims management.',
            'description' => 'Medical practices, digital health clinics, and telehealth providers face severe administrative burdens. NileBridge supplies medically trained administrative pods in Kampala to execute patient intake, insurance eligibility checks, prior authorizations, and medical coding under complete HIPAA compliance.',
            'meta_title' => 'Healthcare & HealthTech Outsourcing Solutions | NileBridge Global Services',
            'meta_description' => 'HIPAA-compliant healthcare administration pods from Uganda. Patient scheduling, insurance verification, and medical billing at 65% lower overhead.',
            'metrics' => [
                ['label' => 'HIPAA Compliance', 'value' => '100% Audited'],
                ['label' => 'First-Pass Claims Rate', 'value' => '98.2%'],
                ['label' => 'Prior Auth Turnaround', 'value' => '< 24 Hours'],
                ['label' => 'Administrative Savings', 'value' => '65%'],
            ],
            'challenges' => [
                ['title' => 'Severe Front-Desk Burnout', 'desc' => 'Clinical staff drown in calls and paperwork. Our offshore pods handle patient scheduling and reminders so in-clinic staff focus on care.'],
                ['title' => 'High Claim Denial Rates', 'desc' => 'Minor coding or demographic errors delay insurance reimbursements. Our scrubbers verify every claim before submission.'],
                ['title' => 'Prior Authorization Delays', 'desc' => 'Patients wait weeks for insurer approval. Our dedicated prior-auth associates compile clinical notes and follow up daily.'],
            ],
            'capabilities' => [
                ['title' => 'Patient Intake & Telehealth Scheduling', 'desc' => 'Managing phone scheduling, intake questionnaire reviews, consent documentation, and appointment calendar updates in your EMR.'],
                ['title' => 'Real-Time Insurance Verification', 'desc' => 'Confirming active coverage, deductible balances, copays, out-of-pocket maximums, and secondary policy coordination.'],
                ['title' => 'Prior Authorization Management', 'desc' => 'Submitting clinical documentation to payer portals, tracking approval status, and managing urgent peer-to-peer review scheduling.'],
                ['title' => 'Medical Billing & ICD-10 Coding', 'desc' => 'Scrubbing charges, applying appropriate CPT modifiers, submitting clearinghouse batches, and appealing medical necessity denials.'],
                ['title' => 'Aging Accounts Receivable (A/R)', 'desc' => 'Systematically working unpaid claims over 30/60/90 days, checking payer remits, and resolving coordination-of-benefits issues.'],
                ['title' => 'Prescription Refills & Lab Coordination', 'desc' => 'Routing lab and diagnostic reports to physician charts, coordinating routine medication refill requests, and patient follow-ups.'],
            ],
            'roles' => [
                ['role' => 'Patient Care Coordinator', 'exp' => '2 - 4 Years', 'rate' => '$8.50 - $11.00 / hr', 'monthly' => 'From $1,400 / mo', 'skills' => ['EMR Scheduling', 'Insurance Portals', 'Compassionate Voice']],
                ['role' => 'Certified Medical Biller & Coder', 'exp' => '3 - 6 Years', 'rate' => '$10.00 - $14.00 / hr', 'monthly' => 'From $1,650 / mo', 'skills' => ['ICD-10 / CPT', 'Denial Appeals', 'Clearinghouse Batches']],
                ['role' => 'Prior Authorization Specialist', 'exp' => '4 - 7 Years', 'rate' => '$11.50 - $15.00 / hr', 'monthly' => 'From $1,900 / mo', 'skills' => ['Payer Portals', 'Clinical Documentation', 'Urgent Escalations']],
            ],
            'governance' => '100% HIPAA Business Associate Agreement (BAA) execution, dedicated thin clients without local drives, and biometric isolated healthcare wings.',
        ],

        'education' => [
            'slug' => 'education',
            'title' => 'Education & EdTech Solutions',
            'lead_category' => 'back_office',
            'badge' => 'EDTECH & ACADEMIC INSTITUTIONS',
            'tagline' => 'Power student enrollment, tutor onboarding, grading support, and 24/7 academic learner assistance.',
            'description' => 'Online universities, K-12 platforms, and EdTech startups need compassionate, highly educated support teams. Uganda boasts the highest English fluency in East Africa with thousands of top university graduates ready to handle student advising, enrollment verification, LMS administration, and technical classroom help.',
            'meta_title' => 'Education & EdTech Outsourcing Solutions | NileBridge Global Services',
            'meta_description' => 'Dedicated EdTech support, student admissions coordination, LMS administration, and 24/7 learner helpdesk from Uganda. High English fluency graduates.',
            'metrics' => [
                ['label' => 'Learner CSAT', 'value' => '98.9%'],
                ['label' => 'Enrollment Conversion', 'value' => '+24%'],
                ['label' => 'Response Time', 'value' => '< 30s'],
                ['label' => 'Operational Savings', 'value' => '70%'],
            ],
            'challenges' => [
                ['title' => 'Enrollment Drop-off', 'desc' => 'Prospective students abandon applications if questions are not answered immediately. Our enrollment advisors follow up within minutes.'],
                ['title' => 'Live Classroom Glitches', 'desc' => 'Technical issues derail online lessons. Our live support reps troubleshoot student audio/video connectivity in real-time.'],
                ['title' => 'Tutor Onboarding Bottlenecks', 'desc' => 'Vetting hundreds of educators slows expansion. We handle degree verification, background checks, and platform training.'],
            ],
            'capabilities' => [
                ['title' => 'Admissions & Enrollment Advising', 'desc' => 'Guiding prospective learners through program selection, tuition financing questions, transcript requests, and form completion.'],
                ['title' => '24/7 Student Technical Helpdesk', 'desc' => 'Assisting learners with password resets, quiz submission errors, browser compatibility, and video streaming issues in Canvas and Moodle.'],
                ['title' => 'Instructor & Tutor Onboarding', 'desc' => 'Conducting identity verification, academic credential validation, mock lesson scheduling, and contract document collection.'],
                ['title' => 'Curriculum & LMS Administration', 'desc' => 'Uploading course syllabi, setting assignment release dates, configuring grading rubrics, and updating discussion board announcements.'],
                ['title' => 'Grading & Assessment Support', 'desc' => 'Assisting educators with standardized multiple-choice grading, rubric-aligned preliminary feedback, and plagiarism report checks.'],
                ['title' => 'Alumni & Community Engagement', 'desc' => 'Coordinating career services check-ins, webinar attendance confirmations, survey distributions, and alumni newsletter updates.'],
            ],
            'roles' => [
                ['role' => 'Student Success & Admissions Advisor', 'exp' => '2 - 4 Years', 'rate' => '$7.50 - $10.00 / hr', 'monthly' => 'From $1,250 / mo', 'skills' => ['Native English', 'CRM Calling', 'Empathetic Counseling']],
                ['role' => 'LMS & Technical Classroom Specialist', 'exp' => '3 - 5 Years', 'rate' => '$8.50 - $11.50 / hr', 'monthly' => 'From $1,400 / mo', 'skills' => ['Canvas / Moodle', 'Zoom / Webex', 'Account Provisioning']],
                ['role' => 'Academic Operations Team Lead', 'exp' => '5+ Years', 'rate' => '$12.00 - $16.00 / hr', 'monthly' => 'From $2,000 / mo', 'skills' => ['FERPA Compliance', 'Staff Roster Oversight', 'Quality Audits']],
            ],
            'governance' => 'FERPA and GDPR-aligned data privacy protocols, rigorous educator background vetting, and encrypted communication channels.',
        ],

        'financial-services' => [
            'slug' => 'financial-services',
            'title' => 'Financial Services & WealthTech',
            'lead_category' => 'finance_accounting',
            'badge' => 'WEALTHTECH & INSTITUTIONAL FINANCE',
            'tagline' => 'High-accuracy bookkeeping, loan processing, client onboarding, and investment operations support.',
            'description' => 'Commercial lenders, investment managers, accounting firms, and mortgage brokers require exceptional precision. NileBridge connects financial institutions with vetted accounting and finance graduates in Kampala to manage accounts payable, loan file audits, and financial reporting under institutional governance.',
            'meta_title' => 'Financial Services & Accounting BPO | NileBridge Global Services',
            'meta_description' => 'Dedicated financial operations, loan processing, accounts payable, and bookkeeping pods from Uganda. Degree-holding accounting talent at 68% savings.',
            'metrics' => [
                ['label' => 'Reporting Accuracy', 'value' => '99.9%'],
                ['label' => 'File Turnaround', 'value' => '< 24 Hours'],
                ['label' => 'Certified Accountants', 'value' => '100% CPA/ACCA'],
                ['label' => 'Cost Reduction', 'value' => '68%'],
            ],
            'challenges' => [
                ['title' => 'Domestic CPA Staffing Shortage', 'desc' => 'Hiring onshore accountants is increasingly expensive. We provide ACCA-qualified finance professionals with fluent English at a fraction of the cost.'],
                ['title' => 'Peak Tax & Month-End Deadlines', 'desc' => 'Closing books at month-end creates severe overtime crunches. Our pods work continuous shifts to finalize reconciliations by morning.'],
                ['title' => 'Complex Loan Documentation', 'desc' => 'Missing tax returns and bank statements stall loan processing. Our file specialists gather and audit documents methodically.'],
            ],
            'capabilities' => [
                ['title' => 'Full-Cycle Bookkeeping & GL Accounting', 'desc' => 'Daily transaction coding, bank and credit card reconciliations, accruals, and trial balance preparation in QuickBooks and NetSuite.'],
                ['title' => 'Accounts Payable (AP) & 3-Way Matching', 'desc' => 'Processing vendor invoices, purchase order validation, bill payment batch preparation, and W-9 collection.'],
                ['title' => 'Loan File Assembly & Verification', 'desc' => 'Reviewing borrower tax returns (W-2s, 1040s), paystubs, bank statements, credit reports, and collateral documentation for underwriting.'],
                ['title' => 'Financial Statement Preparation', 'desc' => 'Compiling monthly balance sheets, income statements, cash flow forecasts, and departmental variance analysis reports.'],
                ['title' => 'Investor & Client Onboarding', 'desc' => 'Accredited investor document reviews, subscription agreement processing, and ongoing capital call confirmation tracking.'],
                ['title' => 'Payroll Audit & Tax Preparation Support', 'desc' => 'Reviewing timesheets, benefit deductions, payroll register reconciliations, and tax filing documentation assembly.'],
            ],
            'roles' => [
                ['role' => 'Senior Bookkeeper / Staff Accountant', 'exp' => '3 - 5 Years', 'rate' => '$9.00 - $12.50 / hr', 'monthly' => 'From $1,500 / mo', 'skills' => ['QuickBooks / NetSuite', 'GL Balancing', 'Reconciliations']],
                ['role' => 'Loan Processing Specialist', 'exp' => '3 - 6 Years', 'rate' => '$9.50 - $13.50 / hr', 'monthly' => 'From $1,600 / mo', 'skills' => ['Mortgage / Commercial Files', 'Tax Returns', 'Underwriting Prep']],
                ['role' => 'Financial Controller / Team Lead', 'exp' => '6+ Years', 'rate' => '$14.00 - $19.00 / hr', 'monthly' => 'From $2,300 / mo', 'skills' => ['ACCA / CPA Track', 'Audit Defense', 'Financial Modeling']],
            ],
            'governance' => 'Strict segregation of duties, zero-local-storage workstations, dual-authorization payment approvals, and ISO 27001 data governance.',
        ],

        'professional-services' => [
            'slug' => 'professional-services',
            'title' => 'Professional Services & Consulting',
            'lead_category' => 'back_office',
            'badge' => 'LEGAL, CONSULTING & AGENCY OPERATIONS',
            'tagline' => 'Empower legal practices, consulting firms, and agencies with dedicated research, scheduling, and administrative pods.',
            'description' => 'Law firms, management consultancies, recruitment agencies, and creative firms need sharp operational backbones. NileBridge deploys dedicated executive assistants, legal document specialists, market researchers, and billing coordinators to increase partner billable hours and operational agility.',
            'meta_title' => 'Professional Services Outsourcing Solutions | NileBridge Global Services',
            'meta_description' => 'Dedicated administrative, legal documentation, market research, and client billing pods for consulting and professional services firms from Uganda.',
            'metrics' => [
                ['label' => 'Billable Hour Lift', 'value' => '+35%'],
                ['label' => 'Document Turnaround', 'value' => '< 12 Hours'],
                ['label' => 'Quality Score', 'value' => '99.5%'],
                ['label' => 'Overhead Savings', 'value' => '70%'],
            ],
            'challenges' => [
                ['title' => 'Partners Trapped in Admin Tasks', 'desc' => 'High-billing partners spend hours on invoicing, calendar logistics, and document formatting. We reclaim their billable time.'],
                ['title' => 'Slow Market & Legal Research', 'desc' => 'Synthesizing competitor data or legal precedents delays deliverables. Our university-trained researchers produce structured briefs rapidly.'],
                ['title' => 'Erratic Client Billing Cycles', 'desc' => 'Unbilled time tracking leaks revenue. Our billing specialists review timesheets and dispatch client invoices on schedule.'],
            ],
            'capabilities' => [
                ['title' => 'Executive Calendar & Travel Coordination', 'desc' => 'Complex multi-timezone scheduling, flight and hotel bookings, meeting briefing document prep, and email inbox management.'],
                ['title' => 'Legal Document & Contract Review Prep', 'desc' => 'Proofreading legal briefs, Bates numbering, document redlining, standard NDA comparisons, and discovery file indexing.'],
                ['title' => 'Market & Competitor Research Briefs', 'desc' => 'Synthesizing market size data, company profiles, executive bios, industry trends, and producing polished PowerPoint decks.'],
                ['title' => 'Client Time Tracking & Invoicing', 'desc' => 'Auditing employee timesheets against project budgets, preparing retainer invoices, and following up on aging accounts receivable.'],
                ['title' => 'Recruitment Sourcing & Talent Pipeline', 'desc' => 'Sourcing executive candidates on LinkedIn Recruiter, screening resumes, coordinating interview calendars, and reference checks.'],
                ['title' => 'CRM & Pipeline Database Hygiene', 'desc' => 'Enriching deal records in HubSpot and Salesforce, updating client relationship notes, and tracking proposal deadlines.'],
            ],
            'roles' => [
                ['role' => 'Executive Virtual Assistant (EA)', 'exp' => '3 - 5 Years', 'rate' => '$7.50 - $10.50 / hr', 'monthly' => 'From $1,250 / mo', 'skills' => ['Calendar Logistics', 'Inbox Mastery', 'Discretion & Polish']],
                ['role' => 'Market & Business Research Analyst', 'exp' => '3 - 6 Years', 'rate' => '$9.50 - $13.00 / hr', 'monthly' => 'From $1,600 / mo', 'skills' => ['Deck Creation', 'Data Synthesis', 'Financial Metrics']],
                ['role' => 'Legal & Compliance Administrator', 'exp' => '4 - 7 Years', 'rate' => '$11.00 - $15.00 / hr', 'monthly' => 'From $1,850 / mo', 'skills' => ['Contract Redlining', 'Bates Stamping', 'Discovery Files']],
            ],
            'governance' => 'Strict attorney-client confidentiality adherence, customized non-disclosure agreements, encrypted document portals, and access audits.',
        ],
    ];

    /**
     * Display a specific industry detail page.
     */
    public function show(string $slug): View
    {
        if (!array_key_exists($slug, $this->industries)) {
            throw new NotFoundHttpException("Industry [{$slug}] not found.");
        }

        $industry = $this->industries[$slug];

        // Fetch 3 other industries for bottom exploration cards
        $otherIndustries = array_filter($this->industries, fn($k) => $k !== $slug, ARRAY_FILTER_USE_KEY);

        return view('pages.industry-detail', [
            'industry' => $industry,
            'otherIndustries' => array_slice($otherIndustries, 0, 3),
            'title' => $industry['meta_title'],
        ]);
    }
}

