# NileBridge Global Services — Developer Guide & Local Setup

> **Enterprise B2B Global Talent, BPO & Operational Outsourcing Monolith**  
> Built with Laravel 11, Blade Components, Tailwind CSS, Alpine.js, and MySQL 8.x.

---

## 🛠 Tech Stack Overview

| Layer | Technology | Version | Purpose / Notes |
| :--- | :--- | :--- | :--- |
| **Backend** | **PHP / Laravel** | `11.56.x` / `PHP 8.2+` | Clean MVC Monolith, RoleMiddleware RBAC, DB Transactions |
| **Frontend UI** | **Blade Templates** | Modern Components | Semantic HTML5, Glassmorphism, Responsive Grid |
| **Styling** | **Tailwind CSS** | `3.4.x` | Deep Navy (`#060D1D`, `#0B152F`), Vibrant Teal (`#0D9488`) |
| **Reactivity** | **Alpine.js** | `3.17.x` | ROI Calculator Engine, Billing Switcher, Mobile Nav |
| **Database** | **MySQL Engine** | `8.0.x` | Strict SQL Mode, InnoDB, Foreign Key Constraints |
| **Bundling** | **Bun & Vite** | `Bun 1.3+` / `Vite 6` | Instant HMR, Production minification & asset bundling |
| **Testing** | **PHPUnit** | `11.x` | 19 Feature & Unit Tests, 119 Assertions (100% Pass) |

---

## ⚡ Quickstart: How to Run Locally (প্রতিদিন যেভাবে সহজে চালাবেন)

আপনার মেশিনে প্রোজেক্টটি ইতোমধ্যে সেটআপ করা থাকলে প্রতিদিন রান করার জন্য নিচের ৩টি সহজ ধাপ অনুসরণ করুন:

### ধাপ ১: MySQL ডেটাবেস কন্টেইনার চালু করুন (Docker)
```bash
docker start nilebridge-mysql
```
*(যদি ডকার ব্যবহার না করেন, তবে নিশ্চিত করুন আপনার লোকাল MySQL সার্ভিস চালু আছে)*

### ধাপ ২: ফ্রন্টএন্ড অ্যাসেট বিল্ড করুন
```bash
bun run build
# অথবা লাইভ অটো-রিলোড (HMR) এর জন্য:
# bun run dev
```

### ধাপ ৩: Laravel সার্ভার চালু করুন
```bash
php artisan serve
```

