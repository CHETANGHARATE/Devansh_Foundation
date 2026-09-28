<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusArea;
use App\Models\Project;
use App\Models\ProjectTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['translations', 'focusArea.translations'])->orderBy('order')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $focusAreas = FocusArea::with('translations')->get();
        return view('admin.projects.create', compact('focusAreas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'nullable|string|unique:projects,slug',
            'focus_area_id' => 'nullable|exists:focus_areas,id',
            'title_mr' => 'required|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'status' => 'required|in:ongoing,completed,upcoming',
            'beneficiaries_count' => 'nullable|string|max:100',
            'target_amount' => 'nullable|numeric|min:0',
            'raised_amount' => 'nullable|numeric|min:0',
            'featured_image' => 'nullable|string',
            'image_file' => 'nullable|image|max:4096',
        ]);

        $imagePath = $request->featured_image;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('projects', 'public');
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title_en ?: ($request->title_mr ?: Str::random(8)));
        if (Project::where('slug', $slug)->exists()) {
            $slug .= '-' . rand(100, 999);
        }

        $project = Project::create([
            'focus_area_id' => $request->focus_area_id,
            'slug' => $slug,
            'featured_image' => $imagePath,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'beneficiaries_count' => $request->beneficiaries_count,
            'target_amount' => $request->target_amount ?: 0,
            'raised_amount' => $request->raised_amount ?: 0,
            'status' => $request->status,
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published', true),
            'order' => (int) $request->order,
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            ProjectTranslation::create([
                'project_id' => $project->id,
                'language_code' => $loc,
                'title' => $request->input("title_{$loc}") ?: $request->title_mr,
                'short_description' => $request->input("short_description_{$loc}"),
                'description' => $request->input("description_{$loc}"),
                'problem_statement' => $request->input("problem_statement_{$loc}"),
                'solution' => $request->input("solution_{$loc}"),
                'activities' => $request->input("activities_{$loc}"),
                'impact_text' => $request->input("impact_text_{$loc}"),
            ]);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        $project->load(['translations', 'focusArea']);
        $focusAreas = FocusArea::with('translations')->get();

        $trans = [];
        foreach ($project->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        return view('admin.projects.edit', compact('project', 'focusAreas', 'trans'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'slug' => 'required|string|unique:projects,slug,' . $project->id,
            'title_mr' => 'required|string|max:255',
            'status' => 'required|in:ongoing,completed,upcoming',
        ]);

        $imagePath = $project->featured_image;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('projects', 'public');
        } elseif ($request->filled('featured_image')) {
            $imagePath = $request->featured_image;
        }

        $project->update([
            'focus_area_id' => $request->focus_area_id,
            'slug' => Str::slug($request->slug),
            'featured_image' => $imagePath,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'beneficiaries_count' => $request->beneficiaries_count,
            'target_amount' => $request->target_amount ?: 0,
            'raised_amount' => $request->raised_amount ?: 0,
            'status' => $request->status,
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published'),
            'order' => (int) $request->order,
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            ProjectTranslation::updateOrCreate(
                ['project_id' => $project->id, 'language_code' => $loc],
                [
                    'title' => $request->input("title_{$loc}") ?: $request->title_mr,
                    'short_description' => $request->input("short_description_{$loc}"),
                    'description' => $request->input("description_{$loc}"),
                    'problem_statement' => $request->input("problem_statement_{$loc}"),
                    'solution' => $request->input("solution_{$loc}"),
                    'activities' => $request->input("activities_{$loc}"),
                    'impact_text' => $request->input("impact_text_{$loc}"),
                ]
            );
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
