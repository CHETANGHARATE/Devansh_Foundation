<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of active fundraising campaigns.
     */
    public function index(Request $request)
    {
        $campaigns = Campaign::active()
            ->with(['translations', 'impacts.translations'])
            ->orderBy('order')
            ->paginate(9);

        return view('pages.campaigns.index', compact('campaigns'));
    }

    /**
     * Display the specified campaign detail page.
     */
    public function show($slug)
    {
        $campaign = Campaign::where('slug', $slug)
            ->with(['translations', 'impacts.translations'])
            ->firstOrFail();

        // Related campaigns
        $relatedCampaigns = Campaign::active()
            ->where('id', '!=', $campaign->id)
            ->with(['translations', 'impacts.translations'])
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('pages.campaigns.show', compact('campaign', 'relatedCampaigns'));
    }
}
