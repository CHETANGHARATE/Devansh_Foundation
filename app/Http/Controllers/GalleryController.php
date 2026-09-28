<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $albums = GalleryAlbum::withCount('images')->orderBy('order')->get();
        $query = GalleryImage::with(['album', 'project.translations']);

        if ($request->filled('album')) {
            $query->whereHas('album', function ($q) use ($request) {
                $q->where('slug', $request->album);
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $images = $query->orderBy('order')->paginate(12)->withQueryString();
        $categories = GalleryImage::distinct()->pluck('category')->filter();

        return view('pages.gallery', compact('albums', 'images', 'categories'));
    }
}
