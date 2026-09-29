<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FocusAreaInitiative extends Model
{
    use HasTranslations;

    protected $fillable = [
        'focus_area_id',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function focusArea(): BelongsTo
    {
        return $this->belongsTo(FocusArea::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(FocusAreaInitiativeTranslation::class, 'initiative_id');
    }
}
