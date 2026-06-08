<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class PublicNewsController extends Controller
{
    public function index(Request $request)
{
    $query = News::with([
        'category',
        'author',
        'tags'
    ])
    ->where('status', 'published');

    if ($request->filled('category')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('slug', $request->category);
        });
    }

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('excerpt', 'like', '%' . $request->search . '%');
        });
    }

    $news = $query
        ->latest('published_at')
        ->paginate(9)
        ->withQueryString();

    $categories = NewsCategory::all();

    return view(
        'public.news.index',
        compact('news', 'categories')
    );
}


    public function show(News $news)
    {
        abort_if($news->status !== 'published', 404);

        $news->load(['category', 'author', 'tags']);
        $news->increment('views');

        $relatedNews = News::with(['category', 'author'])
            ->where('status', 'published')
            ->where('id', '!=', $news->id)
            ->when($news->news_category_id, function ($query) use ($news) {
                $query->where('news_category_id', $news->news_category_id);
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.news.show', [
            'news' => $news,
            'relatedNews' => $relatedNews,
            'setting' => \App\Models\Setting::first(),
            'metaTitle' => $news->meta_title ?: $news->title,
            'metaDescription' => $news->meta_description ?: ($news->excerpt ?: str($news->content)->stripTags()->limit(160)),
            'metaKeywords' => $news->meta_keywords ?: $news->tags->pluck('name')->implode(', '),
            'metaImage' => $news->og_image
                ? asset('storage/' . $news->og_image)
                : ($news->thumbnail ? asset('storage/' . $news->thumbnail) : null),
        ]);
    }
}