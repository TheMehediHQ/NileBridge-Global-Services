# NileBridge Global Services — Production Deployment Guide

> **Official Production Infrastructure & Deployment Manual**  
> Complete, step-by-step instructions for deploying NileBridge Global Services onto Linux Ubuntu servers (VPS / Dedicated Server / Cloud Droplet / AWS EC2) with Nginx, PHP 8.2/8.3-FPM, MySQL 8.0, and SSL.

---

## 📋 1. Production Server Prerequisites (সার্ভার রিকোয়ারমেন্টস)

* **Operating System:** Ubuntu 22.04 LTS or 24.04 LTS (x64)
* **Web Server:** Nginx 1.20+
* **PHP:** PHP 8.2 or 8.3-FPM
  * Required PHP Extensions: `php8.2-fpm`, `php8.2-mysql`, `php8.2-mbstring`, `php8.2-xml`, `php8.2-curl`, `php8.2-bcmath`, `php8.2-zip`, `php8.2-intl`, `php8.2-gd`
* **Database:** MySQL 8.0+ Server (InnoDB engine)
* **Package Managers:** Composer 2.x, Bun (or Node.js 20+ LTS / NPM)
* **SSL:** Let's Encrypt Certbot

---

## 🚀 2. Step-by-Step Server Setup & Deployment

### ধাপ ১: সার্ভার প্যাকেজ ও সফটওয়্যার ইনস্টলেশন
সার্ভারে SSH দিয়ে লগইন করে নিচের কমান্ডগুলো চালান:

```bash
# সিস্টেম প্যাকেজ আপডেট
sudo apt update && sudo apt upgrade -y

# প্রয়োজনীয় টুলস ও Nginx ইনস্টল
sudo apt install -y nginx curl git unzip ufw certbot python3-certbot-nginx

# PHP 8.2-FPM ও এক্সটেনশন ইনস্টল
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml \
                    php8.2-curl php8.2-bcmath php8.2-zip php8.2-intl php8.2-gd

# Composer ইনস্টল
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

# Bun ইনস্টল (ফ্রন্টএন্ড বিল্ডের জন্য)
curl -fsSL https://bun.sh/install | bash
source ~/.bashrc
sudo ln -s ~/.bun/bin/bun /usr/local/bin/bun
```

---

### ধাপ ২: MySQL ডেটাবেস প্রস্তুত করা
```bash
sudo apt install -y mysql-server
sudo mysql_secure_installation
```

MySQL কনসোলে লগইন করে ডেটাবেস ও ব্যবহারকারী তৈরি করুন:
```sql
sudo mysql -u root -p

CREATE DATABASE nilebridge CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'nilebridge_user'@'localhost' IDENTIFIED BY 'StrongSecurePassword123#';
GRANT ALL PRIVILEGES ON nilebridge.* TO 'nilebridge_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

---

### ধাপ ৩: কোড ক্লোন ও পারমিশন সেটআপ
```bash
# প্রজেক্ট ডিরেক্টরি তৈরি
sudo mkdir -p /var/www/nilebridge
sudo chown -R $USER:www-data /var/www/nilebridge

# গিট রিপোজিটরি ক্লোন করুন
git clone https://github.com/your-org/nilebridge-platform.git /var/www/nilebridge
cd /var/www/nilebridge

# ফাইল ও ফোল্ডার পারমিশন নিশ্চিত করা (অত্যন্ত গুরুত্বপূর্ণ)
sudo chown -R $USER:www-data /var/www/nilebridge
sudo chmod -R 775 /var/www/nilebridge/storage
sudo chmod -R 775 /var/www/nilebridge/bootstrap/cache
```

---

### ধাপ ৪: প্রোডাকশন `.env` ফাইল কনফিগারেশন
```bash
cp .env.example .env
nano .env
```

নিচের প্রোডাকশন ভ্যালুগুলো সঠিকভাবে সেট করুন:
```ini
APP_NAME="NileBridge Global Services"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nilebridge
DB_USERNAME=nilebridge_user
DB_PASSWORD=StrongSecurePassword123#

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

### ধাপ ৫: ব্যাকএন্ড ও ফ্রন্টএন্ড বিল্ড সম্পন্ন করা
```bash
# ১. প্রোডাকশন অপটিমাইজড কম্পোজার প্যাকেজ ইনস্টল
composer install --no-dev --optimize-autoloader

# ২. ইউনিক সিকিউরিটি কি তৈরি
php artisan key:generate --force

# ৩. ডেটাবেস মাইগ্রেশন রান (প্রোডাকশন টেবিল সৃষ্টি)
php artisan migrate --force

# ৪. (ঐচ্ছিক) ডেমো ডেটা সিড করতে চাইলে:
# php artisan db:seed --force

# ৫. ফ্রন্টএন্ড অ্যাসেট ইনস্টল ও প্রোডাকশন বিল্ড
bun install
bun run build
```

---

