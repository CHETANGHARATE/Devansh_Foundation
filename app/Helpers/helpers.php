<?php

use App\Models\Setting;
use Illuminate\Support\Facades\App;

if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('current_locale')) {
    function current_locale(): string
    {
        return App::getLocale();
    }
}

if (!function_exists('site_t')) {
    function site_t(string $key, array $replace = [], ?string $locale = null)
    {
        return __("site.{$key}", $replace, $locale);
    }
}
