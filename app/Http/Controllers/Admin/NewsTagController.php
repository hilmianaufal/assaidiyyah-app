<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsTagController extends Controller
{
    public function index()
    {
        $tags = NewsTag::latest()->paginate(12);

        return view('admin.news-tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.news-tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . time();

        NewsTag::create($validated);

        return redirect()
            ->route('admin.news-tags.index')
            ->with('success', 'Tag berita berhasil ditambahkan.');
    }

    public function show(NewsTag $newsTag)
    {
        return view('admin.news-tags.show', ['tag' => $newsTag]);
    }

    public function edit(NewsTag $newsTag)
    {
        return view('admin.news-tags.edit', ['tag' => $newsTag]);
    }

    public function update(Request $request, NewsTag $newsTag)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . $newsTag->id;

        $newsTag->update($validated);

        return redirect()
            ->route('admin.news-tags.index')
            ->with('success', 'Tag berita berhasil diperbarui.');
    }

    public function destroy(NewsTag $newsTag)
    {
        $newsTag->delete();

        return redirect()
            ->route('admin.news-tags.index')
            ->with('success', 'Tag berita berhasil dihapus.');
    }
}