<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\AwardTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::with('translations')
            ->orderBy('order')
            ->orderByDesc('year')
            ->paginate(15);

        return view('admin.awards.index', compact('awards'));
    }

    public function create()
    {
        return view('admin.awards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_mr' => 'required|string|max:255',
            'year' => 'required|string|max:10',
            'category' => 'required|string|max:100',
            'order' => 'nullable|integer',
            'certificate_file' => 'nullable|image|max:4096',
        ]);

        $certPath = null;
        if ($request->hasFile('certificate_file')) {
            $certPath = '/storage/' . $request->file('certificate_file')->store('awards', 'public');
        }

        $slug = Str::slug($request->slug ?: ($request->title_en . '-' . $request->year));
        if (Award::where('slug', $slug)->exists()) {
            $slug .= '-' . rand(100, 999);
        }

        $award = Award::create([
            'slug' => $slug,
            'year' => $request->year,
            'category' => $request->category,
            'icon' => $request->icon ?: 'award',
            'certificate_image' => $certPath,
            'is_demo' => $request->boolean('is_demo', true),
            'is_published' => $request->boolean('is_published', true),
            'order' => (int) ($request->order ?: 0),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            AwardTranslation::create([
                'award_id' => $award->id,
                'language_code' => $loc,
                'title' => $request->input("title_{$loc}") ?: $request->title_en,
                'category_name' => $request->input("category_name_{$loc}") ?: $request->category,
                'description' => $request->input("description_{$loc}"),
                'conferred_by' => $request->input("conferred_by_{$loc}"),
            ]);
        }

        return redirect()->route('admin.awards.index')->with('success', 'Award created successfully.');
    }

    public function edit(Award $award)
    {
        $award->load('translations');

        $trans = [];
        foreach ($award->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        return view('admin.awards.edit', compact('award', 'trans'));
    }

    public function update(Request $request, Award $award)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_mr' => 'required|string|max:255',
            'year' => 'required|string|max:10',
            'category' => 'required|string|max:100',
            'order' => 'nullable|integer',
            'certificate_file' => 'nullable|image|max:4096',
        ]);

        $certPath = $award->certificate_image;
        if ($request->hasFile('certificate_file')) {
            $certPath = '/storage/' . $request->file('certificate_file')->store('awards', 'public');
        }

        $award->update([
            'year' => $request->year,
            'category' => $request->category,
            'icon' => $request->icon ?: $award->icon,
            'certificate_image' => $certPath,
            'is_demo' => $request->boolean('is_demo'),
            'is_published' => $request->boolean('is_published'),
            'order' => (int) ($request->order ?: 0),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            AwardTranslation::updateOrCreate(
                [
                    'award_id' => $award->id,
                    'language_code' => $loc,
                ],
                [
                    'title' => $request->input("title_{$loc}") ?: $request->title_en,
                    'category_name' => $request->input("category_name_{$loc}") ?: $request->category,
                    'description' => $request->input("description_{$loc}"),
                    'conferred_by' => $request->input("conferred_by_{$loc}"),
                ]
            );
        }

        return redirect()->route('admin.awards.index')->with('success', 'Award updated successfully.');
    }

    public function destroy(Award $award)
    {
        $award->delete();

        return redirect()->route('admin.awards.index')->with('success', 'Award deleted successfully.');
    }
}
