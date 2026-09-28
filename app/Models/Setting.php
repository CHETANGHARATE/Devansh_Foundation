<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'group', 'is_json'];

    protected $casts = [
        'is_json' => 'boolean',
    ];

    /**
     * Get setting value by key, with optional default.
     */
    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        if (!$setting) {
            return $default;
        }

        if ($setting->is_json && is_string($setting->value)) {
            $decoded = json_decode($setting->value, true);
            return json_last_error() === JSON_ERROR_NONE ? $decoded : $setting->value;
        }

        return $setting->value ?? $default;
    }

    /**
     * Set setting value by key.
     */
    public static function set(string $key, $value, string $group = 'general', bool $isJson = false): self
    {
        $val = ($isJson || is_array($value)) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value;
        $isJsonVal = $isJson || is_array($value);

        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $val, 'group' => $group, 'is_json' => $isJsonVal]
        );
    }
}
