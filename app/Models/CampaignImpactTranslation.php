<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CampaignImpactTranslation extends Model
{
    protected $fillable = [
        'campaign_impact_id',
        'language_code',
        'label',
        'sublabel',
    ];

    public function campaignImpact(): BelongsTo
    {
        return $this->belongsTo(CampaignImpact::class);
    }
}
