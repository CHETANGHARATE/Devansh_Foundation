<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class GalleryAlbum extends Model
{
    protected $fillable = [
        'slug',
        'title_mr',
        'title_hi',
        'title_en',
        'category',
        'cover_image',
        'order',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class)->orderBy('order');
    }

    public function getTitleAttribute(): string
    {
        $locale = App::getLocale();
        if ($locale === 'mr' && filled($this->title_mr)) return $this->title_mr;
        if ($locale === 'hi' && filled($this->title_hi)) return $this->title_hi;
        if (filled($this->title_en)) return $this->title_en;
        return $this->title_mr ?? 'Album';
    }
}
