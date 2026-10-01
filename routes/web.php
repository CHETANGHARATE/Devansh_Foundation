<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CampaignController as AdminCampaignController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DonationCaseController as AdminDonationCaseController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\Admin\FocusAreaController as AdminFocusAreaController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ImpactStatisticController as AdminImpactStatisticController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\StoryController as AdminStoryController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FocusAreaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GetInvolvedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoryController;
use App\Models\Project;
use App\Models\Story;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Our Work & Focus Areas
Route::get('/our-work', [FocusAreaController::class, 'index'])->name('our-work.index');
Route::get('/our-work/{slug}', [FocusAreaController::class, 'show'])->name('our-work.show');
Route::get('/focus-areas', [FocusAreaController::class, 'index'])->name('focus-areas.index');
Route::get('/focus-areas/{slug}', [FocusAreaController::class, 'show'])->name('focus-areas.show');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Featured Campaigns
Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/{slug}', [CampaignController::class, 'show'])->name('campaigns.show');

// Impact
Route::get('/impact', [ImpactController::class, 'index'])->name('impact');

// Stories
Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/{slug}', [StoryController::class, 'show'])->name('stories.show');

// Gallery & Reports
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/reports', [ReportController::class, 'index'])->name('reports');

// Get Involved pathways
Route::get('/get-involved', [GetInvolvedController::class, 'index'])->name('get-involved');
Route::get('/volunteer', [GetInvolvedController::class, 'volunteer'])->name('volunteer');
Route::post('/volunteer', [GetInvolvedController::class, 'storeVolunteer'])->name('volunteer.store');
Route::get('/partner', [GetInvolvedController::class, 'partner'])->name('partner');
Route::post('/partner', [GetInvolvedController::class, 'storePartner'])->name('partner.store');
Route::get('/csr', [GetInvolvedController::class, 'csr'])->name('csr');
Route::post('/csr', [GetInvolvedController::class, 'storeCsr'])->name('csr.store');
Route::get('/sponsor', [GetInvolvedController::class, 'sponsor'])->name('sponsor');
Route::get('/fundraise', [GetInvolvedController::class, 'fundraise'])->name('fundraise');
Route::post('/fundraise', [GetInvolvedController::class, 'storeFundraise'])->name('fundraise.store');

// Donation
Route::get('/donate', [DonationController::class, 'index'])->name('donate');
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');
Route::get('/donation-success/{id}', [DonationController::class, 'success'])->name('donation.success');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Search & Language Switcher
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// Utility endpoint to seed demo cases on live/remote deployments
Route::get('/seed-demo-cases', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'DemoDonationCasesSeeder', '--force' => true]);
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        $count = \App\Models\DonationCase::count();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully migrated and seeded 8 demo cases',
            'cases_count' => $count,
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ], 500);
    }
});

// Utility endpoint to seed featured campaigns on live/remote deployments
Route::get('/seed-featured-campaigns', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'FeaturedCampaignSeeder', '--force' => true]);
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        $count = \App\Models\Campaign::count();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully migrated and seeded featured campaigns',
            'campaigns_count' => $count,
        ]);
    } catch (\Throwable $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ], 500);
    }
});

// Legal & Policies
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy-policy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/donation-policy', [PageController::class, 'donationPolicy'])->name('donation-policy');
Route::get('/refund-policy', [PageController::class, 'refundPolicy'])->name('refund-policy');
Route::get('/disclaimer', [PageController::class, 'disclaimer'])->name('disclaimer');

// SEO XML Sitemap & robots.txt (Controller-based for route:cache compatibility)
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [PageController::class, 'robots'])->name('robots');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Authenticated Admin Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Projects CRUD
    Route::resource('projects', AdminProjectController::class);

    // Focus Areas
    Route::get('focus-areas', [AdminFocusAreaController::class, 'index'])->name('focus-areas.index');
    Route::get('focus-areas/{focusArea}/edit', [AdminFocusAreaController::class, 'edit'])->name('focus-areas.edit');
    Route::put('focus-areas/{focusArea}', [AdminFocusAreaController::class, 'update'])->name('focus-areas.update');

    // Impact Statistics
    Route::resource('impact-stats', AdminImpactStatisticController::class)->except(['show']);

    // Stories CRUD
    Route::resource('stories', AdminStoryController::class);

    // Help Us Now - Urgent Cases CRUD
    Route::resource('donation-cases', AdminDonationCaseController::class);

    // Featured Campaigns CRUD
    Route::resource('campaigns', AdminCampaignController::class);

    // News CRUD
    Route::resource('news', AdminNewsController::class);

    // Gallery
    Route::get('gallery', [AdminGalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [AdminGalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery', [AdminGalleryController::class, 'store'])->name('gallery.store');
    Route::delete('gallery/{image}', [AdminGalleryController::class, 'destroy'])->name('gallery.destroy');

    // Reports
    Route::resource('reports', AdminReportController::class)->except(['show']);

    // Donations
    Route::get('donations', [AdminDonationController::class, 'index'])->name('donations.index');
    Route::put('donations/{donation}/status', [AdminDonationController::class, 'updateStatus'])->name('donations.status');
    Route::get('donations/settings', [AdminDonationController::class, 'settings'])->name('donations.settings');
    Route::post('donations/settings', [AdminDonationController::class, 'updateSettings'])->name('donations.settings.update');

    // Inquiries & Submissions
    Route::get('volunteers', [AdminInquiryController::class, 'volunteers'])->name('volunteers.index');
    Route::put('volunteers/{volunteer}/status', [AdminInquiryController::class, 'updateVolunteerStatus'])->name('volunteers.status');
    Route::get('partnerships', [AdminInquiryController::class, 'partnerships'])->name('partnerships.index');
    Route::get('csr-requests', [AdminInquiryController::class, 'csr'])->name('csr.index');
    Route::get('fundraising-requests', [AdminInquiryController::class, 'fundraising'])->name('fundraising.index');
    Route::get('contact-messages', [AdminInquiryController::class, 'contacts'])->name('contacts.index');
    Route::put('contact-messages/{contact}/read', [AdminInquiryController::class, 'markContactRead'])->name('contacts.read');

    // Website Settings & Profile
    Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [AdminSettingController::class, 'update'])->name('settings.update');
    Route::get('profile', [AdminSettingController::class, 'profile'])->name('profile');
    Route::post('profile', [AdminSettingController::class, 'updateProfile'])->name('profile.update');
});
