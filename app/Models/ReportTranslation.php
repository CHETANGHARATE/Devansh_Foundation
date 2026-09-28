<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportTranslation extends Model
{
    protected $fillable = [
        'report_id',
        'language_code',
        'title',
        'description',
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
