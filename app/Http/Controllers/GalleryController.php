<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $albums = GalleryAlbum::withCount(['images' => function ($q) {
            $q->active();
        }])->orderBy('order')->get();

        $query = GalleryImage::active()->with(['album', 'project.translations']);

        // Filter by media type (All, Photos, Videos)
        $currentType = $request->query('type', 'all');
        if ($currentType === 'photos') {
            $query->photos();
        } elseif ($currentType === 'videos') {
            $query->videos();
        }

        // Filter by album
        if ($request->filled('album')) {
            $query->whereHas('album', function ($q) use ($request) {
                $q->where('slug', $request->album);
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $items = $query->orderBy('order')->orderByDesc('id')->paginate(12)->withQueryString();

        // Stats for filter badges
        $totalCount = GalleryImage::active()->count();
        $photosCount = GalleryImage::active()->photos()->count();
        $videosCount = GalleryImage::active()->videos()->count();

        // Distinct categories for filter
        $categories = GalleryImage::active()
            ->when($currentType === 'photos', fn($q) => $q->photos())
            ->when($currentType === 'videos', fn($q) => $q->videos())
            ->distinct()
            ->pluck('category')
            ->filter();

        return view('pages.gallery', compact(
            'albums',
            'items',
            'categories',
            'currentType',
            'totalCount',
            'photosCount',
            'videosCount'
        ));
    }
}
