<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['category', 'author', 'tags'])
            ->latest()
            ->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = NewsCategory::latest()->get();
        $authors = Author::latest()->get();
        $tags = NewsTag::latest()->get();

        return view('admin.news.create', compact(
            'categories',
            'authors',
            'tags'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'news_category_id' => ['nullable', 'exists:news_categories,id'],
            'author_id' => ['nullable', 'exists:authors,id'],
            'title' => ['required', 'max:255'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'excerpt' => ['nullable', 'max:500'],
            'content' => ['required'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:news_tags,id'],
            'meta_title' => ['nullable', 'max:255'],
            'meta_description' => ['nullable', 'max:500'],
            'meta_keywords' => ['nullable', 'max:255'],
            'og_image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('og_image')) {
            $validated['og_image'] = $request->file('og_image')->store('news/seo', 'public');
        }

        $tagIds = $request->input('tags', []);

        unset($validated['tags']);

        $validated['slug'] = $this->generateUniqueSlug($validated['title']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['views'] = 0;

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('news', 'public');
        }

        $news = News::create($validated);

        $news->tags()->sync($tagIds);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dibuat.');
    }

    public function show(News $news)
    {
        $news->load(['category', 'author', 'tags']);
        $news->increment('views');

        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $news->load('tags');

        $categories = NewsCategory::latest()->get();
        $authors = Author::latest()->get();
        $tags = NewsTag::latest()->get();

        return view('admin.news.edit', compact(
            'news',
            'categories',
            'authors',
            'tags'
        ));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'news_category_id' => ['nullable', 'exists:news_categories,id'],
            'author_id' => ['nullable', 'exists:authors,id'],
            'title' => ['required', 'max:255'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'excerpt' => ['nullable', 'max:500'],
            'content' => ['required'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:news_tags,id'],
            'meta_title' => ['nullable', 'max:255'],
            'meta_description' => ['nullable', 'max:500'],
            'meta_keywords' => ['nullable', 'max:255'],
            'og_image' => ['nullable', 'image', 'max:2048'],
        ]);


        if ($request->hasFile('og_image')) {
                if ($news->og_image) {
                    Storage::disk('public')->delete($news->og_image);
                }

                $validated['og_image'] = $request->file('og_image')->store('news/seo', 'public');
            }

        $tagIds = $request->input('tags', []);

        unset($validated['tags']);

        if ($news->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $news->id
            );
        }

        $validated['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail) {
                Storage::disk('public')->delete($news->thumbnail);
            }

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('news', 'public');
        }

        $news->update($validated);

        $news->tags()->sync($tagIds);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if ($news->thumbnail) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        if ($news->og_image) {
            Storage::disk('public')->delete($news->og_image);
        }

        $news->tags()->detach();

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (
            News::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    return $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}