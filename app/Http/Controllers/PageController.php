<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function privacy()
    {
        return view('pages.legal.privacy');
    }

    public function terms()
    {
        return view('pages.legal.terms');
    }

    public function donationPolicy()
    {
        return view('pages.legal.donation-policy');
    }

    public function refundPolicy()
    {
        return view('pages.legal.refund-policy');
    }

    public function disclaimer()
    {
        return view('pages.legal.disclaimer');
    }
}
