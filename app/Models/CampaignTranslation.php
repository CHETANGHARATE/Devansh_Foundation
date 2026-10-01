<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CampaignTranslation extends Model
{
    protected $fillable = [
        'campaign_id',
        'language_code',
        'title',
        'title_highlight',
        'short_description',
        'description',
        'category_name',
        'meta_title',
        'meta_description',
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
