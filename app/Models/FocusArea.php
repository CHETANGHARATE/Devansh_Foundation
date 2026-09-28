<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FocusArea extends Model
{
    use HasTranslations;

    protected $fillable = [
        'slug',
        'icon',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(FocusAreaTranslation::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