### ধাপ ৬: প্রোডাকশন ক্যাশিং চালু (High Performance Caching)
প্রোডাকশনে সাইট সুপার-ফাস্ট করার জন্য লারাভেলের ৩টি ক্যাশ ইঞ্জিন সক্রিয় করুন:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🌐 3. Nginx Web Server Configuration

একটি নতুন Nginx কনফিগারেশন ফাইল তৈরি করুন:
```bash
sudo nano /etc/nginx/sites-available/nilebridge.conf
```

নিচের কনফিগারেশনটি পেস্ট করুন (আপনার ডোমেইন নাম বসিয়ে নিন):

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

    # Gzip Compression
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

সাইট এনাবল করুন ও Nginx রিস্টার্ট দিন:
```bash
sudo ln -s /etc/nginx/sites-available/nilebridge.conf /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

---

## 🔒 4. Free SSL Setup (HTTPS via Let's Encrypt)

```bash
# Certbot দিয়ে অটোমেটিক SSL সার্টিফিকেট ইনস্টল
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com
```
*Certbot স্বয়ংক্রিয়ভাবে HTTPS কনফিগার করবে এবং প্রতি ৯০ দিন পর পর সার্টিফিকেট রিনিউ করার ক্রনজব সেট করে দেবে।*

---

## ⏰ 5. Background Scheduler & Cron Job Setup

লারাভেলের ব্যাকগ্রাউন্ড জবস এবং শিডিউলার পরিচালনার জন্য ক্রনট্যাব সেট করুন:

```bash
crontab -e
```
নিচের লাইনটি সবার নিচে যোগ করে সেভ করুন:
```bash
* * * * * cd /var/www/nilebridge && php artisan schedule:run >> /dev/null 2>&1
```

---

## 🔄 6. Zero-Downtime Deployment Script (`deploy.sh`)

ভবিষ্যতে যেকোনো আপডেট বা নতুন কোড পুশ করার পর সার্ভারে খুব সহজে এক ক্লিকে ডেপ্লয় করার জন্য একটি স্ক্রিপ্ট তৈরি করে রাখতে পারেন:

`/var/www/nilebridge/deploy.sh`:
```bash
#!/bin/bash
set -e

echo "🚀 Starting NileBridge Deployment..."

# ১. Maintenance Mode অন করা (ঐচ্ছিক)
# php artisan down --render="errors::503"

# ২. সর্বশেষ গিট কোড টানা
git pull origin main

# ৩. Composer আপডেট ও অপটিমাইজ
composer install --no-dev --optimize-autoloader

# ৪. ডাটাবেজ মাইগ্রেশন রান
php artisan migrate --force

# ৫. ফ্রন্টএন্ড অ্যাসেট নতুন করে বিল্ড
bun run build

# ৬. ক্যাশ রিফ্রেশ
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# ৭. PHP-FPM রিলোড (OPCache ক্লিয়ার করার জন্য)
sudo systemctl reload php8.2-fpm

# ৮. Maintenance Mode অফ করা
# php artisan up

echo "✅ NileBridge Platform successfully deployed and live!"
```

স্ক্রিপ্টটি এক্সিকিউটেবল করুন:
```bash
chmod +x /var/www/nilebridge/deploy.sh
```

পরবর্তীতে ডেপ্লয় করতে শুধু চালাবেন:
```bash
./deploy.sh
```

---

## 🛠 7. Post-Deployment Verification Checklist

ডেপ্লয়মেন্ট সফল হয়েছে কিনা তা যাচাই করতে নিচের বিষয়গুলো চেক করুন:

- [ ] **HTTPS এনফোর্সমেন্ট:** `http://yourdomain.com` স্বয়ংক্রিয়ভাবে `https://yourdomain.com`-এ রিডাইরেক্ট হচ্ছে।
- [ ] **Assets লোডিং:** কনসোলে কোনো 404 (CSS/JS) এরর নেই।
- [ ] **ROI ক্যালকুলেটর:** স্লাইডার টেনে দেখতে পাচ্ছেন যে রিয়েল-টাইমে ডলার ও সেভিংস আপডেট হচ্ছে।
- [ ] **লিড ফর্ম টেস্ট:** একটি টেস্ট লিড সাবমিট করে দেখুন গ্রিন ব্যানার আসছে কিনা এবং ডাটাবেজে রেকর্ড জমছে কিনা।
- [ ] **লগইন ও পোর্টাল:** `/login` পেজ থেকে অ্যাডমিন, স্টাফ ও ক্লায়েন্ট ড্যাশবোর্ড লোড হচ্ছে কিনা।
- [ ] **রেজিস্ট্রেশন পেজ:** `/register` থেকে নতুন ক্লায়েন্ট অ্যাকাউন্ট সফলভাবে তৈরি হয়ে ড্যাশবোর্ডে যাচ্ছে কিনা।

---
*ডকুমেন্টটি NileBridge Global Services DevOps ও ইনফ্রাস্ট্রাকচার টিম দ্বারা পরীক্ষিত ও ভেরিফাইড।*

