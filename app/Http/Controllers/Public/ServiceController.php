<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ServiceController extends Controller
{
    /**
     * Complete repository of enterprise services offered by NileBridge.
     */
    protected array $services = [
        'call-center-customer-experience' => [
            'slug' => 'call-center-customer-experience',
            'title' => 'Call Center & Customer Experience',
            'lead_category' => 'customer_support',
            'badge' => 'OMNICHANNEL CUSTOMER EXPERIENCE',
            'tagline' => 'High-empathy, 24/7 omnichannel customer care delivered by Uganda\'s top English-fluent professionals.',
            'description' => 'NileBridge builds and manages dedicated customer experience pods that represent your brand seamlessly. From Tier-1 voice support and live chat to VIP escalation and multilingual coverage, our Kampala talent delivers exceptional CSAT while reducing operating overhead by up to 70%.',
            'meta_title' => 'Call Center & Customer Experience BPO | NileBridge Global Services',
            'meta_description' => 'Deploy dedicated 24/7 omnichannel call center and customer support pods from Uganda. English-fluent, high-empathy professionals delivering >98% CSAT.',
            'metrics' => [
                ['label' => 'CSAT Average', 'value' => '98.5%'],
                ['label' => 'Coverage Window', 'value' => '24/7/365'],
                ['label' => 'Avg Response Time', 'value' => '< 45s'],
                ['label' => 'Realized Cost Savings', 'value' => 'Up to 70%'],
            ],
            'capabilities' => [
                [
                    'title' => 'Inbound & Outbound Voice Care',
                    'desc' => 'Crystal-clear English telephony coverage with neutral accents, native empathy, and rigorous call scripting compliance.',
                    'icon' => 'phone'
                ],
                [
                    'title' => 'Omnichannel Chat & Messaging',
                    'desc' => 'Real-time response on web chat, WhatsApp, SMS, and in-app messaging with sub-minute first-response SLAs.',
                    'icon' => 'chat'
                ],
                [
                    'title' => 'Helpdesk & Email Queues',
                    'desc' => 'High-velocity email ticket resolution, bug reproduction, and escalation triage directly within your existing CRM.',
                    'icon' => 'mail'
                ],
                [
                    'title' => 'VIP & Retention Management',
                    'desc' => 'High-touch churn prevention, account recovery, proactive renewal check-ins, and NPS sentiment tracking.',
                    'icon' => 'star'
                ],
                [
                    'title' => '24/7 Night & Weekend Pods',
                    'desc' => 'Dedicated overnight shift coverage ensuring seamless continuity across US Eastern, Pacific, and European timezones.',
                    'icon' => 'clock'
                ],
                [
                    'title' => 'Continuous QA & Calibration',
                    'desc' => 'Independent quality audit team scoring 100% of calls and transcripts against custom brand guidelines.',
                    'icon' => 'shield'
                ],
            ],
            'tech_stack' => ['Zendesk', 'Salesforce Service Cloud', 'Gorgias', 'Intercom', 'Freshdesk', 'Talkdesk', 'Aircall', 'Five9'],
            'sample_roles' => [
                [
                    'role' => 'Tier-1 Customer Support Specialist',
                    'experience' => '2 - 4 Years',
                    'hourly_rate' => '$7.50 - $9.50 / hr',
                    'monthly_estimate' => 'From $1,200 / mo',
                    'skills' => ['Omnichannel Ticketing', 'Native English', 'CRM Proficiency', 'De-escalation']
                ],
                [
                    'role' => 'Senior CX Escalations Lead',
                    'experience' => '4 - 7 Years',
                    'hourly_rate' => '$10.00 - $12.50 / hr',
                    'monthly_estimate' => 'From $1,650 / mo',
                    'skills' => ['Complex Inquiries', 'VIP Retention', 'SLA Oversight', 'Process Coaching']
                ],
                [
                    'role' => 'Customer Operations Team Leader',
                    'experience' => '6+ Years',
                    'hourly_rate' => '$14.00 - $18.00 / hr',
                    'monthly_estimate' => 'From $2,300 / mo',
                    'skills' => ['Pod Management', 'KPI Calibration', 'Workforce Management', 'Client Reporting']
                ]
            ],
            'compliance_note' => 'Operates in SOC 2 Type II-aligned facilities with biometric perimeter controls, strict mobile-free production floors, and encrypted MDM terminals.',
        ],

        'payment-operations' => [
            'slug' => 'payment-operations',
            'title' => 'Payment Operations & Fraud Management',
            'lead_category' => 'fintech_payments',
            'badge' => 'FINTECH & RISK OPERATIONS',
            'tagline' => 'Rigorous transaction monitoring, chargeback defense, dispute resolution, and KYC compliance for global fintechs.',
            'description' => 'Protect revenue and safeguard processing relationships with dedicated fintech operations pods. Our specialized teams manage chargeback evidence preparation, suspicious activity monitoring, merchant onboarding, and regulatory compliance under strict security protocols.',
            'meta_title' => 'Payment Operations & Dispute BPO | NileBridge Global Services',
            'meta_description' => 'Enterprise payment operations, chargeback mitigation, KYC/AML review, and transaction monitoring pods. PCI-DSS aligned fintech delivery from Uganda.',
            'metrics' => [
                ['label' => 'Dispute Win Rate', 'value' => '78.4%'],
                ['label' => 'Chargeback SLA', 'value' => '< 2 Hours'],
                ['label' => 'Audit Accuracy', 'value' => '99.9%'],
                ['label' => 'Cost Reduction', 'value' => '68%'],
            ],
            'capabilities' => [
                [
                    'title' => 'Chargeback & Dispute Defense',
                    'desc' => 'End-to-end evidence gathering and compelling rebuttal compilation across Visa, Mastercard, Amex, and PayPal networks.',
                    'icon' => 'shield'
                ],
                [
                    'title' => 'Real-Time Transaction Monitoring',
                    'desc' => 'Rapid investigation of flagged transactions, velocity checks, and card-testing patterns to minimize merchant fraud losses.',
                    'icon' => 'chart'
                ],
                [
                    'title' => 'KYC / KYB & Identity Verification',
                    'desc' => 'Document validation, corporate registry cross-checks, PEP/sanctions screening, and adverse media reviews.',
                    'icon' => 'user'
                ],
                [
                    'title' => 'Settlement & Ledger Reconciliations',
                    'desc' => 'Daily processor payouts balancing, fee discrepancy detection, reserve tracking, and accounting journal sync.',
                    'icon' => 'dollar'
                ],
                [
                    'title' => 'Merchant Risk & Underwriting',
                    'desc' => 'Reviewing processing history, processing limits, website compliance, and business model risk factors.',
                    'icon' => 'document'
                ],
                [
                    'title' => 'AML Escalation & SAR Prep',
                    'desc' => 'Suspicious Activity Report preparation and case file structuring for your internal Compliance Officer review.',
                    'icon' => 'scale'
                ],
            ],
            'tech_stack' => ['Stripe', 'Adyen', 'Checkout.com', 'Sift', 'Persona', 'Veriff', 'Plaid', 'Chainalysis', 'NetSuite'],
            'sample_roles' => [
                [
                    'role' => 'Payment Operations Analyst',
                    'experience' => '2 - 5 Years',
                    'hourly_rate' => '$8.50 - $11.00 / hr',
                    'monthly_estimate' => 'From $1,400 / mo',
                    'skills' => ['Dispute Rebuttals', 'Stripe/Adyen Admin', 'Ledger Balancing', 'Chargeback Rules']
                ],
                [
                    'role' => 'Fraud & Risk Investigator',
                    'experience' => '4 - 7 Years',
                    'hourly_rate' => '$11.00 - $14.50 / hr',
                    'monthly_estimate' => 'From $1,850 / mo',
                    'skills' => ['Velocity Analysis', 'SAR Documentation', 'Sift / Rules Engine', 'Device Fingerprinting']
                ],
                [
                    'role' => 'KYC / AML Compliance Specialist',
                    'experience' => '3 - 6 Years',
                    'hourly_rate' => '$9.50 - $13.00 / hr',
                    'monthly_estimate' => 'From $1,600 / mo',
                    'skills' => ['Sanctions Screening', 'KYB Registry Review', 'PEP Monitoring', 'Audit Logs']
                ]
            ],
            'compliance_note' => 'Strict zero-retention policy, dedicated VPN tunneling, segregated VLANs, and clean-room environments aligned with PCI-DSS Level 1 standards.',
        ],

        'back-office-operations' => [
            'slug' => 'back-office-operations',
            'title' => 'Back-Office Operations & Data Processing',
            'lead_category' => 'back_office',
            'badge' => 'ENTERPRISE OPERATIONAL EXCELLENCE',
            'tagline' => 'Streamline document indexing, data enrichment, catalog processing, and high-volume administrative workflows.',
            'description' => 'Eliminate administrative bottlenecks and accelerate business cycle times with dedicated back-office pods. Our Kampala analysts handle invoice reconciliation, catalog indexing, policy moderation, and data cleansing with rigorous 99.8%+ accuracy guarantees.',
            'meta_title' => 'Back-Office Operations & Data Processing BPO | NileBridge',
            'meta_description' => 'Enterprise back-office processing, invoice management, data enrichment, and catalog administration from Uganda. High accuracy, high throughput.',
            'metrics' => [
                ['label' => 'Data Accuracy', 'value' => '99.8%'],
                ['label' => 'Throughput Turnaround', 'value' => '< 24 Hours'],
                ['label' => 'Daily Record Volume', 'value' => '150,000+'],
                ['label' => 'Cost Savings', 'value' => 'Up to 72%'],
            ],
            'capabilities' => [
                [
                    'title' => 'High-Volume Data Cleansing & Entry',
                    'desc' => 'Dual-entry verification, format standardizations, database deduping, and enrichment across enterprise ERPs.',
                    'icon' => 'database'
                ],
                [
                    'title' => 'Accounts Payable & Invoice Matching',
                    'desc' => '3-way matching of purchase orders, receiving slips, and vendor invoices with automated exception routing.',
                    'icon' => 'dollar'
                ],
                [
                    'title' => 'Document Verification & OCR Review',
                    'desc' => 'Human-in-the-loop validation of scanned contracts, legal affidavits, proof of address, and customs filings.',
                    'icon' => 'document'
                ],
                [
                    'title' => 'Catalog & Inventory Administration',
                    'desc' => 'SKU attributes population, category taxonomy tagging, vendor feed ingestion, and pricing audits.',
                    'icon' => 'cart'
                ],
                [
                    'title' => 'Content Moderation & Trust & Safety',
                    'desc' => '24/7 review of user-generated content, policy compliance checks, marketplace listings audit, and brand safety.',
                    'icon' => 'shield'
                ],
                [
                    'title' => 'Virtual Executive Administration',
                    'desc' => 'Calendar scheduling, executive travel coordination, research briefs, and CRM updates for leadership teams.',
                    'icon' => 'user'
                ],
            ],
            'tech_stack' => ['NetSuite', 'QuickBooks', 'SAP', 'Salesforce', 'Airtable', 'Google Workspace', 'DocuSign', 'Hubspot'],
            'sample_roles' => [
                [
                    'role' => 'Data Processing Specialist',
                    'experience' => '2 - 4 Years',
                    'hourly_rate' => '$6.50 - $8.50 / hr',
                    'monthly_estimate' => 'From $1,100 / mo',
                    'skills' => ['Advanced Excel', 'ERP Ingestion', 'Typing 65+ WPM', 'Dual-Entry Audit']
                ],
                [
                    'role' => 'Accounts Payable / Reconciliation Clerk',
                    'experience' => '3 - 5 Years',
                    'hourly_rate' => '$8.00 - $11.00 / hr',
                    'monthly_estimate' => 'From $1,350 / mo',
                    'skills' => ['3-Way Matching', 'QuickBooks/NetSuite', 'GL Coding', 'Vendor Comms']
                ],
                [
                    'role' => 'Operations Quality Lead',
                    'experience' => '5+ Years',
                    'hourly_rate' => '$11.00 - $15.00 / hr',
                    'monthly_estimate' => 'From $1,800 / mo',
                    'skills' => ['Process Mapping', 'Error Rate Audits', 'SOP Creation', 'Weekly Reporting']
                ]
            ],
            'compliance_note' => 'Strict non-disclosure agreements (NDA), multi-factor authenticated VDI workstations, and daily automated audit logs for complete governance.',
        ],

        'technical-support' => [
            'slug' => 'technical-support',
            'title' => 'Technical Support & L1-L3 Service Desk',
            'lead_category' => 'technical_support',
            'badge' => 'TIER-1 TO TIER-3 TECHNICAL HELPDESK',
            'tagline' => 'Expert software debugging, API troubleshooting, cloud infrastructure incident triage, and hardware helpdesk.',
            'description' => 'Free your core engineering team from repetitive support tickets. NileBridge provides university-educated computer science and IT professionals in Kampala to handle developer support, API troubleshooting, bug triage, and cloud infrastructure monitoring 24/7.',
            'meta_title' => 'Technical Support & L1-L3 Service Desk BPO | NileBridge',
            'meta_description' => 'Dedicated technical helpdesk, API support, bug triage, and 24/7 incident monitoring from Uganda. Graduate software talent at 65% realized savings.',
            'metrics' => [
                ['label' => 'First-Contact Resolution', 'value' => '86.2%'],
                ['label' => 'P1 Incident Response', 'value' => '< 12 Mins'],
                ['label' => 'Customer Retention', 'value' => '99.4%'],
                ['label' => 'Cost Savings', 'value' => '65%'],
            ],
            'capabilities' => [
                [
                    'title' => 'API & Webhook Troubleshooting',
                    'desc' => 'Analyzing payloads, header authentications, rate limits, and JSON request/response logs to assist developer clients.',
                    'icon' => 'code'
                ],
                [
                    'title' => 'Bug Reproduction & Jira Triage',
                    'desc' => 'Verifying user bugs, capturing console errors, formulating structured reproduction steps, and escalating cleanly.',
                    'icon' => 'bug'
                ],
                [
                    'title' => '24/7 Infrastructure Incident Watch',
                    'desc' => 'Continuous monitoring of alerts via Datadog, PagerDuty, and Grafana with immediate on-call engineering dispatch.',
                    'icon' => 'bell'
                ],
                [
                    'title' => 'Identity & Access Management (IAM)',
                    'desc' => 'Employee provisioning, SSO SAML setup, MFA resets, and directory permissions via Okta and Azure AD.',
                    'icon' => 'key'
                ],
                [
                    'title' => 'Knowledge Base & Runbook Authoring',
                    'desc' => 'Writing developer documentation, help center tutorials, and internal operational runbooks to reduce ticket volume.',
                    'icon' => 'document'
                ],
                [
                    'title' => 'Hardware & MDM Helpdesk',
                    'desc' => 'Remote endpoint troubleshooting, VPN configuration, OS patching, and antivirus policy enforcement.',
                    'icon' => 'computer'
                ],
            ],
            'tech_stack' => ['Jira Service Management', 'ServiceNow', 'Postman', 'Datadog', 'PagerDuty', 'GitHub', 'AWS Console', 'Okta', 'Zendesk'],
            'sample_roles' => [
                [
                    'role' => 'L1/L2 Technical Support Engineer',
                    'experience' => '2 - 4 Years',
                    'hourly_rate' => '$9.50 - $13.00 / hr',
                    'monthly_estimate' => 'From $1,550 / mo',
                    'skills' => ['API Debugging', 'SQL Queries', 'Log Analysis', 'Jira / ServiceNow']
                ],
                [
                    'role' => 'Cloud & DevOps Support Associate',
                    'experience' => '4 - 6 Years',
                    'hourly_rate' => '$14.00 - $19.00 / hr',
                    'monthly_estimate' => 'From $2,300 / mo',
                    'skills' => ['AWS/GCP Basics', 'Docker', 'CI/CD Triage', 'Monitoring Stack']
                ],
                [
                    'role' => 'Technical Operations Manager',
                    'experience' => '6+ Years',
                    'hourly_rate' => '$18.00 - $24.00 / hr',
                    'monthly_estimate' => 'From $2,950 / mo',
                    'skills' => ['Incident Management', 'SLA Engineering', 'ITIL Framework', 'Escalations']
                ]
            ],
            'compliance_note' => 'Strict role-based access control (RBAC), multi-factor hardware security tokens, and comprehensive session recording capabilities.',
        ],

        'digital-ecommerce-operations' => [
            'slug' => 'digital-ecommerce-operations',
            'title' => 'Digital & E-commerce Operations',
            'lead_category' => 'ecommerce_digital',
            'badge' => 'OMNICHANNEL STOREFRONT OPERATIONS',
            'tagline' => 'End-to-end storefront management, catalog optimization, live order fulfillment tracking, and multichannel customer care.',
            'description' => 'Scale your e-commerce operations across Shopify, Amazon, and marketplaces without expanding internal overhead. Our specialized e-commerce pods handle order exceptions, catalog indexing, customer returns, supplier follow-ups, and live pre-sales chat 24/7.',
            'meta_title' => 'Digital & E-commerce Operations BPO | NileBridge Global Services',
            'meta_description' => 'Dedicated e-commerce operations teams for Shopify, Amazon, and marketplaces. Order fulfillment tracking, catalog management, and pre-sales care from Uganda.',
            'metrics' => [
                ['label' => 'Order Exception Speed', 'value' => '< 25 Mins'],
                ['label' => 'Catalog Ingestion SLA', 'value' => '99.9%'],
                ['label' => 'Peak Season Scaling', 'value' => '5x Ramp in 7d'],
                ['label' => 'Realized Savings', 'value' => '68%'],
            ],
            'capabilities' => [
                [
                    'title' => 'Product Catalog & SKU Indexing',
                    'desc' => 'Writing SEO product descriptions, editing lifestyle photos, configuring variant options, and managing category trees.',
                    'icon' => 'cart'
                ],
                [
                    'title' => 'Order Processing & Exception Handling',
                    'desc' => 'Address verification, fraud checks, split-shipment coordination, and delivery tracking troubleshooting.',
                    'icon' => 'truck'
                ],
                [
                    'title' => 'Returns & Refund (RMA) Administration',
                    'desc' => 'Processing return labels, inventory return inspections, store credit issuance, and return policy enforcement.',
                    'icon' => 'refresh'
                ],
                [
                    'title' => 'Marketplace Management (Amazon / Walmart)',
                    'desc' => 'Buy-box monitoring, listing suppression fixes, stranded inventory recovery, and customer review responses.',
                    'icon' => 'shop'
                ],
                [
                    'title' => 'Pre-Sales Chat & Cart Recovery',
                    'desc' => 'Active live chat assistance answering sizing questions, shipping inquiries, and recovering abandoned checkouts.',
                    'icon' => 'chat'
                ],
                [
                    'title' => 'Multichannel Customer Support',
                    'desc' => 'Unifying email, Instagram DMs, Facebook messages, and TikTok shop comments into one streamlined inbox.',
                    'icon' => 'heart'
                ],
            ],
            'tech_stack' => ['Shopify Plus', 'Magento', 'Amazon Seller Central', 'Gorgias', 'Klaviyo', 'ShipBob', 'ChannelEngine', 'Zendesk'],
            'sample_roles' => [
                [
                    'role' => 'E-commerce Support & Operations Rep',
                    'experience' => '2 - 4 Years',
                    'hourly_rate' => '$7.50 - $9.50 / hr',
                    'monthly_estimate' => 'From $1,250 / mo',
                    'skills' => ['Shopify Admin', 'Gorgias / Zendesk', 'Order Tracking', 'RMA Processing']
                ],
                [
                    'role' => 'Catalog & Marketplace Specialist',
                    'experience' => '3 - 5 Years',
                    'hourly_rate' => '$9.00 - $12.00 / hr',
                    'monthly_estimate' => 'From $1,500 / mo',
                    'skills' => ['Amazon Seller Central', 'SKU Uploads', 'Feed Optimization', 'SEO Copy']
                ],
                [
                    'role' => 'E-commerce Operations Supervisor',
                    'experience' => '5+ Years',
                    'hourly_rate' => '$12.00 - $16.00 / hr',
                    'monthly_estimate' => 'From $2,000 / mo',
                    'skills' => ['Warehouse SLA Sync', 'Peak Season Planning', 'Chargeback Defense', 'Analytics']
                ]
            ],
            'compliance_note' => 'PCI-DSS compliance with secure payment gateway handoffs, encrypted session tokens, and strict GDPR customer data erasure protocols.',
        ],

        'healthcare-administration' => [
            'slug' => 'healthcare-administration',
            'title' => 'Healthcare Administration & Medical BPO',
            'lead_category' => 'healthcare_admin',
            'badge' => 'HIPAA-COMPLIANT HEALTHCARE BPO',
            'tagline' => 'HIPAA-compliant patient scheduling, insurance verification, medical billing, prior authorization, and care coordination.',
            'description' => 'Alleviate clinical staff burnout and accelerate billing cycles. NileBridge deploys medically trained administrative teams in Kampala to handle patient intake, insurance eligibility, medical coding, claims reconciliation, and prior authorizations under strict HIPAA standards.',
            'meta_title' => 'Healthcare Administration & Medical BPO | NileBridge Global Services',
            'meta_description' => 'Dedicated HIPAA-compliant healthcare administration pods from Uganda. Patient scheduling, insurance verification, and medical billing at 65% lower overhead.',
            'metrics' => [
                ['label' => 'HIPAA Compliance', 'value' => '100% Audited'],
                ['label' => 'First-Pass Claims Rate', 'value' => '98.2%'],
                ['label' => 'Prior Auth SLA', 'value' => '< 24 Hours'],
                ['label' => 'Administrative Savings', 'value' => '65%'],
            ],
            'capabilities' => [
                [
                    'title' => 'Patient Scheduling & Intake',
                    'desc' => 'Booking appointments, appointment reminder calls, telehealth pre-screenings, and intake form completion assistance.',
                    'icon' => 'calendar'
                ],
                [
                    'title' => 'Insurance Eligibility Verification',
                    'desc' => 'Real-time verification of copays, deductibles, coinsurance, in-network coverage, and secondary policies.',
                    'icon' => 'check'
                ],
                [
                    'title' => 'Prior Authorization Processing',
                    'desc' => 'Gathering clinical notes, submitting payer authorization portals, and proactive tracking to eliminate care delays.',
                    'icon' => 'document'
                ],
                [
                    'title' => 'Medical Billing & Claims Scrubbing',
                    'desc' => 'Accurate ICD-10/CPT coding review, claim error scrubbing, electronic clearinghouse submissions, and denial appeals.',
                    'icon' => 'dollar'
                ],
                [
                    'title' => 'Accounts Receivable (A/R) Follow-Up',
                    'desc' => 'Working aging insurance claims, payer payment inquiries, patient billing queries, and payment plan setups.',
                    'icon' => 'clock'
                ],
                [
                    'title' => 'Medical Records & EMR Indexing',
                    'desc' => 'Secure routing of diagnostic lab reports, specialist referrals, prescription refill coordination, and HIPAA disclosures.',
                    'icon' => 'file'
                ],
            ],
            'tech_stack' => ['Epic', 'Cerner', 'AthenaHealth', 'Kareo', 'AdvancedMD', 'DrChrono', 'NextGen', 'Availity', 'Office Ally'],
            'sample_roles' => [
                [
                    'role' => 'Patient Care Coordinator / Intake Specialist',
                    'experience' => '2 - 4 Years',
                    'hourly_rate' => '$8.50 - $11.00 / hr',
                    'monthly_estimate' => 'From $1,400 / mo',
                    'skills' => ['EMR Scheduling', 'Insurance Portals', 'Medical Terminology', 'Compassionate Voice']
                ],
                [
                    'role' => 'Certified Medical Billing & Coding Specialist',
                    'experience' => '3 - 6 Years',
                    'hourly_rate' => '$10.00 - $14.00 / hr',
                    'monthly_estimate' => 'From $1,650 / mo',
                    'skills' => ['ICD-10 / CPT', 'Denial Management', 'Availity Cleans', 'Appeals Letters']
                ],
                [
                    'role' => 'Prior Authorization Team Lead',
                    'experience' => '5+ Years',
                    'hourly_rate' => '$13.00 - $17.50 / hr',
                    'monthly_estimate' => 'From $2,200 / mo',
                    'skills' => ['Payer Formularies', 'Clinical Documentation', 'Urgent Escalations', 'HIPAA Audits']
                ]
            ],
            'compliance_note' => '100% HIPAA Business Associate Agreement (BAA) execution, biometric isolated healthcare pods, dedicated zero-storage thin clients, and encrypted telecommunications.',
        ],
    ];

    /**
     * Show the detailed page for a specific service.
     */
    public function show(string $slug): View
    {
        if (!array_key_exists($slug, $this->services)) {
            throw new NotFoundHttpException("Service [{$slug}] not found.");
        }

        $service = $this->services[$slug];
        
        // Find other related services for bottom cards
        $otherServices = array_filter($this->services, fn($k) => $k !== $slug, ARRAY_FILTER_USE_KEY);

        return view('pages.service-detail', [
            'service' => $service,
            'otherServices' => array_slice($otherServices, 0, 3),
            'title' => $service['meta_title'],
        ]);
    }
}

