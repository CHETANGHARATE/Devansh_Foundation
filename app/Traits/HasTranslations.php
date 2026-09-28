<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait HasTranslations
{
    /**
     * Get translation for specified locale or current app locale, with fallback to 'en'.
     */
    public function translation(?string $locale = null)
    {
        $locale = $locale ?: App::getLocale();

        // Check if translations relation is loaded or find by locale
        $trans = $this->translations->firstWhere('language_code', $locale);

        if (!$trans && $locale !== 'en') {
            $trans = $this->translations->firstWhere('language_code', 'en');
        }

        if (!$trans) {
            $trans = $this->translations->first();
        }

        return $trans;
    }

    /**
     * Get translated attribute value with fallback.
     */
    public function t(string $attribute, ?string $locale = null, $default = '')
    {
        $trans = $this->translation($locale);
        if ($trans && isset($trans->{$attribute}) && filled($trans->{$attribute})) {
            return $trans->{$attribute};
        }

        // Fallback to English if requested wasn't English
        $fallback = $this->translations->firstWhere('language_code', 'en');
        if ($fallback && isset($fallback->{$attribute}) && filled($fallback->{$attribute})) {
            return $fallback->{$attribute};
        }

        // Fallback to any first translation
        $first = $this->translations->first();
        if ($first && isset($first->{$attribute}) && filled($first->{$attribute})) {
            return $first->{$attribute};
        }

        return $default;
    }
}
