<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusArea;
use App\Models\FocusAreaTranslation;
use Illuminate\Http\Request;

class FocusAreaController extends Controller
{
    public function index()
    {
        $focusAreas = FocusArea::with('translations')->withCount('projects')->orderBy('order')->get();
        return view('admin.focus-areas.index', compact('focusAreas'));
    }

    public function edit(FocusArea $focusArea)
    {
        $focusArea->load('translations');
        $trans = [];
        foreach ($focusArea->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        return view('admin.focus-areas.edit', compact('focusArea', 'trans'));
    }

    public function update(Request $request, FocusArea $focusArea)
    {
        $request->validate([
            'icon' => 'required|string',
            'order' => 'required|integer',
        ]);

        $focusArea->update([
            'icon' => $request->icon,
            'image' => $request->image,
            'order' => (int) $request->order,
            'is_active' => $request->boolean('is_active', true),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            FocusAreaTranslation::updateOrCreate(
                ['focus_area_id' => $focusArea->id, 'language_code' => $loc],
                [
                    'title' => $request->input("title_{$loc}") ?: $focusArea->slug,
                    'short_description' => $request->input("short_description_{$loc}"),
                    'description' => $request->input("description_{$loc}"),
                    'objectives' => $request->input("objectives_{$loc}"),
                    'activities' => $request->input("activities_{$loc}"),
                ]
            );
        }

        return redirect()->route('admin.focus-areas.index')->with('success', 'Focus Area updated successfully!');
    }
}
