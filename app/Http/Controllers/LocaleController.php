<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch(string $locale, Request $request)
    {
        if (in_array($locale, ['mr', 'hi', 'en'])) {
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }
}
