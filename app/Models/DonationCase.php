<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DonationCase extends Model
{
    use HasTranslations;

    protected $fillable = [
        'slug',
        'beneficiary_name',
        'category',
        'category_icon',
        'image',
        'target_amount',
        'collected_amount',
        'currency',
        'expense_label',
        'status',
        'is_demo',
        'order',
        'start_date',
        'end_date',
        'donation_url',
    ];

    protected $casts = [
        'is_demo' => 'boolean',
        'target_amount' => 'decimal:2',
        'collected_amount' => 'decimal:2',
        'order' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected $appends = [
        'progress_percentage',
        'remaining_amount',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(DonationCaseTranslation::class);
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getProgressPercentageAttribute(): float
    {
        if ($this->target_amount <= 0) {
            return 0.0;
        }

        $pct = ($this->collected_amount / $this->target_amount) * 100;
        return (float) min(100, round($pct, 1));
    }

    public function getRemainingAmountAttribute(): float
    {
        return (float) max(0, $this->target_amount - $this->collected_amount);
    }

    /**
     * Format number using Indian numbering system (e.g. 2,80,000)
     */
    public static function formatInr(float|int|string|null $num): string
    {
        if ($num === null) {
            return '0';
        }

        $num = round((float) $num);
        if (strlen((string) $num) > 3) {
            $lastthree = substr((string) $num, strlen((string) $num) - 3, 3);
            $restunits = substr((string) $num, 0, strlen((string) $num) - 3);
            $restunits = (strlen($restunits) % 2 == 1) ? '0' . $restunits : $restunits;
            $expunit = str_split($restunits, 2);
            $explrestunits = '';
            for ($i = 0; $i < count($expunit); $i++) {
                if ($i == 0) {
                    $explrestunits .= (int) $expunit[$i] . ',';
                } else {
                    $explrestunits .= $expunit[$i] . ',';
                }
            }
            return $explrestunits . $lastthree;
        }

        return (string) $num;
    }

    public function getFormattedTargetAmountAttribute(): string
    {
        return '₹' . self::formatInr($this->target_amount);
    }

    public function getFormattedTargetAmountSymbolAttribute(): string
    {
        return '₹' . self::formatInr($this->target_amount);
    }

    public function getFormattedCollectedAmountAttribute(): string
    {
        return '₹' . self::formatInr($this->collected_amount);
    }

    public function getFormattedRemainingAmountAttribute(): string
    {
        return '₹' . self::formatInr($this->remaining_amount);
    }
}
