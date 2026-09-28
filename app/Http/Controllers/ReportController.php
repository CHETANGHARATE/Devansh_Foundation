<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $annualReports = Report::published()
            ->where('type', 'annual')
            ->with('translations')
            ->orderBy('order')
            ->get();

        $financialReports = Report::published()
            ->where('type', 'financial')
            ->with('translations')
            ->orderBy('order')
            ->get();

        $activityReports = Report::published()
            ->where('type', 'activity')
            ->with('translations')
            ->orderBy('order')
            ->get();

        return view('pages.reports', compact('annualReports', 'financialReports', 'activityReports'));
    }
}
