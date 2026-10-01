<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CampaignImpact;
use App\Models\CampaignImpactTranslation;
use App\Models\CampaignTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with(['translations', 'impacts.translations'])
            ->orderBy('order')
            ->paginate(15);

        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_mr' => 'required|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'target_amount' => 'required|numeric|min:1',
            'raised_amount' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:100',
            'status' => 'required|in:active,completed,paused,closed',
            'order' => 'nullable|integer',
            'image_file' => 'nullable|image|max:4096',
        ]);

        $imagePath = $request->featured_image ?: '/images/campaigns/campaign-1-assistive-care.jpg';
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('campaigns', 'public');
        }

        $slug = Str::slug($request->slug ?: $request->title_en);
        if (Campaign::where('slug', $slug)->exists()) {
            $slug .= '-' . rand(100, 999);
        }

        $campaign = Campaign::create([
            'slug' => $slug,
            'category' => $request->category,
            'featured_image' => $imagePath,
            'target_amount' => $request->target_amount,
            'raised_amount' => $request->raised_amount ?: 0,
            'currency' => $request->currency ?: 'INR',
            'is_featured' => $request->boolean('is_featured', true),
            'is_published' => $request->boolean('is_published', true),
            'is_demo' => $request->boolean('is_demo', false),
            'status' => $request->status,
            'order' => (int) ($request->order ?: 0),
        ]);

        // Translations
        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            CampaignTranslation::create([
                'campaign_id' => $campaign->id,
                'language_code' => $loc,
                'title' => $request->input("title_{$loc}") ?: $request->title_en,
                'title_highlight' => $request->input("title_highlight_{$loc}") ?: $request->title_highlight_en,
                'short_description' => $request->input("short_description_{$loc}"),
                'description' => $request->input("description_{$loc}"),
                'category_name' => $request->input("category_name_{$loc}") ?: $request->category,
            ]);
        }

        // Impacts (up to 4 boxes)
        for ($i = 1; $i <= 4; $i++) {
            if ($request->filled("impact_label_en_{$i}")) {
                $impact = CampaignImpact::create([
                    'campaign_id' => $campaign->id,
                    'order' => $i,
                    'icon' => $request->input("impact_icon_{$i}") ?: 'users',
                    'badge_color' => $request->input("impact_color_{$i}") ?: 'green',
                    'is_primary' => $request->boolean("impact_is_primary_{$i}"),
                    'metric_value' => $request->input("impact_metric_{$i}"),
                ]);

                foreach ($locales as $loc) {
                    CampaignImpactTranslation::create([
                        'campaign_impact_id' => $impact->id,
                        'language_code' => $loc,
                        'label' => $request->input("impact_label_{$loc}_{$i}") ?: $request->input("impact_label_en_{$i}"),
                    ]);
                }
            }
        }

        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign created successfully!');
    }

    public function edit(Campaign $campaign)
    {
        $campaign->load(['translations', 'impacts.translations']);

        $trans = [];
        foreach ($campaign->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        $impacts = $campaign->impacts->sortBy('order')->values();

        return view('admin.campaigns.edit', compact('campaign', 'trans', 'impacts'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_mr' => 'required|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'target_amount' => 'required|numeric|min:1',
            'raised_amount' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:100',
            'status' => 'required|in:active,completed,paused,closed',
            'order' => 'nullable|integer',
            'image_file' => 'nullable|image|max:4096',
        ]);

        $imagePath = $campaign->featured_image;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('campaigns', 'public');
        } elseif ($request->filled('featured_image')) {
            $imagePath = $request->featured_image;
        }

        $campaign->update([
            'category' => $request->category,
            'featured_image' => $imagePath,
            'target_amount' => $request->target_amount,
            'raised_amount' => $request->raised_amount ?: 0,
            'currency' => $request->currency ?: 'INR',
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published'),
            'is_demo' => $request->boolean('is_demo'),
            'status' => $request->status,
            'order' => (int) ($request->order ?: 0),
        ]);

        // Translations
        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            CampaignTranslation::updateOrCreate(
                [
                    'campaign_id' => $campaign->id,
                    'language_code' => $loc,
                ],
                [
                    'title' => $request->input("title_{$loc}") ?: $request->title_en,
                    'title_highlight' => $request->input("title_highlight_{$loc}") ?: $request->title_highlight_en,
                    'short_description' => $request->input("short_description_{$loc}"),
                    'description' => $request->input("description_{$loc}"),
                    'category_name' => $request->input("category_name_{$loc}") ?: $request->category,
                ]
            );
        }

        // Impacts (up to 4 boxes)
        for ($i = 1; $i <= 4; $i++) {
            if ($request->filled("impact_label_en_{$i}")) {
                $impact = CampaignImpact::updateOrCreate(
                    [
                        'campaign_id' => $campaign->id,
                        'order' => $i,
                    ],
                    [
                        'icon' => $request->input("impact_icon_{$i}") ?: 'users',
                        'badge_color' => $request->input("impact_color_{$i}") ?: 'green',
                        'is_primary' => $request->boolean("impact_is_primary_{$i}"),
                        'metric_value' => $request->input("impact_metric_{$i}"),
                    ]
                );

                foreach ($locales as $loc) {
                    CampaignImpactTranslation::updateOrCreate(
                        [
                            'campaign_impact_id' => $impact->id,
                            'language_code' => $loc,
                        ],
                        [
                            'label' => $request->input("impact_label_{$loc}_{$i}") ?: $request->input("impact_label_en_{$i}"),
                        ]
                    );
                }
            }
        }

        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign updated successfully!');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign deleted successfully.');
    }
}
