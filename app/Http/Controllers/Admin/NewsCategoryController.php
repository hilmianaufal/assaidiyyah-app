<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::latest()->paginate(12);

        return view('admin.news-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.news-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'color' => ['nullable', 'max:50'],
            'description' => ['nullable'],
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . time();

        NewsCategory::create($validated);

        return redirect()
            ->route('admin.news-categories.index')
            ->with('success', 'Kategori berita berhasil ditambahkan.');
    }

    public function show(NewsCategory $newsCategory)
    {
        return view('admin.news-categories.show', [
            'category' => $newsCategory,
        ]);
    }

    public function edit(NewsCategory $newsCategory)
    {
        return view('admin.news-categories.edit', [
            'category' => $newsCategory,
        ]);
    }

    public function update(Request $request, NewsCategory $newsCategory)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'color' => ['nullable', 'max:50'],
            'description' => ['nullable'],
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . $newsCategory->id;

        $newsCategory->update($validated);

        return redirect()
            ->route('admin.news-categories.index')
            ->with('success', 'Kategori berita berhasil diperbarui.');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();

        return redirect()
            ->route('admin.news-categories.index')
            ->with('success', 'Kategori berita berhasil dihapus.');
    }
}