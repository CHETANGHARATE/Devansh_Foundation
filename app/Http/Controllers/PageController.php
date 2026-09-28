<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Story;
use Illuminate\Support\Facades\Response;

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

    public function sitemap()
    {
        $baseUrl = config('app.url', url('/'));
        $projects = Project::published()->get();
        $stories = Story::published()->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';

        $staticRoutes = [
            '/', '/about', '/our-work', '/projects', '/impact', '/stories',
            '/gallery', '/reports', '/get-involved', '/volunteer', '/partner',
            '/csr', '/sponsor', '/fundraise', '/donate', '/contact',
        ];

        foreach ($staticRoutes as $path) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($baseUrl . $path) . '</loc>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            foreach (['mr', 'hi', 'en'] as $lang) {
                $xml .= '<xhtml:link rel="alternate" hreflang="' . $lang . '" href="' . htmlspecialchars($baseUrl . $path . '?lang=' . $lang) . '" />';
            }
            $xml .= '</url>';
        }

        foreach ($projects as $proj) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($baseUrl . '/projects/' . $proj->slug) . '</loc>';
            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.7</priority>';
            $xml .= '</url>';
        }

        foreach ($stories as $story) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($baseUrl . '/stories/' . $story->slug) . '</loc>';
            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.6</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }

    public function robots()
    {
        $baseUrl = config('app.url', url('/'));
        $txt = "User-agent: *\nAllow: /\nDisallow: /admin\nDisallow: /admin/*\n\nSitemap: {$baseUrl}/sitemap.xml\n";
        return Response::make($txt, 200, ['Content-Type' => 'text/plain']);
    }
}
