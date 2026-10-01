<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasTranslations;

    protected $fillable = [
        'slug',
        'category',
        'featured_image',
        'target_amount',
        'raised_amount',
        'currency',
        'is_featured',
        'is_published',
        'is_demo',
        'status',
        'order',
        'start_date',
        'end_date',
        'donation_url',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'is_demo' => 'boolean',
        'target_amount' => 'decimal:2',
        'raised_amount' => 'decimal:2',
        'order' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected $appends = [
        'progress_percentage',
        'progress_display',
        'formatted_raised_amount',
        'formatted_target_amount',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(CampaignTranslation::class);
    }

    public function impacts(): HasMany
    {
        return $this->hasMany(CampaignImpact::class)->orderBy('order');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function getProgressPercentageAttribute(): float
    {
        if ($this->target_amount <= 0) {
            return 0.0;
        }

        $pct = ($this->raised_amount / $this->target_amount) * 100;
        return (float) min(100, round($pct, 2));
    }

    public function getProgressDisplayAttribute(): int
    {
        return (int) round($this->progress_percentage);
    }

    public function getRemainingAmountAttribute(): float
    {
        return (float) max(0, $this->target_amount - $this->raised_amount);
    }

    /**
     * Format number using Indian numbering system (e.g. 1,50,000)
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

    public function getFormattedRaisedAmountAttribute(): string
    {
        return '₹' . self::formatInr($this->raised_amount);
    }

    public function getFormattedTargetAmountAttribute(): string
    {
        return '₹' . self::formatInr($this->target_amount);
    }

    public function getFormattedRemainingAmountAttribute(): string
    {
        return '₹' . self::formatInr($this->remaining_amount);
    }
}
