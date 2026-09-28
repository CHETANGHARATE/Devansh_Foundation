<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;

class GalleryImage extends Model
{
    protected $fillable = [
        'gallery_album_id',
        'project_id',
        'image_path',
        'caption_mr',
        'caption_hi',
        'caption_en',
        'category',
        'order',
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getCaptionAttribute(): string
    {
        $locale = App::getLocale();
        if ($locale === 'mr' && filled($this->caption_mr)) return $this->caption_mr;
        if ($locale === 'hi' && filled($this->caption_hi)) return $this->caption_hi;
        if (filled($this->caption_en)) return $this->caption_en;
        return $this->caption_mr ?? '';
    }
}
