<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Story;
use App\Models\StoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::with(['translations', 'project'])->orderBy('order')->paginate(15);
        return view('admin.stories.index', compact('stories'));
    }

    public function create()
    {
        $projects = Project::with('translations')->get();
        return view('admin.stories.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'person_name' => 'required|string|max:150',
            'title_mr' => 'required|string|max:255',
            'story_mr' => 'required|string',
        ]);

        $imagePath = $request->image;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('stories', 'public');
        }

        $slug = Str::slug($request->slug ?: $request->person_name);
        if (Story::where('slug', $slug)->exists()) {
            $slug .= '-' . rand(100, 999);
        }

        $story = Story::create([
            'project_id' => $request->project_id,
            'slug' => $slug,
            'image' => $imagePath,
            'person_name' => $request->person_name,
            'person_role_or_location' => $request->person_role_or_location,
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published', true),
            'order' => (int) $request->order,
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            StoryTranslation::create([
                'story_id' => $story->id,
                'language_code' => $loc,
                'title' => $request->input("title_{$loc}") ?: $request->title_mr,
                'quote' => $request->input("quote_{$loc}"),
                'story' => $request->input("story_{$loc}") ?: $request->story_mr,
                'challenge' => $request->input("challenge_{$loc}"),
                'support_received' => $request->input("support_received_{$loc}"),
                'outcome' => $request->input("outcome_{$loc}"),
            ]);
        }

        return redirect()->route('admin.stories.index')->with('success', 'Story created successfully!');
    }

    public function edit(Story $story)
    {
        $story->load('translations');
        $projects = Project::with('translations')->get();

        $trans = [];
        foreach ($story->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        return view('admin.stories.edit', compact('story', 'projects', 'trans'));
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'person_name' => 'required|string|max:150',
            'title_mr' => 'required|string|max:255',
            'story_mr' => 'required|string',
        ]);

        $imagePath = $story->image;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('stories', 'public');
        } elseif ($request->filled('image')) {
            $imagePath = $request->image;
        }

        $story->update([
            'project_id' => $request->project_id,
            'slug' => Str::slug($request->slug ?: $story->slug),
            'image' => $imagePath,
            'person_name' => $request->person_name,
            'person_role_or_location' => $request->person_role_or_location,
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published'),
            'order' => (int) $request->order,
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            StoryTranslation::updateOrCreate(
                ['story_id' => $story->id, 'language_code' => $loc],
                [
                    'title' => $request->input("title_{$loc}") ?: $request->title_mr,
                    'quote' => $request->input("quote_{$loc}"),
                    'story' => $request->input("story_{$loc}") ?: $request->story_mr,
                    'challenge' => $request->input("challenge_{$loc}"),
                    'support_received' => $request->input("support_received_{$loc}"),
                    'outcome' => $request->input("outcome_{$loc}"),
                ]
            );
        }

        return redirect()->route('admin.stories.index')->with('success', 'Story updated successfully!');
    }

    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('admin.stories.index')->with('success', 'Story deleted successfully.');
    }
}
