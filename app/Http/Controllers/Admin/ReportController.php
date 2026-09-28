<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportTranslation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('translations')->orderBy('order')->paginate(15);
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        return view('admin.reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:annual,financial,activity,impact',
            'year' => 'required|string',
            'title_mr' => 'required|string|max:255',
            'report_file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $filePath = $request->file_path;
        $fileSize = null;
        if ($request->hasFile('report_file')) {
            $file = $request->file('report_file');
            $fileSize = round($file->getSize() / 1048576, 2) . ' MB';
            $filePath = '/storage/' . $file->store('reports', 'public');
        }

        $report = Report::create([
            'type' => $request->type,
            'year' => $request->year,
            'file_path' => $filePath,
            'file_size' => $fileSize ?: $request->file_size ?: '1.5 MB',
            'is_published' => $request->boolean('is_published', true),
            'order' => (int) $request->order,
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            ReportTranslation::create([
                'report_id' => $report->id,
                'language_code' => $loc,
                'title' => $request->input("title_{$loc}") ?: $request->title_mr,
                'description' => $request->input("description_{$loc}"),
            ]);
        }

        return redirect()->route('admin.reports.index')->with('success', 'Report published successfully!');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('admin.reports.index')->with('success', 'Report deleted.');
    }
}
