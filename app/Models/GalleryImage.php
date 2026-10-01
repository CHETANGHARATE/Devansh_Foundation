<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;

class GalleryImage extends Model
{
    protected $fillable = [
        'gallery_album_id',
        'project_id',
        'media_type',
        'image_path',
        'title_mr',
        'title_hi',
        'title_en',
        'caption_mr',
        'caption_hi',
        'caption_en',
        'description_mr',
        'description_hi',
        'description_en',
        'video_url',
        'video_path',
        'thumbnail_path',
        'category',
        'alt_text',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Check if item is a video
     */
    public function isVideo(): bool
    {
        return $this->media_type === 'video';
    }

    /**
     * Check if item is an image
     */
    public function isImage(): bool
    {
        return $this->media_type === 'image' || empty($this->media_type);
    }

    /**
     * Check if item is a photo (alias for isImage)
     */
    public function isPhoto(): bool
    {
        return $this->isImage();
    }

    /**
     * Localized Title accessor
     */
    public function getTitleAttribute(): string
    {
        $locale = App::getLocale();
        if ($locale === 'mr' && filled($this->title_mr)) return $this->title_mr;
        if ($locale === 'hi' && filled($this->title_hi)) return $this->title_hi;
        if (filled($this->title_en)) return $this->title_en;
        return $this->title_mr ?: $this->caption;
    }

    /**
     * Localized Description accessor
     */
    public function getDescriptionAttribute(): string
    {
        $locale = App::getLocale();
        if ($locale === 'mr' && filled($this->description_mr)) return $this->description_mr;
        if ($locale === 'hi' && filled($this->description_hi)) return $this->description_hi;
        if (filled($this->description_en)) return $this->description_en;
        return $this->description_mr ?? '';
    }

    /**
     * Localized Caption accessor (backward compatible)
     */
    public function getCaptionAttribute(): string
    {
        $locale = App::getLocale();
        if ($locale === 'mr' && filled($this->caption_mr)) return $this->caption_mr;
        if ($locale === 'hi' && filled($this->caption_hi)) return $this->caption_hi;
        if (filled($this->caption_en)) return $this->caption_en;
        return $this->caption_mr ?? ($this->title_mr ?? '');
    }

    /**
     * Get accessible alt text
     */
    public function getAltAttribute(): string
    {
        if (filled($this->alt_text)) return $this->alt_text;
        return $this->title ?: $this->caption;
    }

    /**
     * Get displayable thumbnail for both images and videos
     */
    public function getDisplayThumbnailAttribute(): string
    {
        if ($this->isVideo()) {
            if (filled($this->thumbnail_path)) {
                return $this->thumbnail_path;
            }
            if ($ytId = self::extractYouTubeId($this->video_url)) {
                return "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg";
            }
            if (filled($this->image_path)) {
                return $this->image_path;
            }
            return asset('images/gallery/video-default-thumb.jpg');
        }

        return $this->image_path ?: asset('images/gallery/gallery-1.jpg');
    }

    /**
     * Get video embed URL (for YouTube or Vimeo iframe)
     */
    public function getVideoEmbedUrlAttribute(): ?string
    {
        if (!$this->isVideo()) return null;

        if ($ytId = self::extractYouTubeId($this->video_url)) {
            return "https://www.youtube-nocookie.com/embed/{$ytId}?autoplay=1&rel=0";
        }

        if ($vimeoId = self::extractVimeoId($this->video_url)) {
            return "https://player.vimeo.com/video/{$vimeoId}?autoplay=1";
        }

        return null;
    }

    /**
     * Get direct video URL (for HTML5 <video> tag)
     */
    public function getVideoDirectUrlAttribute(): ?string
    {
        if (!$this->isVideo()) return null;

        if (filled($this->video_path)) {
            return asset($this->video_path);
        }

        if (filled($this->video_url) && !self::extractYouTubeId($this->video_url) && !self::extractVimeoId($this->video_url)) {
            return $this->video_url;
        }

        return null;
    }

    /**
     * Helper to extract YouTube video ID
     */
    public static function extractYouTubeId(?string $url): ?string
    {
        if (empty($url)) return null;
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/i', $url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    /**
     * Helper to extract Vimeo video ID
     */
    public static function extractVimeoId(?string $url): ?string
    {
        if (empty($url)) return null;
        if (preg_match('/vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)/i', $url, $matches)) {
            return end($matches);
        }
        return null;
    }

    /**
     * Scopes
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopePhotos(Builder $query): Builder
    {
        return $query->where(function (Builder $q) {
            $q->where('media_type', 'image')->orWhereNull('media_type');
        });
    }

    public function scopeVideos(Builder $query): Builder
    {
        return $query->where('media_type', 'video');
    }
}
