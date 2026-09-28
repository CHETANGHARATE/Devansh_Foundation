# 🚀 Devansh Foundation - Production Deployment Guide (Hostinger / cPanel / Shared Hosting)

This guide provides step-by-step instructions for deploying the **Devansh Foundation** website and CMS to **Hostinger** (hPanel), cPanel, or any standard Linux shared hosting environment running PHP 8.2+ and MySQL / MariaDB.

---

## 1. Hosting Requirements

- **PHP Version**: `8.2` or `8.3` (Recommended: PHP 8.3)
- **PHP Extensions**: `BCMath`, `Ctype`, `Fileinfo`, `JSON`, `Mbstring`, `OpenSSL`, `PDO`, `pdo_mysql`, `Tokenizer`, `XML`, `cURL`, `GD` or `Imagick`
- **Database**: MySQL 8.0+ or MariaDB 10.4+
- **Web Server**: Apache / LiteSpeed / Nginx
- **Web Root / Document Root**: Must point to `/public` directory

---

## 2. Preparing the Database (Hostinger hPanel / cPanel)

1. Log into your **Hostinger hPanel** (or cPanel).
2. Navigate to **Databases** -> **MySQL Databases**.
3. Create a new database and user:
   - **Database Name**: `u123456789_devansh`
   - **Username**: `u123456789_admin`
   - **Password**: `SecurePassword#2026!`
4. Assign full permissions to the user on this database.

---

## 3. Uploading Project Files

### Option A: Using SSH / Git (Recommended)
1. Enable SSH access in **Hostinger hPanel** -> **Advanced** -> **SSH Access**.
2. Connect via SSH:
   ```bash
   ssh -p 65002 u123456789@your-server-ip
   ```
3. Navigate to your domain directory:
   ```bash
   cd ~/domains/devanshfoundation.org
   ```
4. Clone or extract the project repository.

### Option B: Upload via ZIP in File Manager
1. Zip the entire `devansh-foundation` folder on your local machine (exclude `.git`, `/node_modules`, and `/tests`).
2. In Hostinger **File Manager**, upload the zip file into your home directory (e.g. `~/domains/devanshfoundation.org/`).
3. Extract the contents.

---

## 4. Setting Document Root to `/public`

In Laravel, the public-facing entry point is the `public/` directory:

### If your host allows changing the Document Root (Hostinger hPanel / cPanel):
- Go to **Websites** -> **Manage** -> **Domains** -> **Document Root**.
- Change the root path from:
  `public_html`
  to:
  `public_html/public` (or `domains/devanshfoundation.org/public`).

### If you cannot change Document Root:
Keep the project files in a folder outside `public_html` (e.g. `~/devansh-core`), move the contents of `public/` into `public_html/`, and update `index.php`:
```php
require __DIR__.'/../devansh-core/vendor/autoload.php';
$app = require_once __DIR__.'/../devansh-core/bootstrap/app.php';
```

Alternatively, create an `.htaccess` inside `public_html`:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

---

## 5. Configuring `.env` File

Copy `.env.example` to `.env` (or edit existing `.env`):

```ini
APP_NAME="Devansh Foundation"
APP_ENV=production
APP_KEY=base64:your_generated_app_key_here
APP_DEBUG=false
APP_URL=https://devanshfoundation.org

APP_LOCALE=mr
APP_FALLBACK_LOCALE=en

# MySQL Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=u123456789_devansh
DB_USERNAME=u123456789_admin
DB_PASSWORD=SecurePassword#2026!

# Sessions & Cache
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
CACHE_STORE=file

# Mail Configuration (Hostinger Business Email / SMTP)
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_USERNAME=info@devanshfoundation.org
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="info@devanshfoundation.org"
MAIL_FROM_NAME="Devansh Foundation"
```

---

## 6. Running Migrations & Seeding

Connect via SSH and execute:

```bash
# Generate application key if not set
php artisan key:generate

# Run all migrations and insert initial foundation data
php artisan migrate --seed --force

# Create public storage symlink for uploaded images & reports
php artisan storage:link

# Optimize configuration and routing for high performance
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

> **Note if SSH is not available:**
> You can create a temporary route in `routes/web.php` or execute `Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);` from a temporary single-run script, then immediately delete it.

---

## 7. Storage Permissions

Ensure the following directories have write permissions:
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

---

## 8. Admin Credentials

After running the seeder, the administrator account is ready:

- **Admin Login URL**: `https://devanshfoundation.org/admin/login`
- **Username / Email**: `admin@devanshfoundation.org`
- **Password**: `admin123`

*(Please log into the Admin panel and immediately change your password under **Admin Profile**).*

---

## 9. Security & SSL

1. Activate **Free SSL** in Hostinger hPanel under **Security** -> **SSL**.
2. Force HTTPS redirection in hPanel.
3. The CSRF tokens, anti-spam honeypot on contact forms, and password hashing (`bcrypt`) are enabled by default.

---

## 10. Language & Locales

- **Default Language**: Marathi (`mr`)
- **Secondary Languages**: Hindi (`hi`), English (`en`)
- Dynamic language switcher is accessible on the top bar and mobile navigation. The active language persists across the entire user session.
