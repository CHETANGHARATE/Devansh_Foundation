<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\FocusArea;
use App\Models\ImpactStatistic;
use App\Models\Report;
use App\Models\TeamMember;
use App\Models\TransparencyDocument;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class AboutController extends Controller
{
    /**
     * Display the main About Us page.
     */
    public function index()
    {
        $focusAreas = FocusArea::where('is_active', true)
            ->with('translations')
            ->orderBy('order')
            ->get();

        $impactStats = ImpactStatistic::where('is_active', true)
            ->with('translations')
            ->orderBy('order')
            ->get();

        $reports = Report::published()
            ->with('translations')
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('pages.about', compact('focusAreas', 'impactStats', 'reports'));
    }

    /**
     * Display the Transparency & Legal Documents page.
     */
    public function transparency()
    {
        $this->ensureAboutUsDataSeeded();

        $documents = TransparencyDocument::published()
            ->with('translations')
            ->orderBy('order')
            ->get();

        return view('pages.about.transparency', compact('documents'));
    }

    /**
     * Display the Our Team page.
     */
    public function team()
    {
        $this->ensureAboutUsDataSeeded();

        $members = TeamMember::active()
            ->with('translations')
            ->orderBy('order')
            ->get();

        return view('pages.about.team', compact('members'));
    }

    /**
     * Display the Awards & Recognition page.
     */
    public function awards()
    {
        $this->ensureAboutUsDataSeeded();

        $awards = Award::published()
            ->with('translations')
            ->orderBy('order')
            ->orderByDesc('year')
            ->get();

        return view('pages.about.awards', compact('awards'));
    }

    /**
     * Helper to gracefully ensure tables and demo data exist on remote deployments.
     */
    private function ensureAboutUsDataSeeded(): void
    {
        try {
            if (!Schema::hasTable('transparency_documents') ||
                TransparencyDocument::count() === 0 ||
                TeamMember::count() === 0 ||
                Award::count() === 0) {
                Artisan::call('migrate', ['--force' => true]);
                Artisan::call('db:seed', ['--class' => 'AboutUsDemoSeeder', '--force' => true]);
            }
        } catch (\Throwable $e) {
            Log::warning('Automatic AboutUsDemoSeeder check: ' . $e->getMessage());
        }
    }
}
