<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait HasTranslations
{
    /**
     * Get translation for specified locale or current app locale, with fallback to 'en' or first available.
     */
    public function translation(?string $locale = null)
    {
        $locale = $locale ?: App::getLocale();

        // Check if translations relation is loaded or find by locale
        $translations = $this->relationLoaded('translations')
            ? $this->translations
            : $this->getRelationValue('translations');

        if (!$translations || $translations->isEmpty()) {
            return null;
        }

        $trans = $translations->firstWhere('language_code', $locale);

        if (!$trans && $locale !== 'en') {
            $trans = $translations->firstWhere('language_code', 'en');
        }

        if (!$trans && $locale !== 'mr') {
            $trans = $translations->firstWhere('language_code', 'mr');
        }

        if (!$trans) {
            $trans = $translations->first();
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

        $translations = $this->relationLoaded('translations')
            ? $this->translations
            : $this->getRelationValue('translations');

        if (!$translations || $translations->isEmpty()) {
            return $default;
        }

        // Fallback to English if requested wasn't English
        $fallback = $translations->firstWhere('language_code', 'en');
        if ($fallback && isset($fallback->{$attribute}) && filled($fallback->{$attribute})) {
            return $fallback->{$attribute};
        }

        // Fallback to Marathi (default language)
        $fallbackMr = $translations->firstWhere('language_code', 'mr');
        if ($fallbackMr && isset($fallbackMr->{$attribute}) && filled($fallbackMr->{$attribute})) {
            return $fallbackMr->{$attribute};
        }

        // Fallback to any first available translation
        $first = $translations->first();
        if ($first && isset($first->{$attribute}) && filled($first->{$attribute})) {
            return $first->{$attribute};
        }

        return $default;
    }

    /**
     * Magic getter for translatable attributes.
     * Allows accessing $model->title, $model->description, etc. directly.
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if ($value !== null) {
            return $value;
        }

        if (method_exists($this, 'translations')) {
            $translated = $this->t($key);
            if ($translated !== '') {
                return $translated;
            }
        }

        return null;
    }
}
