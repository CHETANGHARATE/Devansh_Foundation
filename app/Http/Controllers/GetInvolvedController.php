<?php

namespace App\Http\Controllers;

use App\Models\CsrRequest;
use App\Models\FundraisingRequest;
use App\Models\PartnershipRequest;
use App\Models\Project;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class GetInvolvedController extends Controller
{
    public function index()
    {
        return view('pages.get-involved.index');
    }

    public function volunteer()
    {
        return view('pages.get-involved.volunteer');
    }

    public function storeVolunteer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:25',
            'city' => 'nullable|string|max:100',
            'age' => 'nullable|string|max:10',
            'area_of_interest' => 'nullable|string|max:150',
            'skills' => 'nullable|string|max:1000',
            'availability' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:2000',
        ]);

        VolunteerApplication::create($validated);

        return back()->with('success', site_t('volunteer_success', [], 'Volunteer application submitted successfully! Our team will contact you soon.'));
    }

    public function partner()
    {
        return view('pages.get-involved.partner');
    }

    public function storePartner(Request $request)
    {
        $validated = $request->validate([
            'organization_name' => 'required|string|max:200',
            'contact_person' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:25',
            'website' => 'nullable|string|max:255',
            'partnership_interest' => 'nullable|string|max:200',
            'message' => 'nullable|string|max:2000',
        ]);

        PartnershipRequest::create($validated);

        return back()->with('success', 'Partnership proposal submitted successfully! We will connect with you shortly.');
    }

    public function csr()
    {
        return view('pages.get-involved.csr');
    }

    public function storeCsr(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:200',
            'contact_person' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:25',
            'csr_area' => 'nullable|string|max:150',
            'budget_range' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:2000',
        ]);

        CsrRequest::create($validated);

        return back()->with('success', 'CSR partnership request received. Our corporate relations coordinator will be in touch.');
    }

    public function sponsor()
    {
        $projects = Project::published()->with('translations')->get();
        return view('pages.get-involved.sponsor', compact('projects'));
    }

    public function fundraise()
    {
        return view('pages.get-involved.fundraise');
    }

    public function storeFundraise(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:25',
            'city' => 'nullable|string|max:100',
            'campaign_idea' => 'nullable|string|max:255',
            'target_amount' => 'nullable|string|max:50',
            'message' => 'nullable|string|max:2000',
        ]);

        FundraisingRequest::create($validated);

        return back()->with('success', 'Fundraising initiative submitted! Our campaign team will support you.');
    }
}
