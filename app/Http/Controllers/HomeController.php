<?php

namespace App\Http\Controllers;

use App\Models\DonationCase;
use App\Models\FocusArea;
use App\Models\GalleryImage;
use App\Models\ImpactStatistic;
use App\Models\NewsArticle;
use App\Models\Project;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        // Ensure donation_cases table exists and is populated with demo cases if empty
        try {
            if (!Schema::hasTable('donation_cases') || DonationCase::count() === 0) {
                Artisan::call('migrate', ['--force' => true]);
                Artisan::call('db:seed', ['--class' => 'DemoDonationCasesSeeder', '--force' => true]);
            }
        } catch (\Throwable $e) {
            Log::warning('Automatic case migration/seeder check: ' . $e->getMessage());
        }

        $focusAreas = FocusArea::where('is_active', true)
            ->with(['translations'])
            ->orderBy('order')
            ->get();

        $impactStats = ImpactStatistic::where('is_active', true)
            ->with('translations')
            ->orderBy('order')
            ->get();

        // 5 featured projects as specifically requested
        $featuredProjects = Project::published()
            ->with(['translations', 'focusArea.translations'])
            ->orderBy('order')
            ->take(5)
            ->get();

        // 8 recent donation cases for "Help Us Now" section
        $recentCases = DonationCase::active()
            ->with('translations')
            ->orderBy('is_demo')
            ->orderBy('order')
            ->take(8)
            ->get();

        $successStories = Story::published()
            ->with(['translations', 'project.translations'])
            ->orderBy('order')
            ->take(4)
            ->get();

        $latestNews = NewsArticle::published()
            ->with('translations')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $galleryImages = GalleryImage::orderBy('order')
            ->take(6)
            ->get();

        return view('pages.home', compact(
            'focusAreas',
            'impactStats',
            'featuredProjects',
            'recentCases',
            'successStories',
            'latestNews',
            'galleryImages'
        ));
    }
}
