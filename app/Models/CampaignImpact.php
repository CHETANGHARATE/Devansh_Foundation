<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CampaignImpact extends Model
{
    use HasTranslations;

    protected $fillable = [
        'campaign_id',
        'icon',
        'badge_color',
        'is_primary',
        'metric_value',
        'order',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'order' => 'integer',
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(CampaignImpactTranslation::class);
    }
}
