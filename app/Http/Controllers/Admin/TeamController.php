<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\TeamMemberTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::with('translations')
            ->orderBy('order')
            ->paginate(15);

        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'name_mr' => 'required|string|max:255',
            'role_mr' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'photo_file' => 'nullable|image|max:4096',
        ]);

        $photoPath = $request->photo ?: '/images/team/member-1.jpg';
        if ($request->hasFile('photo_file')) {
            $photoPath = '/storage/' . $request->file('photo_file')->store('team', 'public');
        }

        $slug = Str::slug($request->slug ?: $request->name_en);
        if (TeamMember::where('slug', $slug)->exists()) {
            $slug .= '-' . rand(100, 999);
        }

        $member = TeamMember::create([
            'name' => $request->name_en,
            'slug' => $slug,
            'photo' => $photoPath,
            'email' => $request->email,
            'linkedin_url' => $request->linkedin_url,
            'twitter_url' => $request->twitter_url,
            'is_demo' => $request->boolean('is_demo', true),
            'is_active' => $request->boolean('is_active', true),
            'order' => (int) ($request->order ?: 0),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            TeamMemberTranslation::create([
                'team_member_id' => $member->id,
                'language_code' => $loc,
                'name' => $request->input("name_{$loc}") ?: $request->name_en,
                'role' => $request->input("role_{$loc}") ?: $request->role_en,
                'bio' => $request->input("bio_{$loc}"),
            ]);
        }

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $team)
    {
        $member = $team->load('translations');

        $trans = [];
        foreach ($member->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        return view('admin.team.edit', compact('member', 'trans'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'name_mr' => 'required|string|max:255',
            'role_mr' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'photo_file' => 'nullable|image|max:4096',
        ]);

        $photoPath = $team->photo;
        if ($request->hasFile('photo_file')) {
            $photoPath = '/storage/' . $request->file('photo_file')->store('team', 'public');
        } elseif ($request->filled('photo')) {
            $photoPath = $request->photo;
        }

        $team->update([
            'name' => $request->name_en,
            'photo' => $photoPath,
            'email' => $request->email,
            'linkedin_url' => $request->linkedin_url,
            'twitter_url' => $request->twitter_url,
            'is_demo' => $request->boolean('is_demo'),
            'is_active' => $request->boolean('is_active'),
            'order' => (int) ($request->order ?: 0),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            TeamMemberTranslation::updateOrCreate(
                [
                    'team_member_id' => $team->id,
                    'language_code' => $loc,
                ],
                [
                    'name' => $request->input("name_{$loc}") ?: $request->name_en,
                    'role' => $request->input("role_{$loc}") ?: $request->role_en,
                    'bio' => $request->input("bio_{$loc}"),
                ]
            );
        }

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }
}
