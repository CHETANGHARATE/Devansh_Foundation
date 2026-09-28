<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $phone = Setting::get('contact_phone', '+91 98765 43210');
        $email = Setting::get('contact_email', 'info@devanshfoundation.org');
        $address = Setting::get('contact_address', 'Nashik, Maharashtra, India');
        $mapEmbed = Setting::get('google_maps_embed');

        return view('pages.contact', compact('phone', 'email', 'address', 'mapEmbed'));
    }

    public function send(Request $request)
    {
        // Honeypot spam protection: if hidden field is filled, silently ignore bot
        if ($request->filled('website_hp')) {
            return back()->with('success', 'Thank you! Your message has been sent successfully.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:25',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', site_t('contact_success', [], 'Thank you! Your message has been received. Our team will get back to you soon.'));
    }
}
