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
        // Check query parameter
        if ($request->has('lang') && in_array($request->query('lang'), $this->supportedLocales)) {
            session(['locale' => $request->query('lang')]);
        }

        $locale = session('locale', config('app.locale', 'mr'));

        if (!in_array($locale, $this->supportedLocales)) {
            $locale = 'mr';
        }

        App::setLocale($locale);
        View::share('currentLocale', $locale);
        View::share('supportedLocales', [
            'mr' => 'मराठी',
            'hi' => 'हिंदी',
            'en' => 'English',
        ]);

        return $next($request);
    }
}
