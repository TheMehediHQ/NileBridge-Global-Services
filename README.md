# NileBridge Global Services — Enterprise Monolith

> **Enterprise B2B Global Talent, BPO & Operational Outsourcing Platform**  
> Built with Laravel 11/12, Blade, Tailwind CSS, Alpine.js, and MySQL 8.x.

---

## 🚀 Overview

NileBridge Global Services connects North American, European, and Gulf enterprises with top-tier global software engineers, 24/7 customer support pods, finance analysts, and growth marketing operators—delivering up to **70% cost reduction** with zero compliance friction.

### Key Capabilities & Architectural Highlights
- **High-Converting Landing Page (`/`):** Enterprise hero, stats bar, 4 core service tracks, 4-step onboarding timeline, quantitative performance bar charts, comparison matrix, and multi-column institutional footer.
- **Interactive ROI & Savings Calculator:** Built with reactive Alpine.js state (`x-data="roiCalculator()"`), dynamic team-size sliders (1–50 FTEs), seniority tiers, and one-click data handoff directly into the lead capture form.
- **Enterprise Lead Ingestion (`POST /leads`):** Anti-bot honeypot protection, server-side validation, database transactions, automated initial auditing memo creation, and CRM pipeline progression.
- **Strict 3-Role Access Control (RBAC):** Custom `RoleMiddleware` guarding isolated portals:
  - 👑 **Admin Portal (`/admin`):** Global metrics dashboard, leads data table with search & filtering, Account Executive re-assignment dropdown, lead detail drawer, and one-click CSV export (`/admin/leads/export`).
  - 💼 **Employee / AE Portal (`/portal`):** Scoped strictly to assigned leads, stage transition workflow (`new` $\rightarrow$ `contacted` $\rightarrow$ `qualified` $\rightarrow$ `proposal_sent` $\rightarrow$ `won` $\rightarrow$ `lost`), and internal timeline note-logging.
  - 🏢 **Customer Portal (`/client`):** Enterprise client dashboard tracking active requisitions, dedicated Account Partner contact info, and 4-phase onboarding lifecycle milestones.

---

## 🛠 Tech Stack

- **Backend:** Laravel 11.56.x (PHP 8.2+)
- **Frontend:** Blade Templates, Tailwind CSS 3.4.x, Alpine.js 3.17.x
- **Database:** MySQL 8.0.x (InnoDB, strict SQL mode)
- **Asset Tooling:** Bun 1.3.x & Vite 6.x
- **Testing:** PHPUnit 11.x Feature & Unit Test Suite

---

## ⚡ Quickstart & Setup

### 1. Requirements
- PHP 8.2+ with `pdo_mysql`, `mbstring`, `xml`, `curl`
- MySQL 8.0+
- Bun (or Node 20+)
- Composer 2.x

### 2. Environment Configuration
Copy `.env.example` to `.env` and configure your MySQL database credentials:
```bash
cp .env.example .env
php artisan key:generate
```

Sample `.env` database configuration:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nilebridge
DB_USERNAME=nilebridge
DB_PASSWORD=secret
```

### 3. Run Migrations & Seed Database
```bash
php artisan migrate:fresh --seed
```

### 4. Build Frontend Assets
```bash
bun install
bun run build
```

### 5. Start Application Server
```bash
php artisan serve
```
Navigate to: `http://localhost:8000`

---

## 👥 Seeded Demonstration Accounts

All accounts are pre-seeded with the password: `password`

| Role | Email | Password | Target Portal | Key Capabilities |
| :--- | :--- | :--- | :--- | :--- |
| **Admin** | `admin@nilebridge.com` | `password` | `/admin` | Global pipeline oversight, reassignment, user management, CSV export. |
| **Employee 1** | `employee1@nilebridge.com` | `password` | `/portal` | View assigned leads, advance pipeline stages, append timeline notes. |
| **Employee 2** | `employee2@nilebridge.com` | `password` | `/portal` | View assigned leads (Nordic Health, CloudVanguard), stage transitions. |
| **Customer** | `client@acme.com` | `password` | `/client` | Track Acme Fintech Corp requisition, onboarding milestones, partner details. |

> **Tip:** The `/login` page includes **1-Click Quick Fill** buttons for each role to make evaluation instantaneous.

---

## 🧪 Automated Testing

Execute the complete automated test suite (includes landing page render tests, public lead ingestion, honeypot suppression, RBAC route isolation, assignment tests, status transitions, and CSV exports):

```bash
php artisan test
```

---

## 📂 Architecture & Directory Structure

Comprehensive system architecture diagrams, data dictionaries, ERD, and state machine specifications are documented in [SYSTEM_DESIGN.md](SYSTEM_DESIGN.md).

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/LeadController.php
│   │   ├── Auth/AuthController.php
│   │   ├── Customer/DashboardController.php
│   │   ├── Employee/LeadController.php
│   │   └── Public/
│   │       ├── LandingPageController.php
│   │       └── LeadCaptureController.php
│   └── Middleware/
│       └── RoleMiddleware.php
├── Models/
│   ├── Lead.php
│   ├── LeadNote.php
│   └── User.php
resources/views/
├── auth/login.blade.php
├── client/dashboard.blade.php
├── employee/
│   ├── dashboard.blade.php
│   └── leads/show.blade.php
├── admin/
│   ├── dashboard.blade.php
│   └── leads/show.blade.php
├── landing/
│   ├── comparison-matrix.blade.php
│   ├── footer.blade.php
│   ├── hero.blade.php
│   ├── lead-form.blade.php
│   ├── performance-charts.blade.php
│   ├── process-timeline.blade.php
│   ├── roi-calculator.blade.php
│   ├── services-grid.blade.php
│   └── stats-bar.blade.php
├── layouts/app.blade.php
└── pages/landing.blade.php
```
