<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'contact_phone' => Setting::get('contact_phone', '+91 98765 43210'),
            'contact_email' => Setting::get('contact_email', 'info@devanshfoundation.org'),
            'contact_address' => Setting::get('contact_address', 'Devansh Foundation, Nashik, Maharashtra, India'),
            'google_maps_embed' => Setting::get('google_maps_embed'),
            'social_facebook' => Setting::get('social_facebook'),
            'social_instagram' => Setting::get('social_instagram'),
            'social_youtube' => Setting::get('social_youtube'),
            'social_linkedin' => Setting::get('social_linkedin'),
            'site_tagline_mr' => Setting::get('site_tagline_mr'),
            'site_tagline_hi' => Setting::get('site_tagline_hi'),
            'site_tagline_en' => Setting::get('site_tagline_en'),
            'meta_title_mr' => Setting::get('meta_title_mr'),
            'meta_title_hi' => Setting::get('meta_title_hi'),
            'meta_title_en' => Setting::get('meta_title_en'),
            'meta_desc_mr' => Setting::get('meta_desc_mr'),
            'meta_desc_hi' => Setting::get('meta_desc_hi'),
            'meta_desc_en' => Setting::get('meta_desc_en'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $keys = [
            'contact_phone',
            'contact_email',
            'contact_address',
            'google_maps_embed',
            'social_facebook',
            'social_instagram',
            'social_youtube',
            'social_linkedin',
            'site_tagline_mr',
            'site_tagline_hi',
            'site_tagline_en',
            'meta_title_mr',
            'meta_title_hi',
            'meta_title_en',
            'meta_desc_mr',
            'meta_desc_hi',
            'meta_desc_en',
        ];

        foreach ($keys as $key) {
            Setting::set($key, $request->input($key));
        }

        return back()->with('success', 'Website settings updated successfully!');
    }

    public function profile()
    {
        return view('admin.settings.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
