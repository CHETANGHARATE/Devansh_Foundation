<?php

namespace App\Http\Controllers;

use App\Models\FocusArea;
use App\Models\GalleryImage;
use App\Models\ImpactStatistic;
use App\Models\NewsArticle;
use App\Models\Project;
use App\Models\Story;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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

        // 5 featured projects as specifically requested
        $featuredProjects = Project::published()
            ->with(['translations', 'focusArea.translations'])
            ->orderBy('order')
            ->take(5)
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
            'successStories',
            'latestNews',
            'galleryImages'
        ));
    }
}
