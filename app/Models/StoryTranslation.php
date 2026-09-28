<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoryTranslation extends Model
{
    protected $fillable = [
        'story_id',
        'language_code',
        'title',
        'quote',
        'story',
        'challenge',
        'support_received',
        'outcome',
        'meta_title',
        'meta_description',
    ];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}
