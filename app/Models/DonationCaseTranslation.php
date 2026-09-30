<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonationCaseTranslation extends Model
{
    protected $fillable = [
        'donation_case_id',
        'language_code',
        'title',
        'expense_label',
        'urgent_message',
        'description',
        'category_name',
        'meta_title',
        'meta_description',
    ];

    public function donationCase(): BelongsTo
    {
        return $this->belongsTo(DonationCase::class);
    }
}
