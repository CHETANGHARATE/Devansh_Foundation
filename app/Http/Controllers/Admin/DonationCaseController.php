<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationCase;
use App\Models\DonationCaseTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonationCaseController extends Controller
{
    public function index()
    {
        $cases = DonationCase::with('translations')
            ->orderBy('order')
            ->paginate(15);

        return view('admin.donation-cases.index', compact('cases'));
    }

    public function create()
    {
        return view('admin.donation-cases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'beneficiary_name' => 'required|string|max:180',
            'title_en' => 'required|string|max:255',
            'title_mr' => 'required|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'target_amount' => 'required|numeric|min:1',
            'collected_amount' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:50',
            'status' => 'required|in:active,completed,paused,closed',
            'order' => 'nullable|integer',
            'image_file' => 'nullable|image|max:4096',
        ]);

        $imagePath = $request->image;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('cases', 'public');
        }

        $slug = Str::slug($request->slug ?: $request->beneficiary_name);
        if (DonationCase::where('slug', $slug)->exists()) {
            $slug .= '-' . rand(100, 999);
        }

        $case = DonationCase::create([
            'slug' => $slug,
            'beneficiary_name' => $request->beneficiary_name,
            'category' => $request->category,
            'category_icon' => $request->category_icon ?: 'baby',
            'image' => $imagePath,
            'target_amount' => $request->target_amount,
            'collected_amount' => $request->collected_amount ?: 0,
            'currency' => $request->currency ?: 'INR',
            'expense_label' => $request->expense_label ?: 'Treatment Expense',
            'status' => $request->status,
            'order' => (int) $request->order,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'donation_url' => $request->donation_url,
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            DonationCaseTranslation::create([
                'donation_case_id' => $case->id,
                'language_code' => $loc,
                'title' => $request->input("title_{$loc}") ?: $request->title_en,
                'expense_label' => $request->input("expense_label_{$loc}") ?: $request->expense_label,
                'urgent_message' => $request->input("urgent_message_{$loc}"),
                'description' => $request->input("description_{$loc}"),
                'category_name' => $request->input("category_name_{$loc}"),
                'meta_title' => $request->input("meta_title_{$loc}"),
                'meta_description' => $request->input("meta_description_{$loc}"),
            ]);
        }

        return redirect()->route('admin.donation-cases.index')->with('success', 'Urgent case created successfully!');
    }

    public function edit(DonationCase $donationCase)
    {
        $donationCase->load('translations');

        $trans = [];
        foreach ($donationCase->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        return view('admin.donation-cases.edit', compact('donationCase', 'trans'));
    }

    public function update(Request $request, DonationCase $donationCase)
    {
        $request->validate([
            'beneficiary_name' => 'required|string|max:180',
            'title_en' => 'required|string|max:255',
            'title_mr' => 'required|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'target_amount' => 'required|numeric|min:1',
            'collected_amount' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:50',
            'status' => 'required|in:active,completed,paused,closed',
            'order' => 'nullable|integer',
            'image_file' => 'nullable|image|max:4096',
        ]);

        $imagePath = $donationCase->image;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('cases', 'public');
        } elseif ($request->filled('image')) {
            $imagePath = $request->image;
        }

        $donationCase->update([
            'slug' => Str::slug($request->slug ?: $donationCase->slug),
            'beneficiary_name' => $request->beneficiary_name,
            'category' => $request->category,
            'category_icon' => $request->category_icon ?: $donationCase->category_icon,
            'image' => $imagePath,
            'target_amount' => $request->target_amount,
            'collected_amount' => $request->collected_amount ?: 0,
            'currency' => $request->currency ?: 'INR',
            'expense_label' => $request->expense_label ?: $donationCase->expense_label,
            'status' => $request->status,
            'order' => (int) $request->order,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'donation_url' => $request->donation_url,
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            DonationCaseTranslation::updateOrCreate(
                [
                    'donation_case_id' => $donationCase->id,
                    'language_code' => $loc,
                ],
                [
                    'title' => $request->input("title_{$loc}") ?: $request->title_en,
                    'expense_label' => $request->input("expense_label_{$loc}") ?: $request->expense_label,
                    'urgent_message' => $request->input("urgent_message_{$loc}"),
                    'description' => $request->input("description_{$loc}"),
                    'category_name' => $request->input("category_name_{$loc}"),
                    'meta_title' => $request->input("meta_title_{$loc}"),
                    'meta_description' => $request->input("meta_description_{$loc}"),
                ]
            );
        }

        return redirect()->route('admin.donation-cases.index')->with('success', 'Urgent case updated successfully!');
    }

    public function destroy(DonationCase $donationCase)
    {
        $donationCase->delete();
        return redirect()->route('admin.donation-cases.index')->with('success', 'Case deleted successfully.');
    }
}
