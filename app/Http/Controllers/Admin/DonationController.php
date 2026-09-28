<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Setting;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::with('project.translations')->latest();

        if ($request->filled('status')) {
            $query->where('payment_status', $request->status);
        }

        $donations = $query->paginate(20)->withQueryString();
        $totalRaised = Donation::where('payment_status', 'successful')->sum('amount');
        $totalDonors = Donation::count();

        return view('admin.donations.index', compact('donations', 'totalRaised', 'totalDonors'));
    }

    public function updateStatus(Request $request, Donation $donation)
    {
        $request->validate(['payment_status' => 'required|in:pending,successful,failed']);
        $donation->update(['payment_status' => $request->payment_status]);

        return back()->with('success', 'Donation status updated.');
    }

    public function settings()
    {
        $settings = [
            'upi_id' => Setting::get('donation_upi_id', 'devanshfoundation@upi'),
            'bank_name' => Setting::get('donation_bank_name', 'State Bank of India'),
            'account_holder' => Setting::get('donation_account_holder', 'Devansh Foundation'),
            'account_number' => Setting::get('donation_account_number', '40982345091'),
            'ifsc_code' => Setting::get('donation_ifsc_code', 'SBIN0001234'),
            'bank_branch' => Setting::get('donation_bank_branch', 'Nashik Main Branch, Maharashtra'),
            'tax_80g_info' => Setting::get('donation_tax_80g_info'),
            'min_amount' => Setting::get('donation_min_amount', 100),
            'qr_image' => Setting::get('donation_qr_image'),
        ];

        return view('admin.donations.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $fields = [
            'donation_upi_id' => $request->upi_id,
            'donation_bank_name' => $request->bank_name,
            'donation_account_holder' => $request->account_holder,
            'donation_account_number' => $request->account_number,
            'donation_ifsc_code' => $request->ifsc_code,
            'donation_bank_branch' => $request->bank_branch,
            'donation_tax_80g_info' => $request->tax_80g_info,
            'donation_min_amount' => $request->min_amount,
            'donation_qr_image' => $request->qr_image,
        ];

        if ($request->hasFile('qr_file')) {
            $fields['donation_qr_image'] = '/storage/' . $request->file('qr_file')->store('donations', 'public');
        }

        foreach ($fields as $k => $v) {
            Setting::set($k, $v, 'donation');
        }

        return back()->with('success', 'Donation settings updated successfully!');
    }
}
