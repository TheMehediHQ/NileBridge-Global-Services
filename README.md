# NileBridge Global Services — Developer Guide & Local Setup

> **Enterprise B2B Global Talent, BPO & Operational Outsourcing Monolith**  
> Built with Laravel 11, Blade Components, Tailwind CSS, Alpine.js, and MySQL 8.x.

---

## 🛠 Tech Stack Overview

| Layer | Technology | Version | Architectural Role & Details |
| :--- | :--- | :--- | :--- |
| **Backend** | **PHP / Laravel** | `11.56.x` / `PHP 8.2+` | Clean MVC Monolith, RoleMiddleware RBAC, Database Transactions |
| **Frontend UI** | **Blade Templates** | Modern Components | Semantic HTML5, Glassmorphism, Fully Responsive Grid |
| **Styling** | **Tailwind CSS** | `3.4.x` | Deep Navy (`#060D1D`, `#0B152F`), Vibrant Teal (`#0D9488`) |
| **Reactivity** | **Alpine.js** | `3.17.x` | Real-time ROI Calculator, Billing Frequency Switcher, Mobile Navigation |
| **Database** | **MySQL Engine** | `8.0.x` | Strict SQL Mode, InnoDB Storage Engine, Foreign Key Constraints |
| **Bundler** | **Bun & Vite** | `Bun 1.3+` / `Vite 6` | Instant Hot Module Replacement (HMR), Production Minification |
| **Testing** | **PHPUnit** | `11.x` | 19 Feature & Unit Tests, 119 Assertions (100% Passing) |

---

## ⚡ Daily Quickstart: How to Run Locally

If the project has already been initialized on your local machine, follow these three commands to start developing:

### Step 1: Start the MySQL Database Container
```bash
docker start nilebridge-mysql
```
*(If you are running native MySQL without Docker, ensure your local MySQL daemon is running on port `3306`.)*

### Step 2: Compile Frontend Assets
```bash
bun run build
# Or for live hot-reloading during frontend styling:
# bun run dev
```

### Step 3: Start the Laravel Development Server
```bash
php artisan serve
```

