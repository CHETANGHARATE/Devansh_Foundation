<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectTranslation extends Model
{
    protected $fillable = [
        'project_id',
        'language_code',
        'title',
        'short_description',
        'description',
        'problem_statement',
        'solution',
        'activities',
        'impact_text',
        'meta_title',
        'meta_description',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
