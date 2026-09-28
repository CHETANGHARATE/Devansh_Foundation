<?php

namespace App\Http\Controllers;

use App\Models\FocusArea;
use App\Models\ImpactStatistic;
use App\Models\Report;

class AboutController extends Controller
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

        $reports = Report::published()
            ->with('translations')
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('pages.about', compact('focusAreas', 'impactStats', 'reports'));
    }
}
