<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::with(['album', 'project'])->orderBy('order')->paginate(20);
        $albums = GalleryAlbum::withCount('images')->get();
        return view('admin.gallery.index', compact('images', 'albums'));
    }

    public function create()
    {
        $albums = GalleryAlbum::all();
        $projects = Project::with('translations')->get();
        return view('admin.gallery.create', compact('albums', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'nullable|string',
            'image_file' => 'nullable|image|max:6144',
            'category' => 'required|string',
        ]);

        $imagePath = $request->image_path;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('gallery', 'public');
        }

        if (empty($imagePath)) {
            return back()->withErrors(['image_file' => 'Please provide an image file or direct image URL.']);
        }

        GalleryImage::create([
            'gallery_album_id' => $request->gallery_album_id,
            'project_id' => $request->project_id,
            'image_path' => $imagePath,
            'caption_mr' => $request->caption_mr,
            'caption_hi' => $request->caption_hi,
            'caption_en' => $request->caption_en,
            'category' => $request->category,
            'order' => (int) $request->order,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Image added to gallery!');
    }

    public function destroy(GalleryImage $image)
    {
        $image->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Image removed.');
    }
}
