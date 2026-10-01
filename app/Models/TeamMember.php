<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'photo',
        'email',
        'linkedin_url',
        'twitter_url',
        'is_demo',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_demo' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(TeamMemberTranslation::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
