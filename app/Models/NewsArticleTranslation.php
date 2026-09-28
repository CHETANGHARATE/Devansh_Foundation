<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsArticleTranslation extends Model
{
    protected $fillable = [
        'news_article_id',
        'language_code',
        'title',
        'short_description',
        'content',
        'meta_title',
        'meta_description',
    ];

    public function newsArticle(): BelongsTo
    {
        return $this->belongsTo(NewsArticle::class);
    }
}
