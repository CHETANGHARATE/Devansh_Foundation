<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImpactStatisticTranslation extends Model
{
    protected $fillable = [
        'impact_statistic_id',
        'language_code',
        'label',
        'description',
    ];

    public function impactStatistic(): BelongsTo
    {
        return $this->belongsTo(ImpactStatistic::class);
    }
}
