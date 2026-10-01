<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryImage::with(['album', 'project'])->orderBy('order')->orderByDesc('id');

        if ($request->filled('type')) {
            if ($request->type === 'photos') {
                $query->photos();
            } elseif ($request->type === 'videos') {
                $query->videos();
            }
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $items = $query->paginate(20)->withQueryString();
        $albums = GalleryAlbum::withCount('images')->get();

        $stats = [
            'total' => GalleryImage::count(),
            'photos' => GalleryImage::photos()->count(),
            'videos' => GalleryImage::videos()->count(),
        ];

        $categories = GalleryImage::distinct()->pluck('category')->filter();

        return view('admin.gallery.index', compact('items', 'albums', 'stats', 'categories'));
    }

    public function create()
    {
        $albums = GalleryAlbum::all();
        $projects = Project::with('translations')->get();
        return view('admin.gallery.create', compact('albums', 'projects'));
    }

    public function store(Request $request)
    {
        $mediaType = $request->input('media_type', 'image');

        $rules = [
            'media_type' => 'required|in:image,video',
            'category' => 'required|string|max:100',
            'gallery_album_id' => 'nullable|exists:gallery_albums,id',
            'project_id' => 'nullable|exists:projects,id',
            'title_mr' => 'nullable|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'caption_mr' => 'nullable|string|max:255',
            'caption_hi' => 'nullable|string|max:255',
            'caption_en' => 'nullable|string|max:255',
            'description_mr' => 'nullable|string',
            'description_hi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'alt_text' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ];

        if ($mediaType === 'image') {
            $rules['image_file'] = 'nullable|image|max:10240';
            $rules['image_path'] = 'nullable|string|max:500';
        } else {
            $rules['video_url'] = 'nullable|string|max:500';
            $rules['video_file'] = 'nullable|file|mimes:mp4,mov,ogg,webm|max:102400';
            $rules['thumbnail_file'] = 'nullable|image|max:6144';
            $rules['thumbnail_path'] = 'nullable|string|max:500';
        }

        $request->validate($rules);

        $imagePath = $request->image_path;
        $videoPath = null;
        $thumbnailPath = $request->thumbnail_path;

        // 1. Process Image Upload
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('gallery/images', 'public');
            $imagePath = '/storage/' . $path;
        }

        // 2. Process Video File Upload
        if ($request->hasFile('video_file')) {
            $path = $request->file('video_file')->store('gallery/videos', 'public');
            $videoPath = '/storage/' . $path;
        }

        // 3. Process Video Thumbnail Upload
        if ($request->hasFile('thumbnail_file')) {
            $path = $request->file('thumbnail_file')->store('gallery/thumbnails', 'public');
            $thumbnailPath = '/storage/' . $path;
        }

        // Validation for missing source
        if ($mediaType === 'image' && empty($imagePath)) {
            return back()->withInput()->withErrors(['image_file' => 'Please provide an image file or direct image URL.']);
        }

        if ($mediaType === 'video' && empty($request->video_url) && empty($videoPath)) {
            return back()->withInput()->withErrors(['video_url' => 'Please provide a video URL (YouTube/Vimeo) or upload a video file.']);
        }

        // Auto-detect YouTube thumbnail if no custom thumbnail provided
        if ($mediaType === 'video' && empty($thumbnailPath) && filled($request->video_url)) {
            if ($ytId = GalleryImage::extractYouTubeId($request->video_url)) {
                $thumbnailPath = "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg";
            }
        }

        // Ensure image_path is populated for videos (backward compatibility)
        if ($mediaType === 'video' && empty($imagePath)) {
            $imagePath = $thumbnailPath ?: asset('images/gallery/gallery-1.jpg');
        }

        GalleryImage::create([
            'gallery_album_id' => $request->gallery_album_id,
            'project_id' => $request->project_id,
            'media_type' => $mediaType,
            'image_path' => $imagePath,
            'title_mr' => $request->title_mr ?: $request->caption_mr,
            'title_hi' => $request->title_hi ?: $request->caption_hi,
            'title_en' => $request->title_en ?: $request->caption_en,
            'caption_mr' => $request->caption_mr ?: $request->title_mr,
            'caption_hi' => $request->caption_hi ?: $request->title_hi,
            'caption_en' => $request->caption_en ?: $request->title_en,
            'description_mr' => $request->description_mr,
            'description_hi' => $request->description_hi,
            'description_en' => $request->description_en,
            'video_url' => $request->video_url,
            'video_path' => $videoPath,
            'thumbnail_path' => $thumbnailPath,
            'category' => $request->category,
            'alt_text' => $request->alt_text,
            'order' => (int) ($request->order ?? 0),
            'is_active' => $request->boolean('is_active', true),
        ]);

        $label = $mediaType === 'video' ? 'Video' : 'Photo';
        return redirect()->route('admin.gallery.index')->with('success', "{$label} successfully added to gallery!");
    }

    public function edit(GalleryImage $gallery)
    {
        $albums = GalleryAlbum::all();
        $projects = Project::with('translations')->get();
        $item = $gallery;
        return view('admin.gallery.create', compact('item', 'albums', 'projects'));
    }

    public function update(Request $request, GalleryImage $gallery)
    {
        $mediaType = $request->input('media_type', $gallery->media_type ?: 'image');

        $rules = [
            'media_type' => 'required|in:image,video',
            'category' => 'required|string|max:100',
            'gallery_album_id' => 'nullable|exists:gallery_albums,id',
            'project_id' => 'nullable|exists:projects,id',
            'title_mr' => 'nullable|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'caption_mr' => 'nullable|string|max:255',
            'caption_hi' => 'nullable|string|max:255',
            'caption_en' => 'nullable|string|max:255',
            'description_mr' => 'nullable|string',
            'description_hi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'alt_text' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ];

        if ($mediaType === 'image') {
            $rules['image_file'] = 'nullable|image|max:10240';
            $rules['image_path'] = 'nullable|string|max:500';
        } else {
            $rules['video_url'] = 'nullable|string|max:500';
            $rules['video_file'] = 'nullable|file|mimes:mp4,mov,ogg,webm|max:102400';
            $rules['thumbnail_file'] = 'nullable|image|max:6144';
            $rules['thumbnail_path'] = 'nullable|string|max:500';
        }

        $request->validate($rules);

        $imagePath = $gallery->image_path;
        $videoPath = $gallery->video_path;
        $thumbnailPath = $gallery->thumbnail_path;

        if ($request->filled('image_path')) {
            $imagePath = $request->image_path;
        }

        if ($request->filled('thumbnail_path')) {
            $thumbnailPath = $request->thumbnail_path;
        }

        // Upload new image
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('gallery/images', 'public');
            $imagePath = '/storage/' . $path;
        }

        // Upload new video file
        if ($request->hasFile('video_file')) {
            $path = $request->file('video_file')->store('gallery/videos', 'public');
            $videoPath = '/storage/' . $path;
        }

        // Upload new thumbnail
        if ($request->hasFile('thumbnail_file')) {
            $path = $request->file('thumbnail_file')->store('gallery/thumbnails', 'public');
            $thumbnailPath = '/storage/' . $path;
        }

        // Auto-detect YouTube thumbnail if empty
        if ($mediaType === 'video' && empty($thumbnailPath) && filled($request->video_url)) {
            if ($ytId = GalleryImage::extractYouTubeId($request->video_url)) {
                $thumbnailPath = "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg";
            }
        }

        if ($mediaType === 'video' && empty($imagePath)) {
            $imagePath = $thumbnailPath ?: asset('images/gallery/gallery-1.jpg');
        }

        $gallery->update([
            'gallery_album_id' => $request->gallery_album_id,
            'project_id' => $request->project_id,
            'media_type' => $mediaType,
            'image_path' => $imagePath,
            'title_mr' => $request->title_mr ?: $request->caption_mr,
            'title_hi' => $request->title_hi ?: $request->caption_hi,
            'title_en' => $request->title_en ?: $request->caption_en,
            'caption_mr' => $request->caption_mr ?: $request->title_mr,
            'caption_hi' => $request->caption_hi ?: $request->title_hi,
            'caption_en' => $request->caption_en ?: $request->title_en,
            'description_mr' => $request->description_mr,
            'description_hi' => $request->description_hi,
            'description_en' => $request->description_en,
            'video_url' => $request->video_url,
            'video_path' => $videoPath,
            'thumbnail_path' => $thumbnailPath,
            'category' => $request->category,
            'alt_text' => $request->alt_text,
            'order' => (int) ($request->order ?? 0),
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item updated successfully!');
    }

    public function destroy(GalleryImage $gallery)
    {
        // Remove storage files if local
        if ($gallery->image_path && str_starts_with($gallery->image_path, '/storage/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $gallery->image_path));
        }
        if ($gallery->video_path && str_starts_with($gallery->video_path, '/storage/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $gallery->video_path));
        }
        if ($gallery->thumbnail_path && str_starts_with($gallery->thumbnail_path, '/storage/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $gallery->thumbnail_path));
        }

        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item removed.');
    }
}
