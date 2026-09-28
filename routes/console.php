<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('translations:audit', function () {
    $locales = ['mr', 'hi', 'en'];
    $files = [];
    foreach ($locales as $l) {
        $path = lang_path("{$l}/site.php");
        if (!file_exists($path)) {
            $this->error("Missing file: {$path}");
            return 1;
        }
        $files[$l] = require $path;
    }

    $allKeys = array_unique(array_merge(
        array_keys($files['mr']),
        array_keys($files['hi']),
        array_keys($files['en'])
    ));

    $missing = [];
    foreach ($locales as $l) {
        foreach ($allKeys as $k) {
            if (!array_key_exists($k, $files[$l]) || trim((string)$files[$l][$k]) === '') {
                $missing[$l][] = $k;
            }
        }
    }

    if (empty($missing)) {
        $this->info("✓ 100% Translation Parity! All " . count($allKeys) . " keys exist and are non-empty in mr, hi, and en.");
        return 0;
    }

    foreach ($missing as $l => $keys) {
        $this->warn("Locale [{$l}] is missing " . count($keys) . " keys:");
        foreach (array_slice($keys, 0, 10) as $k) {
            $this->line("  - {$k}");
        }
    }
    return 1;
})->purpose('Audit multilingual translation keys across mr, hi, and en');

