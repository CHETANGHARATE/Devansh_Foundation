<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\CsrRequest;
use App\Models\FundraisingRequest;
use App\Models\PartnershipRequest;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function volunteers()
    {
        $volunteers = VolunteerApplication::latest()->paginate(20);
        return view('admin.inquiries.volunteers', compact('volunteers'));
    }

    public function updateVolunteerStatus(Request $request, VolunteerApplication $volunteer)
    {
        $volunteer->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);
        return back()->with('success', 'Volunteer status updated.');
    }

    public function partnerships()
    {
        $partnerships = PartnershipRequest::latest()->paginate(20);
        return view('admin.inquiries.partnerships', compact('partnerships'));
    }

    public function csr()
    {
        $csrRequests = CsrRequest::latest()->paginate(20);
        return view('admin.inquiries.csr', compact('csrRequests'));
    }

    public function fundraising()
    {
        $fundraising = FundraisingRequest::latest()->paginate(20);
        return view('admin.inquiries.fundraising', compact('fundraising'));
    }

    public function contacts()
    {
        $contacts = ContactMessage::latest()->paginate(20);
        return view('admin.inquiries.contacts', compact('contacts'));
    }

    public function markContactRead(ContactMessage $contact)
    {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Message marked as read.');
    }
}
