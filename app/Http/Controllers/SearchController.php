<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use App\Models\Project;
use App\Models\Report;
use App\Models\Story;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->input('q', ''));

        if (empty($q)) {
            return view('pages.search', [
                'query' => '',
                'projects' => collect(),
                'stories' => collect(),
                'news' => collect(),
                'reports' => collect(),
            ]);
        }

        $term = "%{$q}%";

        $projects = Project::published()
            ->whereHas('translations', function ($query) use ($term) {
                $query->where('title', 'like', $term)
                    ->orWhere('short_description', 'like', $term)
                    ->orWhere('description', 'like', $term);
            })
            ->with('translations')
            ->take(6)
            ->get();

        $stories = Story::published()
            ->whereHas('translations', function ($query) use ($term) {
                $query->where('title', 'like', $term)
                    ->orWhere('story', 'like', $term)
                    ->orWhere('quote', 'like', $term);
            })
            ->orWhere('person_name', 'like', $term)
            ->with('translations')
            ->take(6)
            ->get();

        $news = NewsArticle::published()
            ->whereHas('translations', function ($query) use ($term) {
                $query->where('title', 'like', $term)
                    ->orWhere('short_description', 'like', $term)
                    ->orWhere('content', 'like', $term);
            })
            ->with('translations')
            ->take(6)
            ->get();

        $reports = Report::published()
            ->whereHas('translations', function ($query) use ($term) {
                $query->where('title', 'like', $term)
                    ->orWhere('description', 'like', $term);
            })
            ->with('translations')
            ->take(6)
            ->get();

        return view('pages.search', compact('q', 'projects', 'stories', 'news', 'reports'));
    }
}
