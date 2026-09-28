<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\CsrRequest;
use App\Models\Donation;
use App\Models\GalleryImage;
use App\Models\NewsArticle;
use App\Models\PartnershipRequest;
use App\Models\Project;
use App\Models\Story;
use App\Models\VolunteerApplication;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'active_projects' => Project::where('status', 'ongoing')->count(),
            'total_donations' => Donation::count(),
            'donation_amount' => Donation::where('payment_status', 'successful')->sum('amount'),
            'total_volunteers' => VolunteerApplication::count(),
            'total_stories' => Story::count(),
            'total_news' => NewsArticle::count(),
            'total_gallery' => GalleryImage::count(),
            'contact_messages' => ContactMessage::where('is_read', false)->count(),
            'csr_requests' => CsrRequest::where('status', 'pending')->count(),
            'partnership_requests' => PartnershipRequest::where('status', 'pending')->count(),
        ];

        $recentDonations = Donation::latest()->take(5)->get();
        $recentVolunteers = VolunteerApplication::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentDonations', 'recentVolunteers', 'recentMessages'));
    }
}
