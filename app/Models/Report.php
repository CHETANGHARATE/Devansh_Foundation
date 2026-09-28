<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    use HasTranslations;

    protected $fillable = [
        'type', // annual, financial, activity, impact
        'year',
        'file_path',
        'file_size',
        'is_published',
        'order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'order' => 'integer',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(ReportTranslation::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
