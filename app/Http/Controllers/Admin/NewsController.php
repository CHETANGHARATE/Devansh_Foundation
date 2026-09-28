<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use App\Models\NewsArticleTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $articles = NewsArticle::with('translations')->latest('published_at')->paginate(15);
        return view('admin.news.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_mr' => 'required|string|max:255',
            'category' => 'required|string',
            'published_at' => 'required|date',
            'content_mr' => 'required|string',
        ]);

        $imagePath = $request->featured_image;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('news', 'public');
        }

        $slug = Str::slug($request->slug ?: ($request->title_en ?: $request->title_mr));
        if (NewsArticle::where('slug', $slug)->exists()) {
            $slug .= '-' . rand(100, 999);
        }

        $article = NewsArticle::create([
            'slug' => $slug,
            'category' => $request->category,
            'featured_image' => $imagePath,
            'published_at' => $request->published_at,
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published', true),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            NewsArticleTranslation::create([
                'news_article_id' => $article->id,
                'language_code' => $loc,
                'title' => $request->input("title_{$loc}") ?: $request->title_mr,
                'short_description' => $request->input("short_description_{$loc}"),
                'content' => $request->input("content_{$loc}") ?: $request->content_mr,
            ]);
        }

        return redirect()->route('admin.news.index')->with('success', 'Article published successfully!');
    }

    public function edit(NewsArticle $news)
    {
        $news->load('translations');
        $trans = [];
        foreach ($news->translations as $t) {
            $trans[$t->language_code] = $t;
        }

        return view('admin.news.edit', compact('news', 'trans'));
    }

    public function update(Request $request, NewsArticle $news)
    {
        $request->validate([
            'title_mr' => 'required|string|max:255',
            'category' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $imagePath = $news->featured_image;
        if ($request->hasFile('image_file')) {
            $imagePath = '/storage/' . $request->file('image_file')->store('news', 'public');
        } elseif ($request->filled('featured_image')) {
            $imagePath = $request->featured_image;
        }

        $news->update([
            'slug' => Str::slug($request->slug ?: $news->slug),
            'category' => $request->category,
            'featured_image' => $imagePath,
            'published_at' => $request->published_at,
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published'),
        ]);

        $locales = ['mr', 'hi', 'en'];
        foreach ($locales as $loc) {
            NewsArticleTranslation::updateOrCreate(
                ['news_article_id' => $news->id, 'language_code' => $loc],
                [
                    'title' => $request->input("title_{$loc}") ?: $request->title_mr,
                    'short_description' => $request->input("short_description_{$loc}"),
                    'content' => $request->input("content_{$loc}") ?: $request->content_mr,
                ]
            );
        }

        return redirect()->route('admin.news.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(NewsArticle $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Article deleted.');
    }
}
