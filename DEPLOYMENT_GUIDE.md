# NileBridge Global Services — Production Deployment Guide

> **Official Production Infrastructure & Deployment Manual**  
> Comprehensive, step-by-step instructions for provisioning, configuring, securing, and deploying NileBridge Global Services onto Linux Ubuntu servers (Cloud Droplets, AWS EC2, Dedicated Bare-Metal, or VPS) with Nginx, PHP 8.2/8.3-FPM, MySQL 8.0, and SSL/TLS.

---

> **Documentation Navigation:**  
> 📖 **[Developer Guide & Local Setup (README.md)](README.md)** &nbsp;|&nbsp; 
> 🎯 **[Project Overview & Blueprint (PROJECT_OVERVIEW.md)](PROJECT_OVERVIEW.md)** &nbsp;|&nbsp; 
> 🏗️ **[System Architecture & Design (SYSTEM_DESIGN.md)](SYSTEM_DESIGN.md)** &nbsp;|&nbsp; 
> 🚀 **[Production Deployment Manual (DEPLOYMENT_GUIDE.md)](DEPLOYMENT_GUIDE.md)** *(Current)*

---

## 📋 1. Target Infrastructure & Prerequisites

Ensure your production instance satisfies the following baseline specifications before initiating deployment:

* **Operating System:** Ubuntu 22.04 LTS or 24.04 LTS (x86_64 or ARM64)
* **Compute Minimums:** 2 vCPUs, 2 GB RAM (4 GB recommended for concurrent builds)
* **Web Server:** Nginx 1.20+
* **PHP Engine:** PHP 8.2 or 8.3-FPM
  * Required Extensions: `php8.2-fpm`, `php8.2-mysql`, `php8.2-mbstring`, `php8.2-xml`, `php8.2-curl`, `php8.2-bcmath`, `php8.2-zip`, `php8.2-intl`, `php8.2-gd`
* **Relational Database:** MySQL 8.0+ Server (InnoDB engine, strict mode enabled)
* **Package Managers:** Composer 2.x, Bun 1.0+ (or Node.js 20+ LTS / NPM)
* **Security & SSL:** UFW Firewall, Let's Encrypt Certbot

---

## 🚀 2. Server Provisioning & Package Installation

Connect to your target server via SSH with root or sudo privileges:

```bash
# 1. Update and upgrade base system packages
sudo apt update && sudo apt upgrade -y

# 2. Install essential system utilities and Nginx web server
sudo apt install -y nginx curl git unzip ufw certbot python3-certbot-nginx

# 3. Add Ondrej PHP repository and install PHP 8.2-FPM with core extensions
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml \
                    php8.2-curl php8.2-bcmath php8.2-zip php8.2-intl php8.2-gd

# 4. Install Composer globally
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

# 5. Install Bun for fast frontend asset compilation
curl -fsSL https://bun.sh/install | bash
source ~/.bashrc
sudo ln -s ~/.bun/bin/bun /usr/local/bin/bun
```

---

## 🗄️ 3. Production MySQL Database Setup

```bash
# Install MySQL server
sudo apt install -y mysql-server

# Run MySQL security hardening wizard
sudo mysql_secure_installation
```

Log into MySQL and provision an isolated database and restricted user:

```sql
sudo mysql -u root -p

CREATE DATABASE nilebridge CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'nilebridge_user'@'localhost' IDENTIFIED BY 'StrongEnterprisePassword123#';
GRANT ALL PRIVILEGES ON nilebridge.* TO 'nilebridge_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

---

## 📂 4. Repository Deployment & Permissions

```bash
# 1. Prepare web root directory
sudo mkdir -p /var/www/nilebridge
sudo chown -R $USER:www-data /var/www/nilebridge

# 2. Clone repository from GitHub
git clone https://github.com/TheMehediHQ/NileBridge-Global-Services.git /var/www/nilebridge
cd /var/www/nilebridge

# 3. Apply secure ownership and permissions to writable storage directories
sudo chown -R $USER:www-data /var/www/nilebridge
sudo chmod -R 775 /var/www/nilebridge/storage
sudo chmod -R 775 /var/www/nilebridge/bootstrap/cache
```

---

## ⚙️ 5. Production Environment Configuration (`.env`)

Initialize and edit your production environment configuration:

```bash
cp .env.example .env
nano .env
```

Apply the following production configuration:

```ini
APP_NAME="NileBridge Global Services"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://yourdomain.com

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nilebridge
DB_USERNAME=nilebridge_user
DB_PASSWORD=StrongEnterprisePassword123#

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false

CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=your-mail-username
MAIL_PASSWORD=your-mail-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@nilebridge.com"
MAIL_FROM_NAME="NileBridge Global Services"
```

---

## 🏗️ 6. Build Pipeline & Production Optimization

Execute the production build sequence:

```bash
# 1. Install production PHP packages without development overhead
composer install --no-dev --optimize-autoloader

# 2. Generate application security encryption key
php artisan key:generate --force

# 3. Execute database schema migrations
php artisan migrate --force

# 4. Optional: Seed initial demonstration accounts and leads
# php artisan db:seed --force

# 5. Install frontend packages and compile optimized static assets
bun install
bun run build

# 6. Prime production caching engines for maximum performance
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🌐 7. Nginx Virtual Host Configuration

Create an Nginx server block configuration for the application:

```bash
sudo nano /etc/nginx/sites-available/nilebridge.conf
```

Paste the following configuration (replace `yourdomain.com` with your live domain):

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourdomain.com www.yourdomain.com;
    root /var/www/nilebridge/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header X-XSS-Protection "1; mode=block";
    add_header Referrer-Policy "strict-origin-when-cross-origin";

    index index.php index.html;
    charset utf-8;

    # Gzip Compression for Fast Delivery
    gzip on;
    gzip_vary on;
    gzip_min_length 1024;
    gzip_proxied any;
    gzip_types text/plain text/css application/json application/javascript text/xml application/xml application/xml+rss text/javascript image/svg+xml;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Enable the virtual host and reload Nginx:

```bash
sudo ln -s /etc/nginx/sites-available/nilebridge.conf /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

---

## 🔒 8. Automated SSL/TLS Encryption (Let's Encrypt)

Secure traffic with automatic HTTPS via Certbot:

```bash
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com
```

Certbot automatically configures TLS certificates, sets up automatic renewal cron jobs, and configures HTTP-to-HTTPS redirects.

---

## ⏰ 9. Task Scheduler & Background Workers

Configure system crontab to execute Laravel's scheduled commands:

```bash
crontab -e
```

Add the following entry:
```bash
* * * * * cd /var/www/nilebridge && php artisan schedule:run >> /dev/null 2>&1
```

---

## 🔄 10. Automated Zero-Downtime Deployment Script (`deploy.sh`)

To streamline continuous updates, deploy this automated deployment script in the project root:

Create `/var/www/nilebridge/deploy.sh`:

```bash
#!/bin/bash
set -e

echo "🚀 Starting NileBridge Deployment sequence..."

# 1. Enter Maintenance Mode (Optional)
# php artisan down --render="errors::503"

# 2. Pull latest release from repository
git pull origin main

# 3. Update production PHP dependencies
composer install --no-dev --optimize-autoloader

# 4. Run database migrations safely
php artisan migrate --force

# 5. Recompile frontend assets
bun run build

# 6. Flush and re-prime production caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 7. Reload PHP-FPM to clear bytecode/OPcache
sudo systemctl reload php8.2-fpm

# 8. Deactivate Maintenance Mode
# php artisan up

echo "✅ NileBridge Global Services successfully deployed and live!"
```

Grant executable permissions:
```bash
chmod +x /var/www/nilebridge/deploy.sh
```

Execute future deployments with a single command:
```bash
./deploy.sh
```

---

## 🧪 11. Post-Deployment Verification Checklist

Verify the following production checks after deployment:

- [ ] **HTTPS Enforcement:** Requests to `http://yourdomain.com` immediately redirect to `https://yourdomain.com`.
- [ ] **Asset Integrity:** Static CSS and JavaScript bundles load with HTTP 200 and zero browser console errors.
- [ ] **ROI Calculator Reactivity:** Interactive sliders dynamically calculate financial savings and ticket metrics in real-time.
- [ ] **Lead Ingestion Validation:** Submit an inquiry via the intake form; verify honeypot validation, database record creation, and flash alert rendering.
- [ ] **Portal Authentication:** Authenticate as Admin, Employee, and Client to confirm role-based access control (RBAC).
- [ ] **Client Self-Registration:** Verify that `/register` creates new user records with encrypted credentials and redirects directly to `/client`.

---
 
## 🔗 Documentation Links & Cross-References
* 📖 **[Developer Guide & Local Setup (README.md)](README.md)** — Daily development workflow, local database configuration, and test suites.
* 🎯 **[Project Overview & System Blueprint (PROJECT_OVERVIEW.md)](PROJECT_OVERVIEW.md)** — High-level platform capabilities, business ROI calculator, and commercial layer.
* 🏗️ **[System Architecture & Design Document (SYSTEM_DESIGN.md)](SYSTEM_DESIGN.md)** — Relational data model, indexes, and role-based security rules.

---

*Authored and verified by the NileBridge Global Services DevOps & Infrastructure Architecture Team.*
