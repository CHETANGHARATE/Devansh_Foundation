<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Award extends Model
{
    use HasTranslations, SoftDeletes;

    protected $fillable = [
        'slug',
        'year',
        'category',
        'icon',
        'certificate_image',
        'is_demo',
        'is_published',
        'order',
    ];

    protected $casts = [
        'is_demo' => 'boolean',
        'is_published' => 'boolean',
        'order' => 'integer',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(AwardTranslation::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
