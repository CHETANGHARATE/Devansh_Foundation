<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransparencyDocument extends Model
{
    use HasTranslations, SoftDeletes;

    protected $fillable = [
        'slug',
        'document_type',
        'icon',
        'file_path',
        'file_size',
        'document_date',
        'valid_until',
        'is_demo',
        'is_published',
        'status_label',
        'order',
    ];

    protected $casts = [
        'is_demo' => 'boolean',
        'is_published' => 'boolean',
        'order' => 'integer',
        'document_date' => 'date',
        'valid_until' => 'date',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(TransparencyDocumentTranslation::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
