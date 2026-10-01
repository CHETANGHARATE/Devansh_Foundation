<?php

namespace Tests\Feature;

use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryEnhancedTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_gallery_page_renders_successfully()
    {
        $response = $this->withSession(['locale' => 'en'])->get(route('gallery'));
        $response->assertStatus(200);
        $response->assertSeeText('Photos & Videos Gallery');
        $response->assertSeeText('All');
        $response->assertSeeText('Photos');
        $response->assertSeeText('Videos');
    }

    public function test_gallery_counts_and_filters()
    {
        // Total active in database: 6 photos + 4 videos = 10
        $this->assertEquals(10, GalleryImage::active()->count());
        $this->assertEquals(6, GalleryImage::active()->photos()->count());
        $this->assertEquals(4, GalleryImage::active()->videos()->count());

        // Default / type=all
        $responseAll = $this->withSession(['locale' => 'en'])->get(route('gallery', ['type' => 'all']));
        $responseAll->assertStatus(200);

        // Filter Photos
        $responsePhotos = $this->withSession(['locale' => 'en'])->get(route('gallery', ['type' => 'photos']));
        $responsePhotos->assertStatus(200);

        // Filter Videos
        $responseVideos = $this->withSession(['locale' => 'en'])->get(route('gallery', ['type' => 'videos']));
        $responseVideos->assertStatus(200);
    }

    public function test_gallery_video_model_accessors()
    {
        $video = GalleryImage::where('media_type', 'video')->first();
        $this->assertNotNull($video);
        $this->assertTrue($video->isVideo());
        $this->assertFalse($video->isPhoto());
        $this->assertNotEmpty($video->display_thumbnail);
        $this->assertNotEmpty($video->video_embed_url);
        $this->assertStringContainsString('embed/', $video->video_embed_url);
    }

    public function test_gallery_multilingual_display()
    {
        // Marathi
        $responseMr = $this->withSession(['locale' => 'mr'])->get(route('gallery'));
        $responseMr->assertStatus(200);
        $responseMr->assertSeeText('सर्व');
        $responseMr->assertSeeText('छायाचित्रे');
        $responseMr->assertSeeText('व्हिडिओ');

        // Hindi
        $responseHi = $this->withSession(['locale' => 'hi'])->get(route('gallery'));
        $responseHi->assertStatus(200);
        $responseHi->assertSeeText('सभी');
        $responseHi->assertSeeText('तस्वीरें');
        $responseHi->assertSeeText('वीडियो');
    }

    public function test_admin_gallery_requires_authentication()
    {
        $response = $this->get(route('admin.gallery.index'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_view_gallery_list_and_create_page()
    {
        $admin = User::where('role', 'admin')->first();

        $indexResponse = $this->actingAs($admin)->get(route('admin.gallery.index'));
        $indexResponse->assertStatus(200);
        $indexResponse->assertSeeText('Gallery Management');
        $indexResponse->assertSeeText('Add Photo or Video');

        $createResponse = $this->actingAs($admin)->get(route('admin.gallery.create'));
        $createResponse->assertStatus(200);
        $createResponse->assertSeeText('Media Type');
        $createResponse->assertSeeText('YouTube / Vimeo');
    }

    public function test_admin_can_create_video_item()
    {
        $admin = User::where('role', 'admin')->first();

        $postData = [
            'media_type' => 'video',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'title_en' => 'Test Community Video',
            'title_mr' => 'चाचणी समुदाय व्हिडिओ',
            'title_hi' => 'परीक्षण समुदाय वीडियो',
            'caption_en' => 'English caption for test video',
            'category' => 'community',
            'alt_text' => 'Test Video Thumbnail',
            'sort_order' => 1,
            'is_active' => '1',
        ];

        $response = $this->actingAs($admin)->post(route('admin.gallery.store'), $postData);
        $response->assertRedirect(route('admin.gallery.index'));

        $this->assertDatabaseHas('gallery_images', [
            'media_type' => 'video',
            'title_en' => 'Test Community Video',
            'category' => 'community',
            'is_active' => 1,
        ]);
    }

    public function test_admin_can_delete_gallery_item()
    {
        $admin = User::where('role', 'admin')->first();
        $item = GalleryImage::first();
        $this->assertNotNull($item);

        $response = $this->actingAs($admin)->delete(route('admin.gallery.destroy', $item->id));
        $response->assertRedirect(route('admin.gallery.index'));

        $this->assertDatabaseMissing('gallery_images', [
            'id' => $item->id,
        ]);
    }
}
