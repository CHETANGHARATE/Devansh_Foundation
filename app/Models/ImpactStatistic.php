<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ImpactStatistic extends Model
{
    use HasTranslations;

    protected $fillable = [
        'number_value',
        'number_prefix',
        'number_suffix',
        'raw_number_display',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'number_value' => 'integer',
        'order' => 'integer',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(ImpactStatisticTranslation::class);
    }
}
