<?php

namespace App\Http\Controllers;

use App\Models\DonationCase;
use Illuminate\Http\Request;

class DonationCaseController extends Controller
{
    /**
     * Display the specified donation case detail page.
     */
    public function show($slug)
    {
        $case = DonationCase::where('slug', $slug)
            ->with(['translations'])
            ->firstOrFail();

        // Other active cases (excluding current case)
        $otherCases = DonationCase::active()
            ->where('id', '!=', $case->id)
            ->with(['translations'])
            ->orderBy('is_demo')
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('pages.cases.show', compact('case', 'otherCases'));
    }
}
