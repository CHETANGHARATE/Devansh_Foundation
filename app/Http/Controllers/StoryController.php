<?php

namespace App\Http\Controllers;

use App\Models\Story;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::published()
            ->with(['translations', 'project.translations'])
            ->orderBy('order')
            ->paginate(6);

        return view('pages.stories.index', compact('stories'));
    }

    public function show(string $slug)
    {
        $story = Story::published()
            ->where('slug', $slug)
            ->with(['translations', 'project.translations'])
            ->firstOrFail();

        $moreStories = Story::published()
            ->where('id', '!=', $story->id)
            ->with('translations')
            ->take(3)
            ->get();

        return view('pages.stories.show', compact('story', 'moreStories'));
    }
}
