<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('warning', 'Please login to access the admin panel.');
        }

        $user = Auth::user();

        if (!$user->is_active || !$user->isAdmin()) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Unauthorized access or account suspended.');
        }

        return $next($request);
    }
}
