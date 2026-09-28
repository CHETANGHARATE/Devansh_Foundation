<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsArticle extends Model
{
    use HasTranslations;

    protected $fillable = [
        'slug',
        'category',
        'featured_image',
        'published_at',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(NewsArticleTranslation::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
