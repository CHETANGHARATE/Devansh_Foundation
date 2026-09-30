<?php

namespace App\Http\Controllers;

use App\Models\FocusArea;
use App\Models\Project;

class FocusAreaController extends Controller
{
    public function index()
    {
        $focusAreas = FocusArea::where('is_active', true)
            ->with(['translations', 'projects.translations'])
            ->orderBy('order')
            ->get();

        return view('pages.our-work', compact('focusAreas'));
    }

    public function show(string $slug)
    {
        $focusArea = FocusArea::where('slug', $slug)
            ->where('is_active', true)
            ->with(['translations', 'projects.translations'])
            ->firstOrFail();

        $projects = Project::published()
            ->where('focus_area_id', $focusArea->id)
            ->with('translations')
            ->orderBy('order')
            ->get();

        return view('pages.focus-area-detail', compact('focusArea', 'projects'));
    }
}
