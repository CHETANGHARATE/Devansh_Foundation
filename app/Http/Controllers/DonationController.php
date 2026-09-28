<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::published()->with('translations')->get();
        $selectedProjectId = $request->query('project_id');
        $presetAmount = $request->query('amount', 1000);

        $upiId = Setting::get('donation_upi_id', 'devanshfoundation@upi');
        $bankName = Setting::get('donation_bank_name', 'State Bank of India');
        $accountHolder = Setting::get('donation_account_holder', 'Devansh Foundation');
        $accountNumber = Setting::get('donation_account_number', '40982345091');
        $ifsc = Setting::get('donation_ifsc_code', 'SBIN0001234');
        $branch = Setting::get('donation_bank_branch', 'Nashik Main Branch, Maharashtra');
        $tax80gInfo = Setting::get('donation_tax_80g_info', 'Donations are eligible for 50% Tax Exemption under Section 80G of Income Tax Act.');
        $qrImage = Setting::get('donation_qr_image');

        return view('pages.donate', compact(
            'projects',
            'selectedProjectId',
            'presetAmount',
            'upiId',
            'bankName',
            'accountHolder',
            'accountNumber',
            'ifsc',
            'branch',
            'tax80gInfo',
            'qrImage'
        ));
    }

    public function store(Request $request)
    {
        $minAmount = (int) Setting::get('donation_min_amount', 100);

        $validated = $request->validate([
            'donor_name' => 'required|string|max:150',
            'donor_email' => 'required|email|max:150',
            'donor_phone' => 'required|string|max:20',
            'donor_pan' => 'nullable|string|max:15',
            'donor_address' => 'nullable|string|max:255',
            'amount' => "required|numeric|min:{$minAmount}",
            'donation_type' => 'required|in:one-time,monthly',
            'payment_method' => 'required|string|in:upi_qr,bank_transfer,gateway',
            'project_id' => 'nullable|exists:projects,id',
            'transaction_id' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:500',
        ]);

        $receiptNumber = 'DF-' . date('Y') . '-' . strtoupper(Str::random(6));

        $donation = Donation::create(array_merge($validated, [
            'payment_status' => filled($request->transaction_id) ? 'successful' : 'pending',
            'receipt_number' => $receiptNumber,
        ]));

        return redirect()->route('donation.success', ['id' => $donation->id]);
    }

    public function success(int $id)
    {
        $donation = Donation::with('project.translations')->findOrFail($id);
        $upiId = Setting::get('donation_upi_id', 'devanshfoundation@upi');
        $qrImage = Setting::get('donation_qr_image');

        return view('pages.donation-success', compact('donation', 'upiId', 'qrImage'));
    }
}
