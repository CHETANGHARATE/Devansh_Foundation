<?php

namespace App\Http\Controllers;

use App\Models\FocusArea;
use App\Models\Project;

class FocusAreaController extends Controller
{
    public function index()
    {
        if (FocusArea::where('is_active', true)->where('slug', '!=', 'skill-development')->count() < 9) {
            try {
                \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'FocusAreaSeeder', '--force' => true]);
                FocusArea::where('slug', 'skill-development')->update(['is_active' => false]);
            } catch (\Throwable $e) {
                // Fail silently
            }
        }

        $focusAreas = FocusArea::where('is_active', true)
            ->where('slug', '!=', 'skill-development')
            ->with(['translations', 'initiatives.translations', 'projects.translations'])
            ->orderBy('order')
            ->get();

        return view('pages.our-work', compact('focusAreas'));
    }

    public function show(string $slug)
    {
        $focusArea = FocusArea::where('slug', $slug)
            ->where('is_active', true)
            ->with(['translations', 'initiatives.translations', 'projects.translations'])
            ->firstOrFail();

        $projects = Project::published()
            ->where('focus_area_id', $focusArea->id)
            ->with('translations')
            ->orderBy('order')
            ->get();

        return view('pages.focus-area-detail', compact('focusArea', 'projects'));
    }
}
