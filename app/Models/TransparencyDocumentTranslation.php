<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransparencyDocumentTranslation extends Model
{
    protected $fillable = [
        'transparency_document_id',
        'language_code',
        'title',
        'short_description',
        'description',
        'status_text',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(TransparencyDocument::class, 'transparency_document_id');
    }
}