🌐 ব্রাউজারে প্রবেশ করুন: **[http://127.0.0.1:8000](http://127.0.0.1:8000)** (বা `http://localhost:8000`)

---

## 🛠 Complete First-Time Setup (প্রথমবার সম্পূর্ণ সেটআপ করার নিয়ম)

নতুন মেশিনে প্রজেক্টটি প্রথমবার ক্লোন করার পর কনফিগার করার সম্পূর্ণ ধাপ:

### ১. সিস্টেম রিকোয়ারমেন্টস (Prerequisites)
* **PHP 8.2+** (এক্সটেনশনসমূহ: `pdo_mysql`, `mbstring`, `xml`, `curl`, `bcmath`, `fileinfo`)
* **MySQL 8.0+** (লোকাল অথবা ডকার কন্টেইনার)
* **Composer 2.x**
* **Bun** (অথবা Node.js 20+ ও NPM)

---

### ২. ডিপেনডেন্সি ও এনভায়রনমেন্ট কনফিগারেশন
```bash
# প্রজেক্ট ডিরেক্টরিতে যান
cd /path/to/kanon

# ১. এনভায়রনমেন্ট ফাইল তৈরি করুন
cp .env.example .env

# ২. PHP ডিপেনডেন্সি ইনস্টল করুন
composer install

# ৩. অ্যাপ্লিকেশন সিকিউরিটি কি (Key) তৈরি করুন
php artisan key:generate
```

---

### ৩. ডেটাবেস কনফিগারেশন (`.env`)
আপনার `.env` ফাইলের ডেটাবেস সেটিংস কনফিগার করুন:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nilebridge
DB_USERNAME=nilebridge
DB_PASSWORD=secret
```

*(যদি Docker দিয়ে খুব সহজে ডেটাবেস রান করতে চান:)*
```bash
docker run --name nilebridge-mysql \
  -e MYSQL_DATABASE=nilebridge \
  -e MYSQL_USER=nilebridge \
  -e MYSQL_PASSWORD=secret \
  -e MYSQL_ROOT_PASSWORD=secret \
  -p 3306:3306 -d mysql:8.0
```

---

### ৪. ডেটাবেস মাইগ্রেশন ও ডেমো ডেটা সিডিং
```bash
php artisan migrate:fresh --seed
```
*এই কমান্ডটি সব টেবিল তৈরি করবে এবং অ্যাডমিন, স্টাফ ও ক্লায়েন্ট অ্যাকাউন্ট সহ বাস্তবসম্মত ডেমো লিড ডেটা প্রস্তুত করে দেবে।*

---

### ৫. ফ্রন্টএন্ড প্যাকেজ ইনস্টল ও প্রোডাকশন বিল্ড
```bash
bun install
bun run build
```

---

### ৬. অ্যাপ্লিকেশন সার্ভার চালু করুন
```bash
php artisan serve
```

---

## 👥 Seeded Demonstration Accounts (লগইন তথ্য)

সকল অ্যাকাউন্টের ডিফল্ট পাসওয়ার্ড: `password`  
লগইন পেজ: **[http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)**  
*(টিপস: লগইন পেজের উপরে **১-ক্লিক অটো-ফিল বাটন** রয়েছে, ক্লিক করলেই পাসওয়ার্ড সহ ইনপুট পূরণ হয়ে যায়)*

| রোল (Role) | ইমেইল (Email) | পাসওয়ার্ড | ড্যাশবোর্ড রুট | কার্যাবলী ও এক্সেস |
| :--- | :--- | :--- | :--- | :--- |
| 👑 **Admin** | `admin@nilebridge.com` | `password` | `/admin` | গ্লোবাল সেলস পাইপলাইন, লিড রি-অ্যাসাইন, সম্পূর্ণ CSV ডেটা এক্সপোর্ট |
| 💼 **Employee 1** | `employee1@nilebridge.com` | `password` | `/portal` | নিজের কাছে অ্যাসাইন করা লিড, স্টেজ ট্রানজিশন, ক্লায়েন্ট ফলো-আপ নোটস |
| 💼 **Employee 2** | `employee2@nilebridge.com` | `password` | `/portal` | নর্ডিক ও ক্লাউড ভ্যানগার্ড লিড ম্যানেজমেন্ট, পাইপলাইন আপডেট |
| 🏢 **Client** | `client@acme.com` | `password` | `/client` | নিজস্ব ট্যালেন্ট পড রিকুইজিশন ট্র্যাকিং, অ্যাকাউন্ট পার্টনার ও SLA ওভারভিউ |

> **নতুন ক্লায়েন্ট সাইন আপ:** নতুন কোনো ক্লায়েন্ট নিজে অ্যাকাউন্ট খুলতে চাইলে সরাসরি **[http://127.0.0.1:8000/register](http://127.0.0.1:8000/register)** পেজে গিয়ে সাইন আপ করতে পারবে।

---

## 🧪 Automated Testing (টেস্ট রান করার নিয়ম)

প্ল্যাটফর্মের সকল রুট, সিকিউরিটি মিডলওয়্যার, লিড ভ্যালিডেশন, ক্যালকুলেটর ইন্টিগ্রেশন এবং ক্লায়েন্ট রেজিস্ট্রেশন স্বয়ংক্রিয়ভাবে টেস্ট করতে নিচের কমান্ডটি রান করুন:

```bash
php artisan test
```

### টেস্ট কভারেজ মেট্রিক্স:
* **মোট টেস্ট:** ১৯টি
* **মোট Assertion:** ১১৯টি
* **স্ট্যাটাস:** **All Passing (0 Failures, 0 Errors)**

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
