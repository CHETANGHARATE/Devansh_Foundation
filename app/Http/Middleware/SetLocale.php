<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    protected array $supportedLocales = ['mr', 'hi', 'en'];

    public function handle(Request $request, Closure $next): Response
    {
        // 1. Determine requested locale from query, session, cookie, or default
        $requestedLocale = $request->query('lang') 
            ?? $request->query('locale') 
            ?? session('locale') 
            ?? $request->cookie('locale') 
            ?? config('app.locale', 'mr');

        if (!in_array($requestedLocale, $this->supportedLocales)) {
            $requestedLocale = 'mr';
        }

        // 2. Synchronize session
        if (session('locale') !== $requestedLocale) {
            session(['locale' => $requestedLocale]);
        }

        // 3. Queue 1-year cookie if not set or different
        if ($request->cookie('locale') !== $requestedLocale) {
            \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::make('locale', $requestedLocale, 60 * 24 * 365, '/', null, false, false));
        }

        App::setLocale($requestedLocale);
        View::share('currentLocale', $requestedLocale);
        View::share('supportedLocales', [
            'mr' => 'मराठी',
            'hi' => 'हिंदी',
            'en' => 'English',
        ]);

        return $next($request);
    }
}
