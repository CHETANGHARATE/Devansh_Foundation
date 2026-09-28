# 🌟 Devansh Foundation - Dynamic NGO Web Portal & CMS

> **"Together for a Better Tomorrow"**  
> *एकत्र येऊन घडवूया उज्वल भविष्य*  
> Nashik, Maharashtra, India

A modern, emotionally engaging, trustworthy, responsive, and fully dynamic NGO website and Content Management System (CMS) engineered with **Laravel 11**, **Tailwind CSS v4**, **Alpine.js**, and **Lucide Icons**.

---

## 📌 Key Highlights

1. **Multilingual Support (Marathi as Default)**
   - Supports **Marathi (मराठी - Default)**, **Hindi (हिंदी)**, and **English**.
   - Session-based language persistence with instant switching (`/lang/mr`, `/lang/hi`, `/lang/en`).
   - Graceful fallback: If content in a requested language is not provided, it transparently falls back to English/Marathi without page breaks or crashes.
   - Dynamic translations table structure for Focus Areas, Projects, Impact Counters, Stories, News, and Reports.

2. **NGO Visual Identity & Color Palette**
   - **Navy Blue** (`#073B63`): Primary trust, authority, headers.
   - **Primary Green** (`#138A4B`): Growth, life, impact accents.
   - **Secondary Green** (`#2E9E58`): Hover states, secondary buttons.
   - **Action Orange** (`#F58220`): High-converting CTAs & "Donate" highlights.
   - **Soft Green** (`#EAF7EF`) & **Soft Blue** (`#EEF6FB`): Clean section backgrounds.

3. **Homepage (10 Structured Sections)**
   - **Hero Section**: High-resolution emotional visual, Marathi quote badge, key metrics teaser, primary & secondary action buttons.
   - **8 Core Focus Areas**: Health, Child Education, Women Empowerment, Rural Welfare, Environment, Skill Development, Elderly Care, and Disaster Relief.
   - **Animated Impact Counters**: Lives impacted (50,000+), Villages covered (120+), Medical camps (350+), Tree plantation (25,000+).
   - **Featured Projects**: Filterable cards with progress bars, target vs. raised amounts, and donor counts.
   - **Success Stories / Beneficiary Testimonials**: Authentic human stories featuring quotes, challenges, foundation interventions, and transformations.
   - **Transparent Donation Section**: Instant UPI ID, QR code, quick amount chips (₹500, ₹1000, ₹2500, ₹5000), 80G tax benefit notice, and donor receipt generation.
   - **Photo Gallery & Field Activities**: Categorized image grid showing community drives, medical checkups, and school programs.
   - **News, Events & Press Releases**: Latest happenings, workshops, and milestones.
   - **5 Pathways to Get Involved**: Volunteer, Institutional Partner, Corporate CSR, Sponsor a Child/Patient, and Supporter Fundraising.
   - **Closing Community Call-to-Action**: High-converting footer banner inspiring collective action.

4. **Dedicated Subpages**
   - `/about`: Mission, Vision, Values, Leadership structure, Legal compliance placeholders.
   - `/our-work` & `/our-work/{slug}`: Focus area deep-dives with related projects.
   - `/projects` & `/projects/{slug}`: Project catalog and individual project page with progress, photos, and donate button.
   - `/impact`: Detailed social audit, key indicators, geographic reach, methodology.
   - `/stories` & `/stories/{slug}`: In-depth beneficiary case studies.
   - `/gallery`: Interactive media gallery filterable by cause/event.
   - `/reports`: Downloads for Annual Audits, Financial Statements, and Impact Assessments.
   - `/get-involved`: Dedicated interactive forms for `/volunteer`, `/partner`, `/csr`, `/sponsor`, and `/fundraise`.
   - `/donate` & `/donation-success/{id}`: Secure multi-step donation pledge with UPI, Bank Details, PAN (for 80G certificate), and printable tax receipt.
   - `/contact`: Office address, Google Maps embed, phone, email, and anti-spam honeypot contact form.
   - `/search`: Site-wide keyword search spanning projects, stories, news, and focus areas.
   - Legal Pages: `/privacy-policy`, `/terms`, `/donation-policy`, `/refund-policy`, `/disclaimer`.
   - Technical SEO: `/sitemap.xml` and `/robots.txt`.

5. **Complete Admin CMS (`/admin`)**
   - **Dashboard**: Key operational KPIs (total raised, donor counts, active projects, inquiries pending).
   - **Project Management**: Create, edit, set funding goals, upload gallery images, publish status.
   - **Focus Area Management**: Edit focus area details, iconography, and multilingual narratives.
   - **Impact Counter Manager**: Real-time counter values, suffixes, icons, and labels.
   - **Stories & Testimonials**: Manage beneficiary stories, before/after details, and featured badges.
   - **News & Updates**: Publish categorized articles with images and publication dates.
   - **Gallery Manager**: Upload event images with categories and multilingual captions.
   - **Transparency & Reports**: Upload PDFs or cloud links with fiscal year tagging.
   - **Donations Ledger**: Verify donations, update payment statuses (Pending / Successful / Failed), track 80G requests.
   - **UPI & Payment Gateway Settings**: Change UPI ID, QR code, bank account details, and 80G disclosures.
   - **Inquiry Management**: Review and update statuses for Volunteer applicants, Institutional Partners, CSR proposals, Supporter Fundraising, and Contact messages.
   - **Global Site Settings & SEO**: Manage contact numbers, address, social media links, taglines, and meta tags.
   - **Admin Profile**: Update administrator name, email, and password.

---

## 🔐 Admin Credentials

- **Admin Login Route**: `/admin/login`
- **Email**: `admin@devanshfoundation.org`
- **Password**: `admin123`

---

## 🛠️ Technology Stack

- **Framework**: Laravel 11.x (PHP 8.2 / 8.3)
- **CSS Engine**: Tailwind CSS v4 with Vite `@tailwindcss/vite`
- **Interactivity**: Alpine.js v3
- **Iconography**: Lucide Icons
- **Database**: SQLite (local development) / MySQL 8.0+ (production / Hostinger)

---

## 🚀 Local Development Setup

1. **Clone & Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

2. **Environment & App Key**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Migration & Seeder**:
   ```bash
   php artisan migrate --seed
   php artisan storage:link
   ```

4. **Compile Assets**:
   ```bash
   npm run build
   # or for live watch during development:
   # npm run dev
   ```

5. **Launch Local Server**:
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000` in your web browser.

---

## 🌐 Production & Hostinger Deployment

Refer to [`HOSTINGER_DEPLOYMENT.md`](./HOSTINGER_DEPLOYMENT.md) for full instructions on configuring MySQL, setting Document Root to `public/`, setting up SSL, and configuring permissions on shared hosting.
