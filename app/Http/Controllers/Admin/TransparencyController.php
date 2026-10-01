<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransparencyDocument;
use App\Models\TransparencyDocumentTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransparencyController extends Controller
{
    public function index()
    {
        $documents = TransparencyDocument::with('translations')
            ->orderBy('order')
            ->paginate(15);

        return view('admin.transparency.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.transparency.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_mr' => 'required|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'document_type' => 'required|string|max:50',
            'status_label' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'document_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $filePath = null;
        $fileSize = 'Demo';
        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $filePath = '/storage/' . $file->store('documents', 'public');
            $fileSize = round($file->getSize() / 1024 / 1024, 2) . ' MB';
        }

        $slug = Str::slug($request->slug ?: $request->title_en);
        if (TransparencyDocument::where('slug', $slug)->exists()) {
            $slug .= '-' . rand(100, 999);
        }

        $document = TransparencyDocument::create([
            'slug' => $slug,
            'document_type' => $request->document_type,
            'icon' => $request->icon ?: 'file-text',
            'file_path' => $filePath,
            'file_size' => $fileSize,
            'document_date' => $request->document_date,
            'valid_until' => $request->valid_until,
            'is_demo' => $request->boolean('is_demo', true),
            'is_published' => $request->boolean('is_published', true),
            'status_label' => $request->status_label ?: 'Sample / Demo Document',
            'order' => (int) ($request->order ?: 0),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            TransparencyDocumentTranslation::create([
                'transparency_document_id' => $document->id,
                'language_code' => $loc,
                'title' => $request->input("title_{$loc}") ?: $request->title_en,
                'short_description' => $request->input("short_description_{$loc}"),
                'description' => $request->input("description_{$loc}"),
                'status_text' => $request->input("status_text_{$loc}") ?: $request->status_label,
            ]);
        }

        return redirect()->route('admin.transparency.index')->with('success', 'Document created successfully.');
    }

    public function edit(TransparencyDocument $transparency)
    {
        $document = $transparency->load('translations');

        $trans = [];
        foreach ($document->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        return view('admin.transparency.edit', compact('document', 'trans'));
    }

    public function update(Request $request, TransparencyDocument $transparency)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_mr' => 'required|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'document_type' => 'required|string|max:50',
            'status_label' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'document_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $filePath = $transparency->file_path;
        $fileSize = $transparency->file_size;
        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $filePath = '/storage/' . $file->store('documents', 'public');
            $fileSize = round($file->getSize() / 1024 / 1024, 2) . ' MB';
        }

        $transparency->update([
            'document_type' => $request->document_type,
            'icon' => $request->icon ?: $transparency->icon,
            'file_path' => $filePath,
            'file_size' => $fileSize,
            'document_date' => $request->document_date,
            'valid_until' => $request->valid_until,
            'is_demo' => $request->boolean('is_demo'),
            'is_published' => $request->boolean('is_published'),
            'status_label' => $request->status_label ?: $transparency->status_label,
            'order' => (int) ($request->order ?: 0),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            TransparencyDocumentTranslation::updateOrCreate(
                [
                    'transparency_document_id' => $transparency->id,
                    'language_code' => $loc,
                ],
                [
                    'title' => $request->input("title_{$loc}") ?: $request->title_en,
                    'short_description' => $request->input("short_description_{$loc}"),
                    'description' => $request->input("description_{$loc}"),
                    'status_text' => $request->input("status_text_{$loc}") ?: $request->status_label,
                ]
            );
        }

        return redirect()->route('admin.transparency.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(TransparencyDocument $transparency)
    {
        $transparency->delete();

        return redirect()->route('admin.transparency.index')->with('success', 'Document deleted successfully.');
    }
}
