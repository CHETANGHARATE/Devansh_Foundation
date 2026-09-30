<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $fillable = [
        'donor_name',
        'donor_email',
        'donor_phone',
        'donor_pan',
        'donor_address',
        'amount',
        'donation_type',
        'payment_method',
        'transaction_id',
        'payment_status',
        'project_id',
        'donation_case_id',
        'receipt_number',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function donationCase(): BelongsTo
    {
        return $this->belongsTo(DonationCase::class, 'donation_case_id');
    }
}
