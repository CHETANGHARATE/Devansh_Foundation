<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImpactStatistic;
use App\Models\ImpactStatisticTranslation;
use Illuminate\Http\Request;

class ImpactStatisticController extends Controller
{
    public function index()
    {
        $stats = ImpactStatistic::with('translations')->orderBy('order')->get();
        return view('admin.impact-stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.impact-stats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number_value' => 'required|integer',
            'label_mr' => 'required|string|max:100',
        ]);

        $stat = ImpactStatistic::create([
            'number_value' => $request->number_value,
            'number_suffix' => $request->number_suffix ?: '+',
            'raw_number_display' => $request->raw_number_display,
            'icon' => $request->icon ?: 'users',
            'order' => (int) $request->order,
            'is_active' => $request->boolean('is_active', true),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            ImpactStatisticTranslation::create([
                'impact_statistic_id' => $stat->id,
                'language_code' => $loc,
                'label' => $request->input("label_{$loc}") ?: $request->label_mr,
                'description' => $request->input("description_{$loc}"),
            ]);
        }

        return redirect()->route('admin.impact-stats.index')->with('success', 'Impact statistic created successfully!');
    }

    public function edit(ImpactStatistic $impactStat)
    {
        $impactStat->load('translations');
        $trans = [];
        foreach ($impactStat->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        return view('admin.impact-stats.edit', compact('impactStat', 'trans'));
    }

    public function update(Request $request, ImpactStatistic $impactStat)
    {
        $request->validate([
            'number_value' => 'required|integer',
            'label_mr' => 'required|string|max:100',
        ]);

        $impactStat->update([
            'number_value' => $request->number_value,
            'number_suffix' => $request->number_suffix ?: '+',
            'raw_number_display' => $request->raw_number_display,
            'icon' => $request->icon ?: 'users',
            'order' => (int) $request->order,
            'is_active' => $request->boolean('is_active', true),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            ImpactStatisticTranslation::updateOrCreate(
                ['impact_statistic_id' => $impactStat->id, 'language_code' => $loc],
                [
                    'label' => $request->input("label_{$loc}") ?: $request->label_mr,
                    'description' => $request->input("description_{$loc}"),
                ]
            );
        }

        return redirect()->route('admin.impact-stats.index')->with('success', 'Impact statistic updated successfully!');
    }

    public function destroy(ImpactStatistic $impactStat)
    {
        $impactStat->delete();
        return redirect()->route('admin.impact-stats.index')->with('success', 'Statistic removed.');
    }
}
