<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch(string $locale, Request $request)
    {
        if (in_array($locale, ['mr', 'hi', 'en'])) {
            session(['locale' => $locale]);
            \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::make('locale', $locale, 60 * 24 * 365, '/', null, false, false));
        }

        $referer = $request->headers->get('referer');
        if ($referer) {
            $parsed = parse_url($referer);
            $query = [];
            if (isset($parsed['query'])) {
                parse_str($parsed['query'], $query);
                unset($query['lang'], $query['locale']);
            }
            $cleanUrl = ($parsed['scheme'] ?? 'http') . '://' . ($parsed['host'] ?? '') . (isset($parsed['port']) ? ':' . $parsed['port'] : '') . ($parsed['path'] ?? '/');
            if (!empty($query)) {
                $cleanUrl .= '?' . http_build_query($query);
            }
            return redirect($cleanUrl);
        }

        return redirect()->route('home');
    }
}
