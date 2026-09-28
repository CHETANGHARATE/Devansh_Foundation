<?php

namespace App\Http\Controllers;

use App\Models\FocusArea;
use App\Models\ImpactStatistic;
use App\Models\Project;
use App\Models\Story;

class ImpactController extends Controller
{
    public function index()
    {
        $impactStats = ImpactStatistic::where('is_active', true)
            ->with('translations')
            ->orderBy('order')
            ->get();

        $featuredProjects = Project::published()
            ->with(['translations', 'focusArea.translations'])
            ->orderBy('order')
            ->take(6)
            ->get();

        $stories = Story::published()
            ->with('translations')
            ->orderBy('order')
            ->take(3)
            ->get();

        $focusAreas = FocusArea::where('is_active', true)
            ->with(['translations', 'projects'])
            ->orderBy('order')
            ->get();

        return view('pages.impact', compact('impactStats', 'featuredProjects', 'stories', 'focusAreas'));
    }
}
