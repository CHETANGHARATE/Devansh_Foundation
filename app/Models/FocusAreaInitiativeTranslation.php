<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FocusAreaInitiativeTranslation extends Model
{
    protected $fillable = [
        'initiative_id',
        'language_code',
        'title',
    ];

    public function initiative(): BelongsTo
    {
        return $this->belongsTo(FocusAreaInitiative::class, 'initiative_id');
    }
}
