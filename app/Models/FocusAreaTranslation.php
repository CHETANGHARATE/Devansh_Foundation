<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FocusAreaTranslation extends Model
{
    protected $fillable = [
        'focus_area_id',
        'language_code',
        'title',
        'short_description',
        'description',
        'objectives',
        'activities',
        'impact_summary',
    ];

    public function focusArea(): BelongsTo
    {
        return $this->belongsTo(FocusArea::class);
    }
}
