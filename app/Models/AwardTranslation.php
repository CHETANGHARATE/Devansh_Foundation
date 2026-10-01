<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AwardTranslation extends Model
{
    protected $fillable = [
        'award_id',
        'language_code',
        'title',
        'category_name',
        'description',
        'conferred_by',
    ];

    public function award(): BelongsTo
    {
        return $this->belongsTo(Award::class, 'award_id');
    }
}
