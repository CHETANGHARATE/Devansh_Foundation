<?php

namespace App\Http\Controllers;

use App\Models\FocusArea;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::published()->with(['translations', 'focusArea.translations']);

        if ($request->filled('focus_area')) {
            $query->whereHas('focusArea', function ($q) use ($request) {
                $q->where('slug', $request->focus_area);
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = '%' . $request->search . '%';
            $query->whereHas('translations', function ($q) use ($search) {
                $q->where('title', 'like', $search)
                  ->orWhere('short_description', 'like', $search)
                  ->orWhere('description', 'like', $search);
            });
        }

        $projects = $query->orderBy('order')->paginate(9)->withQueryString();
        $focusAreas = FocusArea::where('is_active', true)->with('translations')->orderBy('order')->get();

        return view('pages.projects.index', compact('projects', 'focusAreas'));
    }

    public function show(string $slug)
    {
        $project = Project::published()
            ->where('slug', $slug)
            ->with(['translations', 'focusArea.translations', 'images', 'stories.translations'])
            ->firstOrFail();

        $relatedProjects = Project::published()
            ->where('id', '!=', $project->id)
            ->where('focus_area_id', $project->focus_area_id)
            ->with('translations')
            ->take(3)
            ->get();

        return view('pages.projects.show', compact('project', 'relatedProjects'));
    }
}