🌐 Open your browser and navigate to: **[http://127.0.0.1:8000](http://127.0.0.1:8000)** (or `http://localhost:8000`)

---

## 🛠 Complete First-Time Setup & Installation

Follow this step-by-step procedure when cloning the repository onto a fresh development workstation:

### 1. System Prerequisites
* **PHP 8.2+** (Required extensions: `pdo_mysql`, `mbstring`, `xml`, `curl`, `bcmath`, `fileinfo`, `zip`)
* **MySQL 8.0+** (Local service or Docker container)
* **Composer 2.x** (PHP dependency management)
* **Bun 1.0+** (or Node.js 20+ LTS with NPM)
* **Git**

---

### 2. Dependency Installation & Environment Initialization
```bash
# Navigate to project root
cd /path/to/kanon

# 1. Duplicate environment template
cp .env.example .env

# 2. Install PHP dependencies
composer install

# 3. Generate unique application cryptographic key
php artisan key:generate
```

---

### 3. Database Setup (`.env`)
Configure your database connection parameters inside `.env`:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nilebridge
DB_USERNAME=nilebridge
DB_PASSWORD=secret
```

*(Optional: Launch an isolated, zero-configuration MySQL container via Docker:)*
```bash
docker run --name nilebridge-mysql \
  -e MYSQL_DATABASE=nilebridge \
  -e MYSQL_USER=nilebridge \
  -e MYSQL_PASSWORD=secret \
  -e MYSQL_ROOT_PASSWORD=secret \
  -p 3306:3306 -d mysql:8.0
```

---

### 4. Database Migrations & Seed Data Generation
```bash
php artisan migrate:fresh --seed
```
*This command executes all schema migrations and seeds realistic enterprise leads, notes, and multi-tier user accounts.*

---

### 5. Frontend Asset Compilation
```bash
bun install
bun run build
```

---

### 6. Launch Application
```bash
php artisan serve
```

---

## 👥 Seeded Demonstration Accounts

All pre-seeded test accounts share the default password: `password`  
Authentication Gateway: **[http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)**  
*(Quick tip: The login interface includes **1-Click Auto-Fill Credential Buttons** for instantaneous review.)*

| Role | Email Address | Password | Landing Route | Access Scope & Capabilities |
| :--- | :--- | :--- | :--- | :--- |
| 👑 **Admin** | `admin@nilebridge.com` | `password` | `/admin` | Global sales pipeline triage, staff reassignments, full CSV dataset exports |
| 💼 **Employee 1** | `employee1@nilebridge.com` | `password` | `/portal` | Scoped assigned inquiries, linear stage transitions, follow-up timeline memos |
| 💼 **Employee 2** | `employee2@nilebridge.com` | `password` | `/portal` | Dedicated Nordic & Cloud Vanguard accounts, pipeline progress tracking |
| 🏢 **Client** | `client@acme.com` | `password` | `/client` | Active talent pod monitoring, assigned AE dossier, SLA performance metrics |

> **Client Self-Registration:** Prospective enterprise clients can self-register anytime via the dedicated onboarding gateway at **[http://127.0.0.1:8000/register](http://127.0.0.1:8000/register)**.

---

## 🧪 Automated Testing Suite

The platform includes comprehensive test suites validating routing integrity, authentication controls, RBAC authorization, anti-spam honeypot guards, lead intake validation, and registration workflows.

Execute the test suite with:
```bash
php artisan test
```

### Test Coverage Summary:
* **Total Tests:** 19 Passed
* **Total Assertions:** 119 Passed
* **Status:** **100% Pass Rate (0 Failures, 0 Errors)**

---

## 📂 Codebase Directory Architecture

```
kanon/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   └── LeadController.php          # Pipeline triage & CSV exporter
│   │   │   ├── Auth/
│   │   │   │   └── AuthController.php          # Login, Register, Logout & Role Redirects
│   │   │   ├── Customer/
│   │   │   │   └── DashboardController.php     # Client portal pod oversight
│   │   │   ├── Employee/
│   │   │   │   └── LeadController.php          # AE staff pipeline & follow-up notes
│   │   │   └── Public/
│   │   │       ├── IndustryController.php      # 7 Industry vertical solutions
│   │   │       ├── LandingPageController.php   # Primary homepage aggregator
│   │   │       ├── LeadCaptureController.php   # Intake form & Honeypot guard
│   │   │       ├── ResourceController.php      # Calculator, Guide, Case Studies, Insights
│   │   │       └── ServiceController.php       # 6 Dedicated service track pages
│   │   └── Middleware/
│   │       └── RoleMiddleware.php              # Strict RBAC enforcement
│   └── Models/
│       ├── Lead.php                            # Inquiry state machine & scopes
│       ├── LeadNote.php                        # Timeline audit logs & memos
│       └── User.php                            # Admin, Employee, Customer model
├── database/
│   ├── migrations/                             # Users, cache, jobs, leads, lead_notes
│   └── seeders/DatabaseSeeder.php              # Seeded accounts & enterprise leads
├── resources/
│   ├── css/app.css                             # Tailwind CSS setup & typography
│   ├── js/app.js                               # Alpine.js core initialization
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php                 # SSO Gateway with 1-click test buttons
│       │   └── register.blade.php              # Enterprise client self-registration
│       ├── admin/                              # Global operations dashboard & drawer
│       ├── employee/                           # Staff pipeline management & timeline notes
│       ├── client/                             # Customer portal pod oversight
│       ├── landing/                            # Modular homepage components (ROI, Hero, etc.)
│       ├── layouts/app.blade.php               # Institutional Glassmorphism master layout
│       └── pages/                              # Services, Industries, Resources, Legal pages
├── routes/web.php                              # Explicit monolith route declarations
├── PROJECT_OVERVIEW.md                         # Business vision & feature documentation
├── DEPLOYMENT_GUIDE.md                         # Production deployment walkthrough
└── tests/Feature/NileBridgeSystemTest.php      # 19 Automated test cases
```

---

## 🔒 Security Best Practices
* **CSRF Protection:** Integrated on all form submissions via `@csrf`.
* **Password Hashing:** Strict Bcrypt (cost factor 12) on all user credentials.
* **Database Session Security:** Sessions and CSRF tokens are tracked via database storage.
* **Input Sanitization:** Explicit FormRequest-style validation preventing SQL injection and XSS.
